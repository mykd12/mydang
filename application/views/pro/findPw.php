<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>
<?php
  if(!$type || $type=='A'){
    $typeName="중개인";
  }else if($type=='B'){
    $typeName="일반";
  }else if($type=='C'){
    $typeName="파트너";
  }
  if(!$type){
    $type='A';
  }
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
  var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  if (!$("#LOGIN_EMAIL").val()) {
    alert("이메일(아이디)를 입력해주세요.");
    $("#LOGIN_EMAIL").focus();
    return false;
  } else if (!emailPattern.test($("#LOGIN_EMAIL").val())) {
    alert("이메일/아이디를 형식에 맞지 않습니다.");
    $("#LOGIN_EMAIL").focus();
    return false;
  } else {
    var email = $("#LOGIN_EMAIL").val();
    var type = $("#type").val();
    var url = "https://mydang.kr/auth/findPwPro?type=" + type + "&email=" + email;
    $("#successUrl").val(url);
    let window = popupCenter();
    if (window != undefined && window != null) {
      document.pwFind_form.setAttribute("target", "sa_popup");
      document.pwFind_form.setAttribute("post", "post");
      document.pwFind_form.setAttribute("action", "https://sa.inicis.com/auth");
      document.pwFind_form.submit();
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
<main id="container" class="pwFind">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <h4>비밀번호 찾기</h4>
          <p class="text-de">FIND PW</p>
        </div>
        <div class="form-wrap">
          <form id="pwFind_form" name="pwFind_form" method="post" onsubmit="return callSa();">
            <input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
            <input type="hidden" name="successUrl" id="successUrl"
              value="https://mydang.kr/auth/findPwPro?type=<?php echo $type;?>">
            <input type="hidden" name="failUrl"
              value="https://mydang.kr/pro/findPw?email=<?php echo $email;?>&type=<?php echo $type;?>">
            <p class="text-de">비밀번호를 찾고자 하는 아이디를 입력해 주세요.</p>
            <div class="email_box int_box on">
              <div class="idSelect select select_wrap clearfix">
                <a href="javascript:void(0)" class="btn-idSelect"><span><?php echo $typeName; ?>
                  </span><i class="xi-caret-down-min"></i></a>
                <ul class="id_select">
                  <li class="type_select" data="A"><span>중개인</span></li>
                  <li class="type_select" data="B"><span>일반</span></li>
                  <li class="type_select" data="C"><span>파트너</span></li>
                </ul>
              </div>
              <input type="text" id="LOGIN_EMAIL" name="LOGIN_EMAIL" placeholder="이메일(아이디)를 입력해주세요" class="int"
                maxlength="41" value="<?php echo $email;?>" autocomplete="off">
            </div>
            <!-- <div class="tel_box int_box">
              <input type="text" id="LOGIN_TEL" name="LOGIN_TEL" placeholder="휴대폰번호를 입력해주세요" class="int" maxlength="41"
                value="" autocomplete="off">
            </div>
            <input type="submit" title="비밀번호찾기" alt="비밀번호찾기" value="비밀번호 찾기" class="btn-pwFind">-->
            <div class="prsnlCrtfc-wrap">
              <!-- <div class="sub-title">
                <h4><img src="../../../icon/square.png" alt="약관동의아이콘"> 본인인증</h4>
                <p>- 명당 파트너스 회원가입 진행을 위한 본인 인증이 필요합니다.</p>
              </div>-->
              <a href="javascript:callSa();" class="btn-prsnlCrtfc">
                <div class="img-wrap"><img src="../../../img/cert_hp.png" alt="본인인증휴대폰이미지"></div>
                <p>회원정보에 등록된 본인 명의의 휴대폰을<br> 이용해 인증해주시기바랍니다.</p>
                <p class="text-ti">본인 인증</p>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="popup-box">
    <p>인증번호가 발송되었습니다</p>
  </div>
</main>
<!----- 푸터 시작 ----->
<script type="text/javascript">
$(".type_select").on("click", function() {
  $("#type").val($(this).attr("data"));
});

function submit_ck() {
  if (!$("#LOGIN_EMAIL").val()) {
    alert("아이디/이메일을 입력해주세요!");
    $("#LOGIN_EMAIL").focus();
    return false;
  } else {
    return true;
  }
}
</script>