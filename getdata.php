#!/usr/bin/php
<?php
ignore_user_abort();//关闭浏览器仍然执行
set_time_limit(0);//让程序一直执行下去
$interval=1;//每隔一定时间运行
$i=0;
do{
$content1 = file_get_contents("http://wei.yytxzb.com/home/Detailed/getRecord");//得到文件执行的结果
$content1 = file_get_contents("http://wei.yytxzb.com/Admin/bao/olist");
echo $i++.',';
sleep($interval);//等待时间，进行下一次操作。
}while(true);
?>
