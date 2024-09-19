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
$result = mysql_query("select id from testboard", $con);
$total = mysql_num_rows($result);

// 글에 대한 id 부여
if (!$total)   {
   $id = 1;
} else {
   $id = $total + 1;
}

//글 쓴 날짜 저장
$wdate = date("Y-m-d H:i:s");

//파일 처리 루틴
if ($userfile) {	
   $savedir = "./pds";	//첨부 파일이 저장될 폴더
   $temp = ereg_replace(" ", "_", $userfile_name); 
   copy($userfile, "$savedir/$temp");
   unlink($userfile);
}
if ($UserID == admin){
	mysql_query("insert into testboard(id, writer, passwd, topic, content, hit, wdate, space, filename,filesize,num) values($id, '$UserID', '$passwd', '$topic', '$content', 0, '$wdate', 0,'$temp','$userfile_size','$id')", $con);
}
else{
// 데이타베이스에 접속하여 모든 내용을 저장
mysql_query("insert into testboard(id, writer, code, passwd, topic, content, hit, wdate, space, filename,filesize,num,star) values($id, '$UserID', '$code', '$passwd', '$topic', '$content', 0, '$wdate', 0,'$temp','$userfile_size','$id',$rating)", $con);
mysql_query("update product set review=review+1 where code='$code'", $con);
mysql_query("update orderlist set reviewwrite=1 where pcode='$code' and wdate='$buydate'", $con);
mysql_query("update member set point=point+500 where uid='$UserID'",$con);
}
mysql_close($con);

echo ("<meta http-equiv='Refresh' content='2; url=testboard.php?'>");

?>
