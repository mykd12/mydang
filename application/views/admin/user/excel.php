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
  <?php
header( "Content-type: application/vnd.ms-excel;charset=UTF-8");
header( "Expires: 0" );
header( "Cache-Control: must-revalidate, post-check=0,pre-check=0" );
header( "Pragma: public" );
if($search){
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_회원리스트(".$search.").xls" );
}else{
	header( "Content-Disposition: attachment; filename=".date('Ymd')."_회원리스트.xls" );
}

echo "
	<table border='1' style='width:800px' >
		<tr>
			<td colspan='6' >
				<h4 style='text-align:center;'>회원 리스트</h4>
			</td>
		</tr>
		<tr>
			<td>NO</td>
			<td>이름</td>
			<td>연락처</td>
			<td>이메일</td>
      <td>주소</td>
			<td>생성일</td>
		</tr>
";
$i=1;
	foreach($results as $data){
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".decrypt($data->MET_NAME)."</td>";
		echo "<td>".decrypt($data->MET_TEL)."</td>";
		echo "<td>".decrypt($data->MET_EMAIL)."</td>";
    echo "<td>".decrypt($data->MET_ADDR1)." ".decrypt($data->MET_ADDR2)."</td>";
		echo "<td>".$data->MET_REG_DATE."</td>";
		echo "</tr>";
	$i++;}
echo "
	</table>
	";
die;
?>
</body>

</html>