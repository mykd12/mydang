<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

    function return_back($msg) { // 취소
      echo "<script>alert('{$msg}');history.go(-1);</script>";
    }
		function redirect($url){ // 리다이렉트
			echo "<script>location.href='{$url}';</script>";
		}
		function return_submit($msg,$url) { // 승인
      echo "<script>alert('{$msg}');location.href='{$url}';</script>";
    }


?>