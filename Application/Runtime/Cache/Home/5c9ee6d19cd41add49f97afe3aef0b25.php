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


</head>
<body>



<link rel="stylesheet" href="/Public/Home/css/global.css">
<link rel="stylesheet" href="/Public/Home/css/index.css">
<link rel="stylesheet" href="/Public/Home/css/pwd.css">
<div class="wrap">
  <div class="index loginbg" style="min-height: 630px;">
  <?php if($is_weixin == 0): ?><header class="list-head">
		<nav class="list-nav clearfix"> 
			<h3 class="list-title">登陆</h3>
		</nav>
    </header>
	<div class="logo">
	</div>
      <!-- 普通浏览器登录 -->
        <form id="reviseForm" class="i-form" method="post" action="<?php echo U('User/login');?>">
          <ul class="form-box">
               <li class="f-line clearfix" id="wxzh">
                <label class="f-label" style="color:#fff"><img src="/Public/Home/images/icons/icon-user.png" width="100%"></label>
                <input id="c-pwd" class="f-input" type="text" maxlength="20" placeholder="请输入账号" name="username">
               </li>
            <li class="f-line clearfix">
              <label class="f-label" style="color:#fff"><img src="/Public/Home/images/icons/icon-passwd.png" width="100%"></label>
              <input id="n-pwd" class="f-input" type="password" maxlength="20" placeholder="请输入密码" name="password">
            </li>
          </ul>
		  <!--div style="background:#666;opacity:0.4;height:4em;position:relative;bottom:-4em;Z-index:5"></div-->
		  <input type="submit" style="background-color: #3a5897; position: relative; Z-index: 10; margin-top: 29px;" value="立即登录" class="f-sub"/>
          <div class="forgot"><span class="fl">
          <a href="<?php echo U('User/outpwd');?>">忘记密码</a></span>
          <span class="fr"><span style="color: #d0d0d0;">还没有账号?</span><a href="<?php echo U('User/reg');?>">点此注册</a></span></div>

        </form><?php endif; ?> 
 <?php if($is_weixin == 2): ?><header class="list-head">
      <nav class="list-nav clearfix">
        <h3 class="list-title">登录</h3>
      </nav>
     </header>
      <!-- 微信浏览器登录 -->
         <form id="reviseForm" class="i-form" method="post" action="<?php echo U('User/login');?>">
          <ul class="form-box">
                <li class="f-line clearfix" style="display:none">
                <label class="f-label" style="color:#fff">用户名</label>
                <input id="c-pwd" class="f-input" type="text" value="<?php echo ($username); ?>" maxlength="20" placeholder="请输入账号" name="username">
               </li>
            <li class="f-line clearfix">
              <label class="f-label" style="color:#fff">密码</label>
              <input id="n-pwd" class="f-input" type="password" maxlength="20" placeholder="请输入密码" name="password">
            </li>
          </ul>
		  <!--div style="background:#666;opacity:0.4;height:4em;position:relative;bottom:-4em;Z-index:-5"></div-->
          <input type="submit" style="background-color:#FF4400;position:relative;Z-index:10" value="立即登录" class="f-sub"/>
          <div class="forgot"><span class="fl"></span><span class="fr"></span></div>
        </form><?php endif; ?> 
	<input id="wxopenid" type="hidden" value="<?php echo (session('wxopenid')); ?>" />
  </div>
</div>
<script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
<script src="/Public/Home/js/script.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/sea.js" async=""></script>
<script>
	if(isWeiXin()){
		var openid = $("#wxopenid").val();
		var username = "<?php echo (session('husername')); ?>";
		if(!username)
		{
			if(!openid){
				var appid = "wx073b4f54182001f2";
				var url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid="+appid+"&redirect_uri=http://wei.yytxzb.com/Home/User/oauth2&response_type=code&scope=snsapi_userinfo&state=1#wechat_redirect";
				window.location.href = url;
			}
		}else{
			$("#wxzh").hide();
		}
	}else{
		//alert("请你在微信端打开!");
		//this.window.opener = null;
		//window.close();
		//window.location.href = window.location.href;
	}
	function isWeiXin(){
		var ua = window.navigator.userAgent.toLowerCase();
		if(ua.match(/MicroMessenger/i) == 'micromessenger'){
			return true;
		}else{
			return false;
		}
	}
</script>