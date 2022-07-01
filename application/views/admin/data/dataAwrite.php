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
        <span class="g-valign-middle">지역별 주거 인구수 MODIFY</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">지역별 주거 인구수 MODIFY</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/dataAwrite" method="post">
      <input type='hidden' id='DAT_IDX' name='DAT_IDX' value='<?php echo $DAT_IDX;?>' />
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
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">광역시/도</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_AREA_A' id='DAT_AREA_A' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_AREA_A) echo $results->DAT_AREA_A;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시/구/군</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_AREA_B' id='DAT_AREA_B' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_AREA_B) echo $results->DAT_AREA_B;?>" readonly
                  placeholder='시/구/군을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">동/면/리</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_AREA_C' id='DPT_AREA_C' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_AREA_B) echo $results->DAT_AREA_C;?>" readonly
                  placeholder='동/면/리을 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">총 인구수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_CNT_A' id='DAT_CNT_A' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_CNT_A) echo $results->DAT_CNT_A;?>" numberOnly
                  placeholder='총 인구수를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">총 세대수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_CNT_B' id='DAT_CNT_B' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_CNT_B) echo $results->DAT_CNT_B;?>" numberOnly
                  placeholder='총 세대수를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">세대당 인구수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_CNT_C' id='DAT_CNT_C' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_CNT_C) echo $results->DAT_CNT_C;?>" numberOnly
                  placeholder='세대당 인구수를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">남성 인구수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_CNT_D' id='DAT_CNT_D' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_CNT_D) echo $results->DAT_CNT_D;?>" numberOnly
                  placeholder='남성 인구수를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">여성 인구수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_CNT_E' id='DAT_CNT_E' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_CNT_E) echo $results->DAT_CNT_E;?>" numberOnly
                  placeholder='여성 인구수를 입력 해주세요.'>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">남여비율</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='DAT_CNT_F' id='DAT_CNT_F' type="text"
                  value="<?php if($DAT_IDX && $results->DAT_CNT_F) echo $results->DAT_CNT_F;?>" numberOnly
                  placeholder='남여비율 입력 해주세요.'>
              </div>


            </div>
            <!-- End 제목 Input -->

          </div>
          <!-- End 1-st column -->
          <div class='col-md-12 text-center'>
            <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
            <a href="dataA?pageNo=<?=$pageNo?>&search=<?=$search?>"
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
$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});
//
-->
</script>