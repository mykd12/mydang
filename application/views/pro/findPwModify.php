<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>
<main id="container" class="pwFind_view">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <h4>비밀번호 변경</h4>
          <p class="text-de">RESET PASSWORD</p>
        </div>
        <div class="form-wrap">
          <form id="pwFind_form" method="post" action="/auth/pwModify" onsubmit="return submit_ck();">
            <input type="hidden" name="key" id="key" value="<?php echo $key;?>" />
            <input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
            <div class="email_box int_box on">
              <label for="MET_PW1" id="label_email" class="lb4">신규 패스워드</label>
              <input type="password" id="MET_PW1" name="MET_PW1" placeholder="새로운 비밀번호를 입력해주세요" class="int"
                maxlength="41" value="" autocomplete="off">
            </div>
            <div class="tel_box int_box">
              <label for="MET_PW2" id="label_email" class="lb4">패스워드 확인 </label>
              <input type="password" id="MET_PW2" name="MET_PW2" placeholder="비밀번호를 확인해주세요" class="int" maxlength="41"
                value="" autocomplete="off">
            </div>
            <input type="submit" title="변경" alt="변경" value="변경" class="btn-pwFind">
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<!----- 푸터 시작 ----->
<script>
function submit_ck() {
  var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
  if (!$("#MET_PW1").val()) {
    alert("변경할 패스워드를 입력해주세요.");
    $("#MET_PW1").focus();
    return false;
  } else if (!pwPattern.test($("#MET_PW1").val())) {
    alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
    $("#MET_PW1").focus();
    return false;
  } else if (!$("#MET_PW2").val()) {
    alert("패스워드 확인을 입력해주세요.");
    $("#MET_PW2").focus();
    return false;
  } else if ($("#MET_PW1").val() != $("#MET_PW2").val()) {
    alert("패스워드와 패스워드 확인이 일치하지 않습니다.");
    $("#MET_PW2").focus();
    return false;
  } else {
    return true;
  }
}
</script>