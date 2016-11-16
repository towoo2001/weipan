<?php
	function getIsbuy($mypid){
		$curweekday = date('w');
		$curhour = date('H');
		if($curweekday == 0){ //如果是周天
			return 1;
		}else if($curweekday == 6 && $curhour > 2 ){ //如果是周六的凌成两点之后
			return 1;
		}else if($curweekday == 1 && $curhour < 8){  //如果是周一的八点之前
			return 1;
		}
		return 0;
	}
	function islogin(){
		
	  $uid=$_SESSION['userid'];
	  return $uid;
	  
	}
	function getDownuids($uid,$type=1){
		$oid=M('userinfo')->field('uid,username')->where('oid='.$uid." and otype!=0")->select();//查询当前用户下级所有非客户的uid
        for($i=0; $i<count($oid); $i++ ) {
			$oid[$i]=$oid[$i]['uid'];
		}
		
		if(!empty($oid)){//如果有,继续查询下级所有非客户的uid
			$oid1=M('userinfo')->where('oid in('.implode(',',$oid).') and ustatus=0 and otype!=0 and vertus = 1')->select();
			for($i=0; $i<count($oid1); $i++ ) {
				$oid1[$i]=$oid1[$i]['uid'];
			}
		}
		
		if(!empty($oid))
		{
			if(!empty($oid1))
			{
				$olds = array_merge(array_merge($oid,$oid1),array($uid));
			}else{
				$olds = array_merge($oid,array($uid));
			}
		}else{
			$olds = array($uid);
		}
		$us = M('userinfo')->where('oid in('.implode(',',array_filter($olds)).') and ustatus=0 and otype=0 and vertus = 1')->select();
		foreach ($us as $key => $value) {
    		$arruid[]=$value['uid'];
    	}
		
		if($arruid)//下级所有客户，经纪人，普通会员，会员单位
		{
			$arruid = array_merge($arruid,$olds);
		}else{//下级所有客户
			$arruid = $olds;
		}
		return $arruid;
	}

	/**
     * $name   string 表单上传name
     * $pre    string 图片前缀
     * $thumbX int    缩略图宽
     * $thumbY int    所路途高
	 * */
    function picUpload($name,$pre,$thumbX,$thumbY){
        if($_FILES[$name]["name"]){
            $conf = C('UPLOAD');
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     $conf['maxSize'] ;// 设置附件上传大小
            $upload->exts      =     $conf['exts'];// 设置附件上传类型
            $upload->rootPath  =     $conf['rootPath']; // 设置附件上传根目彿
            $upload->saveName  =     strtoupper($pre).rand(0, 10000).time();
            // 上传文件
            $info = $upload->upload();
            if($info){
                //定义一个空数组，用来保存原图的地址，以及缩略图的地址
                $pathinfo = array();
                $img_name = $info[$name]["savename"];
                $save_path = $info[$name]["savepath"];
                //保存文件路径
                $url = $upload->rootPath . $info[$name]["savepath"] . $info[$name]["savename"];
                $image = new \Think\Image(); //实例化缩略图类
                $info = $image->open($url);//打开缩略图
                $width = $image->width(); // 返回图片的宽度
                $height = $image->height(); // 返回图片的高度
                //设置缩略图保存的路径
                $thumburl = $conf['thumbPath'].$save_path;
                //设置文件名称
                $thumbname = 'thumb_'.$img_name;
                //根据图片的宽高来剪裁图片，生成缩略图并保存
                $image->thumb($thumbX, $thumbY,\Think\Image::IMAGE_THUMB_CENTER)->save($thumburl.$thumbname);
                //将图片信息保存到数组中
                $pathinfo['pic_url'] = $save_path . $img_name;
                $pathinfo['thumb']= $save_path . $thumbname;

            }else{
                return $upload->getError();
            }
            return $pathinfo;
        }
    }
?>