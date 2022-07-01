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
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_상가정보 리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_상가정보 리스트.xls" );
}
echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='4' >
				<h4 style='text-align:center;'>상가정보 리스트</h4>
			</td>
		</tr>
		<tr>
      <td>NO</td>
      <td>상가명</td>
      <td>업종</td>
      <td>우편번호</td>
      <td>주소</td>
		</tr>
";
$i=1;
  $i=0;
  foreach($results as $data){
    if($row['DSTT_FLRNO']){
			$DSTT_FLRNO = $data->DSTT_FLRNO."층";
		}
		if($row['DSTT_HONO']){
			$DSTT_HONO = $data->DSTT_HONO."호";
		}
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$data->DSTT_BIZESNM."</td>";
		echo "<td>".$data->DSTT_INDSSCLSNM."</td>";
		echo "<td>".$data->DSTT_NEWZIPCD."</td>";
		echo "<td>".$data->DSTT_RDNMADR." ".$DSTT_FLRNO." ".$DSTT_HONO."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
</body>

</html>