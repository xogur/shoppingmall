<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// ��ǰ �̹��� ������ photo ���� ������ ����
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
      window.alert('��ǰ ������ �����߽��ϴ�')
      history.go(-1)
      </script>
   ");
   exit;
} else {
   echo("
      <script>
      window.alert('��ǰ�� ���������� �����Ǿ����ϴ�')
      </script>
   ");
}

mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=p-adminlist.php'>");

?>
