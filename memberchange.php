<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("shopmall",$con);

$result = mysql_query("select approved from member where uid='$uid'", $con);
$total = mysql_num_rows($result);

if ($total > 0) {
	$status = mysql_result($result, 0,   "approved");
	if ($status == 0) $status = 1;
	else $status = 0;
} else {
	echo ("<script>
		window.alert('ȸ�� ���� ��ȸ�� �����߽��ϴ�');
		history.go(1);
		</script>");
	exit;
}

$result = mysql_query("update member set approved=$status where uid='$uid'", $con);

if ($result) {
	switch ($status) {
		case   1:
			echo ("<script>
				  window.alert('������ �Ϸ�Ǿ����ϴ�');
				  history.go(1);
				  </script>");
			break;
		case 0:
			echo ("<script>
				  window.alert('��� ���·� �����մϴ�');
				  history.go(1);
				  </script>");
			break;	
	}
} else {
	echo ("<script>
		 window.alert('ȸ�� ���� ���濡 �����߽��ϴ�');
		 history.go(1);
		</script>");
}	
	
mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=membershow.php'>");

?>
