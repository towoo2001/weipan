<?php
session_start();

header("Content-type:text/html; charset=UTF-8");

function Post($curlPost,$url){
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_NOBODY, true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
		$return_str = curl_exec($curl);
		curl_close($curl);
		return $return_str;
}
function xml_to_array($xml){
	$reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
	if(preg_match_all($reg, $xml, $matches)){
		$count = count($matches[0]);
		for($i = 0; $i < $count; $i++){
		$subxml= $matches[2][$i];
		$key = $matches[1][$i];
			if(preg_match( $reg, $subxml )){
				$arr[$key] = xml_to_array( $subxml );
			}else{
				$arr[$key] = $subxml;
			}
		}
	}
	return $arr;
}
function random($length = 6 , $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

function sendshortmessage($mobile,$content){
	$target = "http://www.ussns.com/Api/send";

	// $send_code = $_POST['send_code'];

	// $mobile_code = random(4,1);
	$mobile_code = $_SESSION['regcode'];
	if(empty($mobile)){
		exit('手机号码不能为空');
	}



	$post_data = "username=pangtouyu&pwd=fei719&phone=".$mobile."&msg=".rawurlencode($content);
	//密码可以使用明文密码或使用32位MD5加密
	$gets =  Post($post_data, $target);
	if($gets==888){
		$_SESSION['mobile'] = $mobile;
		$_SESSION['mobile_code'] = $mobile_code;
		return 1;
	}else{
		return 0;
	}
}