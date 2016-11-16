<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<title>支付</title>
</head>
<body onLoad="document.dinpayForm.submit();">
	<form name="dinpayForm" action="<?php echo ($url); ?>" method="post">
		<input name="pGateWayReq" type="hidden" value="<?php echo ($pGateWayReq); ?>" />
	</form>
</body>
</html>