//셀렉트 클릭이벤트
$('.select').on('click', function (e) {
  e.stopPropagation();
  $(this).toggleClass('on');
  $(this).siblings('.depth02').toggleClass('active');
});

// right-slider 이벤트
$(document).on('click', '.con-row .product', function () {
  $('#product-view').show();
  $('#product-view').addClass('active');
  $('#main.search').addClass('active');
  $('.option-slider .swiper-button-prev').css('display', 'none');
  $('.option-slider .swiper-button-next').css('display', 'none');
});

// 업체 상세페이지
$(document).on('click', '.company-list .con-row', function (e) {
  e.stopPropagation();
  e.preventDefault();
  $('.company-view').show();
  $('.more').removeClass('on');
  $('.makeSearch.search .bottomBtn-wrap .btn-wrap a').hide();
  
});
//모바일 업체 상세페이지
$(document).on('click', '.company-list .con-row', function (e) {
  e.stopPropagation();
  e.preventDefault();
  $('.company-view').show();
  $('.more').removeClass('on');
  $('.makeSearch.search .bottomBtn-wrap .btn-wrap a').hide();
  // 메인 높이조절 z-index 조절
  $('.makeSearch').addClass('height');
  
});
// 전화, 견적서 버튼 상위이벤트막기
$(document).on('click', '.call', function (e) {
  e.stopPropagation();
  e.preventDefault();
});

// 리스트 뒤로가기
$('.btn-back').on('click', function () {
  //console.log("back");
  $('#product-view').hide();
  $('#company-view').hide();
  $('.photo-view').hide();
  $('.option-slider .swiper-button-prev').css('display', 'inline-block');
  $('.option-slider .swiper-button-next').css('display', 'inline-block');
  $(".company-location").removeClass("active");
  $('.makeSearch.search .bottomBtn-wrap .btn-wrap a').show();
});

// 모바일 업체리스트 뒤로가기
$('.btn-back').on('click', function () {
  $('.makeSearch').removeClass('height');
});
// 상세페이지 사진 확대
$('.btn-photoView').on('click', function () {
  $('.photo-view').show();
});
$('.product-view .row-01 .img-wrap').on('click', function () {
  $('.photo-view').show();
});

// 뒤로가기 필터 슬라이더 버튼
$(document).on('click', '.search .btn-back', function () {
  $('#product-view').removeClass('active');
  $('#main.search').removeClass('active');
  $('.option-slider .swiper-button-prev').css('display', 'inline-block');
  $('.option-slider .swiper-button-next').css('display', 'inline-block');
});


$('.btn-slider').on('click', function () {
  $(this).toggleClass('on');
  $('.right-slider').toggleClass('on');
  // $('.loding ').toggleClass('on')
});

// 평&m² 단위변환
$('.btn-unit').on('click', function () {
  $(this).toggleClass('on')
  if ($('.btn-unit.on').length > 0) {
    $('.area').each(function (idx, itm) {
      var area02 = Math.round(Number($(this).text()) / 3.3);
      $(this).text(area02);
    });
    $(".text-unit").text('평');
  } else {
    $('.area').each(function (idx, itm) {
      var area03 = Math.round(Number($(this).text()) * 3.3);
      $(this).text(area03);
    });
    $(".text-unit").text('m²');
  }
});



// 셀렉트 선택이벤트
$(".array_select01 li").on("click", function () {
  var text = $(this).find('span').html();
  $(".select_wrap01>.select>span").html(text);
  $(this).parent().removeClass('active')
});
$(".array_select02 li").on("click", function () {
  var text = $(this).find('span').html();
  $(".select_wrap02>.select>span").html(text);
  $(this).parent().removeClass('active')
});
$(".array_select li").on("click", function () {
  // var text = $(this).date();
  // $(".select_wrap>.select>span").html(text);
  // $(this).parent().removeClass('active')
});


// 좋아요 하트 아이콘 클릭
/*$(document).on('click', '.btn-heart', function (e) {
  e.stopPropagation();
  e.preventDefault();
  $(this).toggleClass('on');
});*/


$('.more').on('click', function (e) {
  e.stopPropagation();
  e.preventDefault();
});

$(document).on('click', '.btn-inp', function (e) {
  e.stopPropagation();
  e.preventDefault();
});

// 필터 슬라이더 연결
var optionslider = new Swiper('.option-slider', {
  slidesPerView: 'auto',
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

// 상세페이지이동 클릭
var winH = $(window).height();
var conH = winH - 258;
var conH2 = winH - 145;


// var photoSlider = new Swiper('.photo-slider', {
//   slidesPerView: '2.5', // 동시에 보여줄
//   spaceBetween: 15,
//   speed: 1000,
//   // autoplay: {
//   //   delay: 3000,
//   //   disableOnInteraction: false,
//   // },
//   observer: true,
//   observeParents: true,
//   navigation: {
//     nextEl: '.swiper-button-next',
//     prevEl: '.swiper-button-prev',
//   },
// });

$('.content-view .content').scroll(function () {
  var about = $('.content-view .top').scrollTop() + 300;
  var _scrollTop = $('.content-view .content').scrollTop();

  if (_scrollTop >= 100) {
    $('.content-view .top').addClass('active')
  } else {
    $('.content-view .top').removeClass('active')
  }
});

// top버튼
$('.product-list').scroll(function () {
  if ($(this).scrollTop() > 200) {
    $('.quik').fadeIn();
  } else {
    $('.quik').fadeOut();
  }
});
$('.product-view').scroll(function () {
  if ($(this).scrollTop() > 200) {
    $('.quik').fadeIn();
  } else {
    $('.quik').fadeOut();
  }
});

$(".quik").click(function () {
  $('.con-list-slider').animate({
    scrollTop: 0
  }, 400);
  return false;
});
$(".quik").click(function () {
  $('.product-view').animate({
    scrollTop: 0
  }, 400);
  return false;
});


// 사진상세 닫기버튼
$(".photo-view .btn-close").click(function () {
  $('.photo-view').css('display', 'none');
});

//  명당만들기
// 주소창클릭
// $(document).on('click', '.add', function (e) {
//   e.stopPropagation();
//   e.preventDefault();
//   $(this).toggleClass('on');
//   $(this).siblings('.more').toggleClass('on');
// });
// $('.add').on('click', function (e) {
//   e.stopPropagation();
//   e.preventDefault();
//   $(this).toggleClass('on');
//   $(this).siblings('.more').toggleClass('on');
// });
// $('.btn-').on('click', function (e) {
//   e.stopPropagation();
//   e.preventDefault();
// });




// 상세사진 슬라이더 bottom
var imgDetailSlider = new Swiper('.imgDetail-slider', {
  slidesPerView: '5', // 동시에 보여줄
  spaceBetween: 15,
  observer: true,
  observeParents: true,
});

// 사진 상세 슬라이더 top 
var imgDetailSliderTop = new Swiper('.imgDetail-slider-top', {
  spaceBetween: 15,
  observer: true,
  observeParents: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  thumbs: {
    swiper: imgDetailSlider
  },
  on: {
    slideChangeTransitionStart: function () {
      var i = this.realIndex;
      $('.imgDetail-slider .swiper-slide').eq(i).addClass('active').siblings().removeClass('active');
      $('.imgDetail-slider .swiper-slide').removeClass('swiper-slide-active');
    }
  }
});
$(document).on('click', '.imgDetail-slider .swiper-slide', function (e) {
  //console.log('ssss');
  e.stopPropagation();
  e.preventDefault();
  $(this).addClass('active').siblings().removeClass('active')
  $('.imgDetail-slider .swiper-slide').removeClass('swiper-slide-active')
});

$(document).on('click', '.swiper-button-next', function (e) {
  e.stopPropagation();
  e.preventDefault();
});

$(document).on('click', '.swiper-button-prev', function (e) {
  e.stopPropagation();
  e.preventDefault();
});


function goodCom_slider() {
  // 메믈 슬라이더
  if ($(".goodCom-slider .swiper-slide").length < 5) {
    var campaignSwiper = new Swiper('.goodCom-slider', {
      slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
    });
    $(window).resize(function () {
      let options01 = {};
      var winW = $(window).width();
      if ($(".goodCom-slider .swiper-slide").length <= 3) {
        $('.goodCom-slider').addClass('disabled');
        options01 = {
          loop: false,
          slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
          observer: true,
          observeParents: true,
        }
      }
      if ($(".goodCom-slider .swiper-slide").length == 4) {
        if (winW > 1280) {
          $('.goodCom-slider').addClass('disabled');
          options01 = {
            loop: false,
            slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            observer: true,
            observeParents: true,
          }
        }
        if (winW <= 1280) {
          $('.goodCom-slider').removeClass('disabled');
          options01 = {
            loop: true,
            slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            observer: true,
            observeParents: true,
            navigation: {
              nextEl: '.swiper-button-next',
              prevEl: '.swiper-button-prev',
            },
          }
        }
      }
      if ($(".goodCom-slider .swiper-slide").length == 12) {
        // $('.goodCom-slider').addClass('disabled');
        if (winW > 1280) {
          $('.goodCom-slider').addClass('disabled');
        }
        if (winW <= 1280) {
          $('.goodCom-slider').removeClass('disabled');
          var campaignSwiper = new Swiper('.goodCom-slider', {
            loop: true,
            slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
            observer: true,
            observeParents: true,
          });
        }
      }
      if ($(".goodCom-slider .swiper-slide").length == 16) {
        // $('.goodCom-slider').addClass('disabled');
        if (winW > 1280) {
          $('.goodCom-slider').addClass('disabled');
        }
        if (winW <= 1280) {
          $('.goodCom-slider').removeClass('disabled');
          var campaignSwiper = new Swiper('.goodCom-slider', {
            loop: true,
            slidesPerView: 'auto', // 동시에 보여줄 슬라이드
            observer: true,
            observeParents: true,
          });
        }
      }
      var campaignSwiper = new Swiper('.goodCom-slider', options01);
    }).trigger('resize');
  } else {
    $('.goodCom-slider').addClass('on');
    var goodComSwiper = new Swiper('.goodCom-slider', {
      loop: true,
      slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
      observer: true,
      observeParents: true,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }
}
goodCom_slider();

function case_slider() {
  // 메믈 슬라이더
  if ($(".case-slider .swiper-slide").length >= 4) {
    var campaignSwiper = new Swiper('.case-slider', {
      loop: true,
      slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
      observer: true,
      observeParents: true,
    });
    if ($(".case-slider .swiper-slide").length <= 3) {
      var campaignSwiper = new Swiper('.case-slider', {
        loop: false,
        slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
        observer: true,
        observeParents: true,
      });
    }
  }
}
case_slider();

$(document).on('click', '.btn-next', function (e) {
  e.stopPropagation();
  e.preventDefault();
});
$(document).on('click', '.btn-pre', function (e) {
  e.stopPropagation();
  e.preventDefault();
  $('#modal-inquiryAll').removeClass('on')
});

function MobileGnb() {
  // 모바일메뉴 열기 닫기버튼 클릭이벤트
  $('.btn-menu-gnb').on('click', function () {
    $('body').addClass('fixed');
    $('.menu-gnb').toggleClass('on');
  });
  $('.menu-gnb .btn-close').on('click', function () {
    $('body').removeClass('fixed');
    $('.menu-gnb').removeClass('on');
  });
  // 모바일 li 아코디언 이벤트
  // li가 감싸고 있기떄문에 li에 클릭이벤트를 걸면 안된다.
  // $('.m-gnb>li>a').on('click', function (e) {
  //   e.preventDefault();
  //   $(this).parent().siblings('li').removeClass('on');
  //   $(this).parent().toggleClass('on');
  //   $(this).parent().siblings().find('.depth02').stop().slideUp(300);
  //   $(this).siblings('.depth02').stop().slideToggle(300);
  // });
}
MobileGnb();

/*
// 면적 단위변환
function conversion01() {
  const name01 = document.getElementById('CQT_SIZE01').value;
  document.getElementById("result01").innerText = Math.floor(name01 * 3.305785);
};

function conversion02() {
  const name02 = document.getElementById('CQT_SIZE').value;
  document.getElementById("result").innerText = Math.floor(name02 * 3.305785);
};
*/