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
    document.certifi_form.setAttribute("target", "sa_popup");
    document.certifi_form.setAttribute("post", "post");
    document.certifi_form.setAttribute("action", "https://sa.inicis.com/auth");
    document.certifi_form.submit();
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
<div id="container" class="join join01 ">
  <div class="container-inner">
    <div class="title-wrap">
      <div class="bg-wrap">
      </div>
      <a href="/" class="btn-home"><span class="blind">메인으로</span></a>
      <p class="text-title">회원가입
        <br>
        <span>
          JOIN THE MEMBERSHIP
        </span>
      </p>
      <div class="bottom-wrap">
        <p class="copyright">Copyright ⓒ 2021 Developer Noah Co.<br> All rights reserved</p>
      </div>
    </div>
    <div class="content">
      <div class="content-inner">
        <ul class="step-wrap">
          <li class="text">
            <p class="num">01</p>
            <p>약관동의</p>
          </li>
          <li class="arrow"><img src="/icon/arrow04.png" alt="화살표아이콘"> </li>
          <li class="text on">
            <p class="num">02</p>
            <p>본인인증</p>
          </li>
          <li class="arrow"><img src="/icon/arrow03.png" alt="화살표아이콘"> </li>
          <li class="text">
            <p class="num">03</p>
            <p>정보입력</p>
          </li>
          <li class="arrow"><img src="/icon/arrow04.png" alt="화살표아이콘"> </li>
          <li class="text">
            <p class="num">04</p>
            <p>가입완료</p>
          </li>
        </ul>
        <div class="form-wrap">
          <form id="certifi_form" name="certifi_form">
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
            <input type="hidden" name="successUrl" value="https://mydang.kr/main/certif">
            <input type="hidden" name="failUrl" value="https://mydang.kr/main/agree">
            <div class="prsnlCrtfc-wrap">
              <p class="text-de">회원가입 진행을 위해 <br class="br">본인 인증이 필요합니다.</p>
              <a href="javascript:callSa();" class="btn-prsnlCrtfc">
                <div class="img-wrap"><img src="../../../img/cert_hp01.png" alt="본인인증휴대폰이미지"></div>
                <p>본인 명의의 휴대폰으로 인증 후<br> 가입하실수 있습니다.</p>
                <p class="text-ti">본인인증하기</p>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>