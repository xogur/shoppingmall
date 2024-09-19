
<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	 
$result = mysql_query("select * from receivers where ordernum='$ordernum'", $con);
$total = mysql_num_rows($result);

if ($total) {
	$session = mysql_result($result, 0, "session");
 
	mysql_query("update receivers set status=7 where ordernum='$ordernum' and buydate='$buydate' and code='$code'", $con);
}

echo ("<meta http-equiv='Refresh' content='0; url=mypage.php'>");

mysql_close($con);
	   
?>

	   
