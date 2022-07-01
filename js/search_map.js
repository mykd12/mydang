$("#storeA").on("change", function() {
  if ($(this).val()) {
    $("#storeB").attr("disabled", false);
    $('#storeB').children('option').remove();
    var option = "";
    if ($(this).val() == 'Q') {
      option += "<option value=\"\">중분류 선택</option>";
      option += "<option value=\"21\" data=\"한식\">한식</option>";
      option += "<option value=\"22\" data=\"중식\">중식</option>";
      option += "<option value=\"23\" data=\"아시안 / 양식\">아시안 / 양식</option>";
      option += "<option value=\"24\" data=\"분식\">분식</option>";
      option += "<option value=\"25\" data=\"패스트푸드\">패스트푸드</option>";
      option += "<option value=\"26\" data=\"치킨\">치킨</option>";
      option += "<option value=\"27\" data=\"카페 / 디저트\">카페 / 디저트</option>";
      option += "<option value=\"28\" data=\"일식 / 수산물\">일식 / 수산물</option>";
      option += "<option value=\"29\" data=\"주점\">주점</option>";
      option += "<option value=\"30\" data=\"배달\">배달</option>";
    } else if ($(this).val() == 'F') {
      option += "<option value=\"\">중분류 선택</option>";
      option += "<option value=\"31\" data=\"이/미용/세탁\">이/미용/세탁</option>";
      option += "<option value=\"32\" data=\"스포츠\">스포츠</option>";
      option += "<option value=\"33\" data=\"pc방 / 노래방\">pc방 / 노래방</option>";
    } else if ($(this).val() == 'D') {
      option += "<option value=\"\">중분류 선택</option>";
      option += "<option value=\"41\" data=\"마트/편의점\">마트/편의점</option>";
      //option += "<option value=\"42\">사무/문구</option>";
      option += "<option value=\"42\" data=\"핸드폰\">핸드폰</option>";
      option += "<option value=\"43\" data=\"화장품\">화장품</option>";
      option += "<option value=\"44\" data=\"애견/애완/동물\">애견/애완/동물</option>";
    } else if ($(this).val() == "0") {
      $('#storeB').children('option').remove();
      $("#storeB").attr("disabled", true);
    }
    $("#storeB").append(option);
  }
});
$("#storeB").on("change", function() {
  var avg = $(this).val();
  overLay_Loding("", "", avg);
  var filter = "win16|win32|win64|mac|macintel"; 
  if ( navigator.platform ) { 
    if ( filter.indexOf( navigator.platform.toLowerCase() ) < 0 ) { 
      if(avg){
        $('.select-box01').removeClass('on');
        $(".select-box01").removeClass("aos-item");
        $(".select-box01").removeClass("aos-init");
        $(".select-box01").removeClass("aos-animate");
        $(".bottomList-slider").removeClass("off");
        $('.m-bg').removeClass('on');
        $("#analysTbD").css("display","");
        var data = $("#storeB option:selected").attr("data");
        $("#analysTbD").empty();
        $("#analysTbD").append("<a href=\"javascript:void(0)\"><span>"+data+"</span><i class=\"xi-close-min\"></i></a>");
      }
    }
  }

});

function store_reset() {
  $("#storeA option:eq(0)").prop("selected", true);
  $('#storeB').children('option').remove();
  $("#storeB").attr("disabled", true);
  $("#analysTbA").addClass("on");
  $("#analysTbB").removeClass("on");
  $("#analysTbC").removeClass("on");
  $("#analysTbD").css("display","none");
  overLay_Loding("", "", "");
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

$(".btn-analysis").on("click",function (){
$(".select-box01").removeClass("on");
$(".btn-stores01").removeClass("on");

  if(!s_key){
    alert("행정동을 검색 후 서비스 가능합니다.");
    $("#search_map").focus();
    return false;
  }else{
    $(this).toggleClass('on');
    $(".select-box02").toggleClass('on');
    if(s_key=='924' || s_key=='368'){
      $(".step01").css("display","");
      if($("#tp_analysis1").hasClass("on") === true || $("#tp_analysis2").hasClass("on") === true || $("#tp_analysis3").hasClass("on") === true) {
        $(".step02").css("display","");
      }else{
        $(".step02").css("display","none");
      }
      $(".ready").css("display","none");
    }else{
      $(".step01").css("display","none");
      $(".step02").css("display","none");
      $(".ready").css("display","block");
    }
  }
});

 // 위치설정 (위도)
if (cur_lat) {
  var lat = cur_lat;
} else if (!lat) {
  //var lat = 35.14611495830668;
  var lat = 37.51544536618997;
}
// 위치설정 (경도)
if (cur_lon) {
  var lon = cur_lon;
} else if (!lon) {
  //var lon = 126.92308867881711;
  var lon = 127.03687481260046;
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
var maskAdd=0;
$("#analysTbA").on("click",function (){
  $(this).addClass("on");
  $("#analysTbB").removeClass("on");
  $("#analysTbC").removeClass("on");
  overLay_Loding("", "", "");
})
$("#analysTbB").on("click",function (){
  $(this).addClass("on");
  $("#analysTbA").removeClass("on");
  $("#analysTbC").removeClass("on");
  overLay_Loding("", "", "");
})
$("#analysTbC").on("click",function (){
  $(this).addClass("on");
  $("#analysTbA").removeClass("on");
  $("#analysTbB").removeClass("on");
  overLay_Loding("", "", "");
})

$("#analysTbD").on("click",function (){
  $(".m-bg").addClass("on");
  $(".select-box01").addClass("aos-item");
  $(".select-box01").addClass("aos-init");
  $(".select-box01").addClass("aos-animate");
})


var CustomOverlay = function(options) {
  if (options.type == 'dong') {
    //console.log(options.type);
    //console.log(options.ds_name+"/"+options.ds_lat+"/"+options.ds_lon+"/"+options.position);
    var filter = "win16|win32|win64|mac|macintel"; 
    if ( navigator.platform ) { 
      if ( filter.indexOf( navigator.platform.toLowerCase() ) < 0 ) { 
        if($(".btn-stores01").hasClass("on") === true && $("#storeB").val()){
          var randomCnt=0;
          
          if($("#analysTbA").hasClass("on") === true){
            var money = 1555 * 1.5;
            randomCnt = comma(uncomma(rand(624, Number(money))));
          }else if($("#analysTbB").hasClass("on") === true){
            randomCnt = comma(uncomma(rand(62, 600)));
          }else if($("#analysTbC").hasClass("on") === true){
            randomCnt = comma(uncomma(rand(2400, 8400)));
          }

        this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
        '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
        '\', \'' + options.ds_lon +
        '\', \'' + options.ds_addr +
        '\');\" ><div class=\"saturation\"><span>' + options
        .ds_name +
        '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span>'
        // 모바일 상권분석 현황추가 2022.05.30_HS
        + ' <p class=\"mAlyNum"\>'+randomCnt+'<span class=\"text"\>개</span></p></div></div>')
        }else{
          
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
        '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
        '\', \'' + options.ds_lon +
        '\', \'' + options.ds_addr +
        '\');\" ><div class=\"saturation\"><span>' + options
        .ds_name +
        '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span>')
        }
      }else{
        
        if(options.ds_avg=='E'){
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
          '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
          '\', \'' + options.ds_lon +
          '\', \'' + options.ds_addr +
          '\');\" ><div class=\"blue-saturation saturation\"><span>' + options
          .ds_name +
          '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
        }else if(options.ds_avg=='D'){
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
          '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
          '\', \'' + options.ds_lon +
          '\', \'' + options.ds_addr +
          '\');\" ><div class=\"green-saturation saturation\"><span>' + options
          .ds_name +
          '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
        }else if(options.ds_avg=='C'){
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
          '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
          '\', \'' + options.ds_lon +
          '\', \'' + options.ds_addr +
          '\');\" ><div class=\"yellow-saturation saturation\"><span>' + options
          .ds_name +
          '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
        }else if(options.ds_avg=='B'){
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
          '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
          '\', \'' + options.ds_lon +
          '\', \'' + options.ds_addr +
          '\');\" ><div class=\"orange-saturation saturation\"><span>' + options
          .ds_name +
          '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
        }else if(options.ds_avg=='A'){
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
          '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
          '\', \'' + options.ds_lon +
          '\', \'' + options.ds_addr +
          '\');\" ><div class=\"red-saturation saturation\"><span>' + options
          .ds_name +
          '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
        }else{
          this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_' + options.ds_key +
          '\" onclick=\"area_b_select(\'' + options.ds_key + '\',\'' + options.ds_name + '\',\'' + options.ds_lat +
          '\', \'' + options.ds_lon +
          '\', \'' + options.ds_addr +
          '\');\" ><div class=\"saturation\"><span>' + options
          .ds_name +
          '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
        }
      }
    }
    
  } else if (options.type == 'gugun') {
    this._element = $('<div class=\"map-color area_name_g gugun\" id=\"tipD_' + options.ds_key +
      '\" onclick=\"zoomIn(' + options.ds_lat + ',' + options.ds_lon +
      ',\'gugun\');\" ><div class=\"saturation\"><span>' +
      options
      .ds_name +
      '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
  } else if (options.type == 'sido') {
    this._element = $('<div class=\"map-color area_name_s sido\" id=\"tipD_' + options.ds_key +
      '\" onclick=\"zoomIn(' + options.ds_lat + ',' + options.ds_lon +
      ',\'sido\');\"><div class=\"saturation\"><span>' +
      options
      .ds_name +
      '</span><span class=\"num\">' + comma(options.ds_cnt) + '</span></div></div>')
  } else if (options.type == 'subway') {
    this._element = $(
      '<div class=\"map-color label_t\" ><div class=\"saturation\"><span class=\"icon\"></span><span >' + options
      .Sw_Name + '</span></div></div>')
  }else if (options.type == 'view') {
    if(options.ds_expo=='y'){
      if(options.ds_type=='상가' || options.ds_type=='상가|사무실'){
        this._element = $('<div class="actual-location"><div class="icon-wrap"></div><div class="text-wrap"><p class="sector">' + options.ds_name + '</p><p><span class="price01">'+comma(uncomma(options.ds_priceA))+'</span>/<span class="price02">월'+comma(uncomma(options.ds_priceB))+'</span></p></div></div>')
      }else if(options.ds_type=='사무실'){
        this._element = $('<div class="actual-location office"><div class="icon-wrap"></div><div class="text-wrap"><p class="sector">' + options.ds_name + '</p><p><span class="price01">'+comma(uncomma(options.ds_priceA))+'</span>/<span class="price02">월'+comma(uncomma(options.ds_priceB))+'</span></p></div></div>')
      }
    }else{
      this._element = $('<div class="location"></div>')
    }
  }else if (options.type == 'list') {
    this._element = $('<div class="location"></div>')
  }else if(options.type == 'mask'){
    this._element = $('<div class="bg-blocker" id="bg-blocker" style="display:none;"></div>');
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

    var map = new naver.maps.Map("kakao_map", {
      center: position,
      zoom: 16,
      mapTypeControl: false,
      zoomControl: false,
      minZoom: 8,
      maxZoom: 19
    });
  } else { 

    var map = new naver.maps.Map("kakao_map", {
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

var overlay = "";
    overlay = new CustomOverlay({
      map: map,
      type: "mask",
      position: new naver.maps.LatLng(lat, lon)
    });
    _cluster.overlay.push(overlay);


var positions = [];
var positionsT = [];

for (var i = 0; i < Sw_Key.length; ++i) {
  positionsT.push({
    lat: Sw_Lat[i],
    lon: Sw_Lon[i]
  });
}

for (var j = 0; j < ds_key.length; ++j) {
  positions.push({
    lat: ds_lat[j],
    lon: ds_lon[j]
  });
}
mapToverlay("subway", Sw_Name, Sw_Key, Sw_Addr, Sw_Lat, Sw_Lon, Sw_Tel, positionsT,"");
mapOverlay("dong", ds_name, ds_key, ds_lat, ds_lon, ds_cnt, positions,ds_addr);
$("input[name=sort]").change(function() {
  var sort = $(this).val();
  if($(".btn-stores01").hasClass("on") === true && $("#storeB").val())
  {
    overLay_Loding(sort,"",$("#storeB").val());
  }else{
    overLay_Loding(sort,"","");
  }
});

naver.maps.Event.addListener(map, 'dragend', function(e) {
  maskAdd=0;
  if($(".btn-stores01").hasClass("on") === true && $("#storeB").val())
  {
    overLay_Loding("","",$("#storeB").val());
  }else{
    overLay_Loding("","","");
  }
});
naver.maps.Event.addListener(map, 'zoom_changed', function(e) {
  if (map.zoom > 16) {
    cnt_view = "view";
  } else if (map.zoom > 13) {
    cnt_view = "dong";
  } else if (map.zoom > 11) {
    cnt_view = "gugun";
    $(".colum_chart_compare").removeClass("active");
    $(".btn-stores01").removeClass("on");
    $(".select-box01").removeClass("on");
    $("#storeA option:eq(0)").prop("selected", true);
    $('#storeB').children('option').remove();
    $("#storeB").attr("disabled", true);
    $(".btnAly-wrap").removeClass("on");
    $("#analysTbA").addClass("on");
    $("#analysTbB").removeClass("on");
    $("#analysTbC").removeClass("on");
    $("#analysTbD").css("display","none");
  } else {
    cnt_view = "sido";
    $(".colum_chart_compare").removeClass("active");
    $(".btn-stores01").removeClass("on");
    $(".select-box01").removeClass("on");
    $("#storeA option:eq(0)").prop("selected", true);
    $('#storeB').children('option').remove();
    $("#storeB").attr("disabled", true);
    
  }
  maskAdd=0;
  if($(".btn-stores01").hasClass("on") === true && $("#storeB").val() && cnt_view=='dong')
  {
    overLay_Loding("","",$("#storeB").val());
  }else{
    overLay_Loding("","","");
  }
});
// $(".btn-stores01").on("click",function (){
//   $(".btn-analysis").removeClass("on");
//   $(".select-box02").removeClass("on");
//   if(cnt_view !='dong'){
//     alert("지도영역을 행정동이 나오도록 조절해주세요!");
//     return false;
//   }else{
//     $('.select-box01').toggleClass('on');
//     $('.colum_chart_compare').toggleClass('active');
//     $(this).toggleClass('on');
//   }
// });


function overLay_Loding(sort,key,avg) {
  $("#map_loding").css("display","block");
  $("#list_loding").css("display","block");
  $("#list_loding1").css("display","block");
  _cluster.overlay.clear();
  var optA = $("#optAdata").val();
  var optB = $("#optBdata").val();
  var optC = $('#optCdata').val();
  var optD = $("#optDdata").val();
  var optE = $('#optEdata').val();
  var optF = $('#optFdata').val();
  var optG = $("#optGdata").val();
  var optH = $('#optHdata').val();
  var optI = "";
  var i = 0;
  $('input[name="optI[]"]:checked').each(function() {
    if (i == 0) {
      optI += $(this).val();
    } else {
      optI += "," + $(this).val();
    }
    i++;
  });
  var p_type = $('input[name=search_type]:checked').val();
  $.ajax({
    type: 'post',
    url: '/VO/moveList',
    data: {
      level: map.zoom,
      type: cnt_view,
      p_type: p_type,
      lat: map.getCenter()._lat,
      lon: map.getCenter()._lng,
      optA: optA,
      optB: optB,
      optC: optC,
      optD: optD,
      optE: optE,
      optF: optF,
      optG: optG,
      optH: optH,
      optI: optI,
      sort: sort,
      key: key,
      avg: avg,
      dataType: "json"
    },
    success: function(data, status, xhr) {
      var data = JSON.parse(data);
      
      $(".PPT_CNT").html(data[0].PPT_CNT);
      $(".product-list").html(data[0].PPT_LIST);
      var positions = [];
      var positionsT = [];
      var overlay = "";
    overlay = new CustomOverlay({
      map: map,
      type: "mask",
      position: new naver.maps.LatLng(lat, lon)
    });
    _cluster.overlay.push(overlay);
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

      for (var j = 0; j < data[0].Ds_KEY.length; ++j) {
        positions.push({
          lat: data[0].Ds_LAT[j],
          lon: data[0].Ds_LON[j]
        });
      }
      
      for (var l = 0; l < positions.length; ++l) {
        overlay = new CustomOverlay({
          map: map,
          type: cnt_view,
          ds_name: data[0].Ds_NAME[l],
          ds_key: data[0].Ds_KEY[l],
          ds_lat: data[0].Ds_LAT[l],
          ds_lon: data[0].Ds_LON[l],
          ds_cnt: data[0].Ds_CNT[l],
          ds_addr: data[0].Ds_ADDR[l],
          ds_avg: data[0].Ds_AVG[l],
          ds_type: data[0].Ds_TYPE[l],
          ds_expo: data[0].Ds_EXPO[l],
          ds_priceA: data[0].Ds_PRICE_A[l],
          ds_priceB: data[0].Ds_PRICE_B[l],
          position: new naver.maps.LatLng(positions[l].lat, positions[l].lon)
        });
        
        _cluster.overlay.push(overlay);
      }
      setTimeout(function (){
        $("#map_loding").css("display","none");
        $("#list_loding").css("display","none");
        $("#list_loding1").css("display","none");
      },500);
      if(key){
        $("#tipD_"+key).addClass("active");
      }
      $(".product").hover(function (){
        var lat=$(this).attr("data1");
        var lon=$(this).attr("data2");
        overlay = new CustomOverlay({
          map: map,
          type: "list",
          position: new naver.maps.LatLng(lat, lon)
        });
        _cluster.overlay.push(overlay);
      }, function (){
        $(".location").remove();
      });
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
      setTimeout(function (){
        $("#map_loding").css("display","none");
        $("#list_loding").css("display","none");
        $("#list_loding1").css("display","none");
      },300);
    },
    beforeSend: function() {
      setTimeout(function (){
        $("#map_loding").css("display","none");
        $("#list_loding").css("display","none");
        $("#list_loding1").css("display","none");
      },300);
    },
    complete: function() {
      if($(".btn-stores01").hasClass("on")){
        $(".bg-blocker").css("display", "block");
        $(".bg-blocker").css("z-index", "0");
      }else{
        $(".bg-blocker").css("display", "none");
        $(".bg-blocker").css("z-index", "-1");
      }
      setTimeout(function (){
        $("#map_loding").css("display","none");
        $("#list_loding").css("display","none");
        $("#list_loding1").css("display","none");
      },300);
    }
  });
}



function list_detail(PPT_IDX) {
  $("#list_loding1").css("display","block");
  $("#ppt_map").removeClass("on");
  $(".content").scrollTop(0);
  
  $("#bQnaIdx").val("");
  $("#bQnaName").val("");
  $("#bQnaTel").val("");
  $("#bQnaIdx").val(PPT_IDX);
  $.ajax({
    type: 'post',
    url: '/VO/prodDetail',
    data: {
      PPT_IDX: PPT_IDX,
      dataType: "json"
    },
    success: function(data, status, xhr) {
      var data = JSON.parse(data);
      //console.log(data);
      
      $("#PPT_TITLE").text(data[0][0].PPT_TITLE);
      var img_html = "";
      /*
      for (var i = 0; i < data[1].length; i++) {
        img_html += "<img src='/uploads/" + data[1][i] + "' style='width:100px;'/>";
      }
      $("#p_img").html(img_html);*/
      $("#PPT_IMG").attr("src", "/uploads/" + data[1][0]);
      var img_cnt = data[1].length;
      var img_html = "";
      for (var i = 0; i < img_cnt; i++) {
        img_html += "<div class=\"swiper-slide\">";
        img_html += "<div class=\"img-wrap\"><img src=\"/uploads/" + data[1][i] + "\" alt=\"인테리어사진\"></div>";
        img_html += "</div>";
      }
      if(MET_IDX){
        $("#detail_like").attr("onclick","productCart('click','"+data[0][0].PPT_IDX+"', '"+MET_IDX+"', '"+data[0][0].PST_IDX+"')");
      }else{
        $("#detail_like").attr("onclick","alert('로그인 후 서비스 이용이 가능합니다.')");
      }
      if(data[0].cart==true){
        $("#detail_like").addClass("on");
      }else{
        $("#detail_like").removeClass("on");
      }
      $("#detail_img").html(img_html);
      $("#detail_img2").html(img_html);
      
      $("#PPT_PRICE_A_D").html(comma(uncomma(data[0][0].PPT_PRICE_A)));
      $("#PPT_PRICE_B_D").html(comma(uncomma(data[0][0].PPT_PRICE_B)));
      if(data[0][0].PPT_PRICE_C_ETC=='비공개' || data[0][0].PPT_PRICE_C_ETC=='권리금 없음'){
        var PPT_PRICE_C_ETC = data[0][0].PPT_PRICE_C_ETC.replace('권리금', '');
        $("#PPT_PRICE_C").html(PPT_PRICE_C_ETC);
      }else if(data[0][0].PPT_PRICE_C_ETC=='협의가능'){
        $("#PPT_PRICE_C").html(comma(uncomma(data[0][0].PPT_PRICE_C))+" (협의가능)");
      }else{
        $("#PPT_PRICE_C").html(comma(uncomma(data[0][0].PPT_PRICE_C)));
      }
      

      if (data[0][0].PPT_EXPOSURE == 'y') {
        $("#PPT_ADDR1_B").html(data[0][0].PPT_ADDR1_B);
        $("#PPT_ADDR").html(data[0][0].PPT_ADDR1_B);
      } else {
        $("#PPT_ADDR1_B").html(data[0][0].PPT_AREA_A + " " + data[0][0].PPT_AREA_B + " " + data[0][0].PPT_AREA_C);
        $("#PPT_ADDR").html(data[0][0].PPT_AREA_A + " " + data[0][0].PPT_AREA_B + " " + data[0][0].PPT_AREA_C);
      }
      var p_num = "M_";
      p_num += data[0].P_NUM;
      $("#PPT_NUM").html(p_num);
      $("#PPT_ETC").html(data[0][0].PPT_CONTENT);
      $("#PPT_TYPE").html(data[0][0].PPT_TYPE_A + "/" + data[0][0].PPT_TYPE_B);
      $("#PPT_SIZE_D").html(data[0][0].PPT_SIZE_B);
      var floors = "";
      if (data[0][0].PPT_STOREYS_B == 'A') {
        floors = "지상 " + data[0][0].PPT_STOREYS_C + "층";
      } else {
        floors = "지하 " + data[0][0].PPT_STOREYS_C + "층";
      }
      $("#PPT_STOREYS").html(floors);
      
      if(data[0][0].PPT_PRICE_D_ETC){
        $("#PPT_PRICE_D").html("없음");
      }else{
        $("#PPT_PRICE_D").html(comma(uncomma(data[0][0].PPT_PRICE_D))+"만원");
      }
      

      var priceC = "";
      if (data[0][0].PPT_PRICE_C_ETC == '비공개') {
        priceC = "비공개";
      } else if (data[0][0].PPT_PRICE_C_ETC == '권리금 없음') {
        priceC = "권리금 없음";
      } else if (data[0][0].PPT_PRICE_C_ETC == '협의가능') {
        priceC = "협의가능";
      } else {
        priceC = data[0][0].PPT_PRICE_C;
      }
      $("#p_price_C").html(priceC);
      //$("#PPT_REG_DATE").html(data[0][0].PPT_REG_DATE);
      if (data[0][0].PPT_OPTION_A == '즉시입주') {
        $("#optionA").css("display", "");
        $("#optionA").html("<span><img src='/icon/s_op01.png' alt='즉시입주 아이콘'/></span> 즉시입주가능 ");
      } else if (data[0][0].PPT_OPTION_A == '협의가능') {
        $("#optionA").css("display", "");
        $("#optionA").html("<span><img src='/icon/s_op01.png' alt='즉시입주 아이콘'/></span> 입주일 협의가능 ");
      } else if (!data[0][0].PPT_OPTION_A) {
        $("#optionA").css("display", "none");
      }
      if (data[0][0].PPT_OPTION_C) {
        $("#optionB").css("display", "");
        $("#optionB").html("<span class=\"small-icon\"><img src='/icon/s_op02.png' alt='냉/난방 아이콘'/></span> " +
          data[0][0].PPT_OPTION_C + " ");
      } else {
        $("#optionB").css("display", "none");
      }
      if (data[0][0].PPT_OPTION_E) {
        $("#optionC").css("display", "");
        $("#optionC").html("<span class=\"small-icon\"><img src='/icon/s_op03.png' alt='준공날짜 아이콘'/></span> " +
          data[0][0].PPT_OPTION_E + " ");
      } else {
        $("#optionC").css("display", "none");
      }
      if (data[0][0].PPT_OPTION_B) {
        $("#optionD").css("display", "");
        $("#optionD").html("<span class=\"small-icon\"><img src='/icon/s_op04.png' alt='주차 아이콘'/></span> " +
          data[0][0].PPT_OPTION_B + "대 ");
      } else {
        $("#optionD").css("display", "none");
      }
      if (data[0][0].PPT_OPTION_D) {
        $("#optionE").css("display", "");
        $("#optionE").html("<span class=\"small-icon\"><img src='/icon/s_op05.png' alt='화장실 아이콘'/></span> 화장실 " +
          data[0][0].PPT_OPTION_D + " ");
      } else {
        $("#optionE").css("display", "none");
      }
      if (data[0][0].PPT_OPTION_G) {
        if (data[0][0].PPT_OPTION_G.indexOf("인테리어") != -1) {
          $("#optionF").css("display", "");
          $("#optionF").html(
            "<span class=\"small-icon\"><img src='/icon/s_op06.png' alt='인테리어 아이콘'/></span> 인테리어 ");
        } else {
          $("#optionF").css("display", "none");
        }

        if (data[0][0].PPT_OPTION_G.indexOf("엘리베이터") != -1) {
          $("#optionG").css("display", "");
          $("#optionG").html(
            "<span class=\"small-icon\"><img src='/icon/s_op07.png' alt='엘리베이터 아이콘'/></span> 엘리베이터 ");
        } else {
          $("#optionG").css("display", "none");
        }
        if (data[0][0].PPT_OPTION_G.indexOf("테라스") != -1) {
          $("#optionH").css("display", "");
          $("#optionH").html(
            "<span class=\"small-icon\"><img src='/icon/s_op08.png' alt='테라스 아이콘'/></span> 테라스 ");
        } else {
          $("#optionH").css("display", "none");
        }

        if (data[0][0].PPT_OPTION_G.indexOf("루프탑") != -1) {
          $("#optionI").css("display", "");
          $("#optionI").html(
            "<span class=\"small-icon\"><img src='/icon/s_op09.png' alt='루프탑 아이콘'/></span> 루프탑 ");
        } else {
          $("#optionI").css("display", "none");
        }
        if (data[0][0].PPT_OPTION_G.indexOf("창고") != -1) {
          $("#optionJ").css("display", "");
          $("#optionJ").html(
            "<span class=\"small-icon\"><img src='/icon/s_op10.png' alt='창고 아이콘'/></span> 창고 ");
        } else {
          $("#optionJ").css("display", "none");
        }
        if (data[0][0].PPT_OPTION_G.indexOf("복층") != -1) {
          $("#optionK").css("display", "");
          $("#optionK").html(
            "<span class=\"small-icon\"><img src='/icon/s_op11.png' alt='복층 아이콘'/></span> 복층 ");
        } else {
          $("#optionK").css("display", "none");
        }
        if (data[0][0].PPT_OPTION_G.indexOf("보안시스템") != -1) {
          $("#optionL").css("display", "");
          $("#optionL").html(
            "<span class=\"small-icon\"><img src='/icon/s_op12.png' alt='보안시스템 아이콘'/></span> 보안시스템 ");
        } else {
          $("#optionL").css("display", "none");
        }
        if (data[0][0].PPT_OPTION_G.indexOf("입출입관리") != -1) {
          $("#optionM").css("display", "");
          $("#optionM").html(
            "<span class=\"small-icon\"><img src='/icon/s_op13.png' alt='입출입관리 아이콘'/></span> 입출입관리 ");
        } else {
          $("#optionM").css("display", "none");
        }
      }
      $("#kakao_feed").attr("data1",data[0][0].PPT_IDX);
      $("#kakao_feed").attr("data2",data[0][0].PPT_LAT);
      $("#kakao_feed").attr("data3",data[0][0].PPT_LON);
      $("#kakao_feed").attr("data4",data[4].BKT_IMG_SAVE);
      $("#kakao_feed").attr("data5",data[0][0].PPT_TITLE);
      $("#naver_feed").attr("href","javascript:naver_share('"+data[0][0].PPT_IDX+"','"+data[0][0].PPT_LAT+"','"+data[0][0].PPT_LON+"','"+data[0][0].PPT_TITLE+"');");
      $("#copy_link").attr("href","javascript:clipBoard('"+data[0][0].PPT_IDX+"','"+data[0][0].PPT_LAT+"','"+data[0][0].PPT_LON+"');");

      if (!data[4].BKT_IMG_SAVE) {
        $("#BKT_IMG_SAVE").attr("src", "/img/broker.png");
      } else {
        $("#BKT_IMG_SAVE").attr("src", "/uploads/" + data[4].BKT_IMG_SAVE);
      }
      if(data[4].BKT_COMPANY){
        $("#BKT_BUSINESSNAME_D").html(data[4].BKT_COMPANY);
      }else{
        $("#BKT_BUSINESSNAME_D").html("개인");
      }
      if(data[4].BKT_ADDR){
        $("#BKT_ADDR_D").html(data[4].BKT_ADDR);
      }else{
        $("#BKT_ADDR_D").html("");
      }
      $("#BKT_NAME_TEL_D").html(data[4].BKT_NAME + " / " + data[4].BKT_TEL);

      $("#PPT_NUM1").text("M_" + data[0].P_NUM);
      var organA = "";
      var organA_cnt = 0;
      var organB = "";
      var organB_cnt = 0;
      var organC = "";
      var organC_cnt = 0;
      for (var i = 0; i < data[2].length; i++) {
        if (data[2][i] == '공공기관') {
          organA += "<li>" + data[3][i] + " <span class=\"dt\">"+data[6][i]+"m</span></li>";
          organA_cnt++;
        } else if (data[2][i] == '병원') {
          organB += "<li>" + data[3][i] + " <span class=\"dt\">"+data[6][i]+"m</span></li>";
          organB_cnt++;
        } else if (data[2][i] == '학교') {
          organC += "<li>" + data[3][i] + " <span class=\"dt\">"+data[6][i]+"m</span></li>";
          organC_cnt++;
        }
      }
      $("#organAcnt").text(organA_cnt);
      for (var i = 0; i < organA_cnt; i++) {

      }
      $("#organAlist").html(organA);
      $("#organBlist").html(organB);
      $("#organClist").html(organC);
      $("#organAcnt").text(organA_cnt);
      $("#organBcnt").text(organB_cnt);
      $("#organCcnt").text(organC_cnt);

      var recom_cnt = data[5].PIT_IMG.length;
      if (recom_cnt == 0 || !data[4].BKT_IDX) {
        $("#recommDIV").css("display", "none");
      } else {
        $("#recommDIV").css("display", "");
      }
      
      var recomHtml = "";
      for (var i = 0; i < recom_cnt; i++) {
        if (i == 0) {
          recomHtml += "<div class=\"swiper-slide swiper-slide-active\" onclick=\"list_detail(" + data[5][i].PPT_IDX + ");\">";
        } else if (i == 1) {
          recomHtml += "<div class=\"swiper-slide swiper-slide-next\">";
        } else {
          recomHtml += "<div class=\"swiper-slide\">";
        }
        recomHtml += "<div class=\"product\" onclick=\"list_detail(" + data[5][i].PPT_IDX + ")\">";
        recomHtml += "<div class=\"img-wrap\"><img src=\"/uploads/" + data[5].PIT_IMG[i] + "\" alt=\"매물사진\">";
        recomHtml += "</div>";
        recomHtml += "<div class=\"text-wrap\">";
        recomHtml += "<p class=\"row01\"><span class=\"title\">" + data[5][i].PPT_TITLE + "</span></p>";
        recomHtml += "<p class=\"row02\"><span class=\"type\">월 </span><span class=\"deposit\">" + comma(uncomma(data[5][i]
          .PPT_PRICE_B)) + "만원</span> / <span class=\"monthly-rent\">" + comma(uncomma(data[5][i].PPT_PRICE_A)) + "만원</span></p>";
        recomHtml += "<p class=\"row03\"><span class=\"area\">" + data[5][i].PPT_SIZE_B +
          "</span><span class=\"text-unit\">m²</span></p>";
        if(data[5][i].PPT_PRICE_C_ETC=='비공개' || data[5][i].PPT_PRICE_C_ETC=='권리금 없음'){
          var PPT_PRICE_C_ETC = data[5][i].PPT_PRICE_C_ETC.replace('권리금', '');
          recomHtml += "<p class=\"row04\">권리금<span class=\"expense\"> " + PPT_PRICE_C_ETC + "</span></p>";
        }else if(data[5][i].PPT_PRICE_C_ETC=='협의가능'){
          recomHtml += "<p class=\"row04\">권리금<span class=\"expense\"> " + comma(uncomma(data[5][i].PPT_PRICE_C)) + " (협의가능)</span></p>";
        }else{
          recomHtml += "<p class=\"row04\">권리금<span class=\"expense\"> " + comma(uncomma(data[5][i].PPT_PRICE_C)) + "</span></p>";
        }
        

        recomHtml += "<p class=\"row05 add\">" + data[5][i].PPT_ADDR1_B + "</p>";
        recomHtml += "</div>";
        recomHtml += "</div>";
        recomHtml += "</div>";
      }
      $("#recomm_swiper").append(recomHtml);
      var position_d = new naver.maps.LatLng(data[0][0].PPT_LAT, data[0][0].PPT_LON);
      var map_d = new naver.maps.Map("ppt_map", {
        center: position_d,
        zoom: 16,
        minZoom: 15,
        maxZoom: 18
      });
      if(data[0][0].PPT_EXPOSURE=="y"){
        var marker = new naver.maps.Marker({
            position: new naver.maps.LatLng(data[0][0].PPT_LAT, data[0][0].PPT_LON),
            map: map_d
        });
      }else{
        $("#ppt_map").addClass("on");
      }
      
      setTimeout(function (){
        $("#list_loding1").css("display","none");
      },300);
      // 매물 상세 하단 추천매물 슬라이더
      var bottomSlider = new Swiper('.bottom-slider', {
        
        loop: true,
        slidesPerView: 'auto', // 동시에 보여줄 슬라이드 갯수
        // speed: 1000,
        // autoplay: {
        //   delay: 3000,
        //   disableOnInteraction: false,
        // },
        loopAdditionalSlides : 1,
        observer: true,
        observeParents: true,
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }
       
      });
      $(".swiper-button-prev").removeClass("swiper-button-disabled");
      $(".swiper-button-next").removeClass("swiper-button-disabled");
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

function mapOverlay(type, name, key, lat, lon, cnt, positions,addr) {
  var overlay = "";
  for (var l = 0; l < positions.length; ++l) {
    overlay = new CustomOverlay({
      map: map,
      type: type,
      ds_name: name[l],
      ds_key: key[l],
      ds_lat: lat[l],
      ds_lon: lon[l],
      ds_cnt: cnt[l],
      ds_addr: addr[l],
      position: new naver.maps.LatLng(positions[l].lat, positions[l].lon)
    });
    _cluster.overlay.push(overlay);
  }
}
function area_b_select(key,name,lat,lon,addr){
  var avg = $("#storeB").val();
  if(avg){
    overLay_Loding("",key,avg);
  }else{
    overLay_Loding("",key);
  }
  
  //alert(key);
  //$(".map-color").removeClass("active");
  $("#tipD_"+key).addClass("active");
  $(".right-slider").removeClass("on");
  $(".btn-slider").removeClass("on");
  $(".btn-back").trigger("click");
  var addr = addr.split(" ");
  $("#selectD").val("");
  $("#selectD").val(name);
  $("#selectDong").val(name);
  $("#selectG").val("");
  $("#selectG").val(addr[1]);
  $("#selectS").val("");
  $("#selectS").val(addr[0]);
}

$(".btn-back").on("click",function(){
  $("#list_loding").css("display","");
});

$(".product").hover(function (){
  var lat=$(this).attr("data1");
  var lon=$(this).attr("data2");
  overlay = new CustomOverlay({
    map: map,
    type: "list",
    position: new naver.maps.LatLng(lat, lon)
  });
  _cluster.overlay.push(overlay);
}, function (){
  $(".location").remove();
});

$("input[name='search_type']:radio").change(function() {
  overLay_Loding();
});

 //콤마찍기
 function comma(str) {
  str = String(str);
  return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

//콤마풀기
function uncomma(str) {
  str = String(str);
  return str.replace(/[^\d]+/g, '');
}