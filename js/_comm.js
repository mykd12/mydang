//** 내위치 찾기 **//
function getLocation() {
  if (navigator.geolocation) { // GPS를 지원하면
    navigator.geolocation.getCurrentPosition(function(position) {
      lat = position.coords.latitude;
      lon = position.coords.longitude;
      setTimeout(function() {
        if(!sesstion_location){
          location.reload();
        }
      }, 700);

    }, function(error) {
      //console.error(error);
      if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
          // iOS 아이폰, 아이패드, 아이팟
          alert("맥os, 아이패드, 아이폰 사용자는 \r\n 설정 > 개인 정보 보호 > 위치 서비스로 이동 후 위치 서비스 켬으로 변경하셔야 \r\n 현재 위치 기반 서비스를 이용하실 수 있습니다.");
      }

    }, {
      enableHighAccuracy: false,
      maximumAge: 0,
      timeout: Infinity
    });

  } else {
    alert('GPS를 지원하지 않습니다');
  }
}

//** 연락처 양식화 **//
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

//** 현위치 위도 경도 구하기 **//
function searchDetailAddrFromCoords(coords, callback) {
  // 좌표로 법정동 상세 주소 정보를 요청합니다
  geocoder.coord2Address(coords.getLng(), coords.getLat(), callback);
}


/****************** 내위치 찾기 *******************/
function my_point(lat, lon){
  // 주소-좌표 변환 객체를 생성합니다
  var geocoder = new kakao.maps.services.Geocoder();
  var my_location = new kakao.maps.LatLng(lat, lon);
  searchDetailAddrFromCoords(my_location, function(result, status) {
    if (status === kakao.maps.services.Status.OK) {
      var detailAddr = !!result[0].road_address ? result[0].road_address.address_name : '';
      var sido = result[0].address.region_1depth_name;
      var gugun = result[0].address.region_2depth_name;
      var dong = result[0].address.region_3depth_name;

      if(sido){
        location_select(sido, gugun, dong, lat, lon);
        setTimeout(function() {
       	 location.reload();
        }, 700);
      }
    }
  });

  function searchDetailAddrFromCoords(coords, callback) {
      // 좌표로 법정동 상세 주소 정보를 요청합니다
      geocoder.coord2Address(coords.getLng(), coords.getLat(), callback);
  }
	// 위치정보 세션 저장
  function location_select(sido, gugun, dong, lat, lon){
    $.ajax({
      type: 'post' ,
      url: './inc/mainVO.php' ,
      data: {
        mode: 'MAIN_LOCATION',
        sido: sido,
        gugun: gugun,
        dong: dong,
        lat:lat,
        lon:lon
      }
    });
  }
}