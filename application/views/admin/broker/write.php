        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>


              <li class="list-inline-item">
                <span class="g-valign-middle">중개사
                  <?if($BKT_IDX){?>MODIFY
                  <?}else{?>ADD
                  <?}?>
                </span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20" id="CTs-write">
            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">중개사
                  <?if($BKT_IDX){?>MODIFY
                  <?}else{?>ADD
                  <?}?>
                </h1>
              </div>
              <?php if($BKT_IDX){?>
              <div class="media-body align-self-center text-right">
                <a class=" btn btn u-btn-primary g-width-150--md g-font-size-default g-ml-10"
                  href="/admin/brokerMemer?key=<?=$BKT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>">+ 보조중계사 관리
                </a>
                <a class=" btn btn u-btn-primary g-width-100--md g-font-size-default g-ml-10"
                  href="/admin/brokerPaym?key=<?=$BKT_IDX?>&pageNo=<?=$pageNo?>&search=<?=$search?>">+
                  상품관리
                </a>
              </div>
              <?php }?>
            </div>
            <hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <form id='frm' name='frm' action="/adminDAO/broker_write" method="post" enctype="multipart/form-data"
              onsubmit="return submit_ck();">
              <input type='hidden' id='BKT_IDX' name='BKT_IDX' value='<?php echo $BKT_IDX;?>' />
              <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
              <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
              <input type='hidden' id='BKT_EMAIL_CK' name='BKT_EMAIL_CK'
                value='<?if($BKT_IDX && $results->BKT_EMAIL){ echo "Y";}?>' />
              <div class="row">
                <!-- 1-st column -->
                <div class="col-md-12 ">
                  <!-- Basic Text Inputs -->
                  <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

                    <!-- 제목 Input -->
                    <div class="row">
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">검수</h4>
                        <select name="BKT_APP" id="BKT_APP" class="form-control">
                          <option value="" <?php if(!$BKT_IDX || !$results->BKT_APP) echo "selected";?>>대기</option>
                          <option value="y" <?php if($BKT_IDX && $results->BKT_APP=='y') echo "selected";?>>승인</option>

                        </select>
                      </div>
                      <div class="form-group g-mb-20 col-md-10">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">중개사명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_COMPANY' id='BKT_COMPANY' type="text"
                          value="<?php if($BKT_IDX) echo $results->BKT_COMPANY;?>" placeholder='중개사명을 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이름</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_NAME' id='BKT_NAME' type="text"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_NAME);?>" placeholder='이름을 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">연락처</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_TEL' id='BKT_TEL' type="text"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_TEL);?>" placeholder='연락처를 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">휴대전화</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_HP' id='BKT_HP' type="text"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_HP);?>" placeholder='휴대전화를 입력 해주세요.'>
                      </div>
                      <?if($BKT_IDX){?>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이메일</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_EMAIL' id='BKT_EMAIL' type="text" value="<?php echo decrypt($results->BKT_EMAIL);?>"
                          placeholder='이메일을 입력 해주세요.' readonly>
                      </div>
                      <?}else{?>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이메일</h4>
                        <div class="g-pos-rel">
                          <button class="btn u-input-btn--v1 g-width-80 g-bg-primary g-rounded-right-4" type="button"
                            style="color:#fff;" id="email_ck_btn" onclick="email_ck();">
                            중복확인
                          </button>
                          <input
                            class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3 g-rounded-4 g-px-14 g-py-10"
                            name='BKT_EMAIL' id='BKT_EMAIL' type="text" placeholder="담당자 이메일을 입력 해주세요."
                            value="<?//=$BKT_EMAIL?>">
                        </div>
                      </div>
                      <?}?>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">패스워드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_PW1' id='BKT_PW1' type="password"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_PW);?>" placeholder='패스워드를 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">패스워드 확인</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_PW2' id='BKT_PW2' type="password"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_PW);?>" placeholder='패스워드 확인을 입력 해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주소</h4>
                        <input type='text' name='BKT_ADDR1' id='BKT_ADDR1'
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          value='<?php if($BKT_IDX) echo decrypt($results->BKT_ADDR1);?>' readonly
                          placeholder='주소를 입력해주세요.' onclick="execDaumPostcode();" />
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상세주소</h4>
                        <input type='text' name='BKT_ADDR2' id='BKT_ADDR2'
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          value='<?php if($BKT_IDX) echo decrypt($results->BKT_ADDR2);?>' placeholder='상세주소를 입력해주세요.' />
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">법인 번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_CORPORATE' id='BKT_CORPORATE' type="text"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_CORPORATE);?>"
                          placeholder='법인 번호를 입력해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">중개등록 번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_NUM' id='BKT_NUM' type="text"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_NUM);?>" placeholder='중개등록 번호를 입력해주세요.'>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">사업자등록 번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='BKT_BUSINESS_NUMBER' id='BKT_BUSINESS_NUMBER' type="text"
                          value="<?php if($BKT_IDX) echo decrypt($results->BKT_BUSINESS_NUMBER);?>"
                          placeholder='사업자등록 번호를 입력해주세요.'>
                      </div>

                    </div>
                  </div>
                  <div class="row">
                    <!-- End 제목 Input -->
                    <div class="form-group g-mb-20 col-md-4">
                      <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">중개사등록증</h4>
                      <input type='hidden' name='BKT_FILE_SAVE' id='BKT_FILE_SAVE'
                        value='<?php if($BKT_IDX) echo $results->BKT_FILE_SAVE;?>' />
                      <?if($BKT_IDX && $results->BKT_FILE_SAVE){?>
                      <div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
                        <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
                          <a class=" g-mb-30 g-mb-0--md" href="javascript:;"
                            data-fancybox="<?php echo $results->BKT_FILE_ORG;?>"
                            data-src="/uploads/<?php echo $results->BKT_FILE_SAVE;?>" data-speed="350"
                            data-caption="<?php echo $results->BKT_FILE_ORG;?>">
                            <img class="img-fluid" src="/uploads/<?php echo $results->BKT_FILE_SAVE;?>"
                              alt="<?php echo $results->BKT_FILE_ORG;?>" STYLE='max-width:250px;'>
                          </a>
                        </div>
                      </div>
                      <?php }?>
                      <div>
                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
                          <input class="form-control form-control-md rounded-0" placeholder="중개사등록증 파일을 첨부해주세요."
                            readonly="" type="text">
                          <div class="input-group-btn">
                            <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
                            <input type="file" name='BKT_FILE' id='BKT_FILE'>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group g-mb-20 col-md-4">
                      <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대표이미지</h4>
                      <input type='hidden' name='BKT_IMG_SAVE' id='BKT_IMG_SAVE'
                        value='<?php if($BKT_IDX) echo $results->BKT_IMG_SAVE;?>' />
                      <?if($BKT_IDX && $results->BKT_IMG_SAVE){?>
                      <div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
                        <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
                          <a class=" g-mb-30 g-mb-0--md" href="javascript:;"
                            data-fancybox="<?php echo $results->BKT_IMG_ORG;?>"
                            data-src="/uploads/<?php echo $results->BKT_IMG_SAVE;?>" data-speed="350"
                            data-caption="<?php echo $results->BKT_IMG_ORG;?>">
                            <img class="img-fluid" src="/uploads/<?php echo $results->BKT_IMG_SAVE;?>"
                              alt="<?php echo $results->BKT_IMG_ORG;?>" STYLE='max-width:250px;'>
                          </a>
                        </div>
                      </div>
                      <?php }?>
                      <div>
                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
                          <input class="form-control form-control-md rounded-0" placeholder="대표이미지 파일을 첨부해주세요."
                            readonly="" type="text">
                          <div class="input-group-btn">
                            <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
                            <input type="file" name='BKT_IMG' id='BKT_IMG'>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group g-mb-20 col-md-4">
                      <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">사업자등록증</h4>
                      <input type='hidden' name='BKT_FILE1_SAVE' id='BKT_FILE1_SAVE'
                        value='<?php if($BKT_IDX) echo $results->BKT_FILE1_SAVE;?>' />
                      <?if($BKT_IDX && $results->BKT_FILE1_SAVE){?>
                      <div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
                        <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
                          <a class=" g-mb-30 g-mb-0--md" href="javascript:;"
                            data-fancybox="<?php echo $results->BKT_FILE1_ORG;?>"
                            data-src="/uploads/<?php echo $results->BKT_FILE1_SAVE;?>" data-speed="350"
                            data-caption="<?php echo $results->BKT_FILE1_ORG;?>">
                            <img class="img-fluid" src="/uploads/<?php echo $results->BKT_FILE1_SAVE;?>"
                              alt="<?php echo $results->BKT_FILE1_ORG;?>" STYLE='max-width:250px;'>
                          </a>
                        </div>
                      </div>
                      <?php }?>
                      <div>
                        <div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
                          <input class="form-control form-control-md rounded-0" placeholder="사업자등록증 파일을 첨부해주세요."
                            readonly="" type="text">
                          <div class="input-group-btn">
                            <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
                            <input type="file" name='BKT_FILE1' id='BKT_FILE1'>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End 1-st column -->
                <div class='col-md-12 text-center'>
                  <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
                  <a href="/admin/broker?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
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
var addr_data = '';

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

      document.getElementById('BKT_ADDR1').value = fullRoadAddr;
      document.getElementById('BKT_ADDR2').focus();
      addr_data = fullRoadAddr;

    }
  }).open();
}
        </script>
        <script type="text/javascript">
<!--
function submit_ck() {
  var BKT_TYPE = $("#BKT_TYPE").val();
  if (!$("#BKT_COMPANY").val()) {
    alert("중개사명을 입력해주세요");
    $("#BKT_COMPANY").focus();
    return false;
  } else if (!$("#BKT_NAME").val()) {
    alert("담당자 이름을 입력해주세요");
    $("#BKT_NAME").focus();
    return false;
  } else if (!$("#BKT_TEL").val()) {
    alert("연락처를 입력해주세요");
    $("#BKT_TEL").focus();
    return false;
  } else if (!$("#BKT_HP").val()) {
    alert("휴대전화번호를 입력해주세요");
    $("#BKT_HP").focus();
    return false;
  } else if (!$("#BKT_EMAIL").val()) {
    alert("이메일을 입력해주세요");
    $("#BKT_EMAIL").focus();
    return false;
  } else if (!$("#BKT_EMAIL_CK").val()) {
    alert("이메일 중복확인을 해주세요");
    $("#BKT_EMAIL").focus();
    return false;
  } else if (!$("#BKT_PW1").val()) {
    alert("패스워드를 입력해주세요");
    $("#BKT_PW1").focus();
    return false;
  } else if (!$("#BKT_PW2").val()) {
    alert("패스워드를 확인을 입력해주세요");
    $("#BKT_PW2").focus();
    return false;
  } else if ($("#BKT_PW1").val() != $("#BKT_PW2").val()) {
    alert("패스워드와 패스워드 확인이 일치 하지 않습니다.");
    $("#BKT_PW2").focus();
    return false;
  } else if (!$("#BKT_ADDR1").val()) {
    alert("주소를 입력해주세요.");
    $("#BKT_ADDR1").focus();
    return false;
  } else if (!$("#BKT_ADDR2").val()) {
    alert("상세 주소를 입력해주세요.");
    $("#BKT_ADDR2").focus();
    return false;
  } else if (!$("#BKT_CORPORATE").val()) {
    alert("법인 번호를 입력해주세요.");
    $("#BKT_CORPORATE").focus();
    return false;
  } else if (!$("#BKT_NUM").val()) {
    alert("중개등록 번호를 입력해주세요.");
    $("#BKT_NUM").focus();
    return false;
  } else if (!$("#BKT_BUSINESS_NUMBER").val()) {
    alert("사업자등록 번호를 입력해주세요.");
    $("#BKT_BUSINESS_NUMBER").focus();
    return false;
  } else if (!$("#BKT_FILE").val() && !$("#BKT_FILE_SAVE").val()) {
    alert("중개사등록 파일을 첨부해주세요");
    $("#BKT_FILE").focus();
    return false;
  } else {
    return true;
  }
}

//
-->
        </script>
        <script type="text/javascript">
<!--
function email_ck() {
  var BKT_EMAIL = $("#BKT_EMAIL").val();
  if (!BKT_EMAIL) {
    alert("이메일을 입력해주세요!");
    $("#BKT_EMAIL").focus();
    return false;
  }
  $.ajax({
    type: 'post',
    url: '/adminDAO/brkEmailCk',
    data: {
      BKT_EMAIL: BKT_EMAIL
    },
    success: function(data) {
      console.log(data);
      if (data.indexOf('yes') !== -1) {
        alert("사용가능한 이메일입니다.");
        $("#BKT_EMAIL_CK").val("Y");
        $("#BKT_EMAIL").attr("readonly", true);
      } else {
        alert("중복된 이메일입니다.");
      }
    }
  });
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

var cellPhone = document.getElementById('BKT_TEL');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

var cellPhoneH = document.getElementById('BKT_HP');
cellPhoneH.onkeyup = function(event) {
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