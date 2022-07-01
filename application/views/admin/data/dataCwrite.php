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
        <span class="g-valign-middle">지역별 직장인 인구수 MODIFY</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">지역별 직장인 인구수 MODIFY</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/dataCwrite" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='DCT_IDX' name='DCT_IDX' value='<?php echo $DCT_IDX;?>' />
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
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시/도</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DCT_AREA_A' id='DCT_AREA_A' type="text"
                  value="<?php if($DCT_IDX && $results->DCT_AREA_A) echo $results->DCT_AREA_A;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구/군</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DCT_AREA_B' id='DCT_AREA_B' type="text"
                  value="<?php if($DCT_IDX && $results->DCT_AREA_B) echo $results->DCT_AREA_B;?>" readonly
                  placeholder='구/군을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">인구수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DCT_CNT' id='DCT_CNT' type="text"
                  value="<?php if($DCT_IDX && $results->DCT_CNT) echo $results->DCT_CNT;?>" numberOnly
                  placeholder='인구수를 입력 해주세요.'>
              </div>
            </div>
            <!-- End 제목 Input -->

          </div>
          <!-- End 1-st column -->
          <div class='col-md-12 text-center'>
            <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
            <a href="dataC?pageNo=<?=$pageNo?>&search=<?=$search?>"
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
  if (!$("#DCT_CNT").val()) {
    alert("인구수를 입력해주세요");
    $("#DCT_CNT").focus();
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