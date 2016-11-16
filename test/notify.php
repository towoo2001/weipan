<?php
   $data = $_POST;
   require_once './lib/pingan.php';
   $pingan = new pingan();
   $data['orig'] =  iconv("GBK","UTF-8",$pingan->_base64_url_decode($data['orig']));
   var_dump($data);
?>