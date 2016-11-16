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
	<link rel="stylesheet" href="/Public/Admin/css/compiled/article.css" type="text/css" media="screen" />
    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>产品管理&nbsp;>&nbsp;产品列表</h3>
                <div class="span8 pull-right">
                    <input type="text" class="span6 search" placeholder="请输入商品名称查找..." id="top_search"/>
                    
                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->
                </div>
            </div>
			<!--<div class="row-fluid header head2">
				<a href="<?php echo U('Goods/gadd');?>" class="btn-flat success">
					添加商品
				</a>
				<a href="<?php echo U('Goods/gtype');?>" class="btn-flat success">
					商品分类
				</a>
			</div>-->
            <!-- Users table -->
            <!--div>
            <div style="width: 130px;float:left">
       
            <ul>
                
                 新能源
            	<li>
            		买涨  <font color="#ed0000" id="you_z"></font>
            	</li>
            	<li>
            		买跌  <font color="#2fb44e" id="you_d"></font>
            	</li>
 
            </ul>
            </div>
         <div style="width: 130px;float:left">
       
            <ul>
              工艺银
          	<li>
            		买涨  <font color="#ed0000" id="yin_z"></font>
            	</li>
            	<li>
            		买跌  <font color="#2fb44e" id="yin_d"></font>
            	</li>
 
            </ul>
            </div>
                     <div style="width: 130px;float:left">
                  
            <ul>
              工艺铜
      		 	<li>
            		买涨  <font color="#ed0000" id="tong_z"></font>
            	</li>
            	<li>
            		买跌  <font color="#2fb44e" id="tong_d"></font>
            	</li>
 
            </ul>
            </div>
            </div-->
            <form  action="<?php echo U('Goods/gdel');?>" method="post" name="del">
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="span1 sortable">
								<!--<input type="checkbox">-->
                                编号
                            </th>
                            <th class="span3 sortable">
                                <span class="line"></span>商品名称
                            </th>
							<th class="span3 sortable">
                                <span class="line"></span>价格/手
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>浮动盈亏
                            </th>
							<th class="span2 sortable">
                                <span class="line"></span>手续费
                            </th>
                       <!--      <th class="span2 sortable">
                                <span class="line"></span>外盘价
                            </th> -->
							<!--<th class="span3 sortable">
                                <span class="line"></span>所属分类
                            </th>-->
                      <!--       <th class="span2 sortable">
                                <span class="line"></span>点差x
                            </th>
                            <th class="span2 sortable">
                                <span class="line"></span>点差-
                            </th> -->
                              <th class="span2 sortable">
                                <span class="line"></span>隔夜利息
                            </th>
							<th class="span1 sortable">
                                <span class="line"></span>操作
                            </th>
                        </tr>
                    </thead>
                    <tbody id="ajaxback">
                    <?php if(is_array($goodlist)): $i = 0; $__LIST__ = $goodlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$gl): $mod = ($i % 2 );++$i;?><!-- row -->
                    <tr class="first">
						<td>
							<!--<input type="checkbox" name="pid[]" value="<?php echo ($gl['pid']); ?>">-->
                            <?php echo ($gl['pid']); ?>
                        </td>
                        <td>
                            <a href="<?php echo U('Goods/gedit',array('pid'=>$gl['pid']));?>" class="name"><?php echo ($gl['ptitle']); ?></a>
                        </td>
                        <td>
                            <font color="#f00" size="3"><?php echo ($gl['uprice']); ?></font>元
                        </td>
                        <td>
                        	<?php echo ($gl['wave']); ?>
                        </td>
                        <td>
							<?php echo ($gl['feeprice']); ?>
                        </td>
                          <td>
							<?php echo ($gl['gefee']); ?>
                        </td>
                   <!--      <td>
							<em <?php if($gl["cid"] == 1): ?>class="you"<?php elseif($gl["cid"] == 2): ?>class="baiyin"<?php elseif($gl["cid"] == 3): ?>class="tong"<?php else: endif; ?>></em>
                        </td> -->
						<!--<td>
                            <?php echo ($gl['cname']); ?>
                        </td>-->
                     <!--    <td>
                        	<?php echo ($gl['patx']); ?>
                        </td>
                        <td>
                        	<?php echo ($gl['patj']); ?>
                        </td> -->
                        <td>
							<ul class="actions">
								<li style="border: 0;"><a href="<?php echo U('Goods/gedit',array('pid'=>$gl['pid']));?>"><i class="table-edit"></i></a></li>
								<!--<li class="last"><a href="<?php echo U('Goods/gdel',array('pid'=>$gl['pid']));?>" onclick="if(confirm('确定要删除吗?')){return true;}else{return false;}"><i class="table-delete"></i></a></li>-->
							</ul>
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
				<!--<div class="qjcz">
					<a id="checkall">全选</a>
					<a id="checkallno">全不选</a>
					<a id="check_revsern">反选</a>
					<input type="submit" id='sbtn' onclick ="return valid();" value="批量删除">
				</div>-->
            </div>
            <input id="yprice" type="hidden" value=""/>
            <input id="byprice" type="hidden" value=""/>
            <input id="toprice" type="hidden" value=""/>
            </form>
            <div class="pagination pull-right">
                <ul>
                    <?php echo ($page); ?>
                </ul>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->


<!-- scripts -->
<script src="/Public/Admin/js/jquery-latest.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js"></script>
<script src="/Public/Admin/js/theme.js"></script>
<script type="text/javascript">  
	butt();
	setInterval('butt()', 2000);
	setInterval('num()', 2000);
	function num(){
		    $.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/number');?>",         
			success: function(data) { 

			   $("#you_z").html(data.you_z);
			   $("#you_d").html(data.you_d);
			   $("#yin_z").html(data.yin_z);
			   $("#yin_d").html(data.yin_d);
			   $("#tong_z").html(data.tong_z);
			   $("#tong_d").html(data.tong_d);
 
          
			},  
		}); 
	}
	function butt(){  
		//获取油的价格到页面
		var yprice = $('#yprice').val();
		var byprice = $('#byprice').val();
		var toprice = $('#toprice').val();
		$.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/price');?>",         
			success: function(data) { 
				//最新油价
				$('.you').html(data[0]);
				$('#yprice').val(data[0]);
				if(data[0]<yprice){
					$('.you').attr("class","you drop");
				}else if(data[0]==yprice){}else{
					$('.you').attr("class","you rise");
				}              
			},  
		}); 
		//获取白银的价格到页面  
		$.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/byprice');?>",         
			success: function(data) {
				//最新白银价
				$('.baiyin').text(data[0]); 
				$('#byprice').val(data[0]);
				if(data[0]<byprice){
					$('.baiyin').attr("class","baiyin drop");
				}else if(data[0]==byprice){}else{
					$('.baiyin').attr("class","baiyin rise");
				}                
			},  
		});
		//获取铜的价格到页面  
		$.ajax({  
			type: "post",  
			url: "<?php echo U('Goods/toprice');?>",         
			success: function(data) {
				//最新白银价
				$('.tong').text(data[0]);
				$('#toprice').val(data[0]);
				if(data[0]<toprice){
					$('.tong').attr("class","tong drop");
				}else if(data[0]==toprice){}else{
					$('.tong').attr("class","tong rise");
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
	
	$("#checkall").click(function(){
	    $("input[name='pid[]']").each(function(){
	        this.checked = true;
	    });
	});
	 
	$("#checkallno").click(function(){
	    $("input[name='pid[]']").each(function(){
	        this.checked = false;
	    })
	});
	 
	$("#check_revsern").click(function(){
	    $("input[name='pid[]']").each(function(){
	        if (this.checked) {
	            this.checked = false;
	        }
	        else {
	            this.checked = true;
	        }
	    });
	});
	
	$("input[type='checkbox']").click(function(){
		$("#sbtn").attr("onclick","if(confirm('确定要删除吗?请谨慎操作')){return true;}else{return false;}");
	})
});

function valid(){
	  var check = "";
      $("input:checkbox[name='pid[]']:checked").each(function() {
			check += $(this).val();
	  });
      if(check==''){
      	alert('请选择要删除的产品');
      	return false;
      	}else{ 
      	return true;
      }	
};
//搜索结果，ajax返回搜索框搜索结果
$('#top_search').keyup(function(){
	keywords = $(this).val();
	$.ajax({  
	    type: "post",  
	    url: "<?php echo U('Goods/glist?step=search');?>",    
	    data:{"keywords":keywords},
	    success: function(data) {
	    	if(data=="null"){
            	//$("#loading").hide();
            	$("#ajaxback").html('<tr class="first"><td colspan="13">没有找到结果，请重新输入！</tr></td>');
            }else{
		    	$glist = "";
	            $.each(data,function(no,items){
	            	$glist += '<tr class="first">';
	            	$glist += '<td><input type="checkbox" name="pid[]" value="'+items.pid+'">'+items.pid+'</td>';
	            	$glist += '<td><a href="<?php echo U('Goods/gedit');?>?pid='+items.pid+'" class="name">'+items.ptitle+'</a></td>';
	            	$glist += '<td>￥'+items.uprice+'</td>';
	            	$glist += '<td>￥'+items.feeprice+'</td>';
	            	$glist += '<td>￥'+items.cname+'<td>';
	            	$glist += '<ul class="actions">';
	            	$glist += '<li><a href="<?php echo U('Goods/gedit');?>?pid='+items.pid+'"><i class="table-edit"></i></a></li>';
					$glist += '<li><i class="table-settings"></i></li>';
					$glist += '<li class="last"><a href="<?php echo U('Goods/gdel');?>?pid='+items.pid+'" onclick="if(confirm(\'确定要删除吗?\')){return true;}else{return false;}"><i class="table-delete"></i></a></li>';
	            	$glist += '</ul></td></tr>';
	            })
	            $("#ajaxback").html($glist);
            }
	    },
	    error: function(data) {  
            console.log(data);
        }
	  })
})
</script>

    </div>
    <script type="text/javascript">
    	var wid = $(window).height();
    	document.writeln('<div id="popupLayer" style="position:absolute;z-index:2;width:100%;height:'+wid+'px;left:0;top:0;opacity:0.3;filter:Alpha(opacity=30);background:#000;display: none;"></div>');
    </script>
</body>
</html>