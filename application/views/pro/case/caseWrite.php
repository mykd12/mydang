<script type="text/javascript" src="/SE/js/HuskyEZCreator.js" charset="utf-8"></script>
<main id="container" class="sub prpRgstr caseRgstr partnerSub">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>시공사례 등록</h4>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="form_wrap">
          <form id="caseFrom" onsubmit="return submit_ck();">
            <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo; ?>' />
            <input type='hidden' id='search' name='search' value='<?php echo $search; ?>' />
            <input type="hidden" name="caseKey" id="caseKey" value="<?php if($key) echo $key;?>" />
            <input type="hidden" name="caseAddrB" id="caseAddrB" value="<?php if($key) echo $results->CST_ADDR1_B;?>" />
            <input type="hidden" name="caseLat" id="caseLat" value="<?php if($key) echo $results->CST_LAT;?>" />
            <input type="hidden" name="caseLon" id="caseLon" value="<?php if($key) echo $results->CST_LON;?>" />
            <input type="hidden" name="caseLon" id="caseLon" value="<?php if($key) echo $results->CST_LON;?>" />
            <input type="hidden" name="caseLon" id="caseLon" value="<?php if($key) echo $results->CST_LON;?>" />
            <div class="form-group cpField_box clearfix" id="addr_div">
              <h4>업체 주 분야</h4>
              <div class="fieldCk-wrap">
                <div class="chk_box">
                  <input type="checkbox" id="caseField01" name="caseField" value="인테리어" <?if($key &&
                    $results->CST_TYPE=='인테리어'){ echo "checked";}?>>
                  <label for="caseField01" id="" class="">인테리어</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField02" name="caseField" value="가구" <?if($key &&
                    $results->CST_TYPE=='가구'){
                  echo "checked"; }?>>
                  <label for="caseField02" id="" class="">가구</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField03" name="caseField" value="주방/설비" <?if($key &&
                    $results->CST_TYPE=='주방/설비'){ echo "checked"; }?>>
                  <label for="caseField03" id="" class="">주방/설비</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField04" name="caseField" value="간판" <?if($key &&
                    $results->CST_TYPE=='간판'){
                  echo "checked"; }?>>
                  <label for="caseField04" id="" class="">간판</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField05" name="caseField" value="광고/인쇄" <?if($key &&
                    $results->CST_TYPE=='광고/인쇄'){ echo "checked"; }?>>
                  <label for="caseField05" id="" class="">광고/인쇄</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField06" name="caseField" value="통신/보안" <?if($key &&
                    $results->CST_TYPE=='통신/보안'){ echo "checked"; }?>>
                  <label for="caseField06" id="" class="">통신/보안</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField07" name="caseField" value="렌탈" <?if($key &&
                    $results->CST_TYPE=='렌탈'){
                  echo "checked"; }?>>
                  <label for="caseField07" id="" class="">렌탈</label>
                </div>
                <div class="chk_box">
                  <input type="checkbox" id="caseField08" name="caseField" value="기타" <?if($key &&
                    $results->CST_TYPE=='기타'){
                  echo "checked"; }?>>
                  <label for="caseField08" id="" class="">기타</label>
                </div>
              </div>
            </div>

            <?php if($key && $results->CST_TYPE=='인테리어'){?>
            <div class="form-group int_box">
              <h4>평수</h4>
              <input type="text" id="caseOptionA" name="caseOptionA" placeholder="평수를 입력해주세요." class="int"
                autocomplete="off" value="<?php echo $results->CST_OPTION_A; ?>" numberOnly>
            </div>
            <div class="form-group int_box">
              <h4>예산</h4>
              <input type="text" id="caseOptionB" name="caseOptionB" placeholder="예산을 입력해주세요." class="int"
                autocomplete="off" value="<?php echo $results->CST_OPTION_B; ?>">
            </div>
            <div class="form-group int_box">
              <h4>기간</h4>
              <input type="text" id="caseOptionC" name="caseOptionC" placeholder="기간을 입력해주세요. 예2021년11월 ~ 2021년12월"
                class="int" autocomplete="off" value="<?php echo $results->CST_OPTION_C; ?>">
            </div>
            <?php }else if($key && ($results->CST_TYPE=='가구' || $results->CST_TYPE=='주방/설비')){?>
            <div class="form-group int_box">
              <h4>예산</h4>
              <input type="text" id="caseOptionB" name="caseOptionB" placeholder="예산을 입력해주세요." class="int"
                autocomplete="off" value="<?php echo $results->CST_OPTION_B; ?>">
            </div>
            <?php }else if($key && $results->CST_TYPE=='간판'){?>
            <div class="form-group int_box">
              <h4>기간</h4>
              <input type="text" id="caseOptionC" name="caseOptionC" placeholder="기간을 입력해주세요. 예2021년11월 ~ 2021년12월"
                class="int" autocomplete="off" value="<?php echo $results->CST_OPTION_C; ?>">
            </div>
            <?php }?>
            <div class="form-group int_box">
              <h4>제목</h4>
              <input type="text" id="caseTitle" name="caseTitle" placeholder="시공사례 제목을 입력해주세요." class="int"
                autocomplete="off" value="<?php if($key){ echo $results->CST_TITLE; }?>">
            </div>
            <div class="form-group int_box">
              <h4>주소</h4>
              <input type="text" id="caseAddr1" name="caseAddr1" placeholder="주소를 입력해주세요." class="int"
                autocomplete="off" value="<?php if($key){ echo $results->CST_ADDR1_A; }?>"
                onclick="execDaumPostcode();" readonly>
            </div>
            <div class="form-group int_box">
              <h4>상세주소</h4>
              <input type="text" id="caseAddr2" name="caseAddr2" placeholder="상세주소를 입력해주세요." class="int"
                autocomplete="off" value="<?php if($key){ echo $results->CST_ADDR2; }?>">
            </div>

            <div class="form-group textarea">
              <h4>매물상세내용</h4>
              <div class="textarea-wrap">
                <textarea name="caseContent" id="caseContent" cols="30" rows="10"
                  placeholder="내용을 입력하세요."><?php if($key){ echo $results->CST_CONTENT; } ?></textarea>
              </div>
            </div>
            <div class="form-group filebox int_box">
              <h4>매물사진</h4>
              <label for="caseImg">첨부</label>
              <input class="upload-name01" placeholder="대표사진을 선택해 주세요." readonly />
              <input type="file" id="caseImg" name="caseImg" class="file">
            </div>
            <div class="bottomBtn-wrap">

              <input type="submit" title="<?php if($key){ echo "수정";}else{echo"등록";}?>"
                alt="<?php if($key){ echo "수정";}else{echo"등록";}?>" value="<?php if($key){ echo "수정";}else{echo"등록";}?>"
                class="btn-pymnt" id="SAVE_BTN">
              <button type="button" class="btn-cncl"
                onclick="location.href='/pro/constrCase?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>';">취소</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<!----- 푸터 시작 ----->
<script>
$("input[name=caseField]").on("change", function() {
  $("input[name=caseField]").prop('checked', false);
  $(this).prop('checked', true);
  $(".addoption").remove();
  if ($(this).val() == '인테리어') {
    var html = "<div class=\"form-group int_box  addoption\">";
    html += "<h4>평수</h4>";
    html +=
      "<input type=\"text\" id=\"caseOptionA\" name=\"caseOptionA\" placeholder=\"평수를 입력해주세요.\" class=\"int\" maxlength=\"41\" numberOnly autocomplete=\"off\">";
    html += "</div>";
    html += "<div class=\"form-group int_box  addoption\">";
    html += "<h4>예산</h4>";
    html +=
      "<input type=\"text\" id=\"caseOptionB\" name=\"caseOptionB\" placeholder=\"예산을 입력해주세요.\" class=\"int\" maxlength=\"41\" autocomplete=\"off\">";
    html += "</div>";
    html += "<div class=\"form-group int_box  addoption\">";
    html += "<h4>기간</h4>";
    html +=
      "<input type=\"text\" id=\"caseOptionC\" name=\"caseOptionC\" placeholder=\"기간을 입력해주세요. 예2021년11월 ~ 2021년12월\" class=\"int\" maxlength=\"41\" autocomplete=\"off\">";
    html += "</div>";
    $("#addr_div").after(html);
  } else if ($(this).val() == '가구' || $(this).val() == '주방/설비') {
    var html = "<div class=\"form-group int_box  addoption\">";
    html += "<h4>예산</h4>";
    html +=
      "<input type=\"text\" id=\"caseOptionB\" name=\"caseOptionB\" placeholder=\"예산을 입력해주세요.\" class=\"int\" maxlength=\"41\" autocomplete=\"off\">";
    html += "</div>";
    $("#addr_div").after(html);
  } else if ($(this).val() == '간판') {
    var html = "<div class=\"form-group int_box addoption\">";
    html += "<h4>예산</h4>";
    html +=
      "<input type=\"text\" id=\"caseOptionB\" name=\"caseOptionB\" placeholder=\"예산을 입력해주세요.\" class=\"int\" maxlength=\"41\" autocomplete=\"off\">";
    html += "</div>";
    html += "<div class=\"form-group int_box  addoption\">";
    html += "<h4>기간</h4>";
    html +=
      "<input type=\"text\" id=\"caseOptionC\" name=\"caseOptionC\" placeholder=\"기간을 입력해주세요. 예2021년11월 ~ 2021년12월\" class=\"int\" maxlength=\"41\" autocomplete=\"off\">";
    html += "</div>";
    $("#addr_div").after(html);

  }
});
$("#caseImg").on('change', function() {
  var fileName = $("#caseImg").val();
  $(".upload-name01").val(fileName);
});

var editor_object = [];
nhn.husky.EZCreator.createInIFrame({
  oAppRef: editor_object,
  elPlaceHolder: "caseContent",
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

$("#SAVE_BTN").click(function() {
  //id가 smarteditor인 textarea에 에디터에서 대입
  editor_object.getById["caseContent"].exec("UPDATE_CONTENTS_FIELD", []);
  var ir1 = $("#caseContent").val();
  if ($('input:checkbox[name=caseField]:checked').length == 0) {
    alert("업체 주 분야를 선택해주세요.");
    $("#caseField01").focus();
    return false;
  }
  if (!$("#caseTitle").val()) {
    alert("제목을 입력해주세요.");
    $("#caseTitle").focus();
    return false;
  }
  if (!$("#caseAddr1").val()) {
    alert("시공 주소를 입력해주세요.");
    $("#caseAddr1").focus();
    return false;
  }

  if (!$("#caseAddr2").val()) {
    alert("시공 상세 주소를 입력해주세요.");
    $("#caseAddr2").focus();
    return false;
  }

  if (ir1 == "" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>') {
    var CST_CONTENT = document.getElementById("caseContent");
    editor_object.getById["caseContent"].exec("FOCUS");
    alert("시공사례 상세 내용을 입력 해주세요.");
    return false;
  }
  /*
  			if(!$("#CST_IMG").val() && !$("#CST_IMG_SAVE").val()){
   			 alert("썸네일 이미지를 선택해주세요.");
   			 $("#CST_IMG").focus();
   			 return false;
   		 }*/

  //id가 smarteditor인 textarea에 에디터에서 대입
  var action = "/DAO/caseWrite";
  //폼 submit
  $('#caseFrom').attr("enctype", "multipart/form-data");
  $('#caseFrom').attr("action", action);
  $('#caseFrom').attr('action', action).attr('method', 'post').submit();
  return true;
});

function submit_ck() {
  //id가 smarteditor인 textarea에 에디터에서 대입
  editor_object.getById["caseContent"].exec("UPDATE_CONTENTS_FIELD", []);
  var ir1 = $("#caseContent").val();
  if ($('input:checkbox[name=caseField]:checked').length == 0) {
    alert("업체 주 분야를 선택해주세요.");
    $("#caseField01").focus();
    return false;
  }
  if (!$("#caseTitle").val()) {
    alert("제목을 입력해주세요.");
    $("#caseTitle").focus();
    return false;
  }
  if (!$("#caseAddr1").val()) {
    alert("시공 주소를 입력해주세요.");
    $("#caseAddr1").focus();
    return false;
  }

  if (!$("#caseAddr2").val()) {
    alert("시공 상세 주소를 입력해주세요.");
    $("#caseAddr2").focus();
    return false;
  }

  if (ir1 == "" || ir1 == null || ir1 == '&nbsp;' || ir1 == '<p>&nbsp;</p>') {
    var CST_CONTENT = document.getElementById("caseContent");
    editor_object.getById["caseContent"].exec("FOCUS");
    alert("시공사례 상세 내용을 입력 해주세요.");
    return false;
  }
  /*
  			if(!$("#CST_IMG").val() && !$("#CST_IMG_SAVE").val()){
   			 alert("썸네일 이미지를 선택해주세요.");
   			 $("#CST_IMG").focus();
   			 return false;
   		 }*/

  //id가 smarteditor인 textarea에 에디터에서 대입
  var action = "/DAO/caseWrite";
  //폼 submit
  $('#caseFrom').attr("enctype", "multipart/form-data");
  $('#caseFrom').attr("action", action);
  $('#caseFrom').attr('action', action).attr('method', 'post').submit();
  return true;
};


$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});
</script>
<script src='//spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
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

      document.getElementById('caseAddr1').value = fullRoadAddr;
      document.getElementById('caseAddr2').focus();
      addr_data = fullRoadAddr;
      addr_location(addr_data);


      $("#caseAddrB").val(expJibunAddr);
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
      $("#caseLat").val(addr_lat);
      $("#caseLon").val(addr_lng);

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