<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
$result = mysql_query("select * from member where uid='$uid'", $con);
$total = mysql_num_rows($result);

if (!$total){
	echo("<script>
		window.alert('���̵� �������� �ʽ��ϴ�')
		history.go(-1)
		</script> ");
	 exit;
} else {
	$pass = mysql_result($result, 0, "upass");
	$uname = mysql_result($result, 0, "uname");
	$approved = mysql_result($result, 0, "approved");

	if ($approved == 0) {
		echo("<script>
				window.alert('�������� ȸ�� ������ �Ϸ���� �ʾҽ��ϴ�')
				history.go(-1)
				</script> ");
		exit;
	} 
		
	if ($pass != $upass) {
		echo("<script>
			window.alert('��й�ȣ�� ���� �ʽ��ϴ�')
			history.go(-1)
			</script> ");
		exit;
	} else {
		SetCookie("UserID", "$uid", 0);
		SetCookie("UserName", "$uname", 0);
		 
		$session = md5(uniqid(rand()));
		SetCookie("Session", $session, 0);
				
		mysql_query("delete from shoppingbag where id='$uid'", $con);
			 
		echo ("<meta http-equiv='Refresh' content='0; url=home.php'>"); 
	}
}
mysql_close($con);

?>
