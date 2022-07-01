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
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_지하철기본정보 리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_지하철기본정보 리스트.xls" );
}
echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='13' >
				<h4 style='text-align:center;'>지하철기본정보 리스트</h4>
			</td>
		</tr>
		<tr>
      <td>NO</td>
      <td>역사번호</td>
      <td>역사명</td>
      <td>노선코드</td>
      <td>노선명</td>
      <td>영문역사명</td>
      <td>한문역사명</td>
      <td>역구분</td>
      <td>역위도</td>
      <td>역경도</td>
      <td>기관명</td>
      <td>역사주소</td>
      <td>역사전화번호</td>
		</tr>
";
$i=1;
  $i=0;
  foreach($results as $data){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$data->DHT_NUM."</td>";
		echo "<td>".$data->DHT_NAME."</td>";
		echo "<td>".$data->DHT_NUMBER."</td>";
		echo "<td>".$data->DHT_NUM_NAME."</td>";
    echo "<td>".$data->DHT_EN_NAME."</td>";
    echo "<td>".$data->DHT_CN_NAME."</td>";
    echo "<td>".$data->DHT_TYPE."</td>";
    echo "<td>".$data->DHT_LAT."</td>";
    echo "<td>".$data->DHT_LON."</td>";
    echo "<td>".$data->DHT_INTI."</td>";
    echo "<td>".$data->DHT_ADDR."</td>";
    echo "<td>".$data->DHT_TEL."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
</body>

</html>