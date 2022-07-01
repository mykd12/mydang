<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width,initial-scale=1.0,minimum-scale=1.0,shrink-to-fit=no,viewport-fit=cover,user-scalable=no">
  <!-- iOS 숫자 전화번호로 인식 막기-->
  <meta name="format-detection" content="telephone=no">
  <title>상권 분석/중개 플랫폼 명당 파트너</title>
  <meta name="description" content="상권 분석/중개 플랫폼 명당 파트너">
  <meta property="og:type" content="website">
  <meta property="og:title" content="명당 파트너">
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
  <!-- 모달  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <!-- 아이콘CSS 연결 -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/xeicon@2.3.3/xeicon.min.css">
  <!-- 스와이퍼연결 -->
  <link rel="stylesheet" href="/css/swiper.min.css">
  <script src="/js/swiper.min.js"></script>
  <!-- jquery-ui연결 -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- css연결 -->
  <link rel="stylesheet" href="/css/reset.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/css/font.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="/css/pro/common.css?v=<?php echo time(); ?>">
  <!-- js연결 -->
  <!-- <script src="js/jquery-3.5.1.min.js"></script> -->
  <script src="/js/common.js?v=<?php echo time(); ?>"></script>
</head>

<body>
  <div id="wrapper">
    <!----- 헤더 시작 ----->
    <header id="header">
      <div class="header-inner">
        <!-- 로고 -->
        <h1 class="logo"><a href="javascript:void(0);"><img src="/img/logo.png" alt="명당로고"
              onclick="location.href='/';"><span onclick="location.href='/pro/';">파트너스</span></a></h1>
        <!-- gnb -->
        <nav class="gnb">
          <ul>
            <li><a href="/pro">소개</a></li>
            <?php if($this -> session ->userdata('PRO_IDX')){?>
            <li><a href="/pro/payment">결제</a></li>
            <?php if($this -> session ->userdata('PRO_TYPE')=="A" || $this -> session ->userdata('PRO_TYPE')=="B"){?>
            <li><a href="/pro/mgmtBord">관리</a></li>
            <?php }else{?>
            <li><a href="/pro/constrCase">관리</a></li>
            <?php }?>
            <?php }else{?>
            <li><a href="javascript:alert('로그인 후 서비스 이용 가능합니다.');">결제</a></li>
            <li><a href="javascript:alert('로그인 후 서비스 이용 가능합니다.');">관리</a></li>
            <?php }?>

          </ul>
        </nav>
        <!-- 유틸 -->
        <div class="right-wrap clearfix">
          <ul class="util01">
            <?if(!$this -> session ->userdata('PRO_IDX')){?>
            <li><a href="/pro/login"><i class="xi-user-o"></i>
                <br>로그인</a>
            </li>
            <li><a href="/pro/joinA"><i class="xi-user-plus-o"></i><br>가입</a></li>
            <?}else{?>
            <li><a href="/auth/logoutPro"><i class="xi-log-out"></i><br>로그아웃</a></li>
            <li><a href="/pro/mypage"><i class="xi-user-o"></i><br>MY</a></li>
            <?}?>
          </ul>
        </div>
      </div>
    </header>
    <!-- <div id="Mheader">
      <div class="main">
        <h1 class="logo"><a href="/"> <img src="img/logo.png" alt="명당로고"><span>파트너스</span></a></h1>
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
    </div> -->
    <div id="Mgnb">
      <ul class="Mgnb-wrap">
        <li><a href="/pro"><i class="xi-home-o"></i><br>홈</a></li>
        <li><a href="javascript:void(0);"><i class="xi-presentation"></i><br>소개</a></li>
        <?php if(!$this -> session ->userdata('PRO_IDX')){?>
        <li><a href="javascript:alert('로그인 후 서비스 이용 가능합니다.');" class="btn-search"><i
              class="xi-plus-square-o"></i><br>등록</a></li>
        <li><a href="javascript:alert('로그인 후 서비스 이용 가능합니다.');"><i class="xi-view-list"></i><br>관리</a></li>
        <li><a href="/pro" class="btn-menu-gnb"><i class="xi-user-o"></i><br>로그인</a></li>
        <?php }else{?>
        <li><a href=/pro/storeWrite" class="btn-search"><i class="xi-plus-square-o"></i><br>등록</a></li>
        <li><a href="/pro/storeList"><i class="xi-view-list"></i><br>관리</a></li>
        <li><a href="/pro/Mmypage" class="btn-menu-gnb"><i class="xi-user-o"></i><br>마이페이지</a></li>
        <?php }?>
      </ul>
    </div>