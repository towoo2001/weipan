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
<link rel="stylesheet" href="/Public/Admin/css/compiled/user-list.css" type="text/css" media="screen">
<div class="container-fluid">
            <div id="pad-wrapper" class="users-list">
                <div class="row-fluid header" style="margin-bottom: 10px">
					<form id="form1" action="/Admin/User/ulist" method="get">
                    <div class="span10 pull-left">
					
						<div class="tpsearch" style="width: 20%">
                    	手机号：<input type="text" class="span6 search" value="<?php echo ($sea["phone"]); ?>" placeholder="请输入手机号" name="phone" id="phone"/>
						</div>
						<div class="tpsearch"  style="width: 20%">
							用户名称：<input type="text" value="<?php echo ($sea["username"]); ?>" class="span6 search" placeholder="请输入用户名称查找..." name="username" id="username"/>
						</div>
						<div class="tpsearch" style="width: 20%">
							开始时间：<input type="text" value="<?php echo ($sea["starttime"]); ?>" class="input-large datepicker" style="margin-bottom: 0;width:100px;height:20px" name="starttime" id="starttime">
						</div>
						<div class="tpsearch" style="width: 20%">
							结束时间：<input type="text" value="<?php echo ($sea["endtime"]); ?>" class="input-large datepicker" style="margin-bottom: 0;width:100px;height:20px" name="endtime" id="endtime">
						</div>
						<div class="tpsearch" style="width: 20%">
                    	会员单位：<select name="oid" id="oid" class="span7">
                    				<option value="">默认不选</option>
									<?php if(is_array($huilist)): foreach($huilist as $key=>$vo): if($sea['oid'] == $vo['uid']){ ?>
										<option value="<?php echo ($vo["uid"]); ?>" selected><?php echo ($vo["username"]); ?></option>
										<?php }else{ ?>
										<option value="<?php echo ($vo["uid"]); ?>"><?php echo ($vo["username"]); ?></option>
										<?php } endforeach; endif; ?>
                    			</select>
						</div>
                    </div>
					<div class="tpsearch" style="width:12%;float:right">
						<a href="javascript:void(0)" class="btn-flat info" onclick="javascript:$('#form1').submit();">开始查找</a>
						<a href="javascript:void(0)" class="btn-flat info" onclick="sub()">查找导出</a>
					</div>
					</form>
                </div>
                <!-- Users table -->
                <div class="row-fluid table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="span1 sortable">
                                    编号
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>客户名
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>手机号码
                                </th>
                                <!--th class="span1 sortable">
                                    <span class="line"></span>地区
                                </th>
                                <th class="span1 sortable">
                                    <span class="line"></span>微信头像
                                </th-->
                                <th class="span2 sortable">
                                    <span class="line"></span>创建日期
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>上级
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>最近登录时间
                                </th>	
                                <th class="span1 sortable">
                                    <span class="line"></span>订单数量
                                </th>
                                <th class="span2 sortable">
                                    <span class="line"></span>账户余额
                                </th>
                                <th class="span1 sortable">
                                    <span class="line"></span>会员类别
                                </th>
                                <th class="span1 sortable">
                                    <span class="line"></span>操作
                                </th>
                            </tr>
                        </thead>
                        <tbody id="ajaxback">
                        <?php if(is_array($ulist)): $i = 0; $__LIST__ = $ulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ult): $mod = ($i % 2 );++$i;?><!-- row -->
                        <tr class="first">
                            <td>
                                <?php echo ($ult['uid']); ?>
                            </td>
                            <td>
                            	<?php if($ult["otype"] == 2): ?><a href="<?php echo U('Menber/mupdate',array('uid'=>$ult['uid']));?>"><?php echo ($ult['username']); ?></a>
                                	<?php else: ?>
                                	<a href="<?php echo U('User/updateuser',array('uid'=>$ult['uid']));?>"><?php echo ($ult['username']); ?></a><?php endif; ?>
                                
                                
                            </td>
                            <td>
                                <?php echo ($ult['utel']); ?>
                            </td>
                            <!--td>
                                <?php echo ($ult['address']); ?>
                            </td>
                            <td>
                            	<img src="/Public/Admin/img/contact-img.png" class="img-circle avatar hidden-phone" />
                            </td-->
                            <td>
                                <?php echo (date('Y-m-d',$ult['utime'])); ?>
                            </td>
                            <td>
                                <a href="<?php echo U('User/updateuser',array('uid'=>$ult['oid']));?>"><?php echo ($ult["managername"]); ?></a>
                            </td>
                            <td>
                            	<?php echo (date('Y-m-d H:m',$ult['utime'])); ?>
                            </td>
                            <td>
                            	<?php if($ult['ocount'] == 0): ?>0
                            	<?php else: ?>
                            		<a href=""><?php echo ($ult['ocount']); ?></a><?php endif; ?>
                            </td>
                            <td>
                            	<font color="#f00" size="4">￥<?php echo ($ult['balance']); ?><font>
                            </td>
                            <td>
                                <?php if($ult["otype"] == 0): ?>客户<?php endif; ?>
                                <?php if($ult["otype"] == 1): ?>经纪人<?php endif; ?>
                                <?php if($ult["otype"] == 2): ?>会员单位<?php endif; ?>
                                <?php if($ult["otype"] == 3): ?>超级管理员<?php endif; ?>
								<?php if($ult["otype"] == 4): ?>普通会员<?php endif; ?>
                            </td>
                            <td>
                            	<ul class="actions">
                                    <li><a href="<?php echo U('User/updateuser',array('uid'=>$ult['uid']));?>"><i class="table-edit"></i></a></li>
                                    <li class="last"><a href="<?php echo U('User/userdel',array('uid'=>$ult['uid']));?>" onclick="if(confirm('确定要删除吗?客户账户请谨慎操作！')){return true;}else{return false;}"><i class="table-delete"></i></a></li>
                                </ul>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>  
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td>总余额</td>
							<td><?php echo ($summoney); ?>元</td>
							<td></td>
							<td></td>
						</tr>
                        </tbody>
                    </table>
                    <!--div class="qjcz">
					截止<script type="text/javascript">var myDate = new Date();document.writeln(myDate.getFullYear()+'年'+(myDate.getMonth()+1)+'月'+myDate.getDate()+'日');</script>，共有<font color="#f00" size="4"><?php echo ($ucount); ?></font>个会员完成注册，交易数量已达<font color="#f00" size="4"><?php echo ($onumber); ?></font>手，所有账户余额累计<font color="#f00" size="5"><?php echo ($anumber); ?></font>元
				</div-->
                </div>
                <div class="pagination pull-right">
                    <ul>
                        <?php echo ($page); ?>
                    </ul>
                </div>
                <!-- end users table -->
            </div>
        </div>
<!-- scripts -->
<script src="/Public/Admin/js/jquery-latest.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script src="/Public/Admin/js/bootstrap.datepicker.js"></script>
<script src="/Public/Admin/js/theme.js"></script>
<script type="text/javascript">
    $(function () {
        $('.datepicker').datepicker().on('changeDate', function (ev) {
            $(this).datepicker('hide');
        });
    });
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var eqli = $("#dashboard-menu").children().eq(4);
		eqli.attr('class','active');
		$("#dashboard-menu .active .submenu").css("display","block");
		
		/** 
		 * 时间对象的格式化; 
		 */  
		Date.prototype.format = function(format) {  
		    /* 
		     * eg:format="yyyy-MM-dd hh:mm:ss"; 
		     */  
		    var o = {  
		        "M+" : this.getMonth() + 1, // month  
		        "d+" : this.getDate(), // day  
		        "h+" : this.getHours(), // hour  
		        "m+" : this.getMinutes(), // minute  
		        "s+" : this.getSeconds(), // second  
		        "q+" : Math.floor((this.getMonth() + 3) / 3), // quarter  
		        "S" : this.getMilliseconds()  
		        // millisecond  
		    }  
		  
		    if (/(y+)/.test(format)) {  
		        format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4  
		                        - RegExp.$1.length));  
		    }  
		  
		    for (var k in o) {  
		        if (new RegExp("(" + k + ")").test(format)) {  
		            format = format.replace(RegExp.$1, RegExp.$1.length == 1  
		                            ? o[k]  
		                            : ("00" + o[k]).substr(("" + o[k]).length));  
		        }  
		    }  
		    return format;  
		}
	});
function sub()
{
	$('#form1').attr("action","/Admin/User/daochu");
	$('#form1').submit();
}
</script>

    </div>
    <script type="text/javascript">
    	var wid = $(window).height();
    	document.writeln('<div id="popupLayer" style="position:absolute;z-index:2;width:100%;height:'+wid+'px;left:0;top:0;opacity:0.3;filter:Alpha(opacity=30);background:#000;display: none;"></div>');
    </script>
</body>
</html>