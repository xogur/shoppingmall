<?
if (!$topic)   {      
	echo("
		<script>
		window.alert('Ÿ��Ʋ�� �����ϴ�. �ٽ� �Է����ּ���')
		history.go(-1)
		</script>
	");
	exit;
}
if (!$content)   {      
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է����ּ���')
		history.go(-1)
		</script>
	");
	exit;
}

// MySQL ����Ÿ���̽��� ����
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma", $con);
$result = mysql_query("select id from testboard", $con);
$total = mysql_num_rows($result);

// �ۿ� ���� id �ο�
if (!$total)   {
   $id = 1;
} else {
   $id = $total + 1;
}

//�� �� ��¥ ����
$wdate = date("Y-m-d H:i:s");

//���� ó�� ��ƾ
if ($userfile) {	
   $savedir = "./pds";	//÷�� ������ ����� ����
   $temp = ereg_replace(" ", "_", $userfile_name); 
   copy($userfile, "$savedir/$temp");
   unlink($userfile);
}
if ($UserID == admin){
	mysql_query("insert into testboard(id, writer, passwd, topic, content, hit, wdate, space, filename,filesize,num) values($id, '$UserID', '$passwd', '$topic', '$content', 0, '$wdate', 0,'$temp','$userfile_size','$id')", $con);
}
else{
// ����Ÿ���̽��� �����Ͽ� ��� ������ ����
mysql_query("insert into testboard(id, writer, code, passwd, topic, content, hit, wdate, space, filename,filesize,num,star) values($id, '$UserID', '$code', '$passwd', '$topic', '$content', 0, '$wdate', 0,'$temp','$userfile_size','$id',$rating)", $con);
mysql_query("update product set review=review+1 where code='$code'", $con);
mysql_query("update orderlist set reviewwrite=1 where pcode='$code' and wdate='$buydate'", $con);
mysql_query("update member set point=point+500 where uid='$UserID'",$con);
}
mysql_close($con);

echo ("<meta http-equiv='Refresh' content='2; url=testboard.php?'>");

?>
