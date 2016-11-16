<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<title>西部微盘宝</title>
<link rel="stylesheet" href="/Public/Home/css/global.css">
<link rel="stylesheet" href="/Public/Home/css/index.css">
<link rel="stylesheet" href="/Public/Home/css/base.css">
<script language="javascript" type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
<script id="G--xyscore-load" type="text/javascript" charset="utf-8" async="" src="/Public/Home/js/xyscore_main.js"></script>
<script language="javascript" type="text/javascript" src="/Public/Home/js/common.js"></script>
</head>
<body>
<div class="wrap">
  <div class="index">
    <header class="list-head">
      <nav class="list-nav clearfix"> <a href="javascript:history.go(-1)" class="list-back"></a>
        <h3 class="list-title"><?php echo ($newsid['ntitle']); ?></h3>
      </nav>
    </header>
    <div class="news-list clearfix">
    <h1 style="text-align:center"><?php echo ($newsid['ntitle']); ?></h1>
	</div>
	<div style="text-indent:2em;line-height:1.5em;margin-top:2em;">
		<p style="width:95%;margin:0 auto;font-size:1.5em;line-height:1.5em"><?php $c=htmlspecialchars_decode($newsid['ncontent']);echo $c;?></p>
	</div>
   </div>
   <div class="menus clearfix">
        <ul>
            <li class="<?php if(isset($pagetype)): else: ?>menu-avtive<?php endif; ?>"><a class="<?php if(isset($pagetype)): ?>home<?php else: ?>homeF<?php endif; ?>" href="/Home/Index">首页</a></li>
            <li class='<?php if(isset($pagetype)): ?>menu-avtive<?php endif; ?> '><a class="<?php if(isset($pagetype)): ?>walletF<?php else: ?>wallet<?php endif; ?>" href="<?php echo U('Detailed/dtrading');?>">持仓</a></li>
            <li><a class="player" href="javascript:;">直播</a></li>
            <li><a class="service" href="javascript:;">客服</a></li>
        </ul>

    </div>
</div>
<script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
<script src="/Public/Home/js/script.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Home/js/sea.js" async=""></script>
</body>
</html>