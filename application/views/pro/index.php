<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>

<main id="container" class="login">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <h4>로그인</h4>
          <p class="text-de">PARTNER LOGIN</p>
        </div>
        <div class="form-wrap">
          <form id="login-from" name="login" method="POST" autocomplete="off" action="/auth/loginPro"
            onsubmit="return submit_ck();">
            <input type="hidden" name="type" id="type" value="A" />
            <ul class="login-list">
              <li class="on" data="A">중개인</li>
              <li data="B">일반</li>
              <li data="C">파트너</li>
            </ul>
            <div class="email_box int_box on">
              <input type="text" id="LOGIN_EMAIL" name="LOGIN_EMAIL" class="int" maxlength="41" value=""
                autocomplete="off" placeholder="abcd1234@naver.com">
              <p class="error">이메일을 확인해주세요.</p>
            </div>
            <div class="pw_box int_box">
              <input type="PASSWORD" id="LOGIN_PW" name="LOGIN_PW" class="int" maxlength="16" value=""
                autocomplete="off" placeholder="비밀번호">
              <p class="error">비밀번호가 잘못되었습니다.</p>
            </div>
            <div class="btn-wrap">
              <div class="form-checkbox">
                <input type="checkbox" id="idSaved" class="check_box" name="idSaved">
                <label for="idSaved">아이디저장</label>
              </div>
              <div class="btnFind-wrap">
                <a class="btn-id" href="/pro/findId">아이디찾기 </a>
                <a class="btn-pw" href="/pro/findPw">&#47; 비밀번호찾기</a>
              </div>
            </div>
            <div class="btn-wrap">
              <div class="btnFind-wrap">
                <a class="btn-pw" href="/pro/joinA" style="text-decoration: underline;">회원가입</a>
              </div>
            </div>
            <div class="submit-wrap">
              <input type="submit" title="로그인" alt="로그인" value="로그인" class="btn-login" id="log.login">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="error"><i class="xi-warning"></i>비밀번호가 일치하지 않습니다. 확인해주세요!</div>
  </div>
</main>
<script>
$(".login-list li").on("click", function() {
  $(".login-list li").removeClass("on");
  $(this).addClass("on");
  $("#type").val($(this).attr("data"));
});
</script>
<script type="text/javascript">
$(document).ready(function() {
  // 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
  var userInputId = getCookie("userInputId");
  $("input[name='LOGIN_EMAIL']").val(userInputId);

  if ($("input[name='LOGIN_EMAIL']").val() != "") { // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
    $("#idSaved").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
  }

  $("#idSaved").change(function() { // 체크박스에 변화가 있다면,
    if ($("#idSaved").is(":checked")) { // ID 저장하기 체크했을 때,
      var userInputId = $("input[name='LOGIN_EMAIL']").val();
      setCookie("userInputId", userInputId, 7); // 7일 동안 쿠키 보관
    } else { // ID 저장하기 체크 해제 시,
      deleteCookie("userInputId");
    }
  });

  // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
  $("input[name='LOGIN_EMAIL']").keyup(function() { // ID 입력 칸에 ID를 입력할 때,
    if ($("#idSaved").is(":checked")) { // ID 저장하기를 체크한 상태라면,
      var userInputId = $("input[name='LOGIN_EMAIL']").val();
      setCookie("userInputId", userInputId, 7); // 7일 동안 쿠키 보관
    }
  });
});

function setCookie(cookieName, value, exdays) {
  var exdate = new Date();
  exdate.setDate(exdate.getDate() + exdays);
  var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
  document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName) {
  var expireDate = new Date();
  expireDate.setDate(expireDate.getDate() - 1);
  document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

function getCookie(cookieName) {
  cookieName = cookieName + '=';
  var cookieData = document.cookie;
  var start = cookieData.indexOf(cookieName);
  var cookieValue = '';
  if (start != -1) {
    start += cookieName.length;
    var end = cookieData.indexOf(';', start);
    if (end == -1) end = cookieData.length;
    cookieValue = cookieData.substring(start, end);
  }
  return unescape(cookieValue);
}

function submit_ck() {
  var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
  if (!$("#LOGIN_EMAIL").val()) {
    alert("아이디/이메일을 입력해주세요");
    $("#LOGIN_EMAIL").focus();
    return false;
  } else if (!emailPattern.test($("#LOGIN_EMAIL").val())) {
    $("#LOGIN_EMAIL").focus();
    alert("이메일 형식에 맞지 않습니다!");
    return false;
  } else if (!$("#LOGIN_PW").val()) {
    alert("패스워드를 입력해주세요");
    $("#LOGIN_PW").focus();
    return false;
  } else {
    return true;
  }

}
</script>