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
  <link rel="stylesheet" href="/Public/Home/css/ticket.css">
  <script id="G--xyscore-load" type="text/javascript" charset="utf-8" async="" src="/Public/Home/js/xyscore_main.js"></script>

  <link rel="stylesheet" href="/Public/Home/css/personal_center.css">
  <link rel="stylesheet" href="http://at.alicdn.com/t/font_1474888892_755574.css">

  <div class="personal_recharge">
    <div class="personal_center_d">
      <i class="iconfont" id="personal_center_d_i"><a href="javascript:history.go(-1)">&#xe600;</a></i>
      交易卷
    </div>
    <ul class="personal_recharge_ul">
      <li class="personal_recharge_ul_li">名称</li>
      <li class="personal_recharge_ul_lia">面值</li>
      <li class="personal_recharge_ul_lia">状态</li>
      <li class="personal_recharge_ul_lib">有限期至</li>
    </ul>
    <ul class="personal_recharge_ula">
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<li><a href="<?php echo U('User/experienceid',array('eid'=>$vo['eid']));?>" class="clearfix"> <img src="/Public/Home/images/ticket-big.png" class="t-icon"><span class="t-left"><?php echo ($vo["eprice"]); ?>元</span> <em class="t-right">有限期至<?php echo (date('Y-m-d',(isset($vo["endtime"]) && ($vo["endtime"] !== ""))?($vo["endtime"]):time())); ?></em></a></li>-->
        <li class="personal_recharge_ul_li">注册新会员</li>
        <li id="personal_recharge_ul_lic">&yen;<?php echo ($vo["eprice"]); ?></li>
        <li id="personal_recharge_ul_lic">未使用</li>
        <li class="personal_recharge_ul_lib"><?php echo (date('Y-m-d',(isset($vo["endtime"]) && ($vo["endtime"] !== ""))?($vo["endtime"]):time())); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
  <script src="/Public/Home/js/script.js"></script>
  <script src="/Public/Home/js/getJuan.js"></script>
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