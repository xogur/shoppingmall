<?

if ($newnum < 1 || $newnum > 100) {
	echo ("<script>
		window.alert('�����ϰ��� �ϴ� ������ ������ �ʰ��մϴ�')
		history.go(-1)
		</script>");
    exit;
}
	
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result = mysql_query("update shoppingbag set quantity=$newnum where session='$Session' and pcode='$pcode'", $con);

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=showbag.php'>");

?>
