<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>


      <li class="list-inline-item">
        <span class="g-valign-middle">파트너사 <?php if($PTT_IDX){?> MODIFY
          <?}else{?> ADD
          <?}?>
        </span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">파트너사 <?php if($PTT_IDX){?> MODIFY
          <?}else{?> ADD
          <?}?>
        </h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm'>
      <input type='hidden' id='PTT_IDX' name='PTT_IDX' value='<?php if($PTT_IDX) echo $PTT_IDX; ?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php if($PTT_IDX) echo $pageNo; ?>' />
      <input type='hidden' id='search' name='search' value='<?php if($PTT_IDX) echo $search; ?>' />
      <input type='hidden' id='PTT_ADDR1_B' name='PTT_ADDR1_B'
        value='<?php if($PTT_IDX) echo $results->PTT_ADDR1_B;?>' />
      <input type='hidden' id='PTT_LAT' name='PTT_LAT' value='<?php if($PTT_IDX) echo $results->PTT_LAT;?>' />
      <input type='hidden' id='PTT_LON' name='PTT_LON' value='<?php if($PTT_IDX) echo $results->PTT_LON;?>' />
      <input type='hidden' id='PTT_EMAIL_CK' name='PTT_EMAIL_CK'
        value='<?php if($PTT_IDX && $results->PTT_EMAIL){ echo "Y";} ?>' />
      <input name='PTT_AREA_A' id='PTT_AREA_A' type="hidden" value="<?php if($PTT_IDX) echo $results->PTT_AREA_A; ?>">
      <input type='hidden' id='PTT_AREA_A_CODE' name='PTT_AREA_A_CODE'
        value='<?php if($PTT_IDX) echo $results->PTT_AREA_A_CODE; ?>' />
      <input name='PTT_AREA_B' id='PTT_AREA_B' type="hidden" value="<?php if($PTT_IDX) echo $results->PTT_AREA_B;?>">
      <input type='hidden' id='PTT_AREA_B_CODE' name='PTT_AREA_B_CODE'
        value='<?php if($PTT_IDX) echo $results->PTT_AREA_B_CODE; ?>' />
      <input name='PTT_AREA_C' id='PTT_AREA_C' type="hidden" value="<?php if($PTT_IDX) echo $results->PTT_AREA_C; ?>">
      <input type='hidden' id='PTT_AREA_C_CODE' name='PTT_AREA_C_CODE'
        value='<?php if($PTT_IDX) echo $results->PTT_AREA_C_CODE; ?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

            <!-- 제목 Input -->
            <div class="row">
              <?if($PTT_IDX){?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">이메일</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_EMAIL' id='PTT_EMAIL' type="text"
                  value="<?php if($PTT_IDX) echo decrypt($results->PTT_EMAIL);?>" placeholder='이메일을 입력 해주세요.' readonly>
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
                    name='PTT_EMAIL' id='PTT_EMAIL' type="text" placeholder="이메일을 입력 해주세요.">
                </div>
              </div>
              <?}?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">패스워드</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_PW1' id='PTT_PW1' type="password"
                  value="<?php if($PTT_IDX) echo decrypt($results->PTT_PW);?>" placeholder='패스워드를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">패스워드 확인</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_PW2' id='PTT_PW2' type="password"
                  value="<?php if($PTT_IDX) echo decrypt($results->PTT_PW);?>" placeholder='패스워드 확인을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-2">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">파트너사 주 분야</h4>
                <select class="form-control form-control-md rounded-0" id="PTT_TYPE" name="PTT_TYPE"
                  style="height:50px;">
                  <option value="">:: 파트너사 주 분야 선택 ::</option>
                  <option value="인테리어" <?php if($PTT_IDX && $results->PTT_TYPE=='인테리어'){ echo "selected"; }?>>인테리어
                  </option>
                  <option value="가구" <?php if($PTT_IDX && $results->PTT_TYPE=='가구'){ echo "selected"; }?>>가구</option>
                  <option value="주방/설비" <?php if($PTT_IDX && $results->PTT_TYPE=='주방/설비'){ echo "selected"; }?>>주방/설비
                  </option>
                  <option value="간판" <?php if($PTT_IDX && $results->PTT_TYPE=='간판'){ echo "selected"; }?>>간판</option>
                  <option value="광고/인쇄" <?php if($PTT_IDX && $results->PTT_TYPE=='광고/인쇄'){ echo "selected"; }?>>광고/인쇄
                  </option>
                  <option value="통신/보안" <?php if($PTT_IDX && $results->PTT_TYPE=='통신/보안'){ echo "selected"; }?>>통신/보안
                  </option>
                  <option value="렌탈" <?php if($PTT_IDX && $results->PTT_TYPE=='렌탈'){ echo "selected"; }?>>렌탈</option>
                  <option value="기타" <?php if($PTT_IDX && $results->PTT_TYPE=='기타'){ echo "selected"; }?>>기타</option>
                </select>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">파트너사 명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_NAME' id='PTT_NAME' type="text"
                  value="<?php if($PTT_IDX) echo decrypt($results->PTT_NAME);?>" placeholder='파트너사 명을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-3">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주소</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_ADDR1_A' id='PTT_ADDR1_A' type="text"
                  value="<?php if($PTT_IDX) echo decrypt($results->PTT_ADDR1_A);?>" placeholder='주소를 입력해주세요.'
                  onclick="execDaumPostcode();" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-3">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상세 주소</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_ADDR2' id='PTT_ADDR2' type="text"
                  value="<?php if($PTT_IDX) echo decrypt($results->PTT_ADDR2);?>" placeholder='상세 주소를 입력해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대표자명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_CEO' id='PTT_CEO' type="text" value="<?php if($PTT_IDX) echo decrypt($results->PTT_CEO);?>"
                  placeholder='대표자명을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대표연락처</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_TEL' id='PTT_TEL' type="text" value="<?php if($PTT_IDX) echo decrypt($results->PTT_TEL);?>"
                  placeholder='연락처를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">휴대전화번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_HP' id='PTT_HP' type="text" value="<?php if($PTT_IDX) echo decrypt($results->PTT_HP);?>"
                  placeholder='휴대전화번호를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-3">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지역</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_AREA' id='PTT_AREA' type="text" value="<?php if($PTT_IDX) echo $results->PTT_AREA;?>"
                  placeholder='지역 입력해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-3">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">경력</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_CAREER' id='PTT_CAREER' type="text" value="<?php if($PTT_IDX) echo $results->PTT_CAREER;?>"
                  placeholder='경력 입력해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">사업자등록증번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PTT_NUM' id='PTT_NUM' type="text" value="<?php if($PTT_IDX) echo decrypt($results->PTT_NUM);?>"
                  placeholder='사업자등록증번호를 입력해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-12">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">파트너사소개</h4>
                <textarea class="form-control" name='PTT_TEXT' id='PTT_TEXT' type="text"
                  placeholder='파트너사소개를 입력해주세요.'><?php if($PTT_IDX) echo $results->PTT_TEXT;?></textarea>
              </div>
            </div>
          </div>
          <!-- End 제목 Input -->
          <div class="form-group g-mb-20 col-md-12">
            <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">사업자등록증</h4>
            <input type='hidden' name='PTT_FILE_SAVE' id='PTT_FILE_SAVE'
              value='<?php if($PTT_IDX) echo $results->PTT_FILE_SAVE;?>' />
            <?php if($PTT_IDX && $results->PTT_FILE_SAVE){?>
            <div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
              <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
                <a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?php echo $results->PTT_FILE_ORG;?>"
                  data-src="/uploads/<?php echo $results->PTT_FILE_SAVE;?>" data-speed="350"
                  data-caption="<?php echo $results->PTT_FILE_ORG;?>">
                  <img class="img-fluid" src="/uploads/<?php echo $results->PTT_FILE_SAVE;?>"
                    alt="<?php echo $results->PTT_FILE_ORG;?>" STYLE='max-width:250px;'>
                </a>
              </div>
            </div>
            <?}?>
            <div>
              <div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
                <input class="form-control form-control-md rounded-0" placeholder="사업자등록증을 선택해주세요." readonly=""
                  type="text">
                <div class="input-group-btn">
                  <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
                  <input type="file" name='PTT_FILE' id='PTT_FILE'>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group g-mb-20 col-md-12">
            <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대표 이미지 </h4>
            <input type='hidden' name='PTT_IMG_SAVE' id='PTT_IMG_SAVE'
              value='<?php if($PTT_IDX) echo $results->PTT_IMG_SAVE;?>' />
            <?php if($PTT_IDX && $results->PTT_IMG_SAVE){?>
            <div class='g-brd-top g-brd-bottom g-brd-gray-light-v4 g-py-10 '>
              <div class="card g-brd-gray-light-v7 g-px-20--sm g-pt-30 g-pb-30 g-mb-20 text-center ">
                <a class=" g-mb-30 g-mb-0--md" href="javascript:;" data-fancybox="<?php echo $results->PTT_IMG_ORG;?>"
                  data-src="/uploads/<?php echo $results->PTT_IMG_SAVE;?>" data-speed="350"
                  data-caption="<?php echo $results->PTT_IMG_ORG;?>">
                  <img class="img-fluid" src="/uploads/<?php echo $results->PTT_IMG_SAVE;?>"
                    alt="<?php echo $results->PTT_IMG_ORG;?>" STYLE='max-width:250px;'>
                </a>
              </div>
            </div>
            <?}?>
            <div>
              <div class="input-group u-file-attach-v1 g-brd-gray-light-v2  g-mt-20">
                <input class="form-control form-control-md rounded-0" placeholder="대표 이미지를 선택해주세요." readonly=""
                  type="text">
                <div class="input-group-btn">
                  <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">Browse</button>
                  <input type="file" name='PTT_IMG' id='PTT_IMG'>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End 1-st column -->
        <div class='col-md-12 text-center g-mt-25'>
          <input type="button" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' id="SAVE_BTN"
            onclick="submit_save();" />
          <a href="partner?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
            class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</main>

<script type="text/javascript">
<!--
var editor_object = [];
nhn.husky.EZCreator.createInIFrame({
  oAppRef: editor_object,
  elPlaceHolder: "PTT_TEXT",
  sSkinURI: "/SE/SmartEditor2Skin.html",
  htParams: {
    // 툴바 사용 여부 (true:사용/ false:사용하지 않음)
    bUseToolbar: true,
    // 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
    bUseVerticalResizer: true,
    // 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
    bUseModeChanger: true,
  }
});
//
-->
</script>
<script type="text/javascript">
<!--
function email_ck() {
  var PTT_EMAIL = $("#PTT_EMAIL").val();
  if (!PTT_EMAIL) {
    alert("이메일을 입력해주세요!");
    $("#PTT_EMAIL").focus();
    return false;
  }
  $.ajax({
    type: 'post',
    url: '/adminDAO/partnerEmailCk',
    data: {
      mode: 'PTT_EMAIL_CK',
      PTT_EMAIL: PTT_EMAIL
    },
    success: function(data) {
      if (data.indexOf('yes') !== -1) {
        alert("사용가능한 이메일입니다.");
        $("#PTT_EMAIL").attr("readonly", true);
        $("#PTT_EMAIL_CK").val("Y");
      } else {
        alert("중복된 이메일입니다.");
      }
    }
  });
}
//
-->
</script>
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

      document.getElementById('PTT_ADDR1_A').value = fullRoadAddr;
      document.getElementById('PTT_ADDR2').focus();
      addr_data = fullRoadAddr;
      addr_location(addr_data);

      $("#PTT_AREA_A").val(data.sido);
      $("#PTT_AREA_B").val(data.sigungu);
      if (data.sido == '세종특별자치시') {
        $("#PTT_AREA_B").val(data.sido);
      }

      $("#PTT_AREA_C").val(data.bname);
      $("#PTT_AREA_B_CODE").val(data.sigunguCode);
      $("#PTT_AREA_C_CODE").val(data.bcode);

      $("#PTT_ADDR1_B").val(expJibunAddr);
    }
  }).open();
}
</script>
<script type="text/javascript"
  src="//dapi.kakao.com/v2/maps/sdk.js?appkey=ca6889c8b7dc6867af0b4a4ba8cbfe35&libraries=services"></script>

<script type="text/javascript">
<!--
function addr_location(addr_data) {
  //alert(addr_data);
  var addr_data = addr_data;

  var geocoder = new daum.maps.services.Geocoder();
  var addr_lat = '';
  var addr_lng = '';

  // 주소로 좌표를 검색합니다
  geocoder.addressSearch(addr_data, function(result, status) {

    // 정상적으로 검색이 완료됐으면
    if (status === daum.maps.services.Status.OK) {
      addr_lat = result[0].y;
      addr_lng = result[0].x;
      $("#PTT_LAT").val(addr_lat);
      $("#PTT_LON").val(addr_lng);

      var coords = new daum.maps.LatLng(result[0].y, result[0].x);

      // 결과값으로 받은 위치를 마커로 표시합니다
      var marker = new daum.maps.Marker({
        map: map,
        position: coords
      });

      // 인포윈도우로 장소에 대한 설명을 표시합니다
      var infowindow = new daum.maps.InfoWindow({
        content: '<div style="width:150px;text-align:center;padding:6px 0;">우리회사</div>'
      });
      infowindow.open(map, marker);

      // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
      map.setCenter(coords);
    }
  });
}
//
-->
</script>

<script type="text/javascript">
<!--
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

var cellPhone = document.getElementById('PTT_TEL');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

var cellPhone = document.getElementById('PTT_HP');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

function submit_save() {
  editor_object.getById["PTT_TEXT"].exec("UPDATE_CONTENTS_FIELD", []);

  if (!$("#PTT_EMAIL").val()) {
    alert("이메일을 입력해주세요");
    $("#PTT_EMAIL").focus();
    return false;
  } else if (!$("#PTT_EMAIL_CK").val()) {
    alert("이메일 중복확인을 해주세요");
    $("#PTT_EMAIL").focus();
    return false;
  } else if (!$("#PTT_PW1").val()) {
    alert("패스워드를 입력해주세요");
    $("#PTT_PW1").focus();
    return false;
  } else if (!$("#PTT_PW2").val()) {
    alert("패스워드를 확인을 입력해주세요");
    $("#PTT_PW2").focus();
    return false;
  } else if ($("#PTT_PW1").val() != $("#PTT_PW2").val()) {
    alert("패스워드와 패스워드 확인이 일치 하지 않습니다.");
    $("#PTT_PW2").focus();
    return false;
  } else if (!$("#PTT_TYPE").val()) {
    alert("파트너사 주분야를 선택해주세요");
    $("#PTT_TYPE").focus();
    return false;
  } else if (!$("#PTT_NAME").val()) {
    alert("파트너사 명을 입력해주세요");
    $("#PTT_NAME").focus();
    return false;
  } else if (!$("#PTT_ADDR1_A").val()) {
    alert("파트너사 주소를 입력해주세요");
    $("#PTT_ADDR1_A").focus();
    return false;
  } else if (!$("#PTT_ADDR2").val()) {
    alert("파트너사 상세주소를 입력해주세요");
    $("#PTT_ADDR2").focus();
    return false;
  } else if (!$("#PTT_CEO").val()) {
    alert("대표자 이름을 입력해주세요");
    $("#PTT_CEO").focus();
    return false;
  } else if (!$("#PTT_TEL").val()) {
    alert("파트너사 대표연락처를 입력해주세요");
    $("#PTT_TEL").focus();
    return false;
  } else if (!$("#PTT_HP").val()) {
    alert("파트너사 휴대전화번호 입력해주세요");
    $("#PTT_HP").focus();
    return false;
  } else if (!$("#PTT_AREA").val()) {
    alert("지역을 입력해주세요");
    $("#PTT_AREA").focus();
    return false;
  } else if (!$("#PTT_CAREER").val()) {
    alert("경력을 입력해주세요");
    $("#PTT_CAREER").focus();
    return false;
  } else if (!$("#PTT_NUM").val()) {
    alert("사업자등록증 번호를 입력해주세요");
    $("#PTT_NUM").focus();
    return false;
  } else if (!$("#PTT_TEXT").val()) {
    alert("파트너사소개를 입력해주세요");
    $("#PTT_TEXT").focus();
    return false;
  } else if (!$("#PTT_FILE").val() && !$("#PTT_FILE_SAVE").val()) {
    alert("파트너사 사업자등록증을 선택해주세요");
    $("#PTT_FILE").focus();
    return false;
  } else {
    var action = "/adminDAO/partner_write";
    //폼 submit
    $('#frm').attr("enctype", "multipart/form-data");
    $('#frm').attr("action", action);
    $('#frm').attr('action', action).attr('method', 'post').submit();
  }
}
//
-->
</script>