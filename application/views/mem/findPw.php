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
<div id="container" class="pwFind_view">
  <div class="container-inner">
    <div class="title-wrap">
      <div class="bg-wrap">
      </div>
      <a href="/" class="btn-home"><span class="blind">메인으로</span></a>
      <p class="text-title">비밀번호 변경
        <br>
        <span>
          FIND PW
        </span>
      </p>
      <div class="bottom-wrap">
        <p class="copyright">Copyright ⓒ 2021 Developer Noah Co.<br> All rights reserved</p>
      </div>
    </div>
    <div class="content">
      <div class="content-inner">
        <!-- <div class="sub-title">
          <i class="xi-unlock-o"></i>
          <h4>비밀번호 변경</h4>
        </div> -->
        <div class="form-wrap">
          <form id="pwFind_form" method="post" action="/DAO/pwChange" onsubmit="return submit_ck();">
            <input type="hidden" name="MET_IDX" id="MET_IDX" value="<?php echo $key?>" />
            <div class="email_box int_box on">
              <label for="MET_PW1" id="label_email" class="lb4">신규 패스워드</label>
              <input type="password" id="MET_PW1" name="MET_PW1" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off">
            </div>
            <div class="tel_box int_box">
              <label for="MET_PW2" id="label_email" class="lb4">패스워드 확인 </label>
              <input type="password" id="MET_PW2" name="MET_PW2" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off">
            </div>
            <input type="submit" title="변경" alt="변경" value="변경" class="btn-pwFind">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>

</html>
<script type="text/javascript">
function submit_ck() {
  var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
  // 공백 검사
  if (!$("#MET_PW1").val()) {
    alert("패스워드를 입력해주세요!");
    $("#MET_PW1").focus();
    return false;
  } else if (!pwPattern.test($("#MET_PW1").val())) {
    alert("패스워드 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
    $("#MET_PW1").focus();
    return false;
  } else if (!$("#MET_PW2").val()) {
    $("#MET_PW2").focus();
    alert("패스워드 확인을 입력해주세요");
    return false;
  } else if ($("#MET_PW1").val() != $("#MET_PW2").val()) {
    $("#MET_PW2").focus();
    alert("변경할 패스워드와 패스워드 확인 일치 하지 않습니다.");
    return false;
  } else {
    return true;
  }
}
</script>