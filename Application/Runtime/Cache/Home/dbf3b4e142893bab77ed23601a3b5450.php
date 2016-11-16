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
<!-- <script id="G--xyscore-load" type="text/javascript" charset="utf-8" async="" src="/Public/Home/js/xyscore_main.js"></script> -->

<div class="wrap" style="min-height:60em">
  <div class="index">
    <header class="list-head" style="width:100%;">
      <nav class="list-nav clearfix"> <a href="<?php echo U('Index/index');?>" target="_self" class="list-back"></a>
        <input value="<?php echo ($order["cid"]); ?>" id="orcid" type="hidden">
          <input type="hidden" id="rate" value="<?php echo ($order["rate"]); ?>">
     
        <h3 class="list-title"><?php echo ($order["ptitle"]); ?></h3>
      </nav>
    </header>
    
        <div class="news-list2 clearfix">
          <input value="<?php echo ($order["wave"]); ?>" id="orwave" type="hidden">
          <input value="<?php echo ($order["ostyle"]); ?>" id="orostyle" type="hidden">
          <input value="<?php echo ($order["uprice"]); ?>" id="uprice" type="hidden">
          <p><span class="l_l3">订单号：</span><span class="l_l"><?php echo ($order["orderno"]); ?></span></p>
          <p><span class="l_l3">建仓时间：</span><span class="l_l"><?php echo (date('Y-m-d H:i:s',$order["buytime"])); ?></span></p>
          <p><span class="l_l3">入仓数量：</span><span class="l_l"><?php echo ($order["onumber"]); ?></span></p>
          <p class="oprice"><span class="l_l3">入仓价：</span><span class="l_l rucang" id="in_price"><?php echo ($order["buyprice"]); ?></span><span class="r_r"><?php echo ($order["cname"]); ?>现价：</span><span class="l_l" id="youjia"></p>
          <p>
              <span class="l_l3">止盈：</span><span><input type="text" class="sr_kuang" value="<?php echo ($order["endprofit"]); ?>" readOnly="true" id="zhiying">%&nbsp;&nbsp;止损：<input type="text" class="sr_kuang" value="<?php echo ($order["endloss"]); ?>" readOnly="true" id="zhikui">%&nbsp;&nbsp;<span class="sz box"><a href="javascript:;" class="bounceIn">设置</a></span></span>
          </p>
          <p><span class="l_l3">建仓金额：</span>
          <?php if($order["eid"] == 1): ?><span class="l_l"><em class="ykzjload"><img src="/Public/Home/images/loading.gif" alt="正在加载"/></em></span><?php else: ?>
             <span class="l_l" id="jiancj"></span><?php endif; ?>
          </p>
          <p><span class="l_l3">盈亏资金：</span>
          	<span class="l_l redd" id="ykzj"></span>
          	<span class="l_l redd" id="mykbfb"></span>
          <?php if($order["eid"] == 1): ?><span class="r_r"><img src="/Public/Home/images/ticket-small.png">(已使用<?php echo ($order["uprice"]); ?>元体验券)</span><?php endif; ?></p>
          <p><span class="l_l3">本单盈余：</span><span class="l_l" id="bdyy"></span></p>
         </div>
         <!-- <p class="qxpc">如该订单在结算时间（凌晨04:00）前还未平仓，将会被强行平仓</p> -->
         <input type="button" class="pwd-btn  conform" id="aa" value="确 认 平 仓" >

    <div class="box" style=" margin-top:-150px;">
    <div id="dialogBg"></div>
    <div id="dialog" class="orderid-1">
        <div class="dialogTop">
            <a href="javascript:;" class="claseDialogBtn">关闭</a>
        </div>
        <!--建仓确认-->
          <div class="pop-box none" id="buildBox" style="display: block; top: 50%; margin-top: 50%; margin-left: 0;">
           <nav class="pop-nav"> <a href="javascript:;" class="back" id="claseDialogBtn"></a>
              <h3>设置止盈/止损</h3>
            </nav>
            <form id="jccg" class="build-form" method="post" action="<?php echo U('Detailed/edityk');?>" autocomplete="off">
            <div class="b-line">
                <label class="b-label">确认数量：</label>
                <p class="num qrsl"><?php echo ($order["onumber"]); ?></p>
            </div>
            <div class="b-profit clearfix">
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
        	  <input type="hidden" name="oid" value="<?php echo ($order["oid"]); ?>" id="buyid">
        		<input type="hidden" name="zy" value="<?php echo ($order["endprofit"]); ?>" id="zy">
        		<input type="hidden" name="zk" value="<?php echo ($order["endloss"]); ?>" id="zk">
        		<input type="submit" class="pwd-btn  save" value="保存设置" onclick="baocun()">
		        </form>
          </div>

</div>

</div>
</div>
</div>
<div id="loading" style="width: 100%;height: 105%;position: absolute;top: 0; z-index: 9999;display: none;">
	<div class="load-center" style="background: #000;position: absolute;width: 60%;height: 14%;bottom: 10%;border-radius: 10px;color: #fff;text-align: center;font-size: 24px;left: 17%;padding: 1%;">
		<img src="/Public/Home/images/ajax-loading.jpg" alt="ajax-loading" width="40"/><br/>页面加载中...
	</div>
</div>

<link rel="stylesheet" href="/Public/Home/css/common.css"/>
<script type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
<script type="text/javascript">
  setInterval('butt()', 1000);
  setInterval('mybutt()', 500);
 setInterval('rate_new()', 5000);


function rate_new(){
   $.ajax({
    url: "<?php echo U('Detailed/newrate');?>",
    data:"pid="+<?php echo ($order["pid"]); ?>,  
    async:false,  
    success: function(result){
        $("#rate").val(result['rate']);
  
     
    }
  });
}

  function butt(){
      var nprice = $("#in_price").html();
      var rate=$("#rate").val();
    // alert(2);
   var alldata_url="/Home/Detailed/getnowdata";
   var way=$('#orcid').val();
   if(way==1){
		var code="CAD-LME";
   }else if(way==2){
		var code="XAGUSDOZ SC-FX";
   }else if(way==3){
    var code="CL I6-NX";
   }

var rows=45;
var interval=1;
var chart_type="area";
    $.ajax({
    url :alldata_url,
    dataType : 'jsonp',

    data : {
        type : chart_type,
                code : code,  
                rows : rows, 
                interval : interval
            },
         success: function(data) {

          var asd = sort_data(data);

       var intev=asd['44'];
 
 
       var intev2=intev.toString().split(",");
   var last=intev2['1'];
   var put=parseFloat(eval(last)*rate).toFixed(2);
          $('#youjia').html(put);
          //隐藏油价
          if(put>nprice){
         
            $('#youjia').attr("class","l_l redd");
          }else if(put==nprice){}else{
       
            $('#youjia').attr("class","l_l jg2");
          }              
        }
      }); 
  }
    function sort_data(result){




      var data = result;
      var ohlc = [],
        volume = [],
        dataLength = data.length;
 
     

        for (var i = 0; i < dataLength; i++) {
          ohlc.push([
            data[i][0], // the date
            parseFloat(data[i][1]) // close
          ]);
        }
    
 
      return ohlc;
    }
  function mybutt(){  
      $.ajax({  
        type: "post",  
        url: "<?php echo U('Detailed/orderxq');?>",    
        data:{"oid":$('#buyid').val(),"youjia":$('#youjia').html(),'cid':$('#orcid').val()},
        beforeSend:function(XMLHttpRequest){ 
            //alert('远程调用开始...'); 
       			},
        success: function(data) {
           $('#jiancj').html(data['jc']);
           $('#ykzj').html(data['ykzj']);
           if(data['bdyy']<0){
              $('#bdyy').html(0);
            }else{
              $('#bdyy').html(data['bdyy']);
            }
         
           var sum1= parseFloat(data['ykbfb']).toFixed(2);
           if(sum1!='NaN'){
           		$('#mykbfb').html('(<em id="ykbfb">'+sum1*100+'%</em>)');
           }
           
          //盈亏资金
          var sum= data['ykzj'];
          if(sum>0){
            $('#ykzj').attr("class","l_l redd");
          }else{
            $('#ykzj').attr("class","l_l jg2");
          }  
          
          if(sum1>0){
            $('#mykbfb').attr("class","l_l redd");
          }else{
            $('#mykbfb').attr("class","l_l jg2");
          }             
        },  
        error: function(data) {  
        //alert(data);
            }  
          }); 
      }
</script>
<script type="text/javascript">
window.onload=function(){
		var ref = document.referrer;
		var lhref = document.location.href;
		if(lhref.indexOf('marker')>0){
			if(ref.indexOf('index')>0){
				getSrceenWH();
				cted();
				className = "bounceIn";
				$('#dialogBg').fadeIn(300);
				$('#dialog').removeAttr('class').addClass('animated '+className+'').fadeIn();
			}	
		}
}
var w,h,className;
function getSrceenWH(){
	w = $(window).width();
	h = $(window).height();
	$('#dialogBg').width(w).height(h);
}

window.onresize = function(){  
	getSrceenWH();
}  
$(window).resize();  

$(function(){
	getSrceenWH();
  cted(); 
	//显示弹框
	$('.box a').click(function(){

		className = $(this).attr('class');
		$('#dialogBg').fadeIn(300);
		$('#dialog').removeAttr('class').addClass('animated '+className+'').fadeIn();
	});
	//关闭弹窗
	$('#claseDialogBtn').click(function(){
		$('#dialogBg').css('display','none');
		$('#dialog').css('display','none');
	});
});
  //获取数据库保持的比例，取出赋值到弹出显示的窗口。
  function cted(){
    $('.toclearfix li').each(function(){
        if($(this).val()==$('#zhiying').val()) {
            $(".toclearfix  li").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
        };
    });
    $('.myclearfix li').each(function(){
         if ($(this).val()==$('#zhikui').val()) {
             $(".myclearfix  li").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
         };
    });
  }
  $(".toclearfix  li").click(function(){
     $(".toclearfix  li").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
  });
  $(".myclearfix  li").click(function(){
     $(".myclearfix  li").eq($(this).index()).addClass("selected").siblings().removeClass("selected");
  });
  //获取最终改好的数据，并赋值到页面。然后提交方法
  function baocun(){
        $('.toclearfix').each(function(){
        	var zhiyin= $(this).children(".selected").val();
        	$('#zy').val(zhiyin);
        });
       	$('.myclearfix').each(function(){
            var zhikui= $(this).children(".selected").val();
            $('#zk').val(zhikui);
        });
  }

$("#aa").click(function(){
   //订单id
   var oid=$('#buyid').val();
   //油现价
   var youjia=$('#youjia').html();
   //需要给数据库添加的金额
   var bdyy=$('#bdyy').html();  
   //建仓金额
   var jiancj=$('#jiancj').html();
   //盈亏资金
   var ykzj=$('#ykzj').html();
   //产品单价
   var uprice=$('#uprice').val();
   if(bdyy == '' || bdyy == null || bdyy == 'undefined')
   {
		alert("慢点儿，网络跟不上了！");
		return false;
   }
   $.ajax({  
        type: "post",  
        url: "<?php echo U('Detailed/updateore');?>",    
        data:{"oid":oid,"youjia":youjia,"bdyy":bdyy,"jiancj":jiancj,"ykzj":ykzj,'uprice':uprice},
        success: function(data) {
			if(data == 9){
				alert("非交易时间禁止交易");
			}
           location.href = "<?php echo U('Index/index');?>";   
        },  
        error: function(data) {  
            //alert(data);
        }
        
      }); 
});
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