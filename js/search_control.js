// 매물 선택보기
if (PPT_IDX) {
  list_detail(PPT_IDX);
  $("#product-view").addClass("active");
}

//// 사용할 앱의 JavaScript 키를 설정해 주세요.
Kakao.init('64e888255177e7c55224d2acfdaa3146');
// // 카카오링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
Kakao.Link.createDefaultButton({
  container: '#kakao_feed',
  objectType: 'feed',
  content: {
    title: '부동산 플래폼 매물찾기 Url',
    description: $("#kakao_feed").attr("data5"),
    imageUrl: 'https://mydang.kr/uploads/' + $("#kakao_feed").attr("data4"),
    link: {
      mobileWebUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
        '&cur_lat=' + $("#kakao_feed").attr("data2") +
        '&cur_lon=' + $("#kakao_feed").attr("data3"),
      webUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") + '&cur_lat=' + $(
          "#kakao_feed").attr("data2") + '&cur_lon=' +
        $("#kakao_feed").attr("data3")
    }
  },
  buttons: [{
    title: '웹으로 보기',
    link: {
      mobileWebUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
        '&cur_lat=' + $("#kakao_feed").attr("data2") +
        '&cur_lon=' + $("#kakao_feed").attr("data3"),
      webUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
        '&cur_lat=' + $("#kakao_feed").attr("data2") +
        '&cur_lon=' + $("#kakao_feed").attr("data3")
    }
  }]
});

$(".btn-share").click(function() {
  Kakao.Link.createDefaultButton({
    container: '#kakao_feed',
    objectType: 'feed',
    content: {
      title: '부동산 플래폼 매물찾기 Url',
      description: $("#kakao_feed").attr("data5"),
      imageUrl: 'https://mydang.kr/uploads/' + $("#kakao_feed").attr("data4"),
      link: {
        mobileWebUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") +
          '&cur_lon=' + $("#kakao_feed").attr("data3"),
        webUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") + '&cur_lon=' +
          $("#kakao_feed").attr("data3")
      }
    },
    buttons: [{
      title: '웹으로 보기',
      link: {
        mobileWebUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") +
          '&cur_lon=' + $("#kakao_feed").attr("data3"),
        webUrl: 'https://mydang.kr/main/search?PPT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") +
          '&cur_lon=' + $("#kakao_feed").attr("data3")
      }
    }]
  });
});
// 네이버 공유
function naver_share(PPT_IDX, PPT_LAT, PPT_LON, PPT_NAME) {
  var url = encodeURI(encodeURIComponent('https://mydang.kr/main/search?PPT_IDX=' + PPT_IDX + '&cur_lat=' +
    PPT_LAT + '&cur_lon=' + PPT_LON));
  var shareURL = "http://blog.naver.com/LinkShare.nhn?url=" + url + "&title=" + PPT_NAME;
  window.open(shareURL, "네이버공유", "_blank ")
}

// 링크복사
function clipBoard(PPT_IDX, PPT_LAT, PPT_LON) {
  $("#cp_clipBoard").val('https://mydang.kr/main/search?PPT_IDX=' + PPT_IDX + '&cur_lat=' + PPT_LAT +
    '&cur_lon=' + PPT_LON);
  $("#cp_clipBoard").attr("type", "text");
  $("#cp_clipBoard").select();

  try { // The important part (copy selected text)
    var successful = document.execCommand('copy');
    $("#cp_clipBoard").attr("type", "hidden");
    alert("복사되었습니다.");
    // if(successful) answer.innerHTML = 'Copied!';
    // else answer.innerHTML = 'Unable to copy!';
  } catch (err) {
    alert('이 브라우저는 지원하지 않습니다.')
  }
}

// 옵션설정

  
  $("#optA01").change(function() {
    if($(".option-all").hasClass("on") === true){
      $(".optAdata").val($(this).val());
      var from = $("#optA01").data("from");
      var to = $("#optA01").data("to");
      var optA_instance = $("#optA").data("ionRangeSlider");
      optA_instance.update({
          from: from,
          to: to
      });
      if(from==0 && to==4){
        $("#optionTabA").removeClass("on");
      }else{
        $("#optionTabA").addClass("on");
      }
      overLay_Loding("");
    }
  });
  $("#optA").change(function() {
    if($(".option-all").hasClass("on") === false){
      $(".optAdata").val($(this).val());
      var from = $("#optA").data("from");
      var to = $("#optA").data("to");
      var optA01_instance = $("#optA01").data("ionRangeSlider");
      optA01_instance.update({
          from: from,
          to: to
      });
      if(from==0 && to==4){
        $("#optionTabA").removeClass("on");
      }else{
        $("#optionTabA").addClass("on");
      }
      overLay_Loding("");
    }
  });

  function type_A_all() {
    $(".optAdata").val("0");
    var optA_instance = $("#optA").data("ionRangeSlider");
    optA_instance.update({
        from: 0,
        to: 4
    });
    var optA01_instance = $("#optA01").data("ionRangeSlider");
    optA01_instance.update({
        from: 0,
        to: 4
    });
    optA_instance.reset();
    optA01_instance.reset();
    $("#optionTabA").removeClass("on");
    overLay_Loding("");
  }

  $("#optB01").change(function() {
    if($(".option-all").hasClass("on") === true){
      $(".optBdata").val($(this).val());
      var from = $("#optB01").data("from");
      var to = $("#optB01").data("to");
      var optB_instance = $("#optB").data("ionRangeSlider");
      optB_instance.update({
          from: from,
          to: to
      });
      if(from==0 && to==4){
        $("#optionTabB").removeClass("on");
      }else{
        $("#optionTabB").addClass("on");
      }
      overLay_Loding("");
    }
  });

  $("#optB").change(function() {
    if($(".option-all").hasClass("on") === false){
      $(".optBdata").val($(this).val());
      var from = $("#optB").data("from");
      var to = $("#optB").data("to");
      var optB01_instance = $("#optB01").data("ionRangeSlider");
      optB01_instance.update({
          from: from,
          to: to
      });
      if(from==0 && to==4){
        $("#optionTabB").removeClass("on");
      }else{
        $("#optionTabB").addClass("on");
      }
      overLay_Loding("");
    }
  });

  function type_B_all() {
    $(".optBdata").val("0");
    var optB_instance = $("#optB").data("ionRangeSlider");
    optB_instance.update({
        from: 0,
        to: 4
    });
    var optB01_instance = $("#optB01").data("ionRangeSlider");
    optB01_instance.update({
        from: 0,
        to: 4
    });
    optB_instance.reset();
    optB01_instance.reset();
    $("#optionTabB").removeClass("on");
    overLay_Loding("");
  }
  
  $("#optC001").change(function() {
    if($(".option-all").hasClass("on") === true){
      $(".optCdata").val($(this).val());
      var from = $("#optC001").data("from");
      var to = $("#optC001").data("to");
      var optC01_instance = $("#optC01").data("ionRangeSlider");
      optC01_instance.update({
          from: from,
          to: to
      });
      if(from==0 && to==4 && !$('input:radio[name=optC]').is(':checked')){
        $("#optionTabC").removeClass("on");
      }else{
        $("#optionTabC").addClass("on");
      }
      overLay_Loding("");
    }
  });
  $("#optC01").change(function() {
    if($(".option-all").hasClass("on") === false){
      $(".optCdata").val($(this).val());
      var from = $("#optC01").data("from");
      var to = $("#optC01").data("to");
      var optC001_instance = $("#optC001").data("ionRangeSlider");
      optC001_instance.update({
          from: from,
          to: to
      });
      if(from==0 && to==4 && !$('input:radio[name=optC]').is(':checked')){
        $("#optionTabC").removeClass("on");
      }else{
        $("#optionTabC").addClass("on");
      }
      overLay_Loding("");
    }
  });

$("input[name='optC']:radio").change(function() {
  if($(".option-all").hasClass("on") === false){
    $("input:radio[name='optC0011']:input[value='"+$(this).val()+"']").prop('checked', true);
    $(".optCdata").val($(this).val());
    $("#optionTabC").addClass("on");
    overLay_Loding("");
  }
});
$("input[name='optC0011']:radio").change(function() {
  if($(".option-all").hasClass("on") === true){
    $("input:radio[name='optC']:input[value='"+$(this).val()+"']").prop('checked', true);
    $(".optCdata").val($(this).val());
    $("#optionTabC").addClass("on");
    overLay_Loding("");
  }
});


function type_C_all() {
  $(".optCdata").val("0");
  var optC01_instance = $("#optC01").data("ionRangeSlider");
  optC01_instance.update({
      from: 0,
      to: 4
  });
  var optC001_instance = $("#optC001").data("ionRangeSlider");
  optC001_instance.update({
      from: 0,
      to: 4
  });
  optC01_instance.reset();
  optC001_instance.reset();
  $("input[name='optC']:radio").prop("checked", false);
  $("input[name='optC0011']:radio").prop("checked", false);
  $("#optionTabC").removeClass("on");
  overLay_Loding("");
}

// 옵션 단위변환
$('.btn-change').on('click', function() {
  $(this).toggleClass('on')
  if ($('.btn-change.on').length > 0) {
    $("#optD").data('ionRangeSlider').update({
      values: custom_values42
    })
  } else {
    $("#optD").data('ionRangeSlider').update({
      values: custom_values41
    })
  }
});
$('.btn-change01').on('click', function() {
  $(this).toggleClass('on')
  if ($('.btn-change01.on').length > 0) {
    $("#optD01").data('ionRangeSlider').update({
      values: custom_values42
    })
  } else {
    $("#optD01").data('ionRangeSlider').update({
      values: custom_values41
    })
  }
});

$("#optD01").change(function() {
  if($(".option-all").hasClass("on") === true){
    $(".optDdata").val($(this).val());
    var from = $("#optD01").data("from");
    var to = $("#optD01").data("to");
    var optD_instance = $("#optD").data("ionRangeSlider");
    optD_instance.update({
        from: from,
        to: to
    });
    if(from==0 && to==4){
      $("#optionTabD").removeClass("on");
    }else{
      $("#optionTabD").addClass("on");
    }
    overLay_Loding("");
  }
});
$("#optD").change(function() {
  if($(".option-all").hasClass("on") === false){
    $(".optDdata").val($(this).val());
    var from = $("#optD").data("from");
    var to = $("#optD").data("to");
    var optD01_instance = $("#optD01").data("ionRangeSlider");
    optD01_instance.update({
        from: from,
        to: to
    });
    if(from==0 && to==4){
      $("#optionTabD").removeClass("on");
    }else{
      $("#optionTabD").addClass("on");
    }
    overLay_Loding("");
  }
});

function type_D_all() {
  $(".optDdata").val("0");
  var optD_instance = $("#optD").data("ionRangeSlider");
  optD_instance.update({
      from: 0,
      to: 4
  });
  var optD01_instance = $("#optD01").data("ionRangeSlider");
  optD01_instance.update({
      from: 0,
      to: 4
  });
  optD_instance.reset();
  optD01_instance.reset();
  $("#optionTabD").removeClass("on");
  overLay_Loding("");
}
$("input[name='optE']:radio").change(function() {
  if($(".option-all").hasClass("on") === false){
    $("input:radio[name='optE01']:input[value='"+$(this).val()+"']").prop('checked', true);
    $("#optEdata").val($(this).val());
    $("#optionTabE").addClass("on");
    overLay_Loding("");
  }
});
$("input[name='optE01']:radio").change(function() {
  if($(".option-all").hasClass("on") === true){
    $("input:radio[name='optE']:input[value='"+$(this).val()+"']").prop('checked', true);
    $("#optEdata").val($(this).val());
    $("#optionTabE").addClass("on");
    overLay_Loding("");
  }
});
function type_E_all(){
  $("input[name='optE']:radio").prop("checked", false);
  $("input[name='optE01']:radio").prop("checked", false);
  $("#optionTabE").removeClass("on");
  overLay_Loding("");
}

$("input[name='optF']:radio").change(function() {
  if($(".option-all").hasClass("on") === false){
    $("input:radio[name='optF01']:input[value='"+$(this).val()+"']").prop('checked', true);
    $(".optFdata").val($(this).val());
    $("#optionTabF").addClass("on");
    overLay_Loding("");
  }
});
$("input[name='optF01']:radio").change(function() {
  if($(".option-all").hasClass("on") === true){
    $("input:radio[name='optF']:input[value='"+$(this).val()+"']").prop('checked', true);
    $(".optFdata").val($(this).val());
    $("#optionTabF").addClass("on");
    overLay_Loding("");
  }
});
function type_F_all(){
  $("input[name='optF']:radio").prop("checked", false);
  $("input[name='optF01']:radio").prop("checked", false);
  $("#optionTabF").removeClass("on");
  overLay_Loding("");
}

$("#optG01").change(function() {
  if($(".option-all").hasClass("on") === true){
    $(".optGdata").val($(this).val());
    var from = $("#optG01").data("from");
    var to = $("#optG01").data("to");
    var optG_instance = $("#optG").data("ionRangeSlider");
    optG_instance.update({
        from: from,
        to: to
    });
    if(from==0 && to==4){
      $("#optionTabG").removeClass("on");
    }else{
      $("#optionTabG").addClass("on");
    }
    overLay_Loding("");
  }
});
$("#optG").change(function() {
  if($(".option-all").hasClass("on") === false){
    $(".optGdata").val($(this).val());
    var from = $("#optG").data("from");
    var to = $("#optG").data("to");
    var optG01_instance = $("#optG01").data("ionRangeSlider");
    optG01_instance.update({
        from: from,
        to: to
    });
    if(from==0 && to==4){
      $("#optionTabG").removeClass("on");
    }else{
      $("#optionTabG").addClass("on");
    }
    overLay_Loding("");
  }
});

function type_G_all() {
  $(".optGdata").val("0");
  var optG_instance = $("#optG").data("ionRangeSlider");
  optG_instance.update({
      from: 0,
      to: 4
  });
  var optG01_instance = $("#optG01").data("ionRangeSlider");
  optG01_instance.update({
      from: 0,
      to: 4
  });
  optG_instance.reset();
  optG01_instance.reset();
  $("#optionTabG").removeClass("on");
  overLay_Loding("");
}

$("input[name='optH']:radio").change(function() {
  if($(".option-all").hasClass("on") === false){
    $("input:radio[name='optH01']:input[value='"+$(this).val()+"']").prop('checked', true);
    $(".optHdata").val($(this).val());
    $("#optionTabH").addClass("on");
    overLay_Loding("");
  }
});

$("input[name='optH01']:radio").change(function() {
  if($(".option-all").hasClass("on") === true){
    $("input:radio[name='optH']:input[value='"+$(this).val()+"']").prop('checked', true);
    $(".optHdata").val($(this).val());
    $("#optionTabH").addClass("on");
    overLay_Loding("");
  }
});

function type_H_all(){
  $("input[name='optH']:radio").prop("checked", false);
  $("input[name='optH01']:radio").prop("checked", false);
  $("#optionTabH").removeClass("on");
  overLay_Loding("");
}


$("input[name='optI[]']:checkbox").change(function() {
  if($(".option-all").hasClass("on") === false){
    var optT = "";
    var i = 0;
    $("input[name='optI[]']:checked").each(function() {
      if (i == 0) {
        optT += $(this).val();
      } else {
        optT += "|" + $(this).val();
      }
      i++;
    });
    if($(this).is(":checked")){
      $("input:checkbox[name='optI01[]']:input[value='"+$(this).val()+"']").prop('checked', true);
    }else{
      $("input:checkbox[name='optI01[]']:input[value='"+$(this).val()+"']").prop('checked', false);
    }
    $(".optIdata").val(optT);
    if(!optT){
      $("#optionTabI").removeClass("on");
    }else{
      $("#optionTabI").addClass("on");
    }
    overLay_Loding("");
  }
});
$("input[name='optI01[]']:checkbox").change(function() {
  if($(".option-all").hasClass("on") === true){
    var optT = "";
    var i = 0;
    $("input[name='optI01[]']:checked").each(function() {
      if (i == 0) {
        optT += $(this).val();
      } else {
        optT += "|" + $(this).val();
      }
      i++;
    });
    if($(this).is(":checked")){
      $("input:checkbox[name='optI[]']:input[value='"+$(this).val()+"']").prop('checked', true);
    }else{
      $("input:checkbox[name='optI[]']:input[value='"+$(this).val()+"']").prop('checked', false);
    }
    $(".optIdata").val(optT);
    if(optT){
      $("#optionTabI").removeClass("on");
    }else{
      $("#optionTabI").addClass("on");
    }
    overLay_Loding("");
  }
});

function type_I_all() {
  $("input:checkbox[name='optI[]']").prop("checked", false);
  $("input:checkbox[name='optI01[]']").prop("checked", false);
  $(".optIdata").val("");
  $("#optionTabI").removeClass("on");
  overLay_Loding("");
}

$("#optionMreset").on("click",function(){
  $(".optAdata").val("0");
  var optA_instance = $("#optA").data("ionRangeSlider");
  optA_instance.update({
      from: 0,
      to: 4
  });
  var optA01_instance = $("#optA01").data("ionRangeSlider");
  optA01_instance.update({
      from: 0,
      to: 4
  });
  optA_instance.reset();
  optA01_instance.reset();
  $("#optionTabA").removeClass("on");

  $(".optBdata").val("0");
  var optB_instance = $("#optB").data("ionRangeSlider");
  optB_instance.update({
      from: 0,
      to: 4
  });
  var optB01_instance = $("#optB01").data("ionRangeSlider");
  optB01_instance.update({
      from: 0,
      to: 4
  });
  optB_instance.reset();
  optB01_instance.reset();
  $("#optionTabB").removeClass("on");

  $(".optCdata").val("0");
  var optC01_instance = $("#optC01").data("ionRangeSlider");
  optC01_instance.update({
      from: 0,
      to: 4
  });
  var optC001_instance = $("#optC001").data("ionRangeSlider");
  optC001_instance.update({
      from: 0,
      to: 4
  });
  optC01_instance.reset();
  optC001_instance.reset();

  $("input[name='optC']:radio").prop("checked", false);
  $("input[name='optC0011']:radio").prop("checked", false);
  $("#optionTabC").removeClass("on");

  $(".optDdata").val("0");
  var optD_instance = $("#optD").data("ionRangeSlider");
  optD_instance.update({
      from: 0,
      to: 4
  });
  var optD01_instance = $("#optD01").data("ionRangeSlider");
  optD01_instance.update({
      from: 0,
      to: 4
  });
  optD_instance.reset();
  optD01_instance.reset();
  $("#optionTabD").removeClass("on");

  $("input[name='optE']:radio").prop("checked", false);
  $("input[name='optE011']:radio").prop("checked", false);
  $("#optionTabE").removeClass("on");

  $("input[name='optF']:radio").prop("checked", false);
  $("input[name='optF011']:radio").prop("checked", false);
  $("#optionTabF").removeClass("on");

  $(".optGdata").val("0");
  var optG_instance = $("#optG").data("ionRangeSlider");
  optG_instance.update({
      from: 0,
      to: 4
  });
  var optG01_instance = $("#optG01").data("ionRangeSlider");
  optG01_instance.update({
      from: 0,
      to: 4
  });
  optG_instance.reset();
  optG01_instance.reset();
  $("#optionTabG").removeClass("on");

  $("input[name='optH']:radio").prop("checked", false);
  $("input[name='optH011']:radio").prop("checked", false);
  $("#optionTabH").removeClass("on");

  $("input:checkbox[name='optI[]']").prop("checked", false);
  $("input:checkbox[name='optI01[]']").prop("checked", false);
  $("#optionTabI").removeClass("on");
  overLay_Loding("");
});
//****  옵션 게이지 설정  *****/

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
$("#optA").ionRangeSlider(optionGauge1);
$("#optA01").ionRangeSlider(optionGauge1);
$("#optC01").ionRangeSlider(optionGauge1);
$("#optC001").ionRangeSlider(optionGauge1);

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
$("#optB").ionRangeSlider(optionGauge21);
$("#optB01").ionRangeSlider(optionGauge21);

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
$("#optD").ionRangeSlider(optionGauge41);
$("#optD01").ionRangeSlider(optionGauge41);

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
$("#optG").ionRangeSlider(optionGaugeCar);
$("#optG01").ionRangeSlider(optionGaugeCar);




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
    $("#optAdata").val("0");
    $("#optA").data("ionRangeSlider").reset();
  } else if (idx == 1) {
    $("#optAdata").val("0");
    $("#optB").data("ionRangeSlider").reset();
  } else if (idx == 2) {
    $("#optionTabC").removeClass("on");
    $("#optCdata").val("");
    $("input[name='optC']:radio").prop("checked", false);
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



//  행정기관 탭
$('.content-view .tab-menu li').on('click', function (e) {
  e.preventDefault();
  $(this).addClass('on').siblings().removeClass('on');
  var idx = $(this).index();
  $('.con-wrap .con').eq(idx).addClass('on').siblings().removeClass('on');
});


// 관심매물 설정
function productCart(type, key, idx, slotKey) {
  if (type == 'click') {
    //console.log("click start " + key);
    $.ajax({
      type: 'post',
      url: '/DAO/proCartClick',
      data: {
        key: key,
        idx: idx,
        slotKey: slotKey
      },
      dataType: "json",
      success: function(data) {
        var data = JSON.parse(data);
        //console.log("click data -" + data);
        if (data == "1") {
          $("#like_btn" + key).addClass("on");
          //$(".btn-heart").addClass("on");
          $("#detail_like").addClass("on");
        } else if (data == "0") {
          $("#like_btn" + key).removeClass("on");
          //$(".btn-heart").removeClass("on");
          $("#detail_like").removeClass("on");
        }
        return false;
      }
    });
  }
}

// 매물 문의

function bQnaSubmit(){
  if(!$("#bQnaName").val()){
    alert("문의자 이름을 입력해주세요!");
    $("#bQnaName").focus();
    return false;
  }else if(!$("#bQnaTel").val()){
    alert("문의자 연락처를 입력해주세요!");
    $("#bQnaTel").focus();
    return false;
  }else{
    var bQnaIdx = $("#bQnaIdx").val();
    var userIdx = $("#userIdx").val();
    var bQnaName = $("#bQnaName").val();
    var bQnaTel = $("#bQnaTel").val();
    $.ajax({
      type: 'post',
      url: '/DAO/bkQna',
      data: {
        bQnaIdx: bQnaIdx,
        userIdx: userIdx,
        bQnaName: bQnaName,
        bQnaTel: bQnaTel
      },
      success: function(data) {
        //console.log(data);
        if(data=='1'){
          alert("정상적으로 문의가 등록되었습니다.");
          $(".modal-inquiry").removeClass("on");
          return true;
        }else{
          return false;
        }
      }
    });
    return true;
  }
}

function autoHypenPhone(str) {
  str = str.replace(/[^0-9]/g, '');
  var tmp = '';
  if (str.length < 4) {
    return str;
  } else if (str.length < 7) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3);
    return tmp;
  } else if (str.length < 11) {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 3);
    tmp += '-';
    tmp += str.substr(6);
    return tmp;
  } else {
    tmp += str.substr(0, 3);
    tmp += '-';
    tmp += str.substr(3, 4);
    tmp += '-';
    tmp += str.substr(7);
    return tmp;
  }
  return str;
}
var cellPhone = document.getElementById('bQnaTel');
cellPhone.onkeyup = function(event) {
  event = event || window.event;
  if (this.value.length > 13) {
    var tel_txt = this.value.slice(0, -1);
    this.value = tel_txt;
  }
  var _val = this.value.trim();
  this.value = autoHypenPhone(_val);
}



function analysis_rest(){
  $(".btn-").removeClass("on");
  $(".step02").css("display","none");
 }
 
 function search_ajax(searchId) { //ajax로 검색 실행 시키는 함수
   var page_name = window.location.pathname;
   $('.search-form-wrap').addClass("active");
   var keyword = $("#"+searchId).val();
   var search = keyword;
   
   if (!search) {
    $(".searhResult").empty();
    var nodata = "<p id=\"kwd_list\">검색결과가 없습니다.</p>";
    $(".searhResult").append("<span class=\"m-c\"></span>");
    $(".searhResult").append(nodata);

    $(".result-box01").empty();
    $(".result-box01").append("<span class=\"m-c\"></span>");
    $(".result-box01").append(nodata);

    $(".result-box02").empty();
    $(".result-box02").append("<span class=\"m-c\"></span>");
    $(".result-box02").append(nodata);

    $(".result-box03").empty();
    $(".result-box03").append("<span class=\"m-c\"></span>");
    $(".result-box03").append(nodata);
   } else {
     //console.log(search);
     var p_type = $('input[name=search_type]:checked').val();
     $.ajax({
       type: 'post',
       url: '/VO/searchKeyword',
       data: {
         search: search,
         p_type: p_type,
         page_name: page_name
       },
       dataType: "json",
       success: function(data) {
         //var data = JSON.parse(data);
         //console.log(data);
         if (data.SCH_LIST.length > 0) {
           $(".searhResult").empty();
           $(".searhResult").append("<span class=\"m-c\"></span>");
           $(".searhResult").append(data.SCH_LIST);
           $(".result-box01").empty();
           $(".result-box01").append("<span class=\"m-c\"></span>");
           $(".result-box01").append(data.SCH_LIST);
           $(".result-box02").empty();
           $(".result-box02").append("<span class=\"m-c\"></span>");
           $(".result-box02").append(data.SCH_LIST_AREA);
           $(".result-box03").empty();
           $(".result-box03").append("<span class=\"m-c\"></span>");
           $(".result-box03").append(data.SCH_LIST_SWY);
           
           $("#SCH_IDX").val(data.SCH_KEY);
           $("#loc_lat").val(data.loc_lat);
           $("#loc_lon").val(data.loc_lon);
           $("#type").val(data.type);
           $("#p_type").val(data.p_type);
         } else {
           var nodata = "<p id=\"kwd_list\">검색결과가 없습니다.</p>";
           $(".searhResult").empty();
           $(".searhResult").append("<span class=\"m-c\"></span>");
           $(".searhResult").append(nodata);
           $(".result-box01").empty();
           $(".result-box01").append("<span class=\"m-c\"></span>");
           $(".result-box01").append(nodata);
           $(".result-box02").empty();
           $(".result-box02").append("<span class=\"m-c\"></span>");
           $(".result-box02").append(nodata);
           $(".result-box03").empty();
           $(".result-box03").append("<span class=\"m-c\"></span>");
           $(".result-box03").append(nodata);
         }
       }
     });
   }
   //$("#md_check").attr("type","submit");
 }
  // 매물 상세 활성화
 function ppt_view(PPT_IDX) {
   overLay_Loding("");
   $(".p_list").css("display", "none");
   $(".p_view").css("display", "");
   list_detail(PPT_IDX);
 }
 
  // 매물 상세 닫기
 function p_close() {
   overLay_Loding("");
   $(".p_list").css("display", "");
   $(".p_view").css("display", "none");
 }
 

 //모바일 검색
 function searchMtab(type) {
  $(".result-box").removeClass("on");
  if (type == 'A') {
    $(".result-box01").addClass("on");
  } else if (type == 'B') {
    $(".result-box02").addClass("on");
  } else if (type == 'C') {
    $(".result-box03").addClass("on");
  }
}

