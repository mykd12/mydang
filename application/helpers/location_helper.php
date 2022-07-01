<?php 
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
  function my_location($myLat, $myLon){
    echo <<< HTML
        <script type="text/javascript">
          console.log("asdasd");
          var lat;
          var lon;
          var s_lat = "<?php echo $myLat;?>"; var s_lon = "<?php echo $myLon;?>";
if (s_lat) { lat = s_lat; } if (s_lon) { lon = s_lon; }

function getLocation() {
if (navigator.geolocation) { // GPS를 지원하면
navigator.geolocation.getCurrentPosition(function(position) {
lat = position.coords.latitude;
lon = position.coords.longitude;
console.log(lat);
console.log(lon);

my_point(lat, lon);

}, function(error) {
//console.error(error);
if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
// iOS 아이폰, 아이패드, 아이팟
alert(
"맥os, 아이패드, 아이폰 사용자는 \r\n 설정 > 개인 정보 보호 > 위치 서비스로 이동 후 위치 서비스 켬으로 변경하셔야 \r\n 현재 위치 기반 서비스를 이용하실 수 있습니다."
);
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


</script>
<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?ncpClientId=c4ta8crjn6"></script>
HTML;
?>

<?php }?>