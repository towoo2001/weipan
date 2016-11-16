<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="format-detection" content="email=no">
    <title>西部微盘宝</title>

    <link rel="stylesheet" type="text/css" href="/Public/Home/css/cd.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Home/css/foot.css" />
    <script language="javascript" type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/js/cd.js"></script>
    <script language="javascript" type="text/javascript" src="/Public/Home/js/common.js"></script>

    <link rel="stylesheet" href="/Public/Home/css/base.css">
    <link rel="stylesheet" href="/Public/Home/css/index.css">
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1474888892_755574.css">


</head>
<body>
<!--顶部开始-->
<div class="top_div">
    <div class="cdan_div"><img src="/Public/Home/images/cdan.png" width="35" height="32"/></div>
    <div id="commonbao" status="1"></div>
</div>
<div class="ycdcdDiv">
    <div class="gbtb"><img src="/Public/Home/images/gbtb.png"/></div>
    <ul>
        <li><a href="/index.php/Home/Index/"><span><img src="/Public/Home/images/jygz.png"/></span><span>首页</span></a></li>
        <li><a href="<?php echo U('User/recharge');?>"><span><img src="/Public/Home/images/cz.png"/></span><span>充值</span></a></li>
        <li><a href="<?php echo U('User/cash');?>"><span><img src="/Public/Home/images/tx.png"/></span><span>提现</span></a></li>
        <li><a href="<?php echo U('Detailed/drevenue');?>"><span><img src="/Public/Home/images/szmx.png"/></span><span>收支明细</span></a></li>
        <li><a href="<?php echo U('User/memberinfo');?>"><span><img src="/Public/Home/images/grxx.png"/></span><span>个人中心</span></a></li>
        <li><a href="<?php echo U('User/img');?>"><span><img src="/Public/Home/images/fxhy.png"/></span><span>分享好友</span></a></li>
        <li><a href="<?php echo U('User/recommend');?>"><span><img src="/Public/Home/images/fxhy.png"/></span><span>我的推广</span></a></li>
        <li><a href="<?php echo U('User/ranking');?>"><span><img src="/Public/Home/images/phb.png"/></span><span>排行榜</span></a></li>
        <li><a href="<?php echo U('User/logout');?>"><span><img src="/Public/Home/images/cs.png"/></span><span>退出</span></a></li>

    </ul>
</div>
<!--顶部结束-->
<div class="main">
    
<link rel="stylesheet" href="/Public/Home/css/global.css">
<link rel="stylesheet" href="/Public/Home/css/charge.css">
<script id="G--xyscore-load" type="text/javascript" charset="utf-8" async="" src="/Public/Home/js/xyscore_main.js"></script>

</head>
<body>
<div class="wrap">
  <div class="index" style="background-color:#E0E0E0;">
    <header class="list-head" style='font-size: 13px;height:4em;color: #fff;'>
     <div class="userinfo" style="width: 207px; line-height: 3em;"> 
        <i class="iconfont" style="float:left;color:#ECEFF1;margin-right:10px;"><a href="javascript:history.go(-1)" style="color: #fff;">&#xe600;</a></i> 
        <div style="float: left;margin-right: 10px;">账户ID：<?php echo ($suer['username']); ?></div>
     	<div>余额：<span class="gold-yuan"><?php echo ($result['balance']); ?></span></div>
     </div>
     <div style="float: right;">
        <a href="/Home/User/cash.html" class="btn" style="background: #F44336;color: #fff;line-height: 1em;">提现</a>
        <a href="/Home/User/rechargelist.html" class="btn" style="color: #fff;background: #FFC107;line-height: 1em;">充值记录</a>
     </div>
<!--      <button class="info-cz btn btn-danger" onclick="User.zhifu()" style="line-height: 1em;">充值</button> -->
    </header>
   
	<form id="moneyCharge1" class="" method="post" action="" target="_blank">
		<input type="hidden" id="zhenmoeny" class="c-input" maxlength="6" value="" name="money">
	</form>
		<div class="pay-method">充值金额</div>
		<div class="money-num">
			<ul class="money-list clearfix">
				<li onclick="changemoney('20',this)" class='moneyli'>20</li>
				<li onclick="changemoney('100',this)" class='moneyli'>100</li>
				<li onclick="changemoney('500',this)" class='moneyli'>500</li>
				<li onclick="changemoney('1000',this)" class='moneyli'>1000</li>
				<li onclick="changemoney('5000',this)" class='moneyli'>5000</li>
				<li onclick="showobj()" id="addmoney" class="money-else">其他</li>
				<input type="text" id="nowmoney" style="display:none;width: 100%;height:3em;border:none;font-size:3em;" placeholder="请输入充值金额" onkeyup="changemoney1(this)" />
			</ul>
		</div>
		
        <div class="money-pay">
            <div class="pay-method">充值方式</div>
<!--             <li class="item clearfix" class="item" onclick="User.typeSetter('zhifu')">
              <img src="/Public/Home/images/pay/UPay.png">
              <span class="select-icon select" pay="zhifu" ></span>
              <div class="pay-title">网银充值</div>
              <div class="pay-version">使用银联</div>  
            </li> -->
            <li class="item clearfix" onclick="User.typeSetter('weixin')">
              <img src="/Public/Home/images/pay/weixin.png" >
              <span  class="select-icon select" pay="weixin"></span>
              <div class="pay-title">微信充值</div>
              <div class="pay-version">使用微信</div>
            </li>
            <li class="item clearfix">
            	<button  class="btn" style="background-color: #395797;border-color: #395797;"><a href="/Home/Index" style="color: #fff;">返回</a></button>
            	<button class="btn btn-danger" onclick="User.zhifu()">立即充值</button>
            </li>
        </div>
    </form>
	<script>

	    var User = {
	    	zhifu:function(){
	    		var money,type;
	    		money = $("#zhenmoeny").val();
	    		type = this.type;
				if(!money)
				{
					alert("请选择金额！");
					return false;
				}
				if(money < 20)
				{
					alert("金额最少为20元！");
					return false;
				}
				if(type == 'weixin')
				{
					$("#moneyCharge1").attr('action',"<?php echo U('User/weixinpay');?>");
					$("#moneyCharge1").submit();
				}else{
					//$("#moneyCharge1").attr('action',"<?php echo U('User/reapal');?>");
					$("#moneyCharge1").attr('action',"<?php echo U('User/gopay');?>");
					$("#moneyCharge1").submit();
				}
	    	},
	    	type:'weixin',
	    	typeSetter:function(str){
                this.type = str;
                $(".money-pay .select").removeClass('select');
                $(".money-pay [pay='" + str + "']").addClass('select');
	    	}

	    }
		

		function changemoney(money,ele)
		{
			eles = $('.moneyli');
			for (var i = eles.length - 1; i >= 0; i--) {
				oele = eles[i];
				oele.style.background='white';
				oele.style.color='black';
			}
			
			ele.style.background='#395797';
			ele.style.color = '#fff';
			$("#nowmoney").val('');
			$("#nowmoney").hide();
			$("#zhenmoeny").val(money);
		}
		function changemoney1(obj)
		{	if(isNaN($(obj).val()))
			{
				alert("只能输入正整数！");
			}
			$("#zhenmoeny").val($(obj).val());
		}
		function showobj()
		{
			$("#zhenmoeny").val('');
			$("#nowmoney").show();
		}
	</script>
	
	
	
	
	
	
	
  </div>
 
</div>

<script src="/Public/Home/js/script.js"></script>
<script type="text/javascript">
$(function(){  
  if ($('#order_id').val()!='') {
       $('#moneyCharge2').submit();
    };
});
</script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/sea.js" async=""></script>


    <div class="menus clearfix">
        <ul>
            <li class="<?php if(isset($pagetype)): else: ?>menu-avtive<?php endif; ?>"><a class="<?php if(isset($pagetype)): ?>home<?php else: ?>homeF<?php endif; ?>" href="/Home/Index">首页</a></li>
            <li class='<?php if(isset($pagetype)): ?>menu-avtive<?php endif; ?> '><a class="<?php if(isset($pagetype)): ?>walletF<?php else: ?>wallet<?php endif; ?>" href="<?php echo U('Detailed/dtrading');?>">持仓</a></li>
            <li><a class="player" href="javascript:;">直播</a></li>
            <li><a class="service" href="javascript:;">客服</a></li>
        </ul>

    </div>

</div>
</body>
</html>