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
if($this -> session ->userdata('LOGIN_IDX')){
  echo "<script>alert('정상적이지 않은 접근입니다.');history.go(-1)</script>";
  exit;
}
$client_id = "LACTex0CsdPFSVBAH2p4";
$redirectURI = urlencode("https://mydang.kr/main/callback");
$state = md5(date("Y-m-d H:i:s"));
$naver_apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;

// KAKAO LOGIN
define('KAKAO_CLIENT_ID', 'ca6889c8b7dc6867af0b4a4ba8cbfe35');
define('KAKAO_CLIENT_SECRET', 'ORjdgdll96Llr7DBUBxldFwcrLUorKdN');
// 필수 아님
define('KAKAO_CALLBACK_URL', 'https://mydang.kr/main/kakao_callback');
// 콜백URL
// 카카오 로그인 접근토큰 요청 예제
$kakao_state = md5(microtime() . mt_rand());
// 보안용 값
$_SESSION['kakao_state'] = $kakao_state;
$kakao_apiURL = "https://kauth.kakao.com/oauth/authorize?client_id=".KAKAO_CLIENT_ID."&redirect_uri=".urlencode(KAKAO_CALLBACK_URL)."&response_type=code&state=".$kakao_state;

?>
<div id="container" class="login">
  <div class="container-inner">
    <div class="title-wrap">
      <div class="bg-wrap">
      </div>
      <a href="/" class="btn-home"><span class="blind">메인으로</span></a>
      <p class="text-title">회원로그인
        <br>
        <span>
          MEMBER LOGIN
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
              <i class="xi-user-o"></i>
              <h4>로그인</h4>
            </div>
            <div class="form-wrap">
              <form id="login-from" name="login" method="POST" action="/auth/login" onsubmit="return submit_ck();">
                <div class="email_box int_box on">
                  <label for="MET_EMAIL" id="label_email" class="lb4">이메일</label>
                  <input type="text" id="MET_EMAIL" name="MET_EMAIL" class="int" maxlength="41" value=""
                    autocomplete="off" tabindex = "1">
                </div>
                <div class="pw_box int_box">
                  <label for="MET_PW" id="label_pw" class="lb5">비밀번호</label>
                  <input type="PASSWORD" id="MET_PW" name="MET_PW" class="int" maxlength="16" value=""
                    autocomplete="off" tabindex = "2">
                </div>
                <div class="submit-wrap">
                  <input type="submit" title="로그인" alt="로그인" value="로그인" class="btn-login" id="log.login">
                  <div class="btn-wrap">
                    <a class="btn-signUp" href="/main/agree">회원가입</a>
                    <a class="btn-id" href="/main/find">아이디찾기 / 비밀번호찾기</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="right-wrap">
            <div class="sub-title">
              <i class="xi-user-plus-o"></i>
              <h4>SNS 로그인</h4>
            </div>
            <div class="sns-wrap">
              <a href="<?php echo $naver_apiURL;?>" class="btn-naverLogin">
                <div class="icon-wrap">
                  <img src="/icon/naverlink.png" alt="네이버로그인">
                </div>
                <p>네이버</p>
              </a>
              <a href="<?php echo $kakao_apiURL;?>" class="btn-kakaoLogin">
                <div class="icon-wrap">
                  <img src="/icon/kakao.png" alt="카카오로그인">
                </div>
                <p>카카오</p>
              </a>
            </div>
          </div>
        </div>
        <div class="bottom-wrap">
          <a href="/pro/" class="btn-partnerLogin">중개사/파트너사 로그인</a>
        </div>
        <div class="error"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>
<script>
function submit_ck() {
  var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  if (!$("#MET_EMAIL").val()) {
    $("#label_email").trigger("click");
    alert("이메일을 입력해주세요!");
    return false;
  } else if (!emailPattern.test($("#MET_EMAIL").val())) {
    $("#MET_EMAIL").focus();
    alert("이메일 형식에 맞지 않습니다!");
    return false;
  } else if (!$("#MET_PW").val()) {
    $("#label_pw").trigger("click");
    alert("패스워드를 입력해주세요!");
    return false;
  } else {
    return true;
  }
}
</script>