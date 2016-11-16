<?php

ignore_user_abort();//关闭浏览器仍然执行
set_time_limit(0);//让程序一直执行下去
$interval=2;//每隔一定时间运行
do{
 

	// $content1 = file_get_contents("http://103.38.43.245:96/xh/json.php?code=cl1000xh");//得到文件执行的结果
	$of1 = fopen('xh/you.txt','w');//创建并打开dir.txt
	if($content1){
	 fwrite($of1,$content1);//把执行文件的结果写入txt文件
	}
	// fclose($of1);

	// $content2 = file_get_contents("http://103.38.43.245:96/xh/json.php?code=ag50kgxh");//得到文件执行的结果
	$of2 = fopen('xh/baiyin.txt','w');//创建并打开dir.txt
	if($content2){
	 fwrite($of2,$content2);//把执行文件的结果写入txt文件
	}
	//fclose($of2);

	// $content3 = file_get_contents("http://103.38.43.245:96/xh/json.php?code=cu10txh");//得到文件执行的结果
	$of3 = fopen('xh/tong.txt','w');//创建并打开dir.txt
	if($content3){
	 fwrite($of3,$content3);//把执行文件的结果写入txt文件
	}
	//fclose($of3);


sleep($interval);//等待时间，进行下一次操作。
}while(true);


?>