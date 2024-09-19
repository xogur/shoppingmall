<? include ("top.php");?>
<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result = mysql_query("select * from product order by id desc", $con);
$total = mysql_num_rows($result);
<? include ("bot.php");?>