<?
	ignore_user_abort();//�ر��������Ȼִ��
	set_time_limit(0);//�ó���һֱִ����ȥ
	$interval=1;//ÿ��һ��ʱ������
	$rtime = time();
	$ttime = date("Y-m-d",$rtime);
	$lefttime = strtotime($ttime." 19:28:00");
	// sleep($interval);
	// echo $rtime.'+'.$lefttime;die;
	do{
		if($rtime == $lefttime)
		{
			$msg=date("Y-m-d H:i:s",$rtime);
			file_put_contents("log.log",$msg,FILE_APPEND);//��¼��־
		}
		sleep($interval);//�ȴ�ʱ�䣬������һ�β�����
	}while(true);