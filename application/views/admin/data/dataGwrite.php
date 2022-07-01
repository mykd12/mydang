        <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
          <!-- Breadcrumb-v1 -->
          <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20">
            <ul class="u-list-inline g-color-gray-dark-v6 add-location">

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">HOME</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item g-mr-10">
                <a class="u-link-v5 g-color-gray-dark-v6 g-color-lightblue-v3--hover g-valign-middle" href="#!">분석데이터
                  관리</a>
                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
              </li>

              <li class="list-inline-item">
                <span class="g-valign-middle">상가정보</span>
              </li>
            </ul>
          </div>
          <!-- End Breadcrumb-v1 -->


          <div class="g-pa-20" id="CTs-write">
            <div class="media">
              <div class="d-flex align-self-center">
                <h1 class="g-font-weight-300 g-font-size-25 g-color-black mb-0 page-big-title">상가정보</h1>
              </div>
            </div>
            <hr class="d-flex g-brd-gray-light-v7 g-my-30">
            <form id='frm' name='frm' action="../inc/adminDAO.php" method="post" onsubmit="return submit_ck();">
              <input type='hidden' id='DSTT_IDX' name='DSTT_IDX' value='<?php echo $DGT_IDX;?>' />
              <input type='hidden' id='pageNo' name='pageNo' value='<?php echo $pageNo;?>' />
              <input type='hidden' id='search' name='search' value='<?php echo $search;?>' />
              <div class="row">
                <!-- 1-st column -->
                <div class="col-md-12 ">
                  <!-- Basic Text Inputs -->
                  <div class="g-brd-around g-brd-gray-light-v7 g-pa-15 g-pa-20--md g-mb-30 add-write-page">

                    <!-- 제목 Input -->
                    <div class="row">
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상가업소번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_IDX' id='DGT_IDX' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_IDX) echo $results->DGT_IDX;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-6">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상가명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_BIZESNM' id='DGT_BIZESNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_BIZESNM) echo $results->DGT_BIZESNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지점명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_BRCHNM' id='DGT_BRCHNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_BRCHNM) echo $results->DGT_BRCHNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업종 대분류 코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_INDSLCLSCD' id='DGT_INDSLCLSCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_INDSLCLSCD) echo $results->DGT_INDSLCLSCD;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업종 대분류 명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_INDSLCLSNM' id='DGT_INDSLCLSNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_INDSLCLSNM) echo $results->DGT_INDSLCLSNM;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업종 중분류 코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_INDSMCLSCD' id='DGT_INDSMCLSCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_INDSMCLSCD) echo $results->DGT_INDSMCLSCD;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업종 중분류 명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_INDSMCLSNM' id='DGT_INDSMCLSNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_INDSMCLSNM) echo $results->DGT_INDSMCLSNM;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업종 소분류 코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_INDSSCLSCD' id='DGT_INDSSCLSCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_INDSSCLSCD) echo $results->DGT_INDSSCLSCD;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-2">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">업종 소분류 명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_INDSSCLSNM' id='DGT_INDSSCLSNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_INDSSCLSNM) echo $results->DGT_INDSSCLSNM;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상가 표준 산업분류코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_KSICCD' id='DGT_KSICCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_KSICCD) echo $results->DGT_KSICCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">상가 표준 산업분류명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_KSICNM' id='DGT_KSICNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_KSICNM) echo $results->DGT_KSICNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시도코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_CTPRVNCD' id='DGT_CTPRVNCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_CTPRVNCD) echo $results->DGT_CTPRVNCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시도명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_CTPRVNNM' id='DGT_CTPRVNNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_CTPRVNNM) echo $results->DGT_CTPRVNNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시군구코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_SIGNGUCD' id='DGT_SIGNGUCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_SIGNGUCD) echo $results->DGT_SIGNGUCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">시군구명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_SIGNGUNM' id='DGT_SIGNGUNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_SIGNGUNM) echo $results->DGT_SIGNGUNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">행정동코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_ADONGCD' id='DGT_ADONGCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_ADONGCD) echo $results->DGT_ADONGCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">행정동명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_ADONGNM' id='DGT_ADONGNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_ADONGNM) echo $results->DGT_ADONGNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">법정동코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LDONGCD' id='DGT_LDONGCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LDONGCD) echo $results->DGT_LDONGCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">법정동명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LDONGNM' id='DGT_LDONGNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LDONGNM) echo $results->DGT_LDONGNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">PNU코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LNOCD' id='DGT_LNOCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LNOCD) echo $results->DGT_LNOCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대지구분코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_PLOTSCTCD' id='DGT_PLOTSCTCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_PLOTSCTCD) echo $results->DGT_PLOTSCTCD;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">대지구분명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_PLOTSCTNM' id='DGT_PLOTSCTNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_PLOTSCTNM) echo $results->DGT_PLOTSCTNM;?>"
                          readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지번본번지</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LNOMNNO' id='DGT_LNOMNNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LNOMNNO) echo $results->DGT_LNOMNNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지번부번지</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LNOSLNO' id='DGT_LNOSLNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LNOSLNO) echo $results->DGT_LNOSLNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">지번주소</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LNOADR' id='DGT_LNOADR' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LNOADR) echo $results->DGT_LNOADR;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">도로명 코드</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_RDNMCD' id='DGT_RDNMCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_RDNMCD) echo $results->DGT_RDNMCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">도로명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_RDNM' id='DGT_RDNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_RDNM) echo $results->DGT_RDNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">건물본번지</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_BLDMNNO' id='DGT_BLDMNNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_BLDMNNO) echo $results->DGT_BLDMNNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">건물부번지</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_BLDSLNO' id='DGT_BLDSLNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_BLDSLNO) echo $results->DGT_BLDSLNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">건물관리번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_BLDMNGNO' id='DGT_BLDMNGNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_BLDMNGNO) echo $results->DGT_BLDMNGNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">건물명</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_BLDNM' id='DGT_BLDNM' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_BLDNM) echo $results->DGT_BLDNM;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">도로면주소</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_RDNMADR' id='DGT_RDNMADR' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_RDNMADR) echo $results->DGT_RDNMADR;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">구우편번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_OLDZIPCD' id='DGT_OLDZIPCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_OLDZIPCD) echo $results->DGT_OLDZIPCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">신우편번호</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_NEWZIPCD' id='DGT_NEWZIPCD' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_NEWZIPCD) echo $results->DGT_NEWZIPCD;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">동정보</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_DONGNO' id='DGT_DONGNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_DONGNO) echo $results->DGT_DONGNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">층정보</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_FLRNO' id='DGT_FLRNO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_FLRNO) echo $results->DGT_FLRNO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">호정보</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_HONO' id='DGT_HONO' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_HONO) echo $results->DGT_HONO;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">경도</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LON' id='DGT_LON' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LON) echo $results->DGT_LON;?>" readonly>
                      </div>
                      <div class="form-group g-mb-20 col-md-4">
                        <h4 class="h6 g-font-weight-600 g-color-black g-mb-10">위도</h4>
                        <input
                          class="form-control form-control-md g-brd-gray-light-v7 g-brd-gray-light-v3--focus rounded-0 g-px-14"
                          name='DGT_LAT' id='DGT_LAT' type="text"
                          value="<?php if($DGT_IDX && $results->DGT_LAT) echo $results->DGT_LAT;?>" readonly>
                      </div>
                    </div>
                    <!-- End 제목 Input -->

                  </div>
                  <!-- End 1-st column -->
                  <div class='col-md-12 text-center'>
                    <a href="dataG?pageNo=<?php echo $pageNo;?>&search=<?php echo $search;?>"
                      class="btn btn-md u-btn-outline-bluegray g-mb-15">LIST</a>
                  </div>
                </div>
            </form>
          </div>
        </div>
        </div>
        </main>