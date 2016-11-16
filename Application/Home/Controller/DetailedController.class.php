<?php
// 明细表，包括收支明细和交易明细
namespace Home\Controller;
use Think\Controller;
class DetailedController extends Controller {

    //持仓单
    /*public function dtrading(){
        $uid=$_SESSION['uid'];
        //根据传来的时间查询对应的数据(只传递月份和时间便可以)
        $mytoday=I('get.today',date("Y-m"));
//        print_r($mytoday);exit;
        $journal = D('journal');

        $last_day1 =  strtotime($mytoday);
        $last_day2 =  strtotime("$mytoday +1 month");
        $where = $last_day1.'<= jtime and '.$last_day2.'>=jtime';
        //查询多条记录
        $count = $journal->where("uid=".$uid." and jtype='建仓' and " . $where)->order('oid desc')->count();

        $pagecount = 10;
        $page = new \Think\Page($count , $pagecount);
        $page->parameter = $row; //此处的row是数组，为了传递查询条件
        $page->parameter["status"]=1;
        $page->parameter["today"]=$mytoday;
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        //$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%  第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
		$page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%  第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();

        $jiancanglist = $journal->where("uid=".$uid." and jtype='建仓' and " . $where)->order('oid desc')->limit($page->firstRow.','.$page->listRows)->select();
        
        $pingcanglist = $journal->where("uid=".$uid." and (jtype='平仓' or jtype='自动爆仓') and " . $where)->order('oid desc')->limit($page->firstRow.','.$page->listRows)->select();
        if($mytoday)
        {
            $dangqianyue=$mytoday;
        }else
        {
            $dangqianyue=date("Y-m-d");
        }

        if($last_day2 > time()){ //判断是否是现在月份
            //
            $thismonth = 1;
        }else{
            $thismonth = 0;
        }
        $tm1 = date('Y-m-01', strtotime($dangqianyue));//当前月一号
        $time1 = date('Y-m-d', strtotime("$tm1 -1 month"));//上个月一号
        $time2 = date('Y-m-d', strtotime("$tm1 +1 month"));//下个月一号
        $trading['time']=strtotime($tm1);
        $trading['time1']=strtotime($time1);
        $trading['time2']=strtotime($time2);
        $baiyin = M("catproduct")->where("cname='CAD-LME'")->getField('ask');//油价
        $tong = M("catproduct")->where("cname='XAGUSDOZ SC-FX'")->getField('ask');//白银价
        $this->assign('baiyin',$baiyin);
        $this->assign('tong',$tong);
        $this->assign('trading',$trading);
        $this->assign('jiancanglist',$jiancanglist);
        $this->assign('pingcanglist',$pingcanglist);
        $this->assign('page',$show);
        $this->assign('thismonth',$thismonth);
        $this->assign('premonth',date('Y-m',strtotime("$mytoday -1 month")));
        $this->assign('nextmonth',date('Y-m',strtotime("$mytoday +1 month")));
        $this->assign('pagetype','holding');//设置当前页面为持仓页面
        $this->display();//显示模板
    }

    */

    public function dtrading(){
        if(isset($_SESSION['uid'])) {
            $tq=C('DB_PREFIX');
            $uid=$_SESSION['uid'];
            //账号余额
            $userimg=M('userinfo')->where('uid='.$uid)->find();
            $price=M('accountinfo')->where('uid='.$uid)->find();
            //账号体验卷数
            $endtime=date(time());
            $exper=M('experienceinfo')->join($tq.'experience on '.$tq.'experienceinfo.exid='.$tq.'experience.eid')->where($tq.'experienceinfo.uid='.$uid.' and '.$endtime.' < '.$tq.'experience.endtime and '.$tq.'experienceinfo.getstyle=0')->count();            
            $user['price']=round($price['balance'],2);
            $user['exper']=$exper;
            $user['username']=$userimg['username'];
            $user['portrait']=$userimg['portrait'];
            $this->assign('user',$user);
       
        }
        $rate=M("productinfo")->field("rate")->group("cid")->select();
        $uorder=$this->userorder();
        $this->assign('pagetype','holding');//设置当前页面为持仓页面
        $this->assign('nolist',$uorder);
        $this->assign('rate',$rate);  
        $this->display();
    }
    //查询当前用户正在交易的订单
    public function userorder(){
        $tq=C('DB_PREFIX');
        $uid = $_SESSION['uid'];
        $userorders=M('order')->join($tq.'productinfo on '.$tq.'order.pid='.$tq.'productinfo.pid')
        ->join($tq.'catproduct on '.$tq.'productinfo.cid='.$tq.'catproduct.cid')->where($tq.'order.uid='.$uid.' and ostaus=0 and is_hide=0')->order($tq.'catproduct.cid asc')->select();
   
         // echo "</pre>";
         // var_dump($userorders);die;
        return $userorders;
    }


    //交易详情页
    public function tradingid(){
        $tq=C('DB_PREFIX');
        $order=M('order')->join($tq.'productinfo on '.$tq.'order.pid='.$tq.'productinfo.pid')->join($tq.'catproduct on '.$tq.'productinfo.cid='.$tq.'catproduct.cid')->where($tq.'order.oid='.I('oid'))->find();

        $orderid=$order;
		//建仓金额
        $orderid['jc']=$order['uprice']*$order['onumber'];
		//盈亏资金
		if($order['ostyle']==0){
			if($order['cid']==1){			
	       		$orderid['ykzj']=($order['sellprice']-$order['buyprice'])*$order['wave']*$order['onumber'];
			}else{
				$orderid['ykzj']=($order['sellprice']-$order['buyprice'])*$order['wave']*$order['onumber'];
			}
		}else{
			if($order['cid']==1){			
	       		$orderid['ykzj']=($order['buyprice']-$order['sellprice'])*$order['wave']*$order['onumber'];
			}else{
				$orderid['ykzj']=($order['buyprice']-$order['sellprice'])*$order['wave']*$order['onumber'];
			}
		}
		
        
        //百分比
        $orderid['bfb']=$orderid['ykzj']/$orderid['jc']*100;

        //本单盈余
        $orderid['bdyy']=$order['uprice']*$order['onumber']+$orderid['ykzj'];
        //平仓收入
        $orderid['pdsr']=$orderid['bdyy']-$order['feeprice']*$order['onumber'];
        $this->assign('order',$orderid);
        $this->display();
    }
     //收支明细列表(显示日志记录)
    public function drevenue(){
        $uid=$_SESSION['uid'];
        $count =M('journal')->where('uid='.$uid.' and jtype !="返点"')->count();
        $pagecount = 5;
        $page = new \Think\Page($count , $pagecount);
        $page->parameter = $row; //此处的row是数组，为了传递查询条件
        $page->setConfig('first','首页');
        $page->setConfig('prev','上一页');
        $page->setConfig('next','下一页');
        $page->setConfig('last','尾页');
        $page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%  第 '.I('p',1).' 页/共 %TOTAL_PAGE% 页 ( '.$pagecount.' 条/页 共 %TOTAL_ROW% 条)');
        $show = $page->show();
        $list = M('journal')->where('uid='.$uid.' and jtype !="返点"')->order('jtime desc, balance asc' )->limit($page->firstRow.','.$page->listRows)->select();  
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
     //收支详细页
    public function revenueid(){
        $jno=I('jno');
        $order=M('journal')->where('jno='.$jno)->find();
        $fee=M('journal')->where('oid='.$order['oid']." and jtype='建仓'")->getField('jfee');
        $this->assign('order',$order);
        $this->assign('fee',$fee);
        $this->display();
    }

    public function ckjiaoyimima()
    {
        $mima=I('jiaoyimima');
        $uid=$_SESSION['uid'];
        $user1=M('accountinfo')->where('uid='.$uid)->getField('pwd');
        if(md5($mima) != $user1){
            $this->ajaxReturn(2);
        }


    }
    //购买商品，获取信息，生成订单表。
    public function addorder(){
		//商品id
        $mypid=I('post.mypid');
		if(getIsbuy($mypid) == 1){
			$this->ajaxReturn(0);
		}
        $tq=C('DB_PREFIX');
        //数量
        $mysum=I('post.mysum');
        //所用费用
        $myfy=I('post.myfy');
        //方向
        $myfx=I('post.myfx');
         //手续费
        $mysxf=I('post.mysxf');		
        //体验卷值
        $mytyj=I('post.mytyj');
        //商品id
        $mypid=I('post.mypid');
        //入仓价

        $myzy=I('post.myzy');
        //止盈

        $myzs=I('post.myzs');
        //止损

        $mygetpeice=I('post.mygetpeice');
        //$jiaoyimima=I('post.jiaoyimima');
        /*
        * 添加订单表。修改对应体验卷价格的状态。添加日志表。扣除用户账号余额
        * 添加订单之前再次判断账户余额（后续写） 
        */
        
     
        $uid=$_SESSION['uid'];
		$username = $_SESSION['husername'];
        //获取账户余额
        $user1=M('accountinfo')->where('uid='.$uid)->find();

//        if($user1['pwd'] != md5($jiaoyimima)){
//            $this->ajaxReturn(201);
//        }
        //根据商品id查询商品
        $goods=M('productinfo')->where('pid='.$mypid)->find();
		if(($myfy+$mysxf)>$user1['balance'])
		{
			$this->ajaxReturn(1);
		}
        //随机生成订单号
        $orderno=  $this->build_order_no();
        $order=M('order');
        //编写订单需要的数据
        $data['uid']=$uid;
        $data['pid']=$mypid;
        if ($myfx=='买涨') {
           $data['ostyle']=0; 
        }else{
           $data['ostyle']=1; 
        }
        
        $data['buytime']=date(time());
        $data['onumber']=$mysum;
        $data['ostaus']=0;
        $data['fee']=$mysxf;
        if($mytyj==1){
          $data['eid']=1;  
          $data['fee']=0;
        }
        $data['buyprice']=$mygetpeice;
        $data['orderno']=$orderno;
        $data['ptitle']=$goods['ptitle'];
        $order->endprofit=$myzy;
        $order->endloss=$myzs;
        $orderid = $order->add($data);
        if ($orderid) {
            //扣除用户账号金额，若是体验卷则不扣除。
            $accoun=M('accountinfo');
            $user=$accoun->where('uid='.$uid)->find();
            if($mytyj==0){
                $accoun->aid=$user['aid'];
                $accoun->uid=$uid;
                $accoun->balance=$user['balance']-$myfy-$mysxf;
                $accoun->save();
            }
            //判断是否使用优惠卷，然后改变优惠卷状态
            if($mytyj==1){
               //查询使用体验卷的信息
              $experienceinfo= M('experienceinfo');
              $tiyan=$experienceinfo->join($tq.'experience on '.$tq.'experienceinfo.exid='.$tq.'experience.eid')->where($tq.'experienceinfo.uid='.$uid.' and '.date(time()).' < '.$tq.'experience.endtime and '.$tq.'experienceinfo.getstyle=0 and '.$tq.'experience.eprice='.$goods['uprice'])->find();   
               $experienceinfo->exid=$tiyan['exid'];
               $experienceinfo->getstyle=1;
               $experienceinfo->save();
            }
            //添加日志表
            //随机生成订单号
            $orderno=  $this->build_order_no();
            $myjournal=M('journal');								
            $journal['jno']=$orderno;										//订单号
			$journal['uid'] = $uid;											//用户id
			$journal['jtype'] = '建仓';										//类型	
			$journal['jtime'] = date(time());								//操作时间
			$journal['jincome'] = $myfy;									//收支金额【要予以删除】
			$journal['number'] = $mysum;									//数量
			$journal['remarks'] = $goods['ptitle'];							//产品名称	
			$journal['balance'] = $user['balance']-$myfy-$mysxf;			//账户余额	
			$journal['jstate'] = 0;											//盈利还是亏损
			$journal['jusername'] = $username;								//用户名
			$journal['jostyle'] = $data['ostyle'];							//涨、跌
			$journal['juprice'] = $myfy/$mysum;								//单价
			$journal['jfee'] = $mysxf;										//手续费
			$journal['jbuyprice'] = $mygetpeice;							//入仓价
			$journal['jaccess'] = ($myfy+$mysxf)-($myfy+$mysxf)*2;			//支持金额，求负数
			$journal['oid'] = $orderid;										//改订单流水的订单id
			
            $myjournal->add($journal);
			$order->where('oid='.$orderid)->setField('commission',$journal['balance']);
        }else{
            $orderid=0;
        }
       $this->ajaxReturn($orderid); 
    }
    //判断是否购买过此类商品
    public function judgment(){
        //商品id
        $mypid=I('post.mypid');
        $uid=$_SESSION['uid'];
        $porder = M('order')->where('uid='.$uid.' and pid='.$mypid.' and selltime=0')->select();
        if(isset($porder))
        {
            $this->ajaxReturn(99); 
            //echo "<script>alert('亲，您已经购买了此产品')</script>";
        }else{
            $this->ajaxReturn(100); 
        }
    }
    //查询订单信息(接收修改后的订单，或者直接平仓，或者购买完后平仓，3中情况)
    public function orderid(){
        $tq=C('DB_PREFIX');
        $orderid=I('orderid');
        $order=M('order')->join($tq.'productinfo on '.$tq.'order.pid='.$tq.'productinfo.pid')
        ->join($tq.'catproduct on '.$tq.'productinfo.cid='.$tq.'catproduct.cid')->where('oid='.$orderid)->find();
    
        $this->assign('order',$order);
 
    
        $this->display();
    }
    //修改订单的止盈和止亏
    public function edityk(){
        $order=M('order');
        $order->oid=I('post.oid');
        $order->endprofit=I('post.zy');
        $order->endloss=I('post.zk');
        $order->save();
        $this->redirect('Detailed/orderid', array('orderid' =>I('post.oid')));
    }
    //获取随时的动态值，计算盈亏金额和盈余数据
    public function orderxq(){
        $tq=C('DB_PREFIX');
        $youjia=I('youjia');
		$cid = I('cid');
		if($youjia!=0){
	        $order=M('order')->join($tq.'productinfo on '.$tq.'order.pid='.$tq.'productinfo.pid')->where($tq.'order.oid='.I('oid'))->find();
	        $orderid=$order;
	        //建仓金额
	        if ($order['eid']==0) {
	             $orderid['jc']=  round($order['uprice']*$order['onumber'],1);
	            //判断是买张还是买跌。0涨，1跌
	            if ( $orderid['ostyle']==0) {
	                 //盈亏资金
	                 if($cid==1){
	                 	$orderid['ykzj']=round(($youjia-$order['buyprice'])*$order['onumber']*1*$order['wave'],2);	
	                 }else{
	                 	$orderid['ykzj']=round(($youjia-$order['buyprice'])*$order['onumber']*$order['wave'],2);
	                 }
	                 //本单盈余
	                 $orderid['bdyy']=round($orderid['jc']+$orderid['ykzj'],1);
	                 //盈亏百分百
	                 $orderid['ykbfb']=$orderid['ykzj']/ $orderid['jc']*1; 
	            }else{
	                //盈亏资金
	                if($cid==1){
	                 	$orderid['ykzj']=round(($order['buyprice']-$youjia)*$order['onumber']*1*$order['wave'],2);	
               		}else{
                 		$orderid['ykzj']=round(($order['buyprice']-$youjia)*$order['onumber']*$order['wave'],2);
                 	}
	                 //本单盈余
	                 $orderid['bdyy']=round($orderid['jc']+$orderid['ykzj'],1);
	                 //盈亏百分百
	                 $orderid['ykbfb']=$orderid['ykzj']/ $orderid['jc']*1;  
	            }
	        }else{
	             $orderid['jc']=0;
	            //判断是买张还是买跌。0涨，1跌
	            if ( $orderid['ostyle']==0) {
	                 //盈亏资金
	                if($cid==1){
	                 	$orderid['ykzj']=round(($youjia-$order['buyprice'])*$order['onumber']*1*$order['wave'],2);	
               		}else{
                 		$orderid['ykzj']=round(($youjia-$order['buyprice'])*$order['onumber']*$order['wave'],2);
                 	}
	                 //本单盈余
	                 $orderid['bdyy']=round($orderid['jc']+$orderid['ykzj'],1);
	                 //盈亏百分百
	                 $orderid['ykbfb']=$orderid['ykzj']/ $orderid['jc']*1; 
	                 if($orderid['ykzj']<0){
	                    $orderid['ykzj']=0;
	                    $orderid['bdyy']=0; 
	                 } 
	            }else{
	                //盈亏资金
					if($cid==1){
	                 	$orderid['ykzj']=round(($order['buyprice']-$youjia)*$order['onumber']*1*$order['wave'],2);	
               		}else{
                 		$orderid['ykzj']=round(($order['buyprice']-$youjia)*$order['onumber']*$order['wave'],2);
                 	}
	                 //本单盈余
	                 $orderid['bdyy']=round($orderid['jc']+$orderid['ykzj'],1);
	                 //盈亏百分百
	                 $orderid['ykbfb']=$orderid['ykzj']/ $orderid['jc']*1; 
	                 if ($orderid['ykzj']<0) {
	                     $orderid['ykzj']=0;
	                     $orderid['bdyy']=0; 
	                 } 
	            }
	        }
	        
	        $this->ajaxReturn($orderid);
        }
    }

    //平仓
    public function updateore(){
         //获取账户余额
        $uid=$_SESSION['uid'];
		$users = D('userinfo');
		$username = $_SESSION['husername'];
        $user=M('accountinfo')->where('uid='.$uid)->find();
        //获取传递过来的值
        $oid=I('post.oid');
		$mypid = M("order")->where("oid=".$oid)->getField("pid");
		if(getIsbuy($mypid) == 1){
			$this->ajaxReturn(9);
		}
        //现在油价
        $youjia=I('post.youjia');
        if($youjia<=0)
        {  
                
        }
        else{
        //结余的金额，需要给当前用户的账户添加
        $bdyy=I('post.bdyy');
         //建仓金额
        $jiancj=I('post.jiancj'); 
        //盈亏资金
        $ykzj=I('post.ykzj'); 
		//产品单价
		$uprice = I('post.uprice');
        //先修改订单信息，返回成功信息后修改账户余额和添加日志记录
        $orderno= $this->build_order_no();
        $tq=C('DB_PREFIX');
        $myorder=M('order')->join($tq.'productinfo on '.$tq.'order.pid='.$tq.'productinfo.pid')->where($tq.'order.oid='.$oid)->find();
        $order=M('order');
        $order->selltime=date(time());
        $order->ostaus=1;
        $order->sellprice=$youjia;
        //盈亏资金
        $order->ploss=$ykzj;
        //手续费
        // $fee = $myorder['feeprice']*$myorder['onumber'];
        $fee = 0;
        $order->fee=$fee;
//    	//佣金
//    	$order->commission=$youjia-$myorder['buyprice']-$fee;
//    	//盈亏
//    	$order->ploss=$youjia-$myorder['buyprice'];
        $msg= $order->save();				
        if ($msg) {
            $myprice=M('accountinfo')->where('uid='.$uid)->find();
            $acco= M('accountinfo');
            $acco->uid=$uid;
            $acco->balance=$myprice['balance']+$bdyy;
            $acco->save();
			//根据商品id查询商品
            $goods=M('productinfo')->where('pid='.$myorder['pid'])->find();
			//用户亏损了，返点
			/*if($ykzj<0){
				//查询该用户级别
				$thisuser = $users->field('otype,oid')->where('uid='.$uid)->find();
				//返佣记录
				$otype = $thisuser['otype'];			//用户类型
				$ouid = $thisuser['oid'];				//上级id
				//如果有oid，是分销用户
				if($ouid!=""){
					if($otype==0){
						//此id用户是普通客户，oid为代理用户id
						$otype = "客户";
						//查会员单位返点比例
						$agent = $users->field('oid,rebate,feerebate,otype,username')->where('uid='.$ouid)->find();
						$agent_user=M('accountinfo')->where('uid='.$ouid)->find();
						//判断上级用户，如果是代理商
						if($agent['otype']==1){
							$agent_rebate = $agent['rebate'];				//代理盈亏返点
							$agent_feerebate = $agent['feerebate']; 		//代理手续费返点
							$menber_id = $agent['oid'];						//用户的上级id
							if($menber_id!=""){
								$menber = $users->field('rebate,feerebate,username')->where('uid='.$menber_id)->find();
								$menber_rebate = $menber['rebate'];					//会员盈亏返点
								$menber_feerebate = $agent['feerebate']; 			//会员手续费返点
								$newykzj = abs($ykzj);
								$menber_ploss = $newykzj*$menber_rebate/100;			//会员盈亏反金
								$menber_feeploss = $fee*$menber_feerebate/100;		//会员手续费反金
								$agent_ploss = $menber_ploss*$agent_rebate/100;					//代理盈亏反金
								$agent_feeploss = $menber_feeploss*$agent_feerebate/100;		//代理手续费反金
								$menber_user=M('accountinfo')->where('uid='.$menber_id)->find();
								//写两条记录，一条代理，一条会员
								$distribution = M('journal');
								$disj['jno']=$orderno;										//订单号
								$disj['uid'] = $ouid;										//用户id
								$disj['jtype'] = '返点';										//类型
								$disj['jtime'] = date(time());								//操作时间
								$disj['balance'] = $agent_user['balance']+$agent_ploss+$agent_feeploss;			//账户余额
								$disj['jfee'] = $agent_feeploss;							//手续费反金
								$disj['jploss'] = $agent_ploss;					  			//盈亏反金
								$disj['jaccess'] = $agent_feeploss+$agent_ploss;			//出入金额
								$disj['jusername'] = $agent['username'];					//用户名
								$disj['oid'] = $oid;									//订单id
								$disj['explain'] = '代理反金';									//操作标记
								$disj['remarks'] = $goods['ptitle'];						//产品名称	
								$disj['number'] = $myorder['onumber'];						//数量	
								$disj['jostyle'] = $myorder['ostyle'];						//涨、跌
								$disj['jbuyprice'] = $myorder['buyprice'];					//入仓价
								$disj['jsellprice'] = $youjia;								//平仓价
								$distribution->add($disj);
								
								//写入会员记录
								$distribution = M('journal');
								$mdisj['jno']=$orderno;										//订单号
								$mdisj['uid'] = $ouid;										//用户id
								$mdisj['jtype'] = '返点';										//类型
								$mdisj['jtime'] = date(time());								//操作时间
								$mdisj['balance'] = $menber_user['balance']+$menber_ploss+$menber_feeploss;			//账户余额
								$mdisj['jfee'] = $menber_feeploss;							//手续费反金
								$mdisj['jploss'] = $menber_ploss;							//盈亏反金
								$mdisj['jaccess'] = $menber_feeploss+$menber_ploss;			//出入金额
								$mdisj['jusername'] = $menber['username'];					//用户名
								$mdisj['oid'] = $oid;									//订单id
								$mdisj['explain'] = '会员反金';								//操作标记
								$mdisj['remarks'] = $goods['ptitle'];						//产品名称	
								$mdisj['number'] = $myorder['onumber'];						//数量	
								$mdisj['jostyle'] = $myorder['ostyle'];						//涨、跌
								$mdisj['jbuyprice'] = $myorder['buyprice'];					//入仓价
								$mdisj['jsellprice'] = $youjia;								//平仓价
								$distribution->add($mdisj);
							}
						}else if($agent['otype']==2 || $agent['otype']==4){
							//如果上级是会员
							$menber_rebate = $agent['rebate'];				//代理盈亏返点
							$menber_feerebate = $agent['feerebate']; 		//代理手续费返点
							$menber_ploss = $newykzj*$menber_rebate/100;			//会员盈亏反金
							$menber_feeploss = $fee*$menber_feerebate/100;		//会员手续费反金
							//echo $ykzj*$menber_rebate/100;
							//echo $menber_rebate.'----------------';
							//写入会员记录
							$distribution = M('journal');
							$mdisj['jno']=$orderno;										//订单号
							$mdisj['uid'] = $ouid;										//用户id
							$mdisj['jtype'] = '返点';										//类型
							$mdisj['jtime'] = date(time());								//操作时间
							$mdisj['balance'] = $user['balance']+$menber_ploss+$menber_feeploss;			//账户余额
							$mdisj['jfee'] = $menber_feeploss;							//手续费反金
							$mdisj['jploss'] = $menber_ploss;							//盈亏反金
							$mdisj['jaccess'] = $menber_feeploss+$menber_ploss;			//出入金额
							$mdisj['jusername'] = $agent['username'];					//用户名
							$mdisj['oid'] = $oid;									//订单id
							$mdisj['explain'] = '会员反金';								//操作标记
							$mdisj['remarks'] = $goods['ptitle'];						//产品名称	
							$mdisj['number'] = $myorder['onumber'];						//数量	
							$mdisj['jostyle'] = $myorder['ostyle'];						//涨、跌
							$mdisj['jbuyprice'] = $myorder['buyprice'];					//入仓价
							$mdisj['jsellprice'] = $youjia;								//平仓价
							$distribution->add($mdisj);
						}else{
							//上级是平台
							
						}
					}else if($otype==1){
						//此id用户是代理
						$menber = $users->field('oid,rebate,feerebate,otype')->where('uid='.$ouid)->find();
						if($menber['oid']!=""){
							$menber_rebate = $menber['rebate'];				//会员盈亏返点
							$menber_feerebate = $menber['feerebate']; 		//会员手续费返点
							$menber_ploss = $newykzj*$menber_rebate/100;			//会员盈亏反金
							$menber_feeploss = $fee*$menber_feerebate/100;		//会员手续费反金
							//写入会员记录
							$distribution = M('journal');
							$mdisj['jno']=$orderno;										//订单号
							$mdisj['uid'] = $ouid;										//用户id
							$mdisj['jtype'] = '返点';										//类型
							$mdisj['jtime'] = date(time());								//操作时间
							$mdisj['balance'] = $user['balance']+$menber_ploss+$menber_feeploss;			//账户余额
							$mdisj['jfee'] = $menber_feeploss;							//手续费反金
							$mdisj['jploss'] = $menber_ploss;							//盈亏反金
							$mdisj['jaccess'] = $menber_feeploss+$menber_ploss;			//出入金额
							$mdisj['jusername'] = $menber['username'];					//用户名
							$mdisj['oid'] = $oid;									//订单id
							$mdisj['explain'] = '会员反金';									//操作标记
							$mdisj['remarks'] = $goods['ptitle'];						//产品名称	
							$mdisj['number'] = $myorder['onumber'];						//数量	
							$mdisj['jostyle'] = $myorder['ostyle'];						//涨、跌
							$mdisj['jbuyprice'] = $myorder['buyprice'];					//入仓价
							$mdisj['jsellprice'] = $youjia;								//平仓价
							$distribution->add($mdisj);
						}
					}else if($otype==2){
						//此id用户是会员
						
					}				
				}else{
					//不是分销用户
					
				}
			}*/
            //添加平仓日志表
            //随机生成订单号
            $myjournal=M('journal');
			$journal['jno']=$orderno;										//订单号
			$journal['uid'] = $uid;											//用户id
			$journal['jtype'] = '平仓';										//类型	
			$journal['jtime'] = date(time());								//操作时间
			$journal['jincome'] = $bdyy;									//收支金额【要予以删除】
			$journal['number'] = $myorder['onumber'];						//数量			
			$journal['remarks'] = $goods['ptitle'];							//产品名称	
			$journal['balance'] = $user['balance']+$bdyy;					//账户余额	
			if ($bdyy>$jiancj){
                  $journal['jstate']=1;										//盈利还是亏损
            }else{
                  $journal['jstate']=0;
            }			
			$journal['jusername'] = $username;								//用户名
			$journal['jostyle'] = $myorder['ostyle'];						//涨、跌
			$journal['juprice'] = $uprice;									//单价
			$journal['jfee'] = $fee;										//手续费
			$journal['jbuyprice'] = $myorder['buyprice'];					//入仓价
			$journal['jsellprice'] = $youjia;								//平仓价
			$journal['jaccess'] = $bdyy;									//出入金额
			$journal['jploss'] = $ykzj;										//出入金额
			$journal['oid'] = $oid;											//改订单流水的订单id
			$journal['explain'] = $otype.'平仓';
            $myjournal->add($journal);
			$order->where('oid='.$oid)->setField('commission',$journal['balance']);
        }else{
           $msg="平仓失败，稍后平仓";
        }

        $this->ajaxReturn($msg); 
        }        
    }
    public function newrate(){
        $pid=$_REQUEST['pid'];
    $rate=M("productinfo")->field("rate")->where("pid=".$pid)->find();
    $this->ajaxReturn($rate);   
    }
    //随机生成订单编号
    public function build_order_no(){
        return date(time()).substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 3);
    }
    public function getRecord123($type){
		$Data = array();
		$Data['Code'] = $type; 
		$usdcnyobj = file_get_contents('http://open.icairon.com/Api/GetPriceData?Code=USDCNY');
		$usdcnyjson = json_decode($usdcnyobj,true);
		$usdcny = $usdcnyjson['Data']['Price'];

		$GBPUSDobj = file_get_contents('http://open.icairon.com/Api/GetPriceData?Code=GBPUSD');
		$GBPUSDjson = json_decode($GBPUSDobj,true);
		$GBPUSD = $GBPUSDjson['Data']['Price'];


		$GBPCYN = $GBPUSD * $usdcny;

		$fp = fsockopen("112.124.211.146", 9101, $errno, $errstr, 30);
		if (!$fp) {
			echo "$errstr ($errno)<br />\n";
		} else {
			$out = "0=Login|1=1000|1000=chn-sh-yulang|1001=chn-sh-yulang\r\n";
			$out .= "0=Subscribe|1=1001|10=".$type."\r\n";
			fwrite($fp, $out);
			$a=1;
			while (!feof($fp)) {
				$str=fgets($fp, 128);
				$drr=array();
				if($a==2)
				{
				    $arr=explode("|",$str);
                    $keys = array();
                    foreach($arr as $key=>$value){
                        $parts = explode('=',$value);
                        $keys[$parts[0]] = $parts[1];
                    }
                    if(key_exists (24, $keys)){
                        $Data['Price'] = $keys[24];
                        $Data['UpdateTime'] = $keys[25];
                    }else{
                        $Data['Price'] = ( $keys[20] + $keys[22] ) / 2;
                        $Data['UpdateTime'] = $keys[21];
                    }

                    if($type == 'CAD-LME' || $type == 'XAGUSDOZ SC-FX'){
                    	$Data['Price'] = $Data['Price'] * $GBPCYN;
                    }else{
                    	$Data['Price'] = $Data['Price'] * $usdcny;
                    }
                    $drr["ask"] = $Data['Price'];
                    $Data['Open'] = $Data['Price'];
                    $Data['High'] = $Data['Price'];
                    $Data['Low'] = $Data['Price'];
					$drr["eidtime"]=time();
					$m = M("catproduct")->where("cname='$type'")->find();
					if(!$m){
						M("catproduct")->add($drr);
					}else{
						M("catproduct")->where("cname='$type'")->save($drr);
					}
				}
				$a++;
				
				if($a==3)
				{
					break;
				}
			}
		}
		$Product = M('Product')->where(array('Code'=>$Data['Code']))->find();
            
            //生成K线图数据
            $Min = date("i",$Data['UpdateTime']);
			
			
            $Time =  strtotime(date('Y-m-d', $Data['UpdateTime']))+date("H",$Data['UpdateTime'])*60*60;
            //生成分时图，每分钟一次
            for($I=0;$I<60;$I++){
				
                if($Min>= 0 + 1 * $I&&$Min<1+1*$I){$AddTime = $Time+60*1*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>1,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP1['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP1['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP1['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>1,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP1);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>1,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
				echo mysql_error();
            }






            

            //生成分时图，每5分钟一次
            for($I=0;$I<12;$I++){
                if($Min>=0+5*$I&&$Min<5+5*$I){$AddTime = $Time+60*5+60*5*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>2,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP2['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP2['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP2['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>2,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP2);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>2,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }            
            
            
            
            //生成分时图，每15分钟一次
            for($I=0;$I<4;$I++){
                if($Min>=0+15*$I&&$Min<15+15*$I){$AddTime = $Time + 60*15+60*15*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>3,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP3['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP3['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP3['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>3,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP3);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>3,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }   

            //生成分时图，每30分钟一次
            for($I=0;$I<2;$I++){
                if($Min>=0+30*$I&&$Min<30+30*$I){$AddTime = $Time + 60*30+60*30*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>4,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP4['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP4['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP4['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>4,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP4);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>4,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }   

            //生成分时图，每小时一次
            for($I=0;$I<1;$I++){
                if($Min>=0+60*$I&&$Min<60+5*$I){$AddTime = $Time + 60*60+60*5*$I;}
            }     
            $Chart = M('ProductChart')->where(array('IntervalId'=>5,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['Price']>$Chart['High']){$UP5['High']=$Data['Price'];}
                if($Data['Price']<$Chart['Low']){$UP5['Low']=$Data['Price'];}
                if($Data['Price']!=$Chart['Close']){$UP5['Close'] = $Data['Price'];}
                M('ProductChart')->where(array('IntervalId'=>5,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP5);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>5,
                    'High'=>$Data['Price'],
                    'Low'=>$Data['Price'],
                    'Open'=>$Data['Price'],
                    'Close'=>$Data['Price'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }               
               
            //生成日线图      
            $AddTime = strtotime(date('Y-m-d', $Data['UpdateTime']));      
            $Chart = M('ProductChart')->where(array('IntervalId'=>6,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->find();       
            if($Chart){
                if($Data['High']!=$Chart['High']){$UP6['High']=$Data['High'];}
                if($Data['Low']!=$Chart['Low']){$UP6['Low']=$Data['Low'];}
                if($Data['Close']!=$Chart['Close']){$UP6['Close'] = $Data['Close'];}
                M('ProductChart')->where(array('IntervalId'=>6,'ItemId'=>$Product['Id'],'AddTime'=>$AddTime))->save($UP6);
            }else{
                M('ProductChart')->add(
                array(
                    'ItemId'=>$Product['Id'],
                    'IntervalId'=>6,
                    'High'=>$Data['High'],
                    'Low'=>$Data['Low'],
                    'Open'=>$Data['Open'],
                    'Close'=>$Data['Close'],
                    'AddTime'=>$AddTime,
                    'QuoteTime'=>date('Y-m-d H:i:s',$AddTime),
                )
                );
            }
        fclose($fp);
	}
	public function getRecord(){
		$this->getRecord123("CAD-LME");
		$this->getRecord123("XAGUSDOZ SC-FX");
        $this->getRecord123("CL I6-NX");
		// $this->getRecord123("ZL 16U-CB");
	}
    public function getnowdata(){
		if($_GET['code']){
			$find = M('catproduct')->where(array('cname'=>$_GET['code']))->find();
			$redata = '(['.'['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.',['.$find['time'].'000,'.$find['ask'].','.$find['open'].','.$find['lastClose'].','.$find['high'].',"'.$find['quoteTime'].'"]'.'])';
			echo $_GET['callback'].$redata;
		}else{
			echo '错误的请求';exit;
		}
    }


    Public function GetChartData(){
        $Code = I('Code')?I('Code'):I('code');
        $Rows = I('Rows')?I('Rows'):I('rows');
        $Interval = I('Interval')?I('Interval'):I('interval');
        $Callback = I('Callback')?I('Callback'):I('callback');
               //判断参数是否有效
        $Product = M('Product')->where(array('Code'=>$Code))->find();
        if($Interval == "1"){
            $IntervalId = 1;
        }elseif($Interval == "5"){
            $IntervalId = 2;
        }elseif($Interval == "15"){
            $IntervalId = 3;
        }elseif($Interval == "30"){
            $IntervalId = 4;
        }elseif($Interval == "1h"){
            $IntervalId = 5;
        }elseif($Interval == "1d"){
            $IntervalId = 6;
        }else{
            $IntervalId = 6;
        }
      
        $Chart = M('ProductChart')->field('Open,Close,High,Low,AddTime,QuoteTime')->where(array('ItemId'=>$Product['Id'],'IntervalId'=>$IntervalId))->limit($Rows)->order('AddTime desc')->select();
        $Num = count($Chart);
                        $Str = '([';
                        foreach($Chart as $Key=>$Value){
                            $Str = $Str.'[';
                            $Str = $Str.$Chart[$Num-$Key-1]['AddTime'].'000,';
                            $Str = $Str.$Chart[$Num-$Key-1]['Open'].',';
                            $Str = $Str.$Chart[$Num-$Key-1]['High'].',';
                            $Str = $Str.$Chart[$Num-$Key-1]['Low'].',';
                            $Str = $Str.$Chart[$Num-$Key-1]['Close'].',';
                            $Str = $Str.'"'.$Chart[$Num-$Key-1]['QuoteTime'].'"';
                            $Str = $Str.'],';
                        }
        $Str = substr($Str,0,strlen($Str)-1);
        $Str = $Str.'])';
        echo $Callback.$Str;        
     }
}
