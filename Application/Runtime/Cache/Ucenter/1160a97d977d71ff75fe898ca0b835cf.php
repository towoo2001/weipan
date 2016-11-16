<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>誉狼微盘</title>		
		
		<!-- Import google fonts - Heading first/ text second -->
        <!--link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' /-->
        <!--[if lt IE 9]>
<link href="http://fonts.useso.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="assets/ico/favicon.ico" type="image/x-icon" />    

	    <!-- Css files -->
	    <link href="/Public/Ucenter/css/bootstrap.min.css" rel="stylesheet">		
		<link href="/Public/Ucenter/css/jquery.mmenu.css" rel="stylesheet">		
		<link href="/Public/Ucenter/css/font-awesome.min.css" rel="stylesheet">
		<link href="/Public/Ucenter/css/climacons-font.css" rel="stylesheet">
		    
	    <link href="/Public/Ucenter/css/style.min.css" rel="stylesheet">
		<link href="/Public/Ucenter/css/add-ons.min.css" rel="stylesheet">		
		<link type="text/css" rel="stylesheet" href="/Public/Ucenter/css/calendar.css" >
		<script type="text/javascript" src="/Public/Ucenter/js/calendar.js" ></script>  
		<script type="text/javascript" src="/Public/Ucenter/js/calendar-zh.js" ></script>
		<script type="text/javascript" src="/Public/Ucenter/js/calendar-setup.js"></script>
	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
</head>

<body>
	<!-- start: Header -->
	<div class="navbar" role="navigation">
	
		<div class="container-fluid">		
			
			<ul class="nav navbar-nav navbar-actions navbar-left">
				<li class="visible-md visible-lg"><a href="" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
				<li class="visible-xs visible-sm"><a href="" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>			
			</ul>
			
			<!-- <form class="navbar-form navbar-left">
				<button type="submit" class="fa fa-search"></button>
				<input type="text" class="form-control" placeholder="Search..."></a>
			</form> -->
			<!-- <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费模板</a></div> -->
	        <ul class="nav navbar-nav navbar-right">
				<li class="dropdown visible-md visible-lg">
	        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img class="user-avatar" src="/Public/Ucenter/img/avatar.jpg" alt="user-mail"><?php echo (session('newusername')); ?></a>
	        		<!-- <ul class="dropdown-menu">
						<li class="dropdown-menu-header">
							<strong>Account</strong>
						</li>						
						<li><a href="page-profile.html"><i class="fa fa-user"></i> Profile</a></li>
						<li><a href="page-login.html"><i class="fa fa-wrench"></i> Settings</a></li>
						<li><a href="page-invoice.html"><i class="fa fa-usd"></i> Payments <span class="label label-default">10</span></a></li>
						<li><a href="gallery.html"><i class="fa fa-file"></i> File <span class="label label-primary">27</span></a></li>
						<li class="divider"></li>						
						<li><a href="index.html"><i class="fa fa-sign-out"></i> Logout</a></li>	
	        		</ul> -->
	      		</li>
				<li><a href="/Admin/"><i class="fa fa-power-off"></i></a></li>
			</ul>
			
		</div>
		
	</div>
	<!-- end: Header -->
	
	<div class="container-fluid content">
	
		<div class="row">
				
			<!-- start: Main Menu -->
			<div class="sidebar ">
								
				<div class="sidebar-collapse">
					<div class="sidebar-header t-center">
                        <!--span><img style="width:125px;" class="text-logo" src="/Public/Admin/img/logo.png"></span-->
                    </div>										
					<div class="sidebar-menu">						
						<ul class="nav nav-sidebar">
							<!--<li><a href="index.html"><i class="fa fa-laptop"></i><span class="text"> Dashboard</span></a></li>-->
							<?php if($_SESSION['userotype']== 4): ?><li>
								<a href="#"><i class="fa fa-file-text"></i><span class="text"> 开户管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									
									<li><a href="<?php echo U('Account/agentlist');?>"><i class="fa fa-folder"></i><span class="text"> 经纪人列表</span></a></li>
									<li><a href="<?php echo U('Account/agentadd');?>"><i class="fa fa-user"></i><span class="text"> 添加经纪人</span></a></li>
									
								</ul>	
							</li><?php endif; ?>
							<?php if($_SESSION['userotype']== 2): ?><li>
								<a href="#"><i class="fa fa-file-text"></i><span class="text"> 开户管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									
									<li><a href="<?php echo U('Ordinary/agentlist');?>"><i class="fa fa-folder"></i><span class="text"> 普通会员列表</span></a></li>
									<li><a href="<?php echo U('Ordinary/agentadd');?>"><i class="fa fa-user"></i><span class="text"> 添加普通会员</span></a></li>
									
								</ul>	
							</li><?php endif; ?>
							<li>
								<a href="#"><i class="fa fa-list-alt"></i><span class="text"> 交易流水</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li><a href="<?php echo U('Trade/recharge');?>"><i class="fa fa-indent"></i><span class="text"> 充值/提现</span></a>
									</li>
									<li><a href="<?php echo U('Trade/tradelist');?>"><i class="fa fa-indent"></i><span class="text"> 交易流水</span></a></li>
								</ul>
							</li>
							
							<li>
								<a href="#"><i class="fa fa-signal"></i><span class="text"> 客户管理</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li><a href="<?php echo U('Customer/customerlist');?>"><i class="fa fa-random"></i><span class="text"> 客户列表</span></a></li>
									<li><a href="<?php echo U('Customer/customeradd');?>"><i class="fa fa-user"></i><span class="text"> 添加客户</span></a></li>
								</ul>
							</li>
							<li>
								<a href="#"><i class="fa fa-signal"></i><span class="text">审核列表</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li><a href="<?php echo U('Customer/verifylist');?>"><i class="fa fa-random"></i><span class="text"> 审核列表</span></a></li>
								</ul>
							</li>
							<!--li>
								<a href="#"><i class="fa fa-briefcase"></i><span class="text"> 返佣记录</span> <span class="fa fa-angle-down pull-right"></span></a>
								<ul class="nav sub">
									<li><a href="<?php echo U('Retlog/returnloglist');?>"><i class="fa fa-align-left"></i><span class="text"> 返佣记录</span></a></li>
									
								</ul>
							</li-->
							
						</ul>
					</div>					
				</div>
				<div class="sidebar-footer"></div>	
				
			</div>
			<!-- end: Main Menu -->
		
		<!-- start: Content -->
			
<div class="main sidebar-minified">
<style type="text/css">
	.datatable,.datatable th{text-align:center;}
</style>
<!--/row-->
			<div class="row">		
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2><i class="fa fa-table red"></i><span class="break"></span><strong>交易流水</strong>
								<div style="display: inline-block; margin-left: 20px">
								 <form id="tradefrom"  method="get" action="<?php echo U('Trade/tradelist');?>">
									<span>起始时间：</span><input style="width:12%;border:10px" value="<?php echo ($sea["starttime"]); ?>" type="text" id="starttime" name="starttime" onclick="return showCalendar('starttime', 'y-mm-dd');"  />
									<span>结束时间：</span><input style="width:12%;border:10px" value="<?php echo ($sea["endtime"]); ?>" type="text" id="endtime" name="endtime" onclick="return showCalendar('endtime', 'y-mm-dd');"  />
									<span>交易类型：</span>
									<select style="width:100px;border:10px" name="ostaus">
										<option></option>
										<?php if($sea["ostaus"] == 4): ?><option value="4" selected>建仓</option>
										<?php else: ?>
										<option value="4">建仓</option><?php endif; ?>
										<?php if($sea["ostaus"] == 1): ?><option value="1" selected>平仓</option>
										<?php else: ?>
										 <option value="1">平仓</option><?php endif; ?>
										<?php if($sea["ostaus"] == 2): ?><option value="2" selected>爆仓</option>
										<?php else: ?>
										<option value="2">爆仓</option><?php endif; ?>
										<?php if($sea["ostaus"] == 3): ?><option value="3" selected>隔夜利息扣除</option>
										<?php else: ?>
										<option value="3">隔夜利息扣除</option><?php endif; ?>
									</select>
									<span>下级单位</span>
									<select style="width:100px;border:10px" name="oid">
										<option></option>
										<?php if(is_array($huilist)): foreach($huilist as $key=>$vo): if($sea['oid'] == $vo['uid']){ ?>
										<option value="<?php echo ($vo["uid"]); ?>" selected><?php echo ($vo["username"]); ?></option>
										<?php }else{ ?>
										<option value="<?php echo ($vo["uid"]); ?>"><?php echo ($vo["username"]); ?></option>
										<?php } endforeach; endif; ?>
									</select>
									<span>名字：</span><input type="text" style="width:12%;border:10px" value="<?php echo ($sea["jusername"]); ?>" name="jusername">
										<a class="btn btn-danger" id="tradebut">
												<i class="fa">搜索</i> 
										</a>
										<a class="btn btn-danger" id="tradebut">
												<i class="fa" onclick="sub()">查询导出</i> 
										</a>
								  </form>
								 </div> 
</h2>
							<div class="panel-actions">
								<a href="" ><i class="fa fa-rotate-right"></i></a>
								<a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="table.html#" class="btn-close"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
							  <thead>
								  <tr>
									  <th>编号</th> <th>用户</th> <th>操作时间</th> <th>产品</th> <th>数量</th> <th>交易类型</th> <th>状态</th>  <th>金额</th> <th>手续费</th><th>入仓价</th> <th>平仓价</th><th>盈亏</th><th>隔夜利息</th>
								  </tr>
							  </thead>   
							  <tbody>
							  <?php if(is_array($ordlist)): foreach($ordlist as $key=>$vo): ?><tr> 
										<td><?php echo ($vo["jno"]); ?></td>
		                                <td><?php echo ($vo["jusername"]); ?></td>
										<td><?php echo (date('Y-m-d H:i:s',$vo["jtime"])); ?></td>
										<td><?php echo ($vo["remarks"]); ?></td>
										<td><?php echo ($vo["number"]); ?></td>
										<td><?php echo ($vo["jtype"]); ?></td>
										<?php if($vo["jostyle"] == 0): ?><td>涨</td> <?php else: ?> <td>跌</td><?php endif; ?>
										<td><?php echo ($vo['number']*$vo['juprice']); ?></td>
										<td><?php echo ($vo["jfee"]); ?></td>
		                                <td><?php echo ($vo["jbuyprice"]); ?></td>
		                                <td><?php echo ($vo["jsellprice"]); ?></td>
										<td><?php echo ($vo["jploss"]); ?></td>
										<td><?php echo ($vo["gefee"]); ?></td>
									</tr><?php endforeach; endif; ?> 
									
								
								
							  </tbody>
						  </table> 
							<span style="margin-right:30px;float:right">总金额：<i style="color:red"><?php echo ($sumbuymoney); ?>元</i>总盈亏：<i style="color:red"><?php echo ($sumploss); ?>元</i>总手续费：<i style="color:red"><?php echo ($sumfee); ?>元</i></span>
						   <div class="pagelist"><?php echo ($show); ?></div>	
						</div>
					</div>
				</div><!--/col-->
			
			</div><!--/row-->
   
		</div>
<script>
function sub()
{
	$('#tradefrom').attr("action","/Ucenter/Trade/daochu");
	$('#tradefrom').submit();
}
</script>
 
		<!-- end: Content -->
		<br><br><br>
		
		
		
		
	</div><!--/container-->
		
	
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Warning Title</h4>
				</div>
				<div class="modal-body">
					<p>Here settings can be configured...</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="clearfix"></div>
	
		
	<!-- start: JavaScript-->
	<!--[if !IE]>-->

			<script src="/Public/Ucenter/js/jquery-2.1.1.min.js"></script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script src="/Public/Ucenter/js/jquery-1.11.1.min.js"></script>
	
	<![endif]-->

	<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/Ucenter/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
		</script>

	<!--<![endif]-->

	<!--[if IE]>
	
		<script type="text/javascript">
	 	window.jQuery || document.write("<script src='/Public/Ucenter/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
		</script>
		
	<![endif]-->
	<script src="/Public/Ucenter/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="/Public/Ucenter/js/bootstrap.min.js"></script>	
	
	
	<!-- page scripts -->
	
	<!--[if lte IE 8]>
		<script language="javascript" type="text/javascript" src="assets/plugins/excanvas/excanvas.min.js"></script>
	<![endif]-->
	
	
	<!-- theme scripts -->
	<script src="/Public/Ucenter/js/SmoothScroll.js"></script>
	<script src="/Public/Ucenter/js/jquery.mmenu.min.js"></script>
	<script src="/Public/Ucenter/js/core.min.js"></script>
	
	
	<!-- inline scripts related to this page -->
	
	
	<!-- end: JavaScript-->
	<script src="/Public/Ucenter/js/ucenter.js"></script>
</body>
</html>