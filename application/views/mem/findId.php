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
<div id="container" class="idFind_view">
  <div class="container-inner">
    <div class="title-wrap">
      <div class="bg-wrap">
      </div>
      <a href="/" class="btn-home"><span class="blind">메인으로</span></a>
      <p class="text-title">아이디 확인
        <br>
        <span>
          FIND ID
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
          <h4>아이디 확인</h4>
        </div> -->
        <div class="form-wrap">
          <form id="idFind_form" method="post" action="./inc/mainVO.php" onsubmit="return submit_ck();">
            <div class="name_box int_box on">
              <label for="MET_NAME" id="label_name" class="lb3 on">아이디</label>
              <input type="text" class="int" maxlength="41" autocomplete="off" value="<?php echo $email;?>" readonly
                style='color:#00a2c5;'>
            </div>
            <input type="button" title="로그인" alt="로그인" value="로그인" class="btn-login"
              onclick="location.href='/main/login';">
            <input type="button" title="패스워드 찾기" alt="패스워드 찾기" value="패스워드 찾기" class="btn-idFind"
              onclick="location.href='/main/find?email=<?php echo $email;?>';">
          </form>
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
  if (!$("#MET_NAME").val()) {
    alert("이름을 입력해주세요!");
    $("#MET_NAME").focus();
    return false;
  } else if (!$("#MET_TEL").val()) {
    alert("연락처를 입력해주세요!");
    $("#MET_TEL").focus();
    return false;
  } else {
    return true;
  }
}
</script>