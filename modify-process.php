<?
if (!$topic)   {      
	echo("
		<script>
		window.alert('타이틀이 없습니다. 다시 입력해주세요')
		history.go(-1)
		</script>
	");
	exit;
}
if (!$content)   {      
	echo("
		<script>
		window.alert('내용이 없습니다. 다시 입력해주세요')
		history.go(-1)
		</script>
	");
	exit;
}

// MySQL 데이타베이스에 연결
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma", $con);
$result = mysql_query("select * from testboard where id='$id'", $con);
$total = mysql_num_rows($result);
//글 쓴 날짜 저장
$wdate = date("Y-m-d H:i:s");

//파일 처리 루틴
if ($userfile) {	
   $savedir = "./pds";	//첨부 파일이 저장될 폴더
   $temp = ereg_replace(" ", "_", $userfile_name); 
   copy($userfile, "$savedir/$temp");
   unlink($userfile);
}

// 데이타베이스에 접속하여 모든 내용을 저장
mysql_query("update testboard set topic='$topic', filename='$userfile', star=$rating , content='$content' where id=$id", $con);


mysql_close($con);

echo ("<meta http-equiv='Refresh' content='0; url=testboard.php?'>");

?>
