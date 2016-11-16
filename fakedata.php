<?php


$conn = mysql_connect('localhost','root','RonMei7811');


mysql_select_db("yulang");


$sql = "UPDATE wp_product_chart SET High = High *8.28297162,Low= Low *8.28297162,open=open*8.28297162,close=close* 8.28297162 WHERE `ItemId` = '195' AND high < 5000 LIMIT 1 ";
mysql_query($sql);