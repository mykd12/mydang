$(document).ready(function () {
  // // 약관동의 체크박스
  // function allCheck(a) {
  //   $("[name=agree]").prop("checked", $(a).prop("checked"));
  // }

  // function oneCheck(a) {
  //   var allChkBox = $('#agreeAll');
  //   var chkBoxName = $(a).attr("name");

  //   if ($(a).prop("checked")) {
  //     checkBoxLength = $("[name=" + chkBoxName + "]").length;
  //     checkedLength = $("[name=" + chkBoxName + "]:checked").length;
  //     if (checkBoxLength == checkedLength) {
  //       allChkBox.prop("checked", true);
  //     } else {
  //       allChkBox.prop("checked", false);

  //     }
  //   } else {
  //     allChkBox.prop("checked", false);
  //   }
  // }
  // $(function () {
  //   $('#agreeAll').click(function () {
  //     allCheck(this);
  //   });
  //   $("[name=agree]").each(function () {
  //     $(this).click(function () {
  //       oneCheck(this);
  //     });
  //   });
  // });

  // input 포커스 이벤트
  $(".int_box input").focus(function () {
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
  $(".id-list li .input-box label").on('propertychange change keyup paste click', function () {
    $(this).closest('li').addClass('on').siblings().removeClass('on');
  });

  //셀렉트 클릭이벤트
  $('.btn-idSelect').on('click', function (e) {
    e.stopPropagation();
    $(this).siblings('.id_select').toggleClass('on');
  });

  // 셀렉트 선택이벤트
  $(".id_select li").on("click", function () {
    var text = $(this).find('span').html();
    $(".btn-idSelect span").html(text);
    $(this).parent().removeClass('on')
  });


  // 첨부파일 변경
  $("#JOIN_FILE").on('change', function () {
    var fileName = $("#JOIN_FILE").val();
    $(".upload-name01").val(fileName);
  });
  $("#JOIN_FILE1").on('change', function () {
    var fileName = $("#JOIN_FILE1").val();
    $(".upload-name03").val(fileName);
  });

  $("#JOIN_IMG").on('change', function () {
    var fileName = $("#JOIN_IMG").val();
    $(".upload-name02").val(fileName);
  });

  $("#joinImg").on('change', function () {
    var fileName = $("#joinImg").val();
    $(".upload-name02").val(fileName);
  });


  $(function () {
    var $inputElement = $(".file");
    $inputElement.change(function () {
      $(this).siblings("label").addClass('on');
    })
    $inputElement.change(function () {
      $(this).siblings("label").addClass('on');
    })
  });

  $('.int_box input').on('focusout', function () {
    var intVal = $(this).val();
    // 공백 검사
    if (intVal == "") {
      $(this).parent().removeClass('on');
      $(this).siblings("label").removeClass('on');
    }
  });
  $(".inq_select").on("change", function () {
    $(this).css('color', '#000');
    $(this).addClass('on');
  });

  // if ($('input').readOnly == false) {
  //   $(this).css(' cursor','point')
  // }

});