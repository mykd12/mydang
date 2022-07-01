<!-----  메인 시작 ----->
<?php
  $client_id = "LACTex0CsdPFSVBAH2p4";
  $redirectURI = urlencode("https://mydang.kr/main/callbackMody");
  $state = md5(date("Y-m-d H:i:s"));
  $naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;
  
  // KAKAO LOGIN
  define('KAKAO_CLIENT_ID', 'ca6889c8b7dc6867af0b4a4ba8cbfe35');
  define('KAKAO_CLIENT_SECRET', 'ORjdgdll96Llr7DBUBxldFwcrLUorKdN');
  // 필수 아님
  define('KAKAO_CALLBACK_URL', 'https://mydang.kr/main/kakao_callbackModi');
  // 콜백URL
  // 카카오 로그인 접근토큰 요청 예제
  $kakao_state = md5(microtime() . mt_rand());
  // 보안용 값
  $_SESSION['kakao_state'] = $kakao_state;
  $kakao_apiURL = "https://kauth.kakao.com/oauth/authorize?client_id=".KAKAO_CLIENT_ID."&redirect_uri=".urlencode(KAKAO_CALLBACK_URL)."&response_type=code&state=".$kakao_state;
  
?>
<?php

$mid ='mydangkr99';                            // 테스트 MID 입니다. 계약한 상점 MID 로 변경 필요
$apiKey ='bd17d88e8eac1ed9476ed33e02ec1209';   // 테스트 MID 에 대한 apiKey
$mTxId ='Mydang_'.date("Ymd"); 
$reqSvcCd ='01';
// 등록가맹점 확인
$plainText1 = hash("sha256",(string)$mid.(string)$mTxId.(string)$apiKey);
$authHash = $plainText1;
$flgFixedUser = 'N';           // 특정사용자 고정시 Y
?>
<script language="javascript">
function callSa() {
  let window = popupCenter();
  if (window != undefined && window != null) {
    document.account_form.setAttribute("target", "sa_popup");
    document.account_form.setAttribute("post", "post");
    document.account_form.setAttribute("action", "https://sa.inicis.com/auth");
    document.account_form.submit();
    return true;
  }
}

function popupCenter() {
  let _width = 400;
  let _height = 620;
  var xPos = (document.body.offsetWidth / 2) - (_width / 2); // 가운데 정렬
  xPos += window.screenLeft; // 듀얼 모니터일 때

  return window.open("", "sa_popup", "width=" + _width + ", height=" + _height + ", left=" + xPos +
    ", menubar=yes, status=yes, titlebar=yes, resizable=yes");
}
</script>
<main id="main" class="sub service myAccount">
  <div class="sub-inner">
    <!-- 서브 비쥬얼 -->
    <section class="section1 subVisual">
      <div class="bg-wrap"></div>
      <h2 class="text-ti">마이 페이지</h2>
    </section>
    <section class="section2 ">
      <!-- 탭메뉴 -->
      <div class="tab-menu">
        <ul>
          <li class="on"><a href="/main/myPage">내 정보수정</a></li>
          <li><a href="/main/qnaList">1:1 문의</a></li>
        </ul>
      </div>
      <!-- 내용시작 -->
      <div class="content">
        <div class="content-inner">
          <div class="form-wrap">
            <form id="account_form" name="account_form" method="post" onsubmit="return submit_ck();">
              <input type="hidden" name="MET_IDX" id="MET_IDX" value="<?php echo $MET_IDX?>" />
              <input type="hidden" name="mid" value="<?php echo $mid ?>">
              <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
              <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
              <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
              <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
              <input type="hidden" name="successUrl"
                value="https://mydang.kr/main/certifMypage?tel=<?php echo decrypt($results->MET_TEL);?>&key=<?php echo $MET_IDX?>">
              <input type="hidden" name="failUrl" value="https://mydang.kr/main/myPage">
              <div class="form-group">
                <div class="ti_wrap">
                  <h5 class="text-ti">가입 이메일</h5>
                </div>
                <div class="int-wrap">
                  <div class="int_box">
                    <label for="MET_EMAIL" id="label_email" class="blind">가입 이메일</label>
                    <input type="text" id="MET_EMAIL" name="MET_EMAIL" placeholder="abcd1234@gmail.com"
                      class="int-email" maxlength="41" value="<?php echo decrypt($results->MET_EMAIL);?>" readonly
                      autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="ti_wrap">
                  <h5 class="text-ti">개인정보</h5>
                </div>
                <div class="int-wrap">
                  <div class="int_box">
                    <label for="MET_NAME" id="label_name" class="blind">이름<span class="red">*</span></label>
                    <input type="text" id="MET_NAME" name="MET_NAME" placeholder="이름" class="int-email" maxlength="41"
                      value="<?php echo decrypt($results->MET_NAME);?>" autocomplete="off" readonly>
                  </div>
                  <div class="int_box tel_box">
                    <a href="javascript:callSa();" class="btn-prsnlCrtfc">
                      <label for="MET_TEL" id="label_tel" class="">번호변경</label>
                      <input type="text" id="MET_TEL" name="MET_TEL" placeholder="휴대폰 번호" class="int-email"
                        maxlength="41" value="<?php echo decrypt($results->MET_TEL);?>" autocomplete="off" readonly>
                    </a>
                  </div>
                  <div class="int_box">
                    <label for="MET_ADDR1" id="label_add" class="blind"><span>주소</label>
                    <input type="text" id="MET_ADDR1" name="MET_ADDR1" autocomplete="off" class="link" readonly=""
                      placeholder="기본 주소" value="<?php echo decrypt($results->MET_ADDR1);?>"
                      onclick="execDaumPostcodeMy();">
                  </div>
                  <div class="int_box">
                    <label for="MET_ADDR2" id="label_deAdd" class="blind"><span>상세주소</label>
                    <input type="text" id="MET_ADDR2" name="MET_ADDR2" autocomplete="off"
                      value="<?php echo decrypt($results->MET_ADDR2);?>" class="link" placeholder="나머지 주소">
                  </div>
                  <div class="filebox filebox02 int_box">
                    <h4>프로필사진</h4>
                    <input type="hidden" name="MET_IMG_SAVE" id="MET_IMG_SAVE"
                      value="<?php echo $results->MET_IMG_SAVE;?>" />
                    <div class="photo-box">
                      <!-- 이미지 미리보기 영역 -->
                      <div class="photo-wrap">
                        <div id="imgViewArea" class="img-wrap">
                          <!-- <img id="imgArea" class="imgArea" onerror="imgAreaError()" /
                            src="/uploads/<?php echo $results->MET_IMG_SAVE;?>" alt="프로필사진"> -->
                          <?php if($results->MET_IMG_SAVE){?>
                          <img id="imgArea" class="imgArea" src="/uploads/<?php echo $results->MET_IMG_SAVE;?>"
                            alt="프로필사진">
                          <?php }else{?>
                          <img id="imgArea" class="imgArea" src="../../../img/my-img.png" alt="프로필사진"
                            style="background-color: #f1f1f1;">
                          <?php }?>

                        </div>
                        <!-- <button type="button" id="joinImgbtn"><i class="xi-close-thin"></i> <span
                            class="blind">닫기</span></button> -->
                      </div>
                      <div class="add_input">
                        <label for="u_file">업로드</label>
                        <input type="file" id="u_file" name="MET_IMG" accept="image/*">
                        <!-- <input class="upload-name02" placeholder="" readonly /> -->
                        <!-- <input type="file" id="joinImg" name="joinImg" class="file"> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group easy-login">
                <div class="ti_wrap">
                  <h5 class="text-ti">간편로그인</h5>
                </div>
                <div class="int-wrap">
                  <?php if(!$results->MET_NAVER){?>
                  <div class="int_box naver" onclick="location.href='<?php echo $naver_apiURL;?>';">
                    <input type="button" class="btn_naverId" id="btn_naverId">
                    <label for="btn_naverId" class="int_text">네이버 아이디 연동하기</label>
                  </div>
                  <?php }else{?>
                  <div class="int_box naver ok">
                    <input type="button" class="btn_naverOK" id="btn_naverOK">
                    <label for="btn_naverOK" class="int_text">네이버 아이디 연동해제</label>
                  </div>
                  <?php }?>
                  <?php if(!$results->MET_KAKAO){?>
                  <div class="int_box kakao" onclick="location.href='<?=$kakao_apiURL?>';">
                    <input type="button" class="btn_kakaoId" id="btn_kakaoId">
                    <label for="btn_kakaoId" class="int_text">카카오 아이디 연동하기</label>
                  </div>
                  <?php }else{?>
                  <div class="int_box kakao ok">
                    <input type="button" class="btn_kakaoOK" id="btn_kakaoOK">
                    <label for="btn_kakaoOK" class="int_text">카카오 아이디 연동해제</label>
                  </div>
                  <?php }?>
                </div>
              </div>
              <div class="form-group">
                <div class="ti_wrap">
                  <h5 class="text-ti">비밀번호</h5>
                </div>
                <div class="int-wrap">
                  <div class="int_box">
                    <label for="MET_PW1" id="label_pw1" class="blind">새 비밀번호</label>
                    <input type="PASSWORD" id="MET_PW1" name="MET_PW1" placeholder="비밀번호" class="int" maxlength="41"
                      value="" autocomplete="off">
                  </div>
                  <div class="int_box">
                    <label for="MET_PW2" id="label_pw2" class="blind">비밀번호 확인</label>
                    <input type="PASSWORD" id="MET_PW2" name="MET_PW2" placeholder="비밀번호 확인" class="int" maxlength="41"
                      value="" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="btn-wrap">
                <input type="submit" title="정보 수정" alt="정보 수정" value="정보 수정" class="btn-modified"
                  style="cursor: pointer;">
                <!--<a href="javascript:void(0)" class="btn-cancel">취소</a>-->
                <a href="/Auth/seceSsion" onclick="return confirm('탈퇴 하시겠습니까??');" class="btn-secession">회원탈퇴</a>
              </div>
            </form>
          </div>
        </div>
    </section>
  </div>
</main>
<script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
<script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
var addr_data = '';

function execDaumPostcodeMy() {
  new daum.Postcode({
    showMoreHName: true,
    shorthand: false,
    oncomplete: function(data) {

      var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
      var extraRoadAddr = ''; // 도로명 조합형 주소 변수
      if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
        extraRoadAddr += data.bname;
      }
      if (data.buildingName !== '' && data.apartment === 'Y') {
        extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
      }
      if (extraRoadAddr !== '') {
        extraRoadAddr = ' (' + extraRoadAddr + ')';
      }
      if (fullRoadAddr !== '') {
        fullRoadAddr += extraRoadAddr;
      }
      var expJibunAddr = data.jibunAddress;

      document.getElementById('MET_ADDR1').value = fullRoadAddr;
      document.getElementById('MET_ADDR2').focus();
      addr_data = fullRoadAddr;;

    }
  }).open();
}
</script>
<script>
function autoHypenPhone(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';
  if (str.length < 4) {
    return str;
  } else if (str.length < 7) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3);
    return tmp;
  } else if (str.length < 11) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 3);
    tmp += '-';
    tmp += str.substr(6);
    return tmp;
  } else {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 4);
    tmp += '-';
    tmp += str.substr(7);
    return tmp;
  }
  return str;
}
var cellPhone = document.getElementById('MET_TEL');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

function submit_ck() {
  var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
  if (!$("#MET_NAME").val()) {
    alert("이름을 입력해주세요!");
    $("#MET_NAME").focus();
    return false;
  } else if (!$("#MET_TEL").val()) {
    alert("연락처를 입력해주세요!");
    $("#MET_TEL").focus();
    return false;
  } else if ($("#MET_PW1").val() && !pwPattern.test($("#MET_PW1").val())) {
    alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
    $("#MET_PW1").trigger("click");
    return false;
  } else if ($("#MET_PW1").val() && !$("#MET_PW2").val()) {
    alert("비밀번호 확인을 입력해주세요.");
    $("#MET_PW2").trigger("click");
    return false;
  } else if ($("#MET_PW1").val() != $("#MET_PW2").val()) {
    alert("비밀번호와 비밀번호확인이 일치 하지 않습니다.");
    $('#MET_PW2').focus();
    return false;
  } else {
    $("#account_form").attr("action", "/DAO/myModify");
    $("#account_form").attr("enctype", "multipart/form-data");
    return true;
  }
}
$(".btn_naverOK").on("click", function() {
  var met_idx = "<?php echo $MET_IDX;?>"
  location.href = '/DAO/naverCancel?key=' + met_idx;
});
$(".btn_kakaoOK").on("click", function() {
  var met_idx = "<?php echo $MET_IDX;?>"
  location.href = '/DAO/kakaoCancel?key=' + met_idx;
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('.imgArea').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#u_file").change(function() {
  if ($("#u_file").val() == '') {
    $('.imgArea').attr('src', '');
  }
  $('#imgViewArea').css({
    'display': ''
  });
  readURL(this);
});

// 이미지 에러 시 미리보기영역 미노출
function imgAreaError() {
  $('#imgViewArea').css({
    'display': 'none'
  });
}
</script>