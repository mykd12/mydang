  <?php
	include_once "curl_token.php";
	$token_key = token_get();
  /* 
  -----------------------------------------------------------------------------------
  알림톡 전송
  -----------------------------------------------------------------------------------
  버튼의 경우 템플릿에 버튼이 있을때만 버튼 파라메더를 입력하셔야 합니다.
  버튼이 없는 템플릿인 경우 버튼 파라메더를 제외하시기 바랍니다.
  */
  $_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
  $_hostInfo  =	parse_url($_apiURL);
  $_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
  $_variables =	array(
    'apikey'      => '4svdjtlbjorisw2h2qlfrp6e4umci6y3', 
    'userid'      => 'realdeno', 
    'token'       => $token_key, 
    'senderkey'   => 'b5bbae6c7b90e95627a79d28b53cf6a064100eff', 
    'tpl_code'    => 'TD_6848',
    'sender'      => '07086338941',
    'receiver_1'  => '01094519137',
    'recvname_1'  => '테스트 성명',
    'subject_1'   => '테스트 제목',
    'message_1'   => '스타트체험단입니다.
http://startchallenge.co.kr/
[여수] 연휴식당 체험은 잘 하셨나요?
캠페인 등록이 안돼서 연락드립니다.

캠페인 등록이 완료된 경우에는 나의 캠페인에 등록해 주시면 됩니다.
http://startchallenge.co.kr/
체험 불가 및 포스팅 기한 연장이 필요한 사항은 1:1문의 or 카카오톡으로 남겨주세요.
https://pf.kakao.com/_RxcxkFK
빠른 피드백 부탁드립니다:)

■필수■
캠페인 등록 시 업체명 띄어쓰기나 철자가 틀린 경우에는 재검토가 있을 수 있습니다.
스폰서 배너는 필수 등록입니다.

양식에 맞춰 기입을 부탁드립니다.',
    'button_1'    => '{"button":[{"name":"선정된 캠페인","linkType":"WL","linkP":"http://startchallenge.co.kr/myCampaign.php", "linkM": "http://startchallenge.co.kr/myCampaign.php"},{"name":"문의링크","linkType":"WL","linkP":"https://pf.kakao.com/_RxcxkFK", "linkM": "https://pf.kakao.com/_RxcxkFK"}]}'
  );
 
  $oCurl = curl_init();
  curl_setopt($oCurl, CURLOPT_PORT, $_port);
  curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
  curl_setopt($oCurl, CURLOPT_POST, 1);
  curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
  curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);

  $ret = curl_exec($oCurl);
  $error_msg = curl_error($oCurl);
  curl_close($oCurl);

  // 리턴 JSON 문자열 확인
  print_r($ret . PHP_EOL);

  // JSON 문자열 배열 변환
  $retArr = json_decode($ret);

  // 결과값 출력
  print_r($retArr);

  /*
  code : 0 성공, 나머지 숫자는 에러
  message : 결과 메시지
  */
	?>