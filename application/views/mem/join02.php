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
<div id="container" class="join join02">
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
          <li class="text">
            <p class="num">02</p>
            <p>본인인증</p>
          </li>
          <li class="arrow"><img src="/icon/arrow04.png" alt="화살표아이콘"> </li>
          <li class="text on">
            <p class="num">03</p>
            <p>정보입력</p>
          </li>
          <li class="arrow"><img src="/icon/arrow03.png" alt="화살표아이콘"> </li>
          <li class="text">
            <p class="num">04</p>
            <p>가입완료</p>
          </li>
        </ul>
        <div class="form-wrap">
          <form id="join_form" method="post" action="/DAO/join" onsubmit="return join_ck();">
            <input type="hidden" name="EMAIL_CK" id="EMAIL_CK" value="" />
            <div class="email_box int_box on">
              <label for="MET_EMAIL" id="label_email" class="lb4">이메일</label>
              <input type="text" id="MET_EMAIL" name="MET_EMAIL" placeholder="" class="int" maxlength="41" value=""
                autocomplete="off">
              <p class="error">이메일형식에 맞게 작성해주세요.</p>
              <p class="error01">이메일을 입력해주세요.</p>
            </div>

            <div class="pw_box int_box">
              <label for="MET_PW1" id="label_pw1" class="lb5">비밀번호</label>
              <input type="PASSWORD" id="MET_PW1" name="MET_PW1" placeholder="ㆍㆍㆍㆍㆍㆍㆍㆍ" class="int" maxlength="41"
                value="" autocomplete="off">
              <p class="error">8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.</p>
              <p class="error01">비밀번호를 입력해주세요.</p>
            </div>
            <div class="pw_box int_box">
              <label for="MET_PW2" id="label_pw2" class="lb6">비밀번호 확인</label>
              <input type="PASSWORD" id="MET_PW2" name="passwordConfirmd" placeholder="ㆍㆍㆍㆍㆍㆍㆍㆍ" class="int"
                maxlength="41" value="" autocomplete="off">
              <p class="error">비밀번호를 확인해주세요.</p>
              <p class="error01">비밀번호를 확인해주세요.</p>
            </div>
            <div class="name_box int_box<?if($userName){ echo " on";}?>">
              <label for="MET_NAME" id="label_name" class="lb3 <?if($userName){ echo " on";}?>">이름</label>
              <input type="text" id="MET_NAME" name="MET_NAME" placeholder="홍길동" class="int" maxlength="41"
                value="<?php echo $userName;?>" autocomplete="off" <?if($userName){ echo " readonly" ;}?>>
              <p class="error">숫자,특수기호,공백사용불가</p>
              <p class="error01">이름을 입력해주세요.</p>
            </div>
            <div class="tel_box int_box <?if($userPhone){ echo " on";}?>">
              <label for="MET_TEL" id="label_tel" class="lb4 <?if($userPhone){ echo " on";}?>">휴대폰번호</label>
              <input type="text" id="MET_TEL" name="MET_TEL" placeholder="010 - **** - ****" class="int" maxlength="41"
                value="<?php echo $userPhone;?>" autocomplete="off" <?if($userPhone){ echo " readonly" ;}?>>
              <p class="error">특수기호,공백사용불가</p>
              <p class="error01">휴대폰 번호를 입력해주세요.</p>
            </div>
            <input type="submit" title="가입하기" alt="가입하기" value="가입하기" class="btn-join ">
          </form>
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
  $(document).on('keypress change keyup', '#MET_EMAIL', function() {
    $.ajax({
      type: 'post',
      url: '/auth/emailCk',
      data: {
        MET_EMAIL: $(this).val()
      },
      success: function(data) {
        console.log(data);
        if (data.indexOf('yes') !== -1) {
          $("#EMAIL_CK").val("y");
        } else {
          $("#EMAIL_CK").val("");
        }
      }
    });
  });


  function join_ck() {
    var emailPattern = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z]{2,4})+$/;
    var pwPattern = /^(?=.*[a-zA-Z])(?=.*[!@#$%^*+=-])(?=.*[0-9]).{8,16}$/;
    if (!$("#MET_EMAIL").val()) {
      alert("이메일을 입력해주세요.");
      $("#label_email").trigger("click");
      return false;
    } else if (!emailPattern.test($("#MET_EMAIL").val())) {
      alert("이메일 형식에 맞지 않습니다.");
      $('#MET_EMAIL').focus();
      return false;
    } else if ($("#EMAIL_CK").val() != "y") {
      alert("중복된 이메일입니다.");
      $('#MET_EMAIL').focus();
      return false;
    } else if (!$("#MET_PW1").val()) {
      alert("비밀번호를 입력해주세요.");
      $("#label_pw1").trigger("click");
      return false;
    } else if (!pwPattern.test($("#MET_PW1").val())) {
      alert("비밀번호 형식을 8~16자 영문 대 소문자, 숫자, 특수문자를 사용하세요.");
      $("#label_pw1").trigger("click");
      return false;
    } else if (!$("#MET_PW2").val()) {
      alert("비밀번호 확인을 입력해주세요.");
      $("#label_pw2").trigger("click");
      return false;
    } else if ($("#MET_PW1").val() != $("#MET_PW2").val()) {
      alert("비밀번호와 비밀번호확인이 일치 하지 않습니다.");
      $('#MET_PW2').focus();
      return false;
    } else if (!$("#MET_NAME").val()) {
      alert("이름을 입력해주세요.");
      $("#label_name").trigger("click");
      return false;
    } else if (!$("#MET_TEL").val()) {
      alert("연락처를 입력해주세요.");
      $("#label_tel").trigger("click");
      $('#MET_TEL').focus();
      return false;
    }
  }
  </script>


  </html>