$(document).ready(function () {
  // left-wrap 상권현황 상권분석 버튼
  $(".btn-stores01").on('click', function () {
   $('.select-box01').toggleClass('on');
   $('.select-box02').removeClass('on');
   $('.btn-analysis').removeClass('on');
   $('.colum_chart_compare').toggleClass('active');
   $(this).toggleClass('on');
 });
 $(".btn-analysis").on('click', function () {
   $('.select-box02').toggleClass('on');
   $('.select-box01').removeClass('on');
   $('.btn-stores01').removeClass('on');
   $('.colum_chart_compare').toggleClass('active');
   $(this).toggleClass('on');
 });

 // left-wrap 관심매물위치 버튼
 $(".interest").on('click', function () {
   $(this).toggleClass('active');
   $(this).find('.text').toggleClass('on');
 });

 // right-slider 이벤트
 $('.btn-slider').on('click', function () {
   $(this).toggleClass('on')
   $('.right-slider').toggleClass('on')
   $('.loding ').toggleClass('on')

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


 //셀렉트 클릭이벤트
 $('.select').on('click', function (e) {
   e.stopPropagation();
   $(this).toggleClass('on');
   $(this).siblings('.depth02').toggleClass('active');
 });

 // 셀렉트 선택이벤트
 $(".array_select01 li").on("click", function () {
   var text = $(this).find('span').html();
   $(".select_wrap01>.select>span.text").html(text);
   $(this).parent().removeClass('active')
 });
 $(".array_select02 li").on("click", function () {
   var text = $(this).find('span').html();
   $(".select_wrap02>.select>span.text").html(text);
   $(this).parent().removeClass('active')
 });
 $(".array_select li").on("click", function () {
   var text = $(this).date();
   $(".select_wrap>.select>span.text").html(text);
   $(this).parent().removeClass('active')
 });


 // 좋아요 하트 아이콘 클릭
 $(document).on('click', '.btn-heart', function (e) {
   e.stopPropagation();
   e.preventDefault();
   $(this).toggleClass('on');
 });
 
 
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
 
 //필터 옵션창
 // $('.search .option-slider .swiper-slide').on('click', function (e) {
 //   e.preventDefault();
 //   $(this).toggleClass('on').siblings().removeClass('on');
 //   var idx = $(this).index();
 //   $('.search .option-wrap>li').eq(idx).toggleClass('on').siblings().removeClass('on');
 // });
 
 // $('.search.makeSearch .option-slider .swiper-slide').on('click', function (e) {
 //   $(this).toggleClass('on');
 // });

 // 옵션창 탭
 $('.op-box .tab-menu li').on('click', function (e) {
   $(this).addClass('on').siblings().removeClass('on');
   e.preventDefault();
   var idx = $(this).index();
   $('.con02').eq(idx).addClass('on').siblings().removeClass('on');
 });
 
 // 옵션선택
 $('.op-box .con ul li').on('click', function (e) {
   $(this).toggleClass('on');
 });
 
 // 선택완료 필터아이콘활성화
 $('.btn-complete').on('click', function (e) {
   e.preventDefault();
   var idx = $('.option-wrap>li.on').index();
   if (idx == '0') {
     $("#OPTION_A").val("1");
     $('.swiper-slide').addClass('active');
   } else if (idx == '1') {
     $("#OPTION_B").val("1");
   } else if (idx == '2') {
     if (!$("#PPT_PRICE_C1").is(":checked") && !$("#PPT_PRICE_C2").is(":checked") && !$("#PPT_PRICE_C3").is(":checked")) {
       alert("권리금 구분을 선택해주세요.");
       $("#PPT_PRICE_C1").focus();
       return false;
     } else {
       $("#OPTION_C").val("1");
     }
   } else if (idx == '3') {
     $("#OPTION_D").val("1");
   } else if (idx == '4') {
     if (!$("#PPT_CATE1").is(":checked") && !$("#PPT_CATE2").is(":checked") && !$("#PPT_CATE3").is(":checked") && !$("#PPT_CATE4").is(":checked") && !$("#PPT_CATE5").is(":checked") && !$("#PPT_CATE6").is(":checked")) {
       alert("건물형태 선택해주세요.");
       $("#PPT_CATE1").focus();
       return false;
     } else {
       $("#OPTION_E").val("1");
     }
   } else if (idx == '5') {
     if (!$("#PPT_STOREYS1").is(":checked") && !$("#PPT_STOREYS2").is(":checked") && !$("#PPT_STOREYS3").is(":checked")) {
       alert("선호 층수를 선택해주세요.");
       $("#PPT_STOREYS1").focus();
       return false;
     } else {
       $("#OPTION_F").val("1");
     }
   } else if (idx == '6') {
     $("#OPTION_G").val("1");
   } else if (idx == '7') {
     if (!$("#PPT_OPTION_J1").is(":checked") && !$("#PPT_OPTION_J2").is(":checked") && !$("#PPT_OPTION_J3").is(":checked") && !$("#PPT_OPTION_J4").is(":checked")) {
       alert("화장실 구분을 선택해주세요.");
       $("#PPT_OPTION_J1").focus();
       return false;
     } else {
       $("#OPTION_H").val("1");
     }
   } else if (idx == '8') {
     if (!$("#PPT_OPTION_C").is(":checked") && !$("#PPT_OPTION_D").is(":checked") && !$("#PPT_OPTION_K").is(":checked") && !$("#PPT_OPTION_E").is(":checked") && !$("#PPT_OPTION_F").is(":checked") && !$("#PPT_OPTION_G").is(":checked")) {
       alert("기타 구분을 선택해주세요.");
       $("#PPT_OPTION_C").focus();
       return false;
     } else {
       $("#OPTION_I").val("1");
     }
   }
   $('.btn-modal').eq(idx).addClass('on').siblings().removeClass('on');
   $('.option-wrap li').removeClass('on');
   $('.close-wrap li').eq(idx).addClass('on');
   $('.select-menu').css('top', '255px')
 });
 
 // 필터옵션 checked 초기화,전체선택
 $('.op-box .btn-reset').on('click', function (e) {
   e.preventDefault();
   var idx = $('.option-wrap>li.on').index();
   $('.btn-modal').eq(idx).removeClass('on');
   $('.option-wrap li').removeClass('on');
   $('.close-wrap li').eq(idx).removeClass('on');
   if ($('.close-wrap li.on').length == 0) {
     $('.select-menu').css('top', '222px')
   };
   if (idx == 0) {
     $("#OPTION_A").val("0");
     $("#PPT_PRICE_A").data("ionRangeSlider").reset();
   } else if (idx == 1) {
     $("#OPTION_B").val("0");
     $("#PPT_PRICE_B").data("ionRangeSlider").reset();
   } else if (idx == 2) {
     $("#OPTION_C").val("0");
     $("input[name='PPT_PRICE_C']").prop("checked", false);
   } else if (idx == 3) {
     $("#OPTION_D").val("0");
     $("#PPT_SIZE").data("ionRangeSlider").reset();
   } else if (idx == 4) {
     $("#OPTION_E").val("0");
     $("input[name='PPT_CATE']").prop("checked", false);
   } else if (idx == 5) {
     $("#OPTION_F").val("0");
     $("input[name='PPT_STOREYS']").prop("checked", false);
   } else if (idx == 6) {
     $("#OPTION_G").val("0");
     $("#PPT_OPTION_I").data("ionRangeSlider").reset();
   } else if (idx == 7) {
     $("#OPTION_H").val("0");
     $("input[name='PPT_OPTION_J']").prop("checked", false);
   } else if (idx == 8) {
     $("#OPTION_I").val("0");
     $("#PPT_OPTION_C").prop("checked", false);
     $("#PPT_OPTION_D").prop("checked", false);
     $("#PPT_OPTION_K").prop("checked", false);
     $("#PPT_OPTION_E").prop("checked", false);
     $("#PPT_OPTION_F").prop("checked", false);
     $("#PPT_OPTION_G").prop("checked", false);
   }
 });

 $('.op-box .btn-all').on('click', function () {
   $(this).siblings().find('input').data("ionRangeSlider").reset();
 });


 // 게이지바
 var custom_values1 = ['최소', '천만', '오천만', '일억', '최대'];
 var optionGauge1 = {
   skin: "big",
   type: "double",
   min: 0,
   max: 10000,
   step: 1,
   grid: true, // show/hide grid
   grid_num: 1,
   grid_snap: false,
   values: custom_values1
 }
 //$("#demo_1").ionRangeSlider(optionGauge1);
 $("#PPT_PRICE_A").ionRangeSlider(optionGauge1);
 //console.log("ok");

 var custom_values21 = ['최소', '백만', '천만', '천오백만', '최대'];
 var optionGauge21 = {
   skin: "big",
   type: "double",
   min: 0,
   max: 10000,
   step: 1,
   grid: true, // show/hide grid
   grid_num: 1,
   grid_snap: false,
   values: custom_values21
 }
 $("#demo_21").ionRangeSlider(optionGauge21);

 var custom_values22 = ['최소', '일억', '오억', '십오억', '최대'];
 var optionGauge22 = {
   skin: "big",
   type: "double",
   min: 0,
   max: 10000,
   step: 1,
   grid: true, // show/hide grid
   grid_num: 1,
   grid_snap: false,
   values: custom_values22
 }
 $("#demo_22").ionRangeSlider(optionGauge22);
 $("#PPT_PRICE_B").ionRangeSlider(optionGauge21);
 $("#demo_24").ionRangeSlider(optionGauge22);
 $("#demo_31").ionRangeSlider(optionGauge1);

 var custom_valuesCar = ['0', '3', '6', '9', '최대'];
 var optionGaugeCar = {
   skin: "big",
   type: "double",
   min: 0,
   max: 10000,
   step: 1,
   grid: true, // show/hide grid
   grid_num: 1,
   grid_snap: false,
   values: custom_valuesCar
 }
 $("#PPT_OPTION_I").ionRangeSlider(optionGaugeCar);

 var custom_values41 = ['최소', '99㎡', '198㎡', '297㎡', '최대'];
 var custom_values42 = ['최소', '30평', '60평', '90평', '최대'];
 var optionGauge41 = {
   skin: "big",
   type: "double",
   min: 0,
   max: 10000,
   step: 1,
   grid: true, // show/hide grid
   grid_num: 1,
   grid_snap: false,
   values: custom_values41
 }
 $("#PPT_SIZE").ionRangeSlider(optionGauge41);


 // 옵션 단위변환
 $('.btn-change').on('click', function () {
   $(this).toggleClass('on')
   if ($('.btn-change.on').length > 0) {
     $("#PPT_SIZE").data('ionRangeSlider').update({
       values: custom_values42
     })
   } else {
     $("#PPT_SIZE").data('ionRangeSlider').update({
       values: custom_values41
     })
   }
 });

 // 상세페이지이동 클릭
 var winH = $(window).height();
 var conH = winH - 258;
 var conH2 = winH - 145;

 // 매물상세페이지
 // $('.product-view').css('height', conH2);
 // $('.con-list-slider').css('height', conH);
 $(document).on('click', '.con-row .product', function () {
   $('#map_loding').css('display', '');
   $('#list_loding').css('display', '');
   $('#product-view').show();
   $('#product-view').addClass('active');
   $('.option-slider .swiper-button-prev').css('display', 'none');
   $('.option-slider .swiper-button-next').css('display', 'none');
 });
 // 업체 상세페이지
 $(document).on('click', '.company-list .con-row', function (e) {
   e.stopPropagation();
   e.preventDefault();
   $('.company-view').show();
   $('.more').removeClass('on');
 });
 // 전화, 견적서 버튼 상위이벤트막기
 $(document).on('click', '.call', function (e) {
   e.stopPropagation();
   e.preventDefault();
 });
 $(document).on('click', '.btn-quoteContact', function (e) {
   e.stopPropagation();
   e.preventDefault();
   $(this).toggleClass('on')
   $(this).find('span').toggleClass('on')
 });
 // 리스트 뒤로가기
 $('.btn-back').on('click', function () {
   $('#product-view').hide();
   $('.company-view').hide();
   $('.photo-view').hide();
   $('.option-slider .swiper-button-prev').css('display', 'inline-block');
   $('.option-slider .swiper-button-next').css('display', 'inline-block');
   $(".company-location").removeClass("active");
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
   $('.option-slider .swiper-button-prev').css('display', 'inline-block');
   $('.option-slider .swiper-button-next').css('display', 'inline-block');
 });


 //  행정기관 탭
 $('.content-view .tab-menu li').on('click', function (e) {
   e.preventDefault();
   $(this).addClass('on').siblings().removeClass('on');
   var idx = $(this).index();
   $('.con-wrap .con').eq(idx).addClass('on').siblings().removeClass('on');
 });

 // 매물 상세 하단 추천매물 슬라이더
 var bottomSlider = new Swiper('.bottom-slider', {
   loop: true,
   slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
   speed: 1000,
   // autoplay: {
   //   delay: 3000,
   //   disableOnInteraction: false,
   // },
   observer: true,
   observeParents: true,
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
 });


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
   console.log('ssss')
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


 // 달력위젯
 $(function () {
   $('#CQT_DATE').datepicker({
     dateFormat: "yy-mm-dd",
     minDate: 0, // 오늘 이전 날짜 선택 불가
     dayNames: ['월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일'],
     dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'],
     monthNamesShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
     monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월']
   });
 });
 $(function () {
   $('#CQT_DATE02').datepicker({
     dateFormat: "yy-mm-dd",
     minDate: 0, // 오늘 이전 날짜 선택 불가
     dayNames: ['월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일'],
     dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'],
     monthNamesShort: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
     monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월']
   });
 });

 $(document).on('click', '.btn-next', function (e) {
   e.stopPropagation();
   e.preventDefault();
   if ($("input:checkbox[name='CCT_IDX[]']:checked").length > 0) {
     $('#modal-inquiryAll').addClass('on')
   } else {
     alert("시공업체를 선택해주세요!");
     return flase;
   }

 });
 $(document).on('click', '.btn-pre', function (e) {
   e.stopPropagation();
   e.preventDefault();
   $('#modal-inquiryAll').removeClass('on')
 });

  // input 포커스 이벤트
  $(".int_box input").focus(function () {
   $(this).parent().addClass('on');
   $(this).find('label').addClass('on');
 });
  // input 포커스 이벤트
  $(".int_box input").focusOut(function () {
   $(this).parent().addClass('on');
   $(this).find('label').addClass('on');
 });
 $(".int_box input").keyup(function () {
   $(this).siblings('.error01').removeClass('on');
   $(this).find('label').addClass('on');
 });
 $(".int_box").on('propertychange change keyup paste click', function () {
   $(this).children('input').focus();
   $(this).find('label').addClass('on');
 });
 $(".int_box input").on('propertychange change keyup paste click', function () {
   $(this).parent().addClass('on');
   $(this).siblings('label').addClass('on');
   $(this).find('label').addClass('on');
 });
 
 function input(){
   var inputVal = $(".int_box input").val();
   if (inputVal == "") {
     $('.int_box').removeClass('on');
   } else {
     $('.int_box').addClass('on');
   }
 } input();


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
   $('.m-gnb>li>a').on('click', function (e) {
     e.preventDefault();
     $(this).parent().siblings('li').removeClass('on');
     $(this).parent().toggleClass('on');
     $(this).parent().siblings().find('.depth02').stop().slideUp(300);
     $(this).siblings('.depth02').stop().slideToggle(300);
   });
 }
 MobileGnb();



});

// 면적 단위변환
function conversion01() {
 const name01 = document.getElementById('CQT_SIZE01').value;
 document.getElementById("result01").innerText = Math.floor(name01 * 3.305785);
};

function conversion02() {
 const name02 = document.getElementById('CQT_SIZE').value;
 document.getElementById("result").innerText = Math.floor(name02 * 3.305785);
};