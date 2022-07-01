<html>

<head>
  <script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <script type="text/javascript" src="js/jquery.battatech.excelexport.js"></script>
  <style>
  * {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
  }

  table {
    width: 1050px;
    text-align: center;
    border: 1px solid black;
  }
  </style>
</head>

<body>
  <?
header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );
if($search){
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_지역별 지하철 승하차 리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_지역별 지하철 승하차 리스트.xls" );
}
echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='12' >
				<h4 style='text-align:center;'>지역별 지하철 승하차 리스트</h4>
			</td>
		</tr>
		<tr>
      <td>NO</td>
			<td>기관</td>
			<td>도로명주소</td>
			<td>동주소</td>
			<td>시/도</td>
			<td>구/군</td>
			<td>호선</td>
			<td>역명</td>
			<td>위도</td>
			<td>경도</td>
			<td>승하차인원</td>
			<td>생성일</td>
		</tr>
";
$i=1;
  $i=0;
  foreach($results as $data){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$data->DET_INSTITUTION."</td>";
		echo "<td>".$data->DET_ADDR_A."</td>";
		echo "<td>".$data->DET_ADDR_B."</td>";
		echo "<td>".$data->DET_AREA_A."</td>";
    echo "<td>".$data->DET_AREA_B."</td>";
    echo "<td>".$data->DET_NUM."</td>";
    echo "<td>".$data->DET_NAME."</td>";
    echo "<td>".$data->DET_LAT."</td>";
    echo "<td>".$data->DET_LON."</td>";
    echo "<td>".$data->DET_CNT."</td>";
    echo "<td>".$data->DET_REG_DATE."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
</body>

</html>