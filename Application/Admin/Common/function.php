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
?>