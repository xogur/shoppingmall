<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// 상품 이미지 파일을 photo 폴더 내에서 삭제
$tmp = mysql_query("select * from product where code='$code'", $con);
$fname2 = mysql_result($tmp, 0, "fileexplain");
$fname = mysql_result($tmp, 0, "userfile");
$savedir = "./pds";
unlink("$savedir/$fname");

	
$result = mysql_query("delete from product where code='$code'", $con);
$savedir = "./pds";
unlink("$savedir/$fname2");
if (!$result) {
   echo("
      <script>
      window.alert('상품 삭제에 실패했습니다')
      history.go(-1)
      </script>
   ");
   exit;
} else {
   echo("
      <script>
      window.alert('상품이 정상적으로 삭제되었습니다')
      </script>
   ");
}

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=p-adminlist.php'>");

?>
