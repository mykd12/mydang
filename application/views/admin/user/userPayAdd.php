<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">일반회원</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item">
        <span class="g-valign-middle">슬롯추가</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">슬롯추가</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/userPayAdd" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='key' name='key' value='<?php echo $key;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">
            <!-- 제목 Input -->
            <div class="row">
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">슬롯개수</h4>
                <select name="PPT_CNT" id="PPT_CNT" class="form-control">
                  <option value="1">1개</option>
                  <option value="2">2개</option>
                  <option value="3">3개</option>
                  <option value="4">4개</option>
                  <option value="5">5개</option>
                  <option value="6">6개</option>
                  <option value="7">7개</option>
                  <option value="8">8개</option>
                  <option value="9">9개</option>
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
                </select>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">슬롯 시작</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="" name="PST_START" id="PST_START">
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">슬롯 종료</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="" name="PST_END" id="PST_END">
              </div>
            </div>
          </div>
          <!-- End 제목 Input -->
        </div>
        <!-- End 1-st column -->
        <div class='col-md-12 text-center'>
          <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
          <a href="/admin/userPayList?key=<?php echo $key;?>" class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</main>
<script>
$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});

function submit_ck() {
  if (!$("#PPT_CNT").val()) {
    alert("슬롯 갯수를 입력해주세요.");
    $("#PPT_CNT").focus();
    return false;
  } else if (!$("#PST_START").val()) {
    alert("슬롯 시작일을 선택해주세요.");
    $("#PST_START").focus();
    return false;
  } else if (!$("#PST_END").val()) {
    alert("슬롯 종료일을 선택해주세요.");
    $("#PST_END").focus();
    return false;
  } else {
    return true;
  }
}
</script>