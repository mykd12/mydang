
  if(!lat){
	  var lat = 35.152064;
  }
  if(!lon){
	  var lon = 126.847243;
  }

 
	  
	var _cluster = {};
	_cluster.overlay = [];

//오버레이 클리어
_cluster.overlay.clear = function () {
if (_cluster.overlay.length > 0) {
	for (var index = 0; index < _cluster.overlay.length; index++) {
		_cluster.overlay[index].setMap(null);
	}
}
};

//지도위 클리어
_cluster.clear = function () {
if (_cluster.overlay)
		_cluster.overlay.clear();
}


//var map = new naver.maps.Map('kakao_map', mapOptions);
var CustomOverlay = function(options) {
	
    this._element = $('<div class=\"map-color area_name_d label\" id=\"tipD_'+ options.ds_key +'\" onclick=\"area_b_select(\''+ options.ds_key +'\',\''+ options.ds_name +'\',\''+ options.ds_lat +'\', \''+options.ds_lon+'\');\" ><div class=\"saturation\"><span>'+ options.ds_name +'</span><span class=\"num\">'+ comma(options.ds_cnt) +'</span></div></div>')

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
	  }
	});
	
	map.setOptions({
      minZoom: 9,
      maxZoom: 19
  });
  
	var positions = [];

	for(var i=0; i < ds_key.length; ++i){
		positions.push({lat : ds_lat[i],lon : ds_lon[i]});
	}

		var overlay ="";
		for (var idx in positions) {
			overlay = new CustomOverlay({
			    map: map,
			    ds_name : ds_name[idx],
			    ds_key : ds_key[idx],
			    ds_lat : ds_lat[idx],
			    ds_lon : ds_lon[idx],
			    ds_cnt : ds_cnt[idx],
			    position: new naver.maps.LatLng(positions[idx].lat, positions[idx].lon)
			});
			//console.log(positions[idx].lat);
			_cluster.overlay.push(overlay);
		}
		
		$('#schQnaType').empty();
			$('#schQnaType').append("<option value='11'>중분류 선택</option>");
			//$(".btn-stores").removeClass("on");
			//$(".select-box").removeClass("on");
			$("#select1 option:eq(0)").prop("selected", true);
			$("#schQnaType option:eq(0)").prop("selected", true);
			$('#schQnaType').prop('disabled', true);
		
		$('#map_loding').css('display','none');
		$('#list_loding').css('display','none');
		
		var level = 4;
		naver.maps.Event.addListener(map, 'dragend', function(e) {
			overLay_Loding('dragend');
    });
		naver.maps.Event.addListener(map, 'zoom_changed', function(e) {
			overLay_Loding('zoom');
    });
    
    function overLay_Loding(type){
    	$('#map_loding').css('display','');
		  $('#list_loding').css('display','');
			if (_cluster.overlay.length > 0){
				_cluster.overlay.clear();
			}
			var optionA = $("#OPTION_A").val();
		  if(optionA=='1'){
		    optionA = $("#PPT_PRICE_A").val();
		  }
			var optionB = $("#OPTION_B").val();
			if(optionB=='1'){
			  optionB = $("#PPT_PRICE_B").val();
			}
			var optionC = $("#OPTION_C").val();
			if(optionC=='1'){
			  optionC = $("input[name='PPT_PRICE_C']:checked").val();
			}
			var optionD = $("#OPTION_D").val();
			if(optionD=='1'){
			  optionD = $("#PPT_SIZE").val();
			}
			var optionE = $("#OPTION_E").val();
			if(optionE=='1'){
			  optionE = $("input[name='PPT_CATE']:checked").val();
			}
			var optionF = $("#OPTION_F").val();
			if(optionF=='1'){
			  optionF = $("input[name='PPT_STOREYS']:checked").val();
			}
			var optionG = $("#OPTION_G").val();
			if(optionG=='1'){
			  optionG = $("#PPT_OPTION_I").val();
			}
			var optionH = $("#OPTION_H").val();
			if(optionH=='1'){
			  optionH = $("input[name='PPT_OPTION_J']:checked").val();
			}
			var optionI = $("#OPTION_I").val();
			if(optionI=='1'){
			  optionI="";
			  if($("#PPT_OPTION_C").is(":checked")){
			    optionI=$("#PPT_OPTION_C").val();
			  }
			  if($("#PPT_OPTION_D").is(":checked")){
			    if(optionI){
			      optionI += "|"+$("#PPT_OPTION_D").val();
			    }else{
			      optionI += $("#PPT_OPTION_D").val();
			    }
			  }
			  if($("#PPT_OPTION_K").is(":checked")){
			    if(optionI){
			      optionI += "|"+$("#PPT_OPTION_K").val();
			    }else{
			      optionI += $("#PPT_OPTION_K").val();
			    }
			  }
			  if($("#PPT_OPTION_E").is(":checked")){
			    if(optionI){
			      optionI += "|"+$("#PPT_OPTION_E").val();
			    }else{
			      optionI += $("#PPT_OPTION_E").val();
			    }
			  }
			  if($("#PPT_OPTION_F").is(":checked")){
			    if(optionI){
			      optionI += "|"+$("#PPT_OPTION_F").val();
			    }else{
			      optionI += $("#PPT_OPTION_F").val();
			    }
			  }
			  if($("#PPT_OPTION_G").is(":checked")){
			    if(optionI){
			      optionI += "|"+$("#PPT_OPTION_G").val();
			    }else{
			      optionI += $("#PPT_OPTION_G").val();
			    }
			  }
			}
			if(type=='zoom'){
				level = level+1;
			}
			
			$.ajax({
				type: 'post' ,
				url: './inc/mainVO.php' ,
				data: {
					mode: 'MOVE_LIST',
					level: level,
					type: "dong",
					lat:map.getCenter()._lat,
					lon:map.getCenter()._lng
				},
				dataType:"json",
				success: function(data, status, xhr) {
					//console.log(data);
				
					$(".product-list").html(data.PPT_LIST);
					$("#PPT_CNT").html(data.PPT_CNT);
					ds_cnt = data.DT_CNT;
					ds_key = data.DT_KEY;
					ds_lat = data.DT_LAT;
					ds_lon = data.DT_LON;
					ds_name = data.DT_NAME;
					for(var i=0; i < ds_key.length; ++i){
						overlay = new CustomOverlay({
						    map: map,
						    ds_name : ds_name[i],
						    ds_key : ds_key[i],
						    ds_lat : ds_lat[i],
						    ds_lon : ds_lon[i],
						    ds_cnt : ds_cnt[i],
						    position: new naver.maps.LatLng(ds_lat[i], ds_lon[i])
						});
						//console.log(positions[idx].lat);
						_cluster.overlay.push(overlay);
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log(jqXHR.responseText);
				},
				beforeSend:function(){
				 $('#map_loding').css('display','');
				 $('#list_loding').css('display','');
				 
				},
				complete:function(){
					$('#map_loding').css('display','none');
					$('#list_loding').css('display','none');
					
				},timeout:100000
				
			});
    }
    
    function area_b_select(key,name,lat,lon){
			$(".map-color").removeClass("active");
			$("#tipD_"+key).addClass("active");
			var level = map.getLevel();
			ajax_list(lat,lon,level,cnt_view,"최신순",key);
			$(".right-slider").removeClass("on");
	    $(".btn-slider").removeClass("on");
	    $(".btn-back").trigger("click");
		}
		
		function comma(str) {
			str = String(str);
			return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
		}
	
		//콤마풀기
		function uncomma(str) {
			str = String(str);
			return str.replace(/[^\d]+/g, '');
		}