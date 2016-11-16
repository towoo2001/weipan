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
	<link rel="stylesheet" href="/Public/Home/css/account.css">

	<script id="G--xyscore-load" type="text/javascript" charset="utf-8" async="" src="/Public/Home/js/xyscore_main.js"></script>
	<link rel="stylesheet" href="/Public/Home/css/personal_center.css">
	<link rel="stylesheet" href="http://at.alicdn.com/t/font_1474888892_755574.css">

	<div class="personal_center">
		<div class="personal_center_d">
			<i class="iconfont" id="personal_center_d_i"><a href="javascript:history.go(-1)">&#xe600;</a></i>
			个人中心
		</div>
		<div class="personal_center_da">
			<img src="<?php echo ($suer["portrait"]); ?>" style="width:100%;height:100%;opacity:0.6"/>
			<p class="personal_center_da_d_p">
				<img src="<?php echo ($suer["portrait"]); ?>"/>
			<form id="form1" action="/Home/User/changeimg" method="post" enctype="multipart/form-data">
				<input type="file" name="file" onchange="changeimg()" style="cursor:pointer;opacity:0;position:relative;top:-16em;left:13em;width:6em;height:6em"/>
			</form>
			</p>

			<ul class="personal_center_da_d_ul">
				<li>
					<p><?php echo (changephone($suer["utel"])); ?></p>
					<span>电话</span>
				</li>
				<li>
					<p>&yen;<?php echo ($result["balance"]); ?></p>
					<span>余额</span>
				</li>
				<li>
					<?php if($user["exper"] != 0): ?><p><?php echo ($user["exper"]); ?>张</p><?php else: ?><p>0张</p><?php endif; ?>
					<span>交易卷</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="personal_center_db">
		<div class="info-box clearfix"> 
		    <a href="<?php echo U('User/recharge');?>">
		        <i class="a-11"></i>
			    <div class="info-detail clearfix"> 充值<div class="go"></div></div>
			</a> 
		</div>
		<div class="info-box clearfix">
		    <a href="<?php echo U('User/cash');?>"> 
			    <i class="a-12"></i>
				<div class="info-detail clearfix"> 提现<div class="go"></div></div>
			</a> 
		</div>
		<!--<div class="info-box clearfix"> <i class="a-3"></i>-->
			<!--<div class="info-detail clearfix"> <a href="<?php echo U('Detailed/dtrading');?>">交易历史</a> </div>-->
		<!--</div>-->
		<div class="info-box clearfix"> 
		    <a href="<?php echo U('Detailed/drevenue');?>">
			    <i class="a-4"></i>
				<div class="info-detail clearfix"> 收支明细<div class="go"></div></div>
			</a>
		</div>
		<div class="info-box clearfix">
		   <a href="<?php echo U('User/experiencelist');?>">
			    <i class="a-1"></i>
				<div class="info-detail clearfix">交易卷<div class="go"></div></div>
			</a> 
		</div>
		<!--<div class="info-box clearfix"> <i class="a-6"></i> -->
		<!--<div class="info-detail clearfix" style="display:block"> <a href="<?php echo U('User/recommend');?>">交易卷</a></div>-->
		<!--</div>-->
		<div class="info-box clearfix"> 
		    <a href="<?php echo U('User/rechargelist');?>">
		      <i class="a-5"></i>
			  <div class="info-detail clearfix">充值记录<div class="go"></div></div>
			</a> 
		</div>
	</div>
	<script>
		function changeimg()
		{
			$("#form1").submit();
		}
	</script>
	<script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
	<script src="/Public/Home/js/script.js"></script>
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