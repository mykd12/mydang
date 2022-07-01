<div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
  <!-- Breadcrumb-v1 -->
  <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
    <ul class="u-list-inline g-color-gray-dark-v6 add-location">

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item g-mr-10">
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">코드관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item">
        <span class="g-valign-middle">분류(소) 코드 MODIFY</span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">분류(소) 코드 MODIFY</h1>
      </div>
    </div>
    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/codeCwrite" method="post">
      <input type='hidden' id='CCT_IDX' name='CCT_IDX' value='<?php echo $CCT_IDX;?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
      <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

            <!-- 제목 Input -->
            <div class="row">
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">CODE(대)</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='CAT_CODE' id='CAT_CODE' type="text"
                  value="<?php if($CCT_IDX && $results->CAT_CODE) echo $results->CAT_CODE;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">명칭(대)</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='CAT_NAME' id='CAT_NAME' type="text"
                  value="<?php if($CCT_IDX && $results->CAT_NAME) echo $results->CAT_NAME;?>" placeholder='명칭을 입력 해주세요.'
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">CODE(중)</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='CBT_CODE' id='CBT_CODE' type="text"
                  value="<?php if($CCT_IDX && $results->CBT_CODE) echo $results->CBT_CODE;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">명칭(중)</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='CBT_NAME' id='CBT_NAME' type="text"
                  value="<?php if($CCT_IDX && $results->CBT_NAME) echo $results->CBT_NAME;?>" placeholder='명칭을 입력 해주세요.'
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">CODE(소)</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='CCT_CODE' id='CCT_CODE' type="text"
                  value="<?php if($CCT_IDX && $results->CCT_CODE) echo $results->CCT_CODE;?>">
              </div>
              <div class="form-group g-mb-20 col-md-6">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">명칭(소)</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='CCT_NAME' id='CCT_NAME' type="text"
                  value="<?php if($CCT_IDX && $results->CCT_NAME) echo $results->CCT_NAME;?>"
                  placeholder='명칭을 입력 해주세요.'>
              </div>
            </div>
            <!-- End 제목 Input -->

          </div>
          <!-- End 1-st column -->
          <div class='col-md-12 text-center'>
            <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
            <a href="codeC?pageNo=<?=$pageNo?>&search=<?=$search?>"
              class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
          </div>
        </div>
    </form>
  </div>
</div>
</div>
</main>