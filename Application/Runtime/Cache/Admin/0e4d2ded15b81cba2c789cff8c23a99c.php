<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>微盘系统管理中心</title>
    
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
    <!-- bootstrap -->
    <link href="/Public/Admin/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="/Public/Admin/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="/Public/Admin/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="/Public/Admin/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/icons.css" />
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

    <!-- navbar -->
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
            <a class="brand" href="index.html"><img src="/Public/Admin/img/logo.png" style="width:1.5em" /></a>

            <ul class="nav pull-right">                
                <!--li class="hidden-phone">
                    <input class="search" type="text" />
                </li>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-warning-sign"></i>
                        <span class="count">8</span>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="notifications">
                                <h3>你有6封邮件需要查收</h3>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新注册用户 刘易斯
                                    <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新注册用户 张二娃
                                    <span class="time"><i class="icon-time"></i> 18 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-envelope-alt"></i> 来自用户 好啊好 的邮件，请查收
                                    <span class="time"><i class="icon-time"></i> 28 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-signin"></i> 新注册用户 无法了解
                                    <span class="time"><i class="icon-time"></i> 49 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <i class="icon-download-alt"></i> 我的天空 的新订单
                                    <span class="time"><i class="icon-time"></i> 1 天前.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">查看全部邮件</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="notification-dropdown hidden-phone">
                    <a href="#" class="trigger">
                        <i class="icon-envelope-alt"></i>
                    </a>
                    <div class="pop-dialog">
                        <div class="pointer right">
                            <div class="arrow"></div>
                            <div class="arrow_border"></div>
                        </div>
                        <div class="body">
                            <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                            <div class="messages">
                                <a href="#" class="item">
                                    <img src="/Public/Admin/img/contact-img.png" class="display" />
                                    <div class="name">张二娃</div>
                                    <div class="msg">
                                        	我的钱太少了，能给我分一点前用用吗？
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                                </a>
                                <a href="#" class="item">
                                    <img src="/Public/Admin/img/contact-img2.png" class="display" />
                                    <div class="name">安吉丽娜朱莉</div>
                                    <div class="msg">
                                        请问管理员，为什么周末我无法购买产品。
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 26 分钟前.</span>
                                </a>
                                <a href="#" class="item last">
                                    <img src="/Public/Admin/img/contact-img.png" class="display" />
                                    <div class="name">路易斯</div>
                                    <div class="msg">
                                        提现太慢了，麻烦快一点。
                                    </div>
                                    <span class="time"><i class="icon-time"></i> 48 分钟.</span>
                                </a>
                                <div class="footer">
                                    <a href="#" class="logout">查看全部信息</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                        <?php echo ($_SESSION['username']); ?>
                        <b class="caret"></b>
                    </a>
                    <!--ul class="dropdown-menu">
                        <li><a href="<?php echo U('User/personalinfo');?>">个人信息</a></li>
                        <li><a href="<?php echo U('User/personalinfo');?>">账户设置</a></li>
                        <li><a href="<?php echo U('Order/olist');?>">查看订单</a></li>
                        <li><a href="<?php echo U('User/ulist');?>">查看客户</a></li>
                        <li><a href="<?php echo U('Goods/glist');?>">查看产品</a></li>
                    </ul-->
                </li>
                <!--li class="settings hidden-phone">
                    <a href="<?php echo U('User/personalinfo');?>" role="button">
                        <i class="icon-cog"></i>
                    </a>
                </li-->
                <li class="settings hidden-phone">
                    <a href="<?php echo U('Admin/User/signinout');?>" role="button">
                        <i class="icon-share-alt"></i>
                    </a>
                </li>
            </ul>            
        </div>
    </div>
    <!-- end navbar -->

    <!-- sidebar -->
    <div id="sidebar-nav">
        <ul id="dashboard-menu">
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <div class="pointer">
                    <div class="arrow"></div>
                    <div class="arrow_border"></div>
                </div>
                <a href="<?php echo U('Admin/Index/index');?>">
                    <i class="icon-home"></i>
                    <span>系统首页</span>
                </a>
            </li><?php endif; ?>
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-edit"></i>
                    <span>内容管理</span>
					<i class="icon-chevron-down"></i>
                </a>
				<ul class="submenu">
                    <li><a href="<?php echo U('Admin/News/typelist');?>">栏目管理</a></li>
                    <li><a href="<?php echo U('Admin/News/newslist');?>">文章管理</a></li>
                    <!--<li><a href="user-profile.html">我发布的文档</a></li>-->
					<!--<li><a href="user-profile.html">内容回收站</a></li>-->					
                </ul>
            </li><?php endif; ?>
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-calendar-empty"></i>
                    <span>产品管理</span>
					<i class="icon-chevron-down"></i>
                </a>
				<ul class="submenu">
                    <!--<li><a href="<?php echo U('Admin/Goods/gadd');?>">添加产品</a></li>-->
                    <li><a href="<?php echo U('Admin/Goods/glist');?>">产品列表</a></li>
                    <!--<li><a href="<?php echo U('Admin/Goods/gtypeadd');?>">添加商品分类</a></li>
                    <li><a href="<?php echo U('Admin/Goods/gtype');?>">商品分类列表</a></li>-->
                    <!--<li><a href="user-profile.html">回收站</a></li>-->				
                </ul>
            </li><?php endif; ?>
			<li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-th-large"></i>
                    <span>订单管理</span>
					<i class="icon-chevron-down"></i>
                </a>
				<ul class="submenu">
                    <!--li><a href="<?php echo U('Admin/Order/olist');?>">订单列表</a></li-->
                    <li><a href="<?php echo U('Admin/Order/tlist');?>">交易流水</a></li>
                    <!--<li><a href="<?php echo U('Admin/Order/blist');?>">充值提现流水</a></li>-->
                    <!--<li><a href="new-user.html">移除的订单</a></li>-->
                </ul>
            </li>
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>客户管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('User/ulist');?>">客户列表</a></li>
                    <!--<li><a href="<?php echo U('Admin/User/ugroup');?>">用户组设置</a></li>-->
                    <li><a href="<?php echo U('User/recharge');?>">充值和提现申请</a></li>
                    <li><a href="<?php echo U('User/recommend');?>">推广设置</a></li>
                    <li><a href="<?php echo U('User/agentlist');?>">经纪人申请列表</a></li>
                </ul>
            </li>
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>会员管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Menber/madd');?>">添加会员</a></li>
                    <li><a href="<?php echo U('Menber/mlist');?>">会员列表</a></li>
                </ul>
            </li><?php endif; ?>
			<!--if condition="$Think.session.userotype != 1" >
            <li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-picture"></i>
                    <span>优惠卷管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Coupons/cpadd');?>">添加优惠卷</a></li>
                    <li><a href="<?php echo U('Coupons/cplist',array('style'=>'list'));?>">优惠券列表</a></li>
					<li><a href="<?php echo U('Coupons/cplist',array('style'=>'oldlist'));?>">历史优惠卷</a></li>
                </ul>
            </li>
			</if-->
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <a class="dropdown-toggle" href="personal-info.html">
                    <i class="icon-code-fork"></i>
                    <span>系统管理员</span>
					<i class="icon-chevron-down"></i>
					<ul class="submenu">						
                        <li><a href="<?php echo U('Super/sadd');?>">添加管理员</a></li>
						<li><a href="<?php echo U('Super/slist');?>">管理员列表</a></li>
						<!--<li><a href="grids.html">管理员组</a></li>-->
					</ul>
                </a>
            </li><?php endif; ?>
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-cog"></i>
                    <span>系统设置</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                	<li><a href="<?php echo U('Super/esystem');?>">基本设置</a></li>
                    <!--<li><a href="grids.html">清理缓存</a></li>-->
                    <li><a href="<?php echo U('Super/backupdb');?>">数据备份</a></li>
					<!--li><a href="signin.html">数据还原</a></li-->
                    <li><a href="<?php echo U('User/signinout');?>">退出系统</a></li>
                </ul>
            </li><?php endif; ?>
			<?php if($_SESSION['userotype']!= 1): ?><li>
                <a class="dropdown-toggle" href="#">
                    <i class="icon-group"></i>
                    <span>微信管理</span>
                    <i class="icon-chevron-down"></i>
                </a>
                <ul class="submenu">
                    <li><a href="<?php echo U('Menber/wxinfo');?>">微信基本信息</a></li>
                    <li><a href="<?php echo U('Menber/wxlist');?>">微信用户列表</a></li>
                    <li><a href="<?php echo U('Menber/instruser');?>">更新微信用户</a></li>
                </ul>
            </li><?php endif; ?>
        </ul>
    </div>
    <!-- end sidebar -->


	<!-- main container -->
    <div class="content">

        <!-- settings changer -->
<!--         <div class="skins-nav">
            <a href="#" class="skin first_nav selected">
                <span class="icon"></span><span class="text">默认颜色</span>
            </a>
            <a href="#" class="skin second_nav" data-file="/Public/Admin/css/skins/dark.css">
                <span class="icon"></span><span class="text">黑色背景</span>
            </a>
        </div> -->
    	
	<!-- this page specific styles -->
	<link rel="stylesheet" href="/Public/Admin/css/compiled/article-add.css" type="text/css" media="screen" />
    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
			 <div class="row-fluid header">
                <h3>产品管理&nbsp;>&nbsp;添加产品</h3>
            </div>
            <div class="row-fluid form-wrapper">
            	<form action="<?php echo U('Goods/gedit');?>" method="post">
                <!-- left column -->
                <div class="span8 column">
                	<input type="hidden" name="pid" value="<?php echo ($editgood['pid']); ?>"/>
					<div class="field-box" style="width: 45%;">
						<label>商品名称：</label>
						<input class="span5" type="text" data-toggle="tooltip" data-trigger="focus" title="请输入商品名称" data-placement="right" name="ptitle" value="<?php echo ($editgood['ptitle']); ?>"/>
					</div>			
					<div class="field-box" style="width: 50%;">
						<label>单位：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="商品单位" data-placement="right" name="company" value="<?php echo ($editgood['company']); ?>"/>
					</div>
					<!--<div class="field-box">
						<label>所属分类:</label>
						<div class="ui-select span5">
							<select style="width:100%" name="cid">
									<?php if(is_array($pclist)): $i = 0; $__LIST__ = $pclist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pl): $mod = ($i % 2 );++$i;?><option selected="" value="<?php echo ($pl['cid']); ?>" <?php if($pl['cid'] == $editgood['cid']): ?>selected=""<?php endif; ?>><?php echo ($pl['cname']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>-->
					<div class="field-box" style="width: 45%;">
						<label>价格：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="手/元" data-placement="right" name="uprice" value="<?php echo ($editgood['uprice']); ?>"/>
					</div>
					<div class="field-box" style="width: 50%;">
						<label>手续费：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="手续费/元" data-placement="right" value="<?php echo ($editgood['feeprice']); ?>" name="feeprice"/>
					</div>
					<div class="field-box" style="width: 45%;">
						<label>浮动盈亏：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="浮动点数" data-placement="right" value="<?php echo ($editgood['wave']); ?>" name="wave"/>
					</div>
					<!-- <div class="field-box" style="width: 50%;">
						<label>外盘价格：</label>
						<em <?php if($editgood["cid"] == 1): ?>id="you"<?php elseif($editgood["cid"] == 2): ?>id="baiyin"<?php elseif($editgood["cid"] == 3): ?>id="tong"<?php else: endif; ?> class=""></em>
					</div>
					<div class="field-box" style="width: 45%;">
						<label>点差x：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="点差x" data-placement="right" value="<?php echo ($editgood['patx']); ?>" name="patx"/>
					</div>
					<div class="field-box" style="width: 50%;">
						<label>点差-：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="点差-" data-placement="right" value="<?php echo ($editgood['patj']); ?>" name="patj"/>
					</div> -->
					<!--div class="field-box" style="width: 45%;">
						<label>汇率：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="浮动点数" data-placement="right" value="<?php echo ($editgood['rate']); ?>" name="rate"/>
					</div-->
					<div class="field-box" style="width: 45%;">
						<label>隔夜利息：</label>
						<input class="span2" type="text" data-toggle="tooltip" data-trigger="focus" title="隔夜利息" data-placement="right" value="<?php echo ($editgood['gefee']); ?>" name="gefee"/>
					</div>
                    <div class="field-box actions">
						<input type="submit" class="btn-glow primary" value="提交"><!-- <span>或</span><input type="reset" value="重置" class="reset"> -->
					</div>
                </div>
				</form>
                <!-- right column -->
                <div class="span4 column pull-right">
                   <div class="field-box"><h3>说明：</h3></div>
				   <div class="field-box">添加商品务必正确填写手续费以及产品单价</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->


<!-- scripts for this page -->
<script src="/Public/Admin/js/jquery-latest.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script src="/Public/Admin/js/theme.js"></script>
<script type="text/javascript">
	butt();
	setInterval('butt()', 2000);
	function butt(){
		//获取油的价格到页面
		$.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/price');?>",         
			success: function(data) { 
				var yprice = $('#you').text();
				//最新油价
				$('#you').html(data[0]);
				if(data[0]<yprice){
					$('#you').attr("class","drop");
				}else if(data[0]==yprice){}else{
					$('#you').attr("class","rise");
				}              
			},  
		}); 
		//获取白银的价格到页面  
		$.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/byprice');?>",         
			success: function(data) {
				var byprice = $('#baiyin').text();
				//最新白银价
				$('#baiyin').html(data[0]); 
				if(data[0]<byprice){
					$('#baiyin').attr("class","drop");
				}else if(data[0]==byprice){}else{
					$('#baiyin').attr("class","rise");
				}                
			},  
		});
		//获取铜的价格到页面  
		$.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/toprice');?>",         
			success: function(data) {
				var toprice = $('#tong').text();
				//最新白银价
				$('#tong').html(data[0]);
				if(data[0]<toprice){
					$('#tong').attr("class","drop");
				}else if(data[0]==toprice){}else{
					$('#tong').attr("class","rise");
				}   
			},  
		});
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var eqli = $("#dashboard-menu").children().eq(2);
		eqli.attr('class','active');
		$("#dashboard-menu .active .submenu").css("display","block");
	});
</script>

    </div>
    <script type="text/javascript">
    	var wid = $(window).height();
    	document.writeln('<div id="popupLayer" style="position:absolute;z-index:2;width:100%;height:'+wid+'px;left:0;top:0;opacity:0.3;filter:Alpha(opacity=30);background:#000;display: none;"></div>');
    </script>
</body>
</html>