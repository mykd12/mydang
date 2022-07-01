<link rel="stylesheet" href="/css/map.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/css/aos.css?v=<?php echo time(); ?>">
<script type="text/javascript"
  src="//dapi.kakao.com/v2/maps/sdk.js?appkey=64e888255177e7c55224d2acfdaa3146&libraries=services"></script>
<script type="text/javascript">
<!--
var MET_IDX = "<?php echo $this -> session ->userdata('LOGIN_IDX');?>";
var lat, lon;
var s_ltat = "<?php echo $myLat;?>";
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
<main id="main" class="search">
  <div class="map-wrap">
    <!-- 동선택 추가 배경 -->
    <!-- <div class="bg-blocker"></div> -->
    <!-- 지도 로딩 -->
    <div class="loding" id="map_loding" style="display:none"><i class="xi-spinner-5"></i></div>
    <!-- 지도 -->
    <div class="map" id="kakao_map">
      <!-- map 컨트롤 -->
      <div class="map-control">
        <!-- 현재위치보기 버튼 -->
        <a href="javascript:getLocation();" class="btn-my-location">
          <span class="blind">현재위치보기</span>
          <!-- <i class="xi-my-location"></i> -->
          <img src="../../../icon/my-location.png" alt="현재위치아이콘">
        </a>
      </div>
    </div>
    <!-- 왼쪽 서치 상권현황 -->
    <div class="left-wrap">
      <!-- 검색바 -->
      <div class="search-form-wrap">
        <form class="search-form" method="get">
          <input type="hidden" name="SCH_IDX" id="SCH_IDX" value="<?php echo $SCH_IDX;?>">
          <input type="hidden" name="loc_lat" id="loc_lat" value="<?php echo $loc_lat;?>">
          <input type="hidden" name="loc_lon" id="loc_lon" value="<?php echo $loc_lon;?>">
          <input type="hidden" name="type" id="type" value="<?php echo $type;?>">
          <input type="hidden" name="p_type" id="p_type" value="<?php echo $p_type;?>">
          <input type="text" placeholder="동단위로 검색하세요." id="search_map" class="searchint search_map" autocomplete="off"
            name="search_map" value="<?php echo $search_map;?>">
          <button type="submit" class="btn-search"><i class="xi-search"><span class="blind">검색</span></i></button>
        </form>
        <div class="radio-box">
          <ul>
            <li>
              <input type="radio" name="search_type" id="store-radio01" class="blind" value="상가"
                <?php if(!$p_type || $p_type=='상가'){ echo "checked"; }?>> <label for="store-radio01">
                <span>상가</span>
                <span class="button-bg"></span>
              </label>
            </li>
            <li> <input type="radio" name="search_type" id="office-radio02" class="blind" value="사무실"
                <?php if($p_type=='사무실'){ echo "checked"; }?>> <label for="office-radio02">
                <span>오피스</span>
              </label>
            </li>
          </ul>
        </div>
        <div class="search-result">
          <div class="result searhResult" id="searhResult">
            <span class="m-c"></span>
            <p id="kwd_list" class="kwd_list">검색결과가 없습니다.</p>
          </div>
        </div>
      </div>
      <!-- 상권현황 -->
      <div class="click-box">
        <!-- 상권현황 아이콘-->
        <a href="javascript:void(0);" class="btn-stores01">
          <div class="img-wrap"></div>
          <p>상권분석</p>
        </a>
        <!-- 상권현황 셀렉트 -->
        <div class="select-box select-box01" data-aos="fade-up">
          <div class="row-01">
            <p class="sel-ti">업종</p>
            <a href="javascript:store_reset();" class="btn-reset">초기화</a>
            <div class="select-wrap">
              <i class></i>
              <select name="storeA" id="storeA" onChange="chnQnaType(this.value)">
                <option value="0" data="">대분류 선택</option>
                <option value="Q" data="외식업">외식업</option>
                <option value="F" data="서비스업">서비스업</option>
                <option value="D" data="소매업">소매업</option>
              </select>
            </div>
            <div class="select-wrap">
              <select id="storeB" name="storeB" disabled>
              </select>
            </div>
          </div>
          <div class="row-02">
            <p class="sel-ti">지도에서 분석을 원하는 동을 선택해주세요.</p>
            <div class="int-box">
              <input type="text" id="selectDong" readonly />
            </div>
          </div>
          <div class="btn-wrap">
            <a href="#modal-analysis" class="btn-analysis01" rel="modal:open" id="analysis"><span>상권분석하기</span></a>
            <a href="#modal-ernngClclt" class="btn-ernngClclt" rel="modal:open" id="ernngClclt"><span>수익계산하기</span></a>
          </div>
          <div class="row-03">
            <p class="sel-ti">점포밀집도</p>
            <ul class="color-list">
              <li class>
                <div class="circle"></div>
                <p class="text">매우낮음</p>
              </li>
              <li>
                <div class="circle"></div>
                <p>낮음</p>
              </li>
              <li>
                <div class="circle"></div>
                <p>보통</p>
              </li>
              <li>
                <div class="circle"></div>
                <p>높음</p>
              </li>
              <li>
                <div class="circle"></div>
                <p>매우높음</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="m-bg"></div>
      </div>
    </div>
    <!-- 모바일 하단 매물리스트 버튼 -->
    <div class="Mbtn-wrap">
      <a href="javascript:void(0)" class="Mbtn-List">
        <p class="text-s">매물보기<span class="num PPT_CNT"><?=number_format($results_cnt);?></span></p>
        <p class="text-m"><i class="xi-map-o"></i> 지도보기</p>
      </a>
    </div>
    <!-- 오른쪽 매물리스트 슬라이더 창 -->
    <div class="right-slider">
      <!-- 매물리스트 로딩페이지 -->
      <div class="loding01" id="list_loding" style="display:none;"><i class="xi-spinner-5"></i></div>
      <!-- 매물리스트 오른쪽으로 숨기기 버튼  -->
      <div class="btn-slider">
        <a href="javascript:void(0);">
          <span class="blind">이동</span>
          <i class="xi-angle-right-thin"></i>
        </a>
      </div>
      <!-- 상단 필터  -->
      <div class="row01">
        <!-- 필터 리스트 -->
        <div class="slider-wrap">
          <div class="swiper-container option-slider">
            <div class="end-bg"></div>
            <div class="swiper-wrapper">
              <!-- 모바일 전체 필터버튼 -->
              <!-- 모바일 전체 필터버튼 -->
              <!-- 모바일 전체 필터버튼 -->
              <!-- 모바일 전체 필터버튼 -->
              <!-- 모바일 전체 필터버튼 -->
              <div class="swiper-slide mobile-option">
                <a href="javascript:void(0);" class="btn-modal btn-modal-all">
                  <img src="../../../icon/all.png" alt="전체필터아이콘">
                  <p></p>
                </a>
              </div>
              <!-- x -- 모바일 전체 필터버튼 -- x -->
              <!-- x -- 모바일 전체 필터버튼 -- x -->
              <!-- x -- 모바일 전체 필터버튼 -- x -->
              <!-- x -- 모바일 전체 필터버튼 -- x -->
              <!-- x -- 모바일 전체 필터버튼 -- x -->
              <div class="swiper-slide swiper-slide01" id="optionTabA">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>보증금</p>
                </a>
              </div>
              <div class="swiper-slide swiper-slide01" id="optionTabB">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>임대료</p>
                </a>
              </div>
              <div class="swiper-slide swiper-slide01" id="optionTabC">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>권리금</p>
                </a>
              </div>
              <div class="swiper-slide swiper-slide01" id="optionTabD">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>면적</p>
                </a>
              </div>
              <!-- <div class="swiper-slide swiper-slide01" id="optionTabE">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>매물 구분</p>
                </a>
              </div> -->
              <div class="swiper-slide swiper-slide01" id="optionTabF">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>층수</p>
                </a>
              </div>
              <div class="swiper-slide swiper-slide01" id="optionTabG">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>주차</p>
                </a>
              </div>
              <div class="swiper-slide swiper-slide01" id="optionTabH">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>화장실</p>
                </a>
              </div>
              <div class="swiper-slide swiper-slide01" id="optionTabI">
                <a href="javascript:void(0);" class="btn-modal">
                  <div class="img-wrap">
                  </div>
                  <p>기타</p>
                </a>
              </div>
            </div>
            <!-- <div class="swiper-button-prev"><i class="xi-caret-up"></i></div>
            <div class="swiper-button-next"><i class="xi-caret-up"></i></div> -->
          </div>
        </div>
        <!-- 옵션 리스트 -->
        <ul class="option-wrap">
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">보증금</h5>
              <a href="javascript:type_A_all();" class="btn-all">초기화</a>
              <div class="con">
                <div class="demo__body">
                  <input type="hidden" name="optAdata" id="optAdata" class="optAdata" value="0">
                  <input id="optA" type="text" step="100" name="optA" class="irs-hidden-input" tabindex="-1"
                    readonly="">
                </div>
              </div>

            </div>
            <div class="bg"></div>
          </li>
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">임대료</h5>
              <a href="javascript:type_B_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <div class="demo__body">
                  <input type="hidden" name="optBdata" id="optBdata" class="optBdata" value="0">
                  <input id="optB" type="text" step="100" name="optB" value="" class="irs-hidden-input" tabindex="-1"
                    readonly="">
                </div>
              </div>
            </div>
            <div class="bg"></div>
          </li>
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">권리금</h5>
              <a href="javascript:type_C_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <div class="demo__body">
                  <input type="hidden" name="optCdata" id="optCdata" class="optCdata" value="0">
                  <input id="optC01" type="text" step="100" name="optC01" class="irs-hidden-input" tabindex="-1"
                    readonly="">
                </div>
                <ul>
                  <li>
                    <input type="radio" id="optC1" name="optC" value="유">
                    <label for="optC1">있음</label>
                  </li>
                  <li>
                    <input type="radio" id="optC2" name="optC" value="무">
                    <label for="optC2">없음</label>
                  </li>
                  <li>
                    <input type="radio" id="optC3" name="optC" value="협의가능">
                    <label for="optC3">협의가능</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg"></div>
          </li>
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">
                전용면적
                <a href="javascript:void(0);" class="btn-change">
                  단위변환<i class="xi-renew"></i>
                </a>
              </h5>
              <a href="javascript:type_D_all(0);" class="btn-all">전체</a>
              <div class="con">
                <div class="demo__body">
                  <input type="hidden" name="optDdata" id="optDdata" class="optDdata" value="0">
                  <input id="optD" type="text" step="100" name="optD" value="" class="irs-hidden-input" tabindex="-1"
                    readonly="">
                </div>
              </div>
            </div>
            <div class="bg"></div>
          </li>
          <!-- <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">매물구분</h5>
              <a href="javascript:type_E_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <input type="hidden" name="optEdata" id="optEdata" class="optEdata" value="0">
                <ul>
                  <li>
                    <input type="radio" id="optE1" name="optE" value="상가">
                    <label for="optE1">상가</label>
                  </li>
                  <li>
                    <input type="radio" id="optE2" name="optE" value="사무실">
                    <label for="optE2">사무실</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg"></div>
          </li> -->
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">층수</h5>
              <a href="javascript:type_F_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <input type="hidden" name="optFdata" id="optFdata" class="optFdata" value="0">
                <ul>
                  <li>
                    <input type="radio" id="optF1" name="optF" value="2층이상">
                    <label for="optF1">2층이상</label>
                  </li>
                  <li>
                    <input type="radio" id="optF2" name="optF" value="1층만">
                    <label for="optF2">1층만</label>
                  </li>
                  <li>
                    <input type="radio" id="optF3" name="optF" value="지하층">
                    <label for="optF3">지하층</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg"></div>
          </li>
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">주차</h5>
              <a href="javascript:type_G_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <div class="demo__body">
                  <input type="hidden" name="optGdata" id="optGdata" class="optGdata" value="0">
                  <input id="optG" type="hidden" step="100" name="optG" value="" class="irs-hidden-input" tabindex="-1"
                    readonly="">
                </div>
              </div>
            </div>
            <div class="bg"></div>
          </li>
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">화장실</h5>
              <a href="javascript:type_H_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <input type="hidden" name="optHdata" id="optHdata" class="optHdata" value="0">
                <ul>
                  <li>
                    <input type="radio" id="optH1" name="optH" value="외부">
                    <label for="optH1">외부</label>
                  </li>
                  <li>
                    <input type="radio" id="optH2" name="optH" value="내부">
                    <label for="optH2">내부</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg"></div>
          </li>
          <li class="op-box02">
            <div class="op-box op-box01">
              <h5 class="text-ti">기타</h5>
              <a href="javascript:type_I_all(0);" class="btn-all">초기화</a>
              <div class="con">
                <input type="hidden" name="optIdata" id="optIdata" class="optIdata" value="0">
                <ul class="etcCh-list">
                  <li>
                    <input type="checkbox" id="optI1" name="optI[]" value="인테리어">
                    <label for="optI1">인테리어</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI2" name="optI[]" value="엘리베이터">
                    <label for="optI2">엘리베이터</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI3" name="optI[]" value="시스템에어컨">
                    <label for="optI3">시스템에어컨</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI4" name="optI[]" value="루프탑">
                    <label for="optI4">루프탑</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI5" name="optI[]" value="보안시스템">
                    <label for="optI5">보안시스템</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI6" name="optI[]" value="입출입관리">
                    <label for="optI6">입출입관리</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI7" name="optI[]" value="창고">
                    <label for="optI7">창고</label>
                  </li>
                  <li>
                    <input type="checkbox" id="optI8" name="optI[]" value="복층">
                    <label for="optI8">복층</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="bg"></div>
          </li>
        </ul>
      </div>
      <!-- 매물리스트 -->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <!-- 모바일 하단 슬라이더-->
      <div class="bottomList-slider">
        <!-- 매물 list top select -->
        <div class="row02">
          <div class="bar-wrap" style="height: 35px; line-height: 25px;">
            <span class="bar"></span>
          </div>
          <p>매물<span class="cnt PPT_CNT" id="PPT_CNT"><?=number_format($results_cnt);?></span></p>
          <a href="javascript:void(0);" class="btn-unit">
            단위변환<i class="xi-refresh"></i>
          </a>
          <div class="select_wrap select_wrap02">
            <div class="select"><span>추천순</span> <i class="xi-caret-down-min"></i> </div>
            <ul class="depth02 array_select array_select02">
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_best" class="sort blind" value="추천순" checked="">
                  <label for="sort_best"><span>추천순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_new" class="sort blind" value="최신순">
                  <label for="sort_new"><span>최신순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_wide" class="sort blind" value="넓은면적순">
                  <label for="sort_wide"> <span>넓은면적순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_narrow" class="sort blind" value="좁은면적순">
                  <label for="sort_narrow"><span>좁은면적순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_down" class="sort blind" value="보증금내림순">
                  <label for="sort_down"><span>보증금내림순</span></label>
                </div>
              </li>
              <li>
                <div class="option">
                  <input type="radio" name="sort" id="sort_up" class="sort blind" value="보증금오름순">
                  <label for="sort_up"><span>보증금오름순</span></label>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- 매물 list -->
        <div class="conList-slider product-list">
          <?php if($results_cnt > 0){?>
          <?php foreach($results[0] as $data){?>
          <div class="con-row">
            <a href="javascript:list_detail(<?php echo $data[0]->PPT_IDX;?>);" class="product clearfix"
              data1="<?php echo "{$data[0]->PPT_LAT}"?>" data2="<?php echo "{$data[0]->PPT_LON}"?>">
              <div class="img-wrap"><img src="/uploads/<?php echo "{$data[1]}"?>" alt="매물사진"></div>
              <div class="text-wrap">
                <p class="row01"><span class="pick blind">선점</span><span
                    class="title"><?php echo "{$data[0]->PPT_TITLE}"?></span></p>
                <p class="row03"><span class="area"><?php echo "{$data[0]->PPT_SIZE_B}"?></span><span
                    class="text-unit">m²</span></p>
                <p class="row02"><span class="type">월세 </span><span
                    class="deposit"><?php echo number_format($data[0]->PPT_PRICE_B);?></span> / <span
                    class="monthly-rent"><?php echo number_format($data[0]->PPT_PRICE_A);?></span></p>
                <?php if($data[0]->PPT_PRICE_C_ETC=="비공개" || $data[0]->PPT_PRICE_C_ETC=="권리금 없음"){?>
                <?php $PPT_PRICE_C_ETC= str_replace('권리금' , '', $data[0]->PPT_PRICE_C_ETC);?>
                <p class="row04">권리금<span class="expense"> <?php echo $PPT_PRICE_C_ETC;?></span></p>
                <?php }else if($data[0]->PPT_PRICE_C_ETC=="협의가능"){?>
                <p class="row04">권리금<span class="expense"> <?php echo number_format($data[0]->PPT_PRICE_C);?>
                    <?php echo $data[0]->PPT_PRICE_C_ETC;?></span></p>
                <?php }else{?>
                <p class="row04">권리금<span class="expense"> <?php echo number_format($data[0]->PPT_PRICE_C);?></span></p>
                <?php }?>

                <?php if($data[0]->PPT_EXPOSURE=='노출'){?>
                <p class="row05 add"><?php echo decrypt($data[0]->PPT_ADDR1_B);?></p>
                <?php }else{?>
                <p class="row05 add"><?php echo $data[0]->PPT_AREA_A;?> <?php echo $data[0]->PPT_AREA_B;?>
                  <?php echo $data[0]->PPT_AREA_D;?></p>
                <?php }?>
              </div>
            </a>
            <?php if(!$this -> session ->userdata('LOGIN_IDX')){?>
            <a href="javascript:void(0);" class="btn-heart" onclick="alert('로그인 후 서비스 이용 가능합니다.');" id="">
              <?php }else{?>
              <?$like="true";?>
              <a href="javascript:void(0);" class="btn-heart <?if($data[2]==$like){ echo " on" ;}?>"
                onclick="productCart('click','<?php echo $data[0]->PPT_IDX;?>',
                '<?php echo $this -> session ->userdata('LOGIN_IDX');?>','<?php echo $data[0]->PST_IDX;?>');"
                id="like_btn<?php echo $data[0]->PPT_IDX;?>">
                <?php }?>
                <div class="icon-wrap"></div><span class="blind">하트</span>
              </a>
          </div>
          <?php }?>
          <?php }?>

        </div>
      </div>
      <!-- 매물상세 -->
      <div class="product-view content-view" id="product-view">
        <div class="loding02" id="list_loding1"><i class="xi-spinner-5"></i></div>
        <div class="top">
          <a href="javascript:void(0);" class="btn-back">
            <img src="../../../icon/arrow09.png" alt="뒤로가기아이콘">
            <span class="blind">뒤로가기</span></a>
          <h3 class="product-title content-title" id="PPT_TITLE">성수동 1가</h3>
        </div>
        <div class="content">
          <div class="row-01">
            <div class="top-con">
              <div class="img-wrap">
                <img src="/img/m08.png" alt="매물사진" id="PPT_IMG">
                <div class="img-more"><i class="xi-plus-thin"></i></div>
              </div>
              <div class="text-wrap">
                <!-- <p class="row01"><span class="pick">선점업종</span><span class="push">추천업종</span></p> -->
                <p class="row01">매물번호 <span class="num" id="PPT_NUM">45864332</span></p>
                <p class="row02">보증금<span class="deposit" id="PPT_PRICE_A_D"> 2,000만</span> / <span
                    class="type">월세</span>
                  <span class="monthly-rent" id="PPT_PRICE_B_D">400만</span>
                </p>
                <p class="row03">권리금 <span class="expense" id="PPT_PRICE_C">없음</span></p>
              </div>
            </div>
            <div class="bottom-con">
              <p class="row04 add" id="PPT_ADDR1_B">서울특별시 성동구 성수동 1가</p>
              <pre class="text-box" id="PPT_ETC">
                <p>서울숲뷰를 바로 보실수 있는 반지층입니다.</p>
                <p>무리권리상가로 대수선중입니다.</p>
                <p>전용 20p으로 공간이 좋습니다.</p>
                <br>
                <p>추천업종 : 카페,미용실,쇼룸,네일아트,판매점 등</p>
              </pre>
            </div>
            <div class="btn-wrap">
              <a href="javascript:void(0)" class="btn-heart" id="detail_like">
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
          <div class="row-02">
            <h5>매물정보</h5>
            <a href="javascript:void(0);" class="btn-unit">
              단위변환<i class="xi-renew"></i>
            </a>
            <ul class="icon-list">
              <li>
                <div class="icon">
                  <img src="/icon/bop01.png" alt="상가형태아이콘">
                </div>
                <p class="ti">상가형태</p>
                <p id="PPT_TYPE">근린상가</p>
              </li>
              <li>
                <div class="icon">
                  <img src="/icon/bop02.png" alt="전용면적아이콘">
                </div>
                <p class="ti">전용면적</p>
                <p><span class="area" id="PPT_SIZE_D"></span><span class="text-unit">m²</span></p>
              </li>
              <li>
                <div class="icon">
                  <img src="/icon/bop03.png" alt="층수아이콘">
                </div>
                <p class="ti">층수</p>
                <p id="PPT_STOREYS">3층</p>
              </li>
              <li>
                <div class="icon">
                  <img src="/icon/bop04.png" alt="관리비아이콘">
                </div>
                <p class="ti">관리비</p>
                <p id="PPT_PRICE_D">있음</p>
              </li>
            </ul>
            <p class="right-de"><span> 공인중개사 사무소 제공</span></p>
            <ul class="samllIcon-list">
              <li id="optionA">
                <!-- <li id="OPTION_D_F" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op01.png" alt="즉시입주가능아이콘">
                </span>
                즉시입주가능
              </li>
              <li id="optionB">
                <!-- <li id="OPTION_D_D" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op02.png" alt="냉방">
                </span>
                냉방
              </li>
              <li id="optionC">
                <!-- <li id="OPTION_D_I" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op03.png" alt="완공날짜아이콘">
                </span>
                2000년09월11일
              </li>
              <li id="optionD">
                <!-- <li id="OPTION_D_E" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op04.png" alt="주차공용주차아이콘">
                </span>
                주차 <span class="num">3</span>대
              </li>
              <li id="optionE">
                <!-- <li id="OPTION_D_C" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op05.png" alt="내부(남녀분리)아이콘">
                </span>
                내부(공용)
              </li>
              <li id="optionF">
                <!-- <li id="OPTION_D_A" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op06.png" alt="인테리어">
                </span>
                인테리어
              </li>
              <li id="optionG">
                <!-- <li id="OPTION_D_G" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op07.png" alt="전층엘레베이터아이콘">
                </span>
                전층 엘레베이터
              </li>
              <li id="optionH">
                <!-- <li id="OPTION_D_M" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op08.png" alt="테라스">
                </span>
                테라스
              </li>
              <li id="optionI">
                <!-- <li id="OPTION_D_J" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op09.png" alt="루프탑">
                </span>
                루프탑
              </li>
              <li id="optionJ">
                <!-- <li id="OPTION_D_j" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op10.png" alt="창고">
                </span>
                창고
              </li>
              <li id="optionK">
                <!-- <li id="OPTION_D_H" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op11.png" alt="복층">
                </span>
                복층
              </li>
              <li id="optionL">
                <!-- <li id="OPTION_D_K" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op12.png" alt="보안시스템">
                </span>
                보안시스템
              </li>
              <li id="optionM">
                <!-- <li id="OPTION_D_K" style="display:none;"> -->
                <span class="small-icon">
                  <img src="/icon/s_op13.png" alt="입출입관리">
                </span>
                입출입관리
              </li>
              <!-- <li id="OPTION_D_B" style="display:none;">
                    <span class="small-icon">
                      <img src="icon/s_op02.png" alt="신규입점아이콘">
                    </span>
                    신규입점
                  </li> -->
            </ul>

          </div>
          <div class="row-07">
            <h5>주변 행정기관</h5>
            <div class="tab-wrap">
              <ul class="tab-menu">
                <li class="on">행정기관<span class="num" id="organAcnt">2</span></li>
                <li>병원<span class="num" id="organBcnt">3</span></li>
                <li>학교<span class="num" id="organCcnt">5</span></li>
              </ul>
              <div class="con-wrap">
                <div class="con">
                  <ul class="clearfix" id="organAlist">
                  </ul>
                </div>
                <div class="con">
                  <ul id="organBlist">
                  </ul>
                </div>
                <div class="con">
                  <ul id="organClist">
                  </ul>
                </div>
                <!--<div>
                  <a class="btn-more" href="javascirpt:void(0)">더보기</a>
                </div>-->
              </div>
            </div>
          </div>
          <div class="row-03">
            <h5>위치정보</h5>
            <div class="map-wrap">
              <p class="right-de" id="PPT_ADDR">서울 특별시 성동구 성수동 1가</p>
              <div class="map" id="ppt_map"></div>
            </div>
            <!--<div class="lock" id="map_none">
              <div class="icon-wrap">
                <img src="icon/lock.png" alt="자물쇠">
              </div>
            </div>
            <p>위 매물은 상세주소를 공개하지 않는 매물입니다.</p>-->
          </div>
          <div class="row-04">
            <!--<h5>공인중개사 안내</h5>-->
            <ul>
              <li>
                <div class="img-wrap">
                  <img src="/img/broker.png" alt="공인중개사사진" id="BKT_IMG_SAVE">
                </div>
              </li>
              <li>
                <div class="text-wrap">
                  <p id="BKT_BUSINESSNAME_D">상원 공인중개사공인중개사 사무소</p>
                  <p id="BKT_ADDR_D" class="add">주소주소주소주소주소주주소주소주주소주소주주소주소주주소주소주소주소</p>
                  <p id="BKT_NAME_TEL_D">대표 정유섭 / 010-1234-5678</p>
                </div>
              </li>
            </ul>
          </div>
          <div class="row-05" id="recommDIV">
            <h5>이 중개사의 다른매물 추천</h5>
            <div class="product-slider-wrap">
              <div class="swiper-container product-slider bottom-slider">
                <div class="swiper-wrapper" id="recomm_swiper">
                </div>
                <div class="swiper-button-prev"><i class="xi-angle-left-thin"></i></div>
                <div class="swiper-button-next"><i class="xi-angle-right-thin"></i></div>
              </div>
            </div>
          </div>
          <div class="footer">
            <p class="copyright">Copyright © Developer Noah Co. All rights reserved.</p>
          </div>
        </div>
        <div class="row-06">
          <a href="javascript:void(0)" class="btn-inquiry">매물문의하기</a>
          <p class="text-box"># 매물번호 <span class="num" id="PPT_NUM1">45864332</span></p>

        </div>

        <!-- 매물문의하기폼 -->
        <div id="prp-inquiry" class="modal-inquiry">
          <div class="bg"></div>
          <!-- <div class="top-wrap">
            <ul>
              <li>
                <div class="img-wrap">
                  <img src="images/interior.png" alt="공인중개사사진" id="BKT_IMG_SAVE_Q">
                </div>
              </li>
              <li>
                <p id="BKT_BUSINESSNAME_Q">상원 공인중개사 사무소</p>
                <p id="BKT_NAME_TEL_Q">대표 정유섭 / 담당자 정유섭</p>
              </li>
            </ul>
            <p class="text-box"># 매물번호 <span class="num" id="PPT_NUM2">45864332</span></p>
          </div> -->
          <div class="form-wrap">
            <h3>중개사에게 문의 해보세요.</h3>
            <form name="frmQna" id="frmQna" method="post">
              <input type="hidden" name="bQnaIdx" id="bQnaIdx" value="" />
              <input type="hidden" name="userIdx" id="userIdx"
                value="<?php echo $this -> session ->userdata('LOGIN_IDX');?>" />
              <div class="name_box int_box">
                <label for="bQnaName" id="label_name" class="lb1">이름</label>
                <input type="text" id="bQnaName" name="bQnaName" placeholder="홍길동" class="int" maxlength="41" value=""
                  autocomplete="off">
                <!-- <p class="error">숫자,특수기호,공백사용불가</p>
                  <p class="error01">이름을 입력해주세요.</p> -->
              </div>
              <div class="tel_box int_box">
                <label for="bQnaTel" id="label_tel" class="lb2">연락받을 번호</label>
                <input type="text" id="bQnaTel" name="bQnaTel" placeholder="010 - **** - ****" class="int"
                  maxlength="41" value="" autocomplete="off">
                <!-- <p class="error">특수기호,공백사용불가</p>
                <p class="error01">휴대폰 번호를 입력해주세요.</p> -->
              </div>
              <div class="agree_area">
                <div class="form_checkbox">
                  <input class="check_box" id="allAgree" name="allAgree" type="checkbox">
                  <label for="allAgree">전체 약관에 동의합니다. (필수)</label>
                </div>
                <!-- <p class="agree_text ">전체 약관에 동의합니다. (필수)</p> -->
                <button type="button" class="btn_agreeBox"><span class="blind">약관 보기</span></button>
                <div class="ly_agree_box"><a href="/main/policy/#policy04" target="_blank">
                    개인정보 수집 및 이용 동의 (필수)
                    <span class="text_info">약관보기</span>
                  </a><a href="/main/policy/#policy05" target="_blank">
                    개인정보 제 3자 제공 동의 (필수)
                    <span class="text_info">약관보기</span>
                  </a>
                </div>
              </div>
              <div class="btn-wrap">
                <a href="javascript:bQnaSubmit();" class="btn-apply">신청하기</a>
                <a href="javascript:void(0)" class="btn-cl" style="background:#333;">취소</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- 위로 바로가기 -->
      <div class="quik">
        <a href="javascript:void(0);" class="btn-top"><i class="xi-angle-up-thin"></i><span class="blind">TOP</span></a>
      </div>
    </div>
    <!-- 사진상세 -->
    <div class="photo-view">
      <div class="imgDetail-slider-wrap">
        <div class="swiper-container imgDetail-slider-top">
          <div class="swiper-wrapper" id="detail_img">
          </div>
          <div class="swiper-button-prev"><i class="xi-angle-left-thin"></i></div>
          <div class="swiper-button-next"><i class="xi-angle-right-thin"></i></div>
        </div>
        <div class="swiper-container imgDetail-slider">
          <div class="swiper-wrapper" id="detail_img2">
          </div>
        </div>
      </div>
      <div class="bg"></div>
      <a href="javascript:void(0);" class="btn-close"><i class="xi-close-thin"></i></a>
    </div>
    <!-- 지도 위 점포표현-->
    <!-- <div class="map-color">
          <div class="red-saturation saturation"><span>동명동</span></div>
          <div class="orange-saturation saturation"><span>동명동</span></div>
          <div class="yellow-saturation saturation"><span>동명동</span></div>
          <div class="green-saturation saturation"><span>동명동</span></div>
          <div class="blue-saturation saturation"><span>동명동</span></div>
          <div class="blue-saturation saturation"><span>동명동</span></div>
        </div>
        <div class="actual-location">
          <div class="text-wrap">
            <p class="sector">미용실</p>
            <p class="price01">1000만</p>
            <p class="price02">1000만</p>
          </div>
        </div>
        <div class="current-location">
          <span class="num">0</span>
        </div> -->
  </div>
</main>
<input type="hidden" name="cp_clipBoard" id="cp_clipBoard" value="">
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

</body>
<!-- 전체필터 옵션 -->
<!-- 전체필터 옵션 -->
<!-- 전체필터 옵션 -->
<!-- 전체필터 옵션 -->
<!-- 전체필터 옵션 -->
<div class="option-all" data-aos="fade-up">
  <div class="top-wrap">
    <h2 class="m-title">명당필터</h2>
    <a href="javascript:void(0)" class="btn_close"><i class="xi-close"></i><span class="blind">닫기</span></a>
  </div>
  <div class="op-box-wrap">
    <div class="op-box">
      <h5 class="text-ti">보증금</h5>
      <a href="javascript:type_A_all();" class="btn-all">초기화</a>
      <div class="con">
        <div class="demo__body">
          <input type="hidden" name="optAdata" id="optAdata" class="optAdata" value="0">
          <input id="optA01" type="text" step="100" name="optA01" class="irs-hidden-input" tabindex="-1" readonly="">
        </div>
      </div>
    </div>
    <div class="op-box">
      <h5 class="text-ti">임대료</h5>
      <a href="javascript:type_B_all(0);" class="btn-all">초기화</a>
      <div class="con">
        <div class="demo__body">
          <input type="hidden" name="optBdata" id="optBdata" class="optBdata" value="0">
          <input id="optB01" type="text" step="100" name="optB01" value="" class="irs-hidden-input" tabindex="-1"
            readonly="">
        </div>
      </div>
    </div>
    <div class="op-box">
      <h5 class="text-ti">권리금</h5>
      <a href="javascript:type_C_all(0);" class="btn-all">초기화</a>
      <div class="con">
        <div class="demo__body">
          <input type="hidden" name="optCdata" id="optCdata" class="optCdata" value="0">
          <input id="optC001" type="text" step="100" name="optC001" class="irs-hidden-input" tabindex="-1" readonly="">
        </div>
        <ul>
          <li>
            <input type="radio" id="optC0111" name="optC0011" value="유">
            <label for="optC0111">있음</label>
          </li>
          <li>
            <input type="radio" id="optC0122" name="optC0011" value="무">
            <label for="optC0122">없음</label>
          </li>
          <li>
            <input type="radio" id="optC0133" name="optC0011" value="협의가능">
            <label for="optC0133">협의가능</label>
          </li>
        </ul>
      </div>
    </div>
    <div class="op-box">
      <h5 class="text-ti">
        전용면적
        <a href="javascript:void(0);" class="btn-change01">
          단위변환<i class="xi-renew"></i>
        </a>
      </h5>
      <a href="javascript:type_D_all(0);" class="btn-all">초기화</a>
      <div class="con">
        <div class="demo__body">
          <input type="hidden" name="optDdata" id="optDdata" class="optDdata" value="0">
          <input id="optD01" type="text" step="100" name="optD01" value="" class="irs-hidden-input" tabindex="-1"
            readonly="">
        </div>
      </div>
    </div>
    <!-- <div class="op-box">
      <h5 class="text-ti">매물구분</h5>
      <a href="javascript:type_E_all(0);" class="btn-all">초기화</a>
      <div class="con">
        <input type="hidden" name="optEdata" id="optEdata" class="optEdata" value="0">
        <ul>
          <li>
            <input type="radio" id="optE011" name="optE01" value="상가">
            <label for="optE011">상가</label>
          </li>
          <li>
            <input type="radio" id="optE012" name="optE01" value="사무실">
            <label for="optE012">사무실</label>
          </li>
        </ul>
      </div>
    </div> -->
    <div class="op-box">
      <h5 class="text-ti">층수</h5>
      <a href="javascript:type_F_all(0);" class="btn-all">초기화</a>
      <div class="con">
        <input type="hidden" name="optFdata" id="optFdata" class="optFdata" value="0">
        <ul>
          <li>
            <input type="radio" id="optF011" name="optF01" value="2층이상">
            <label for="optF011">2층이상</label>
          </li>
          <li>
            <input type="radio" id="optF012" name="optF01" value="1층만">
            <label for="optF012">1층만</label>
          </li>
          <li>
            <input type="radio" id="optF013" name="optF01" value="지하층">
            <label for="optF013">지하층</label>
          </li>
        </ul>
      </div>
    </div>
    <div class="op-box">
      <h5 class="text-ti">주차</h5>
      <a href="javascript:type_G_all(0);" class="btn-all">초기화</a>
      <div class="con">
        <div class="demo__body">
          <input type="hidden" name="optGdata" id="optGdata" class="optGdata" value="0">
          <input id="optG01" type="hidden" step="100" name="optG01" value="" class="irs-hidden-input" tabindex="-1"
            readonly="">
        </div>
      </div>
    </div>
    <div class="op-box">
      <h5 class="text-ti">화장실</h5>
      <a href="javascript:type_H_all();" class="btn-all">초기화</a>
      <div class="con">
        <input type="hidden" name="optHdata" id="optHdata" class="optHdata" value="0">
        <ul>
          <li>
            <input type="radio" id="optH011" name="optH01" value="외부">
            <label for="optH011">외부</label>
          </li>
          <li>
            <input type="radio" id="optH012" name="optH01" value="내부">
            <label for="optH012">내부</label>
          </li>
        </ul>
      </div>
    </div>
    <div class="op-box">
      <h5 class="text-ti">기타</h5>
      <a href="javascript:type_I_all();" class="btn-all">초기화</a>
      <div class="con">
        <input type="hidden" name="optIdata" id="optIdata" class="optIdata" value="0">
        <ul class="etcCh-list">
          <li>
            <input type="checkbox" id="optI011" name="optI01[]" value="인테리어">
            <label for="optI011">인테리어</label>
          </li>
          <li>
            <input type="checkbox" id="optI012" name="optI01[]" value="엘리베이터">
            <label for="optI012">엘리베이터</label>
          </li>
          <li>
            <input type="checkbox" id="optI013" name="optI01[]" value="시스템에어컨">
            <label for="optI013">시스템에어컨</label>
          </li>
          <li>
            <input type="checkbox" id="optI014" name="optI01[]" value="루프탑">
            <label for="optI014">루프탑</label>
          </li>
          <li>
            <input type="checkbox" id="optI015" name="optI01[]" value="보안시스템">
            <label for="optI015">보안시스템</label>
          </li>
          <li>
            <input type="checkbox" id="optI016" name="optI01[]" value="입출입관리">
            <label for="optI016">입출입관리</label>
          </li>
          <li>
            <input type="checkbox" id="optI017" name="optI01[]" value="창고">
            <label for="optI017">창고</label>
          </li>
          <li>
            <input type="checkbox" id="optI018" name="optI01[]" value="복층">
            <label for="optI018">복층</label>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="btn-wrap">
    <a href="javascript:void(0);" class="btn-reset" id="optionMreset">초기화</a>
  </div>
</div>
<div class="bg " data-aos="fade-in" data-aos-duration="400"></div>
<!-- x -- 전체필터 옵션 -- x -->
<!-- x -- 전체필터 옵션 -- x -->
<!-- x -- 전체필터 옵션 -- x -->
<!-- x -- 전체필터 옵션 -- x -->

<div id="modal-inquiry" class="modal-inquiry">
  <div class="top-wrap">
    <ul>
      <li>
        <div class="img-wrap">
          <img src="" alt="공인중개사사진" id="BKT_IMG_SAVE_Q">
        </div>
      </li>
      <li>
        <p id="BKT_BUSINESSNAME_Q"></p>
        <p id="BKT_NAME_TEL_Q"></p>
      </li>
    </ul>
    <p class="text-box"># 매물번호 <span class="num" id="PPT_NUM2">45864332</span></p>
  </div>
  <!-- <div class="contents">
    <h3>문의 신청</h3>
    <div class="name_box int_box">
      <label for="MET_NAME" id="label_name" class="lb1">이름</label>
      <input type="text" id="MET_NAME" name="MET_NAME" placeholder="홍길동" class="int" maxlength="41" value=""
        autocomplete="off">
    </div>
    <div class="tel_box int_box">
      <label for="MET_TEL" id="label_tel" class="lb2">휴대폰번호</label>
      <input type="text" id="MET_TEL" name="MET_TEL" placeholder="010 - **** - ****" class="int" maxlength="41" value=""
        autocomplete="off">
    </div>
    <button type="button" class="btn-apply" id="qna_btn">신청하기</button>
  </div> -->
  <!-- <div class="bottom-wrap">
 추가내용
</div> -->
</div>
<input type="hidden" name="cp_clipBoard" id="cp_clipBoard" value="">
<script src="https://developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type="text/javascript">
var cnt_view = "dong";
var ds_key = <?php echo json_encode($Ds_KEY);?>;
var ds_name = <?php echo json_encode($Ds_NAME);?>;
var ds_lat = <?php echo json_encode($Ds_LAT);?>;
var ds_lon = <?php echo json_encode($Ds_LON);?>;
var ds_addr = <?php echo json_encode($Ds_ADDR);?>;
var ds_cnt = <?php echo json_encode($Ds_CNT)?>;

var cur_lat = "<?php echo $cur_lat; ?>";
var cur_lon = "<?php echo $cur_lon; ?>";

var Sw_Key = <?php echo json_encode($Sw_Key);?>;
var Sw_Name = <?php echo json_encode($Sw_Name);?>;
var Sw_Num = <?php echo json_encode($Sw_Num);?>;
var Sw_Addr = <?php echo json_encode($Sw_Addr);?>;
var Sw_Lat = <?php echo json_encode($Sw_Lat);?>;
var Sw_Lon = <?php echo json_encode($Sw_Lon)?>;
var Sw_Tel = <?php echo json_encode($Sw_Tel)?>;

var s_key = "<?php echo $SCH_IDX;?>";
var PPT_IDX = "<?php echo $PPT_IDX;?>";
</script>

<script src="/js/search_map.js?v=<?php echo time();?>"></script>
<script src="/js/search_control.js?v=<?php echo time();?>"></script>


<!-- 모바일 script -->
<script type="text/javascript">
$(function() {
  //Enable swiping...
  $(".bar-wrap").swipe({
    //Generic swipe handler for all directions
    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
      if (direction == 'down') {
        $('.bottomList-slider').removeClass('on')
        $('.Mbtn-wrap').removeClass('on');
      } else if (direction == 'up') {
        $('.bottomList-slider').addClass('on')
        $('.Mbtn-wrap').addClass('on');
      }
    },
    //Default is 75px, set to 0 for demo so any distance triggers swipe
    threshold: 0
  });
});

//필터 옵션창
$('.option-slider .swiper-slide01').on('click', function(e) {
  e.preventDefault();
  //$(this).toggleClass('on').siblings().removeClass('on');
  var idx = $(this).index() - 1;
  $('.option-wrap>li').eq(idx).toggleClass('on').siblings().removeClass('on');
});

// 리스트 슬라이더 이벤트
$('.Mbtn-wrap').on('click', function() {
  $(this).toggleClass('on')
  $('.bottomList-slider').toggleClass('on')
});

//필터 옵션창삭제
$('.option-wrap .bg').click(function(event) {
  $('.option-wrap .op-box02').removeClass('on');
});
//전체필터 옵션창
$('.option-slider .btn-modal-all').on('click', function(e) {
  e.preventDefault();
  $('.option-all').toggleClass('on');
  $('.option-wrap .op-box02').removeClass('on');
  $(".option-all").addClass("aos-item");
  $(".select-box01").removeClass("aos-item");
  $(".select-box01").removeClass("aos-init");
  $(".select-box01").removeClass("aos-animate");
  AOS.init({
    easing: 'ease-in-out-sine'
  });
  setTimeout(function() {
    $('.option-all').addClass('on');
  }, 400);
});
// 전체필터 옵션창 닫기
$(".option-all .btn_close").click(function() {
  $(".option-all").removeClass("aos-item");
  $(".option-all").removeClass("aos-init");
  $(".option-all").removeClass("aos-animate");
  $(".select-box01").removeClass("aos-item");
  $(".select-box01").removeClass("aos-init");
  $(".select-box01").removeClass("aos-animate");
  setTimeout(function() {
    $('.option-all').removeClass('on');
  }, 400);
});

var docHeight = $('.product-view .content').height();
//console.log(docHeight);
var winSCT = $(window).scrollTop();
//console.log(winSCT);

$('.product-view .content').scroll(function() {
  var winHeight = $(window).height();
  if ($(window).scrollTop() > docHeight) {
    alert('Here is Bottom of This Page');
  }
});

$('.btn-search').on('click', function() {
  $('body').addClass('fixed');
  $('.moblie-search').toggleClass('on');
});

$('.btn-close').on('click', function() {
  $('body').removeClass('fixed');
  $('.moblie-search').removeClass('on');
});

$(".tab-add li").on("click", function() {
  $(this).addClass('on').siblings().removeClass('on');;
});

var filter = "win16|win32|win64|mac|macintel";
if (navigator.platform) {
  if (filter.indexOf(navigator.platform.toLowerCase()) < 0) {
    // mobile 
    // left-wrap 상권현황 상권분석 버튼
    $(".btn-stores01").on('click', function() {
      $(this).toggleClass('on');
      if ($(this).hasClass("on")) {
        $(".select-box01").addClass("aos-item");
        $(".select-box01").addClass("aos-init");
        $(".select-box01").addClass("aos-animate");
        $(".bottomList-slider").addClass("off");
        $(".m-bg").addClass("on");
        setTimeout(function() {
          $('.select-box01').addClass('on');
        }, 400);
      } else if (!$(this).hasClass("on")) {
        $(".select-box01").removeClass("aos-item");
        $(".select-box01").removeClass("aos-init");
        $(".select-box01").removeClass("aos-animate");
        $(".bottomList-slider").removeClass("off");
        $(".m-bg").removeClass("on");
        setTimeout(function() {
          $('.select-box01').removeClass('on');
        }, 400);
      }
    });
    // 상권현황창삭제
    $('.m-bg').click(function(event) {
      $('.select-box01').removeClass('on');
      $(".select-box01").removeClass("aos-item");
      $(".select-box01").removeClass("aos-init");
      $(".select-box01").removeClass("aos-animate");
      $(".bottomList-slider").removeClass("off");
      //$(".btn-stores01").removeClass("on");
      $(this).removeClass('on');
    });
  } else {
    //pc 
    $(".btn-stores01").on("click", function() {
      $("#storeA option:eq(0)").prop("selected", true);
      $("#storeB option:eq(0)").prop("selected", true);
      $("#selectDong").val("");
      $("#selectD").val("");
      $("#selectG").val("");
      $("#selectS").val("");
      $(".form-radio").removeClass("on");
      $("#pA01").addClass("on");
      $("#monthSales").val("17,000,000");
      $("#monthSalesText").html("커피 업종 평균 월 매출액은 1,700만원입니다.");
      $("#pudCost").text("6,120,000");
      $("#pudCostText").html("커피 업종 평균 원가는 매출의 36%입니다.");
      $("#gaugeBar01").data("ionRangeSlider").update({
        from: 36
      });
      $("#salaryA").text("3,400,000");
      $("#salaryAText").text("커피 업종 평균 급여는 매출의 20%입니다.");
      $("#salaryB").val("3,400,000");
      $("#rent").val("2,550,000");
      $("#rentText").text("커피 업종 평균 임대료는 매출의 15%입니다.");
      $("#mainte").val("510,000");
      $("#mainteText").text("커피 업종 평균 관리비는 매출의 3%입니다.");
      $("#Fee").text("510,000");
      $("#gaugeBar02").data("ionRangeSlider").update({
        from: 3
      });
      $("#FeeText").text("커피 업종 평균 판매 수수료는 매출의 3%입니다.");
      $("#TotalS").text("1,700만원");
      $("#TotalP").text("23%");
      $("#TotalM").text("391만원");

      // $(".btn-analysis").removeClass("on");
      $(".select-box01").toggleClass('on');
      if (cnt_view != 'dong') {
        alert("지도영역을 행정동이 나오도록 조절해주세요!");
        $(".select-box01").removeClass("on");
        return false;
      } else {
        overLay_Loding("", "", "");
        $(this).toggleClass('on');
      }
    });
    // alert('pc 접속');
  }
}

// 매물문의하기 클릭
$(".product-view .row-06>.btn-inquiry").on("click", function() {
  $('#prp-inquiry').addClass('on');
});

// 매물문의하기 삭제
$("#prp-inquiry .btn-wrap  .btn-cl").on("click", function() {
  $('#prp-inquiry').removeClass('on');
});
$("#prp-inquiry .bg").on("click", function() {
  $('#prp-inquiry').removeClass('on');
});

// 문의하기 약관 액션
$('.btn_agreeBox').click(function() {
  $('.agree_area').toggleClass('on')
});
</script>
<!-- x -- 모바일 script 추가 -- x -->

<script src="/js/common.js?v=<?php echo time(); ?>"></script>
<!-- 모바일 script 추가 -->
<script src="/js/aos.js"></script>
<script src="/js/jquery.touchSwipe.min.js"></script>
<!-- x -- 모바일 script 추가 -- x -->
<script>
$("#analysis").on("click", function() {
  if (!$("#storeA").val() || $("#storeA").val() == 0) {
    alert("대분류를 선택해주세요.");
    return false;
  } else if (!$("#storeB").val()) {
    alert("중분류를 선택해주세요.");
    return false;
  } else if (!$("#selectDong").val()) {
    alert("지도상에서 행정동을 선택해주세요.");
    return false;
  } else {
    var location = $("#selectS").val() + " " + $("#selectG").val() + " " + $("#selectD").val();
    $("#analyLocation").text(location);
    var Industry = $("#storeA > option:selected").attr("data") + " > " + $("#storeB > option:selected").attr(
      "data");
    $("#analyIndustry").text(Industry);
    if ($("#storeB > option:selected").attr("data")) {
      if ($("#selectS").val() == "서울특별시") {
        var money = 1555 * 1.5;
        $("#analySalesMax").text(comma(uncomma(money)) + "만원");
        $("#analySalesMin").text(comma(uncomma(624)) + "만원");
        var randomA = rand(624, Number(money));
        console.log(randomA);
        $("#analySalesAvg").text(comma(uncomma(randomA)) + "만원");
        var avg = (Number(randomA) + 624) / Number(money) * 10;
        avg = avg.toFixed(2);
        $("#analySalesAvg").css("left", avg + "%");
        $("#analySalesBar").css("width", avg + "%");
        $("#analyDongNum").text(comma(uncomma(rand(300, 900))));
        $("#analyDong").text($("#selectD").val());
        $("#analyDongAvg").css(
          "height", rand(5, 60) + "%");
        $("#analyGu").text($("#selectG").val());
        $("#analyGuNum").text(comma(uncomma(rand(600, 1500))));
        $("#analySi").text($("#selectS").val());
        $("#analyGuAvg").css(
          "height", rand(5, 60) + "%");
        $("#analySiNum").text(comma(uncomma(rand(2500, 6000))));
        $("#analySiAvg").css(
          "height", rand(5, 60) + "%");
        var storeCnt = comma(uncomma(rand(62, 600)));
        $("#selectStore").text(storeCnt);
        $("#dongStoreCnt").text(storeCnt);
        $("#dongStoreAvg").css(
          "height", rand(5, 60) + "%");
        $("#dongStore").text($("#selectD").val());
        var guStorCnt = comma(uncomma(rand(900, 2000)));
        $("#guStoreCnt").text(guStorCnt);
        $("#guStoreAvg").css(
          "height", rand(5, 60) + "%");
        $("#guStore").text($("#selectG").val());
        $("#siStoreCnt").text(comma(uncomma(rand(2000, 4500))));
        $("#siStoreAvg").css(
          "height", rand(5, 60) + "%");
        $("#siStore").text($("#selectS").val());
        var storeAvg = uncomma(storeCnt) / uncomma(guStorCnt) * 100;
        storeAvg = 100 - storeAvg;

        $("#storeAvg").text(storeAvg.toFixed(0) + "%");
        var tmpDngNme = ds_name;
        for (let i = 0; i < tmpDngNme.length; i++) {
          if (tmpDngNme[i] === $("#selectD").val()) {
            tmpDngNme.splice(i, 1);
            i--;
          }
        }
        $("#majorSalesTitle").text($("#selectS").val() + " 주요 매출정보");
        var majorLi = "";
        majorLi = "<li class=\"t-head\">";
        majorLi += "<span class=\"area\">동</span>";
        majorLi += "<span class=\"sales\">매출(만원)</span>";
        majorLi += "<span class=\"nmbBsn\">업소수(개)</span>";
        majorLi += "<span class=\"crnPpl\">유동인구(명)</span>";
        majorLi += "</li>";
        for (let i = 0; i < 4; i++) {
          majorLi += "<li class=\"t-con\">";
          majorLi += "<span class=\"area\">" + tmpDngNme[i] + "</span>";
          majorLi += "<span class=\"sales\">" + comma(uncomma(rand(300, 900))) + "</span>";
          majorLi += "<span class=\"nmbBsn\">" + comma(uncomma(rand(62, 600))) + "</span>";
          majorLi += "<span class=\"crnPpl\">" + comma(uncomma(rand(1200, 2300))) + "</span>";
          majorLi += "</li>";
        }
        $("#majorSalesUl").html(majorLi);
      }
    }

    return true;
  }

});

//콤마찍기
function comma(str) {
  str = String(str);
  return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

//콤마풀기
function uncomma(str) {
  str = String(str);
  return str.replace(/[^\d]+/g, '');
}

function rand(min, max) {
  return Math.floor(Math.random() * (max - min)) + min;
}
</script>
<input type="hidden" name="selectD" id="selectD" value="" />
<input type="hidden" name="selectG" id="selectG" value="" />
<input type="hidden" name="selectS" id="selectS" value="" />

</html>