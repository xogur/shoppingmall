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
$result = mysql_query("select * from testboard where id='$id'", $con);
$total = mysql_num_rows($result);
//�� �� ��¥ ����
$wdate = date("Y-m-d H:i:s");

//���� ó�� ��ƾ
if ($userfile) {	
   $savedir = "./pds";	//÷�� ������ ����� ����
   $temp = ereg_replace(" ", "_", $userfile_name); 
   copy($userfile, "$savedir/$temp");
   unlink($userfile);
}

// ����Ÿ���̽��� �����Ͽ� ��� ������ ����
mysql_query("update testboard set topic='$topic', filename='$userfile', star=$rating , content='$content' where id=$id", $con);


mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=testboard.php?'>");

?>
