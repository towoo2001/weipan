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
    <link rel="stylesheet" href="/Public/Home/css/common.css" />
    <script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
    <div class="jryk">
        <i class="iconfont" style="float:left;margin: 0 10px;"><a href="javascript:history.go(-1)" style="color:#fff;">&#xe600;</a></i>
        <div class="yk_left">今日盈亏(元)</div>
        <div class="yk_con"></div>
        <div class="yk_right box2">
        </div>
        <div class="clearfix"></div>
    </div>
    <input type="hidden" id="tpqh" value="1">
    <input type="hidden" id="rate1" value="<?php echo ($rate["0"]["rate"]); ?>">
    <input type="hidden" id="rate2" value="<?php echo ($rate["1"]["rate"]); ?>">
    <input type="hidden" id="rate3" value="<?php echo ($rate["2"]["rate"]); ?>">
    <input type="hidden" id="price1" value="">
    <input type="hidden" id="price2" value="">
    <input type="hidden" id="price3" value="">
    <div class="index-tag">
        <div class="tag">
            <ul class="tag-tit clearfix">
                <li>西部铜</li>
                <li>西部银</li>
                <li>西部沥青</li>
            </ul>
            <ul class="clearfix">
                <li class="sum-arrows-up"><span id="baiyinjia"></span><img src="/Public/Home/images/arrows-up.jpg" id="one"><img src="/Public/Home/images/arrows-down.jpg" id="two"></li>
                <li class="sum-arrows-up"><span id='tongjia'></span><img src="/Public/Home/images/arrows-up.jpg" id="three"><img src="/Public/Home/images/arrows-down.jpg" id="four"></li>
                <li class="sum-arrows-up"><span id='liqing'></span><img src="/Public/Home/images/arrows-up.jpg" id="five"><img src="/Public/Home/images/arrows-down.jpg" id="six"></li>
            </ul>
        </div>
        <p class="tag-line"></p>
    </div>
    <div class="b-line noclearfix" style="margin-bottom:0;" id="useror">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%" style="font-size:1.2em">价格盈亏</td>
                <td width="15%" style="font-size:1.2em">建仓价</td>
                <td width="24%" style="font-size:1.2em">产品</td>
                <td width="11%" style="font-size:1.2em">方向</td>
                <td width="0%" style="display:none"></td>
                <td width="25%" style="font-size:1.2em">操作</td>
            </tr>
            <?php if(is_array($nolist)): $i = 0; $__LIST__ = $nolist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$on): $mod = ($i % 2 );++$i;?><!-- 油 -->
                <?php if($on["cid"] == 1): ?><tr class="ykzf openpay">
                        <td class="Profit1" style="font-size:1.2em">--</td>
                        <td class="ykzfwave" style="display:none"><?php echo ($on["wave"]); ?></td>
                        <td class="ykzfostyle" style="display:none"><?php echo ($on["ostyle"]); ?></td>
                        <td class="ykzfeid" style="display:none"><?php echo ($on["eid"]); ?></td>
                        <td class="ptitle" style="display:none"><?php echo ($on["ptitle"]); ?></td>
                        <td class="uprice" style="display:none"><?php echo ($on["uprice"]); ?></td>
                        <td class="oid" style="display:none"><?php echo ($on["oid"]); ?></td>
                        <td style="display:none" class="yincangyoujia latest-price"></td>
                        <td class="buyprice" style="font-size:1.2em"><?php echo ($on["buyprice"]); ?></td>
                        <input type="hidden" id="Profit11" value="<?php echo ($on["buyprice"]); ?>">
                        <td style="font-size:1.1em"><?php echo ($on["ptitle"]); ?></td>
                        <td>
                            <?php if($on["ostyle"] == 1): ?><font style="font-size:1.2em" color="#2fb44e">空</font>
                                <?php else: ?>
                                <font style="font-size:1.2em" color="#ed0000">多</font><?php endif; ?>
                        </td>
                        <td class="onumber" style="width:0px;display:none"><?php echo ($on["onumber"]); ?></td>
                        <td class="endprofit" style="width:0px;display:none"><?php echo ($on["endprofit"]); ?></td>
                        <td class="endloss" style="width:0px;display:none"><?php echo ($on["endloss"]); ?></td>
                        <td class="mypwd-btn chr">
                            <a href="<?php echo U('Detailed/orderid');?>?orderid=<?php echo ($on["oid"]); ?>" class="red hide1" data-cid='<?php echo ($on["cid"]); ?>' data-oid='<?php echo ($on["oid"]); ?>'>平仓</a>
                            <a href="javascript:void(0);" class="blue hide1" data-onumber='<?php echo ($on["onumber"]); ?>' data-oid='<?php echo ($on["oid"]); ?>' data-zy='<?php echo ($on["endprofit"]); ?>' data-zk='<?php echo ($on["endloss"]); ?>'>设置</a>
                            <div style="clear: both;"></div>
                        </td>
                    </tr><?php endif; ?>
                <!-- 银-->
                <?php if($on["cid"] == 2): ?><tr class="ykzf1 openpay">
                        <td class="Profit2" style="font-size:1.5em">--</td>
                        <td class="ykzfwave" style="display:none"><?php echo ($on["wave"]); ?></td>
                        <td class="ykzfostyle" style="display:none"><?php echo ($on["ostyle"]); ?></td>
                        <td class="ykzfeid" style="display:none"><?php echo ($on["eid"]); ?></td>
                        <td class="ptitle" style="display:none"><?php echo ($on["ptitle"]); ?></td>
                        <td class="uprice" style="display:none"><?php echo ($on["uprice"]); ?></td>
                        <td class="oid" style="display:none"><?php echo ($on["oid"]); ?></td>
                        <td style="display:none" class="ycbaiyinjia latest-price"></td>
                        <td class="buyprice2" style="font-size:1.5em"><?php echo ($on["buyprice"]); ?></td>
                        <input type="hidden" id="Profit22" value="<?php echo ($on["buyprice"]); ?>">
                        <td style="font-size:1.1em"><?php echo ($on["ptitle"]); ?></td>
                        <td>
                            <?php if($on["ostyle"] == 1): ?><font style="font-size:1.5em" color="#2fb44e">空</font>
                                <?php else: ?>
                                <font style="font-size:1.5em" color="#ed0000">多</font><?php endif; ?>
                        </td>
                        <td class="onumber" style="display:none"><?php echo ($on["onumber"]); ?></td>
                        <td class="endprofit" style="width:0px;display:none"><?php echo ($on["endprofit"]); ?></td>
                        <td class="endloss" style="width:0px;display:none"><?php echo ($on["endloss"]); ?></td>
                        <td class="mypwd-btn chr">
                            <a href="<?php echo U('Detailed/orderid');?>?orderid=<?php echo ($on["oid"]); ?>" class="red hide1" data-cid='<?php echo ($on["cid"]); ?>' data-oid='<?php echo ($on["oid"]); ?>'>平仓</a>
                            <a href="javascript:void(0);" class="blue hide1" data-onumber='<?php echo ($on["onumber"]); ?>' data-oid='<?php echo ($on["oid"]); ?>' data-zy='<?php echo ($on["endprofit"]); ?>' data-zk='<?php echo ($on["endloss"]); ?>'>设置</a>
                            <div style="clear: both;"></div>
                        </td>
                    </tr><?php endif; ?>
                <?php if($on["cid"] == 3): ?><tr class="ykzf1 openpay">
                        <td class="Profit2" style="font-size:1.5em">--</td>
                        <td class="ykzfwave" style="display:none"><?php echo ($on["wave"]); ?></td>
                        <td class="ykzfostyle" style="display:none"><?php echo ($on["ostyle"]); ?></td>
                        <td class="ykzfeid" style="display:none"><?php echo ($on["eid"]); ?></td>
                        <td class="ptitle" style="display:none"><?php echo ($on["ptitle"]); ?></td>
                        <td class="uprice" style="display:none"><?php echo ($on["uprice"]); ?></td>
                        <td class="oid" style="display:none"><?php echo ($on["oid"]); ?></td>
                        <td style="display:none" class="ycbaiyinjia latest-price"></td>
                        <td class="buyprice2" style="font-size:1.5em"><?php echo ($on["buyprice"]); ?></td>
                        <input type="hidden" id="Profit22" value="<?php echo ($on["buyprice"]); ?>">
                        <td style="font-size:1.1em"><?php echo ($on["ptitle"]); ?></td>
                        <td>
                            <?php if($on["ostyle"] == 1): ?><font style="font-size:1.5em" color="#2fb44e">空</font>
                                <?php else: ?>
                                <font style="font-size:1.5em" color="#ed0000">多</font><?php endif; ?>
                        </td>
                        <td class="onumber" style="display:none"><?php echo ($on["onumber"]); ?></td>
                        <td class="endprofit" style="width:0px;display:none"><?php echo ($on["endprofit"]); ?></td>
                        <td class="endloss" style="width:0px;display:none"><?php echo ($on["endloss"]); ?></td>
                        <td class="mypwd-btn chr">
                            <a href="<?php echo U('Detailed/orderid');?>?orderid=<?php echo ($on["oid"]); ?>" class="red hide1" data-cid='<?php echo ($on["cid"]); ?>' data-oid='<?php echo ($on["oid"]); ?>'>平仓</a>
                            <a href="javascript:void(0);" class="blue hide1" data-onumber='<?php echo ($on["onumber"]); ?>' data-oid='<?php echo ($on["oid"]); ?>' data-zy='<?php echo ($on["endprofit"]); ?>' data-zk='<?php echo ($on["endloss"]); ?>'>设置</a>
                            <div style="clear: both;"></div>
                        </td>
                    </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <ul class="clearfix" style='display:none'>
            <li class="sum-arrows-up"><span id="baiyinjia"></span><img src="/Public/Home/images/arrows-up.jpg" id="one"><img src="/Public/Home/images/arrows-down.jpg" id="two"></li>
            <li class="sum-arrows-up"><span id='tongjia'></span><img src="/Public/Home/images/arrows-up.jpg" id="three"><img src="/Public/Home/images/arrows-down.jpg" id="four"></li>
        </ul>
        <ul class="product-box-nav fl clearfix" style='display:none'>
            <li class="sw_active" value="1"><a>西部银</a> </li>
            <li value="2"> <a>西部铜</a> </li>
        </ul>
        <div class="box">
            <div id="dialogBg2"></div>
            <div id="dialog2" style="margin-left: -187px;">
                <div class="dialogTop">
                    <a href="javascript:;" class="claseDialogBtn">关闭</a>
                </div>
                <!--建仓确认-->
                <div class="pop-box none" id="buildBox2" style="display: block;margin-top:-295px;">
                    <nav class="pop-nav">
                        <a href="javascript:;" class="backtop" id="claseDialogBtn2"></a>
                        <h3>设置止盈/止损</h3>
                    </nav>
                    <form id="jccg" class="build-form" method="post" action="<?php echo U('Index/edityk');?>" autocomplete="off">
                        <div class="b-line">
                            <label class="b-label">确认数量：</label>
                            <p class="num qrsl"><?php echo ($order["onumber"]); ?></p>
                        </div>
                        <div class="b-profit">
                            <p class="b-p-t">止盈</p>
                            <ul class="toclearfix">
                                <li value="0">不设</li>
                                <li value="10">10%</li>
                                <li value="20">20%</li>
                                <li value="30">30%</li>
                                <li value="40">40%</li>
                                <li value="50">50%</li>
                            </ul>
                            <p class="b-p-t">止损</p>
                            <ul class="myclearfix">
                                <li value="0">不设</li>
                                <li value="10">10%</li>
                                <li value="20">20%</li>
                                <li value="30">30%</li>
                                <li value="40">40%</li>
                                <li value="50">50%</li>
                            </ul>
                        </div>
                        <input type="hidden" name="oid" value="" id="buyid">
                        <input type="hidden" name="zy" value="" id="zy">
                        <input type="hidden" name="zk" value="" id="zk">
                        <input type="submit" class="pwd-btn" value="保存设置" onclick="baocun()">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/Home/js/script.js"></script>
    <script>
    setInterval('butt1()', 1000);
    setInterval('butt2()', 1000);
    setInterval('butt3()', 1000);
    setInterval('rate_new()', 10000);

    function rate_new() {
        $.ajax({
            url: "/Home/Index/newrate.html",
            async: false,
            success: function(result) {
                $("#rate1").val(result['0']['rate']);
                $("#rate2").val(result['1']['rate']);
            }
        });
    }
    $('.blue').click(function() {
            //className = $(this).attr('class');
            var onumber = $(this).attr('data-onumber');
            var zy = $(this).attr('data-zy');
            var zk = $(this).attr('data-zk');
            $('.qrsl').text(onumber);
            $('#buyid').val($(this).attr('data-oid'));
            $('zy').val(zy);
            $('zk').val(zk);
            $('.toclearfix li').each(function() {
                if ($(this).val() == zy) {
                    $(".toclearfix  li").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
                };
            });
            $('.myclearfix li').each(function() {
                if ($(this).val() == zk) {
                    $(".myclearfix  li").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
                };
            });
            $('#dialogBg2').fadeIn(200);
            $('#dialog2').removeAttr('class').addClass('animated bounceIn').fadeIn(200);
        })
        //关闭弹窗
    $('#claseDialogBtn2').click(function() {
        $('#dialogBg2').fadeOut(200, function() {
            $('#dialog2').addClass('bounceOutUp').fadeOut(200);
        });
    });

    function openpay(oid, pe, expend) {
        var openpay = $('.openpay');
        var newprice, ploss, wine, bfb;
        if (openpay) {
            openpay.each(function() {
                if ($(this).find('.oid').text() == oid) {
                    ploss = $(this).find('.ploss').text();
                    newprice = $(this).find('.latest-price').text();
                    wine = parseFloat(ploss * 1 + expend * 1, 2);
                    bfb = parseFloat(ploss / expend * 100, 2);
                }
            })
            if (newprice >= pe) {
                $('.payprice').html('<em class="rise" id="payprice">' + newprice + '</em>');
            } else {
                $('.payprice').html('<em class="drop" id="payprice">' + newprice + '</em>');
            }
            $('.payploss').html(ploss + '(' + bfb + '%)');
            $('.comiss').text(wine);
            if (ploss < 0) {
                $('.payploss').css('color', '#2fb44e');
            } else {
                $('.payploss').css('color', '#ed0000');
            }

        }

    }
    //关闭弹窗
    $('#claseDialogBtn3').click(function() {
        $('#dialogBg3').fadeOut(200, function() {
            $('#dialog3').addClass('bounceOutUp').fadeOut(200);
        });
    });
    $('.payout').click(function() {
        $('#dialogBg3').fadeOut(200, function() {
            $('#dialog3').addClass('bounceOutUp').fadeOut(200);
        });
    });

    setInterval('pcprice()', 1000);
    setInterval('refresh()', 10000);

    function refresh() {
        $.ajax({
            type: 'post',
            url: "<?php echo U('Index/refresh');?>",
            success: function(data) {
                if (data == 1) {
                    window.location.reload();
                }
            }
        });
    }

    function pcprice() {
        var yinprice1 = 0; //第一种产品的盈亏
        var yinprice2 = 0; //第二种产品的盈亏

        var ykzf = $(".ykzf"); //第一种产品列表
        ykzf.each(function() {
            var youjia = parseFloat($('#baiyinjia').html()).toFixed(2); //当前油价
            var buyprice = parseFloat($(this).children(".buyprice").html()).toFixed(2); //当前产品的入仓价
            var ykzfostyle = $(this).children(".ykzfostyle").html(); //状态0是涨，1是跌
            var ykzfeid = $(this).children(".ykzfeid").html(); //是否体验卷0不是，1是
            var onumber = $(this).children(".onumber").html(); //购买手数
            var ykzfwave = $(this).children(".ykzfwave").html(); //波动
            var uprice = $(this).children(".uprice").html(); //单价
            var pay = onumber * uprice; //保证金
            var endprofit = $(this).children(".endprofit").html() / 100; //止盈比例
            var endloss = $(this).children(".endloss").html() / 100; //止损比例
            var oid = $(this).children(".oid").html(); //订单id
            if (ykzfeid == 0) {
                if (ykzfostyle == 0) {
                    var newprice1 = eval(youjia - buyprice) * ykzfwave * onumber; //当前盈亏
                } else {
                    var newprice1 = eval(buyprice - youjia) * ykzfwave * onumber; //当前盈亏
                };
                var sum = eval(newprice1 + '+' + pay); //当前订单保证金的金额
                var ykzj = newprice1;
                sum2 = newprice1;
                yinprice1 = sum2 + yinprice1;
                var newprice3 = sum2.toFixed(2);
            } else {
                var newprice3 = 0;
            }

            if (youjia == "NaN") {
                $(this).children(".Profit1").text("");
            } else {
                $(this).children(".Profit1").html(newprice3);
                if (newprice3 >= 0) {
                    $(this).children(".Profit1").css('color', '#ed0000')
                } else {
                    $(this).children(".Profit1").css('color', '#2fb44e')
                }
            }
        });
        //第二种产品列表
        var ykzf1 = $(".ykzf1");
        ykzf1.each(function() {
            var youjia = parseFloat($('#tongjia').html()).toFixed(2); //当前白银价
            var buyprice1 = parseFloat($(this).children(".buyprice2").html()).toFixed(2); //当前产品的入仓价
            var ykzfostyle = $(this).children(".ykzfostyle").html(); //状态0是涨，1是跌
            var ykzfeid = $(this).children(".ykzfeid").html(); //是否体验卷0不是，1是
            var onumber = $(this).children(".onumber").html(); //数量
            var ykzfwave = $(this).children(".ykzfwave").html(); //波动
            var uprice = $(this).children(".uprice").html(); //单价
            var pay = onumber * uprice; //保证金
            var endprofit = $(this).children(".endprofit").html() / 100; //止盈比例
            var endloss = $(this).children(".endloss").html() / 100; //止损比例
            var oid = $(this).children(".oid").html(); //订单id
            if (ykzfeid == 0) {
                if (ykzfostyle == 0) {
                    var yinprice1 = eval(youjia - buyprice1) * ykzfwave * onumber; //现价-购买价*利率*手数当前盈亏
                } else {
                    var yinprice1 = eval(buyprice1 - youjia) * ykzfwave * onumber; //现价-购买价*利率*手数当前盈亏
                };
                var sum = eval(yinprice1 + '+' + pay); //给数据库添加
                var ykzj = yinprice1;
                sum2 = yinprice1;
                yinprice2 = sum2 + yinprice2;
                var yinprice3 = sum2.toFixed(2);
            } else {
                var yinprice3 = 0;
            }
            if (youjia == "NaN") {
                $(this).children(".Profit2").text("");
            } else {
                $(this).children(".Profit2").html(yinprice3);
                if (yinprice3 >= 0) {
                    $(this).children(".Profit2").css('color', '#ed0000')
                } else {
                    $(this).children(".Profit2").css('color', '#2fb44e')
                }
            }
        });
        var picsum = Number(yinprice1 + yinprice2).toFixed(2);
        if (picsum == "NaN") {
            $('.yk_con').html();
        } else if (picsum > 0) {
            $('.yk_con').html("+" + picsum);
        } else if (picsum < 0) {
            $('.yk_con').html(picsum);
            $('.yk_con').css("color", "yellow");
        }
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