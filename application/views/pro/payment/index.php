<?php
$SignatureUtil = new INIStdPayUtil();
//$mid = "mydangkr00";  // 가맹점 ID(가맹점 수정후 고정)					
//$mid = "INIpayTest";  // 가맹점 ID(가맹점 수정후 고정)					
//인증
//$signKey = "eHd3MEJVdG9WOExJZkIxaytaa2NFdz09"; // 가맹점에 제공된 웹 표준 사인키(가맹점 수정후 고정)
//$signKey = "SU5JTElURV9UUklQTEVERVNfS0VZU1RS"; // 가맹점에 제공된 웹 표준 사인키(가맹점 수정후 고정)

$mid = "mydangkr00";  // 가맹점 ID(가맹점 수정후 고정)	
$signKey = "eHd3MEJVdG9WOExJZkIxaytaa2NFdz09"; // 가맹점에 제공된 웹 표준 사인키(가맹점 수정후 고정)

$timestamp = $SignatureUtil->getTimestamp();   // util에 의해서 자동생성

$orderNumber = $mid . "_" . $SignatureUtil->getTimestamp(); // 가맹점 주문번호(가맹점에서 직접 설정)
$price = "0";        // 상품가격(특수기호 제외, 가맹점에서 직접 설정)

//$cardNoInterestQuota = "11-2:3:,34-5:12,14-6:12:24,12-12:36,06-9:12,01-3:4";  // 카드 무이자 여부 설정(가맹점에서 직접 설정)
$cardQuotaBase = "2:3:4:5:6:11:12";  // 가맹점에서 사용할 할부 개월수 설정
//###################################
// 2. 가맹점 확인을 위한 signKey를 해시값으로 변경 (SHA-256방식 사용)
//###################################
$mKey = $SignatureUtil->makeHash($signKey, "sha256");

$params = array(
    "oid" => $orderNumber,
    "price" => $price,
    "timestamp" => $timestamp
);
$sign = $SignatureUtil->makeSignature($params, "sha256");

/* 기타 */
$siteDomain = "https://mydang.kr"; //가맹점 도메인 입력
?>
<script language="javascript" type="text/javascript" src="https://stdpay.inicis.com/stdjs/INIStdPay.js" charset="UTF-8">
</script>

<script type="text/javascript">
function pay() {
  INIStdPay.pay('SendPayForm_id');
}
</script>
<?php header('Set-Cookie: cross-site-cookie=bar; SameSite=None; Secure');?>
<main id="container" class="sub prpPymnt partnerSub pointPymnt">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h4>광고결제</h4>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="form_wrap">
          <!-- <form id="pymnt_form" method="post" action="/DAO/payMnt" onsubmit="return submit_ck();"> -->
          <form id="pymnt_form" method="post">

            <input type="hidden" name="merchantData" id="merchantData" value="<?php echo $key;?>,<?php echo $type;?>" />
            <input type="hidden" name="key" id="key" value="<?php echo $key;?>" />
            <input type="hidden" name="type" id="type" value="<?php echo $type;?>" />
            <input type="hidden" name="goodname" value="매물슬롯">
            <input type="hidden" name="buyername" value="<?php echo $name;?>">
            <input type="hidden" name="buyertel" value="<?php echo $tel;?>">
            <input type="hidden" name="buyeremail" value="<?php echo $email;?>">
            <input type="hidden" name="mid" value="<?php echo $mid;?>">
            <!-- 에스크로테스트 : iniescrow0, 빌링(정기과금)테스트 : INIBillTst -->
            <input type="hidden" name="oid" value="<?php echo $orderNumber;?>">
            <input type="hidden" name="timestamp" value="<?php echo $timestamp ?>">
            <input type="hidden" name="version" value="1.0">
            <input type="hidden" name="currency" value="WON">
            <input type="hidden" name="acceptmethod" value="">
            <!-- 에스크로옵션 : useescrow, 빌링(정기과금)옵션 : BILLAUTH(Card) -->
            <input type="hidden" style="width:100%;" name="signature" id="signature" value="<?php echo $sign ?>">
            <input type="hidden" name="returnUrl" value="https://mydang.kr/pro/payReturn">
            <input type="hidden" name="closeUrl" value="https://mydang.kr/pro/payClose">
            <input type="hidden" name="mKey" value="<?php echo $mKey ?>">
            <input type="hidden" name="logo_url" value="https://mydang.kr/img/89x18_logo.png">
            <input type="hidden" name="logo_2nd" value="https://mydang.kr/img/64x13_w_logo.png">
            <input type="hidden" id="price" name="price" placeholder="" class="int" maxlength="41" autocomplete="off"
              readonly />
            <input type="hidden" name="nointerest" value="">
            <input type="hidden" name="quotabase" value="<?php echo $cardQuotaBase ?>">
            <?php $date = date("Y-m-d");  $update = date("Ymd", strtotime("+1 day", strtotime($date)));  ?>
            <input type="hidden" name="acceptmethod" value="no_receipt:va_receipt:below1000:vbank(<?echo $update;?>)">
            <div class="form-group select-wrap">
              <h4>기간 선택</h4>
              <div class="select_box">
                <select class="period_select" title="카테고리" id="psDate" name="psDate">
                  <option value="">:: 기간 선택 ::</option>
                  <option value="14">14일</option>
                  <option value="30">30일</option>
                  <option value="60">60일</option>
                  <option value="90">90일</option>
                  <option value="120">120일</option>
                </select>
              </div>
            </div>
            <div class="form-group select-wrap">
              <h4>갯수</h4>
              <div class="select_box">
                <select class="amount_select" title="카테고리" id="psCnt" name="psCnt">
                  <option value="0">:: 갯수 선택 ::</option>
                  <?if($type=='A'){?>
                  <option value="10">10개</option>
                  <option value="20">20개</option>
                  <option value="30">30개</option>
                  <option value="40">40개</option>
                  <option value="50">50개</option>
                  <option value="60">60개</option>
                  <option value="70">70개</option>
                  <option value="80">80개</option>
                  <option value="90">90개</option>
                  <option value="100">100개</option>
                  <?}else{?>
                  <option value="1">1개</option>
                  <option value="2">2개</option>
                  <option value="3">3개</option>
                  <option value="4">4개</option>
                  <option value="5">5개</option>
                  <?}?>
                </select>
              </div>
            </div>
            <div class="form-group int_box">
              <h4>금액</h4>
              <input type="text" id="priceView" name="price" placeholder="" class="int" maxlength="41"
                autocomplete="off" readonly />
            </div>
            <div class="form-group select-wrap">
              <h4>결제수단</h4>
              <div class="select_box">
                <select class="amount_select" title="카테고리" id="gopaymethod" name="gopaymethod">
                  <option value="Card">카드결제</option>
                  <option value="DirectBank">계좌이체</option>
                  <option value="VBank">가상계좌</option>
                </select>
              </div>
              <p class="prc">* 가상계좌 입금확인시 최대 1일 정도 소요되며 입금후 결제업무처리절차에 따라 광고 희망일은 2일후 부터 가능합니다. </p>
            </div>
            <div class="form-group adYear">
              <?php
              $time = time(); 
              $strtD = date("Y-m-d",strtotime("+1 day", $time));
              ?>
              <h4>광고 희망일</h4>
              <div class="int_box">
                <input class="Datepicker left" type="text" name="strtD" id="strtD" placeholder="<?php echo $strtD;?>"
                  autocomplete="off">
                <!-- </div> -->
                <!-- <div class="icon-wrap"> -->
                <!-- <img src="/icon/pro/calendar.png" alt="달력아이콘"> -->
                <!-- </div> -->
                <span> ~ </span>
                <!-- <div class="int_box left"> -->
                <input class="text right" type="text" name="lastD" id="lastD" readonly>
              </div>
            </div>
            <div class="bottomBtn-wrap">
              <!-- <input type="submit" title="결제" alt="결제" value="결제" class="btn-pymnt"> -->
              <button type="button" class="btn-pymnt" onclick="submit_ck();">결제</button>
              <button type="button" class="btn-cncl" onclick="location.href='/pro/storeList';">취소</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>
<!----- 푸터 시작 ----->
<script>
$("#gopaymethod").on("change", function() {
  $("#strtD").val("");
  $("#lastD").val("");

  if ($(this).val() == 'VBank') {
    var minDate = new Date();
    var dd = minDate.getDate() + 2;
    minDate.setDate(dd);

    jQuery("#strtD").datepicker("option", "minDate", minDate);
  }
});
$("#psDate").on("change", function() {

  var strtD = $("#strtD").val();
  if (strtD) {
    var psDate = $(this).val();

    var date = strtD;
    var addDate = Number(psDate) - 1;
    var arr = date.split("-");
    var today = new Date(arr[0], arr[1], arr[2]);
    var nextDate = getDateInfo(date, addDate);

    // console.log(today);
    // today.setDate(today.getDate() + Number(12));
    // console.log(today);
    // var year = today.getFullYear();

    // var month = today.getMonth();

    // var day = today.getDate();
    // var nextDate = year + "-" + numFormat(month) + "-" + numFormat(day);
    $("#lastD").val(nextDate);

  }
  var key = "<?php echo $key;?>";
  var type = "<?php echo $type;?>";
  var psDate = $(this).val();
  var psCnt = $("#psCnt").val();
  var psMoney = "";
  if (psDate == '14') {
    psMoney = (Number(psCnt) * 10000) / 2;
  } else if (psDate == '30') {
    psMoney = (Number(psCnt) * 10000);
  } else if (psDate == '60') {
    psMoney = (Number(psCnt) * 10000) * 2;
  } else if (psDate == '90') {
    psMoney = (Number(psCnt) * 10000) * 3;
  } else if (psDate == '120') {
    psMoney = (Number(psCnt) * 10000) * 4;
  } else if (!psDate) {
    $("#lastD").val("");
  }
  //psMoney = "1000";
  $("#price").val(psMoney);
  $("#priceView").val(comma(uncomma(psMoney)));
  if (strtD) {
    $("#merchantData").val(key + "," +
      type + "," + psDate + "," + psCnt + "," + strtD);
  } else {
    $("#merchantData").val(key + "," +
      type + "," + psDate + "," + psCnt);
  }

  var orderNumber = "<?php echo $orderNumber;?>";
  var timestamp = "<?php echo $timestamp;?>";
  $.ajax({
    type: 'post',
    url: '/VO/inipay',
    data: {
      price: psMoney,
      orderNumber: orderNumber,
      timestamp: timestamp
    },

    success: function(data) {
      //  var data = JSON.parse(data);
      console.log(data);
      if (data) {
        $("#signature").val(data);
      }
    }
  });
});
$("#psCnt").on("change", function() {
  var key = "<?php echo $key;?>";
  var type = "<?php echo $type;?>";
  var merchantData = $("#merchantData").val();
  var psDate = $("#psDate").val();
  var psCnt = $(this).val();
  var strtD = $("#strtD").val();
  if (psDate == '14') {
    psMoney = (Number(psCnt) * 10000) / 2;
  } else if (psDate == '30') {
    psMoney = (Number(psCnt) * 10000);
  } else if (psDate == '60') {
    psMoney = (Number(psCnt) * 10000) * 2;
  } else if (psDate == '90') {
    psMoney = (Number(psCnt) * 10000) * 3;
  } else if (psDate == '120') {
    psMoney = (Number(psCnt) * 10000) * 4;
  }
  //psMoney = "1000";
  $("#price").val(psMoney);
  $("#priceView").val(comma(uncomma(psMoney)));
  if (strtD) {
    $("#merchantData").val(key + "," +
      type + "," + psDate + "," + psCnt + "," + strtD);
  } else {
    $("#merchantData").val(key + "," +
      type + "," + psDate + "," + psCnt);
  }

  var orderNumber = "<?php echo $orderNumber;?>";
  var timestamp = "<?php echo $timestamp;?>";
  $.ajax({
    type: 'post',
    url: '/VO/inipay',
    data: {
      price: psMoney,
      orderNumber: orderNumber,
      timestamp: timestamp
    },

    success: function(data) {
      //  var data = JSON.parse(data);
      console.log(data);
      if (data) {
        $("#signature").val(data);
      }
    }
  });
});

function submit_ck() {
  if (!$("#psDate").val()) {
    alert("기간을 선택해주세요");
    $("#psDate").focus();
    return false;
  } else if (!$("#psCnt").val() || $("#psCnt").val() == 0) {
    alert("갯수를 선택해주세요");
    $("#psCnt").focus();
    return false;
  } else {
    INIStdPay.pay('pymnt_form');
  }
}

//콤마찍기
function comma(str) {
  str = String(str);
  return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

//콤마풀기
function uncomma(str) {
  str = String(str);
  return str.replace(/[^\d]+/g, '');
}

$("#strtD").datepicker({
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
  changeYear: true //년도 선택
    ,
  setDate: new Date(),
  minDate: "+1d",
  yearRange: 'c-99:c+99', //년도 최소, 최대     
  onSelect: function(dateText, inst) {
    if (!$("#psDate").val()) {
      alert("기간을 선택해주세요.");
      $(this).val("");
      $("#psDate").focus();
      return false;
    } else if (!$("#psCnt").val() || $("#psCnt").val() == '0') {
      alert("갯수를 선택해주세요.");
      $(this).val("");
      $("#psCnt").focus();
      return false;

    } else if (!$("#gopaymethod").val()) {
      alert("결제수단을 선택해주세요.");
      $(this).val("");
      $("#gopaymethod").focus();
      return false;

    }
    var date = $(this).val();
    var psDate = $("#psDate").val();
    var addDate = Number(psDate) - 1;
    var arr = date.split("-");
    var today = new Date(arr[0], arr[1], arr[2]);
    var nextDate = getDateInfo(date, addDate);
    /*console.log(today);
    today.setDate(today.getDate() + Number(12));
    console.log(today);
    var year = today.getFullYear();

    var month = today.getMonth();

    var day = today.getDate();
    var nextDate = year + "-" + numFormat(month) + "-" + numFormat(day);*/
    $("#lastD").val(nextDate);
    var strtD = $("#strtD").val();
    if (strtD) {
      var key = "<?php echo $key;?>";
      var type = "<?php echo $type;?>";
      var psDate = $("#psDate").val();
      var psCnt = $("#psCnt").val();

      $("#merchantData").val(key + "," +
        type + "," + psDate + "," + psCnt + "," + strtD);
    }
  }
});

function numFormat(variable) {
  variable = Number(variable).toString();
  if (Number(variable) < 10 && variable.length == 1)
    variable = "0" + variable;
  return variable;
}

var getDateInfo = function(date, num) { //date: 0000-00-00
  if (!date || typeof num == 'undefined') return;

  var arr = date.split('-');
  var obj1 = new Date(arr[0], arr[1] - 1, arr[2]);
  var tmp = obj1.valueOf() + 1000 * 60 * 60 * 24 * num;
  var obj2 = new Date(tmp);

  var year = obj2.getFullYear();
  var month = (obj2.getMonth() + 1).toString();
  var day = (obj2.getDate()).toString();

  if (month.length == 1) month = '0' + month;
  if (day.length == 1) day = '0' + day;

  var str = [];
  str[str.length] = year;
  str[str.length] = month;
  str[str.length] = day;

  return str.join('-');
};
</script>