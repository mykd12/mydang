$(document).ready(function () {
	function PcGnb() {
		$('.btn-menu-gnb').on('click', function () {
			$('.slider-menu').toggleClass('active');
		});
		
		$('.gnb_scroll>ul>li>a').on('click', function (e) {
			// e.preventDefault();
			$(this).parent().toggleClass('on');
			$(this).siblings('.depth02').stop().slideToggle(300);
		});
		
		$('.btn-info').on('click', function () {
			$(this).toggleClass('on');
			$('.info-wrap').toggleClass('on');
			$('#main-footer').toggleClass('on');
		});
	}
	PcGnb();
	
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
  }
  MobileGnb();
	
});
