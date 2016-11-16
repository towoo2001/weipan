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
    <link rel="stylesheet" href="http://at.alicdn.com/t/font_1474888892_755574.css">
    <script id="G--xyscore-load" type="text/javascript" charset="utf-8" async="" src="/Public/Home/js/xyscore_main.js"></script>
    <link rel="stylesheet" href="/Public/Home/css/personal_center.css">
    <div class="personal_recharge" >
        <div class="personal_center_d">
            <i class="iconfont" id="personal_center_d_i"><a href="javascript:history.go(-1)">&#xe600;</a></i>
            收支明细
        </div>
        <ul class="personal_Prepaid_ul">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!--<li><a href="<?php echo U('Detailed/revenueid',array('jno'=>$vo['jno']));?>" class="clearfix">-->
                <!--<?php if($vo["jtype"] != '建仓'): ?>-->
                <!--<img src="/Public/Home/images/sz.png" class="t-icon2">-->
                <!--<?php else: ?>-->
                <!--<img src="/Public/Home/images/sz2.png" class="t-icon2">-->
                <!--<?php endif; ?>-->
                <!--<div class="t-left2">-->
                <!--<p class="pc"><?php echo ($vo["jtype"]); ?>(<?php echo ($vo["remarks"]); ?> <?php echo ($vo["number"]); if($vo["jtype"] != '推广'): ?>手<?php endif; ?>)</p>-->
                <!--<p class="ye">余额：<?php echo ($vo["balance"]); ?></p>-->
                <!--</div>-->
                <!--<div class="t-right2">-->
                <!--<?php if($vo["jtype"] == '建仓'): ?>-->
                <!--<p class="jg2">-<?php echo ($vo["jincome"]); ?></p>-->
                <!--<?php else: ?>-->
                <!--<p class="jg"><?php echo ($vo["jincome"]); ?></p>-->
                <!--<?php endif; ?>-->
                <!--<p class="rq"><?php echo (date('Y-m-d H:i:s',$vo["jtime"])); ?></p>-->
                <!--</div>-->
                <!--<div class="clearfix"></div>-->
                <!--</a>-->
                <!--</li>-->
                <?php if($vo["jtype"] != '建仓'): ?><li class="personal_Prepaid_ul_li"><img src="/Public/Home/images/img-.jpg" alt=""></li>
                    <li class="personal_Prepaid_ul_lia"><?php echo ($vo["jtype"]); ?></li>
                    <li class="personal_Prepaid_ul_lib">-<?php echo ($vo["jincome"]); ?></li>
                    <li class="personal_Prepaid_ul_lic">余额：<?php echo ($vo["balance"]); ?>元</li>
                    <li class="personal_Prepaid_ul_lid"><?php echo (date('Y-m-d H:i:s',$vo["jtime"])); ?></li>
                    <?php else: ?>
                    <li class="personal_Prepaid_ul_li"><img src="/Public/Home/images/img+.jpg" alt=""></li>
                    <li class="personal_Prepaid_ul_lia"><?php echo ($vo["jtype"]); ?></li>
                    <li class="personal_Prepaid_ul_lib"><?php echo ($vo["jincome"]); ?></li>
                    <li class="personal_Prepaid_ul_lic">手续费：-<?php echo ($vo["jfee"]); ?><br>余额：<?php echo ($vo["balance"]); ?>元</li>
                    <li class="personal_Prepaid_ul_lid"><?php echo (date('Y-m-d H:i:s',$vo["jtime"])); ?></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <div class="pagelist"><?php echo ($page); ?></div>
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