 <!-- JS Global Compulsory -->
 <script src="/assets/vendor/jquery/jquery.min.js"></script>
 <script src="/assets/vendor/jquery-migrate/jquery-migrate.min.js"></script>
 <script src="/assets/vendor/popper.min.js"></script>
 <script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

 <script src="/assets/vendor/cookiejs/jquery.cookie.js"></script>


 <!-- JS Plugins Init. -->
 <script src="/assets/vendor/appear.js"></script>
 <script src="/assets/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
 <script src="/assets/vendor/flatpickr/dist/js/flatpickr.min.js"></script>
 <script src="/assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
 <script src="/assets/vendor/ion-range-slider/js/ion.rangeSlider.min.js"></script>
 <script src="/assets/vendor/bloodhound-js/js/bloodhound.min.js"></script>
 <script src="/assets/vendor/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
 <script src="/assets/vendor/bloodhound-js/js/typeahead.jquery.min.js"></script>
 <script src="/assets/vendor/datatables/media/js/jquery.dataTables.js"></script>
 <script src="/assets/vendor/datatables/media/js/dataTables.select.js"></script>
 <script src="/assets/vendor/chartist-js/chartist.min.js"></script>
 <script src="/assets/vendor/fancybox/jquery.fancybox.min.js"></script>
 <script src="/assets/vendor/multiselect/js/jquery.multi-select.js"></script>

 <!-- JS Unify -->
 <script src="/assets/js/hs.core.js"></script>
 <script src="/assets/js/components/hs.side-nav.js"></script>
 <script src="/assets/js/helpers/hs.hamburgers.js"></script>
 <script src="/assets/js/components/hs.dropdown.js"></script>
 <script src="/assets/js/components/hs.scrollbar.js"></script>
 <script src="/assets/js/components/hs.range-slider.js"></script>
 <script src="/assets/js/components/hs.area-chart.js"></script>
 <script src="/assets/js/components/hs.bar-chart.js"></script>
 <script src="/assets/js/helpers/hs.focus-state.js"></script>
 <script src="/assets/js/components/hs.datatables.js"></script>
 <script src="/assets/js/helpers/hs.file-attachments.js"></script>
 <script src="/assets/js/components/hs.file-attachement.js"></script>
 <script src="/assets/js/components/hs.popup.js"></script>
 <script src="/assets/js/components/hs.range-datepicker.js"></script>
 <script src="/assets/js/components/hs.count-qty.js"></script>
 <script src="/assets/js/components/hs.multi-select.js"></script>
 <!-- JS Implementing Plugins -->
 <script src="/assets/vendor/custombox/custombox.min.js"></script>

 <!-- JS Unify -->
 <script src="/assets/js/components/hs.modal-window.js"></script>

 <script src="/assets/js/helpers/hs.rating.js"></script>
 <script src="/assets/js/components/hs.rating.js"></script>
 <!-- JS Custom -->
 <script src="/assets/js/custom.js"></script>


 <!-- JS Plugins Init. -->
 <script>
$(document).on('ready', function() {
  // initialization of custom select
  $('.js-select').selectpicker();

  $('.js-select').on('shown.bs.select', function(e) {
    $(this).addClass('opened');
  });

  $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

  // initialization of sidebar navigation component
  $.HSCore.components.HSSideNav.init('.js-side-nav');
  $.HSCore.components.HSModalWindow.init('[data-modal-target]');

  // initialization of hamburger
  $.HSCore.helpers.HSHamburgers.init('.hamburger');

  // initialization of HSDropdown component
  $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
    dropdownHideOnScroll: false,
    dropdownType: 'css-animation',
    dropdownAnimationIn: 'fadeIn',
    dropdownAnimationOut: 'fadeOut'
  });

  // initialization of forms
  $.HSCore.helpers.HSFileAttachments.init();
  $.HSCore.components.HSFileAttachment.init('.js-file-attachment');
  $.HSCore.helpers.HSFocusState.init();
  $.HSCore.helpers.HSRating.init();

  // initialization of custom scrollbar
  $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));

  // initialization of forms
  $.HSCore.components.HSCountQty.init('.js-quantity');
  $.HSCore.components.HSPopup.init('.js-fancybox', {
    btnTpl: {
      smallBtn: '<button data-fancybox-close class="btn g-pos-abs g-top-25 g-right-30 g-line-height-1 g-bg-transparent g-font-size-16 g-color-gray-light-v6 g-brd-none p-0" title=""><i class="hs-admin-close"></i></button>'
    }
  });
  $.HSCore.components.HSMultiSelect.init('.js-multi-select');

  // initialization of forms
  $.HSCore.components.HSRangeSlider.init('.js-range-slider');


});

$(window).on('resize', function() {
  setTimeout(function() {
    $.HSCore.components.HSAreaChart.init('.js-area-chart');
    $.HSCore.components.HSBarChart.init('.js-bar-chart');
  }, 800);

});
$(document).ready(function() {
  // initialization of rating
  $.HSCore.components.HSRating.init($('.js-rating'), {
    spacing: 2
  });
});
 </script>

 </body>

 </html>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" />
 <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
 <!-- datepicker 한국어로 -->
 <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/i18n/datepicker-ko.js"></script>
 <script>
$(function() {
  $.datepicker.setDefaults({
    dateFormat: "yy-mm-dd", // 날짜의 형식
    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'], //달력의 월 부분 텍스트
    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'], //달력의 월 부분 Tooltip
    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'], //달력의 요일 텍스트
    dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'], //달력의 요일 Tooltip
  });
  $.datepicker.setDefaults($.datepicker.regional['ko']);
  $("#PPT_OPTION_E").datepicker();
  $('#PPT_START_DATE').datepicker({
    minDate: 0,
    onClose: function(selectedDate) {
      if (selectedDate) {
        $("#PPT_END_DATE").datepicker("option", "minDate", selectedDate);
        $("#PPT_END_DATE").focus();
      }
    }
  });
  $('#PPT_END_DATE').datepicker({
    minDate: 0,
    onClose: function(selectedDate) {
      $("#PPT_START_DATE").datepicker("option", "maxDate", selectedDate);
    }
  });
  $('#PST_START').datepicker({
    minDate: 0,
  });
  $('#PST_END').datepicker({
    minDate: 0
  });
})
 </script>