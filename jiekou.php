<?php
$fp = fsockopen("112.124.211.146", 9101, $errno, $errstr, 300);
		if (!$fp) {
			echo "$errstr ($errno)<br />\n";
		} else {
			$out = "0=Login|1=1000|1000=chn-t-2015-threw|1001=knelttheft\r\n";
			$out .= "0=Subscribe|1=1001|10=CAD-LME\r\n";
			echo "<br>";
			fwrite($fp, $out);
			$a=1;
			while (!feof($fp)) {
				$str=fgets($fp, 128);
				$drr=array();
				if($a==2)
				{
					$arr=explode("|",$str);
					for($i=1;$i<count($arr);$i++)
					{
						$brr=explode("=",$arr[$i]);
						if($i==1)
						{
							$drr["cp_name"]=$brr[1];
						}
						if($i==2)
						{
							$drr["cp_1"]=$brr[1];
						}
						if($i==3)
						{
							$drr["cp_2"]=$brr[1];
						}
						if($i==4)
						{
							$drr["cp_3"]=$brr[1];
						}
						if($i==5)
						{
							$drr["cp_4"]=$brr[1];
						}
					}
				}
				$a++;
				
				if($a==3)
				{
					break;
				}
			}
			print_r($drr);
			fclose($fp);
		}
?>