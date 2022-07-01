<link rel="stylesheet" href="/css/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>
<style>
#header {
  display: none;
}

#Mheader {
  display: none;
}
</style>

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
    document.idFind_form.setAttribute("target", "sa_popup");
    document.idFind_form.setAttribute("post", "post");
    document.idFind_form.setAttribute("action", "https://sa.inicis.com/auth");
    document.idFind_form.submit();
    return true;
  }
}

function callSaPw() {
  var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  if (!$("#MET_EMAIL_PW").val()) {
    alert("이메일(아이디)를 입력해주세요.");
    return false;
  } else if (!emailPattern.test($("#MET_EMAIL_PW").val())) {
    alert("이메일 형식에 맞지 않습니다.");
    $('#MET_EMAIL_PW').focus();
    return false;
  } else {
    let window = popupCenter();
    if (window != undefined && window != null) {
      document.pwFind_form.setAttribute("target", "sa_popup");
      document.pwFind_form.setAttribute("post", "post");
      document.pwFind_form.setAttribute("action", "https://sa.inicis.com/auth");
      var email = $("#MET_EMAIL_PW").val();
      $("#successUrl").val("https://mydang.kr/main/certifFinPw?MET_EMAIL_PW=" + email);
      document.pwFind_form.submit();
      return true;
    }
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
<div id="container" class="idFind">
  <div class="container-inner">
    <div class="title-wrap">
      <div class="bg-wrap">
      </div>
      <a href="/" class="btn-home"><span class="blind">메인으로</span></a>
      <p class="text-title">아이디/<br>비밀번호 찾기
        <br>
        <span>
          FIND ID / FIND PW
        </span>
      </p>
      <div class="bottom-wrap">
        <p class="copyright">Copyright ⓒ 2021 Developer Noah Co.<br> All rights reserved</p>
      </div>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="top-wrap">
          <div class="left-wrap">
            <div class="sub-title">
              <i class="xi-unlock-o"></i>
              <h4>아이디 찾기</h4>
            </div>
            <div class="form-wrap">
              <p><span class="text-sign">&#8251;</span> 회원정보에 등록된 본인 명의의 휴대폰을<br> 이용해 인증해주시기바랍니다.</p>
              <form id="idFind_form" name="idFind_form" method="post" action="/auth/findId">
                <input type="hidden" name="mid" value="<?php echo $mid ?>">
                <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
                <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
                <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
                <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
                <input type="hidden" name="successUrl" value="https://mydang.kr/main/certifFindId">
                <input type="hidden" name="failUrl" value="https://mydang.kr/main/find">
                <div class="prsnlCrtfc-wrap">
                  <a href="javascript:callSa();" class="btn-prsnlCrtfc">
                    <img src="../../../icon/phone01.png" alt="본인인증휴대폰이미지">
                    <span>휴대폰 인증</span>
                    <span>찾기</span>
                  </a>
                </div>
              </form>
            </div>
          </div>
          <div class="right-wrap">
            <div class="sub-title">
              <i class="xi-unlock"></i>
              <h4>비밀번호 찾기</h4>
            </div>
            <div class="form-wrap">
              <form id="pwFind_form" name="pwFind_form" method="post" action="/auth/finPw">
                <input type="hidden" name="mid" value="<?php echo $mid ?>">
                <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
                <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
                <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
                <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
                <input type="hidden" name="successUrl" id="successUrl" value="https://mydang.kr/main/certifFinPw">
                <input type="hidden" name="failUrl" value="https://mydang.kr/main/find">
                <!-- <p class="text-de">비밀번호를 찾고자 하는 아이디를 입력해 주세요.</p> -->
                <div class="email_box int_box on">
                  <label for="MET_EMAIL_PW" class="lb4 blind">이메일</label>
                  <input type="text" id="MET_EMAIL_PW" name="MET_EMAIL_PW" placeholder="이메일(아이디)를 입력해주세요" class="int"
                    maxlength="41" value="<?php echo $email;?>" autocomplete="off">
                </div>
                <p><span class="text-sign">&#8251;</span> 회원정보에 등록된 본인 명의의 휴대폰을<br> 이용해 인증해주시기바랍니다.</p>
                <div class="prsnlCrtfc-wrap">
                  <a href="javascript:callSa();" class="btn-prsnlCrtfc">
                    <img src="../../../icon/phone01.png" alt="본인인증휴대폰이미지">
                    <span>휴대폰 인증</span>
                    <span>찾기</span>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
<script type="text/javascript">
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
var cellPhone1 = document.getElementById('MET_TEL_ID');
cellPhone1.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

var cellPhone2 = document.getElementById('MET_TEL_PW');
cellPhone2.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

function frmId_ck() {
  if (!$("#MET_NAME_ID").val()) {
    alert("이름을 입력해주세요!");
    $("#MET_NAME_ID").trigger("click");
    return false;
  } else if (!$("#MET_TEL_ID").val()) {
    alert("연락처를 입력해주세요!");
    $("#MET_TEL_ID").trigger("click");
    return false;
  } else {
    return true;
  }
}

function frmPw_ck() {
  if (!$("#MET_EMAIL_PW").val()) {
    alert("이메일을 입력해주세요!");
    $("#MET_EMAIL_PW").trigger("click");
    return false;
  } else if (!$("#MET_TEL_PW").val()) {
    alert("연락처를 입력해주세요!");
    $("#MET_TEL_PW").trigger("click");
    return false;
  } else {
    return true;
  }
}
</script>