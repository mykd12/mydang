<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

    function encrypt($data) { // 암호화 / 인자값(데이터)
      $result = '';
			$key = "denosla";
			for($i=0; $i<strlen($data); $i++) {
					$char = substr($data, $i, 1);
					$keychar = substr($key, ($i % strlen($key))-1, 1);
					$char = chr(ord($char)+ord($keychar));
					$result .= $char;
			}
			return base64_encode($result);
    }
		function decrypt($data) { //복호화 / 인자값(데이터)
      $result = '';
			$key = "denosla";
			$data = base64_decode($data);
			for($i=0; $i<strlen($data); $i++) {
					$char = substr($data, $i, 1);
					$keychar = substr($key, ($i % strlen($key))-1, 1);
					$char = chr(ord($char)-ord($keychar));
					$result .= $char;
			}
			return $result;
    }
?>