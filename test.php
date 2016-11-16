<?php
$db_host='localhost';
$db_database='weidisk';
$db_username='root';
$db_password='RONMEIzh123456zh';
$connection=mysql_connect($db_host,$db_username,$db_password);//连接到数据库
mysql_query("set names 'utf8'");//编码转化
if(!$connection){
die("could not connect to the database:</br>".mysql_error());//诊断连接错误
}
$db_selecct=mysql_select_db($db_database);//选择数据库
if(!$db_selecct)
{
die("could not to the database</br>".mysql_error());	
}


ignore_user_abort();//关闭浏览器仍然执行
set_time_limit(0);//让程序一直执行下去
$interval=2;//每隔一定时间运行
do{

//获取动态油的价格，
$source=file_get_contents("http://mipan.fxicc.com/xh/json.php?code=ftse");
//var_dump($source);die;
$msg = explode(',',$source);
$zx = str_replace('price:', '',str_replace('"','',$msg[1]));//最新
$jk = str_replace('jk:', '',str_replace('"','',$msg[4]));//今开
$zs = str_replace('zk:', '',str_replace('"','',$msg[5]));//昨开
$zg = str_replace('zg:', '',str_replace('"','',$msg[6]));//最高
$zd = str_replace('zd:', '',str_replace('"','',$msg[7]));//最低
$sql="UPDATE wp_catproduct SET ask=".$zx.", `open`=".$jk.", high=".$zg.",low=".$zd.",`close`=".$zs.",eidtime=".date(time())." WHERE cid=1";
mysql_query($sql);
//获取动态白银的价格，
$bysource=file_get_contents("http://mipan.fxicc.com/xh/json.php?code=tsei");
$bymsg = explode(',',$bysource);
$byzx = str_replace('price:', '',str_replace('"','',$bymsg[1]));//最新
$byjk = str_replace('jk:', '',str_replace('"','',$bymsg[4]));//今开
$byzs = str_replace('zk:', '',str_replace('"','',$bymsg[5]));//昨开
$byzg = str_replace('zg:', '',str_replace('"','',$bymsg[6]));//最高
$byzd = str_replace('zd:', '',str_replace('"','',$bymsg[7]));//最低
$bysql="UPDATE wp_catproduct SET ask=".$byzx.", `open`=".$byjk.", high=".$byzg.",low=".$byzd.",`close`=".$byzs.",eidtime=".date(time())." WHERE cid=2";
mysql_query($bysql);
//获取动态铜的价格，
$tosource=file_get_contents("http://mipan.fxicc.com/xh/json.php?code=tjcu");
$tomsg = explode(',',$tosource);
$tozx = str_replace('price:', '',str_replace('"','',$tomsg[1]));//最新
$tojk = str_replace('jk:', '',str_replace('"','',$tomsg[4]));//今开
$tozs = str_replace('zk:', '',str_replace('"','',$tomsg[5]));//昨开
$tozg = str_replace('zg:', '',str_replace('"','',$tomsg[6]));//最高
$tozd = str_replace('zd:', '',str_replace('"','',$tomsg[7]));//最低
$tosql="UPDATE wp_catproduct SET ask=".$tozx.", `open`=".$tojk.", high=".$tozg.",low=".$tozd.",`close`=".$tozs.",eidtime=".date(time())." WHERE cid=3";
mysql_query($tosql);



 sleep($interval);//等待时间，进行下一次操作。
}while(true);

mysql_close($connection);//关闭连接


?>