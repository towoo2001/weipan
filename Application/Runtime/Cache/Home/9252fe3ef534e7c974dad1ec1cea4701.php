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
<link rel="stylesheet" href="/Public/Home/css/index.css">
<link rel="stylesheet" href="/Public/Home/css/pwd.css">
<script language="javascript" type="text/javascript" src="/Public/Home/js/jquery.qrcode.min.js"></script>

<div class="content">
<header class="list-head">
	<nav class="list-nav clearfix"> <a href="javascript:history.go(-1)" class="list-back"></a>
		<h3 class="list-title">推广</h3>
	</nav>
</header>
<p style="text-align:center"><input  id='link' type="text" value="<?php echo ($url); ?>" class="st"/>&nbsp;&nbsp;<button class="tjrz" id="cop" onclick="copy();">复制推广链接</button></p>
<div class="form_sfrz" id="code"></div>
</div>
<style>
.yh_all{ font-size:16px; font-weight:bold; border:none;}
.zl_table{ border-radius:5px; background:#fff; }
.zl_table tr{ height:42px; line-height:42px;}
.st{ width:50%; height:32px; line-height:32px; border:none; border-radius:3px; }
.tjrz{ background:none; border:none; padding:5.5px 2px; background:#ffb709; border-radius:2px; color:#fff; font-size:14px; margin-top:12px;}
.tjrz2{ background:none; border:none; padding:9px 35px; background:#19b2ff; border-radius:2px; color:#fff; font-size:14px; margin-top:12px;}
.form_sfrz{  border-radius:5px; padding:20px; width:100%; font-size:15px; text-align:center;}
.form_sfrz img{width:70%}
</style>

<script type="text/javascript"> 
	$(document).ready(function(){
		$('#code').qrcode($("#link").val());
	});
    function copy(){ 
        var content=$('#link');//对象是多行文本框contents 
        content.select(); //选择对象 
        document.execCommand("Copy"); //执行浏览器复制命令
        $('#cop').html('已复制');
    } 
</script> 




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