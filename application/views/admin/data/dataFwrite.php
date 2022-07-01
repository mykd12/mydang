<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">분석데이터 관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item">
        <span class="g-valign-middle">주요집객시설 MODIFY</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">주요집객시설 MODIFY</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/dataFwrite" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='DFT_IDX' name='DFT_IDX' value='<?php echo $DFT_IDX;?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
      <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
      <input type='hidden' id='DFT_LAT' name='DFT_LAT'
        value='<?php if($DFT_IDX && $results->DFT_LAT) echo $results->DFT_LAT;?>' />
      <input type='hidden' id='DFT_LON' name='DFT_LON'
        value='<?php if($DFT_IDX && $results->DFT_LON) echo $results->DFT_LON;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

            <!-- 제목 Input -->
            <div class="row">
              <div class="form-group g-mb-20 col-md-12">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">기관명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_NAME' id='DFT_NAME' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_NAME) echo $results->DFT_NAME;?>"
                  placeholder='기관명을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-12">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분 A</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_TYPE_A' id='DFT_TYPE_A' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_TYPE_A) echo $results->DFT_TYPE_A;?>"
                  placeholder='구분 A 입력 해주세요.' readonly>
              </div>
              <div class="form-group g-mb-20 col-md-12">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구분 B</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_TYPE_B' id='DFT_TYPE_B' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_TYPE_B) echo $results->DFT_TYPE_B;?>"
                  placeholder='구분 B 입력 해주세요.' readonly>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">도로명주소</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_ADDR_A' id='DFT_ADDR_A' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_ADDR_A) echo $results->DFT_ADDR_A;?>" readonly
                  placeholder='도로명주소를 입력 해주세요.' onclick="execDaumPostcode();">
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">동주소</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_ADDR_B' id='DFT_ADDR_B' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_ADDR_B) echo $results->DFT_ADDR_B;?>" readonly
                  placeholder='동주소를 입력 해주세요.' onclick="execDaumPostcode1();">
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시/도</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_AREA_A' id='DFT_AREA_A' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_AREA_A) echo $results->DFT_AREA_A;?>" readonly
                  placeholder='시/도를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시/구/군</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_AREA_B' id='DFT_AREA_B' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_AREA_B) echo $results->DFT_AREA_B;?>" readonly
                  placeholder='구/군을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">동/면/리</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DFT_AREA_C' id='DFT_AREA_C' type="text"
                  value="<?php if($DFT_IDX && $results->DFT_AREA_C) echo $results->DFT_AREA_C;?>" readonly
                  placeholder='구/군을 입력 해주세요.'>
              </div>
            </div>
            <!-- End 제목 Input -->

          </div>
          <!-- End 1-st column -->
          <div class='col-md-12 text-center'>
            <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
            <a href="dataF?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
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
function submit_ck() {
  if (!$("#DFT_NAME").val()) {
    alert("기관명을 입력해주세요");
    $("#DFT_NAME").focus();
    return false;
  } else if (!$("#DFT_ADDR_A").val()) {
    alert("도로명주소를 입력해주세요");
    $("#DFT_ADDR_A").focus();
    return false;
  } else if (!$("#DFT_ADDR_B").val()) {
    alert("동명주소를 입력해주세요");
    $("#DFT_ADDR_B").focus();
    return false;
  } else if (!$("#DFT_TYPE_A").val()) {
    alert("구분 A 입력해주세요");
    $("#DFT_TYPE_A").focus();
    return false;
  } else if (!$("#DFT_TYPE_B").val()) {
    alert("구분 B 입력해주세요");
    $("#DFT_TYPE_B").focus();
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
$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});
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

      document.getElementById('DFT_ADDR_A').value = fullRoadAddr;
      document.getElementById('DFT_ADDR_B').value = expJibunAddr;
      document.getElementById('DFT_ADDR_A').focus();
      addr_data = expJibunAddr;
      addr_location(addr_data);
      $("#DFT_AREA_A").val(data.sido);
      $("#DFT_AREA_B").val(data.sigungu);
      $("#DFT_AREA_C").val(data.bname);
    }
  }).open();
}
</script>
<script>
var addr_data = '';

function execDaumPostcode1() {
  new daum.Postcode({
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

      document.getElementById('DFT_ADDR_A').value = fullRoadAddr;
      document.getElementById('DFT_AREA_B').value = expJibunAddr;
      document.getElementById('DFT_AREA_B').focus();
      addr_data = expJibunAddr;
      addr_location(addr_data);
      $("#DFT_AREA_A").val(data.sido);
      $("#DFT_AREA_B").val(data.sigungu);
      $("#DFT_AREA_C").val(data.bname);
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
      $("#DFT_LAT").val(addr_lat);
      $("#DFT_LON").val(addr_lng);

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