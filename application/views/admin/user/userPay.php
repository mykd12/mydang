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
    <form id='frm' name='frm' action="/adminDAO/user_write" method="post" onsubmit="return submit_ck();">
      <input type='hidden' id='PMT_IDX' name='PMT_IDX' value='<?php if($PMT_IDX) echo $PMT_IDX;?>' />
      <input type='hidden' id='PST_IDX' name='PST_IDX' value='<?php if($PST_IDX) echo $PST_IDX;?>' />
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
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">회원 명</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo decrypt($user->MET_NAME); ?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">슬롯 개수</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php echo Number_format($slot->PPT_CNT);?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">기간</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text"
                  value="<?php echo date("Y-m-d", strtotime($slot->PST_START));?> ~ <?php echo date("Y-m-d", strtotime($slot->PST_END));?>"
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">거래번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if(isset($results)) echo $results->PMT_NUMBER1;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">주문번호</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if(isset($results)) echo $results->PMT_NUMBER2;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제 금액</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if(isset($results)) echo Number_format($results->PMT_MONEY);?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제 수단</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if(isset($results)) echo $results->PMT_MEANS;?>" readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">결제일</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if(isset($results)) echo date("Y-m-d", strtotime($results->PMT_DATE));?>"
                  readonly>
              </div>
              <div class="form-group g-mb-20 col-md-4">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">비고</h4>
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  type="text" value="<?php if(isset($slot)) echo $slot->PST_MSG;?>" readonly>
              </div>

            </div>
          </div>
          <!-- End 제목 Input -->
        </div>
        <!-- End 1-st column -->
        <div class='col-md-12 text-center'>
          <a href="/admin/userPayList?key=<?php echo $key;?>&pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
            class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</main>