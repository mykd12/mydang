<link rel="stylesheet" href="/css/map.css?v=<?php echo time(); ?>">
<link href="/css/three-dots.css" rel="stylesheet">
<script type="text/javascript"
  src="//dapi.kakao.com/v2/maps/sdk.js?appkey=64e888255177e7c55224d2acfdaa3146&libraries=services"></script>
<script type="text/javascript">
<!--
var lat;
var lon;
var s_lat = "<?php echo $myLat;?>";
var s_lon = "<?php echo $myLon;?>";
if (s_lat) lat = s_lat;
if (s_lon) lon = s_lon;


function getLocation() {
  if (navigator.geolocation) { // GPS를 지원하면
    navigator.geolocation.getCurrentPosition(function(position) {
      lat = position.coords.latitude;
      lon = position.coords.longitude;
      my_point(lat, lon);

    }, function(error) {
      //console.error(error);
      if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
        // iOS 아이폰, 아이패드, 아이팟
        alert(
          "맥os, 아이패드, 아이폰 사용자는 \r\n 설정 > 개인 정보 보호 > 위치 서비스로 이동 후 위치 서비스 켬으로 변경하셔야 \r\n 현재 위치 기반 서비스를 이용하실 수 있습니다."
        );
      }
    }, {
      enableHighAccuracy: false,
      maximumAge: 0,
      timeout: Infinity
    });

  } else {
    alert('GPS를 지원하지 않습니다');
  }
}
/****************** 내위치 찾기 *******************/
function my_point(lat, lon) {
  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new kakao.maps.services.Geocoder();
  var my_location = new kakao.maps.LatLng(lat, lon);
  searchDetailAddrFromCoords(my_location, function(result, status) {
    if (status === kakao.maps.services.Status.OK) {
      var detailAddr = !!result[0].road_address ? result[0].road_address.address_name : '';
      var sido = result[0].address.region_1depth_name;
      var gugun = result[0].address.region_2depth_name;
      var dong = result[0].address.region_3depth_name;

      if (sido) {
        location_select(sido, gugun, dong, lat, lon);
        setTimeout(function() {
          location.reload();
        }, 700);
      }
    }
  });

  function searchDetailAddrFromCoords(coords, callback) {
    // 좌표로 법정동 상세 주소 정보를 요청합니다
    geocoder.coord2Address(coords.getLng(), coords.getLat(), callback);
  }
  // 위치정보 세션 저장
  function location_select(sido, gugun, dong, lat, lon) {

    $.ajax({
      type: 'post',
      url: '/VO/myLocation',
      data: {
        sido: sido,
        gugun: gugun,
        dong: dong,
        lat: lat,
        lon: lon
      }
    });
  }
}

//
-->
</script>
<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=c4ta8crjn6"></script>
<!-----  메인 시작 ----->
<main id="main" class="search makeSearch">
  <div class="map-wrap">
    <!-- 로딩 -->
    <div class="loding" id="map_loding" style="display:none"><i class="xi-spinner-5"></i></div>
    <!-- 지도 -->
    <div class="map" id="mapMake">
      <!-- 지도 컨트롤 -->
      <div class="map-control">
        <a href="javascript:getLocation();" class="btn-my-location">
          <span class="blind">현재위치보기</span>
          <!-- <i class="xi-my-location"></i> -->
          <img src="../../../icon/my-location.png" alt="현재위치아이콘">
        </a>
      </div>
    </div>
    <!-- 관심매물위치 -->
    <!--<div class="interest-location"><img src="/icon/maker01.png" alt="관심매물위치"></div>-->
    <!-- 업체위치표시 -->
    <!--
    <div class="company-location"><span class="icon interior"></span><span>인테리어</span></div>
    <div class="company-location"><span class="icon furniture"></span><span>가구</span></div>
    <div class="company-location"><span class="icon kitchen"></span><span>주방설비</span></div>
    <div class="company-location"><span class="icon sign"></span><span>간판</span></div>
    <div class="company-location"><span class="icon print"></span><span>광고/인쇄</span></div>
    <div class="company-location"><span class="icon rental"></span><span>렌탈</span></div>
    <div class="company-location"><span class="icon security"></span><span>통신/보안</span></div>
    <div class="company-location"><span class="icon etc"></span><span>기타</span></div>
-->
    <!-- 왼쪽 서치바 -->
    <div class="left-wrap">
      <div class="search-form-wrap">
        <form class="search-form" method="get">
          <input type="hidden" name="SCH_IDX" id="SCH_IDX" value="<?php echo $SCH_IDX;?>">
          <input type="hidden" name="loc_lat" id="loc_lat" value="<?php echo $loc_lat;?>">
          <input type="hidden" name="loc_lon" id="loc_lon" value="<?php echo $loc_lon;?>">
          <input type="hidden" name="type" id="type" value="<?php echo $type;?>">
          <input type="text" placeholder="동단위로 검색하세요." id="search_map" class="searchint search_map" autocomplete="off"
            name="search_map" value="<?php echo $search_map;?>">
          <button type="submit" class="btn-search"><i class="xi-search"><span class="blind">검색</span></i></button>
        </form>
        <div class="search-result">
          <div class="result searhResult" id="searhResult">
            <span class="m-c"></span>
            <p id="kwd_list" class="kwd_list">검색결과가 없습니다.</p>
          </div>
        </div>
      </div>
      <div class="maker-box">
        <a href="javascript:void(0);" class="interest">
          <span class="icon">
            <img src="/icon/maker02.png" alt="" class="on">
            <img src="/icon/maker03.png" alt="">
          </span>
          <span class="text">관심매물 OFF</span>
          <span class="text on">관심매물 ON</span>
        </a>
      </div>
    </div>
    <!-- 모바일 하단 업체리스트 버튼 -->
    <div class="Mbtn-wrap">
      <a href="javascript:void(0)" class="Mbtn-List">
        <p class="text-s">업체 <span class="num PTT_CNT"><?php echo $results_cnt;?></span> 보기</p>
        <p class="text-m"><i class="xi-map-o"></i> 지도보기</p>
      </a>
    </div>
    <!-- 오른쪽 업체리스트 슬라이더 창 -->
    <div class="right-slider">
      <!-- 로딩 -->
      <div class="loding01" id="list_loding" style="display:none;"><i class="xi-spinner-5"></i></div>
      <!-- 업체리스트 오른쪽으로 숨기기 버튼  -->
      <div class="btn-slider">
        <a href="javascript:void(0);">
          <span class="blind">이동</span>
          <i class="xi-angle-right-thin"></i>
        </a>
      </div>
      <div class="row01">
        <div class="slider-wrap">
          <div class="swiper-container option-slider">
            <div class="m-bg"></div>
            <div class="swiper-wrapper">
              <!-- 모바일 홈 버튼 -->
              <div class="swiper-slide mobile-option">
                <a href="/" class="btn-modal btn-home">
                  <img src="../../../icon/home02.png" alt="홈아이콘">
                  <p></p>
                </a>
              </div>
              <!-- x -- 모바일 홈 버튼 -- x -->
              <div class="swiper-slide option_selectA on">
                <a href="javascript:void(0);" onclick="option_select('A');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>인테리어 <span class="num" id="typeA_cnt"><?php echo $results_TBcnt['A'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectB on">
                <a href="javascript:void(0);" onclick="option_select('B');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>가구 <span class="num" id="typeB_cnt"><?php echo $results_TBcnt['B'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectC on">
                <a href="javascript:void(0);" onclick="option_select('C');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>주방설비 <span class="num" id="typeC_cnt"><?php echo $results_TBcnt['C'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectD on">
                <a href="javascript:void(0);" onclick="option_select('D');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>간판 <span class="num" id="typeD_cnt"><?php echo $results_TBcnt['D'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectE on">
                <a href="javascript:void(0);" onclick="option_select('E');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>광고/인쇄 <span class="num" id="typeE_cnt"><?php echo $results_TBcnt['E'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectF on">
                <a href="javascript:void(0);" onclick="option_select('F');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>통신/보안 <span class="num" id="typeF_cnt"><?php echo $results_TBcnt['F'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectG on">
                <a href="javascript:void(0);" onclick="option_select('G');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>렌탈 <span class="num" id="typeG_cnt"><?php echo $results_TBcnt['G'];?></span></p>
                </a>
              </div>
              <div class="swiper-slide option_selectH on">
                <a href="javascript:void(0);" onclick="option_select('H');" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>기타 <span class="num" id="typeH_cnt"><?php echo $results_TBcnt['H'];?></span></p>
                </a>
              </div>
            </div>
            <div class="swiper-button-prev"><i class="xi-angle-left-min"></i></div>
            <div class="swiper-button-next"><i class="xi-angle-right-min"></i></div>
          </div>
        </div>
      </div>
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <div class="bottomList-slider">
        <div class="row02">
          <div class="bar-wrap" style="height: 35px; line-height: 25px;">
            <span class="bar"></span>
          </div>
          <p>전체 <span class="cnt PTT_CNT" id="PTT_CNT"><?php echo $results_cnt;?></span>개</p>
          <div class="search-form-wrap">
            <form class="search-form" method="get">
              <input type="text" id="keyword_search" class="searchint" autocomplete="off" name="keyword_search"
                value="">
              <button type="submit" class="btn-search"><i class="xi-search"><span class="blind">검색</span></i></button>
            </form>
            <div class="search-result">
              <div class="result">
                <p id="kwd_list">검색결과가 없습니다.</p>
              </div>
            </div>
          </div>
          <div class="select_wrap select_wrap02">
            <div class="select"><span>거리순</span> <i class="xi-caret-down-min"></i> </div>
            <ul class="depth02 array_select array_select02">
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_best" class="sort blind list_sort" value="거리순" checked="">
                  <label for="sort_best"><span>거리순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_new" class="sort blind list_sort" value="경력순">
                  <label for="sort_new"><span>경력순</span></label>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- 업체리스트 -->
        <div class="conList-slider company-list on" id="company-list">
          <?php if($results_cnt > 0){?>
          <?$i=0;?>
          <?php foreach($results[0] as $data){?>
          <div class="con-row" onclick="list_detail('<?php echo $data->PTT_IDX;?>');">
            <a href="javascript:list_detail('<?php echo $data->PTT_IDX;?>');" class="btn-campany">
              <div class="title-wrap">
                <div class="img-wrap">
                  <?php if($data->PTT_IMG_SAVE){?>
                  <img src="/uploads/<?php echo $data->PTT_IMG_SAVE;?>" alt="업체로고" id="detail_img1">
                  <?}else{?>
                  <img src="/img/m01.png" alt="업체로고" id="detail_img1">
                  <?}?>
                </div>
              </div>
              <div class="text-wrap">
                <p class="sector">
                  <span><?php echo $data->PTT_TYPE;?></span>
                </p>
                <h5 class="title" onclick="list_detail('<?php echo $data->PTT_IDX;?>');">
                  <?php echo decrypt($data->PTT_NAME);?>
                </h5>
                <p class="text-de"><?php echo strip_tags($data->PTT_TEXT);?></p>
                <div class="bottom-box">
                  <!-- <p class="review">CASE <span class="num"><?php echo $results_case['review_cnt'];?></span></p> -->
                </div>
              </div>
            </a>
            <div class="btn-wrap">
              <a class="call" href="javascript:list_detail('<?php echo $data->PTT_IDX;?>');">
                <div class="img-wrap">
                  <img src="/icon/call.png" alt="전화아이콘">
                </div>
                <p><?php echo decrypt($data->PTT_TEL);?></p>
              </a>
              <?php if(!$this -> session ->userdata('LOGIN_IDX')){?>
              <a href="javascript:alert('로그인 후 서비스 가능합니다.');" class="btn-quoteContact">
                <?php }else{?>
                <a href="javascript:void(0)" class="btn-quoteContact <?php if($results_cart[$i]=='true'){?>on<?php }?>"
                  data1="<?php echo $data->PTT_IDX;?>" data2="<?php echo $this -> session ->userdata('LOGIN_IDX');?>"
                  id="makeBtn<?php echo $data->PTT_IDX;?>">
                  <?php }?>
                  <div class="img-wrap">
                    <img src="/icon/estimate.png" alt="견적서아이콘">
                  </div>
                  <span class="blind <?php if($results_cart[$i]=='true'){?>on<?php }?>">견적서 담기</span>
                  <p>견적서<span <?php if($results_cart[$i]=='false'){?>class="on" <?php }?>>&nbsp;담기</span><span
                      <?php if($results_cart[$i]=='true'){?>class="on" <?php }?>>&nbsp;빼기</span></p>
                </a>
            </div>
            <div class="">
              <a href="javascript:void(0);" onclick="location.href='/main/constrCase?key=<?php echo $data->PTT_IDX;?>';"
                class="btn-caseView">시공사례 바로가기 <i class="xi-angle-right-thin"></i><span
                  class="caseTotalNum"><?php echo $results_case['review_cnt'];?></span></a>
            </div>
          </div>
          <?php $i++;}?>
          <?php }?>
        </div>
      </div>
      <div class="quik">
        <a href="javascript:void(0);" class="btn-top"><i class="xi-angle-up-thin"></i><span class="blind">TOP</span></a>
      </div>
      <!-- 업체상세페이지 -->
      <div class="content-view company-view " id="company-view">
        <!-- 로딩페이지 -->
        <div class="loding02" id="list_loding1" style="display: none;"><i class="xi-spinner-5"></i></div>
        <!-- 업체명 뒤로가기 -->
        <div class="top">
          <a href="javascript:void(0);" class="btn-back">
            <img src="../../../icon/arrow09.png" alt="뒤로가기아이콘">
            <span class="blind">뒤로가기</span></a>
          <h3 class="content-title company-title" id="detail_title1">이안하우징</h3>
          <div class="btn-wrap">
            <?php if(!$this -> session ->userdata('LOGIN_IDX')){?>
            <a href="javascript:void(0);" class="btn-heart" id="detail_like" onclick="alert('로그인 후 서비스 이용이 가능합니다.');">
              <?php }else{?>
              <a href="javascript:void(0)" class="btn-heart" id="detail_like">
                <?php }?>
                <div class="icon-wrap">
                </div>
                <span class="blind">하트</span>
              </a>
              <a href="#share-link" rel="modal:open" class="btn-share"><i class="xi-share-alt-o"></i><span
                  class="blind">공유</span></a>
              <div id="share-link">
                <ul>
                  <li><a href="javascript:clipBoard();" id="copy_link">
                      <span class="logo"></span>
                      <span class="logo-label">링크복사</span></a></li>
                  <li><a href="javascript:kakako_sendTo();" id="kakao_feed">
                      <span class="logo"></span>
                      <span class="logo-label">카카오</span></a></li>
                  <li><a href="javascript:naver_share();" id="naver_feed">
                      <span class="logo"></span>
                      <span class="logo-label">네이버</span></a></li>
                </ul>
              </div>
          </div>
        </div>
        <div class="content">
          <div class="row-01">
            <!-- <p class="add" id="detail_addr">광주 동구 서남대로 14</p> -->
            <div class="img-wrap">
              <img src="/img/m01.png" alt="업체로고" id="PTN_IMG">
            </div>
            <div class="text-wrap">
              <p class="text-ti">업체정보</p>
              <ul>
                <li>
                  <div class="icon">
                    <img src="/icon/cp01.png" alt="업체대표자아이콘">
                    <p>대표자</p>
                  </div>
                  <p class="value" id="PTN_CEO">김성찬</p>
                </li>
                <li>
                  <div class="icon">
                    <img src="/icon/cp02.png" alt="경력아이콘">
                    <p>경력</p>
                  </div>
                  <p class="value" id="PTN_CAREER">3년</p>
                </li>
                <li>
                  <div class="icon">
                    <img src="/icon/cp03.png" alt="전문분야아이콘">
                    <p>전문분야</p>
                  </div>
                  <p class="value" id="PTN_TYPE">실내인테리어</p>
                </li>
                <li>
                  <div class="icon">
                    <img src="/icon/cp04.png" alt="시공지역아이콘">
                    <p>시공지역</p>
                  </div>
                  <p class="value" id="PTN_AREA">서울전지역</p>
                </li>
                <!--<li>
                  <div class="icon">
                    <img src="/icon/cp05.png" alt="시공범위아이콘">
                    <p>시공범위</p>
                  </div>
                  <p class="value">인테리어</p>
                </li>-->
              </ul>
            </div>
          </div>
          <div class="row-03">
            <div class="simple-de">
              <p class="text-ti">업체소개</p>
              <p class="text-de" id="PNT_CONTENT">그레이&블랙톤으로 현대적인 감각을 연출한
                수원시 장안구 카페형 퓨전호프 「크루」입니다.
                *시공 비용은 자재,소품,상황에 따라 달라질 수 있습니다. </p>
            </div>
          </div>
          <div class="row-04" id="Constr_div">
            <p class="text-ti">시공사진</p>
            <ul class="photo-wrap" id="constr_img">
              <!--<li>
                <a href="javascript:void(0);" class="btn-photoView">
                  <div class="img-wrap">
                    <img src="/img/m01.png" alt="인테리어시공사진">
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="btn-photoView">
                  <div class="img-wrap">
                    <img src="/img/m01.png" alt="인테리어시공사진">
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="btn-photoView">
                  <div class="img-wrap">
                    <img src="/img/m01.png" alt="인테리어시공사진">
                  </div>
                </a>
              </li>-->
            </ul>
          </div>
        </div>
        <div class="row-05">
          <a href="#modal-inquiry" class="btn-inquiry" rel="modal:open" id="inquiry">문의하기</a>
        </div>
      </div>
      <?php if($this -> session ->userdata('LOGIN_IDX')){ ?>
      <!-- 하단 견적서 아이콘 -->
      <div class="bottomBtn-wrap">
        <div class="btn-wrap">
          <a href="#modal-inquiryAll" rel="modal:open" class="btn-basket">
            <div class="con-box">
              <div class="icon-wrap">
                <img src="../../../icon/estimate03.png" alt="견젹서 아이콘">
              </div>
              <span class="text">시공상담모음</span>
              <span class="cnt" id="makeCnt"><?php echo $makeCart[1];?></span>
            </div>
            <!-- <div class="dot-pulse "></div> -->
            <!-- <div class="LoopingAni">
              <span class="circle01"></span>
              <span class="circle02"></span>
              <span class="circle03"></span>
            </div> -->
          </a>
        </div>
      </div>
      <?php } ?>

    </div>
    <!-- 사진상세 -->
    <div class="photo-view">
      <div class="imgDetail-slider-wrap">
        <div class="swiper-container imgDetail-slider-top">
          <div class="swiper-wrapper" id="photo_view1">
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m01.png" alt="인테리어사진"></div>
              <div class="text-wrap">
                <!-- <p>그레이&블랙톤으로 현대적인 감각을 연출한
                  수원시 장안구 카페형 퓨전호프 「크루」입니다.
                  *시공 비용은 자재,소품,상황에 따라 달라질 수 있습니다. </p> -->
              </div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m02.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m03.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m04.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m05.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m01.png" alt="인테리어사진"></div>
              <div class="text-wrap">
                <!-- <p>그레이&블랙톤으로 현대적인 감각을 연출한
                  수원시 장안구 카페형 퓨전호프 「크루」입니다.
                  *시공 비용은 자재,소품,상황에 따라 달라질 수 있습니다. </p> -->
              </div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m02.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m03.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m04.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m05.png" alt="인테리어사진"></div>
            </div>
          </div>
          <div class="swiper-button-prev"><i class="xi-angle-left-thin"></i></div>
          <div class="swiper-button-next"><i class="xi-angle-right-thin"></i></div>
        </div>
        <div class="swiper-container imgDetail-slider">
          <div class="swiper-wrapper" id="photo_view2">
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m01.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m02.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m03.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m04.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m05.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m01.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m02.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m03.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m04.png" alt="인테리어사진"></div>
            </div>
            <div class="swiper-slide">
              <div class="img-wrap"><img src="/img/m05.png" alt="인테리어사진"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="bg"></div>
      <a href="javascript:void(0);" class="btn-close"><i class="xi-close-thin"></i></a>
    </div>

  </div>
  </div>
</main>
<!----- 푸터 시작 ----->
</div>
<div class="moblie-search">
  <div class="sub">
    <h2 class="m-title">검색</h2>
    <a href="javascript:vold(0)" class="btn-close"><i class="xi-close"></i><span class="blind">닫기</span></a>
  </div>
  <div class="contents">
    <div class="search-form-wrap">
      <form class="search-form" method="get">
        <input type="text" placeholder="동단위로 검색하세요." id="search_map2" class="searchint search_map" autocomplete="off"
          name="search_map" value="">
        <button type="button" class="btn-search"><i class="xi-search"><span class="blind">검색</span></i></button>
      </form>
    </div>
    <ul class="tab-add">
      <li class="on"><a href="javascript:searchMtab('A');">전체</a></li>
      <li><a href="javascript:searchMtab('B');">지역</a></li>
      <li><a href="javascript:searchMtab('C');">지하철역</a></li>
    </ul>
    <div class="result-box result-box01 on">
      <ul id="search_A">
        <li>검색결과가 없습니다.</li>
      </ul>
    </div>
    <div class="result-box result-box02">
      <ul id="search_B">
        <li>검색결과가 없습니다.</li>
      </ul>
    </div>
    <div class="result-box result-box03">
      <ul id="search_C">
        <li>검색결과가 없습니다.</li>
      </ul>
    </div>
  </div>
</div>
<input type="hidden" name="cp_clipBoard" id="cp_clipBoard" value="">
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type="text/javascript">
var cnt_view = "dong";
var pt_key = <?php echo json_encode($Pt_KEY);?>;
var pt_type = <?php echo json_encode($Pt_TYPE);?>;
var pt_name = <?php echo json_encode($Pt_NAME);?>;
var pt_lat = <?php echo json_encode($Pt_LAT);?>;
var pt_lon = <?php echo json_encode($Pt_LON);?>;
var pt_addr = <?php echo json_encode($Pt_ADDR);?>;
var pt_cnt = <?php echo json_encode($Pt_CNT)?>;
var cur_lat = "<?php echo $cur_lat; ?>";
var cur_lon = "<?php echo $cur_lon; ?>";

var Sw_Key = <?php echo json_encode($Sw_Key);?>;
var Sw_Name = <?php echo json_encode($Sw_Name);?>;
var Sw_Num = <?php echo json_encode($Sw_Num);?>;
var Sw_Addr = <?php echo json_encode($Sw_Addr);?>;
var Sw_Lat = <?php echo json_encode($Sw_Lat);?>;
var Sw_Lon = <?php echo json_encode($Sw_Lon)?>;
var Sw_Tel = <?php echo json_encode($Sw_Tel)?>;

var PTT_IDX = "<?php echo $PTT_IDX;?>";
var MET_IDX = "<?php echo $this -> session ->userdata('LOGIN_IDX');?>";

// 문의하기 약관 
$('.btn_agreeBox').click(function() {
  $('.agree_area').toggleClass('on')
});
</script>

<script src="/js/MakeSearch_map.js?v=<?php echo time();?>"></script>
<script src="/js/MakeSearch_control.js?v=<?php echo time();?>"></script>

<!-- x -- 모바일 script 추가 -- x -->

<script src="/js/common.js?v=<?php echo time(); ?>"></script>
<!-- 모바일 script 추가 -->
<script src="/js/aos.js"></script>
<script src="/js/jquery.touchSwipe.min.js"></script>
<!-- x -- 모바일 script 추가 -- x -->
</body>

</html>