<link rel="stylesheet" href="/css/pro/login.css?v=<?php echo time(); ?>">
<script src="/js/login.js?v=<?php echo time(); ?>"></script>
<main id="container" class="idFind-view">
  <div class="container-inner">
    <div class="content">
      <div class="content-inner">
        <div class="title">
          <h4>이메일(아이디) 확인</h4>
          <p class="text-de">CHECK ID</p>
        </div>
        <div class="form-wrap">
          <form id="idFind_form" method="post" action="">
            <ul class="id-list">
              <?php if($emailA){?>
              <li>
                <div class="text-left">중개인</div>
                <div class="input-box">
                  <input class="radio" id="id01" name="id" type="radio" value="<?php echo $emailA;?>" data="A">
                  <label for="id01"><?php echo $emailA;?></label>
                </div>
              </li>
              <?php }?>
              <?php if($emailB){?>
              <li>
                <div class="text-left">일반</div>
                <div class="input-box">
                  <input class="radio" id="id02" name="id" type="radio" value="<?php echo $emailB;?>" data="B">
                  <label for="id02"><?php echo $emailB;?></label>
                </div>
              </li>
              <?php }?>
              <?php if($emailC){?>
              <li>
                <div class="text-left">파트너</div>
                <div class="input-box">
                  <input class="radio" id="id03" name="id" type="radio" value="<?php echo $emailC;?>" data="C">
                  <label for="id03"><?php echo $emailC;?></label>
                </div>
              </li>
              <?php }?>
            </ul>
            <div class="btn-wrap">
              <input type="button" title="로그인" alt="로그인" value="로그인" class="btn-login" onclick="location.href='/pro/';">
              <input type="button" title="패스워드 찾기" alt="패스워드 찾기" value="패스워드 찾기" class="btn-idFind" onclick="pwFind()">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
function pwFind() {
  if ($('input:radio[name=id]').is(':checked')) {
    var email = $("input[name='id']:checked").val();
    var type = $("input[name='id']:checked").attr("data");
    location.href = '/pro/findPw?email=' + email + '&type=' + type;
  } else {
    alert("아이디/이메일 체크를 해주세요");
    return false;
  }
}
</script>