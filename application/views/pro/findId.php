<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>
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
<main id="container" class="idFind">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <h4>이메일(아이디) 찾기</h4>
          <p class="text-de">FIND ID</p>
        </div>
        <div class="form-wrap">
          <form id="idFind_form" name="idFind_form" method="post" action="/auth/idFindPro">
            <input type="hidden" name="mid" value="<?php echo $mid ?>">
            <input type="hidden" name="reqSvcCd" value="<?php echo $reqSvcCd ?>">
            <input type="hidden" name="mTxId" value="<?php echo $mTxId ?>">
            <input type="hidden" name="authHash" value="<?php echo $authHash ?>">
            <input type="hidden" name="flgFixedUser" value="<?php echo $flgFixedUser ?>">
            <input type="hidden" name="successUrl" value="https://mydang.kr/auth/idFindPro">
            <input type="hidden" name="failUrl" value="https://mydang.kr/pro/findId">
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