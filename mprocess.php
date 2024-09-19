<?

function check($message) {
	echo ("
		<script>
		window.alert(\"$message\");
		history.go(-1);
		</script>
	");
	exit;
}


if (!$wmemo) check("내용을 입력하세요");
echo $d;
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma", $con);

$wdate =   date("Y-m-d H:i:s");

mysql_query("update memojang set name='$UserID', message='$wmemo', wdate='$wdate' where wdate='$d'", $con);

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=testboard-content.php?id=$id'>");

?>
