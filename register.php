<?
if (!$agree2) {
	echo ("<script>
		window.alert('����� �������ּ���');
		history.go(-1);
		</script>");
	exit;
}
if (!$agree1) {
	echo ("<script>
		window.alert('����� �������ּ���');
		history.go(-1);
		</script>");
	exit;
}
if (!$uid) {
	echo ("<script>
		window.alert('����� ID�� �Է��ϼ���');
		history.go(-1);
		</script>");
	exit;
}
if (!$upass1) {
	echo ("<script>
		window.alert('��й�ȣ�� �Է��� �ּ���');
		history.go(-1);
		</script>");
	exit;
}
if ($upass1 != $upass2) {
	echo ("<script>
		window.alert('��й�ȣ�� ��й�ȣ Ȯ���� ��ġ���� �ʽ��ϴ�');
		history.go(-1);
		</script>");
	exit;
}
if (!$uname) {
	echo ("<script>
		window.alert('�̸��� �Է��� �ּ���');
		history.go(-1);
		</script>");
	exit;
}	
	
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma", $con);
	
$result = mysql_query("insert into member(uid, upass,uname, mphone, email, zipcode, addr1, addr2, approved,point) values ('$uid', '$upass1', '$uname', '$mphone', '$email', '$zip', '$addr1', '$addr2', 1,0)", $con);
	
if ($result) {
    echo ("<script>
		window.alert('���ߵ��繫���� ȸ�� ������ ���ϵ帳�ϴ�.\\n�������� ������ ���ľ� �α����� �����մϴ�');
		history.go(1);
		</script>
   ");
} else {
    echo ("<script>
		window.alert('ȸ�����Կ� �����߽��ϴ�. �ٽ� �� �� �õ��� �ּ���');
		history.go(-1);
		</script>
	");	   
}
	
mysql_close($con);
echo   ("<meta http-equiv='Refresh' content='0; url=home.php'>");
	
?>
