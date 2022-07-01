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
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_분류(소) 코드 리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_분류(소) 코드 리스트.xls" );
}
echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='8' >
				<h4 style='text-align:center;'>분류(소) 코드 리스트</h4>
			</td>
		</tr>
		<tr>
			<td>NO</td>
			<td>코드(대)</td>
			<td>명칭(대)</td>
      <td>코드(중)</td>
			<td>명칭(중)</td>
      <td>코드(소)</td>
			<td>명칭(소)</td>
      <td>생성일</td>
		</tr>
";
$i=1;
  $i=0;
  foreach($results as $data){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$data->CAT_CODE."</td>";
		echo "<td>".$data->CAT_NAME."</td>";
    echo "<td>".$data->CBT_CODE."</td>";
		echo "<td>".$data->CBT_NAME."</td>";
    echo "<td>".$data->CCT_CODE."</td>";
		echo "<td>".$data->CCT_NAME."</td>";
    echo "<td>".$data->CCT_REG_DATE."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
</body>

</html>