<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
if ($heart == 1){
mysql_query("update member set $submenu=0  where uid='$UserID'", $con);
mysql_query("update recipe set heart=heart-1  where menu='$menu'", $con);
mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=recipe-show.php?menu=$menu'>");
}
else{
mysql_query("update member set $submenu=1  where uid='$UserID'", $con);
mysql_query("update recipe set heart=heart+1  where menu='$menu'", $con);
mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=recipe-show.php?menu=$menu'>");
}
?>