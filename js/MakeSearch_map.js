
var prodView="off";
$(".interest").on("click",function (){
  if(!MET_IDX){
    $(this).removeClass("active");
    alert("로그인 후 서비스 가능합니다.");
    return false;
  }else{
    $(this).toggleClass('active');
    // $(this).toggleClass('on');
    $(this).find('.icon').toggleClass('on');
    $(this).find('.icon>img').toggleClass('on');
    $(this).find('.text').toggleClass('on');
    if(!$(".interest").hasClass("active")){
      prodView="off";
    }else{
      prodView="on";
    }
    overLay_Loding("");
  }
})
 // 위치설정 (위도)
if (cur_lat) {
  var lat = cur_lat;
} else if (!lat) {
  //var lat = 35.14611495830668;
  var lat = 37.51201725648802;
}
// 위치설정 (경도)
if (cur_lon) {
  var lon = cur_lon;
} else if (!lon) {
  //var lon = 126.92308867881711;
  var lon = 127.04872681739359;
}
var _cluster = {};
_cluster.overlay = [];

//오버레이 클리어
_cluster.overlay.clear = function() {
  if (_cluster.overlay.length > 0) {
    for (var index = 0; index < _cluster.overlay.length; index++) {
      _cluster.overlay[index].setMap(null);
    }
  }
};

//지도위 클리어
_cluster.clear = function() {
  if (_cluster.overlay)
    _cluster.overlay.clear();
}

var CustomOverlay = function(options) {
  if (options.type == 'dong') {
    var icon_type="";
    if(options.pt_type=='인테리어'){
      icon_type="interior";
    }else if(options.pt_type=='가구'){
      icon_type="sign";
    }else if(options.pt_type=='주방/설비'){
      icon_type="kitchen";
    }else if(options.pt_type=='간판'){
      icon_type="furniture";
    }else if(options.pt_type=='광고/인쇄'){
      icon_type="print";
    }else if(options.pt_type=='렌탈'){
      icon_type="rental";
    }else if(options.pt_type=='통신/보안'){
      icon_type="security";
    }else if(options.pt_type=='기타'){
      icon_type="etc";
    }
    
    this._element = $('<div class="company-location"><span class="icon '+icon_type+'"></span><span>'+options.pt_name+'</span></div>')
    
  } else if (options.type == 'gugun') {
    this._element = $('<div class=\"map-color area_name_g gugun\" id=\"tipD_' + options.pt_key +
      '\" onclick=\"zoomIn(' + options.pt_lat + ',' + options.pt_lon +
      ',\'gugun\');\" style=\'width:150px; height:50px; board:1px solid #111;\'><div class=\"saturation\"><span>' +
      options
      .pt_name +
      '</span><span class=\"num\">' + comma(options.pt_cnt) + '</span></div></div>')
  } else if (options.type == 'sido') {
    this._element = $('<div class=\"map-color area_name_s sido\" id=\"tipD_' + options.pt_key +
      '\" onclick=\"zoomIn(' + options.pt_lat + ',' + options.pt_lon +
      ',\'sido\');\" style=\'width:150px; height:50px; board:1px solid #111;\'><div class=\"saturation\"><span>' +
      options
      .pt_name +
      '</span><span class=\"num\">' + comma(options.pt_cnt) + '</span></div></div>')
  } else if (options.type == 'subway') {
    this._element = $(
      '<div class=\"map-color label_t\" ><div class=\"saturation\"><span class=\"icon\"></span><span >' + options
      .Sw_Name + '</span></div></div>')
  } else if (options.type == 'myPro') {
    this._element = $(
      '<div class="interest-location"><img src="/icon/maker01.png" alt="관심매물위치"></div>')
  }
  this.setPosition(options.position);
  this.setMap(options.map || null);
};

CustomOverlay.prototype = new naver.maps.OverlayView();
CustomOverlay.prototype.constructor = CustomOverlay;

CustomOverlay.prototype.setPosition = function(position) {
  this._position = position;
  this.draw();
};

CustomOverlay.prototype.getPosition = function() {
  return this._position;
};

CustomOverlay.prototype.onAdd = function() {
  var overlayLayer = this.getPanes().overlayLayer;
  this._element.appendTo(overlayLayer);
};

CustomOverlay.prototype.draw = function() {
  if (!this.getMap()) {
    return;
  }

  var projection = this.getProjection(),
    position = this.getPosition(),
    pixelPosition = projection.fromCoordToOffset(position);

  this._element.css('left', pixelPosition.x);
  this._element.css('top', pixelPosition.y);
};

CustomOverlay.prototype.onRemove = function() {
  this._element.remove();
  // 이벤트 핸들러를 설정했다면 정리합니다.
  this._element.off();
};

var position = new naver.maps.LatLng(lat, lon);
var filter = "win16|win32|win64|mac|macintel"; 
if ( navigator.platform ) { 
if ( filter.indexOf( navigator.platform.toLowerCase() ) < 0 ) { 
  var map = new naver.maps.Map("mapMake", {
    center: position,
    zoom: 16,
    mapTypeControl: false,
    zoomControl: false,
    minZoom: 8,
    maxZoom: 19
  });
}else{
  var map = new naver.maps.Map("mapMake", {
    center: position,
    zoom: 16,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: naver.maps.MapTypeControlStyle.BUTTON,
      position: naver.maps.Position.LEFT_BOTTOM
    },
    zoomControl: true,
    zoomControlOptions: {
      style: naver.maps.ZoomControlStyle.SMALL,
      position: naver.maps.Position.LEFT_BOTTOM
    },
    minZoom: 8,
    maxZoom: 19
  });
}
}


var positions = [];
var positionsT = [];

for (var j = 0; j < pt_key.length; ++j) {
  positions.push({
    lat: pt_lat[j],
    lon: pt_lon[j]
  });
}

for (var i = 0; i < Sw_Key.length; ++i) {
  positionsT.push({
    lat: Sw_Lat[i],
    lon: Sw_Lon[i]
  });
}
mapOverlay("dong", pt_name, pt_key, pt_type, pt_lat, pt_lon, pt_cnt, positions);

mapToverlay("subway", Sw_Name, Sw_Key, Sw_Addr, Sw_Lat, Sw_Lon, Sw_Tel, positionsT);

$(".list_sort").change(function() {
  overLay_Loding("");
});
$("#keyword_search").keyup(function() { 
  overLay_Loding("");
});

naver.maps.Event.addListener(map, 'dragend', function(e) {
  overLay_Loding("");
});
naver.maps.Event.addListener(map, 'zoom_changed', function(e) {
  if (map.zoom > 13) {
    cnt_view = "dong";
  } else if (map.zoom > 10) {
    cnt_view = "gugun";
  } else {
    cnt_view = "sido";
  }
  overLay_Loding("");
});


function overLay_Loding(key) {
  //console.log(prodView);
  var optA="";
  var optB="";
  var optC="";
  var optD="";
  var optE="";
  var optF="";
  var optG="";
  var optH="";
  if($(".option_selectA").hasClass("on") === true) {
    optA="인테리어";
  }
  if($(".option_selectB").hasClass("on") === true) {
    optB="가구";
  }
  if($(".option_selectC").hasClass("on") === true) {
    optC="주방/설비";
  }
  if($(".option_selectD").hasClass("on") === true) {
    optD="간판";
  }
  if($(".option_selectE").hasClass("on") === true) {
    optE="광고/인쇄";
  }
  if($(".option_selectF").hasClass("on") === true) {
    optF="통신/보안";
  }
  if($(".option_selectG").hasClass("on") === true) {
    optG="렌탈";
  }
  if($(".option_selectH").hasClass("on") === true) {
    optH="기타";
  }
  $("#map_loding").css("display","block");
  $("#list_loding").css("display","block");
  $("#list_loding1").css("display","block");
  _cluster.overlay.clear();
  var sort = $("input[name='sort']:checked").val();
  //console.log("map.zoom-"+map.zoom+"/ type-"+cnt_view+"/ sort-"+sort+"/ lat-"+map.getCenter()._lat+"/ lon-"+map.getCenter()._lng);
  //console.log(prodView);
  if(prodView=='on'){
    var Mykey = MET_IDX;
  }else{
    var Mykey = "";
  }
  var keyword=$("#keyword_search").val();
  
  $.ajax({
    type: 'post',
    url: '/VO/MkmoveList',
    data: {
      level: map.zoom,
      type: cnt_view,
      sort:sort,
      keyword:keyword,
      optA:optA,
      optB:optB,
      optC:optC,
      optD:optD,
      optE:optE,
      optF:optF,
      optG:optG,
      optH:optH,
      Mykey:Mykey,
      lat: map.getCenter()._lat,
      lon: map.getCenter()._lng,
      dataType: "json"
    },
    success: function(data, status, xhr) {
      var data = JSON.parse(data);
      console.log(data[8]);
      var positionsMy=[];
      for (var i = 0; i < data[2].length; ++i) {
        positionsMy.push({
          lat: data[2][i],
          lon: data[3][i]
        });
      }
      for (var k = 0; k < positionsMy.length; ++k) {
        overlayMy = new CustomOverlay({
          map: map,
          type: "myPro",
          position: new naver.maps.LatLng(positionsMy[k].lat, positionsMy[k].lon)
        });
        _cluster.overlay.push(overlayMy);
      }
      //console.log(positionsMy);
      $("#company-list").empty();
      $("#company-list").html(data[0].PTT_LIST);
      var positions = [];
      var positionsT = [];
      
      
      
      for (var j = 0; j < data[0].Pt_KEY.length; ++j) {
        positions.push({
          lat: data[0].Pt_LAT[j],
          lon: data[0].Pt_LON[j]
        });
      }
      for (var l = 0; l < positions.length; ++l) {
        overlay = new CustomOverlay({
          map: map,
          type: cnt_view,
          pt_name: data[0].Pt_NAME[l],
          pt_key: data[0].Pt_KEY[l],
          pt_type: data[0].Pt_TYPE[l],
          pt_lat: data[0].Pt_LAT[l],
          pt_lon: data[0].Pt_LON[l],
          pt_cnt: data[0].Pt_CNT[l],
          position: new naver.maps.LatLng(positions[l].lat, positions[l].lon)
        });
        _cluster.overlay.push(overlay);
      }

      for (var i = 0; i < data[1].length; ++i) {
        positionsT.push({
          lat: data[1][i].DHT_LAT,
          lon: data[1][i].DHT_LON
        });
      }
      for (var k = 0; k < positionsT.length; ++k) {
        overlayT = new CustomOverlay({
          map: map,
          type: "subway",
          Sw_Name: data[1][k].DHT_NAME,
          Sw_Key: data[1][k].DHT_IDX,
          Sw_Addr: data[1][k].DHT_ADDR,
          Sw_Lat: data[1][k].DHT_LAT,
          Sw_Lon: data[1][k].DHT_LON,
          Sw_Tel: data[1][k].DHT_TEL,
          position: new naver.maps.LatLng(positionsT[k].lat, positionsT[k].lon)
        });
        _cluster.overlay.push(overlayT);
      }

      $("#typeA_cnt").text(data[4]);
      $("#typeB_cnt").text(data[5]);
      $("#typeC_cnt").text(data[6]);
      $("#typeD_cnt").text(data[7]);
      $("#typeE_cnt").text(data[8]);
      $("#typeF_cnt").text(data[9]);
      $("#typeG_cnt").text(data[10]);
      $("#typeH_cnt").text(data[11]);

      $(".PTT_CNT").text(data[0].PTT_CNT);
      setTimeout(function (){
        $("#map_loding").css("display","none");
        $("#list_loding").css("display","none");
        $("#list_loding1").css("display","none");
      },300);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
    },
    beforeSend: function() {
    },
    complete: function() {
    } 
  });
}
function list_detail(PTT_IDX) {
  $("#list_loding1").css("display","block");
  $("#inquiry").attr("data",PTT_IDX);
  $.ajax({
    type: 'post',
    url: '/VO/makeDetail',
    data: {
      PTT_IDX: PTT_IDX,
      dataType: "json"
    },
    success: function(data, status, xhr) {
      var data = JSON.parse(data);
      console.log(data);
      $("#kakao_feed").attr("data1",data[0][0].PTT_IDX);
      $("#kakao_feed").attr("data2",data[0][0].PTT_LAT);
      $("#kakao_feed").attr("data3",data[0][0].PTT_LON);
      $("#kakao_feed").attr("data4",data[0][0].PTT_IMG_SAVE);
      $("#kakao_feed").attr("data5",data[0].PTT_NAME);
      $("#naver_feed").attr("href","javascript:naver_share('"+data[0][0].PTT_IDX+"','"+data[0][0].PTT_LAT+"','"+data[0][0].PTT_LON+"','"+data[0].PTT_NAME+"');");
      $("#copy_link").attr("href","javascript:clipBoard('"+data[0][0].PTT_IDX+"','"+data[0][0].PTT_LAT+"','"+data[0][0].PTT_LON+"');");
      if(MET_IDX){
        $("#detail_like").attr("onclick","partnerCart('click','"+data[0][0].PTT_IDX+"','"+MET_IDX+"')")
        if(data[2]){
          $("#detail_like").addClass("on");
        }else{
          $("#detail_like").removeClass("on");
        }
      }
      
      var caseList="";
      $("#detail_title1").text(data[0].PTT_NAME);
      $("#PTN_IMG").attr("src","/uploads/"+data[0][0].PTT_IMG_SAVE);
      $("#PTN_CEO").text(data[0].PTT_CEO);
      $("#PTN_CAREER").text(data[0][0].PTT_CAREER);
      $("#PTN_TYPE").text(data[0][0].PTT_TYPE);
      $("#inquiry").attr("data1",data[0][0].PTT_TYPE);
      $("#PTN_AREA").text(data[0][0].PTT_AREA);
      $("#PNT_CONTENT").html(data[0][0].PTT_TEXT);
      $("#constr_img").empty("");
      if(data[1].length > 0){
        for (var i = 0; i < data[1].length; i++) {
          caseList +="<li>";
          caseList +="<a href=\"javascript:void(0);\" class=\"btn-photoView\">";
          caseList +="<div class=\"img-wrap\">";
          caseList +="<img src=\"/uploads/"+data[1][i].CST_IMG_SAVE+"\" alt=\"인테리어시공사진\">";
          caseList +="</div>";
          caseList +="</a>";
          caseList +="</li>";
        }
        $("#constr_img").html(caseList);
        $('.btn-photoView').on('click', function () {
          $('.photo-view').show();
        });
        var modalImg = "";
        for (var i = 0; i < data[1].length; i++) {
          modalImg+="<div class=\"swiper-slide\">";
          modalImg+="<div class=\"img-wrap\"><img src=\"/uploads/"+data[1][i].CST_IMG_SAVE+"\" alt=\"인테리어사진\"></div>";
          modalImg+="</div>";
        }
        $("#photo_view1").html(modalImg);
        $("#photo_view2").html(modalImg);
      }
      setTimeout(function (){
        $("#list_loding1").css("display","none");
      },300);
      new Swiper('.imgDetail-slider-top');
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
    },
    beforeSend: function() {
      /*$('#map_loding').css('display','');
      $('#list_loding').css('display','');*/
    },
    complete: function() {
      /*$('#map_loding').css('display','none');
      $('#list_loding').css('display','none');*/
    } //,timeout:100000
  });
}

// 콤마넣기
function comma(str) {
  str = String(str);
  return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

//콤마풀기
function uncomma(str) {
  str = String(str);
  return str.replace(/[^\d]+/g, '');
}


// 시/도 & 구/군 오버레이 클릭시 확대
function zoomIn(data_lat, data_lon, type) {
  var centerMv = new naver.maps.LatLng(data_lat, data_lon);
  map.setCenter(centerMv);
  if (type == 'gugun') {
    map.setZoom(15, true);
  } else if (type == 'sido') {
    map.setZoom(13, true);
  }
}


function mapToverlay(type, name, key, addr, lat, lon, tel, positions) {
  var overlayT = "";
  for (var k = 0; k < positions.length; ++k) {
    overlayT = new CustomOverlay({
      map: map,
      type: type,
      Sw_Name: name[k],
      Sw_Key: key[k],
      Sw_Addr: addr[k],
      Sw_Lat: lat[k],
      Sw_Lon: lon[k],
      Sw_Tel: tel[k],
      position: new naver.maps.LatLng(positions[k].lat, positions[k].lon)
    });
    _cluster.overlay.push(overlayT);
  }
}

function mapOverlay(type, name, key, cate, lat, lon, cnt, positions) {
  var overlay = "";
  for (var l = 0; l < positions.length; ++l) {
    overlay = new CustomOverlay({
      map: map,
      type: type,
      pt_name: name[l],
      pt_key: key[l],
      pt_type: cate[l],
      pt_lat: lat[l],
      pt_lon: lon[l],
      pt_cnt: cnt[l],
      position: new naver.maps.LatLng(positions[l].lat, positions[l].lon)
    });
    _cluster.overlay.push(overlay);
  }
}
$(".search_map").on('change keyup paste', function() {
  var search_timer = "";
  var searchId = $(this).attr("id");
  clearTimeout(search_timer); //타이머예약 취소하기
  search_timer = setTimeout(search_ajax(searchId), 300); //검색창 입력 후 0.3초 후 검색 실행*/
});
$(document).on("click", "body", function(e) {
  if ($(".search-form-wrap").hasClass("active")) {
    if (e.target.id != 'search_map') {
      $(".search-form-wrap").removeClass("active");
    }

  }
});

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
    $.ajax({
      type: 'post',
      url: '/VO/searchKeyword',
      data: {
        search: search,
        p_type: "",
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

function partnerCart(type,key,idx){
  if (type == 'click') {
    console.log("click start");
    $.ajax({
      type: 'post',
      url: '/DAO/ptnCartClick',
      data: {
        key: key,
        idx: idx
      },
      dataType: "json",
      success: function(data) {
        console.log("click data -" + data);
        if (data == "true") {
          $(".btn-heart").addClass("on");
        } else if (data == "false") {
          $(".btn-heart").removeClass("on");
        }
      }
    });
  } else if (type == 'ck') {
    $.ajax({
      type: 'post',
      url: '/VO/ptnCartCk',
      data: {
        key: key,
        idx: idx
      },
      dataType: "json",
      success: function(data) {
        if (data == true) {
          $(".btn-heart").addClass("on");
        }
      }
    });
  }
}
