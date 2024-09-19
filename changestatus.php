<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result = mysql_query("select status from receivers where ordernum='$ordernum' and buydate='$buydate' and code='$code'", $con);
$total = mysql_num_rows($result);

if ($total > 0) {
	$status = mysql_result($result, 0, "status");
	$status = $status + 1;
} else {
	$status = 1;
}

$result = mysql_query("update receivers set status=$status where ordernum='$ordernum' and buydate='$buydate' and code='$code'", $con);

mysql_close($con);	

echo ("<meta http-equiv='Refresh' content='0; url=orderlist.php'>");

?>
