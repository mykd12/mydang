<?php include("inc/header.php"); ?>
<main id="container" class="sub prpMgmt partnerSub">
  <div class="container-inner">
    <div class="sub-title">
      <div class="icon-wrap">
        <img src="icon/join04.png" alt="파트너 아이콘">
      </div>
      <h4>매물관리</h4>
    </div>
    <div class="toptab">
      <ul>
        <li>진행<span>(5)</span></li>
        <li class="on">종료<span>(5)</span></li>
        <li>완료<span>(5)</span></li>
        <li>검수<span>(5)</span></li>
      </ul>
    </div>
    <div class="topBar">
      <div class="row01">
        <p>
          <span class="bar-ti">상가매물현황</span>
        </p>
        <p class="num">
          <span class="Bnum num">20</span>사용(<span class="num">1</span>)잔여(<span class="num">19</span>)
        </p>
        <a href="javascript:void(0)" class="btn-advPym">광고<br>결제</a>
      </div>
      <div class="bar-wrap"><span class="bar"></span></div>
      <div class="row03">광고<span class="date">2021.12.29~2022.02.22</span>(남은기간:<span class="day">5</span>일)</div>
    </div>
    <div class="top-wrap">
      <!-- 매물이동 -->
      <div class="prpMove-wrap">

        <div class="select-wrap btn-state">
          <div class="select_box">
            <select class="contact_select" title="카테고리" id="" name="">
              <option value=""> :: 담당자 선택 :: </option>
              <?php foreach($bkSub[0] as $data){?>
              <option value="<?php echo $data->BST_IDX;?>"><?php echo decrypt($data->BST_NAME);?></option>
              <?php }?>
            </select>
            <div class="btn-down"></div>
          </div>
          <button type="button" class="btn_move"><i class="xi-catched"></i> 매물이동</button>
        </div>
        <!-- 매물이동 버튼 -->
      </div>
      <div class="right-wrap">
        <!-- 서치바 -->
        <div class="search_form_wrap">
          <form class="noticeSearch_form" method="get" action="">
            <input type="text" placeholder="검색어를 입력하세요" id="search" class="noticeSearch" name="search"
              value="<?php echo $search;?>">
            <button type="submit" class="btn_submit"><i class="xi-search"></i><span class="blind">검색</span></button>
          </form>
        </div>
        <!-- 관리자선택 -->
        <div class="add-select">
          <div class="select-wrap">
            <div class="select_box">
              <select class="mngr_select" title="카테고리" id="" name="">
                <option value=""> :: 담당자 선택 :: </option>
                <?php foreach($bkSub[0] as $data){?>
                <option value="<?php echo $data->BST_IDX;?>"><?php echo decrypt($data->BST_NAME);?></option>
                <?php }?>
              </select>
              <div class="btn-down"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="content-inner">
        <div class="prp-wrap">
          <ul class="prp-list">
           <li class="t-head">
              <div class="col01">
                <!-- 전체선택 체크박스 -->
                <div class="form_checkbox">
                  <input class="check_box" id="thAll-ck" name="con" type="checkbox">
                  <label for="thAll-ck">전체선택</label>
                </div>
              </div>
              <div class="col02">
                <p>매물정보</p>
              </div>
              <div class="col03">
                <p>등록정보</p>
              </div>
            </li>
         
            <li class="t-con">
              <div class="col01">
                <div class="form_checkbox">
                  <input class="check_box" id="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>" name="pptChck[]"
                    type="checkbox" value="<?php echo $results[$i][0]->PPT_IDX;?>">
                  <label for="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>"></label>
                </div>
              </div>
              <div class="prp tmprySto col02">
                <div class="top-row">
                  <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                  <div class="text-wrap">
                    <!-- <div class="row01"><span class="prp-num">M_20211130</span>
                  </div> -->
                  <p class="row01">
                    <span class="mark01">임</span>
                    <span lass="deposit">500 만원</span> / <span cclass="monthly-rent">70 만원</span>
                    <span class="mark02">권 </span><span>없음</span>
                  </p>
                    <p class="row02">
                      <span class="prpTitle">양림동 디저트 카페</span>
                    </p>
                    <p class="row03 add">광주광역시 동구 동명동</p>
                    <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                      시비권있음 건강상급임대</p>
                  </div>
                  <div class="rating-box">
                    <span class="premium">프리미엄</span>
                    <span class="top">TOP</span>
                  </div>
                  <div class="shortcuts-box">
                    <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                        class="xi-touch"></i>
                      <p>상세 바로보기</p>
                    </a>
                    <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                        class="xi-border-color"></i>
                      <p>정보 수정하기</p>
                    </a>
                  </div>
                </div>
                <div class="memo-box">
                  <form method="post">
                    <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                    <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                  </form>
                </div>
                <div class="select-wrap btn-state">
                  <div class="select_box">
                    <select class="point_select" title="카테고리" id="" name="">
                      <option value="광고일시정지">광고일시정지</option>
                      <option value="광고재개">광고재개</option>
                      <option value="광고종료">광고종료</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class=" col03">
                <div class="row01"><span class="prp-num">M_20211130</span>
                </div>
                <div class="row02"><span class="text-ti">- 수정일 </span>2022-01-26</div>
                <div class="row03"><span class="text-ti">- 등록인 </span>김성찬</div>
                <div class="row03"><span class="text-ti">- 조회수 </span>30</div>
                <div class="row03"><span class="text-ti">- 관심수 </span>50</div>
              </div>
            </li>
            <li class="t-con">
              <div class="col01">
                <div class="form_checkbox">
                  <input class="check_box" id="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>" name="pptChck[]"
                    type="checkbox" value="<?php echo $results[$i][0]->PPT_IDX;?>">
                  <label for="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>"></label>
                </div>
              </div>
              <div class="prp tmprySto col02">
                <div class="top-row">
                  <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                  <div class="text-wrap">
                    <!-- <div class="row01"><span class="prp-num">M_20211130</span>
                  </div> -->
                  <p class="row01">
                    <span class="mark01">임</span>
                    <span lass="deposit">500 만원</span> / <span cclass="monthly-rent">70 만원</span>
                    <span class="mark02">권 </span><span>없음</span>
                  </p>
                    <p class="row02">
                      <span class="prpTitle">양림동 디저트 카페</span>
                    </p>
                    <p class="row03 add">광주광역시 동구 동명동</p>
                    <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                      시비권있음 건강상급임대</p>
                  </div>
                  <div class="rating-box">
                    <span class="premium">프리미엄</span>
                    <span class="top">TOP</span>
                  </div>
                  <div class="shortcuts-box">
                    <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                        class="xi-touch"></i>
                      <p>상세 바로보기</p>
                    </a>
                    <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                        class="xi-border-color"></i>
                      <p>정보 수정하기</p>
                    </a>
                  </div>
                </div>
                <div class="memo-box">
                  <form method="post">
                    <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                    <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                  </form>
                </div>
                <div class="select-wrap btn-state">
                  <div class="select_box">
                    <select class="point_select" title="카테고리" id="" name="">
                      <option value="광고일시정지">광고일시정지</option>
                      <option value="광고재개">광고재개</option>
                      <option value="광고종료">광고종료</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class=" col03">
                <div class="row01"><span class="prp-num">M_20211130</span>
                </div>
                <div class="row02"><span class="text-ti">- 수정일 </span>2022-01-26</div>
                <div class="row03"><span class="text-ti">- 등록인 </span>김성찬</div>
                <div class="row03"><span class="text-ti">- 조회수 </span>30</div>
                <div class="row03"><span class="text-ti">- 관심수 </span>50</div>
              </div>
            </li>
            <li class="t-con">
              <div class="col01">
                <div class="form_checkbox">
                  <input class="check_box" id="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>" name="pptChck[]"
                    type="checkbox" value="<?php echo $results[$i][0]->PPT_IDX;?>">
                  <label for="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>"></label>
                </div>
              </div>
              <div class="prp tmprySto col02">
                <div class="top-row">
                  <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                  <div class="text-wrap">
                    <!-- <div class="row01"><span class="prp-num">M_20211130</span>
                  </div> -->
                  <p class="row01">
                    <span class="mark01">임</span>
                    <span lass="deposit">500 만원</span> / <span cclass="monthly-rent">70 만원</span>
                    <span class="mark02">권 </span><span>없음</span>
                  </p>
                    <p class="row02">
                      <span class="prpTitle">양림동 디저트 카페</span>
                    </p>
                    <p class="row03 add">광주광역시 동구 동명동</p>
                    <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                      시비권있음 건강상급임대</p>
                  </div>
                  <div class="rating-box">
                    <span class="premium">프리미엄</span>
                    <span class="top">TOP</span>
                  </div>
                  <div class="shortcuts-box">
                    <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                        class="xi-touch"></i>
                      <p>상세 바로보기</p>
                    </a>
                    <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                        class="xi-border-color"></i>
                      <p>정보 수정하기</p>
                    </a>
                  </div>
                </div>
                <div class="memo-box">
                  <form method="post">
                    <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                    <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                  </form>
                </div>
                <div class="select-wrap btn-state">
                  <div class="select_box">
                    <select class="point_select" title="카테고리" id="" name="">
                      <option value="광고일시정지">광고일시정지</option>
                      <option value="광고재개">광고재개</option>
                      <option value="광고종료">광고종료</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class=" col03">
                <div class="row01"><span class="prp-num">M_20211130</span>
                </div>
                <div class="row02"><span class="text-ti">- 수정일 </span>2022-01-26</div>
                <div class="row03"><span class="text-ti">- 등록인 </span>김성찬</div>
                <div class="row03"><span class="text-ti">- 조회수 </span>30</div>
                <div class="row03"><span class="text-ti">- 관심수 </span>50</div>
              </div>
            </li>
            <li class="t-con">
              <div class="col01">
                <div class="form_checkbox">
                  <input class="check_box" id="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>" name="pptChck[]"
                    type="checkbox" value="<?php echo $results[$i][0]->PPT_IDX;?>">
                  <label for="ppCkech<?php echo $results[$i][0]->PPT_IDX;?>"></label>
                </div>
              </div>
              <div class="prp tmprySto col02">
                <div class="top-row">
                  <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                  <div class="text-wrap">
                    <!-- <div class="row01"><span class="prp-num">M_20211130</span>
                  </div> -->
                  <p class="row01">
                    <span class="mark01">임</span>
                    <span lass="deposit">500 만원</span> / <span cclass="monthly-rent">70 만원</span>
                    <span class="mark02">권 </span><span>없음</span>
                  </p>
                    <p class="row02">
                      <span class="prpTitle">양림동 디저트 카페</span>
                    </p>
                    <p class="row03 add">광주광역시 동구 동명동</p>
                    <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                      시비권있음 건강상급임대</p>
                  </div>
                  <div class="rating-box">
                    <span class="premium">프리미엄</span>
                    <span class="top">TOP</span>
                  </div>
                  <div class="shortcuts-box">
                    <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                        class="xi-touch"></i>
                      <p>상세 바로보기</p>
                    </a>
                    <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                        class="xi-border-color"></i>
                      <p>정보 수정하기</p>
                    </a>
                  </div>
                </div>
                <div class="memo-box">
                  <form method="post">
                    <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                    <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                  </form>
                </div>
                <div class="select-wrap btn-state">
                  <div class="select_box">
                    <select class="point_select" title="카테고리" id="" name="">
                      <option value="광고일시정지">광고일시정지</option>
                      <option value="광고재개">광고재개</option>
                      <option value="광고종료">광고종료</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class=" col03">
                <div class="row01"><span class="prp-num">M_20211130</span>
                </div>
                <div class="row02"><span class="text-ti">- 수정일 </span>2022-01-26</div>
                <div class="row03"><span class="text-ti">- 등록인 </span>김성찬</div>
                <div class="row03"><span class="text-ti">- 조회수 </span>30</div>
                <div class="row03"><span class="text-ti">- 관심수 </span>50</div>
              </div>
            </li>
          
        
            <!-- <div class="prp uInsp">
              <div class="top-row">
                <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                <div class="text-wrap">
                  <div class="row01"><span class="prp-num">M_20211130</span>
                  </div>
                  <p class="row02"><span class="prpTitle">양림동 디저트 카페</span><span lass="deposit">500 만원</span> / <span
                      cclass="monthly-rent">70 만원</span></p>
                  <p class="row03 add">광주광역시 동구 동명동</p>
                  <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                    시비권있음 건강상급임대</p>
                </div>
                <div class="rating-box">
                  <span class="premium">프리미엄</span>
                  <span class="top">TOP</span>
                </div>
                <div class="shortcuts-box">
                  <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                      class="xi-touch"></i>
                    <p>상세 바로보기</p>
                  </a>
                  <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                      class="xi-border-color"></i>
                    <p>정보 수정하기</p>
                  </a>
                </div>
              </div>
              <div class="memo-box">
                <form method="post">
                  <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                  <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                </form>
              </div>
              <div class="select-wrap btn-state">
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="" name="">
                    <option value="광고일시정지">광고일시정지</option>
                    <option value="광고재개">광고재개</option>
                    <option value="광고종료">광고종료</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="prp on">
              <div class="top-row">
                <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                <div class="text-wrap">
                  <div class="row01"><span class="prp-num">M_20211130</span>
                  </div>
                  <p class="row02"><span class="prpTitle">양림동 디저트 카페</span><span lass="deposit">500 만원</span> / <span
                      cclass="monthly-rent">70 만원</span></p>
                  <p class="row03 add">광주광역시 동구 동명동</p>
                  <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                    시비권있음 건강상급임대</p>
                </div>
                <div class="rating-box">
                  <span class="premium">프리미엄</span>
                  <span class="top">TOP</span>
                </div>
                <div class="shortcuts-box">
                  <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                      class="xi-touch"></i>
                    <p>상세 바로보기</p>
                  </a>
                  <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                      class="xi-border-color"></i>
                    <p>정보 수정하기</p>
                  </a>
                </div>
              </div>
              <div class="memo-box">
                <form method="post">
                  <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                  <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                </form>
              </div>
              <div class="select-wrap btn-state">
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="" name="">
                    <option value="광고일시정지" class="adPause">광고일시정지</option>
                    <option value="광고재개" class="adResume">광고재개</option>
                    <option value="광고종료" class="adEnd">광고종료</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="prp pause">
              <div class="top-row">
                <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                <div class="text-wrap">
                  <div class="row01"><span class="prp-num">M_20211130</span>
                    <p class="advStus">
                      <span class="progress">진행중</span>
                      <span class="pause">일시정지중</span>
                      <span class="end">종료</span>
                    </p>
                  </div>
                  <p class="row02"><span class="prpTitle">양림동 디저트 카페</span><span lass="deposit">500 만원</span> / <span
                      cclass="monthly-rent">70 만원</span></p>
                  <p class="row03 add">광주광역시 동구 동명동</p>
                  <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                    시비권있음 건강상급임대</p>
                </div>
                <div class="rating-box">
                  <span class="premium">프리미엄</span>
                  <span class="top">TOP</span>
                </div>
                <div class="shortcuts-box">
                  <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                      class="xi-touch"></i>
                    <p>상세 바로보기</p>
                  </a>
                  <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                      class="xi-border-color"></i>
                    <p>정보 수정하기</p>
                  </a>
                </div>
              </div>
              <div class="memo-box">
                <form method="post">
                  <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                  <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                </form>
              </div>
              <div class="select-wrap btn-state">
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="" name="">
                    <option value="광고일시정지" class="adPause">광고일시정지</option>
                    <option value="광고재개" class="adResume">광고재개</option>
                    <option value="광고종료" class="adEnd">광고종료</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="prp off">
              <div class="top-row">
                <div class="img-wrap"><img src="img/m01.png" alt="광고매물이미지"></div>
                <div class="text-wrap">
                  <div class="row01"><span class="prp-num">M_20211130</span>
                    <p class="advStus">
                      <span class="progress">진행중</span>
                      <span class="pause">일시정지중</span>
                      <span class="end">종료</span>
                    </p>
                    <span class="restDay"> 2021.12.29 ~
                      2022.01.20 (남은기간:0일)</span>
                  </div>
                  <p class="row02"><span class="prpTitle">양림동 디저트 카페</span><span lass="deposit">500 만원</span> / <span
                      cclass="monthly-rent">70 만원</span></p>
                  <p class="row03 add">광주광역시 동구 동명동</p>
                  <p class="row04 prp-de">피자 동구 동명동 1층 피자 전62㎡ 월매출2천5백만원~3천만원이상 순이익30% 큰대로변 광고효과좋음 단골고객많음 보5백만원 월70만원
                    시비권있음 건강상급임대</p>
                </div>
                <div class="rating-box">
                  <span class="premium">프리미엄</span>
                  <span class="top">TOP</span>
                </div>
                <div class="shortcuts-box">
                  <a href="javascript:void(0);" class="btn-goDtls"><span class="blind">상세보기</span><i
                      class="xi-touch"></i>
                    <p>상세 바로보기</p>
                  </a>
                  <a href="javascript:void(0);" class="btn-edtInf"><span class="blind">정보수정하기</span><i
                      class="xi-border-color"></i>
                    <p>정보 수정하기</p>
                  </a>
                </div>
              </div>
              <div class="memo-box">
                <form method="post">
                  <textarea name="" id="" cols="30" rows="1" placeholder="간편메모 광고정보에 노출되지 않습니다."></textarea>
                  <button type="submit" class="btn-modifyConfirm"><span>메모저장</span></button>
                </form>
              </div>
              <div class="select-wrap btn-state">
                <div class="select_box">
                  <select class="point_select" title="카테고리" id="" name="">
                    <option value="광고일시정지">광고일시정지</option>
                    <option value="광고재개">광고재개</option>
                    <option value="광고종료">광고종료</option>
                  </select>
                </div>
              </div>
            </div> -->
          </ul>
        </div>
        <div class="btn-wrap">
          <img src="icon/prpAdd01.png" alt="매물등록아이콘">
          <a href="javascript:void(0);" class="btn-prpAdd">
            <p>매물등록</p>
          </a>
        </div>
      </div>
    </div>
  </div>
  </div>
</main>
<!----- 푸터 시작 ----->
<? include("inc/footer.php"); ?>


<script type="text/javascript">
$('.topteb ul li').on('click', function(e) {
  $(this).addClass('on').siblings().removeClass('on');
  e.preventDefault();
});
</script>