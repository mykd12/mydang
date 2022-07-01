        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">일반회원 MODIFY</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20" id="CTs-write">
            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">일반회원 MODIFY</h1>
              </div>
              <div class="media-body align-self-center text-right">
                <a class=" btn btn u-btn-primary g-width-100--md g-font-size-default g-ml-10"
                  href="/admin/userPayList?key=<?php echo $MET_IDX;?>">결제내역
                </a>
              </div>
            </div>
            <hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <form id='frm' name='frm' action="/adminDAO/user_write" method="post" onsubmit="return submit_ck();">
              <input type='hidden' id='MET_IDX' name='MET_IDX' value='<?php echo $MET_IDX;?>' />
              <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
              <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
              <div class="row">
                <!-- 1-st column -->
                <div class="col-md-12 ">
                  <!-- Basic Text Inputs -->
                  <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">
                    <!-- 제목 Input -->
                    <div class="row">
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">일반회원 이메일</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_EMAIL' id='MET_EMAIL' type="text" value="<?php echo decrypt($results->MET_EMAIL);?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-3">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">일반회원 패스워드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_PW1' id='MET_PW1' type="password" value="<?php echo decrypt($results->MET_PW);?>"
                          placeholder='패스워드를 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-3">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">일반회원 패스워드 확인</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_PW2' id='MET_PW2' type="password" value="<?php echo decrypt($results->MET_PW);?>"
                          placeholder='패스워드 확인을 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">일반회원 이름</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_NAME' id='MET_NAME' type="text" value="<?php echo decrypt($results->MET_NAME);?>"
                          placeholder='이름을 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">일반회원 연락처</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_TEL' id='MET_TEL' type="text" value="<?php echo decrypt($results->MET_TEL);?>"
                          placeholder='연락처를 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 주소</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_ADDR1' id='MET_ADDR1' type="text" value="<?php echo decrypt($results->MET_ADDR1);?>"
                          placeholder='주소를 입력 해주세요.' onclick="execDaumPostcode();" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 상세주소</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='MET_ADDR2' id='MET_ADDR2' type="text" value="<?php echo decrypt($results->MET_ADDR2);?>"
                          placeholder='상세주소를 입력 해주세요.'>
                      </div>
                    </div>
                  </div>
                  <!-- End 제목 Input -->
                </div>
                <!-- End 1-st column -->
                <div class='col-md-12 text-center'>
                  <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
                  <a href="/admin/user?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                    class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
                </div>
              </div>
            </form>
          </div>
        </div>
        </div>
        </main>
        <script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
        <script type="text/JavaScript" src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
        <script>
function execDaumPostcode() {
  new daum.Postcode({
    showMoreHName: true,
    shorthand: false,
    oncomplete: function(data) {
      var fullRoadAddr = data.roadAddress; // 도로명 주소 변수
      var extraRoadAddr = ''; // 도로명 조합형 주소 변수
      if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
        extraRoadAddr += data.bname;
      }
      if (data.buildingName !== '' && data.apartment === 'Y') {
        extraRoadAddr += (extraRoadAddr !== '' ? ', ' + data.buildingName : data.buildingName);
      }
      if (extraRoadAddr !== '') {
        extraRoadAddr = ' (' + extraRoadAddr + ')';
      }
      if (fullRoadAddr !== '') {
        fullRoadAddr += extraRoadAddr;
      }
      var expJibunAddr = data.jibunAddress;

      document.getElementById('MET_ADDR1').value = fullRoadAddr;
      document.getElementById('MET_ADDR2').focus();

    }
  }).open();
}
        </script>
        <script type="text/javascript">
<!--
function submit_ck() {
  if (!$("#MET_NAME").val()) {
    alert("이름을 입력해주세요");
    $("#MET_NAME").focus();
    return false;
  } else if (!$("#MET_TEL").val()) {
    alert("연락처를 입력해주세요");
    $("#MET_TEL").focus();
    return false;
  } else if (!$("#MET_EMAIL").val()) {
    alert("이메일을 입력해주세요");
    $("#MET_EMAIL").focus();
    return false;
  } else if (!$("#MET_PW1").val()) {
    alert("패스워드를 입력해주세요");
    $("#MET_PW1").focus();
    return false;
  } else if (!$("#MET_PW2").val()) {
    alert("패스워드를 확인을 입력해주세요");
    $("#MET_PW2").focus();
    return false;
  } else if ($("#MET_PW1").val() != $("#MET_PW2").val()) {
    alert("패스워드와 패스워드 확인이 일치 하지 않습니다.");
    $("#MET_PW2").focus();
    return false;
  } else {
    return true;
  }
}

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
//
-->
        </script>