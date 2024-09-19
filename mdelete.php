<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

mysql_query("delete from memojang where wdate='$wdate'",$con);


echo("<meta http-equiv='Refresh' content='0; url=testboard-content.php?&id=$id'>");

mysql_close($con);

?>
