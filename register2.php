<?

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

if (!$mphone) {
	echo ("<script>
		window.alert('�޴��� ��ȣ�� �Է��� �ּ���');
		history.go(-1);
		</script>");
	exit;
}	

if (!$email) {
	echo ("<script>
		window.alert('�̸��� �ּҸ� �Է����ּ���');
		history.go(-1);
		 </script>");
	exit;
}	

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);
	
$result = mysql_query("update member set upass='$upass1', uname='$uname', mphone='$mphone', email='$email', zipcode='$zip', addr1='$addr1', addr2='$addr2' where uid='$UserID'", $con);
	
if ($result) {
	echo ("<script>
		window.alert('ȸ�� ���� ������ �Ϸ�Ǿ����ϴ�');
		history.go(1);
		 </script>
     ");
} else {
    echo ("<script>
		window.alert('ȸ�� ���� ������ �����߽��ϴ�. �ٽ� �ѹ� �õ��� �ּ���');
		history.go(-1);
		 </script>
	");	   
}
	
mysql_close($con);
	
echo ("<meta http-equiv='Refresh'  content='0; url=logout.php'>");
	
?>
