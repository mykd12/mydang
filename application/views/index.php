<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width,initial-scale=1.0,minimum-scale=1.0,shrink-to-fit=no,viewport-fit=cover,user-scalable=no">
  <!-- iOS 숫자 전화번호로 인식 막기-->
  <meta name="format-detection" content="telephone=no">
  <title>상권 분석/중개 플랫폼 명당</title>
  <meta name="description" content="상권 분석/중개 플랫폼 명당">
  <meta property="og:type" content="website">
  <meta property="og:title" content="명당">
  <meta property="og:url" content="http://mydang.kr/">
  <meta property="og:image" content="http://mydang.kr/logo.png">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico?v=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico?v=1">
  <!-- touch-icon -->
  <link rel="apple-touch-icon" sizes="57x57" href="">
  <link rel="apple-touch-icon" sizes="60x60" href="">
  <link rel="apple-touch-icon" sizes="72x72" href="">
  <link rel="apple-touch-icon" sizes="76x76" href="">
  <link rel="apple-touch-icon" sizes="114x114" href="">
  <link rel="apple-touch-icon" sizes="120x120" href="">
  <link rel="apple-touch-icon" sizes="144x144" href="">
  <link rel="apple-touch-icon" sizes="152x152" href="">
  <link rel="apple-touch-icon" sizes="180x180" href="">
  <link rel="apple-touch-icon-precomposed" href="">
  <!-- 폰트 연결 -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@200;300;400;500;700;900&display=swap">
  <link href="//font.elice.io/EliceDigitalBaeum.css" rel="stylesheet">
  <!-- 모달(견적서)  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!-- 아이콘CSS 연결 -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
  <!-- jquery-ui연결(견적서 모달 달력) -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- css연결 -->
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/font.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/css/main.css?v=<?php echo time(); ?>">
  <!-- js연결 -->
  <script src="/js/main.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <header id="header">
      <h1 class="logo"><a href="/"><img src="/img/logo03.png" alt="명당로고"></a></h1>
      <nav class="gnb">
        <ul class="clearfix">
          <li><a href="/main/search">찾다</a></li>
          <li><a href="/main/makeSearch">짓다</a></li>
        </ul>
      </nav>
      <a class="btn-menu-gnb" href="javascript:void(0);">
        <img src="/icon/menu-square.png" alt="전체메뉴 아이콘">
        <p class="blind">전체메뉴</p>
      </a>
      <div class="slider-menu">
        <ul class="util01">
          <?php if(!$this -> session ->userdata('LOGIN_IDX')){ ?>
          <li><a href="/main/login"><i class="xi-user-o"></i><span>로그인/가입</span></a>
          </li>
          <?php }else{?>
          <li>
            <a href="/main/myPage/">
              <!-- <i class="xi-user-o on"></i> -->
              <div id="imgViewArea" class="img-wrap">
                <?php if($this -> session ->userdata('LOGIN_IMG')){?>
                <img id="imgArea" onerror="imgAreaError()" /
                  src="/uploads/<?php echo $this -> session ->userdata('LOGIN_IMG');?>" alt="프로필사진">
                <?php }else{?>
                <img id="imgArea" onerror="imgAreaError()" / src="/img/my-img.png" alt="프로필사진"
                  style="background-color: #f1f1f1;">
                <?php }?>
              </div>
              <span class="name">
                <?php echo $this -> session ->userdata('LOGIN_NAME');?></span>님, 어서오세요 <i class="xi-ellipsis-h"></i>
            </a>
            <ul class="depth02">
              <li><a href="/main/myPage/">마이페이지</a></li>
              <li><a href="/main/qnaList/">문의</a></li>
              <li><a href="/main/myStore">관심목록</a></li>
              <li><a href="/auth/logout">로그아웃</a></li>
            </ul>
          </li>
          <?php }?>
        </ul>
        <ul class="top-menu">
          <li><a href="/pro" target="_blank">매물등록</a></li>
          <li><a href="/pro" target="_blank">업체등록</a></li>
        </ul>
        <div class="gnb_scroll">
          <ul>
            <li><a href="/main/search">찾다<i class="xi-angle-right"></i></a></li>
            <li><a href="/main/makeSearch">짓다<i class="xi-angle-right"></i></a></li>
            <li><a href="/main/StartTip">비결<i class="xi-angle-right"></i></a>
            </li>
            <li><a href="/main/constrCase">사례<i class="xi-angle-right"></i></a></li>
            <li><a href="/main/notice">고객센터<i class="xi-angle-right"></i></a>
            </li>
          </ul>
          <div id="main-footer">
            <p class="text-tel">CUSTOMER SERVICE</p>
            <p class="tel">070-8633-8942</p>
            <a class="btn-info" href="javascript:void(0);">사업자 정보<i class="xi-angle-down-thin"></i></a>
            <div class="info-wrap">
              <div class="text-wrap">
                <div class="cal-01">
                  <p><span>(주)</span>디노랩스대표. 김성찬</p>
                  <p>사업자번호. 510-87-01865</p>
                  <p>통신판매업. 제 2022-광주동구-0069 호</p>
                  <p>민원처리담당자</p>
                  <p>이성희(070-8633-8942)</p>
                  <p>
                    주소. 광주광역시 동구 금남로4가 6<br>광주AI창업캠프 2호점 402호<br>
                    (금남로 193-12)
                  </p>
                  <p>
                    메일. denolabs@naver.com
                  </p>
                </div>
                <ul class="link-list">
                  <li><a href="/main/policy/#policy02" class="btn_mo" target="_blank">개인정보처리방침</a></li>
                  <li><a href="/main/policy/#policy01" class="btn_mo" target="_blank">이용약관</a></li>
                  <li><a href="/main/policy/#policy03" class="btn_mo" target="_blank">위치기반서비스이용약관</a></li>
                </ul>
              </div>
            </div>
            <!-- <p class="footer-copy">Copyright ⓒ 2021 Developer Noah Co. All rights reserved</p> -->
          </div>
          <!-- <p class="footer_copy">Copyright ⓒ 2021 Developer Noah Co. All rights reserved</p> -->
        </div>
        <!-- <ul class="bottom-menu clearfix">
          <?php if(!$this -> session ->userdata('LOGIN_IDX')){ ?>
          <li><a href="/main/login/"><img src="/icon/login.png" alt="로그인아이콘"><br>로그인</a></li>
          <li><a href="javascript:alert('로그인 후 서비스 가능합니다.');"><img src="/icon/heart.png" alt="하트아이콘"><br>관심명당</a></li>
          <li><a href="javascript:alert('로그인 후 서비스 가능합니다.');"><img src="/icon/estimate02.png" alt="견적서아이콘"><br>견적서</a>
          </li>
          <?php }else{?>
          <li><a href="/auth/logout"><img src="/icon/logout.png" alt="로그인아이콘"><br>로그아웃</a></li>
          <li><a href="/main/myStore"><img src="/icon/heart.png" alt="하트아이콘"><br>관심명당</a></li>
          <li><a href="#modal-inquiryAll" rel="modal:open" class="btn-basket"><img src="/icon/estimate02.png"
                alt="견적서아이콘"><br>견적서</a></li>
          <?php }?>
        </ul> -->
      </div>
    </header>
    <!-- 모바일헤더 시작 -->
    <div id="Mheader">
      <div class="main">
        <h1 class="logo"><a href="/"> <img src="/img/logo.png" alt="명당로고"><span class="blind">명당</span></a></h1>
        <div class="right-btn">
          <a href="javascript:void(0);" class="btn-mypage">
            <div class="icon-wrap">
            </div>
          </a>
        </div>
      </div>
      <div class="sub">
        <a href="javascript:void(0);" class="btn-back"><i class="xi-angle-left-thin"></i><span
            class="blind">뒤로</span></a>
        <h2 class="m-title">창업팁</h2>
      </div>
    </div>
    <div id="Mgnb">
      <ul class="Mgnb-wrap">
        <li><a href="/"><i class="xi-home-o"></i><br>홈</a></li>
        <?php if(!$this -> session ->userdata('LOGIN_IDX')){ ?>
        <li><a href="javascript:alert('로그인 후 서비스 가능합니다.');"><i class="xi-star-o"></i><br>관심목록</a></li>
        <?php }else{?>
        <li><a href="/main/myStore"><i class="xi-star-o"></i><br>관심목록</a></li>
        <?php }?>
        <li><a href="/main/Msearch" class="btn-search"><i class="xi-search"></i><br>검색</a></li>
        <?php if(!$this -> session ->userdata('LOGIN_IDX')){ ?>
        <li><a href="/main/login"><i class="xi-user-o"></i><br>로그인</a></li>
        <?php }else{ ?>
        <li><a href="/main/Mmypage"><i class="xi-user-o"></i><br>마이페이지</a></li>
        <?php }?>
        <li><a href="javascript:void(0);" class="btn-menu-gnb"><i class="xi-ellipsis-h"></i><br>전체메뉴</a></li>
      </ul>
      <div class="menu-gnb">
        <h2 class="">전체메뉴</h2>
        <a href="javascript:void(0);" class="btn-close"><i class="xi-close-thin"></i><span class="blind">닫기</span></a>
        <!-- <h4>즐겨찾기</h4>
        <ul class="top-menu">
          <li><a href="/main/myStore"><i class="xi-star"></i><br>관심명당</a></li>
          <li><a href="/main/myStore"><i class="xi-network-company"></i><br>관십업체</a></li>
          <li><a href="inquiryPro.php"><i class="xi-forum-o"></i><br>문의한명당</a></li>
          <li><a href="estimate.php"><i class="xi-message-o"></i><br>상담모음</a></li>
        </ul> -->
        <div class="gnb-scroll">
          <div class="m-gnb-wrap">
            <ul class="m-gnb row01">
              <li><a href="/main/search"><span>찾다</span></a></li>
              <li><a href="/main/makeSearch"><span>짓다</span></a></li>
              <li><a href="/main/StartTip"><span>비결</span></a></li>
              <li><a href="/main/constrCase"><span>사례</span></a></li>
            </ul>
            <ul class="row02">
              <li><a href="/pro">매물등록</a></li>
              <li><a href="/pro">업체등록</a></li>
            </ul>
            <ul class="row03">
              <li><a href="/main/notice">1:1 문의</a></li>
              <li><a href="/main/notice">공지사항</a></li>
              <li><a href="/main/news">뉴스</a></li>
              <li><a href="/main/faq">FAQ</a></li>
            </ul>
          </div>
          <!-- <div class="m-gnb-wrap">
            <h4>카테고리</h4>
            <ul class="m-gnb">
              <li><a href="/main/search">찾다<i class="xi-angle-right"></i></a></li>
              <li><a href="/main/makeSearch">짓다<i class="xi-angle-right"></i></a></li>
              <li><a href="/main/StartTip">비결<i class="xi-angle-right"></i></a></li>
              <li><a href="/main/constrCase">사례<i class="xi-angle-right"></i></a></li>
            </ul>
            <h4>등록하기</h4>
            <ul>
              <li><a href="/pro">매물등록<i class="xi-angle-right"></i></a></li>
              <li><a href="/pro">업체등록<i class="xi-angle-right"></i></a></li>
            </ul>
            <h4>고객센터</h4>
            <ul>
              <li><a href="/main/notice">공지사항<i class="xi-angle-right"></i></a></li>
              <li><a href="/main/news">뉴스<i class="xi-angle-right"></i></a></li>
              <li><a href="/main/faq">FAQ<i class="xi-angle-right"></i></a></li>
            </ul>
          </div> -->
        </div>
        <button class="btn-close" type="button">
          <span class="blind">닫기</span>
        </button>
        <div class="m-footer">
          <p>CUSTOMER SERVICE</p>
          <p class="tel">070.8633.8941</p>
          <a href="main/info">사업자 정보<i class="xi-angle-right"></i></a>
          <p class="footer-copy">Copyright ⓒ 2021 Developer Noah Co. All rights reserved</p>
        </div>
      </div>
    </div>
    <!-- 모바일헤더 끝 -->
    <!--x-- 헤더 시작 --x-->
    <!-----  메인 시작 ----->
    <main id="main">
      <section class="mainvisual clearfix">
        <div class="text-wrap">
          <p class="text-de">ONLY ON-LINE</p>
          <span class="line"></span>
          <p class="text-ti">
            창업공간+인테리어<br>
            <em class="color">내 취향대로</em>모델링 하기
          </p>
        </div>
        <div class="bg-wrap">
          <div class="bg">
            <img src="img/bg-cityAll.png" alt="배경도시">
          </div>
          <div class="car01"><img src="/img/car01.png" alt="자동차1"></div>
          <div class="car02"><img src="/img/car02.png" alt="자동차2"></div>
          <div class="car03"><img src="/img/car03.png" alt="자동차3"></div>
          <div class="sign01"><img src="/img/signpost01.png" alt="명당1호점"></div>
          <div class="sign02"><img src="/img/signpost02.png" alt="명당2호점준비중"></div>
        </div>
        <div class="btn-wrap">
          <a class="btn-case" href="/main/constrCase">
            <div class="text-box">사례</div>
          </a>
          <a class="btn-case1" href="/main/StartTip">
            <div class="text-box">비결</div>
          </a>
          <a class="btn-case2" href="/main/search">
            <div class="text-box">찾다</div>
          </a>
          <a class="btn-case3" href="/main/makeSearch">
            <div class="text-box">짓다</div>
          </a>
          <a class="btn-case4" href="/main/notice">
            <div class="text-box">고객센터</div>
          </a>
        </div>
        <!-- 모바일 메인 -->
        <div class="Mmain">
          <div class="localSelect select_wrap clearfix">
            <!-- <p class="select-text">'<span class="selec-value">광주광역시</span>'</p>
            <a href="javascript:void(0)" class="btn-localSelect">지역선택 <i class="xi-caret-down-min"></i></a>
            <ul class="array_select">
              <li class="AREA_SELECT" data="서울"><span>서울특별시</span></li>
              <li class="AREA_SELECT" data="부산"><span>부산광역시</span></li>
              <li class="AREA_SELECT" data="대구"><span>대구광역시</span></li>
              <li class="AREA_SELECT" data="인천"><span>인천광역시</span></li>
              <li class="AREA_SELECT" data="광주"><span>광주광역시</span></li>
              <li class="AREA_SELECT" data="대전"><span>대전광역시</span></li>
              <li class="AREA_SELECT" data="울산"><span>울산광역시</span></li>
              <li class="AREA_SELECT" data="세종"><span>세종특별자치시</span></li>
              <li class="AREA_SELECT" data="경기"><span>경기도</span></li>
              <li class="AREA_SELECT" data="강원"><span>강원도</span></li>
              <li class="AREA_SELECT" data="충북"><span>충청북도</span></li>
              <li class="AREA_SELECT" data="충남"><span>충청남도</span></li>
              <li class="AREA_SELECT" data="전북"><span>전라북도</span></li>
              <li class="AREA_SELECT" data="전남"><span>전라남도</span></li>
              <li class="AREA_SELECT" data="경북"><span>경상북도</span></li>
              <li class="AREA_SELECT" data="경남"><span>경상남도</span></li>
              <li class="AREA_SELECT" data="제주"><span>제주특별자치도</span></li>
            </ul> -->
            <!-- <h2 class="title">
            창업공간+인테리어<br>
            <em class="color">내 취향대로</em>모델링 하기
        </h2> -->
          </div>
          <div class="mBtn-wrap">
            <a href="/main/search">명당구하기</a>
            <a href="/pro">명당거래하기</a>
            <a href="/main/makeSearch">명당만들기</a>
          </div>
        </div>
        <!--x--  모바일메인 끝 --x-->
      </section>
    </main>
    <!--x--  메인 끝 --x-->
  </div>
</body>

</html>