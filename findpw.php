<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result = mysql_query("select * from member where uname='$uname' and uid='$uid'   and email='$email'", $con);
$total = mysql_num_rows($result);

if (!$total)   {
   echo("
      <script>
      window.alert('�Է��Ͻ� ���̵�� �̸��� �̸��� �ּҸ� ���ÿ� �����ϴ� ����� ���̵� �����ϴ�')
      history.go(-1)
      </script>
   ");
   exit;
} else {
	$upass = mysql_result($result, 0, "upass");
   echo("
      <script>
      window.alert('������ ��й�ȣ�� $upass �Դϴ�')
      </script>
   ");
}

mysql_close($con);	
echo   ("<meta http-equiv='Refresh' content='0; url=home.php'>");
?>
