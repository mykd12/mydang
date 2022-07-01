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
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico?v=1">
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico?v=1">
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
    href="//fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@200;300;400;500;700;900&display=swap">
  <link href="//font.elice.io/EliceDigitalBaeum.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard/dist/web/variable/pretendardvariable.css" />
  <!-- 모달  -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!-- 게이지바 -->
  <link rel="stylesheet" href="/css/ion.rangeSlider.min.css">
  <script src="//cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
  <!-- 아이콘CSS 연결 -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
  <!-- 스와이퍼연결 -->
  <link rel="stylesheet" href="/css/swiper.min.css">
  <script src="/js/swiper.min.js"></script>
  <!-- jquery-ui연결 -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- css연결 -->
  <link rel="stylesheet" href="/css/reset.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/css/font.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/css/common.css?v=<?php echo time(); ?>">
  <!-- js연결 -->
  <!-- <script src="js/jquery-3.5.1.min.js"></script> -->
  <script src="/js/common.js?v=<?php echo time(); ?>"></script>
  <script type="text/javascript"
    src="//dapi.kakao.com/v2/maps/sdk.js?appkey=64e888255177e7c55224d2acfdaa3146&libraries=services"></script>

</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <header id="header">
      <!-- 로고 -->
      <h1 class="logo"><a href="/"><img src="/img/logo.png" alt="명당로고"><span class="blind">명당</span></a></h1>
      <!-- gnb -->
      <nav class="gnb">
        <ul>
          <li><a href="/main/search">찾다</a></li>
          <li><a href="/main/makeSearch">짓다</a></li>
          <li><a href="/main/StartTip">비결</a></li>
          <li><a href="/main/constrCase">사례</a></li>
        </ul>
      </nav>
      <!-- 유틸 -->
      <div class="right-wrap clearfix">
        <ul class="util01">
          <?php if(!$this -> session ->userdata('LOGIN_IDX')){ ?>
          <li><a href="/main/login"><i class="xi-user-o"></i><span>로그인/가입</span></a>
          </li>
          <!-- <li><a href="javascript:alert('로그인후 서비스 가능합니다.');"><img src="/icon/heart01.png" alt="하트아이콘"><br>관심목록</a></li>
          <li><a href="javascript:alert('로그인후 서비스 가능합니다.');" class="btn-basket"><img src="/icon/estimate01.png"
                alt="견적서아이콘"><br>견적서<span class="num">0</span></a>
          </li> -->
          <?php }else{?>
          <li>
            <a href="/main/myPage/">
              <div id="imgViewArea" class="img-wrap">
                <!-- <img id="imgArea" class="imgArea" onerror="imgAreaError()" /
                            src="/uploads/<?php echo $results->MET_IMG_SAVE;?>" alt="프로필사진"> -->
                <?php if($this -> session ->userdata('LOGIN_IMG')){?>
                <img id="imgArea" class="imgArea" src="/uploads/<?php echo $this -> session ->userdata('LOGIN_IMG');?>"
                  alt="프로필사진">
                <?php }else{?>
                <img id="imgArea" class="imgArea" src="../../../img/my-img.png" alt="프로필사진"
                  style="background-color: #f1f1f1;">
                <?php }?>

              </div>

              <span class="name"><?php echo $this -> session ->userdata('LOGIN_NAME');?></span> 님
            </a>
            <ul class="depth02">
              <li><a href="/main/myPage/">마이페이지</a></li>
              <li><a href="/main/qnaList/">문의</a></li>
              <li><a href="/main/myStore">관심목록</a></li>
              <li><a href="/auth/logout">로그아웃</a></li>
            </ul>
          </li>
          <!-- <li><a href="/main/myStore"><img src="/icon/heart01.png" alt="하트아이콘"><br>관심목록</a></li>
          <li><a href="#modal-inquiryAll" rel="modal:open" class="btn-basket"><img src="/icon/estimate01.png"
                alt="견적서아이콘"><br>견적서<span class="num"><?php echo count($estimate[0]);?></span></a>
          </li> -->
          <?php }?>
        </ul>
        <ul class="util02">
          <li><a href="/pro" target="_blank">매물등록</a></a></li>
          <li><a href="/pro" target="_blank">업체등록</a></li>
        </ul>
      </div>
    </header>
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
        <a href="javascript:history.go(-1);" class="btn-back"><i class="xi-angle-left-thin"></i><span
            class="blind">뒤로</span></a>
        <h2 class="m-title">
          <?php
              if($nowPage=="Mmypage"){
                echo "마이페이지";
              }else if($nowPage=="myPage"){
                echo "내정보수정";
              }else if($nowPage=="qnaList" || $nowPage=="qnaWrite" || $nowPage=="qnaView"){
                echo "1:1 문의";
              }else if($nowPage=="Msearch"){
                echo "매물 검색";
              }else if($nowPage=="myStore"){
                echo "관심명당";
              }else if($nowPage=="myPartner"){
                echo "관심업체";
              }else if($nowPage=="makeSearch"){
                echo "짓다";
              }else if($nowPage=="search"){
                echo "찾다";
              }else if($nowPage=="notice"){
                echo "공지사항";
              }else if($nowPage=="news"){
                echo "뉴스";
              }else if($nowPage=="faq"){
                echo "FAQ";
              }else if($nowPage=="info"){
                echo "사업자 정보";
              }else if($nowPage=="StartTip" || $nowPage=="StartTipView"){
                echo "창업 팁";
              }else if($nowPage=="StartPro" || $nowPage=="StartProView"){
                echo "창업 과정";
              }else if($nowPage=="StartNews" || $nowPage=="StartNewsView"){
                echo "창업 뉴스";
              }else if($nowPage=="constrCase" || $nowPage=="constrCaseView"){
                echo "시공사례";
              }
            ?>
        </h2>
        <a href="javascript:vold(0)" class="btn-search"><i class="xi-search"></i><span class="blind">검색</span></a>
      </div>
    </div>
    <div id="Mgnb">
      <ul class="Mgnb-wrap">
        <li><a href="/"><i class="xi-home-o"></i><br>홈</a></li>
        <li><a href="/main/myStore"><i class="xi-star-o"></i><br>관심목록</a></li>
        <li><a href="/main/Msearch" class="btn-search"><i class="xi-search"></i><br>검색</a></li>
        <?php if(!$this -> session ->userdata('LOGIN_IDX')){ ?>
        <li><a href="/main/login"><i class="xi-user-o"></i><br>로그인</a></li>
        <?php }else{?>
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
          <li><a href="/main/qnaList/"><i class="xi-forum-o"></i><br>문의한명당</a></li>
          <li><a href="/main/qnaList/"><i class="xi-message-o"></i><br>상담모음</a></li>
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
            <ul>
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
          <a href="/main/info">사업자 정보<i class="xi-angle-right"></i></a>
          <p class="footer-copy">Copyright ⓒ 2021 Developer Noah Co. All rights reserved</p>
        </div>
      </div>
    </div>