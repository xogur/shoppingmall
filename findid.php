<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result = mysql_query("select * from member where uname='$uname' and   email='$email'", $con);
$total = mysql_num_rows($result);

if (!$total)   {
   echo("<script>
      window.alert('�Է��Ͻ� �̸��� �̸��� �ּҸ� ���ÿ� �����ϴ� ����� ���̵� �����ϴ�')
      history.go(-1)
      </script>
   ");
   exit;
} else {
	$uid = mysql_result($result, 0, "uid");
    echo("<script>
        window.alert('������ ���̵�� $uid �Դϴ�')
        </script>
   ");
}

mysql_close($con);	
echo   ("<meta http-equiv='Refresh' content='0; url=home.php'>");
?>
