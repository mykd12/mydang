// 짓다 옵션선택

function option_select(type) {
  if ($(".option_select" + type).hasClass("on") === true) {

    $(".option_select" + type).removeClass("on");
    overLay_Loding("");
  } else {

    $(".option_select" + type).addClass("on");
    overLay_Loding("");
  }
}


// 업체 선택 보기
if (PTT_IDX) {
  list_detail(PTT_IDX);
  //$("#company-view").addClass("active");
  $("#company-view").css("display", "block");
}



// 업체리스트 사진 슬라이더
function photoSlide() {
  var photoSlider = new Swiper('.photo-slider', {
    slidesPerView: '2.5', // 동시에 보여줄
    spaceBetween: 15,
    speed: 1000,
    observer: true,
    observeParents: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
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
      mobileWebUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
        '&cur_lat=' + $("#kakao_feed").attr("data2") +
        '&cur_lon=' + $("#kakao_feed").attr("data3"),
      webUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
        '&cur_lat=' + $(
          "#kakao_feed").attr("data2") + '&cur_lon=' +
        $("#kakao_feed").attr("data3")
    }
  },
  buttons: [{
    title: '웹으로 보기',
    link: {
      mobileWebUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
        '&cur_lat=' + $("#kakao_feed").attr("data2") +
        '&cur_lon=' + $("#kakao_feed").attr("data3"),
      webUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
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
        mobileWebUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") +
          '&cur_lon=' + $("#kakao_feed").attr("data3"),
        webUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") + '&cur_lon=' +
          $("#kakao_feed").attr("data3")
      }
    },
    buttons: [{
      title: '웹으로 보기',
      link: {
        mobileWebUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr(
            "data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") +
          '&cur_lon=' + $("#kakao_feed").attr("data3"),
        webUrl: 'https://mydang.kr/main/makeSearch?PTT_IDX=' + $("#kakao_feed").attr("data1") +
          '&cur_lat=' + $("#kakao_feed").attr("data2") +
          '&cur_lon=' + $("#kakao_feed").attr("data3")
      }
    }]
  });
});


function naver_share(PTT_IDX, PTT_LAT, PTT_LON, PTT_NAME) {
  var url = encodeURI(encodeURIComponent('https://mydang.kr/main/makeSearch?PTT_IDX=' + PTT_IDX +
    '&cur_lat=' +
    PTT_LAT + '&cur_lon=' + PTT_LON));
  var shareURL = "http://blog.naver.com/LinkShare.nhn?url=" + url + "&title=" + PTT_NAME;
  window.open(shareURL, "네이버공유", "_blank ")
}

function clipBoard(PTT_IDX, PTT_LAT, PTT_LON) {
  $("#cp_clipBoard").val('https://mydang.kr/main/makeSearch?PTT_IDX=' + PTT_IDX + '&cur_lat=' + PTT_LAT +
    '&cur_lon=' + PTT_LON);
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

// 업체 견적담기

$(document).on('click', '.btn-quoteContact', function(e) {
  if (MET_IDX) {
    $(".con-box").addClass("dot-pulse");
    e.stopPropagation();
    e.preventDefault();
    $(this).toggleClass('on');
    $(this).find('span').toggleClass('on');
    var ptt_idx = $(this).attr("data1");
    var met_idx = $(this).attr("data2");

    $.ajax({
      type: 'post',
      url: '/DAO/makeCartClick',
      data: {
        PTT_IDX: ptt_idx,
        MET_IDX: met_idx
      },
      dataType: "json",
      success: function(data) {
        //console.log(data);
        
        $("#makeCnt").text(data[1]);
        $(".counsTypeA").text(data[2]);
        $(".counsTypeB").text(data[3]);
        $(".counsTypeC").text(data[4]);
        $(".counsTypeD").text(data[5]);
        $(".counsTypeE").text(data[6]);
        $(".counsTypeF").text(data[7]);
        $(".counsTypeG").text(data[8]);
        $(".counsTypeH").text(data[9]);
        $("#ptnList").empty();
        //console.log(data[0].length);
        var html="";
       for(var i=0; i<data[0].length; i++){
         //console.log(i);
         //console.log(data[0][i]);
            html += "<input type=\"hidden\" id=\"CTT_IDX\" name=\"CTT_IDX[]\" value=\""+data[0][i].CTT_IDX+"\">";
            html += "<div class=\"inquiry-company\" id=\"counsList"+data[0][i].CTT_IDX+"\">";
            html += "<div class=\"col-1\">";
            html += "<div class=\"chk-box\">";
            html += "<input type=\"checkbox\" id=\"PTT_IDX"+data[10][0][i]+"\" name=\"PTT_IDX[]\" value=\""+data[10][0][i]+"\">";
            html += "<label for=\"PTT_IDX"+data[10][0][i]+"\">"+data[10][2][i]+"</label>";
            html += "</div>";
            html += "<p class=\"add\">"+data[10][1][i]+"</p>";
            html += "<div class=\"chk-list-wrap\">";
            html += "<div class=\"chk-box\">";
            html += "<input type=\"checkbox\" id=\"bi-check"+data[10][0][i]+"\" name=\"PTT_TYPE[]\" value=\""+data[10][4][i]+"\" readonly=\"\" checked=\"\" onclick=\"return false;\">";
            html += "<label for=\"bi-check"+data[10][0][i]+"\">"+data[10][4][i]+"</label>";
            html += "</div>";
            html += "</div>";
            html += "</div>";
            html += "<a href=\"\" class=\"company-move\"><div class=\"img-wrap\"><img src=\"/uploads/"+data[10][3][i]+"\" alt=\"업체사진\"></div></a>";
            html += "<a href=\"javascript:counsDel('"+data[0][i].CTT_IDX+"','"+data[10][4][i]+"');\" onclick=\"return confirm('삭제하시겠습니까?');\" class=\"btn-delete\"><i class=\"xi-close-thin\"></i><span class=\"blind\">견적에서 삭제</span></a>";
            html += "</div>";
       }
        $("#ptnList").append(html);
        // var html="";
        //     html += "<input type=\"hidden\" id=\"CTT_IDX\" name=\"CTT_IDX[]\" value=\""+data[0].CTT_IDX+"\">";
        //     html += "<div class=\"inquiry-company\" id=\"counsList"+data[0].CTT_IDX+"\">";
        //     html += "<div class=\"col-1\">";
        //     html += "<input type=\"checkbox\" id=\"PTT_IDX"+data[9].PTT_IDX+"\" name=\"PTT_IDX[]\" value=\""+data[9].PTT_IDX+"\">";
        //     html += "<label for=\"PTT_IDX"+data[9].PTT_IDX+"\">돼지가방</label>";
        $(".con-box").removeClass("dot-pulse");
      }
    });

  } else {
    alert("로그인 후 서비스 이용가능합니다.");
    return false;
  }

});

// 옵션 메뉴 슬라이드
$(function() {
  //Enable swiping...
  $(".bar-wrap").swipe({
    //Generic swipe handler for all directions
    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
      if (direction == 'down') {
        $('.bottomList-slider').removeClass('on')
        $('.Mbtn-wrap').removeClass('on');
      } else if (direction == 'up') {
        $('.bottomList-slider').addClass('on')
        $('.Mbtn-wrap').addClass('on');
      }
    },
    //Default is 75px, set to 0 for demo so any distance triggers swipe
    threshold: 0
  });
});


// 리스트 슬라이더 이벤트
$('.Mbtn-wrap').on('click', function() {
  $(this).toggleClass('on')
  $('.bottomList-slider').toggleClass('on')
});

$('.makeSearch.search .btn-slider').on('click', function() {
  $(this).toggleClass('on')
  $('.makeSearch.search .right-slider').toggleClass('on')
  // $('.loding ').toggleClass('on')
});

$('.makeSearch.search .select').on('click', function(e) {
  e.stopPropagation();
  $(this).toggleClass('on');
  $(this).siblings('.depth02').toggleClass('active');
});

$('.btn-search').on('click', function() {
  $('body').addClass('fixed');
  $('.moblie-search').toggleClass('on');
});

$('.btn-close').on('click', function() {
  $('body').removeClass('fixed');
  $('.moblie-search').removeClass('on');
});

$(".tab-add li").on("click", function() {
  $(this).addClass('on').siblings().removeClass('on');;
});


 //모바일 검색 탭
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

$("#inquiry").on("click",function (){
  var key = $(this).attr("data");
  var type = $(this).attr("data1");
  $("#pKey").val(key);
  $("#optType").val(type);
});