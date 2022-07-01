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
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_지역별 주거 인구수 리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_지역별 주거 인구수 리스트.xls" );
}
echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='11' >
				<h4 style='text-align:center;'>지역별 주거 인구수 리스트</h4>
			</td>
		</tr>
		<tr>
			<td>NO</td>
			<td>시/도</td>
			<td>구/군</td>
      <td>동/면/리</td>
			<td>총 인구 수</td>
      <td>총 세대 수</td>
      <td>세대당 인구 수</td>
      <td>남성 인구 수</td>
      <td>여성 인구 수</td>
      <td>남여비율</td>
			<td>생성일</td>
		</tr>
";
$i=1;
  $i=0;
  foreach($results as $data){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$data->DAT_AREA_A."</td>";
		echo "<td>".$data->DAT_AREA_B."</td>";
    echo "<td>".$data->DAT_AREA_C."</td>";
		echo "<td>".$data->DAT_CNT_A."</td>";
    echo "<td>".$data->DAT_CNT_B."</td>";
    echo "<td>".$data->DAT_CNT_C."</td>";
    echo "<td>".$data->DAT_CNT_D."</td>";
    echo "<td>".$data->DAT_CNT_E."</td>";
    echo "<td>".$data->DAT_CNT_F."</td>";
		echo "<td>".$data->DAT_REG_DATE."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
</body>

</html>