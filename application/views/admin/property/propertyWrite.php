<style type="text/css">

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
        <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">매물 관리</a>
        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
      </li>

      <li class="list-inline-item">
        <span class="g-valign-middle">매물
          <?if($PPT_IDX){ echo "MODIFY"; }else{ echo "ADD"; }?>
        </span>
      </li>
    </ul>
  </div>
  <!-- End Breadcrumb-v1 -->


  <div class="g-pa-20" id="CTs-write">
    <div class="media">
      <div class="d-flex align-self-center">
        <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">매물
          <?if($PPT_IDX){ echo "MODIFY"; }else{ echo "ADD"; }?>
        </h1>
      </div>
    </div>

    <hr class="d-flex g-brd-gray-light-v7 g-my-30">
    <form id='frm' name='frm' action="/adminDAO/property_write" method="post" enctype="multipart/form-data"
      onsubmit="return submit_ck();">
      <input type='hidden' id='PPT_IDX' name='PPT_IDX' value='<?php if($PPT_IDX) echo $PPT_IDX;?>' />
      <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
      <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
      <input type='hidden' id='PPT_LAT' name='PPT_LAT' value='<?php if($PPT_IDX) echo $results->PPT_LAT;?>' />
      <input type='hidden' id='PPT_LON' name='PPT_LON' value='<?php if($PPT_IDX) echo $results->PPT_LON;?>' />
      <input type='hidden' id='PPT_ADDR1_B' name='PPT_ADDR1_B'
        value='<?php if($PPT_IDX) echo $results->PPT_ADDR1_B;?>' />
      <input type='hidden' id='PPT_AREA_A' name='PPT_AREA_A' value='<?php if($PPT_IDX) echo $results->PPT_AREA_A;?>' />
      <input type='hidden' id='PPT_AREA_B' name='PPT_AREA_B' value='<?php if($PPT_IDX) echo $results->PPT_AREA_B;?>' />
      <input type='hidden' id='PPT_AREA_C' name='PPT_AREA_C' value='<?php if($PPT_IDX) echo $results->PPT_AREA_C;?>' />
      <input type='hidden' id='PPT_AREA_A_CODE' name='PPT_AREA_A_CODE'
        value='<?php if($PPT_IDX) echo $results->PPT_AREA_A_CODE;?>' />
      <input type='hidden' id='PPT_AREA_B_CODE' name='PPT_AREA_B_CODE'
        value='<?php if($PPT_IDX) echo $results->PPT_AREA_B_CODE;?>' />
      <input type='hidden' id='PPT_AREA_C_CODE' name='PPT_AREA_C_CODE'
        value='<?php if($PPT_IDX) echo $results->PPT_AREA_C_CODE;?>' />
      <input type='hidden' id='PPT_AREA_D' name='PPT_AREA_D' value='<?php if($PPT_IDX) echo $results->PPT_AREA_D;?>' />
      <input type='hidden' id='PPT_USER_TYPE' name='PPT_USER_TYPE'
        value='<?php if($PPT_IDX) echo $results->PPT_USER_TYPE;?>' />
      <div class="row">
        <!-- 1-st column -->
        <div class="col-md-12 ">
          <!-- Basic Text Inputs -->
          <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">
            <!-- 제목 Input -->
            <div class="row">
              <div class="col-md-12 g-mb-20">
                <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">매물 구분 <sup
                    style='color:#ff0000; font-size:16px;'>*</sup></h4>
                <div class="btn-group justified-content">
                  <label class="u-check g-pl-0">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_TYPE_A[]'
                      id='PPT_TYPE_A1' value="상가"
                      <?php if($PPT_IDX && strpos($results->PPT_TYPE_A, '상가') !== false){ echo "checked";}?>>
                    <span
                      class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0"
                      style="height:50px; line-height:2.2;">상가</span>
                  </label>
                  <label class="u-check g-pl-0">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_TYPE_A[]'
                      id='PPT_TYPE_A2' value="사무실"
                      <?php if($PPT_IDX && strpos($results->PPT_TYPE_A, '사무실') !== false){ echo "checked";}?>>
                    <span
                      class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0"
                      style="height:50px; line-height:2.2;">사무실</span>
                  </label>
                </div>
                <div class="g-mt-10">
                  <label class="form-check-inline u-check g-pl-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_TYPE_All[]'
                      id='PPT_TYPE_A3' value="상가|사무실"
                      <?php if($PPT_IDX && strpos($results->PPT_TYPE_A, '상가|사무실') !== false){ echo "checked";}?>>
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon=""></i>
                    </div>
                    상가/사무실
                  </label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 g-mb-20">
                <h4 class="h3 g-font-weight-600 g-color-black g-mb-10"
                  style="border-bottom:1px solid #333; padding:15px 0;">매물정보</h4>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--m g-font-weight-600">
                <label class="mb-0" for="PPT_TYPE_B">매물상태 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center">
                <select class="form-control form-control-md rounded-0" id="PPT_STATE" name="PPT_STATE"
                  style="height:50px;">
                  <option value="">:: 공간형태 선택 ::</option>
                  <option value="A" <?php if($PPT_IDX && $results->PPT_STATE=='A'){ echo "selected" ;}?>>승인
                  </option>
                  <option value="B" <?php if($PPT_IDX && $results->PPT_STATE=='B'){ echo "selected" ;}?>>검토중
                  </option>
                  <option value="C" <?php if($PPT_IDX && $results->PPT_STATE=='C'){ echo "selected" ;}?>>완료
                  </option>
                  <option value="D" <?php if($PPT_IDX && $results->PPT_STATE=='D'){ echo "selected" ;}?>>종료
                  </option>
                </select>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--m g-font-weight-600">
                <label class="mb-0" for="PPT_TYPE_B">반려
                  <sup style='color:#ff0000; font-size:16px;'>*</sup>
                </label>
              </div>
              <div class="col-md-10 align-self-center">
                <?php if($PPT_IDX && $companion > 0){?>
                <?php foreach($companion as $data){?>
                <label class="mb-0"><?php echo $data->CPT_REG_DATE;?></label>
                <textarea class="form-control" readonly
                  style='min-height:50px; margin-bottom:20px;'><?php echo $data->CPT_MSG;?></textarea>
                <?php }?>
                <?php }?>
                <textarea name="CPT_MSG" id="CPT_MSG" class="form-control" style='min-height:150px;'
                  placeholder='반려 사유를 입력해주세요.'></textarea>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--m g-font-weight-600">
                <label class="mb-0" for="PPT_TYPE_B">공간형태 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center">
                <select class="form-control form-control-md rounded-0" id="PPT_TYPE_B" name="PPT_TYPE_B"
                  style="height:50px;">
                  <option value="">:: 공간형태 선택 ::</option>
                  <?php if($PPT_IDX && $results->PPT_TYPE_A=='상가'){?>
                  <option value="근린상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='근린상가'){ echo "selected" ;}?>>근린상가
                  </option>
                  <option value="상가주택" <?php if($PPT_IDX && $results->PPT_TYPE_B=='상가주택'){ echo "selected" ;}?>>상가주택
                  </option>
                  <option value="단지상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='단지상가'){ echo "selected" ;}?>>단지상가
                  </option>
                  <option value="주상복합상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='주상복합상가'){ echo "selected" ;}?>>
                    주상복합상가</option>
                  <option value="기타상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='기타상가'){ echo "selected" ;}?>>기타상가
                  </option>
                  <?php }else if($PPT_IDX && $results->PPT_TYPE_A=='사무실'){?>
                  <option value="빌딩형" <?php if($PPT_IDX && $results->PPT_TYPE_B=='빌딩형'){ echo "selected" ;}?>>빌딩형
                  </option>
                  <option value="주택형" <?php if($PPT_IDX && $results->PPT_TYPE_B=='주택형'){ echo "selected" ;}?>>주택형
                  </option>
                  <option value="오피스텔형" <?php if($PPT_IDX && $results->PPT_TYPE_B=='오피스텔형'){ echo "selected" ;}?>>오피스텔형
                  </option>
                  <option value="지식산업센터" <?php if($PPT_IDX && $results->PPT_TYPE_B=='지식산업센터'){ echo "selected" ;}?>>
                    지식산업센터</option>
                  <option value="기타사무실" <?php if($PPT_IDX && $results->PPT_TYPE_B=='기타사무실'){ echo "selected" ;}?>>기타사무실
                  </option>
                  <?php }else if($PPT_IDX){?>
                  <option value="근린상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='근린상가'){ echo "selected" ;}?>>근린상가
                  </option>
                  <option value="상가주택" <?php if($PPT_IDX && $results->PPT_TYPE_B=='상가주택'){ echo "selected" ;}?>>상가주택
                  </option>
                  <option value="단지상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='단지상가'){ echo "selected" ;}?>>단지상가
                  </option>
                  <option value="주상복합상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='주상복합상가'){ echo "selected" ;}?>>
                    주상복합상가</option>
                  <option value="기타상가" <?php if($PPT_IDX && $results->PPT_TYPE_B=='기타상가'){ echo "selected" ;}?>>기타상가
                  </option>
                  <option value="빌딩형" <?php if($PPT_IDX && $results->PPT_TYPE_B=='빌딩형'){ echo "selected" ;}?>>빌딩형
                  </option>
                  <option value="주택형" <?php if($PPT_IDX && $results->PPT_TYPE_B=='주택형'){ echo "selected" ;}?>>주택형
                  </option>
                  <option value="오피스텔형" <?php if($PPT_IDX && $results->PPT_TYPE_B=='오피스텔형'){ echo "selected" ;}?>>오피스텔형
                  </option>
                  <option value="지식산업센터" <?php if($PPT_IDX && $results->PPT_TYPE_B=='지식산업센터'){ echo "selected" ;}?>>
                    지식산업센터</option>
                  <option value="기타사무실" <?php if($PPT_IDX && $results->PPT_TYPE_B=='기타사무실'){ echo "selected" ;}?>>기타사무실
                  </option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--m g-font-weight-600">
                <label class="mb-0" for="PPT_TYPE_B">중개사/임대업자 <sup
                    style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center">
                <select class="form-control form-control-md rounded-0" id="USER_IDX" name="USER_IDX"
                  style="height:50px;">
                  <option value="">:: 매물관리자 선택 ::</option>
                  <?if($PPT_IDX){?>
                  <?php foreach($brkResults as $data){?>
                  <?php if($results->PPT_USER_TYPE=='A'){?>
                  <?php if($PPT_IDX && $data->BKT_IDX==$results->USER_IDX){?>
                  <option value="<?php echo $data->BKT_IDX;?>" selected data="A">
                    <?php echo decrypt($data->BKT_NAME)?>
                    <?if($data->BKT_COMPANY){?>[<?php echo $data->BKT_COMPANY;?>]
                    <?}?>
                  </option>
                  <?}?>

                  <?php }else if($results->PPT_USER_TYPE=='B') {?>
                  <?php if($PPT_IDX && $data->MET_IDX==$results->USER_IDX){?>
                  <option value="<?php echo $data->MET_IDX;?>" selected data="B">
                    <?php echo decrypt($data->MET_NAME)?>
                  </option>
                  <?php }?>
                  <?php }?>
                  <?php }?>
                  <?php }else{?>
                  <?php foreach($brkResultsBk as $data){?>
                  <option value="<?php echo $data->BKT_IDX;?>" data="A">
                    <?php echo decrypt($data->BKT_NAME)?>
                    <?if($data->BKT_COMPANY){?>[<?php echo $data->BKT_COMPANY;?>]
                    <?}?>
                  </option>
                  <?php }?>
                  <?php foreach($brkResultsMe as $data){?>
                  <option value="<?php echo $data->MET_IDX;?>" data="B">
                    <?php echo decrypt($data->MET_NAME)?>
                  </option>
                  <?php }?>
                  <?php }?>

                </select>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--m g-font-weight-600">
              </div>
              <div class="col-md-10 align-self-center" id="slotDiv">
                <?php if(isset($slotResults)){?>
                <select class="form-control form-control-md rounded-0" id="PST_IDX" name="PST_IDX" style="height:50px;">
                  <option value=''>:: 슬롯 선택 ::</option>
                  <?php foreach($slotResults as $data){?>
                  <option value="<?php echo $data->PST_IDX;?>"
                    <?php if($data->PST_IDX==$results->PST_IDX){echo "selected";}?>>
                    <?php echo date("Y-m-d", strtotime($data->PST_START));?> ~
                    <?php echo date("Y-m-d", strtotime($data->PST_END));?></option>
                  <?php }?>
                </select>
                <?php }?>
              </div>
            </div>
            <!-- <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_REGIST_NUMBER">상태 <sup
                    style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center">
                <select class="form-control form-control-md rounded-0" id="PPT_STATE" name="PPT_STATE"
                  style="height:50px;">
                  <option value="">:: 매물상태 선택 ::</option>
                  <option value="A" <?php if($PPT_IDX && $results->PPT_STATE=='A'){ echo "selected" ;}?>>승인</option>
                  <option value="B" <?php if($PPT_IDX && $results->PPT_STATE=='B'){ echo "selected" ;}?>>검토중</option>
                  <option value="C" <?php if($PPT_IDX && $results->PPT_STATE=='C'){ echo "selected" ;}?>>완료</option>
                  <option value="D" <?php if($PPT_IDX && $results->PPT_STATE=='D'){ echo "selected" ;}?>>종료</option>
                </select>
                <textarea name="PPT_STATE_TXT" id="PPT_STATE_TXT" class="form-control g-mt-15"
                  style="<?php if($PPT_IDX && ($results->PPT_STATE=='C' || $results->PPT_STATE=='D')){?><?php }else{?>display:none<?php }?>"
                  placeholder='반려 & 취소 사유를 입력해주세요.'><?php if($PPT_IDX && $results->PPT_STATE_TXT) echo $results->PPT_STATE_TXT;?></textarea>
              </div>
            </div> -->
            <!-- <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_REGIST_NUMBER">광고기간 <sup
                    style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-5 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none rounded-0" type="text"
                    name="PPT_START_DATE" id="PPT_START_DATE" value="<?php if($PPT_IDX) echo $results->PPT_START_DATE?>"
                    placeholder='광고 시작일 선택' autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-color-gray-dark-v5"><i class="icon-calendar"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-5 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none rounded-0" type="text"
                    name="PPT_END_DATE" id="PPT_END_DATE" value="<?php if($PPT_IDX) echo $results->PPT_END_DATE?>"
                    placeholder='광고 종료일 선택' autocomplete="off">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-color-gray-dark-v5"><i class="icon-calendar"></i></span>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_REGIST_NUMBER">등기번호</label>
              </div>
              <div class="col-md-10 align-self-center">
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14"
                  name='PPT_REGIST_NUMBER' id='PPT_REGIST_NUMBER' type="text"
                  value="<?php if($PPT_IDX) echo decrypt($results->PPT_REGIST_NUMBER);?>" placeholder='등기번호를 입력 해주세요.'>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_ADDR1_A">주소 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center">
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PPT_ADDR1_A' id='PPT_ADDR1_A' type="text"
                  value="<?php if($PPT_IDX) echo decrypt($results->PPT_ADDR1_A)?>" placeholder='주소를 입력 해주세요.' readonly
                  onclick="execDaumPostcode();">
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_ADDR2">상세주소 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center">
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PPT_ADDR2' id='PPT_ADDR2' type="text"
                  value="<?php if($PPT_IDX) echo decrypt($results->PPT_ADDR2)?>" placeholder='상세주소를 입력 해주세요.'>
                <label class="form-check-inline u-check g-pl-25 g-mt-5">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="PPT_EXPOSURE"
                    id="PPT_EXPOSURE" value="y" <?php if($PPT_IDX && $results->PPT_EXPOSURE=='y') echo "checked";?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  상세주소 노출 <span style="color:#ff0000; margin-left:15px; font-size:11px;">위치 정보를 공개하고, 내 매물의 관심도를
                    높여보세요.</span>
                </label>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_IMG">매물사진 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center" id="add_img_div">
                <div class="input-group u-file-attach-v1 g-brd-gray-light-v2" id="file_div0">
                  <input class="form-control form-control-md rounded-0" placeholder="매물사진을 선택해주세요." readonly=""
                    type="text">
                  <div class="input-group-btn">
                    <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">첨부</button>
                    <input type="file" name='PPT_IMG[]' id='PPT_IMG0' class="PPT_IMG">
                  </div>
                  <input type="hidden" name="PPT_REPRES[]" id="PPT_REPRES0" value="<?php if(!$PPT_IDX) echo "Y";?>">
                </div>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md">
              </div>
              <div class="col-md-10 align-self-center row" id="add_img">
                <?php if($PPT_IDX && $resultsImg > 0){?>
                <?php foreach($resultsImg as $data){?>
                <input type="hidden" name="PIT_IDX[]" id="PIT_IDX<?php echo $data->PIT_IDX;?>"
                  value="<?php echo $data->PIT_IDX;?>" />
                <input type="hidden" name="PIT_DEL[]" id="PIT_DEL<?php echo $data->PIT_IDX;?>" value="" />
                <input type="hidden" name="PIT_UP_REPRES[]" id="PIT_UP_REPRES<?php echo $data->PIT_IDX;?>"
                  value="<?php echo $data->PIT_REPRES;?>" />
                <div class="col-md-3 p-0 g-mb-30  g-ml-10 g-mr-10" id="PIT_DIV<?php echo $data->PIT_IDX;?>">
                  <div class="d-flex flex-wrap h-100 g-brd-around g-brd-gray-light-v7 g-rounded-2 g-pa-25">
                    <header class="w-100 align-self-start text-right justify-content-end g-pos-rel g-mb-10">
                      <div class="g-pos-rel g-z-index-2">
                        <a id="upload<?php echo $data->PIT_IDX;?>Invoker"
                          class="u-link-v5 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-secondary--hover"
                          href="#" aria-controls="upload<?php echo $data->PIT_IDX;?>" aria-haspopup="true"
                          aria-expanded="false" data-dropdown-event="click"
                          data-dropdown-target="#upload<?php echo $data->PIT_IDX;?>" data-dropdown-type="jquery-slide">
                          <i class="hs-admin-more-alt"></i>
                        </a>

                        <div id="upload<?php echo $data->PIT_IDX;?>"
                          class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white u-dropdown--jquery-slide u-dropdown--hidden"
                          aria-labelledby="upload<?php echo $data->PIT_IDX;?>Invoker"
                          style="right: 0px; display: none;">
                          <ul class="list-unstyled g-nowrap mb-0">
                            <li>
                              <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14"
                                href="javascript:up_repres('<?php echo $data->PIT_IDX;?>')">
                                <i
                                  class="hs-admin-cloud-up g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                대표 선택
                              </a>
                            </li>
                            <li>
                              <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14"
                                href="javascript:up_del('<?php echo $data->PIT_IDX;?>')">
                                <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md"></i>
                                삭제
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </header>
                    <section class="w-100 align-self-center text-center g-color-darkblue-v2 g-mb-30">
                      <img class="img-fluid g-rounded-2 add_img" src="../uploads/<?php echo $data->PIT_IMG_SAVE;?>"
                        alt="Image description">
                    </section>
                    <div class='repres' <?php if($data->PIT_REPRES=='Y'){ echo " style='display:block' ";}?>>대표</div>
                  </div>
                </div>
                <?php }?>
                <?php }?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 g-mb-20">
                <h4 class="h3 g-font-weight-600 g-color-black g-mb-10"
                  style="border-bottom:1px solid #333; padding:15px 0;">매물 계약 정보</h4>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_PRICE_A">보증금 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-4 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_PRICE_A'
                    id='PPT_PRICE_A' type="text" value="<?php if($PPT_IDX) echo $results->PPT_PRICE_A;?>"
                    placeholder="보증금을 입력해주세요." numberOnly>
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">만원</span>
                  </div>
                </div>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_PRICE_B">임대료 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-4 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_PRICE_B'
                    id='PPT_PRICE_B' type="text" value="<?php if($PPT_IDX) echo $results->PPT_PRICE_B;?>"
                    placeholder="임대료를 입력해주세요." numberOnly>
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">만원</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_PRICE_C">권리금 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-4 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_PRICE_C'
                    id='PPT_PRICE_C' type="text" value="<?php if($PPT_IDX) echo $results->PPT_PRICE_C;?>"
                    placeholder="권리금을 입력해주세요." numberOnly>
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">만원</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 align-self-center g-mb-5 g-mb-0--md">
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name='PPT_PRICE_C_ETC'
                    id='PPT_PRICE_C_ETC1' value="권리금 없음"
                    <?php if($PPT_IDX && $results->PPT_PRICE_C_ETC=='권리금 없음') echo "checked";?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0" 0>
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  권리금 없음
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name='PPT_PRICE_C_ETC'
                    id='PPT_PRICE_C_ETC2' value="협의가능"
                    <?php if($PPT_IDX && $results->PPT_PRICE_C_ETC=='협의가능') echo "checked";?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  협의가능
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name='PPT_PRICE_C_ETC'
                    id='PPT_PRICE_C_ETC3' value="비공개"
                    <?php if($PPT_IDX && $results->PPT_PRICE_C_ETC=='비공개') echo "checked";?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  비공개
                </label>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_PRICE_D">관리비 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-4 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_PRICE_D'
                    id='PPT_PRICE_D' type="text" value="<?php if($PPT_IDX) echo $results->PPT_PRICE_D;?>"
                    placeholder="관리비을 입력해주세요." numberOnly>
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">만원</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 align-self-center g-mb-5 g-mb-0--md">
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_PRICE_D_ETC'
                    id='PPT_PRICE_D_ETC1' value="관리비 없음"
                    <?php if($PPT_IDX && $results->PPT_PRICE_D_ETC=='관리비 없음') echo "checked";?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0" 0>
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  관리비 없음
                </label>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">층수 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-1 align-self-center g-mb-5 g-mb-0--md">
                <label class="mb-0">건물층수</label>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md">
                <div class="js-quantity input-group u-quantity-v1 w-100 g-brd-gray-light-v3 g-brd-primary--focus">
                  <input class="js-result form-control text-center g-font-size-16 rounded-0 g-pa-10-16" type="text"
                    name="PPT_STOREYS_A" id="PPT_STOREYS_A"
                    value="<?php if($PPT_IDX){ echo $results->PPT_STOREYS_A;}else{ echo "1";}?>" numberOnly readonly="">
                  <div class="input-group-append g-color-gray">
                    <span class="js-minus input-group-text rounded-0 g-width-55"><i class="hs-admin-minus"></i></span>
                    <span class="js-plus input-group-text rounded-0 g-width-55"><i class="hs-admin-plus"></i></span>
                  </div>
                </div>
              </div>
              <div class="col-md-1 align-self-center g-mb-5 g-mb-0--md">
                <label class="mb-0">해당층수</label>
              </div>
              <div class="col-md-3 align-self-center g-mb-5 g-mb-0--md">
                <div class="btn-group justified-content">
                  <label class="u-check">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="PPT_STOREYS_B" type="radio"
                      id="PPT_STOREYS_B1" value="A"
                      <?php if(($PPT_IDX && $results->PPT_STOREYS_B=='A') || !$PPT_IDX){ echo "checked";}?>>
                    <span
                      class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked rounded-0">지상</span>
                  </label>
                  <label class="u-check">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="PPT_STOREYS_B" type="radio"
                      id="PPT_STOREYS_B2" value="B"
                      <?php if(($PPT_IDX && $results->PPT_STOREYS_B=='B')){ echo "checked";}?>>
                    <span
                      class="btn btn-md btn-block u-btn-outline-lightgray g-color-white--checked g-bg-primary--checked g-brd-left-none--md rounded-0">지하</span>
                  </label>
                </div>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md">
                <div class="js-quantity input-group u-quantity-v1 w-100 g-brd-gray-light-v3 g-brd-primary--focus">
                  <input class="js-result form-control text-center g-font-size-16 rounded-0 g-pa-10-16"
                    id="PPT_STOREYS_C" name="PPT_STOREYS_C" type="text"
                    value="<?php if($PPT_IDX){ echo $results->PPT_STOREYS_C; }else{ echo "1";}?>" numberOnly
                    readonly="">
                  <div class=" input-group-append g-color-gray">
                    <span class="js-minus input-group-text rounded-0 g-width-55"><i class="hs-admin-minus"></i></span>
                    <span class="js-plus input-group-text rounded-0 g-width-55"><i class="hs-admin-plus"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <script>

            </script>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">면적 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md">
                <label class="mb-0">연면적</label>
              </div>
              <div class="col-md-3 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_SIZE_A'
                    id='PPT_SIZE_A' type="text" value="<?php if($PPT_IDX) echo $results->PPT_SIZE_A;?>"
                    placeholder="연면적을 입력해주세요.">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">m<sup>2</sup></span>
                  </div>
                </div>
              </div>
              <div class="col-md-1 align-self-center g-mb-5 g-mb-0--md text-center">
                <i class="hs-admin-loop"></i>
              </div>
              <div class="col-md-3 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_SIZE_AA'
                    id='PPT_SIZE_AA' type="text" value="<?php if($PPT_IDX) echo $results->PPT_SIZE_B* 0.3025;?>"
                    placeholder="연면적을 입력해주세요.">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">평</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0"></label>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md">
                <label class="mb-0">전용면적</label>
              </div>
              <div class="col-md-3 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_SIZE_B'
                    id='PPT_SIZE_B' type="text" value="<?php if($PPT_IDX) echo $results->PPT_SIZE_B;?>"
                    placeholder="전용면적을 입력해주세요.">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">m<sup>2</sup></span>
                  </div>
                </div>
              </div>
              <div class="col-md-1 align-self-center g-mb-5 g-mb-0--md text-center">
                <i class="hs-admin-loop"></i>
              </div>
              <div class="col-md-3 align-self-center">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md border-right-0 rounded-0 pr-0" name='PPT_SIZE_BB'
                    id='PPT_SIZE_BB' type="text" value="<?php if($PPT_IDX) echo $results->PPT_SIZE_B* 0.3025;?>"
                    placeholder="전용면적을 입력해주세요.">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-bg-white g-color-gray-light-v1">평</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 g-mb-20">
                <h4 class="h3 g-font-weight-600 g-color-black g-mb-10"
                  style="border-bottom:1px solid #333; padding:15px 0;">매물 추가 정보</h4>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">입점여부</label>
              </div>
              <div class="col-md-4 align-self-center g-mb-5 g-mb-0--md">
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name='PPT_OPTION_A'
                    id='PPT_OPTION_A1' <?php if($PPT_IDX && $results->PPT_OPTION_A=='즉시입주') echo "checked"; ?>
                    value="즉시입주">
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0" 0>
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  즉시입주
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="radio" name='PPT_OPTION_A'
                    id='PPT_OPTION_A2' <?php if($PPT_IDX && $results->PPT_OPTION_A=='협의가능') echo "checked"; ?>
                    value="협의가능">
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0" 0>
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  협의가능
                </label>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">주차</label>
              </div>
              <div class="col-md-4 align-self-center g-mb-5 g-mb-0--md">
                <select class="form-control form-control-md rounded-0 g-mb-25" name="PPT_OPTION_B" id="PPT_OPTION_B"
                  style="height:50px;">
                  <option value="">:: 주차 선택 ::</option>
                  <option value="0" <?php if($PPT_IDX && $results->PPT_OPTION_B=='0') echo "selected"; ?>>0대</option>
                  <option value="1" <?php if($PPT_IDX && $results->PPT_OPTION_B=='1') echo "selected"; ?>>1대</option>
                  <option value="2" <?php if($PPT_IDX && $results->PPT_OPTION_B=='2') echo "selected"; ?>>2대</option>
                  <option value="3" <?php if($PPT_IDX && $results->PPT_OPTION_B=='3') echo "selected"; ?>>3대</option>
                  <option value="4" <?php if($PPT_IDX && $results->PPT_OPTION_B=='4') echo "selected"; ?>>4대</option>
                  <option value="5" <?php if($PPT_IDX && $results->PPT_OPTION_B=='5') echo "selected"; ?>>5대</option>
                  <option value="6" <?php if($PPT_IDX && $results->PPT_OPTION_B=='6') echo "selected"; ?>>6대</option>
                  <option value="7" <?php if($PPT_IDX && $results->PPT_OPTION_B=='7') echo "selected"; ?>>7대</option>
                  <option value="8" <?php if($PPT_IDX && $results->PPT_OPTION_B=='8') echo "selected"; ?>>8대</option>
                  <option value="9" <?php if($PPT_IDX && $results->PPT_OPTION_B=='9') echo "selected"; ?>>9대</option>
                  <option value="10" <?php if($PPT_IDX && $results->PPT_OPTION_B=='10') echo "selected"; ?>>10대 이상
                  </option>
                </select>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">냉방/난방</label>
              </div>
              <div class="col-md-4 align-self-center g-mb-5 g-mb-0--md">
                <select class="form-control form-control-md rounded-0 g-mb-25" name="PPT_OPTION_C" id="PPT_OPTION_C"
                  style="height:50px;">
                  <option value="">:: 냉방/난방 선택 ::</option>
                  <option value="개별냉/난방" <?php if($PPT_IDX && $results->PPT_OPTION_C=='개별냉/난방') echo "selected"; ?>>
                    개별냉/난방</option>
                  <option value="공용냉/난방" <?php if($PPT_IDX && $results->PPT_OPTION_C=='공용냉/난방') echo "selected"; ?>>
                    공용냉/난방</option>
                </select>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">화장실</label>
              </div>
              <div class="col-md-4 align-self-center g-mb-5 g-mb-0--md">
                <select class="form-control form-control-md rounded-0 g-mb-25" name="PPT_OPTION_D" id="PPT_OPTION_D"
                  style="height:50px;">
                  <option value="">:: 화장실 선택 ::</option>
                  <option value="외부" <?php if($PPT_IDX && $results->PPT_OPTION_D=='외부') echo "selected"; ?>>외부</option>
                  <option value="내부" <?php if($PPT_IDX && $results->PPT_OPTION_D=='내부') echo "selected"; ?>>내부</option>
                </select>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">준공년도</label>
              </div>
              <div class="col-md-4 align-self-center g-mb-5 g-mb-0--md">
                <div class="input-group g-brd-primary--focus">
                  <input class="form-control form-control-md u-datepicker-v1 g-brd-right-none rounded-0" type="text"
                    name="PPT_OPTION_E" id="PPT_OPTION_E" value="<?php if($PPT_IDX) echo $results->PPT_OPTION_E?>">
                  <div class="input-group-append">
                    <span class="input-group-text rounded-0 g-color-gray-dark-v5"><i class="icon-calendar"></i></span>
                  </div>
                </div>
              </div>
              <!--<div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">기피업종</label>
              </div>
              <div class="col-md-4 align-self-center g-mb-5 g-mb-0--md">
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                  name='PPT_OPTION_F' id='PPT_OPTION_F' type="text"
                  value="<?php if($PPT_IDX) echo $results->PPT_OPTION_F?>" placeholder='기피업종을 입력해주세요.'>
              </div>-->
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">매물특징</label>
              </div>
              <div class="col-md-10 align-self-center g-mb-5 g-mb-0--md">
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G1' value="인테리어"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'인테리어') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0" 0>
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  인테리어
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G2' value="엘리베이터"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'엘리베이터') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  엘리베이터
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G3' value="시스템에어컨"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'시스템에어컨') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  시스템에어컨
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G4' value="테라스"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'테라스') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  테라스
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G5' value="루프탑"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'루프탑') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  루프탑
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G6' value="보안시스템"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'보안시스템') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  보안시스템
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G7' value="입출입관리"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'입출입관리') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  입출입관리
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G8' value="창고"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'창고') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  창고
                </label>
                <label class="form-check-inline u-check g-pl-25">
                  <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_OPTION_G[]'
                    id='PPT_OPTION_G6' value="복층"
                    <?php if($PPT_IDX && strpos($results->PPT_OPTION_G,'복층') !== false) echo "checked"; ?>>
                  <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                    <i class="fa" data-check-icon=""></i>
                  </div>
                  복층
                </label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 g-mb-20">
                <h4 class="h3 g-font-weight-600 g-color-black g-mb-10"
                  style="border-bottom:1px solid #333; padding:15px 0;">매물 업종 추천
                  <label class="form-check-inline u-check g-pl-25 g-font-weight-100" style="font-size:15px;">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name='PPT_ALLOW_INDUSTRY[]'
                      id='PPT_ALLOW_INDUSTRY_NONE' value="추천 없음"
                      <?php if(($PPT_IDX && !$results->PPT_ALLOW_INDUSTRY) || !$PPT_IDX) echo "checked"; ?>>
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon=""></i>
                    </div>
                    추천 없음
                  </label>
                </h4>
              </div>
              <script>
              function asdasd() {
                if ($('#PPT_ALLOW_INDUSTRY_NONE').is(":checked")) {
                  console.log("off");
                  $('#PPT_ALLOW_INDUSTRY_NONE').removeAttr("checked");
                } else {
                  console.log("on");
                  $('#PPT_ALLOW_INDUSTRY_NONE').prop("checked", true);
                }
              }
              </script>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0">추천업종</label>
              </div>
              <div class="col-md-10 align-self-center g-mb-5 g-mb-0--md row">
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'한식') !== false) echo "on"; ?>"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL1" value="한식"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'한식') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_01.png" />
                  </div>
                  <p>한식</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'중식') !== false) echo "on"; ?>"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL2" value="중식"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'중식') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_02.png" />
                  </div>
                  <p>중식</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'아시안/양식') !== false) echo "on"; ?>"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL3" value="아시안/양식"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'아시안/양식') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_04.png" />
                  </div>
                  <p>아시안/양식</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'분식') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL4" value="분식"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'분식') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_05.png" />
                  </div>
                  <p>분식</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'패스트푸드') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL5" value="패스트푸드"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'패스트푸드') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_06.png" />
                  </div>
                  <p>패스트푸드</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'치킨') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL6" value="치킨"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'치킨') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_07.png" />
                  </div>
                  <p>치킨</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'카페/디저트') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL7" value="카페/디저트"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'카페/디저트') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_08.png" />
                  </div>
                  <p>카페/디저트</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'주점') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL8" value="주점"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'주점') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_09.png" />
                  </div>
                  <p>주점</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'배달') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL14" value="배달"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'배달') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi1_10.png" />
                  </div>
                  <p>배달</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'이/미용,세탁') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL9" value="이/미용,세탁"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'이/미용,세탁') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi2_01.png" />
                  </div>
                  <p>이/미용,세탁</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'스포츠') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL10" value="스포츠"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'스포츠') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi2_02.png" />
                  </div>
                  <p>스포츠</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'PC방/노래방') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL10" value="PC방/노래방"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'PC방/노래방') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi2_03.png" />
                  </div>
                  <p>PC방/노래방</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'마트/편의점') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL11" value="마트/편의점"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'마트/편의점') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi3_01.png" />
                  </div>
                  <p>마트/편의점</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'휴대폰매장') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL12" value="휴대폰매장"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'휴대폰매장') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi3_03.png" />
                  </div>
                  <p>휴대폰매장</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'화장품매장') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL12" value="화장품매장"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'화장품매장') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi3_04.png" />
                  </div>
                  <p>화장품매장</p>
                </div>
                <div class="wrap_chkbox col-md-2">
                  <div
                    class="chkbox <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'애완/애견/동물') !== false) echo "on"; ?> />"
                    id="check_div">
                    <input type="checkbox" name="PPT_ALLOW_INDUSTRY[]" id="PPT_ALLOW_INDUSTRY_ALL13" value="애완/애견/동물"
                      <?php if($PPT_IDX && strpos($results->PPT_ALLOW_INDUSTRY,'애완/애견/동물') !== false) echo "checked"; ?> />
                    <img src="/img/icon/bi3_05.png" />
                  </div>
                  <p>애완/애견/동물</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 g-mb-20">
                <h4 class="h3 g-font-weight-600 g-color-black g-mb-10"
                  style="border-bottom:1px solid #333; padding:15px 0;">매물 상세내용</h4>
              </div>
            </div>
            <div class="row g-mb-20">
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_TITLE">매물제목 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center g-mb-15">
                <input
                  class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0  g-px-14"
                  name='PPT_TITLE' id='PPT_TITLE' type="text" value="<?php if($PPT_IDX) echo $results->PPT_TITLE;?>"
                  placeholder='매물제목을 입력 해주세요.'>
              </div>
              <div class="col-md-2 align-self-center g-mb-5 g-mb-0--md g-font-weight-600">
                <label class="mb-0" for="PPT_CONTENT">매물상세내용 <sup style='color:#ff0000; font-size:16px;'>*</sup></label>
              </div>
              <div class="col-md-10 align-self-center g-mt-15">
                <textarea class="form-control form-control-md rounded-0 g-px-14" name='PPT_CONTENT' id='PPT_CONTENT'
                  placeholder='매물상세내용을 입력 해주세요.'><?php if($PPT_IDX) echo $results->PPT_CONTENT;?></textarea>
              </div>
            </div>
            <!-- End 1-st column -->
          </div>
          <div class='col-md-12 text-center'>
            <input type="submit" class="btn btn-md u-btn-outline-indigo g-mr-10 g-mb-15" value='SAVE' />
            <a href="property?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
              class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
          </div>
        </div>
    </form>
  </div>
</div>
</div>
</main>
<script>
$(".wrap_chkbox").on("click", function() {
  if ($(this).children(".chkbox").hasClass("on") === true) {
    $(this).children(".chkbox").children("input:checkbox").prop('checked', false);
    $(this).children(".chkbox").removeClass('on');
  } else {
    $(this).children(".chkbox").children("input:checkbox").prop('checked', true);
    $(this).children(".chkbox").addClass('on');
    $("#PPT_ALLOW_INDUSTRY_NONE").prop('checked', false);
  }
  if ($(".chkbox").hasClass("on") === false) {
    $("#PPT_ALLOW_INDUSTRY_NONE").prop('checked', true);
  }
  if ($(".on").length == '0') {
    $("#PPT_ALLOW_INDUSTRY_NONE").prop('checked', true);
  }
});
$("#PPT_ALLOW_INDUSTRY_NONE").on("click", function() {
  if ($(this).is(':checked')) {
    $(".chkbox").children("input:checkbox").prop('checked', false);
    $(".chkbox").removeClass('on');
  }
});
</script>
<script type="text/javascript">
<!--
$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});

$('input[type="checkbox"][name="PPT_PRICE_C_ETC"]').click(function() {
  if ($(this).prop('checked')) {
    $('input[type="checkbox"][name="PPT_PRICE_C_ETC"]').prop('checked', false);
    $(this).prop('checked', true);
  }
});
$("#PPT_SIZE_A").on("keyup", function() {
  var PPT_SIZE_A = $(this).val();
  PPT_SIZE_A = PPT_SIZE_A * 0.3025;
  $("#PPT_SIZE_AA").val(Math.round(PPT_SIZE_A));
});
$("#PPT_SIZE_AA").on("keyup", function() {
  var PPT_SIZE_AA = $(this).val();
  PPT_SIZE_AA = PPT_SIZE_AA * 3.31;
  $("#PPT_SIZE_A").val(Math.round(PPT_SIZE_AA));
});
$("#PPT_SIZE_B").on("keyup", function() {
  var PPT_SIZE_B = $(this).val();
  PPT_SIZE_B = PPT_SIZE_B * 0.3025;
  $("#PPT_SIZE_BB").val(Math.round(PPT_SIZE_B));
});
$("#PPT_SIZE_BB").on("keyup", function() {
  var PPT_SIZE_BB = $(this).val();
  PPT_SIZE_BB = PPT_SIZE_BB * 3.31;
  $("#PPT_SIZE_B").val(Math.round(PPT_SIZE_BB));
});
//
-->
</script>
<script type="text/javascript">
<!--
function submit_ck() {
  if (!$("#PPT_STATE").val()) {
    alert("매물상태를 선택해주세요!");
    $("#PPT_STATE").focus();
    return false;
  } else if ($("input:checkbox[name='PPT_TYPE_A[]']:checked").length == 0) {
    alert("매물구분을 선택해주세요!");
    $("#PPT_TYPE_A1").focus();
    return false;
  } else if (!$("#USER_IDX").val()) {
    alert("중개사/임대업자를 선택해주세요!");
    $("#USER_IDX").focus();
    return false;
  } else if ($("#USER_IDX").val() && !$("#PST_IDX").val()) {
    alert("슬롯을 선택해주세요!");
    $("#USER_IDX").focus();
    return false;
  } else if (!$("#PPT_TYPE_B").val()) {
    alert("공간형태를 선택해주세요!");
    $("#PPT_TYPE_B").focus();
    return false;
  }
  /*else if (!$("#PPT_REGIST_NUMBER").val()) {
      alert("등기번호를 입력해주세요!");
      $("#PPT_REGIST_NUMBER").focus();
      return false;
    }*/
  else if (!$("#PPT_ADDR1_A").val()) {
    alert("주소를 입력해주세요!");
    $("#PPT_ADDR1_A").focus();
    return false;
  } else if (!$("#PPT_ADDR2").val()) {
    alert("상세주소를 입력해주세요!");
    $("#PPT_ADDR2").focus();
    return false;
  } else if ($(".add_img").length == 0) {
    alert("매물사진을 등록해주세요!");
    $(".PPT_IMG").focus();
    return false;
  } else if (!$("#PPT_PRICE_A").val()) {
    alert("보증금을 입력해주세요!");
    $("#PPT_PRICE_A").focus();
    return false;
  } else if (!$("#PPT_PRICE_B").val()) {
    alert("임대료를 입력해주세요!");
    $("#PPT_PRICE_B").focus();
    return false;
  } else if (!$("#PPT_PRICE_C").val()) {
    alert("권리금을 입력해주세요!");
    $("#PPT_PRICE_C").focus();
    return false;
  } else if (!$("#PPT_PRICE_D").val()) {
    alert("관리비를 입력해주세요!");
    $("#PPT_PRICE_D").focus();
    return false;
  } else if (!$("#PPT_STOREYS_A").val() || $("#PPT_STOREYS_A").val() == 0) {
    alert("건물층수를 선택해주세요!");
    $("#PPT_STOREYS_A").focus();
    return false;
  } else if (!$("#PPT_STOREYS_B1").is(':checked') && !$("#PPT_STOREYS_B2").is(':checked')) {
    alert("지상/지하를 선택해주세요!");
    $("#PPT_STOREYS_B1").focus();
    return false;
  } else if (!$("#PPT_STOREYS_C").val() || $("#PPT_STOREYS_C").val() == 0) {
    alert("해당층수를 선택해주세요!");
    $("#PPT_STOREYS_C").focus();
    return false;
  } else if (!$("#PPT_SIZE_A").val() || !$("#PPT_SIZE_AA").val()) {
    alert("연면적을 입력해주세요!");
    $("#PPT_SIZE_A").focus();
    return false;
  } else if (!$("#PPT_SIZE_B").val() || !$("#PPT_SIZE_BB").val()) {
    alert("전용면적을 입력해주세요!");
    $("#PPT_SIZE_B").focus();
    return false;
  } else if (!$("#PPT_TITLE").val()) {
    alert("매물제목을 입력해주세요!");
    $("#PPT_TITLE").focus();
    return false;
  } else if (!$("#PPT_CONTENT").val()) {
    alert("매물내용을 입력해주세요!");
    $("#PPT_CONTENT").focus();
    return false;
  } else {
    return true;
  }
}
//
-->
</script>
<script src='https://spi.maps.daum.net/imap/map_js_init/postcode.v2.js'></script>
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

      document.getElementById('PPT_ADDR1_A').value = fullRoadAddr;
      document.getElementById('PPT_ADDR2').focus();
      addr_data = fullRoadAddr;
      addr_location(addr_data);

      $("#PPT_AREA_A").val(data.sido);
      $("#PPT_AREA_B").val(data.sigungu);
      if (data.sido == '세종특별자치시') {
        $("#PPT_AREA_B").val(data.sido);
      }

      $("#PPT_AREA_C").val(data.bname);
      $("#PPT_AREA_B_CODE").val(data.sigunguCode);
      $("#PPT_AREA_C_CODE").val(data.bcode);
      if (data.hname) {
        $("#PPT_AREA_D").val(data.hname);
      } else {
        $("#PPT_AREA_D").val(data.bname);
      }


      $("#PPT_ADDR1_B").val(expJibunAddr);
      console.log(data);
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
      $("#PPT_LAT").val(addr_lat);
      $("#PPT_LON").val(addr_lng);

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
<script type="text/javascript">
<!--
$("#PPT_DISALLOWED").change(function() {
  $("#PPT_DISALLOWED_INDUSTRY").val("");
  if ($(this).val() == '모든업종 가능') {
    $("#PPT_DISALLOWED_INDUSTRY").attr("readonly", true);
  } else if ($(this).val() == '기피업종') {
    $("#PPT_DISALLOWED_INDUSTRY").attr("readonly", false);
  }
});
//
-->
</script>
<script type="text/javascript">
$("#PPT_CATE").on("change", function() {
  $("input:checkbox[name='PPT_CATE_DETAIL[]']").prop("checked", false);
  if ($(this).val() == '건물자체') {
    $(".PPT_CATE_DETAIL").css("display", "");
    $(".ppt_cate_A").css("display", "");
    $(".ppt_cate_B").css("display", "none");
    $(".ppt_cate_C").css("display", "none");
  } else if ($(this).val() == '1층 상업매물') {
    $(".PPT_CATE_DETAIL").css("display", "");
    $(".ppt_cate_A").css("display", "none");
    $(".ppt_cate_B").css("display", "");
    $(".ppt_cate_C").css("display", "none");
  } else if ($(this).val() == '1층 이외 상업매물') {
    $(".PPT_CATE_DETAIL").css("display", "");
    $(".ppt_cate_A").css("display", "none");
    $(".ppt_cate_B").css("display", "none");
    $(".ppt_cate_C").css("display", "");
  } else {
    $(".PPT_CATE_DETAIL").css("display", "none");
    $(".ppt_cate_A").css("display", "none");
    $(".ppt_cate_B").css("display", "none");
    $(".ppt_cate_C").css("display", "none");
  }
});
</script>

<script>
$("#PPT_TYPE_A1").on("change", function() {
  var type1 = $(this).is(":checked");
  var type2 = $("#PPT_TYPE_A2").is(":checked");
  var type3 = $("#PPT_TYPE_A3").is(":checked");
  if (type1 == true && type2 == true) {
    $("#PPT_TYPE_A3").prop("checked", true);
  } else if (type1 == false || type2 == false) {
    $("#PPT_TYPE_A3").prop("checked", false);
  }
});
$("#PPT_TYPE_A2").on("change", function() {
  var type2 = $(this).is(":checked");
  var type1 = $("#PPT_TYPE_A1").is(":checked");
  var type3 = $("#PPT_TYPE_A3").is(":checked");
  if (type1 == true && type2 == true) {
    $("#PPT_TYPE_A3").prop("checked", true);
  } else if (type1 == false || type2 == false) {
    $("#PPT_TYPE_A3").prop("checked", false);
  }
});
$("#PPT_TYPE_A3").on("change", function() {
  var type3 = $(this).is(":checked");
  if (type3 == true) {
    $("#PPT_TYPE_A1").prop("checked", true);
    $("#PPT_TYPE_A2").prop("checked", true);
  } else {
    $("#PPT_TYPE_A1").prop("checked", false);
    $("#PPT_TYPE_A2").prop("checked", false);
  }
});
</script>
<script>
$("input[name='PPT_TYPE_A[]']:checkbox").change(function() {
  $('#PPT_TYPE_B').children('option').remove();
  var type1 = $("#PPT_TYPE_A1").is(":checked");
  var type2 = $("#PPT_TYPE_A2").is(":checked");
  var type3 = $("#PPT_TYPE_A3").is(":checked");
  if (type1 == true && type2 == true && type3 == true) {
    var html = "<option value=\"\">:: 공간형태 선택 ::</option>";
    html += "<option value=\"근린상가\">근린상가</option>";
    html += "<option value=\"상가주택\">상가주택</option>";
    html += "<option value=\"단지상가\">단지상가</option>";
    html += "<option value=\"주상복합상가\">주상복합상가</option>";
    html += "<option value=\"기타상가\">기타상가</option>";
    html += "<option value=\"빌딩형\">빌딩형</option>";
    html += "<option value=\"주택형\">주택형</option>";
    html += "<option value=\"오피스텔형\">오피스텔형</option>";
    html += "<option value=\"지식산업센터\">지식산업센터</option>";
    html += "<option value=\"기타사무실\">기타사무실</option>";
    $('#PPT_TYPE_B').append(html);
  } else if (type1 == true) {
    var html = "<option value=\"\">:: 공간형태 선택 ::</option>";
    html += "<option value=\"근린상가\">근린상가</option>";
    html += "<option value=\"상가주택\">상가주택</option>";
    html += "<option value=\"단지상가\">단지상가</option>";
    html += "<option value=\"주상복합상가\">주상복합상가</option>";
    html += "<option value=\"기타상가\">기타상가</option>";
    $('#PPT_TYPE_B').append(html);
  } else if (type2 == true) {
    var html = "<option value=\"\">:: 공간형태 선택 ::</option>";
    html += "<option value=\"빌딩형\">빌딩형</option>";
    html += "<option value=\"주택형\">주택형</option>";
    html += "<option value=\"오피스텔형\">오피스텔형</option>";
    html += "<option value=\"지식산업센터\">지식산업센터</option>";
    html += "<option value=\"기타사무실\">기타사무실</option>";
    $('#PPT_TYPE_B').append(html);
  } else {
    var html = "<option value=\"\">:: 공간형태 선택 ::</option>";
    $('#PPT_TYPE_B').append(html);
  }
});
</script>
<script>
$(".PPT_IMG").on("change", handleImgFileSelect);
var add_cnt = 0;

function handleImgFileSelect(e) {
  console.log("event");

  var files = e.target.files;
  var filesArr = Array.prototype.slice.call(files);

  var reg = /(.*?)\/(jpg|jpeg|png|bmp)$/;

  filesArr.forEach(function(f) {
    if (!f.type.match(reg)) {
      alert("확장자는 이미지 확장자만 가능합니다.");
      return;
    }

    sel_file = f;

    var reader = new FileReader();
    reader.onload = function(e) {
      //var img_tag = "<img src='" + e.target.result + "' />";
      var img_tag = "<div class=\"col-md-3 p-0 g-mb-30 g-ml-10 g-mr-10\" id=\"add_img_" + add_cnt + "\">";
      img_tag += "<div class=\"d-flex flex-wrap h-100 g-brd-around g-brd-gray-light-v7 g-rounded-2 g-pa-25\">";
      img_tag += "<header class=\"w-100 align-self-start text-right justify-content-end g-pos-rel g-mb-10\">";
      img_tag += "<div class=\"g-pos-rel g-z-index-2\">";
      img_tag +=
        "<a id=\"dropDown" + add_cnt +
        "Invoker\" class = \"u-link-v5 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-secondary--hover\" href = \"#\" aria-controls=\"dropDown" +
        add_cnt +
        "\" aria-haspopup=\"true\" aria-expanded=\"false\" data-dropdown-event = \"click\" data-dropdown-target=\"#dropDown" +
        add_cnt +
        "\"  data-dropdown-type = \"jquery-slide\"><i class=\"hs-admin-more-alt\"></i></a>";
      img_tag +=
        "<div id=\"dropDown" + add_cnt +
        "\" class=\"u-shadow-v31 g-pos-abs g-right-0 g-bg-white u-dropdown--jquery-slide u-dropdown--hidden\" aria-labelledby = \"dropDown" +
        add_cnt + "Invoker\" style=\"right: 0px; display: none;\">";
      img_tag += "<ul class=\"list-unstyled g-nowrap mb-0\">";
      img_tag += "<li>";
      img_tag +=
        "<a class=\"d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14\" href = \"javascript:repres('" +
        add_cnt + "');\">";
      img_tag += "<i class=\"hs-admin-cloud-up g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md\"></i>";
      img_tag += "대표 선택";
      img_tag += "</a>";
      img_tag += "</li>";
      img_tag += "<li>";
      img_tag +=
        "<a class=\"d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-font-size-12 g-font-size-default--md g-color-gray-dark-v6 g-px-25 g-py-14\" href=\"javascript:addImgDel('" +
        add_cnt + "');\">";
      img_tag += "<i class=\"hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-10 g-mr-15--md\"></i>";
      img_tag += "삭제";
      img_tag += "</a>";
      img_tag += "</li>";
      img_tag += "</ul>";
      img_tag += "</div>";
      img_tag += "</div>";
      img_tag += "</header>";
      img_tag += "<section class=\"w-100 align-self-center text-center g-color-darkblue-v2 g-mb-30\">";
      img_tag += "<img class=\"img-fluid g-rounded-2 add_img\" src='" + e.target.result +
        "' alt=\"Image description\">";
      img_tag += "</section>";
      img_tag +=
        "<div class='repres' >대표</div>";
      img_tag += "</div>";
      img_tag += "</div>";
      $("#add_img").append(img_tag);
      $("#file_div" + add_cnt).css("display", "none");
      var file_input = "";
      add_cnt++;
      file_input += "<div class=\"input-group u-file-attach-v1 g-brd-gray-light-v2\" id=\"file_div" + add_cnt +
        "\">";
      file_input +=
        "<input class=\"form-control form-control-md rounded-0\" placeholder=\"매물사진을 선택해주세요.\" readonly=\"\" type = \"text\">";
      file_input += "<div class=\"input-group-btn\">";
      file_input += "<button class=\"btn btn-md h-100 u-btn-primary rounded-0\" type=\"submit\">첨부</button>";
      file_input += "<input type=\"file\" name='PPT_IMG[]' id='PPT_IMG" + add_cnt + "' class='PPT_IMG'>";
      file_input += "<input type=\"hidden\" name=\"PPT_REPRES[]\" id=\"PPT_REPRES" + add_cnt + "\">";
      file_input += "</div>";
      file_input += "</div>";
      $("#add_img_div").append(file_input);
      $.HSCore.helpers.HSFileAttachments.init();
      $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
      $.HSCore.helpers.HSFocusState.init();
      $(".PPT_IMG").on("change", handleImgFileSelect);
    }
    reader.readAsDataURL(f);
  });
}

function addImgDel(key) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    $("#add_img_" + key).remove();
    $("#file_div" + key).css("display", "none");
    $("#PPT_IMG" + key).attr("disabled", true); //설정
  }
}

function repres(key) {
  $(".repres").css("display", "none");
  //console.log($("#add_img_" + key).children("div").children(".repres").attr("class"));
  $("#add_img_" + key).children("div").children(".repres").css("display", "block");
  $("#dropDown" + key + "Invoker").trigger("click");
  $("input[name='PIT_UP_REPRES[]']").val("");
  $("input[name='PPT_REPRES[]']").val("");
  $("#PPT_REPRES" + key).val("Y");

}
</script>
<script>
$("#PPT_STATE").on("change", function() {
  if ($(this).val() == 'C' || $(this).val() == 'D') {
    $("#PPT_STATE_TXT").css("display", "");
  } else {
    $("#PPT_STATE_TXT").css("display", "none");
    $("#PPT_STATE_TXT").val("");
  }
});
</script>
<script>
function up_repres(key) {
  $(".repres").css("display", "");
  $("#PIT_DIV" + key).children("div").children(".repres").css("display", "block");
  $("#upload" + key + "Invoker").trigger("click");
  $("input[name='PIT_UP_REPRES[]']").val("");
  $("input[name='PIT_REPRES[]']").val("");
  $("#PIT_UP_REPRES" + key).val("Y");
}

function up_del(key) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    $("#PIT_DEL" + key).val(key);
    $("#PIT_DIV" + key).css("display", "none");
  }
}
$("#USER_IDX").change(function() {
  var type = $('#USER_IDX option:selected').attr('data');
  var key = $(this).val();
  $("#PPT_USER_TYPE").val(type);
  //slotDiv
  $.ajax({
    type: 'post',
    url: "/admin/propSlot",
    data: {
      type: type,
      key: key
    },
    success: function(data, status, xhr) {
      var data = JSON.parse(data);
      console.log(data);
      $("#slotDiv").empty();
      var html = "";
      if (data.length > 0) {
        html +=
          "<select class=\"form-control form-control-md rounded-0\" id=\"PST_IDX\" name=\"PST_IDX\" style=\"height:50px;\">";
        html += "<option value=''>:: 슬롯 선택 ::</option>";
        for (var i = 0; i < data.length; i++) {

          html += "<option value=\"" + data[i].PST_IDX + "\">" + formatDate(data[i].PST_START) + " ~ " +
            formatDate(data[i].PST_END) +
            "</option>";

        }
        html += "</select>";
        $("#slotDiv").append(html);
      } else {
        html +=
          "<select class=\"form-control form-control-md rounded-0\" id=\"PST_IDX\" name=\"PST_IDX\" style=\"height:50px;\">";
        html += "<option value=''>:: 선택 할 슬롯이 없습니다 ::</option>";
        html += "</select>";
        $("#slotDiv").append(html);
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log("error - " + jqXHR.responseText);
    }
  });
});

function formatDate(date) {

  var d = new Date(date),

    month = '' + (d.getMonth() + 1),
    day = '' + d.getDate(),
    year = d.getFullYear();

  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;

  return [year, month, day].join('-');

}
</script>