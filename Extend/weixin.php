 <?php
//判断是否获取到了coed
if (isset($_GET['code'])) {

    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {

    $appid = "wx073b4f54182001f2";  
    $secret = "d2a26aca83a818e8f5cfc859bfc13d76";
    $code = $_GET["code"];

    //第一步:取得openid
    $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
    $oauth2 = getJson($url);

    //第二步:根据全局access_token和openid查询用户信息  
    $access_token = $oauth2["access_token"];  
    $openid = $oauth2['openid'];  
    $get_user_info_url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
    $userinfo = getJson($get_user_info_url);
    $goUrl="http://wei.yytxzb.com/index.php/Home/User/login.html";
    if ($userinfo['openid'] != '') {
         // echo $goUrl."?openid=".$userinfo['openid']."&nickname=".$userinfo['nickname'];
         //  exit;
       header("Location:".$goUrl."?openid=".$userinfo['openid']."&nickname=".$userinfo['nickname']."&address=".$userinfo['country'].$userinfo['province'].$userinfo['city']."&portrait=".$userinfo['headimgurl']."&utime=".$userinfo['subscribe_time']);
    }
  }else{
        echo "NO CODE";

  }
 
}
function getJson($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return json_decode($output, true);
}
       
   
?>