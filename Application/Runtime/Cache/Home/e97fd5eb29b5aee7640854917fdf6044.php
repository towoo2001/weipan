<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="format-detection" content="email=no">
	<title>微盘</title>

	<link rel="stylesheet" type="text/css" href="/Public/Home/css/cd.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/foot.css" />
	<script language="javascript" type="text/javascript" src="/Public/Home/js/jquery.min.js"></script>
	<script language="javascript" type="text/javascript" src="/Public/Home/js/cd.js"></script>
	<script language="javascript" type="text/javascript" src="/Public/Home/js/common.js"></script>

	<link rel="stylesheet" href="/Public/Home/css/base.css">
	<link rel="stylesheet" href="/Public/Home/css/index.css">


</head>
<body>
</body>
</html>

	<link rel="stylesheet" href="/Public/Home/css/global.css">
	<link rel="stylesheet" href="/Public/Home/css/index.css">
	<link rel="stylesheet" href="/Public/Home/css/pwd.css">
	<div class="wrap">
		<div class="index loginbg" style="min-height: 500px;">
			<header class="list-head">
				<nav class="list-nav clearfix"> <a href="javascript:history.go(-1)" class="list-back"></a>
					<h3 class="list-title">注册</h3>
				</nav>
			</header>
			<div class="logo">
			</div>
			<!--if condition="$openid eq ''"-->
			<form id="reviseForm" class="i-form" method="post"  onsubmit='return false;'>  <!-- action="<?php echo U('User/register');?>" -->
				<input type="hidden" name="oid" value="<?php echo ($oid); ?>">
				<input type="hidden" name="uid" value="<?php echo ($uid); ?>">
				<input type="hidden" name="oldotype" value="<?php echo ($otype); ?>">
				<ul class="form-box">
					<li class="f-line clearfix">
						<label class="f-label"><img src="/Public/Home/images/icons/icon-user.png" width="100%"></label>
						<input id="c-name" class="f-input text" type="text" maxlength="16" placeholder="请输入用户名" name="username">
					</li>
					<li class="f-line clearfix">
						<label class="f-label"><img src="/Public/Home/images/icons/icon-phone.png" width="100%"></label>
						<input id="c-pho" class="f-input text" type="text" maxlength="11" placeholder="请输入手机号码" name="utel">
					</li>
					<li class="f-line clearfix">
						<label class="f-label"><img src="/Public/Home/images/icons/icon-passwd.png" width="100%"></label>
						<input id="n-pwd" class="f-input text" type="password" maxlength="15" placeholder="请输入六位新密码" name="upwd">
					</li>
					<li class="f-line clearfix">
						<label class="f-label"><img src="/Public/Home/images/icons/icon-repasswd.png" width="100%"></label>
						<input id="r-pwd" class="f-input text" type="password" maxlength="15" placeholder="再次输入六位新密码" name="repassword">
					</li>
					<li class="f-line clearfix">
						<label class="f-label"><img src="/Public/Home/images/icons/icon-code.png" width="100%"></label>
						<input id="c-pwd" class="f-input2 text" type="text " maxlength="6" placeholder="请输短息验证码" name="code">
						<input type="button" value="获取验证码" id="mes" onclick="get_mobile_code()" class="f-sub2"><br />
					</li>
					<?php if(($otype != '') && ($otype != 1) && ($otype != 0)): ?><li class="f-line clearfix">
							<label class="f-label">会员等级</label>
							<select id="otype" name="otype" class="f-input2 text">
								<?php if($otype == 4): ?><option value="0">客户</option>
									<option value="1">经纪人</option>
									<?php elseif($otype == 2): ?>
									<option value="0">客户</option>
									<option value="4">普通会员</option>
									<?php elseif($otype == 1): ?>
									<option value="0">客户</option>
									<?php else: ?>
									<option value="0">客户</option><?php endif; ?>
							</select>
						</li>
						<?php else: ?>
						<li class="f-line clearfix" style="display:none">
							<label class="f-label">会员等级</label>
							<select id="otype" name="otype" class="f-input2 text">
								<option value="0">客户</option>
							</select>
						</li><?php endif; ?>
				</ul>
				<div id='btnAgree' class="fr">
					<div style="float:left;width:100%">
					<input name="agree" type="checkbox" value="1" class="text"  id="check" checked/>&nbsp;<span style="color: #9e9e9e;font-size: 11px;">我已阅读和同意<span id='btnBook'>《服务协议及隐私条款》</span></span>
					</div>
					<div style="height:100px;overflow:scroll;color:black;border: 1px solid #d0d0d0;display: none" id="panel">
						我已阅读 《风险提醒》
						重要提示：请您务必在参与西部微盘前详细阅读本规则并充分理解下列文字内容!

						西部微盘提供实盘资金和交易通道，客户根据本参与规则，通过入金或话费充值支付交易综合费用及承诺承担有限操盘亏损赔付义务后，获得在限定时间内限定数量的工艺银，新能源和工艺铜操作权和操盘利润分配权。

						交易标的物

						在西部微盘提供的交易平台上进行交易的所有交易品种。

						交易数量

						具体细则参照西部微盘发布的相关交易规则及管理规定执行。

						交易报价

						西部微盘综合国际贵金属现货市场价格和国内其他贵金属现货市场价格以及中国人民银行人民币兑美元基准汇率、市场供求关系等，连续报出交易中心贵金属现货的人民币中间指导价。西部微盘根据相应的管理办法，在上述人民币中间指导价的基础上，连续报出贵金属现货的人民币价格。

						操盘时长

						当日06:00:00－次日04:00:00，操盘时长均截至次日04:00:00，时间一到系统将自动结算。

						结算止盈

						当客户操盘浮盈额达到保证金的一定比例时，系统将自动中止客户操作权并按止盈额进行结算。该比例可由客户自行设为10%、20%、30%、40%、50%，或不选择。

						结算止损

						当客户操盘浮亏额达到保证金的一定比例时，系统将自动中止客户操作权并按止亏额进行结算。该比例可由客户自行设为10%、20%、30%、40%、50%，或不选择。

						交易手续费

						用于支付在委托买卖产品时应支付服务费用。具体细则参照西部微盘发布的相关交易规则及管理规定执行。

						故障约定

						如因交易系统故障导致客户无法正常交易，双方约定以04:00:00夜间收盘价作为平仓价。

						交易时间、结算时间

						周一早上06:00:00-周六凌晨04:00:00为交易时间;交易日04:00:00-06:00:00为系统结算时间。

						数据显示差异申明

						因系统后台保留的小数点位数要长于前端展示给客户的小数点位数，加之系统后台计算自动四舍五入因素，两种数据取值的计算结果存在一定差异，以系统后台结算数据为准。

						交易风险申明

						1）技术风险：由于交易是通过电子通讯技术来实现的，这些技术存在着被网络黑客和病毒攻击的可能，由此可能给客户带来损失，客户将不得不承担由此导致的损失。

						2）由于微盘并不能控制电讯信号的中断和连接以及互联网的畅通，也不能保证客户自身网络设备及电讯设备的稳定性，由此等原因而使客户遭受的损失，由客户自行承担，西部微盘不负有任何责任。

						3）不可抗力因素导致的风险：诸如地震、火灾、水灾、战争、暴动、罢工等不可抗力因素导致的交易中断、延误等风险，西部微盘不承担责任，但应在条件允许的范围内采取必要的补救措施以减少因不可抗力造成的损失

						4）其他风险：由于客户密码失密、操作不当、投资决策失误等原因可能会发生亏损，该损失将由客户自行承担；

						参与规则完善申明

						本规则解释权归属西部微盘，同时西部微盘保留对参与规则进行必要的变更和完善。

						周一早上06:00:00-周六凌晨04:00:00 为交易时间;交易日04:00:00-06:00:00 为系统结算时间。

						入市有风险，投资需谨慎！

						确认
					</div>
				</div>
				<div style="float:left;width:100%;padding-bottom: 20px;">
					<button type="botton" class="f-sub fl" style="width:100%;background:#3a5897" id='send'>注册</button>
					<!--a href="<?php echo U('User/login');?>"><input type="submit" value="返回登录" class="f-sub fr" style=" width: 43%; background: #00b7b7;" ></a-->
				</div>
				<!--div class="forgot"><span class="fl"><a href="<?php echo U('User/login');?>">已有账号，立即登录</a></span></div-->
			</form>
			<!--else/>

                <form  class="i-form" method="post" action="<?php echo U('User/myreg');?>" >
                  <input type="hidden" name="oid" value="<?php echo ($oid); ?>">
                  <input type="hidden" name="openid" value="<?php echo ($openid); ?>">
                   <input type="hidden" name="uid" value="<?php echo ($uid); ?>">
                  <ul class="form-box">
                    <li class="f-line clearfix">
                      <label class="f-label">初始密码</label>
                      <input id="c-name" class="f-input text" type="text" maxlength="16" placeholder="请输入初始密码" name="upwd">
                    </li>
                   </ul>
                    <input type="submit" value="注册" class="f-sub" id='send'>
                </form>

            </if-->
		</div>
	</div>
	<script src="/Public/Home/js/jquery-2.1.1.min.js"></script>
	<script src="/Public/Home/js/script.js"></script>
	<script type="text/javascript" charset="utf-8" src="/Public/Home/js/sea.js" async=""></script>
	<script language="javascript">
		function get_mobile_code(){
			$.post(
					'/Home/User/smsverify',
					{mobile:jQuery.trim($('#c-pho').val())}, function(msg) {
						alert(jQuery.trim(msg));
						if(msg=='提交成功'){
							RemainTime();
						}
					});
		};
		var iTime = 59;
		var Account;
		function RemainTime(){
			document.getElementById('mes').disabled = true;
			var iSecond,sSecond="",sTime="";
			if (iTime >= 0){
				iSecond = parseInt(iTime%60);
				iMinute = parseInt(iTime/60)
				if (iSecond >= 0){
					if(iMinute>0){
						sSecond = iMinute + "分" + iSecond + "秒";
					}else{
						sSecond = iSecond + "秒";
					}
				}
				sTime=sSecond;
				if(iTime==0){
					clearTimeout(Account);
					sTime='获取手机验证码';
					iTime = 59;
					document.getElementById('mes').disabled = false;
				}else{
					Account = setTimeout("RemainTime()",1000);
					iTime=iTime-1;
				}
			}else{
				sTime='没有倒计时';
			}
			document.getElementById('mes').value = sTime;
		}
	</script>
	<style type="text/css">
		.formtips{
			text-align:center;
			width: 100%;
		}
	</style>
	<script type="text/javascript">

		$(function(){
			//如果是必填的，则加红星标识.
			//文本框失去焦点后
			$('form :input').blur(function(){
				var $parent = $(this).parent();
				$parent.find(".formtips").remove();
				//验证用户名
				if( $(this).is('input[name="username"]') ){
					if( this.value=="" || this.value.length < 6 ){
						var errorMsg = '请输入至少6位的用户名.';
						$parent.append('<input  class="f-input formtips onError" type="text" value="'+errorMsg+'" > ');
					}else{
						$parent.append('<input class="f-input formtips onSuccess" style="display:none" type="text"  > ');
					}
				}
				//手机号码验证
				if( $(this).is('input[name="utel"]') ){
					if(!/^1[34578]\d{9}$/.test(this.value)){
						var errorMsg = '请输入正确的手机号码.';
						$parent.append('<input  class="f-input formtips onError" type="text" value="'+errorMsg+'" > ');
					}else{
						$parent.append('<input class="f-input formtips onSuccess" style="display:none" type="text"  > ');
					}
				}

				//密码验证
				if( $(this).is('input[name="upwd"]') ){
					if( this.value=="" ){
						var errorMsg = '请输入正确的密码.';
						$parent.append('<input  class="f-input formtips onError" type="text" value="'+errorMsg+'" > ');
					}else{
						$parent.append('<input class="f-input formtips onSuccess" style="display:none" type="text"  > ');
					}
				}
				//确认密码验证
				if( $(this).is('input[name="repassword"]') ){
					if( this.value!=$('#n-pwd').val()){
						var errorMsg = '两次密码不一样.';
						$parent.append('<input  class="f-input formtips onError" type="text" value="'+errorMsg+'" > ');
					}else{
						$parent.append('<input class="f-input formtips onSuccess" style="display:none" type="text"  > ');
					}
				}
			}).keyup(function(){
				$(this).triggerHandler("blur");
			}).focus(function(){
				$(this).triggerHandler("blur");
			});//end blur
			//提交，最终验证。
			$('#send').click(function(){
				var pho = $("#c-pho").val();
				var otype = $("#otype").val();
				if(pho == "")
				{
					$('#regvif').html("请输入手机号！");
					$("#regvif").attr("style","color:red");
					return false;
				}
				if($("#c-pwd").val() == ""){
					$('#regvif').html("请输入验证码！");
					$("#regvif").attr("style","color:red");
					return false;
				}
				if(!$("#check")[0].checked){
					$('#regvif').html("请同意注册协议");
					$("#regvif").attr("style","color:red");
					return false;
				}
				var p = 0;
				$.ajax({
					type: 'POST',
					data:{'pho':pho},
					url: "/Home/User/yanpho",
					async:false,
					dataType: "json",
					success:function(data){
						if(data == 1)
						{
							$('#regvif').html("*该手机号码已被注册！");
							$("#regvif").attr("style","color:red");
							p = 1;
						}else{
							$('#regvif').html("*号码可用！");
							$("#regvif").attr("style","color:#11B136")
						}
					}
				});
				if(p == 1)
				{
					return false;
				}




				$("form :input.text").trigger('blur');
				var numError = $('form .onError').length;
				if(numError){
					return false;
				}

				$.ajax({
					type: "post",
					url: "<?php echo U('User/register');?>",
					data:$('#reviseForm').serialize(),
					async:false,
					success: function(data) {
						if(data==1){
							alert("注册成功");
							window.location.href="/";
						}
						if(data==2){
							alert("注册失败");return false;
						}
						if(data==0){
							alert("验证码错误");return false;
						}
						if(data==3){
							alert("用户名重复");return false;
						}


					},

				});





			});
			//服务条款效果
			$("#btnBook").click(function(){
				$("#panel").slideToggle("slow");
			});


		})

	</script>