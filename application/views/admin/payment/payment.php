<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item">
        <span class="g-valign-middle">결제 관리</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">결제 관리</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/paymentModify" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='PMT_IDX' name='PMT_IDX' value='<?php echo $PMT_IDX;?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
      <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">
            <!-- 제목 Input -->
            <div class="row">
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 구분</h4>
                <input type="text"
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  value="<?php if($results->USER_TYPE=='A'){ echo "중개사"; }else{ echo "일반회원"; }?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text"
                  value="<?php if($results->USER_TYPE=='A'){ echo $user->BKT_COMPANY; }else{ echo decrypt($user->MET_NAME); }?>"
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">슬롯 개수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo Number_format($slot->PPT_CNT);?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시작일</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo date("Y-m-d", strtotime($slot->PST_START));?>" name="START_DATE"
                  id="START_DATE">
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">종료일</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo date("Y-m-d", strtotime($slot->PST_END));?>" name="END_DATE"
                  id="END_DATE">
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">사용일수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $slot->PST_DAY;?> 일" readonly name="PMT_DAY" id="PMT_DAY">
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">거래번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_NUMBER1;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주문번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_NUMBER2;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제 금액</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo Number_format($results->PMT_MONEY);?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제 수단</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text"
                  value="<?php if($results->PMT_MEANS=='Card'){echo "카드결제";}else if($results->PMT_MEANS=='DirectBank'){echo "즉시계좌이체";}else if($results->PMT_MEANS=='VBank'){echo "가상계좌이체";}?>"
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제일</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo date("Y-m-d", strtotime($results->PMT_DATE));?>" readonly>
              </div>
              <?if($results->PMT_MEANS=='Card'){?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">카드할부</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_CARD_QUOTA;?>" readonly>
              </div>
              <?php
                if($results->PMT_CARD_CORPFLAG=='0'){
                  $PMT_CARD_CORPFLAG="개인";
                }else if($results->PMT_CARD_CORPFLAG=='1'){
                  $PMT_CARD_CORPFLAG="법인";
                }else if($results->PMT_CARD_CORPFLAG=='2'){
                  $PMT_CARD_CORPFLAG="구분불가";
                }else{
                  $PMT_CARD_CORPFLAG="";
                }
                if($results->PMT_CARD_CHECKFLAG=='0'){
                  $PMT_CARD_CHECKFLAG="신용카드";
                }else if($results->PMT_CARD_CHECKFLAG=='1'){
                  $PMT_CARD_CHECKFLAG="체크카드";
                }else if($results->PMT_CARD_CHECKFLAG=='2'){
                  $PMT_CARD_CHECKFLAG="기프티카드";
                }else{
                  $PMT_CARD_CHECKFLAG="";
                }
                if($results->PMT_CARD_PRTC=='0'){
                  $PMT_CARD_PRTC="불가능";
                }else if($results->PMT_CARD_PRTC=='1'){
                  $PMT_CARD_PRTC="가능";
                }else{
                  $PMT_CARD_PRTC="";
                }
                if(!$results->PMT_CARD_POINT){
                  $PMT_CARD_POINT="사용안함";
                }else if($results->PMT_CARD_POINT){
                  $PMT_CARD_POINT="사용";
                }
              ?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">카드구분</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $PMT_CARD_CORPFLAG;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">카드종류</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $PMT_CARD_CHECKFLAG;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">부분취소가능여부</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $PMT_CARD_PRTC;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">포인트사용여부</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $PMT_CARD_POINT;?>" readonly>
              </div>
              <?php }else if($results->PMT_MEANS=='DirectBank'){?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">은행명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo bankCode($results->PMT_BANK_CODE);?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">현금영수증 발행</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if($results->PMT_RECEIPT_CODE=='220000'){ echo "정상처리"; }?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">현금영수증 구분</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text"
                  value="<?php if($results->PMT_RECEIPT_TYPE=='0'){ echo "소득공제"; }else if($results->PMT_RECEIPT_TYPE=='1'){ echo "지출증빙"; }?>"
                  readonly>
              </div>
              <?php }else if($results->PMT_MEANS=='VBank'){?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">가상계좌번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_VACT_NUM;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">입금은행코드</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_VACT_BANKCODE;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">입금은행명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_VACT_BANKNAME;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">예금주명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_VACT_NAME;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">송금자명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_VACT_INPUTNAME;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">입금기한일자</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo $results->PMT_VACT_DATE;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">입금기한시각</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo date("H:i:s", strtotime($results->PMT_VACT_TIME));?>" readonly>
              </div>
              <?php }?>
            </div>
          </div>
          <!-- End 제목 Input -->
        </div>
        <!-- End 1-st column -->
        <div class='col-md-12 text-center'>
          <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value="SAVE" />
          <a href="/admin/paymentList?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
            class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</main>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
function submit_ck() {
  if (!$("#START_DATE").val()) {
    alert("시작일을 선택해주세요.");
    $("#START_DATE").focus();
    return false;
  } else if (!$("#END_DATE").val()) {
    alert("종료일을 선택해주세요.");
    $("#END_DATE").focus();
    return false;
  } else {
    return true;
  }
}
$('#START_DATE').datepicker({
  minDate: 0,
  dateFormat: "yy-mm-dd",
  onClose: function(selectedDate) {
    if (selectedDate) {
      $("#END_DATE").datepicker("option", "minDate", selectedDate);
      $("#END_DATE").focus();
    }
  },
  onSelect: function(dateText) {
    if ($("#END_DATE").val()) {
      var start = dateText;
      var end = $("#END_DATE").val();
      start = start.split("-");
      end = end.split("-");
      var stDate = new Date(start[0], start[1], start[2]);
      var endDate = new Date(end[0], Number(end[1]), Number(end[2]));

      var btMs = endDate.getTime() - stDate.getTime();
      var btDay = btMs / (1000 * 60 * 60 * 24);
      console.log(btDay);
      $("#PMT_DAY").val(btDay + " 일");
    } else {
      $("#PMT_DAY").val("");
    }
  }
});
$('#END_DATE').datepicker({
  minDate: 0,
  dateFormat: "yy-mm-dd",
  onClose: function(selectedDate) {
    $("#START_DATE").datepicker("option", "maxDate", selectedDate);
  },
  onSelect: function(dateText) {
    if ($("#START_DATE").val()) {
      var start = $("#START_DATE").val();
      var end = dateText;
      start = start.split("-");
      end = end.split("-");
      var stDate = new Date(start[0], start[1], start[2]);
      var endDate = new Date(end[0], Number(end[1]), Number(end[2]));

      var btMs = endDate.getTime() - stDate.getTime();
      var btDay = btMs / (1000 * 60 * 60 * 24);
      console.log(btDay);
      $("#PMT_DAY").val(btDay + " 일");
    } else {
      $("#PMT_DAY").val("");
    }
  }
});
</script>