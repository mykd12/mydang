<?php
// default redirection
$url = $_REQUEST["callback"].'?callback_func='.$_REQUEST["callback_func"];
$bSuccessUpload = is_uploaded_file($_FILES['Filedata']['tmp_name']);

// SUCCESSFUL
if(bSuccessUpload) {
	$tmp_name = $_FILES['Filedata']['tmp_name'];
	$addName = strtotime(date("Y-m-d H:i:s"));
	$milliseconds = round(microtime(true) * 1000);  //밀리초 구하기
	$addName .= $milliseconds;       //파일이름에 밀리초 추가하기
	 //업로드 이미지 파일이름 중복 방지를 위해 수정되는 코드
	$name = $addName . '_' . $_FILES['Filedata']['tmp_name'];

	$filename_ext = strtolower(array_pop(explode('.',$name)));
	$allow_file = array("jpg", "png", "bmp", "gif");

	//$name = $_FILES['Filedata']['name'];
	/*
	$wdate = time();
	
	$filename_ext = strtolower(array_pop(explode('.',$name)));
	$allow_file = array("jpg", "png", "bmp", "gif");

	$upFile = "aaa".md5($name['0']).$wdate;  //임의의 파일명(파일확장자제외한)을 만들어줌
	*/
	if(!in_array($filename_ext, $allow_file)) {
		$url .= '&errstr='.$name;
	} else {
		$uploadDir = $_SERVER["DOCUMENT_ROOT"].'/upload_img/';
		if(!is_dir($uploadDir)){
			mkdir($uploadDir, 0777);
		}
		
		//$newPath = $uploadDir.urlencode($_FILES['Filedata']['name']);
		$newPath = $uploadDir.urlencode($name);  //새로 생성된 파일의 경로
		
		@move_uploaded_file($tmp_name, $newPath);
		
		$url .= "&bNewLine=true";
		$url .= "&sFileName=".urlencode(urlencode($name));
		$url .= "&sFileURL=/upload_img/".urlencode(urlencode($name));
	}
}
// FAILED
else {
	$url .= '&errstr=error';
}
	
header('Location: '. $url);
?>
