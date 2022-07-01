<?php
 	$sFileInfo = '';
	$headers = array();
	 
	foreach($_SERVER as $k => $v) {
		if(substr($k, 0, 9) == "HTTP_FILE") {
			$k = substr(strtolower($k), 5);
			$headers[$k] = $v;
		} 
		
	}
	
	$file = new stdClass;
	$file->name = str_replace("\0", "", rawurldecode($headers['file_name']));
	$file->size = $headers['file_size'];
	$file->content = file_get_contents("php://input");
	
	$filename_ext = strtolower(array_pop(explode('.',$file->name)));
	$allow_file = array("jpg", "png", "bmp", "gif"); 

	/*$wdate = time();
	$upFile = "aaa".md5($file->name[0]).$wdate;
	*/
	if(!in_array($filename_ext, $allow_file)) {
		echo "NOTALLOW_".$file->name;
	} else {
		$uploadDir = $_SERVER["DOCUMENT_ROOT"].'/upload_img/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}
		 /* 파일이름 중복 방지를 위한 코드 */
		  $addName = strtotime(date("Y-m-d H:i:s"));  //현재날짜,시간,분초구하기
		  $milliseconds = round(microtime(true) * 1000);  //밀리초 구하기
		  $addName .= $milliseconds;       //파일이름에 밀리초 추가하기
		  $file->name = $addName . '_' . md5($file->name);
		  //중복방지 코드 끝

		
		//$newPath = $uploadDir.iconv("utf-8", "cp949", $file->name);
		$newPath = $uploadDir.iconv("utf-8", "cp949", $file->name);
		
		if(file_put_contents($newPath, $file->content)) {
			$sFileInfo .= "&bNewLine=true";
			$sFileInfo .= "&sFileName=".$file->name;
			$sFileInfo .= "&sFileURL=/upload_img/".$file->name;
		}

		
		echo $sFileInfo;

	}
?>
