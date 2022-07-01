<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Title -->
  <title>Myeongdang admin || Login</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="/assets/vendor/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/vendor/icon-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/assets/vendor/icon-line-pro/style.css">
  <link rel="stylesheet" href="/assets/vendor/icon-hs/style.css">
  <link rel="stylesheet" href="/assets/vendor/animate.css">
  <link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="/assets/vendor/hamburgers/hamburgers.min.css">

  <!-- CSS Unify -->
  <link rel="stylesheet" href="/assets/css/unify-core.css">
  <link rel="stylesheet" href="/assets/css/unify-components.css">
  <link rel="stylesheet" href="/assets/css/unify-globals.css">

  <!-- CSS Customization -->
  <link rel="stylesheet" href="/assets/css/custom.css">
  <?
		if($this -> session ->userdata('ADMIN_IDX') && $this -> session ->userdata('ADMIN_ID')){
			echo "<script>location.href='/admin/user';</script>";
		}
  ?>
</head>
<style type="text/css">
/*========
메인
==========*/
@import url('https://fonts.googleapis.com/css?family=Noto+Sans+KR:100,300,400,500,700,900&subset=korean');

.C-S-main-title {}

.C-S-main-title {
  font-size: 36px;
  font-family: 'Noto Sans KR', sans-serif;
  font-weight: 300;
  letter-spacing: -0.1rem;
  line-height: 44px;
}

.C-S-main-title span {
  vertical-align: bottom;
  margin-right: 5px;
  display: inline-block;
  width: 110px;
}

.C-S-main-title span img {
  max-width: 100%;
}

@media (max-width:1600px) {
  .C-S-main-textwp {
    padding: 0 !important;
  }
}

@media (max-width:1300px) {
  .C-S-main-textwp {
    margin-left: 3rem !important;
    margin-right: 3rem !important;
  }
}

@media (max-width:1100px) {
  .C-S-main-title span {
    display: block;
    margin-bottom: 5px;
  }
}

@media (max-width:991px) {
  .slick-list {
    height: 250px !important;
    width: 100%;
    background: url(./img/admin/admin_login_bg.png) 50% 50% no-repeat;
    background-size: 1300px;
  }

  .slick-list .slick-track {
    display: none;
  }

  .slick-list .slick-track .js-slide {
    height: 100% !important;
    min-height: auto !important;
  }

  .C-S-main-textwp {
    max-width: 400px;
    margin-left: auto !important;
    margin-right: auto !important;
    padding: 20px !important;
  }

  .C-S-main-title {
    text-align: center;
  }

  .C-S-main-title span {
    display: inline-block;
    margin-bottom: 0;
  }
}

@media (max-width:340px) {
  .slick-list {
    height: 180px !important;
    width: 100%;
    background: url(./img/admin/admin_login_bg.png) 50% 50% no-repeat;
    background-size: 1000px;
  }

  .C-S-main-title {
    font-size: 28px;
    line-height: 30px;
  }

  .C-S-main-title span {
    width: 80px
  }
}
</style>

<body>
  <main>
    <!-- Login -->
    <section class="clearfix">
      <div class="row no-gutters align-items-center">
        <div class="col-lg-8">
          <!-- Promo Block - Slider -->
          <div class="js-carousel" data-autoplay="false" data-infinite="true" data-fade="true" data-speed="5000">
            <div class="js-slide g-bg-size-cover g-min-height-100vh"
              style="background-image: url(./img/admin/admin_login_bg02.png);  background-position:33% 50%;"
              data-calc-target="#js-header"></div>

            <div class="js-slide g-bg-size-cover g-min-height-100vh"
              style="background-image: url(./img/admin/admin_login_bg02.png);   background-position:33% 50%;"
              data-calc-target="#js-header"></div>
          </div>
          <!-- End Promo Block - Slider -->
        </div>

        <div class="col-lg-4">
          <div class="g-pa-50 g-mx-70--xl C-S-main-textwp">
            <!-- Form -->
            <form class="g-py-15" action='/Admin_auth/login' method='post' id='frm' onsubmit='return login_ck();'>
              <h2 class="C-S-main-title h3 g-color-black mb-4">ADMIN LOGIN</h2>

              <div class="mb-4">
                <div class="input-group g-brd-primary--focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text g-width-45 g-brd-right-none g-brd-gray-light-v4 g-color-primary"><i
                        class="icon-finance-067 u-line-icon-pro g-pos-rel g-top-2"></i></span>
                  </div>
                  <input
                    class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15"
                    type="text" id='LOGIN_ID' name='LOGIN_ID' placeholder="Enter admin ID.">
                </div>
              </div>

              <div class="mb-4">
                <div class="input-group g-brd-primary--focus">
                  <div class="input-group-prepend">
                    <span class="input-group-text g-width-45 g-brd-right-none g-brd-gray-light-v4 g-color-primary"><i
                        class="icon-media-094 u-line-icon-pro g-pos-rel g-top-2"></i></span>
                  </div>
                  <input
                    class="form-control g-color-black g-brd-left-none g-bg-white g-brd-gray-light-v4 g-pl-0 g-pr-15 g-py-15"
                    type="password" id='LOGIN_PW' name='LOGIN_PW' placeholder="Enter admin PWD.">
                </div>
              </div>



              <div class="g-mb-50">
                <input type='submit' class="btn btn-md btn-block u-btn-primary rounded text-uppercase g-py-13"
                  value="LOGIN" />
              </div>

            </form>
            <!-- End Form -->
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->



  </main>

  <div class="u-outer-spaces-helper"></div>


  <!-- JS Global Compulsory -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
  <script src="/assets/vendor/popper.min.js"></script>
  <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>


  <!-- JS Implementing Plugins -->
  <script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
  <script src="/assets/vendor/slick-carousel/slick/slick.js"></script>

  <script src="/assets/js/hs.core.js"></script>
  <script src="/assets/js/components/hs.header.js"></script>
  <script src="/assets/js/helpers/hs.hamburgers.js"></script>
  <script src="/assets/js/components/hs.tabs.js"></script>
  <script src="/assets/js/components/hs.carousel.js"></script>
  <script src="/assets/js/helpers/hs.height-calc.js"></script>
  <script src="/assets/js/components/hs.go-to.js"></script>
  <script src="/assets/js/helpers/hs.focus-state.js"></script>

  <!-- JS Customization -->
  <script src="/assets/js/custom.js"></script>

  <!-- JS Plugins Init. -->
  <script>
  $(document).on('ready', function() {
    // initialization of carousel
    $.HSCore.components.HSCarousel.init('.js-carousel');

    // initialization of tabs
    $.HSCore.components.HSTabs.init('[role="tablist"]');

    // initialization of header's height equal offset
    $.HSCore.helpers.HSHeightCalc.init();

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    // Form Focus State
    $.HSCore.helpers.HSFocusState.init();
  });

  $(window).on('load', function() {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
      event: 'hover',
      pageContainer: $('.container'),
      breakpoint: 991
    });
  });

  $(window).on('resize', function() {
    setTimeout(function() {
      $.HSCore.components.HSTabs.init('[role="tablist"]');
    }, 200);
  });
  </script>
  <script type="text/javascript">
  <!--
  function login_ck() {
    if (!$("#LOGIN_ID").val()) {
      alert('관리자 아이디를 입려해주세요.');
      $("#LOGIN_ID").focus();
      return false;
    } else if (!$("#LOGIN_PW").val()) {
      alert('관리자 패스워드를 입력해주세요.');
      $("#LOGIN_PW").focus();
      return false;
    } else {
      return true;
    }
  }
  //
  -->
  </script>






</body>

</html>