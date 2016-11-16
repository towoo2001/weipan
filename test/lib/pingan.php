<?php
// header("Content-Type: text/html;charset=gbk");
ini_set('date.timezone','Asia/Shanghai');
class pingan {
	/**
	 * ===================================================================
	 * sign
	 * ===================================================================
	 */
	
	/**
	 * get orig
	 *
	 * @param string $data        	
	 * @return string
	 */
	public function getOrig($data) {
		$orig = $this->_base64_url_encode ( $data );
		return $orig;
	}
	
	/**
	 * get sign
	 *
	 * @param file $merchantCertFile        	
	 * @param string $data        	
	 * @return string
	 */
	public function getSign($merchantCertFile, $data) {
		$sign = $this->_getSign ( $merchantCertFile, $data );
		$sign = $this->_base64_url_encode ( $sign );
		return $sign;
	}
	
	/**
	 * sign by open_ssl
	 *
	 * @param file $merchantCertFile        	
	 * @param string $data        	
	 * @return string
	 */
	private function _getSign($merchantCertFile, $data) {
		$tCertificate = array ();
		if (openssl_pkcs12_read ( file_get_contents ( $merchantCertFile ), $tCertificate, '111111' )) {
			$pkey = openssl_pkey_get_private ( $tCertificate ['pkey'] );
		}
		
		$signature = '';
		
		if (! openssl_sign ( $data, $signature, $pkey, OPENSSL_ALGO_MD5 )) {
			exit ( "Have a error!Please check!" );
		}
		$sign = bin2hex ( $signature );
		return $sign;
	}
	
	/**
	 * to base64 and url
	 *
	 * @param string $data        	
	 * @return string
	 */
	private function _base64_url_encode($data) {
		$data_base64 = base64_encode ( $data ); // base64
		$data_gbk = iconv ( "UTF-8", "GBK", $data_base64 ); // utf-8 to gbk
		$data_url = urlencode ( $data_gbk ); // url
		return $data_url;
	}
	
	/**
	 * ===================================================================
	 * validate
	 * ===================================================================
	 */
	public function validate($orig, $sign, $tTrustPayCertFile) {
		if (substr ( PHP_VERSION, 0, 3 ) <= 5.3) {
			return $this->_validate_5_3 ( $orig, $sign, $tTrustPayCertFile );
		}
		$tSign = $this->hex2bin ( trim ( $sign ) );
		$pem = "-----BEGIN CERTIFICATE-----\n" . chunk_split ( base64_encode ( file_get_contents ( $tTrustPayCertFile ) ), 64, "\n" ) . "-----END CERTIFICATE-----\n";
		$iTrustpayCertificate = openssl_x509_read ( $pem );
		$key = openssl_pkey_get_public ( $iTrustpayCertificate );
		openssl_free_key ( $key );
		return openssl_verify ( trim ( $orig ), $tSign, $key, OPENSSL_ALGO_MD5 );
	}
	private function _validate_5_3($orig, $sign, $tTrustPayCertFile) {
		$tSign = $this->hex2bin ( trim ( $sign ) );
		$pem = "-----BEGIN CERTIFICATE-----\n" . chunk_split ( base64_encode ( file_get_contents ( $tTrustPayCertFile ) ), 64, "\n" ) . "-----END CERTIFICATE-----\n";
		$key = openssl_pkey_get_public ( $pem );
		return openssl_verify ( trim ( $orig ), $tSign, $key, OPENSSL_ALGO_MD5 );
	}
	function hex2bin($hexdata) {
		$bindata = '';
		$length = strlen ( $hexdata );
		for($i = 0; $i < $length; $i += 2) {
			$bindata .= chr ( hexdec ( substr ( $hexdata, $i, 2 ) ) );
		}
		return $bindata;
	}
	public function _base64_url_decode($data) {
		$data_url = urldecode ( $data ); // url
		$data_base64 = base64_decode ( $data_url ); // base64
		return $data_base64;
	}
	
	/**
	 * ===================================================================
	 * base
	 * ===================================================================
	 */
	public function array_to_xml($data) {
		$xml_data = '<kColl id="input" append="false">';
		foreach ( $data as $key => $value ) {
			$xml_data .= '<field id="' . $key . '" value="' . $value . '"/>';
		}
		$xml_data .= '</kColl>';
		
		return $xml_data;
	}
	
	//2016.5.28 这个方法超级复杂，别轻易动
	public function xml_to_array($orig_xml) {
		$xml = simplexml_load_string ( $orig_xml );
		$arr = json_decode ( json_encode ( $xml ), TRUE );
		
		$res = array ();
		
		foreach ( $arr ['field'] as $key => $row ) {
			$res [$row ['@attributes'] ['id']] = $row ['@attributes'] ['value'];
			//array_push($res, $row['@attributes']['id']);
		}
		
		if (array_key_exists ( 'iColl', $arr )) {
			$resBody = array ();
			if (array_key_exists ( 'kColl', $arr ['iColl'] )) {
				// 如果多个对象，是在一个数组
				if (! array_key_exists ( 'field', $arr ['iColl'] ['kColl'] )) {
					foreach ( $arr ['iColl'] ['kColl'] as $key => $row ) {
						$coll = array ();
						foreach ( $row ['field'] as $_key => $_row ) {
							$coll [$_row ['@attributes'] ['id']] = $_row ['@attributes'] ['value'];
						}
						array_push ( $resBody, $coll );
					}
				} 				
				//如果单个对象，仅返回对象
				else {
					$coll = array ();
					foreach ( $arr ['iColl'] ['kColl'] ['field'] as $_key => $_row ) {
						$coll [$_row ['@attributes'] ['id']] = $_row ['@attributes'] ['value'];
					}
					array_push ( $resBody, $coll );
				}
				$res ['body'] = $resBody;
			} else { // 没有循环体，只有unionInfo，false
				foreach ( $arr ['iColl'] as $key => $row ) {
					$res [$row ['id']] = $row ['append'];
					// array_push($res, $row['@attributes']['id']);
				}
			}
		}
		return $res;
	}
	
	/**
	 * 废除不用
	 */
	public function xml_to_array_bak($orig_xml) {
		$orig_data = simplexml_load_string ( $orig_xml, 'SimpleXMLElement', LIBXML_NOCDATA );
		$result_data = array ();
		foreach ( $orig_data->field as $key => $row ) {
			$item = $row->attributes ();
			$id = $this->xml_attribute ( $item, 'id' );
			$value = $this->xml_attribute ( $item, 'value' ) ? $this->xml_attribute ( $item, 'value' ) : '';
			$result_data [$id] = $value;
		}
		return $result_data;
	}
	
	/**
	 * 废除不用
	 */
	private function xml_attribute($object, $attribute) {
		if (isset ( $object [$attribute] )) {
			return ( string ) $object [$attribute];
		}
	}
	
	/**
	 * ===================================================================
	 * curl
	 * ===================================================================
	 */
	function curl($url, $parms) {
		$ch = curl_init ();
		
		curl_setopt ( $ch, CURLOPT_URL, $url );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $parms );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
		$result = curl_exec ( $ch );
		curl_close ( $ch );
		return $result;
	}
}
