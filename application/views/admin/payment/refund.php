<style type="text/css">
.u-datepicker--v3 .flatpickr-month {
  height: 50px;
}
</style>


<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">창업비결 관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">과정</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/pmtPartialDelete" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='PMT_IDX' name='PMT_IDX' value='<?php echo $PMT_IDX;?>' />
      <input type='hidden' id='PST_IDX' name='PST_IDX' value='<?php echo $PST_IDX;?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
      <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
      <input type='hidden' id='PMT_MEANS' name='PMT_MEANS' value='<?php echo $resultsPm->PMT_MEANS;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

            <!-- 제목 Input -->
            <div class="row">
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='USER_NAME' id='USER_NAME' type="text" placeholder="회원명을 입력 해주세요."
                  value="<?php if($resultsPm->USER_TYPE=='A'){ echo decrypt($resultsUser->BKT_NAME); }else if($resultsPm->USER_TYPE=='B'){ echo decrypt($resultsUser->MET_NAME); }?>"
                  readonly>

              </div>
              <div class="form-group g-mb-20 col-md-2">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">슬롯개수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PPT_CNT' id='PPT_CNT' type="text" placeholder="슬롯개수 입력 해주세요."
                  value="<?php echo $resultsPs->PPT_CNT;?>" readonly>

              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">기간</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PST_DATE' id='PST_DATE' type="text" placeholder="기간 입력 해주세요."
                  value="<?php echo date("Y-m-d", strtotime($resultsPs->PST_START))."~".date("Y-m-d", strtotime($resultsPs->PST_END));?>"
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">종료기간</h4>
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none rounded-0" type="text"
                    name="PST_END" id="PST_END" value="<?php echo date("Y-m-d", strtotime($resultsPs->PST_END));?>"
                    placeholder='종료일 선택' autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-color-gray-dark-v5"><i class="icon-calendar"></i></span>
                  </div>
                </div>
              </div>
              <div class="form-group g-mb-20 col-md-3">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제금액</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PMT_MONEY' id='PMT_MONEY' type="text" placeholder="결제금액 입력 해주세요."
                  value="<?php echo Number_format($resultsPm->PMT_MONEY);?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-3">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">환불금액</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PMT_REFUND' id='PMT_REFUND' type="text" placeholder="환불금액 입력 해주세요." value="" numberOnly>
              </div>
              <?php if($resultsPm->PMT_MEANS=='VBank'){?>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">환불계좌번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='refundAcctNum' id='refundAcctNum' type="text" placeholder="환불계좌번호 입력 해주세요." value="" numberOnly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">환불계좌 은행</h4>
                <select name="refundBankCode" id="refundBankCode" class="form-control" style="height:50px;">
                  <option value="">:: 은행 선택 ::</option>
                  <option value="11">농협중앙회</option>
                  <option value="12">단위농협</option>
                  <option value="16">축협중앙회</option>
                  <option value="20">우리은행</option>
                  <option value="21">구)조흥은행</option>
                  <option value="22">상업은행</option>
                  <option value="23">SC제일은행</option>
                  <option value="24">한일은행</option>
                  <option value="25">서울은행</option>
                  <option value="26">구)신한은행</option>
                  <option value="27">한국씨티은행 (구 한미)</option>
                  <option value="31">대구은행</option>
                  <option value="32">부산은행</option>
                  <option value="34">광주은행</option>
                  <option value="35">제주은행</option>
                  <option value="37">전북은행</option>
                  <option value="38">강원은행</option>
                  <option value="39">경남은행</option>
                  <option value="41">비씨카드</option>
                  <option value="45">새마을금고</option>
                  <option value="48">신용협동조합중앙회</option>
                  <option value="50">상호저축은행</option>
                  <option value="53">한국씨티은행</option>
                  <option value="54">홍콩상하이은행</option>
                  <option value="55">도이치은행</option>
                  <option value="56">ABN암로</option>
                  <option value="57">JP모건</option>
                  <option value="59">미쓰비시도쿄은행</option>
                  <option value="60">BOA(Bank of America)</option>
                  <option value="64">산림조합</option>
                  <option value="70">신안상호저축은행</option>
                  <option value="71">우체국</option>
                  <option value="81">하나은행</option>
                  <option value="83">평화은행</option>
                  <option value="87">신세계</option>
                  <option value="88">신한(통합)은행</option>
                  <option value="89">케이뱅크</option>
                  <option value="90">카카오뱅크</option>
                  <option value="91">네이버포인트(포인트 100% 사용)</option>
                  <option value="92">토스뱅크</option>
                  <option value="93">토스머니(포인트100% 사용)</option>
                  <option value="94">SSG머니(포인트 100% 사용)</option>
                  <option value="96">엘포인트(포인트 100% 사용)</option>
                  <option value="97">카카오 머니</option>
                  <option value="98">페이코 (포인트 100% 사용)</option>
                  <option value="02">한국산업은행</option>
                  <option value="03">기업은행</option>
                  <option value="04">국민은행</option>
                  <option value="05">하나은행 (구 외환)</option>
                  <option value="06">국민은행 (구 주택)</option>
                  <option value="07">수협중앙회</option>
                  <option value="D1">유안타증권(구 동양증권)</option>
                  <option value="D2">현대증권</option>
                  <option value="D3">미래에셋증권</option>
                  <option value="D4">한국투자증권</option>
                  <option value="D5">우리투자증권</option>
                  <option value="D6">하이투자증권</option>
                  <option value="D7">HMC투자증권</option>
                  <option value="D8">SK증권</option>
                  <option value="D9">대신증권</option>
                  <option value="DA">하나대투증권</option>
                  <option value="DB">굿모닝신한증권</option>
                  <option value="DC">동부증권</option>
                  <option value="DD">유진투자증권</option>
                  <option value="DE">메리츠증권</option>
                  <option value="DF">신영증권</option>
                  <option value="DG">대우증권</option>
                  <option value="DH">삼성증권</option>
                  <option value="DI">교보증권</option>
                  <option value="DJ">키움증권</option>
                  <option value="DK">이트레이드</option>
                  <option value="DL">솔로몬증권</option>
                  <option value="DM">한화증권</option>
                  <option value="DN">NH증권</option>
                  <option value="DO">부국증권</option>
                  <option value="DP">LIG증권</option>
                  <option value="BW">뱅크월렛</option>
                </select>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">환불계좌 예금주명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='refundAcctName' id='refundAcctName' type="text" placeholder="환불계좌 예금주명 입력 해주세요." value="">
              </div>
              <input type='hidden' id='ACT_TID' name='ACT_TID' value='<?php echo $resultAct[0][0]->ACT_TID;?>' />
              <input type='hidden' id='ACT_OID' name='ACT_OID' value='<?php echo $resultAct[0][0]->ACT_OID;?>' />
              <?php }?>
            </div>
            <!-- End 제목 Input -->
          </div>
          <!-- End 1-st column -->
          <div class='col-md-12 text-center'>
            <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value="SAVE" />
            <a href="paymentList?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
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
var mDate = "<?php echo date("Y-m-d", strtotime($resultsPs->PST_START));?>";
var minDate = new Date(mDate);
$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});

jQuery("#PST_END").datepicker("option", "minDate", minDate);

function submit_ck() {
  var type = "<?php echo $resultsPm->PMT_MEANS;?>";
  if (type == 'VBank') {
    if (!$("#PST_END").val()) {
      alert('종료일을 선택해주세요');
      $("#PST_END").focus();
      return false;
    } else if (!$("#PMT_REFUND").val()) {
      alert('환불금액을 선택해주세요');
      $("#PMT_REFUND").focus();
      return false;
    } else if (!$("#refundAcctNum").val()) {
      alert('환불계좌번호를 입력해주세요');
      $("#refundAcctNum").focus();
      return false;
    } else if (!$("#refundBankCode").val()) {
      alert('환불계좌 은행을 선택해주세요');
      $("#refundBankCode").focus();
      return false;
    } else if (!$("#refundAcctName").val()) {
      alert('환불계좌 예금주명을 입력해주세요');
      $("#refundAcctName").focus();
      return false;
    } else {
      return true;
    }
  } else {
    if (!$("#PST_END").val()) {
      alert('종료일을 선택해주세요');
      $("#PST_END").focus();
      return false;
    } else if (!$("#PMT_REFUND").val()) {
      alert('환불금액을 선택해주세요');
      $("#PMT_REFUND").focus();
      return false;
    } else {
      return true;
    }
  }

}
//
-->
</script>

</body>

</html>