<?
if($menu){
	if (!$UserID) {
	echo ("<script>
		window.alert('�α��� ����ڸ� ���� �����մϴ�')
		history.go(-1)
		</script>");
      exit;
	}

$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$subresult = mysql_query("select * from product where recipe='$menu'", $con);
$subtotal = mysql_num_rows($subresult);
$i = 0;
// �̹� ���ι鿡 ���� �����̸� ������ ���� 
while ($i < $subtotal){
$code = mysql_result($subresult, $i, "code");
$result = mysql_query("select * from shoppingbag where session='$Session' and pcode='$code'", $con);
$quantity = 1;
if (!$quantity) $quantity = 1;
$total = mysql_num_rows($result);
if ($total) $oldnum = mysql_result($result, 0, "quantity");

if ($oldnum) {
     $quantity = $oldnum + $quantity;
     mysql_query("update shoppingbag set quantity=$quantity where   session='$Session' and pcode='$code'", $con);
} else {
     mysql_query("insert into shoppingbag(id, session, pcode, quantity) values ('$UserID','$Session', '$code', $quantity)", $con);
}
$i = $i + 1;
}
mysql_close($con);	//�����ͺ��̽� ��������

echo ("<meta http-equiv='Refresh' content='0; url=showbag.php'>");
}
else {
if (!$UserID) {
	echo ("<script>
		window.alert('�α��� ����ڸ� ���� �����մϴ�')
		history.go(-1)
		</script>");
      exit;
} 
if ($quantity < 1 || $quantity > 100) {
	echo ("<script>
		window.alert('�����ϰ��� �ϴ� ������ ������ �ʰ��մϴ�')
		history.go(-1)
		</script>");
      exit;
}

if (!isset($quantity)) $quantity = 1;

$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// �̹� ���ι鿡 ���� �����̸� ������ ���� 
$result = mysql_query("select * from shoppingbag where session='$Session' and pcode='$code'", $con);
$total = mysql_num_rows($result);

if ($total) $oldnum = mysql_result($result, 0, "quantity");

if ($oldnum) {
     $quantity = $oldnum + $quantity;
     mysql_query("update shoppingbag set quantity=$quantity where   session='$Session' and pcode='$code'", $con);
} else {
     mysql_query("insert into shoppingbag(id, session, pcode, quantity) values ('$UserID','$Session', '$code', $quantity)", $con);
}

mysql_close($con);	//�����ͺ��̽� ��������

echo ("<meta http-equiv='Refresh' content='0; url=showbag.php'>");
}
?>
