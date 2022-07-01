<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Myeongdang admin</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../favicon.ico">
  <!-- Google Fonts -->
  <link rel="stylesheet"
    href="//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
  <!-- CSS Global Icons -->
  <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/vendor/icon-line/css/simple-line-icons.css">
  <link rel="stylesheet" href="/assets/vendor/icon-etlinefont/style.css">
  <link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">

  <link rel="stylesheet" href="/assets/vendor/hs-admin-icons/hs-admin-icons.css">
  <link rel="stylesheet" href="/assets/vendor/animate.css">
  <link rel="stylesheet" href="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="/assets/vendor/bootstrap-select/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/assets/vendor/bootstrap-tagsinput/css/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="/assets/vendor/ion-range-slider/css/ion.rangeSlider.css">
  <link rel="stylesheet" href="/assets/vendor/chartist-js/chartist.min.css">
  <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/assets/vendor/flatpickr/dist/css/flatpickr.min.css">
  <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">
  <link rel="stylesheet" href="/assets/vendor/custombox/custombox.min.css">
  <!-- CSS Unify -->
  <link rel="stylesheet" href="/assets/css/unify-admin.css">

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/plugin/remodal-demo/src/jquery.remodal.css" />



  <!-- CSS Customization -->
  <link rel="stylesheet" href="/assets/css/custom.css?v=<?php echo time();?>">
  <link rel="stylesheet" href="/css/custom.css">
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="/SE/js/HuskyEZCreator.js" charset="utf-8"></script>

  <?
        if(!$this -> session ->userdata('ADMIN_IDX') && !$this -> session ->userdata('ADMIN_ID')){
            echo "<script>location.href='/admin';</script>";
        }
    ?>


</head>

<body>
  <main>
    <!-- Header -->
    <header id="js-header" class="u-header u-header--sticky-top">
      <div class="u-header__section u-header__section--admin-dark g-min-height-65">
        <nav class="navbar no-gutters g-pa-0">
          <div class="col-auto d-flex flex-nowrap u-header-logo-toggler g-py-12">
            <!-- Logo -->
            <a href="/admin"
              class="navbar-brand d-flex align-self-center g-hidden-xs-down g-line-height-1 py-0 g-mt-5">ADMIN</a>
            <!-- End Logo -->
            <!-- Sidebar Toggler -->
            <a class="js-side-nav u-header__nav-toggler d-flex align-self-center ml-auto" href="#!"
              data-hssm-class="u-side-nav--mini u-sidebar-navigation-v1--mini" data-hssm-body-class="u-side-nav-mini"
              data-hssm-is-close-all-except-this="true" data-hssm-target="#sideNav">
              <i class="hs-admin-align-left"></i>
            </a>
            <!-- End Sidebar Toggler -->
          </div>
          <!-- Top Search Bar (Mobi) -->
          <a id="searchInvoker"
            class="g-hidden-sm-up text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20"
            href="#!" aria-controls="searchMenu" aria-haspopup="true" aria-expanded="false" data-is-mobile-only="true"
            data-dropdown-event="click" data-dropdown-target="#searchMenu" data-dropdown-type="css-animation"
            data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
            <i class="hs-admin-search g-absolute-centered"></i>
          </a>
          <!-- End Top Search Bar (Mobi) -->
          <!-- Top User -->
          <div class="col-auto d-flex g-pt-5 g-pt-0--sm g-pl-10 g-pl-20--sm">
            <div class="g-pos-rel g-px-10--lg">
              <a id="profileMenuInvoker" class="d-block" href="#!" aria-controls="profileMenu" aria-haspopup="true"
                aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#profileMenu"
                data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn"
                data-dropdown-animation-out="fadeOut">
                <span class="g-pos-rel g-top-2">
                  <i class="hs-admin-user g-pos-rel g-top-2 g-mr-5"></i>
                  <span class="g-hidden-sm-down">&nbsp;&nbsp;&nbsp;<?php echo $this -> session ->userdata('ADMIN_ID');?>
                    <!--<?=$_SESSION['ADMIN_LOGIN_NAME']?>-->&nbsp;&nbsp;&nbsp;
                  </span>
                  <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10 g-mr-25"></i>
                </span>
              </a>

              <!-- Top User Menu -->
              <ul id="profileMenu"
                class="g-pos-abs g-left-0 g-width-100x--lg g-nowrap g-font-size-14 g-py-20 g-mt-17 rounded"
                aria-labelledby="profileMenuInvoker">
                <li class="mb-0">
                  <a class="media g-color-lightred-v2--hover g-py-5 g-px-20" href="/Admin_auth/logout">
                    <span class="d-flex align-self-center g-mr-12">
                      <i class="hs-admin-shift-right"></i>
                    </span>
                    <span class="media-body align-self-center">LOGOUT</span>
                  </a>
                </li>
              </ul>
              <!-- End Top User Menu -->
            </div>
          </div>
          <!-- End Top User -->
      </div>
      <!-- End Messages/Notifications/Top Search Bar/Top User -->
      </nav>
      </div>
    </header>
    <!-- End Header -->


    <section class="container-fluid px-0 g-pt-65">
      <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
        <!-- Sidebar Nav -->
        <div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark">
          <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu g-min-height-100vh mb-0">
            <li
              class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($nowPage=='user' || $nowPage=='userWrite' || $nowPage=='broker' || $nowPage=='brokerWrite' || $nowPage=='brokerMemer' || $nowPage=='brokerMemerWrite' || $nowPage=='partner' || $nowPage=='partnerWrite' || $nowPage=='partnerCase' || $nowPage=='partnerCaseWrite' || $nowPage=='userPayList' || $nowPage=='userPay' || $nowPage=='userPayAdd' || $nowPage=='brokerPaym' || $nowPage=='brokerPayAdd' || $nowPage=='brokerPaymWrite' ){ echo "
              u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!"
                data-hssm-target="#subMenu0">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
                  <i class="icon-people"></i>
                </span>
                <span class="media-body align-self-center">회원 관리</span>
                <span class="d-flex align-self-center u-side-nav--control-icon">
                  <i class="hs-admin-angle-right"></i>
                </span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu0" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"
                <?if($nowPage=='user' || $nowPage=='userWrite' || $nowPage=='broker' || $nowPage=='brokerWrite' ||
                $nowPage=='brokerMemer' || $nowPage=='brokerMemerWrite' || $nowPage=='partner' ||
                $nowPage=='partnerWrite' || $nowPage=='partnerCase' || $nowPage=='partnerCaseWrite' ||
                $nowPage=='userPayList' || $nowPage=='userPay' || $nowPage=='userPayAdd' || $nowPage=='brokerPaym' ||
                $nowPage=='brokerPayAdd' || $nowPage=='brokerPaymWrite' ){ echo "style='display: block;'" ; }?>>
                <!-- Panel Variations -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='user' || $nowPage=='userWrite' || $nowPage=='userPayList' || $nowPage=='userPay' || $nowPage=='userPayAdd'){ echo "
                    active"; }?>" href="/admin/user">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">일반회원</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='broker' || $nowPage=='brokerWrite' || $nowPage=='brokerMemer' || $nowPage=='brokerMemerWrite' || $nowPage=='brokerPaym' || $nowPage=='brokerPayAdd' || $nowPage=='brokerPaymWrite'){ echo "
                    active"; }?>" href="/admin/broker">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">중개사</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='partner' || $nowPage=='partnerWrite' || $nowPage=='partnerCase' || $nowPage=='partnerCaseWrite'){ echo "
                    active"; }?>" href="/admin/partner">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">파트너사</span>
                  </a>
                </li>
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
            <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12  <?if($nowPage=='property' || $nowPage=='propertyWrite'){ echo "
                active"; }?>"
                href="/admin/property">
                <span class="d-flex align-self-center g-font-size-18 g-mr-40">
                  <i class="icon-christmas-071 u-line-icon-pro"></i>
                </span>
                <span class="media-body align-self-center">매물 관리</span>
              </a>
            </li>
            <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?if($nowPage=='payment' || $nowPage=='paymentList'){ echo "
                active"; }?>" href="/admin/paymentList">
                <span class="d-flex align-self-center g-font-size-18 g-mr-40">
                  <i class="icon-drawer"></i>
                </span>
                <span class="media-body align-self-center">결제 관리</span>
              </a>
            </li>


            <li
              class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($nowPage=='news' || $nowPage=='newsWrite' || $nowPage=='newsView' || $nowPage=='notice' || $nowPage=='noticeView' || $nowPage=='noticeWrite' || $nowPage=='faq' || $nowPage=='faqWrite' || $nowPage=='qna' || $nowPage=='qnaView' || $nowPage=='qnaPro' || $nowPage=='qnaViewPro'){ echo "
              u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!"
                data-hssm-target="#subMenu1">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
                  <i class="icon-electronics-024 u-line-icon-pro"></i>
                </span>
                <span class="media-body align-self-center">고객센터 관리</span>
                <span class="d-flex align-self-center u-side-nav--control-icon">
                  <i class="hs-admin-angle-right"></i>
                </span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu1" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"
                <?if($nowPage=='news' || $nowPage=='newsWrite' || $nowPage=='newsView' || $nowPage=='notice' ||
                $nowPage=='noticeView' || $nowPage=='noticeWrite' || $nowPage=='faq' || $nowPage=='faqWrite' ||
                $nowPage=='qna' || $nowPage=='qnaView' || $nowPage=='qnaPro' || $nowPage=='qnaViewPro' ){
                echo "style='display: block;'" ; }?>>
                <!-- Panel Variations -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='news' || $nowPage=='newsWrite' || $nowPage=='newsView'){ echo "
                    active"; }?>" href="/admin/news">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">NEWS 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='notice' || $nowPage=='noticeView' || $nowPage=='noticeWrite'){ echo "
                    active"; }?>" href="/admin/notice">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">NOTICE 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='faq' || $nowPage=='faqWrite'){ echo "
                    active"; }?>" href="/admin/faq">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">FAQ 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='qna' || $nowPage=='qnaView'){ echo "
                    active"; }?>" href="/admin/qna">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">USER QNA 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='qnaPro' || $nowPage=='qnaViewPro'){ echo "
                    active"; }?>" href="/admin/qnaPro">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">PRO QNA 관리</span>
                  </a>
                </li>
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
            <li
              class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($nowPage=='tip' || $nowPage=='tipView' || $nowPage=='tipWrite' || $nowPage=='process' || $nowPage=='processView' || $nowPage=='processWrite' || $nowPage=='startNews' || $nowPage=='startNewsView' || $nowPage=='startNewsWrite'){ echo "
              u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!"
                data-hssm-target="#subMenu3">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
                  <i class="icon-bubbles"></i>
                </span>
                <span class="media-body align-self-center">창업비결 관리</span>
                <span class="d-flex align-self-center u-side-nav--control-icon">
                  <i class="hs-admin-angle-right"></i>
                </span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu3" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"
                <?if($nowPage=='tip' || $nowPage=='tipView' || $nowPage=='tipWrite' || $nowPage=='process' ||
                $nowPage=='processView' || $nowPage=='processWrite' || $nowPage=='startNews' ||
                $nowPage=='startNewsView' || $nowPage=='startNewsWrite' ){ echo "style='display: block;'" ; }?>>
                <!-- Panel Variations -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='tip' || $nowPage=='tipView' || $nowPage=='tipWrite'){ echo "
                    active"; }?>" href="/admin/tip">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">창업팁 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='process' || $nowPage=='processView' || $nowPage=='processWrite'){ echo "
                    active"; }?>" href="/admin/process">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">과정 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?if($nowPage=='startNews' || $nowPage=='startNewsView' || $nowPage=='startNewsWrite'){ echo "
                    active"; }?>"
                    href="/admin/startNews">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">소식 관리</span>
                  </a>
                </li>
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
            <li
              class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item  <?if($nowPage=='dataA' || $nowPage=='dataAwrite' || $nowPage=='dataB' || $nowPage=='dataBwrite' || $nowPage=='dataC' || $nowPage=='dataCwrite' || $nowPage=='dataD' || $nowPage=='dataDwrite' || $nowPage=='dataE' || $nowPage=='dataEwrite' || $nowPage=='dataF' || $nowPage=='dataFwrite' || $nowPage=='dataG' || $nowPage=='dataGwrite' || $nowPage=='dataH' || $nowPage=='dataHwrite'){ echo "
              u-side-nav-opened has-active"; }?>">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!"
                data-hssm-target="#subMenu4">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
                  <i class="icon-communication-085 u-line-icon-pro"></i>
                </span>
                <span class="media-body align-self-center">분석데이터 관리</span>
                <span class="d-flex align-self-center u-side-nav--control-icon">
                  <i class="hs-admin-angle-right"></i>
                </span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu4" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"
                <?if($nowPage=='dataA' || $nowPage=='dataAwrite' || $nowPage=='dataB' || $nowPage=='dataBwrite' ||
                $nowPage=='dataC' || $nowPage=='dataCwrite' || $nowPage=='dataD' || $nowPage=='dataDwrite' ||
                $nowPage=='dataE' || $nowPage=='dataEwrite' || $nowPage=='dataF' || $nowPage=='dataFwrite' ||
                $nowPage=='dataG' || $nowPage=='dataGwrite' || $nowPage=='dataH' || $nowPage=='dataHwrite' ){
                echo "style='display: block;'" ; }?>>
                <!-- Panel Variations -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataA' || $nowPage=='dataAwrite' ){ echo "
                    active" ; }?>" href="/admin/dataA">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역별 주거 인구수 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataB' || $nowPage=='dataBwrite' ){ echo "
                    active" ; }?>" href="/admin/dataB">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역별 유동 인구수 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataC' || $nowPage=='dataCwrite' ){ echo "
                    active" ; }?>" href="/admin/dataC">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역별 직장인 인구수 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataD' || $nowPage=='dataDwrite' ){ echo "
                    active" ; }?>" href="/admin/dataD">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역별 직장인 소득액 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataE' || $nowPage=='dataEwrite' ){ echo "
                    active" ; }?>" href="/admin/dataE">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역별 지하철 승하차 인원 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataF' || $nowPage=='dataFwrite' ){ echo "
                    active" ; }?>" href="/admin/dataF">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">주요집객시설 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataG' || $nowPage=='dataGwrite' ){ echo "
                    active" ; }?>" href="/admin/dataG">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">상가정보 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='dataH' || $nowPage=='dataHwrite'){ echo "
                    active" ; }?>" href="/admin/dataH">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지하철 기본정보 관리</span>
                  </a>
                </li>
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
            <li
              class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item <?if($nowPage=='codeA' || $nowPage=='codeAwrite' || $nowPage=='codeB' || $nowPage=='codeBwrite' || $nowPage=='codeC' || $nowPage=='codeCwrite' || $nowPage=='codeD' || $nowPage=='codeDwrite' || $nowPage=='codeE' || $nowPage=='codeEwrite' || $nowPage=='codeF' || $nowPage=='codeFwrite'){ echo "
              u-side-nav-opened has-active"; }?> ">
              <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="#!"
                data-hssm-target="#subMenu5">
                <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-40">
                  <i class="icon-communication-043 u-line-icon-pro"></i>
                </span>
                <span class="media-body align-self-center">코드 관리</span>
                <span class="d-flex align-self-center u-side-nav--control-icon">
                  <i class="hs-admin-angle-right"></i>
                </span>
                <span class="u-side-nav--has-sub-menu__indicator"></span>
              </a>

              <!-- Panels/Cards: Submenu-1 -->
              <ul id="subMenu5" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0"
                <?if($nowPage=='codeA' || $nowPage=='codeAwrite' || $nowPage=='codeB' || $nowPage=='codeBwrite' ||
                $nowPage=='codeC' || $nowPage=='codeCwrite' || $nowPage=='codeD' || $nowPage=='codeDwrite' ||
                $nowPage=='codeE' || $nowPage=='codeEwrite' || $nowPage=='codeF' || $nowPage=='codeFwrite' ){
                echo "style='display: block;'" ; }?>>
                <!-- Panel Variations -->
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='codeA' || $nowPage=='codeAwrite'){ echo "
                    active" ; }?>" href="/admin/codeA">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">분류(대) 코드 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='codeB' || $nowPage=='codeBwrite' ){ echo "
                    active" ; }?>" href="/admin/codeB">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">분류(중) 코드 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='codeC' || $nowPage=='codeCwrite' ){ echo "
                    active" ; }?>" href="/admin/codeC">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">분류(소) 코드 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='codeD' || $nowPage=='codeDwrite' ){ echo "
                    active" ; }?>" href="/admin/codeD">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역 코드(시/도) 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='codeE' || $nowPage=='codeEwrite' ){ echo "
                    active" ; }?>" href="/admin/codeE">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역 코드(구/군) 관리</span>
                  </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                  <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?if($nowPage=='codeF' || $nowPage=='codeFwrite' ){ echo "
                    active" ; }?>" href="/admin/codeF">
                    <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                      <i class="icon-options"></i>
                    </span>
                    <span class="media-body align-self-center">지역 코드(동/면/리) 관리</span>
                  </a>
                </li>
              </ul>
              <!-- End Panels/Cards: Submenu-1 -->
            </li>
          </ul>
        </div>
        <!-- End Sidebar Nav -->