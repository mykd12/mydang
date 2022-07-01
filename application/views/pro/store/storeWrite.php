<main id="container" class="sub prpRgstr partnerSub">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="/icon/pro/join04.png" alt="파트너 아이콘">
      </div>
      <h1>매물등록</h1>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="form_wrap">
          <form id="pymnt_form" method="post" action="/DAO/porpdWirte" onsubmit="return submit_ck();"
            enctype="multipart/form-data">
            <input type='hidden' id='key' name='key' value='<?php if($key) echo $key;?>' />
            <input type='hidden' id='psKey' name='psKey' value='<?php if($psKey) echo $psKey;?>' />
            <input type='hidden' id='pLat' name='pLat' value='<?php if($key && $results) echo $results->PPT_LAT;?>' />
            <input type='hidden' id='pLon' name='pLon' value='<?php if($key && $results) echo $results->PPT_LON;?>' />
            <input type='hidden' id='pAddr1B' name='pAddr1B'
              value='<?php if($key && $results) echo $results->PPT_ADDR1_B;?>' />
            <input type='hidden' id='pAreaA' name='pAreaA'
              value='<?php if($key && $results) echo $results->PPT_AREA_A;?>' />
            <input type='hidden' id='pAreaB' name='pAreaB'
              value='<?php if($key && $results) echo $results->PPT_AREA_B;?>' />
            <input type='hidden' id='pAreaC' name='pAreaC'
              value='<?php if($key && $results) echo $results->PPT_AREA_C;?>' />
            <input type='hidden' id='pAreaD' name='pAreaD'
              value='<?php if($key && $results) echo $results->PPT_AREA_D;?>' />
            <input type='hidden' id='pAreaAcode' name='pAreaAcode'
              value='<?php if($key && $results) echo $results->PPT_AREA_A_CODE;?>' />
            <input type='hidden' id='pAreaBcode' name='pAreaBcode'
              value='<?php if($key && $results) echo $results->PPT_AREA_B_CODE;?>' />
            <input type='hidden' id='pAreaCcode' name='pAreaCcode'
              value='<?php if($key && $results) echo $results->PPT_AREA_C_CODE;?>' />
            <input type='hidden' id='pState' name='pState'
              value='<?php if($key && $results) echo $results->PPT_STATE;?>' />
            <input type='hidden' id='pStart' name='pStart' value='<?php if($slot) echo $slot->PST_START;?>' />
            <input type='hidden' id='pEnd' name='pEnd' value='<?php if($slot) echo $slot->PST_END;?>' />
            <section class="section srttn-wrap">
              <div class="top-checkbox clearfix">
                <div class="form-checkbox">
                  <input type="checkbox" id="store" class="check_box" name="pTypeA[]" value="상가"
                    <?php if(($results && strpos($results->PPT_TYPE_A, '상가') !== false) || !$results){ echo "checked";}?>
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                  <label for="store">상가등록</label>
                </div>
                <div class="form-checkbox">
                  <input type="checkbox" id="office" class="check_box" name="pTypeA[]" value="사무실"
                    <?php if($results && strpos($results->PPT_TYPE_A, '사무실') !== false){ echo "checked";}?>
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                  <label for="office">사무실등록</label>
                </div>
              </div>
              <div class="all-checkbox">
                <input type="checkbox" id="all-check" class="check_box" name="pTypeA_all" value="상가|사무실"
                  <?php if($results && strpos($results->PPT_TYPE_A, '상가|사무실') !== false){ echo "checked";}?>
                  <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                <label for="all-check">상가/사무실 동시등록</label>
                <span class="text-de">상가와 사무실 모두 사용 가능하다면 동시등록 해보세요.</span>
              </div>
            </section>
            <section class="section clearfix">
              <h3>매물 정보</h3>
              <div class="form-group select-wrap">
                <h4>공간 형태</h4>
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="pTypeB" name="pTypeB"
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <?php if($results && $results->PPT_TYPE_A=='상가'){?>
                    <option value="근린상가" <?php if($results && $results->PPT_TYPE_B=='근린상가'){ echo "selected" ;}?>>근린상가
                    </option>
                    <option value="상가주택" <?php if($results && $results->PPT_TYPE_B=='상가주택'){ echo "selected" ;}?>>상가주택
                    </option>
                    <option value="단지상가" <?php if($results && $results->PPT_TYPE_B=='단지상가'){ echo "selected" ;}?>>단지상가
                    </option>
                    <option value="주상복합상가" <?php if($results && $results->PPT_TYPE_B=='주상복합상가'){ echo "selected" ;}?>>
                      주상복합상가</option>
                    <option value="기타상가" <?php if($results && $results->PPT_TYPE_B=='기타상가'){ echo "selected" ;}?>>기타상가
                    </option>
                    <?php }else if($results && $results->PPT_TYPE_A=='사무실'){?>
                    <option value="빌딩형" <?php if($results && $results->PPT_TYPE_B=='빌딩형'){ echo "selected" ;}?>>빌딩형
                    </option>
                    <option value="주택형" <?php if($results && $results->PPT_TYPE_B=='주택형'){ echo "selected" ;}?>>주택형
                    </option>
                    <option value="오피스텔형" <?php if($results && $results->PPT_TYPE_B=='오피스텔형'){ echo "selected" ;}?>>
                      오피스텔형
                    </option>
                    <option value="지식산업센터" <?php if($results && $results->PPT_TYPE_B=='지식산업센터'){ echo "selected" ;}?>>
                      지식산업센터</option>
                    <option value="기타사무실" <?php if($results && $results->PPT_TYPE_B=='기타사무실'){ echo "selected" ;}?>>
                      기타사무실
                    </option>
                    <?php }else if($results){?>
                    <option value="근린상가" <?php if($results && $results->PPT_TYPE_B=='근린상가'){ echo "selected" ;}?>>근린상가
                    </option>
                    <option value="상가주택" <?php if($results && $results->PPT_TYPE_B=='상가주택'){ echo "selected" ;}?>>상가주택
                    </option>
                    <option value="단지상가" <?php if($results && $results->PPT_TYPE_B=='단지상가'){ echo "selected" ;}?>>단지상가
                    </option>
                    <option value="주상복합상가" <?php if($results && $results->PPT_TYPE_B=='주상복합상가'){ echo "selected" ;}?>>
                      주상복합상가</option>
                    <option value="기타상가" <?php if($results && $results->PPT_TYPE_B=='기타상가'){ echo "selected" ;}?>>기타상가
                    </option>
                    <option value="빌딩형" <?php if($results && $results->PPT_TYPE_B=='빌딩형'){ echo "selected" ;}?>>빌딩형
                    </option>
                    <option value="주택형" <?php if($results && $results->PPT_TYPE_B=='주택형'){ echo "selected" ;}?>>주택형
                    </option>
                    <option value="오피스텔형" <?php if($results && $results->PPT_TYPE_B=='오피스텔형'){ echo "selected" ;}?>>
                      오피스텔형
                    </option>
                    <option value="지식산업센터" <?php if($results && $results->PPT_TYPE_B=='지식산업센터'){ echo "selected" ;}?>>
                      지식산업센터</option>
                    <option value="기타사무실" <?php if($results && $results->PPT_TYPE_B=='기타사무실'){ echo "selected" ;}?>>
                      기타사무실
                    </option>
                    <?php }else if(!$results){?>
                    <option value="근린상가" selected>근린상가</option>
                    <option value="상가주택">상가주택</option>
                    <option value="단지상가">단지상가</option>
                    <option value="주상복합상가">주상복합상가</option>
                    <option value="기타상가">기타상가</option>
                    <?php }?>
                  </select>
                </div>
              </div>
              <div class="form-group int_box">
                <h4>등기번호</h4>
                <input type="text" id="pRegist" name="pRegist" placeholder="등기번호를 입력해주세요." class="int" maxlength="41"
                  autocomplete="off" value="<?php if($results){ echo decrypt($results->PPT_REGIST_NUMBER);}?>"
                  <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                <p class="text-de">등기번호를 등록하면 특별한 혜택이 준비되어 있습니다.</p>
              </div>
              <div class="form-group add_box01 int_box">
                <h4 classid="h4_add01">주소</h4>
                <input type="text" id="pAddr1" name="pAddr1" placeholder="주소를 입력해주세요." class="int" maxlength="41"
                  value="<?php if($results){ echo decrypt($results->PPT_ADDR1_A);}?>" autocomplete="off" readonly
                  onclick="execDaumPostcode();"
                  <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                <a href="<?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "javascript:void(0)";}else{ echo "javascript:execDaumPostcode();";}?>"
                  class="btn_addSearch">주소찾기</a>
              </div>
              <div class="form-group add_box02 int_box">
                <h4 classid="h4_add02">상세주소</h4>
                <input type="text" id="pAddr2" name="pAddr2" placeholder="상세주소를 입력해주세요." class="int" maxlength="41"
                  value="<?php if($results){ echo decrypt($results->PPT_ADDR2);}?>" autocomplete="off"
                  <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                <div class="checkbox-de">
                  <input class="int-adrExp" type="checkbox" name="pExposure" id="pExposure"
                    <?php if($results && $results->PPT_EXPOSURE=='y') echo "checked";?> value="y"
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                  <label class="lb-adrExp" for="pExposure">
                    상세주소 노출
                  </label>
                  <span>위치 정보를 공개하고, 내 매물의 관심도를
                    높여보세요.</span>
                </div>
              </div>
              <div class="form-group filebox int_box">
                <h4>매물사진</h4>
                <div id="add_img_div">
                  <div id="file_div0">
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ }else{?>
                    <label for="pImg0">첨부</label>
                    <?php }?>
                    <input class="upload-name02" placeholder="대표사진을 첨부해 주세요." readonly
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?> />
                    <input type="file" id="pImg0" name="pImg[]" class="file pImg"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <input type="hidden" name="pRepres[]" id="pRepres0" value="<?php if($results) echo "Y";?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                  </div>
                </div>
                <div class="photoSlider-wrap"
                  style="<?php if($results && $resultsImg > 0){?><?php }else{?>display:none;<?php }?>">
                  <div class="swiper photoSlider">
                    <div class="swiper-wrapper">
                      <?php if($results && $resultsImg > 0){?>
                      <?php foreach($resultsImg as $data){?>
                      <input type="hidden" name="PIT_IDX[]" id="PIT_IDX<?php echo $data->PIT_IDX;?>"
                        value="<?php echo $data->PIT_IDX;?>" />
                      <input type="hidden" name="PIT_DEL[]" id="PIT_DEL<?php echo $data->PIT_IDX;?>" value="" />
                      <input type="hidden" name="PIT_UP_REPRES[]" id="PIT_UP_REPRES<?php echo $data->PIT_IDX;?>"
                        value="<?php echo $data->PIT_REPRES;?>" />
                      <div class="swiper-slide" id="pitDiv<?php echo $data->PIT_IDX;?>">
                        <!--<span class="on">대표사진</span>-->
                        <div class="img-wrap">
                          <img src="/uploads/<?php echo $data->PIT_IMG_SAVE;?>" alt="매물사진" class="add_img">
                        </div>
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ }else{?>
                        <button type="button" onclick="up_del('<?php echo $data->PIT_IDX;?>')"><i
                            class="xi-close-thin"></i> <span class="blind">닫기</span></button>
                        <?}?>
                      </div>
                      <?php }?>
                      <?php }?>
                      <!--<div class="swiper-slide">
                        <span>대표사진</span>
                        <div class="img-wrap">
                          <img src="img/m01.png" alt="매물사진">
                        </div>
                        <button type="button"><i class="xi-close-thin"></i> <span class="blind">닫기</span></button>
                      </div>
                      <div class="swiper-slide">
                        <span>대표사진</span>
                        <div class="img-wrap">
                          <img src="img/m01.png" alt="매물사진">
                        </div>
                        <button type="button"><i class="xi-close-thin"></i> <span class="blind">닫기</span></button>
                      </div>
                      <div class="swiper-slide">
                        <span>대표사진</span>
                        <div class="img-wrap">
                          <img src="img/m01.png" alt="매물사진">
                        </div>
                        <button type="button"><i class="xi-close-thin"></i> <span class="blind">닫기</span></button>
                      </div>
                      <div class="swiper-slide">
                        <span>대표사진</span>
                        <div class="img-wrap">
                          <img src="img/m01.png" alt="매물사진">
                        </div>
                        <button type="button"><i class="xi-close-thin"></i> <span class="blind">닫기</span></button>
                      </div>
                      <div class="swiper-slide">
                        <span>대표사진</span>
                        <div class="img-wrap">
                          <img src="img/m01.png" alt="매물사진">
                        </div>
                        <button type="button"><i class="xi-close-thin"></i> <span class="blind">닫기</span></button>
                      </div>-->
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section class="section clearfix">
              <h3>매물 계약 정보</h3>
              <div class="form-group int_box left">
                <h4>보증금</h4>
                <input type="text" id="pPriceA" name="pPriceA" placeholder="보증금" class="int" maxlength="41"
                  autocomplete="off" numberOnly value="<?php if($results){ echo $results->PPT_PRICE_A;}?>"
                  <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                <span class="text-unit">만원</span>
              </div>
              <div class="form-group int_box right">
                <h4>임대료</h4>
                <input type="text" id="pPriceB" name="pPriceB" placeholder="임대료" class="int" maxlength="41"
                  autocomplete="off" numberOnly value="<?php if($results){ echo $results->PPT_PRICE_B;}?>"
                  <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                <span class="text-unit">만원</span>
              </div>
              <div class="form-group int_box prmm">
                <h4>권리금</h4>
                <div class="int-wrap">
                  <div class="left-box">
                    <input type="text" id="pPriceC" name="pPriceC" placeholder="권리금" class="int" maxlength="41"
                      autocomplete="off" numberOnly value="<?php if($results){ echo $results->PPT_PRICE_C;}?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <span class="text-unit">만원</span>
                  </div>
                  <div class="right-box">
                    <div class="form_checkbox">
                      <input type="checkbox" id="pPriceCEtc1" class="check_box" name="pPriceCEtc" value="권리금 없음"
                        <?php if($results && $results->PPT_PRICE_C_ETC=='권리금 없음'){ echo "checked";}?>
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                      <label for="pPriceCEtc1">권리금 없음</label>
                    </div>
                    <div class="form_checkbox">
                      <input type="checkbox" id="pPriceCEtc2" class="check_box" name="pPriceCEtc" value="협의가능"
                        <?php if($results && $results->PPT_PRICE_C_ETC=='협의가능'){ echo "checked";}?>
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                      <label for="pPriceCEtc2">협의가능</label>
                    </div>
                    <div class="form_checkbox">
                      <input type="checkbox" id="pPriceCEtc3" class="check_box" name="pPriceCEtc" value="비공개"
                        <?php if($results && $results->PPT_PRICE_C_ETC=='비공개'){ echo "checked";}?>
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                      <label for="pPriceCEtc3">비공개</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group int_box admnsCost">
                <h4>관리비</h4>
                <div class="int-wrap">
                  <div class="left-box">
                    <input type="text" id="pPriceD" name="pPriceD" placeholder="관리비" class="int" maxlength="41"
                      autocomplete="off" numberOnly value="<?php if($results){ echo $results->PPT_PRICE_D;}?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <span class="text-unit">만원</span>
                  </div>
                  <div class="right-box">
                    <div class="form_checkbox">
                      <input type="checkbox" id="pPriceDEtc" class="check_box" name="pPriceDEtc" value="관리비 없음"
                        <?php if($results && $results->PPT_PRICE_D_ETC=='관리비 없음'){ echo "checked";}?>
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                      <label for="pPriceDEtc">관리비없음</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group int_box floor">
                <h4>층수</h4>
                <div class="int-wrap">
                  <div class="left-box">
                    <label>건물층수</label>
                    <div class="num-wrap">
                      <button type="button" class="down01 left"
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>><i
                          class="xi-minus-thin"></i><span class="blind">마이너스</span></button>
                      <input class="" type="text" name="pStoreysA" id="intnum01"
                        value="<?php if($results){ echo $results->PPT_STOREYS_A;}else{ echo "1";}?>" numberonly=""
                        readonly=""
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                      <button type="button" class="up01 right"
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>><i
                          class="xi-plus-thin"></i><span class="blind">플러스</span></button>
                    </div>
                  </div>
                  <div class="right-box">
                    <label>해당층수</label>
                    <div class="ck-wrap">
                      <div class="form_checkbox">
                        <input type="radio" id="pStoreysBA" class="check_box" name="pStoreysB" value="A"
                          <?php if(($results && $results->PPT_STOREYS_B=='A') || !$results){ echo "checked";}?>
                          <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                        <label for="pStoreysBA">지상</label>
                      </div>
                      <div class="form_checkbox">
                        <input type="radio" id="pStoreysBB" class="check_box" name="pStoreysB" value="B"
                          <?php if($results && $results->PPT_STOREYS_B=='B'){ echo "checked";}?>
                          <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                        <label for="pStoreysBB">지하</label>
                      </div>
                    </div>
                    <div class="num-wrap">
                      <button type="button" class="down02 left"
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>><i
                          class="xi-minus-thin"></i><span class="blind">마이너스</span></button>
                      <input class="" type="text" name="pStoreysC" id="intnum02"
                        value="<?php if($results){ echo $results->PPT_STOREYS_C;}else{ echo "1";}?>" numberonly=""
                        readonly=""
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                      <button type="button" class="up02 right"
                        <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>><i
                          class="xi-plus-thin"></i><span class="blind">플러스</span></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group int_box area">
                <h4>면적</h4>
                <div class="int-wrap int-wrap01">
                  <div class="left-box">
                    <input type="text" id="pSizeA" name="pSizeA" placeholder="연면적" class="int" maxlength="41"
                      autocomplete="off" numberOnly value="<?php if($results){ echo $results->PPT_SIZE_A;}?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <span class="text-unit">m²</span>
                  </div>
                  <span class=""><i class="xi-renew"></i></span>
                  <div class="right-box">
                    <input type="text" id="pSizeAA" name="pSizeAA" placeholder="연면적" class="int" maxlength="41"
                      autocomplete="off" numberOnly
                      value="<?php if($results){ echo ceil($results->PPT_SIZE_A* 0.3025);}?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <span class="text-unit">평</span>
                  </div>
                </div>
                <div class="int-wrap int-wrap02">
                  <div class="left-box">
                    <input type="text" id="pSizeB" name="pSizeB" placeholder="전용면적" class="int" maxlength="41"
                      autocomplete="off" numberOnly value="<?php if($results){ echo $results->PPT_SIZE_B;}?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <span class="text-unit">m²</span>
                  </div>
                  <span class=""><i class="xi-renew"></i></span>
                  <div class="right-box">
                    <input type="text" id="pSizeBB" name="pSizeBB" placeholder="전용면적" class="int" maxlength="41"
                      autocomplete="off" numberOnly
                      value="<?php if($results){ echo ceil($results->PPT_SIZE_B* 0.3025);}?>"
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <span class="text-unit">평</span>
                  </div>
                </div>
              </div>
            </section>
            <section class="section clearfix addlInfo">
              <h3>매물 추가 정보</h3>
              <div class="form-group left entry">
                <h4>입점여부</h4>
                <div class="ck-wrap">
                  <div class="form_checkbox">
                    <input type="radio" id="pOptionA1" class="check_box" name="pOptionA" value="즉시입주"
                      <?php if(($results && $results->PPT_OPTION_A=='즉시입주') || !$results){ echo "checked";}?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionA1">즉시입주</label>
                  </div>
                  <div class="form_checkbox">
                    <input type="radio" id="pOptionA2" class="check_box" name="pOptionA" value="협의가능"
                      <?php if($results && $results->PPT_OPTION_A=='협의가능'){ echo "checked";}?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionA2">협의가능</label>
                  </div>
                </div>
              </div>
              <div class="form-group right">
                <h4>주차</h4>
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="pOptionB" name="pOptionB"
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <option value="0" <?php if($results && $results->PPT_OPTION_B=='0') echo "selected"; ?>>주차없음
                    </option>
                    <option value="1" <?php if($results && $results->PPT_OPTION_B=='1') echo "selected"; ?>>1대</option>
                    <option value="2" <?php if($results && $results->PPT_OPTION_B=='2') echo "selected"; ?>>2대</option>
                    <option value="3" <?php if($results && $results->PPT_OPTION_B=='3') echo "selected"; ?>>3대</option>
                    <option value="4" <?php if($results && $results->PPT_OPTION_B=='4') echo "selected"; ?>>4대</option>
                    <option value="5" <?php if($results && $results->PPT_OPTION_B=='5') echo "selected"; ?>>5대</option>
                    <option value="6" <?php if($results && $results->PPT_OPTION_B=='6') echo "selected"; ?>>6대</option>
                    <option value="7" <?php if($results && $results->PPT_OPTION_B=='7') echo "selected"; ?>>7대</option>
                    <option value="8" <?php if($results && $results->PPT_OPTION_B=='8') echo "selected"; ?>>8대</option>
                    <option value="9" <?php if($results && $results->PPT_OPTION_B=='9') echo "selected"; ?>>9대</option>
                    <option value="10" <?php if($results && $results->PPT_OPTION_B=='10') echo "selected"; ?>>10대 이상
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group left">
                <h4>냉/난방</h4>
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="pOptionC" name="pOptionC"
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <option value="">:: 냉방/난방 선택 ::</option>
                    <option value="개별냉/난방" <?php if($results && $results->PPT_OPTION_C=='개별냉/난방') echo "selected"; ?>>
                      개별냉/난방</option>
                    <option value="공용냉/난방" <?php if($results && $results->PPT_OPTION_C=='공용냉/난방') echo "selected"; ?>>
                      공용냉/난방</option>
                  </select>
                </div>
              </div>
              <div class="form-group right">
                <h4>화장실</h4>
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="pOptionD" name="pOptionD"
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <option value="내부" <?php if($results && $results->PPT_OPTION_D=='내부') echo "selected"; ?>>내부
                    </option>
                    <option value="외부" <?php if($results && $results->PPT_OPTION_D=='외부') echo "selected"; ?>>외부
                    </option>
                  </select>
                </div>
              </div>
              <div class="form-group left cmplYear">
                <h4>준공년도</h4>
                <div class="int_box">
                  <input class="Datepicker" type="text" name="pOptionE" id="pOptionE"
                    value=" <?php if($results) echo $results->PPT_OPTION_E; ?>"
                    <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                </div>
                <div class="icon-wrap"><img src="/icon/pro/calendar.png" alt="달력아이콘"></div>
              </div>
              <!--<div class="form-group right">
                <h4>기피업종</h4>
                <div class="int_box">
                  <input class="" type="text" value="" placeholder='기피업종을 입력해주세요.'>
                </div>
              </div>-->
              <div class="form-group chrct">
                <h4>매물특징</h4>
                <div class="ck-wrap">
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG1" class="check_box" name="pOptionG[]" value="인테리어"
                      <?php if($results && strpos($results->PPT_OPTION_G,'인테리어') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG1">인테리어</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG2" class="check_box" name="pOptionG[]" value="엘리베이터"
                      <?php if($results && strpos($results->PPT_OPTION_G,'엘리베이터') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG2">엘리베이터</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG3" class="check_box" name="pOptionG[]" value="시스템에어컨"
                      <?php if($results && strpos($results->PPT_OPTION_G,'시스템에어컨') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG3">시스템에어컨</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG4" class="check_box" name="pOptionG[]" value="루프탑"
                      <?php if($results && strpos($results->PPT_OPTION_G,'루프탑') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG4">루프탑</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG5" class="check_box" name="pOptionG[]" value="보안시스템"
                      <?php if($results && strpos($results->PPT_OPTION_G,'보안시스템') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG5">보안시스템</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG6" class="check_box" name="pOptionG[]" value="입출입관리"
                      <?php if($results && strpos($results->PPT_OPTION_G,'입출입관리') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG6">입출입관리</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG7" class="check_box" name="pOptionG[]" value="창고"
                      <?php if($results && strpos($results->PPT_OPTION_G,'창고') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG7">창고</label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" id="pOptionG8" class="check_box" name="pOptionG[]" value="복층"
                      <?php if($results && strpos($results->PPT_OPTION_G,'복층') !== false) echo "checked"; ?>
                      <?php if($results && ($results->PPT_STATE=='A' || $results->PPT_STATE=='B') && $results->PPT_USER_TYPE=='B'){ echo "disabled";}?>>
                    <label for="pOptionG8">복층</label>
                  </div>
                </div>
              </div>
            </section>
            <section class="section clearfix rcmnd-indst">
              <div class="section-title">
                <h3>매물 업종 추천</h3>
                <div class="form-checkbox">
                  <input type="checkbox" id="pAllowIndAll" class="check_box" name="pAllowIndAll[]" value="추천 없음"
                    <?php if(($results && !$results->PPT_ALLOW_INDUSTRY) || !$results) echo "checked"; ?>>
                  <label for="pAllowIndAll">추천없음</label>
                </div>
              </div>
              <div class="form-group">
                <!-- <h4>매물특징</h4> -->
                <div class="ck-wrap clearfix ">
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="krnCsn" value="한식"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'한식') !== false) echo "checked"; ?>>
                    <label for="krnCsn"><span>한식</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="chnsFood" value="중식"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'중식') !== false) echo "checked"; ?>>
                    <label for="chnsFood"><span>중식</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="jpns_Sfd" value="일식/수산물"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'일식/수산물') !== false) echo "checked"; ?>>
                    <label for="jpns_Sfd"><span>일식/수산물</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="asianStyle" value="아시안/양식"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'아시안/양식') !== false) echo "checked"; ?>>
                    <label for="asianStyle"><span>아시안/양식</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="schoolFood" value="분식"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'분식') !== false) echo "checked"; ?>>
                    <label for="schoolFood"><span>분식</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="fastFood" value="패스트푸드"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'패스트푸드') !== false) echo "checked"; ?>>
                    <label for="fastFood"><span>패스트푸드</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="chicken" value="치킨"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'치킨') !== false) echo "checked"; ?>>
                    <label for="chicken"><span>치킨</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="cafe_Dsrt" value="카페/디저트"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'카페/디저트') !== false) echo "checked"; ?>>
                    <label for="cafe_Dsrt"><span>카페/디저트</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="pub" value="주점"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'주점') !== false) echo "checked"; ?>>
                    <label for="pub"><span>주점</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="delivery" value="배달"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'배달') !== false) echo "checked"; ?>>
                    <label for="delivery"><span>배달</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="medical" value="의료"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'의료') !== false) echo "checked"; ?>>
                    <label for="medical"><span>의료</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="bty_Lndry" value="이/미용/세탁"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'이/미용/세탁') !== false) echo "checked"; ?>>
                    <label for="bty_Lndry"><span>이/미용/세탁</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="sports" value="스포츠"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'스포츠') !== false) echo "checked"; ?>>
                    <label for="sports"><span>스포츠</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="pc_Krk" value="PC방/노래방"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'PC방/노래방') !== false) echo "checked"; ?>>
                    <label for="pc_Krk"><span>PC방/노래방</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="mrtcn_Store" value="마트/편의점"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'마트/편의점') !== false) echo "checked"; ?>>
                    <label for="mrtcn_Store"><span>마트/편의점</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="ofice_Sttmn" value="사무/문구"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'사무/문구') !== false) echo "checked"; ?>>
                    <label for="ofice_Sttmn"><span>사무/문구</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="PhoneStore" value="휴대폰매장"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'휴대폰매장') !== false) echo "checked"; ?>>
                    <label for="PhoneStore"><span>휴대폰매장</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="csmtcStore" value="화장품매장"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'화장품매장') !== false) echo "checked"; ?>>
                    <label for="csmtcStore"><span>화장품매장</span></label>
                  </div>
                  <div class="form-checkbox">
                    <input type="checkbox" name="pAllowInd[]" id="pet" value="애견/애완/동물"
                      <?php if($results && strpos($results->PPT_ALLOW_INDUSTRY,'애견/애완/동물') !== false) echo "checked"; ?>>
                    <label for="pet"><span>애견/애완/동물</span></label>
                  </div>
                </div>
              </div>
            </section>
            <section class="section clearfix">
              <h3>매물 상세내용</h3>
              <div class="form-group">
                <h4>매물제목</h4>
                <div class="int_box">
                  <input type="text" title="제목" placeholder="제목을 입력해주세요." name="pTitle" id="pTitle"
                    value="<?php if($results){ echo $results->PPT_TITLE;}?>">
                </div>
              </div>
              <div class="form-group textarea">
                <h4>매물상세내용</h4>
                <div class="textarea-wrap">
                  <textarea name="pContent" id="pContent" cols="30" rows="10"
                    placeholder="내용을 입력하세요."><?php if($results){ echo $results->PPT_CONTENT;}?></textarea>
                </div>
              </div>
            </section>
            <?php if($pType=='A'){?>
            <section class="section">
              <h3>등록정보</h3>
              <div class="form-group clearfix selCon">
                <h4>담당자 선택</h4>
                <div class="int-wrap">
                  <!-- <div class="left-box int_box Abtn-wrap">
                    <a href="javascript:void(0)" class="btn-add">담당자 추가<i class="xi-plus"></i></a>
                  </div> -->
                  <div class="add-select">
                    <div class="left-box int_box select-wrap">
                      <div class="select_box">
                        <select class="_select" title="카테고리" id="pbsIdx" name="pbsIdx">
                          <?php if($bkSub[0] > 0){?>
                          <?php foreach($bkSub[0] as $data){?>
                          <option value="<?php echo $data->BST_IDX;?>" <?php if($results && $results->BST_IDX ==
                            $data->BST_IDX){
                            echo "selected"; }?>><?php echo decrypt($data->BST_NAME);?></option>
                          <?php }?>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <!-- <div class="left-box int_box Cbtn-wrap">
                      <a href="javascript:void(0)" class="btn-cg">변경 <i class="xi-renew"></i></a>
                    </div> -->
                  </div>
                </div>
              </div>
            </section>
            <?php }?>
            <div class="bottomBtn-wrap">
              <!-- <button type="button" class="btn-" onclick="tmp_save();">임시저장</button> -->
              <input type="submit" title="등록" alt="등록" value="등록" class="btn-pymnt">
              <button type="button" class="btn-cncl"
                onclick="location.href='/pro/storeList?state=<?php echo $state;?>&slotKey=<?php echo $psKey;?>';">취소</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>
<!----- 푸터 시작 ----->
<script>
// function tmp_save() {
//   $('#pState').val("F");
//   $("#pymnt_form").submit();
// }
</script>
<script type="text/javascript">
$('.prpRgstr .selCon .btn-add').click(function() {
  $(".prpRgstr .selCon").addClass('on');
});
$('.prpRgstr .selCon .btn-cl').click(function() {
  $(".prpRgstr .selCon").removeClass('on');
});

var photoSlider = new Swiper('.photoSlider', {
  slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
  observer: true,
  observeParents: true,
});
$(function() {
  $('.down01').click(function(e) {
    e.preventDefault();
    var stat = $('#intnum01').val();
    var num = parseInt(stat, 10);
    // num--;
    if (num <= 0) {
      num = 0;
    } else if (stat <= 100) {
      num--;
      if (num == 0) {
        num = 1;
      }
      $('#intnum01').val(num);
    }
  });
  $('.up01').click(function(e) {
    e.preventDefault();
    var stat = $('#intnum01').val();
    var num = parseInt(stat, 10);
    // num++;
    if (num >= 100) {
      num = 100;
    } else {
      num++;
      $('#intnum01').val(num);
    }
  });
});
$(function() {
  $('.down02').click(function(e) {
    e.preventDefault();
    var stat = $('#intnum02').val();
    var num = parseInt(stat, 10);
    // num--;
    if (num <= -10) {
      num = -10;
    } else if (stat <= 100) {
      num--;
      if (num == 0) {
        num = 1;
      }
      $('#intnum02').val(num);
    }
  });
  $('.up02').click(function(e) {
    e.preventDefault();
    var stat = $('#intnum02').val();
    var num = parseInt(stat, 10);
    // num++;
    if (num >= 100) {
      num = 100;
    } else {
      num++;
      $('#intnum02').val(num);
    }
  });
});



$('.prpRgstr .cmplYear .icon-wrap').click(function() {
  $("#pOptionE").focus();
});

$("#pOptionE").datepicker({
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
  yearRange: 'c-99:c+99' //년도 최소, 최대     
});
</script>
<script>
$("input:checkbox[name='pTypeA[]']").change(function() {
  if ($("input:checkbox[name='pTypeA[]']:checked").length > 1) {
    $("#all-check").prop("checked", true);
    $("#pTypeB").empty();
    var option = "";
    option += "<option value='근린상가'>근린상가</option>";
    option += "<option value='상가주택'>상가주택</option>";
    option += "<option value='단지상가'>단지상가</option>";
    option += "<option value='주상복합상가'>주상복합상가</option>";
    option += "<option value='기타상가'>기타상가</option>";
    option += "<option value='빌딩형'>빌딩형</option>";
    option += "<option value='주택형'>주택형</option>";
    option += "<option value='오피스텔형'>오피스텔형</option>";
    option += "<option value='지식산업센터'>지식산업센터</option>";
    option += "<option value='기타사무실'>기타사무실</option>";
    $("#pTypeB").append(option);
  } else {
    $("#all-check").prop("checked", false);
    $("#pTypeB").empty();
    if ($("#store").is(":checked")) {
      var option = "";
      option += "<option value='근린상가'>근린상가</option>";
      option += "<option value='상가주택'>상가주택</option>";
      option += "<option value='단지상가'>단지상가</option>";
      option += "<option value='주상복합상가'>주상복합상가</option>";
      option += "<option value='기타상가'>기타상가</option>";
      $("#pTypeB").append(option);
    } else if ($("#office").is(":checked")) {
      var option = "";
      option += "<option value='빌딩형'>빌딩형</option>";
      option += "<option value='주택형'>주택형</option>";
      option += "<option value='오피스텔형'>오피스텔형</option>";
      option += "<option value='지식산업센터'>지식산업센터</option>";
      option += "<option value='기타사무실'>기타사무실</option>";
      $("#pTypeB").append(option);
    }
  }
});
$("#all-check").change(function() {
  $("#pTypeB").empty();
  if ($(this).is(":checked")) {
    $("input:checkbox[name='pTypeA[]']").prop("checked", true);
    var option = "";
    option += "<option value='근린상가'>근린상가</option>";
    option += "<option value='상가주택'>상가주택</option>";
    option += "<option value='단지상가'>단지상가</option>";
    option += "<option value='주상복합상가'>주상복합상가</option>";
    option += "<option value='기타상가'>기타상가</option>";
    option += "<option value='빌딩형'>빌딩형</option>";
    option += "<option value='주택형'>주택형</option>";
    option += "<option value='오피스텔형'>오피스텔형</option>";
    option += "<option value='지식산업센터'>지식산업센터</option>";
    option += "<option value='기타사무실'>기타사무실</option>";
    $("#pTypeB").append(option);
  } else {
    $("input:checkbox[name='pTypeA[]']").prop("checked", false);
  }
});
$("input:text[numberOnly]").on("keyup", function() {
  $(this).val($(this).val().replace(/[^0-9]/g, ""));
});
$("#pSizeA").on("keyup keypress keydown", function() {
  var data = $("#pSizeA").val();
  data = Math.round(Number(data) / 3.3058);
  if (data == 0) {
    data = "";
  }
  $("#pSizeAA").val(Math.round(data));
});
$("#pSizeAA").on("keyup keypress keydown", function() {
  var data = $("#pSizeAA").val();
  data = Math.round(Number(data) * 3.3058);
  if (data == 0) {
    data = "";
  }
  $("#pSizeA").val(Math.round(data));
});
$("#pSizeB").on("keyup keypress keydown", function() {
  var data = $("#pSizeB").val();
  data = Math.round(Number(data) / 3.3058);
  if (data == 0) {
    data = "";
  }
  $("#pSizeBB").val(Math.round(data));
});
$("#pSizeBB").on("keyup keypress keydown", function() {
  var data = $("#pSizeBB").val();
  data = Math.round(Number(data) * 3.3058);
  if (data == 0) {
    data = "";
  }
  $("#pSizeB").val(Math.round(data));
});
$("input:checkbox[name='pPriceCEtc']").change(function() {
  if ($(this).is(":checked")) {
    $("input:checkbox[name='pPriceCEtc']").prop("checked", false);
    $(this).prop("checked", true);
  } else {
    $(this).prop("checked", false);
  }
});
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

      document.getElementById('pAddr1').value = fullRoadAddr;
      document.getElementById('pAddr2').focus();
      addr_data = fullRoadAddr;
      addr_location(addr_data);

      $("#pAreaA").val(data.sido);
      $("#pAreaB").val(data.sigungu);
      if (data.sido == '세종특별자치시') {
        $("#pAreaB").val(data.sido);
      }

      $("#pAreaC").val(data.bname);
      $("#pAreaBcode").val(data.sigunguCode);
      $("#pAreaCcode").val(data.bcode);
      if (data.hname) {
        $("#pAreaD").val(data.hname);
      } else {
        $("#pAreaD").val(data.bname);
      }

      $("#pAddr1B").val(expJibunAddr);
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
      $("#pLat").val(addr_lat);
      $("#pLon").val(addr_lng);

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
<script>
function submit_ck() {
  if ($("input:checkbox[name='pTypeA[]']:checked").length == 0) {
    alert("매물 구분을 선택해주세요!");
    $("#store").focus();
    return false;
  } else if (!$("#pTypeB").val()) {
    alert("공간형태를 선택해주세요!");
    $("#pTypeB").focus();
    return false;
  } else if (!$("#pAddr1").val()) {
    alert("주소를 입력해주세요!");
    $("#pAddr1").focus();
    return false;
  } else if (!$("#pAddr2").val()) {
    alert("상세주소를 입력해주세요!");
    $("#pAddr2").focus();
    return false;
  } else if ($(".add_img").length == 0) {
    alert("매물사진을 등록해주세요!");
    $(".upload-name02").focus();
    return false;
  } else if (!$("#pPriceA").val()) {
    alert("보증금을 입력해주세요!");
    $("#pPriceA").focus();
    return false;
  } else if (!$("#pPriceB").val()) {
    alert("임대료를 입력해주세요!");
    $("#pPriceB").focus();
    return false;
  } else if (!$("#pPriceC").val()) {
    alert("권리금을 입력해주세요!");
    $("#pPriceC").focus();
    return false;
  } else if (!$("#pPriceD").val()) {
    alert("관리비를 입력해주세요!");
    $("#pPriceD").focus();
    return false;
  } else if (!$("#pSizeA").val()) {
    alert("연면적을 입력해주세요!");
    $("#pSizeA").focus();
    return false;
  } else if (!$("#pSizeB").val()) {
    alert("전용면적을 입력해주세요!");
    $("#pSizeB").focus();
    return false;
  } else if (!$("#pOptionB").val()) {
    alert("주차수를 선택해주세요!");
    $("#pOptionB").focus();
    return false;
  } else if (!$("#pOptionC").val()) {
    alert("냉난방을 선택해주세요!");
    $("#pOptionC").focus();
    return false;
  } else if (!$("#pOptionD").val()) {
    alert("화장실을 선택해주세요!");
    $("#pOptionD").focus();
    return false;
  } else if (!$("#pOptionE").val()) {
    alert("준공년도를 선택해주세요!");
    $("#pOptionE").focus();
    return false;
  } else if (!$("#pTitle").val()) {
    alert("매물 제목을 입력해주세요!");
    $("#pTitle").focus();
    return false;
  } else if (!$("#pContent").val()) {
    alert("매물 내용을 입력해주세요!");
    $("#pContent").focus();
    return false;
  } else {
    var key = "<?php echo $key;?>";
    var state = $("#pState").val();
    var pType = "<?php echo $pType;?>";
    if (pType == 'A') {
      if (!$("#pbsIdx").val()) {
        alert("담당자를 선택해주세요!");
        $("#pbsIdx").focus();
        return false;
      }
    }
    if (!key) {
      if (pType == 'A') {
        $("#pState").val("");
      } else {
        $("#pState").val("B");
      }

    }
    return true;
  }
}
</script>
<script>
$(".pImg").on("change", handleImgFileSelect);

var add_cnt = 0;

function handleImgFileSelect(e) {
  new Swiper('.photoSlider', {
    slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
    observer: true,
    observeParents: true,
  });
  //console.log("event");

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
      var img_tag = "<div class=\"swiper-slide\"  id=\"add_img_" + add_cnt + "\">";
      if (add_cnt == 0) {
        img_tag += "<span class=\"on\">대표사진</span>";
      }
      img_tag += "<div class=\"img-wrap\">";
      img_tag += "<img src=\"" + e.target.result + "\" alt=\"매물사진\" class=\"add_img\">";
      img_tag += "</div>";
      img_tag +=
        "<button type=\"button\" onclick=\"addImgDel('" + add_cnt +
        "');\"><i class=\"xi-close-thin\"></i> <span class=\"blind\">닫기</span></button>";
      img_tag += "</div>";
      $(".swiper-wrapper").append(img_tag);
      $("#file_div" + add_cnt).css("display", "none");
      $(".photoSlider-wrap").css("display", "");

      var file_input = "";
      add_cnt++;
      file_input += "<div id=\"file_div" + add_cnt + "\">";
      file_input += "<label for=\"pImg" + add_cnt + "\">첨부</label>";
      file_input += "<input class=\"upload-name02\" placeholder=\"대표사진을 첨부해 주세요.\" readonly />";
      file_input += "<input type=\"file\" id=\"pImg" + add_cnt + "\" name=\"pImg[]\" class=\"file pImg\">";
      if (add_cnt == 0) {
        file_input += "<input type=\"hidden\" name=\"pRepres[]\" id=\"pRepres" + add_cnt + "\" value=\"Y\">";
      } else {
        file_input += "<input type=\"hidden\" name=\"pRepres[]\" id=\"pRepres" + add_cnt + "\" value=\"\">";
      }
      file_input += "</div>";
      file_input += "</div>";
      $("#add_img_div").append(file_input);
      $(".pImg").on("change", handleImgFileSelect);
    }
    reader.readAsDataURL(f);
  });
}

function addImgDel(key) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    $("#add_img_" + key).remove();
    $("#file_div" + key).css("display", "none");
    $("#pImg" + key).attr("disabled", true); //설정
  }
}

function up_del(key) {
  var rlt = confirm('삭제하시겠습니까?');
  if (rlt) {
    $("#PIT_DEL" + key).val(key);
    $("#pitDiv" + key).css("display", "none");
  }
}

function repres(key) {
  $(".repres").css("display", "none");
  //console.log($("#add_img_" + key).children("div").children(".repres").attr("class"));
  $("#add_img_" + key).children("div").children(".repres").css("display", "block");
  $("#dropDown" + key + "Invoker").trigger("click");
  $("input[name='PIT_UP_REPRES[]']").val("");
  $("input[name='pRepres[]']").val("");
  $("#pRepres" + key).val("Y");

}
$("#pAllowIndAll").on("change", function() {
  if ($(this).is(":checked")) {
    $("input[name='pAllowInd[]']").prop("checked", false);
  }
});
$("input[name='pAllowInd[]']").on("change", function() {
  if ($("input[name='pAllowInd[]']:checked").length == 0) {
    $("#pAllowIndAll").prop("checked", true);
  } else {
    $("#pAllowIndAll").prop("checked", false);
  }
});
</script>