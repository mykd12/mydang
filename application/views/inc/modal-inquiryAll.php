<link rel="stylesheet" href="/css/modal.css?v=<?php echo time(); ?>">

<!----------------------------------------------------->
<!----------------------------------------------------->
<!--------------    업체 모음 간편 폼    --------------->
<!--------------    업체 모음 간편 폼    --------------->
<!--------------    업체 모음 간편 폼    --------------->
<!----------------------------------------------------->
<!----------------------------------------------------->
<div id="modal-inquiryAll" class="modal-inquiry">
  <?//print_r($results);?>
  <form id="cqFrm" class="" method="post" action="/DAO/cqWirte">
    <input type="hidden" name="page" id="page" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
    <input type="hidden" name="mKey" id="mKey" value="<?php echo $this -> session ->userdata('LOGIN_IDX');?>" />
    <div class="modal-inquiry01">
      <div class="top-wrap">
        <h2><span><img src="/icon/Minquiry01.png" alt="상담아이콘"></span>간편상담신청</h2>
        <ul>
          <li><span class="">인테리어</span><span class="cnt counsTypeA"><?php echo $results[2];?></span></li>
          <li><span class="">가구</span><span class="cnt counsTypeB"><?php echo $results[3];?></span></li>
          <li><span class="">주방설비</span><span class="cnt counsTypeC"><?php echo $results[4];?></span></li>
          <li><span class="">간판</span><span class="cnt counsTypeD"><?php echo $results[5];?></span></li>
          <li><span class="">광고/인쇄</span><span class="cnt counsTypeE"><?php echo $results[6];?></span></li>
          <li><span class="">통신/보안</span><span class="cnt counsTypeF"><?php echo $results[7];?></span></li>
          <li><span class="">렌탈</span><span class="cnt counsTypeG"><?php echo $results[8];?></span></li>
          <li><span class="">기타</span><span class="cnt counsTypeH"><?php echo $results[9];?></span></li>
        </ul>
        <div class="bar">
        </div>
      </div>
      <div class="content">
        <div class="form-wrap  scroll-wrap">
          <div class="company-list" id="ptnList">
            <?php $i=0;?>
            <?php if(COUNT($results[0]) > 0){?>
            <?php foreach($results[0] as $data){?>
            <input type="hidden" id="CTT_IDX" name="CTT_IDX[]" value="<?php echo $data->CTT_IDX;?>">
            <div class="inquiry-company" id="counsList<?php echo $data->CTT_IDX;?>">
              <div class="col-1">
                <div class="chk-box">
                  <input type="checkbox" id="PTT_IDX<?php echo $results[1][$i]->PTT_IDX;?>" name="PTT_IDX[]"
                    value="<?php echo $results[1][$i]->PTT_IDX;?>">

                  <label
                    for="PTT_IDX<?php echo $results[1][$i]->PTT_IDX;?>"><?php echo decrypt($results[1][$i]->PTT_NAME);?></label>
                </div>
                <p class="add">
                  <?php echo decrypt($results[1][$i]->PTT_ADDR1_A)." ".decrypt($results[1][$i]->PTT_ADDR2);?>
                </p>
                <div class="chk-list-wrap">
                  <div class="chk-box">
                    <input type="checkbox" id="bi-check<?php echo $results[1][$i]->PTT_IDX;?>" name="PTT_TYPE[]"
                      value="<?php echo $results[1][$i]->PTT_TYPE;?>" readonly checked onClick="return false;">
                    <label
                      for="bi-check<?php echo $results[1][$i]->PTT_IDX;?>"><?php echo $results[1][$i]->PTT_TYPE;?></label>
                  </div>
                </div>
              </div>
              <a href="" class="company-move">
                <div class="img-wrap">
                  <img src="/uploads/<?php echo $results[1][$i]->PTT_IMG_SAVE;?>" alt="업체사진">
                </div>
              </a>
              <a href="javascript:counsDel('<?php echo $data->CTT_IDX;?>','<?php echo $results[1][$i]->PTT_TYPE;?>');"
                onclick="return confirm('삭제하시겠습니까?');" class="btn-delete"><i class="xi-close-thin"></i><span
                  class="blind">견적에서
                  삭제</span></a>
            </div>
            <?php $i++;}?>
            <?php }?>
          </div>
        </div>
        <div class="btn-wrap">
          <a class="btn-next" href="javascript:void(0);" onclick="counsNext();">신청하기</a>
        </div>
      </div>
    </div>
    <div class="modal-inquiry02">
      <div class="top-wrap">
        <h2><span><img src="/icon/Minquiry01.png" alt="상담아이콘"></span>간편상담신청</h2>
      </div>
      <div class="content">
        <div class="form-wrap scroll-wrap">
          <div class="name_box int_box">
            <label for="CQT_NAME" id="label_name" class="lb1"><span class="s-c">•</span></label>
            <input type="text" id="CQT_NAME" name="CQT_NAME" placeholder="이름" class="int" maxlength="41" value=""
              autocomplete="off">
          </div>
          <div class="tel_box int_box">
            <label for="CQT_TEL" id="label_tel" class="lb2"><span class="s-c">•</span></label>
            <input type="text" id="CQT_TEL" name="CQT_TEL" placeholder="연락처" class="int" maxlength="41" value=""
              autocomplete="off">
          </div>
          <div class="add_box int_box">
            <label for="CQT_ADDR1" id="label_add" class="lb2"><span class="s-c">•</span></label>
            <input type="text" id="CQT_ADDR1" name="CQT_ADDR1" placeholder="주소를 입력하세요" class="int" maxlength="41"
              value="" autocomplete="off" readonly style="background:#ddd;" onclick="execDaumPostcodeC();">
          </div>
          <div class="deAdd_box int_box">
            <input type="text" id="CQT_ADDR2" name="CQT_ADDR2" placeholder="상세주소를 입력하세요" class="int" maxlength="41"
              value="" autocomplete="off">
          </div>
          <!-- <h4 class="sub-title">상가형태 선택</h4> -->
          <div class="select_wrap select_wrap01">
            <span class="s-c">•</span>
            <div class="select_box">
              <select class="shapeSort_select" name="CQT_TYPE" id="CQT_TYPE">
                <option value="">건물형태를 선택</option>
                <option value="사무실"><span>사무실</span></option>
                <option value="상가/매장"><span>상가/매장</span></option>
                <option value="카페/식당"> <span>카페/식당</span></option>
                <option value="학원/교육"><span>학원/교육</span></option>
                <option value="숙박/병원"><span>숙박/병원</span></option>
                <option value="간판"><span>간판</span></option>
                <option value="기타"><span>기타</span></option>
              </select>
            </div>
          </div>
          <div class="date_box int_box">
            <label for="CQT_DATE" id="label_date02" class="lb2"><span class="s-c">•</span></label>
            <input type="text" id="CQT_DATE" name="CQT_DATE" placeholder="희망시공날짜">
          </div>
          <div class="agree_area">
            <div class="form_checkbox">
              <input class="check_box" id="allAgree02" name="allAgree02" type="checkbox">
              <label for="allAgree02">전체 약관에 동의합니다. (필수)</label>
            </div>
            <!-- <p class="agree_text ">전체 약관에 동의합니다. (필수)</p> -->
            <button type="button" class="btn_agreeBox"><span class="blind">약관 보기</span></button>
            <div class="ly_agree_box"><a href="/main/policy/#policy04" target="_blank">
                개인정보 수집 및 이용 동의 (필수)
                <span class="text_info">약관보기</span>
              </a><a href="/main/policy/#policy05" target="_blank">
                개인정보 제 3자 제공 동의 (필수)
                <span class="text_info">약관보기</span>
              </a>
            </div>
          </div>
        </div>
        <div class="btn-wrap">
          <a class="btn-pre" href="#modal-inquiryAll" onclick="cq_back();" rel="modal:open">이전</a>
          <a class="btn-apply" id="cqSubmit" style="cursor: pointer;">신청</a>
        </div>
      </div>
    </div>
  </form>
</div>

<!--------------------------------------------------->
<!--------------------------------------------------->
<!--------------    업체개별문의 폼    --------------->
<!--------------    업체개별문의 폼    --------------->
<!--------------    업체개별문의 폼    --------------->
<!--------------------------------------------------->
<!--------------------------------------------------->

<div id="modal-inquiry" class="modal-inquiry">
  <?//print_r($results);?>
  <iframe id="iframe1" name="iframe1" style="display:none"></iframe>
  <form id="qptFrm" onsubmit="return submitQpt_ck();" target="iframe1">
    <input type="hidden" name="page" id="page" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
    <input type="hidden" name="pKey" id="pKey" value="" />
    <input type="hidden" name="mKey" id="mKey" value="<?php echo $this -> session ->userdata('LOGIN_IDX');?>" />
    <input type="hidden" name="optType" id="optType" value="" />
    <div class="modal-inquiry02">
      <div class="top-wrap">
        <h2><span><img src="/icon/Minquiry01.png" alt="상담아이콘"></span>문의하기</h2>
      </div>
      <div class="content">
        <div class="form-wrap scroll-wrap">
          <div class="name_box int_box">
            <label for="optName" id="label_name" class="lb1"><span class="s-c">•</span></label>
            <input type="text" id="optName" name="optName" placeholder="이름" class="int" maxlength="41" value=""
              autocomplete="off">
          </div>
          <div class="tel_box int_box">
            <label for="optTel" id="label_tel" class="lb2"><span class="s-c">•</span></label>
            <input type="text" id="optTel" name="optTel" placeholder="연락처" class="int" maxlength="41" value=""
              autocomplete="off">
          </div>
          <div class="add_box int_box">
            <label for="optAddr1" id="label_add" class="lb2"><span class="s-c">•</span></label>
            <input type="text" id="optAddr1" name="optAddr1" placeholder="주소를 입력하세요" class="int" maxlength="41" value=""
              autocomplete="off" readonly style="background:#ddd;" onclick="execDaumPostcode();">
          </div>
          <div class="deAdd_box int_box">
            <input type="text" id="optAddr2" name="optAddr2" placeholder="상세주소를 입력하세요" class="int" maxlength="41"
              value="" autocomplete="off">
          </div>
          <!-- <h4 class="sub-title">상가형태 선택</h4> -->
          <div class="select_wrap select_wrap01">
            <span class="s-c">•</span>
            <div class="select_box">
              <select class="shapeSort_select" name="optForm" id="optForm">
                <option value="">건물형태를 선택</option>
                <option value="사무실"><span>사무실</span></option>
                <option value="상가/매장"><span>상가/매장</span></option>
                <option value="카페/식당"> <span>카페/식당</span></option>
                <option value="학원/교육"><span>학원/교육</span></option>
                <option value="숙박/병원"><span>숙박/병원</span></option>
                <option value="간판"><span>간판</span></option>
                <option value="기타"><span>기타</span></option>
              </select>
            </div>
          </div>
          <div class="date_box int_box">
            <label for="optDate" id="label_date02" class="lb2"><span class="s-c">•</span></label>
            <input type="text" id="optDate" name="optDate" placeholder="희망시공날짜">
          </div>
          <div class="agree_area">
            <div class="form_checkbox">
              <input class="check_box" id="allAgree01" name="allAgree01" type="checkbox">
              <label for="allAgree01">전체 약관에 동의합니다. (필수)</label>
            </div>
            <!-- <p class="agree_text ">전체 약관에 동의합니다. (필수)</p> -->
            <button type="button" class="btn_agreeBox"><span class="blind">약관 보기</span></button>
            <div class="ly_agree_box"><a href="/main/policy/#policy04" target="_blank">
                개인정보 수집 및 이용 동의 (필수)
                <span class="text_info">약관보기</span>
              </a><a href="/main/policy/#policy05" target="_blank">
                개인정보 제 3자 제공 동의 (필수)
                <span class="text_info">약관보기</span>
              </a>
            </div>
          </div>
        </div>
        <div class="btn-wrap">
          <a class="btn-apply" style="cursor: pointer;" onclick="$('#qptFrm').submit();">신청</a>
        </div>
      </div>
    </div>
  </form>
</div>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script type="text/javascript">
$("#optDate").datepicker({
  dateFormat: 'yy-mm-dd' //Input Display Format 변경
    ,
  showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
    ,
  showMonthAfterYear: true //년도 먼저 나오고, 뒤에 월 표시
    ,
  buttonImageOnly: true //기본 버튼의 회색 부분을 없애고, 이미지만 보이게 함
    ,
  buttonText: "선택" //버튼에 마우스 갖다 댔을 때 표시되는 텍스트                
    ,
  yearSuffix: "년" //달력의 년도 부분 뒤에 붙는 텍스트
    ,
  monthNamesShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'] //달력의 월 부분 텍스트
    ,
  monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip 텍스트
    ,
  dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 부분 텍스트
    ,
  dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 부분 Tooltip 텍스트
    ,
  minDate: "0" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
    ,
  maxDate: "+3M" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)                
});

$("#CQT_DATE").datepicker({
  dateFormat: 'yy-mm-dd' //Input Display Format 변경
    ,
  showOtherMonths: true //빈 공간에 현재월의 앞뒤월의 날짜를 표시
    ,
  showMonthAfterYear: true //년도 먼저 나오고, 뒤에 월 표시
    ,
  buttonImageOnly: true //기본 버튼의 회색 부분을 없애고, 이미지만 보이게 함
    ,
  buttonText: "선택" //버튼에 마우스 갖다 댔을 때 표시되는 텍스트                
    ,
  yearSuffix: "년" //달력의 년도 부분 뒤에 붙는 텍스트
    ,
  monthNamesShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'] //달력의 월 부분 텍스트
    ,
  monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'] //달력의 월 부분 Tooltip 텍스트
    ,
  dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'] //달력의 요일 부분 텍스트
    ,
  dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'] //달력의 요일 부분 Tooltip 텍스트
    ,
  minDate: "0" //최소 선택일자(-1D:하루전, -1M:한달전, -1Y:일년전)
    ,
  maxDate: "+3M" //최대 선택일자(+1D:하루후, -1M:한달후, -1Y:일년후)                
});

function submitQpt_ck() {
  if (!$("#optName").val()) {
    alert("이름을 입력해주세요.");
    $("#optName").focus();
    return false;
  } else if (!$("#optTel").val()) {
    alert("연락처를 입력해주세요.");
    $("#optTel").focus();
    return false;
  } else if (!$("#optAddr1").val()) {
    alert("주소를 입력해주세요.");
    $("#optAddr1").focus();
    return false;
  } else if (!$("#optAddr2").val()) {
    alert("상세주소를 입력해주세요.");
    $("#optAddr2").focus();
    return false;
  } else if (!$('#optForm').val()) {
    alert("건물형태를 입력해주세요.");
    $("#optForm").focus();
    return false;
  } else if (!$("#optDate").val()) {
    alert("희망시공 날짜를 선택해주세요.");
    $("#optDate").focus();
    return false;
  } else {
    var pKey = $("#pKey").val();
    var mKey = $("#mKey").val();
    var optType = $("#optType").val();
    var optName = $("#optName").val();
    var optTel = $("#optTel").val();
    var optAddr1 = $("#optAddr1").val();
    var optAddr2 = $("#optAddr2").val();
    var optForm = $('#optForm').val();
    var optDate = $("#optDate").val();
    $.ajax({
      type: 'post',
      url: '/DAO/qptWirte',
      data: {
        pKey: pKey,
        mKey: mKey,
        optType: optType,
        optName: optName,
        optTel: optTel,
        optAddr1: optAddr1,
        optAddr2: optAddr2,
        optForm: optForm,
        optDate: optDate
      },
      success: function(data) {
        if (data == '1') {
          alert("정상적으로 문의 등록되었습니다.");
          $(".close-modal").trigger("click");
          $("#pKey").val("");
          $("#mKey").val("");
          $("#optType").val("");
          $("#optName").val("");
          $("#optTel").val("");
          $("#optAddr1").val("");
          $("#optAddr2").val("");
          $("#optForm option:eq(0)").prop("selected", true);
          $("#optDate").val("");
          return true;
        } else {
          alert("정상적으로 문의 등록되지 않았습니다.");
          return false;
        }
      }
    });
  }
}

function counsNext() {
  console.log("click");
  if ($('input:checkbox[name="PTT_IDX[]"]:checked').length > 0) {
    $(".modal-inquiry01").css("display", "none");
    $(".modal-inquiry02").css("display", "block");
  } else {
    alert("문의 할 업체를 선택해주세요.");
    return false;
  }
}
$("#cqSubmit").on("click", function() {
  if (!$("#CQT_NAME").val()) {
    alert("이름을 입력해주세요.");
    $("#CQT_NAME").focus();
    return false;
  } else if (!$("#CQT_TEL").val()) {
    alert("연락처를 입력해주세요.");
    $("#CQT_TEL").focus();
    return false;
  } else if (!$("#CQT_ADDR1").val()) {
    alert("주소를 입력해주세요.");
    $("#CQT_ADDR1").focus();
    return false;
  } else if (!$("#CQT_ADDR2").val()) {
    alert("상세주소를 입력해주세요.");
    $("#CQT_ADDR2").focus();
    return false;
  } else if (!$('#CQT_TYPE').val()) {
    alert("건물형태를 선택해주세요.");
    $("#CQT_TYPE").focus();
    return false;
  } else if (!$("#CQT_DATE").val()) {
    alert("희망시공일을 선택해주세요.");
    $("#CQT_DATE").focus();
    return false;
  } else {
    $("#cqFrm").submit();
  }
});

function cq_back() {
  $(".modal-inquiry02").css("display", "none");
  $(".modal-inquiry01").css("display", "block");
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
var cellPhone = document.getElementById('optTel');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

var cellPhone = document.getElementById('CQT_TEL');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}

function counsDel(key, type) {
  $.ajax({
    type: 'post',
    url: '/DAO/counsDel',
    data: {
      key: key
    },
    success: function(data) {
      data = data.split("/");
      //var data = JSON.parse(data);
      if (data[0] == 1) {
        $("#counsList" + key).remove();
        if (type == '인테리어') {
          var tabCnt = $(".counsTypeA").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeA").text(tabCnt);
        } else if (type == '가구') {
          var tabCnt = $(".counsTypeB").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeB").text(tabCnt);
        } else if (type == '주방/설비') {
          var tabCnt = $(".counsTypeC").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeC").text(tabCnt);
        } else if (type == '간판') {
          var tabCnt = $(".counsTypeD").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeD").text(tabCnt);
        } else if (type == '광고/인쇄') {
          var tabCnt = $(".counsTypeE").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeE").text(tabCnt);
        } else if (type == '통신/보안') {
          var tabCnt = $(".counsTypeF").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeF").text(tabCnt);
        } else if (type == '렌탈') {
          var tabCnt = $(".counsTypeG").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeG").text(tabCnt);
        } else if (type == '기타') {
          var tabCnt = $(".counsTypeH").text();
          tabCnt = Number(tabCnt) - 1;
          $(".counsTypeH").text(tabCnt);
        }
        $(".con-box").addClass("dot-pulse");
        $("#makeCnt").text(data[1]);
        $("#makeBtn" + data[2]).removeClass("on");
        setTimeout(function() {
          $(".con-box").removeClass("dot-pulse");
        }, 1000);
      }
    }
  });
}
</script>
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

      document.getElementById('optAddr1').value = fullRoadAddr;
      document.getElementById('optAddr2').focus();

    }
  }).open();
}

function execDaumPostcodeC() {
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

      document.getElementById('CQT_ADDR1').value = fullRoadAddr;
      document.getElementById('CQT_ADDR2').focus();

    }
  }).open();
}
$(".shapeSort_select").change(function() {
  $(this).css('color', '#000');
})

// 문의하기 약관 
$('.btn_agreeBox').click(function() {
  $('.agree_area').toggleClass('on')
});
</script>
<script src="/js/common.js?v=<?php echo time(); ?>"></script>