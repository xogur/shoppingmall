<?

if (!$name){
	echo("
		<script>
		window.alert('상품명이 없습니다. 다시 입력하세요.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$price1){
	echo("
		<script>
		window.alert('가격이 없습니다. 다시 입력하세요.')
		history.go(-1)
		</script>
	");
	exit;
}

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
// 기존 상품 이미지를 그대로 사용하는 경우
if (!$userfile and $userfileexplain){
 // 기존 상품 이미지 파일을 삭제
	$tmp = mysql_query("select fileexplain from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "fileexplain");
    $savedir = "./pds";
	unlink("$savedir/$fname");
	
    // 새로이 첨부한 이미지 파일을 저장	
    $temp = ereg_replace(" ", "_", $userfileexplain_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('동일한 화일 이름이 서버에 존재합니다')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfileexplain, "$savedir/$temp");
         unlink($userfileexplain);
    
		$result = mysql_query("update product set class=$class, name='$name', content='$content', price1=$price1, price2=$price2, fileexplain='$temp' where code='$code'", $con);

}
}
elseif (!$userfileexplain and $userfile){
	 // 기존 상품 이미지 파일을 삭제
	$tmp = mysql_query("select userfile from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "userfile");
    $savedir = "./pds";
	unlink("$savedir/$fname");
	
    // 새로이 첨부한 이미지 파일을 저장	
    $temp = ereg_replace(" ", "_", $userfile_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('동일한 화일 이름이 서버에 존재합니다')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfile, "$savedir/$temp");
         unlink($userfile);
    }
		$result = mysql_query("update product set class=$class, name='$name', content='$content', price1=$price1, price2=$price2, userfile='$temp' where code='$code'", $con);

}
elseif (!$userfile and !$userfileexplain) {
	$result = mysql_query("update product set class=$class, name='$name', content='$content', price1=$price1, price2=$price2 where code='$code'", $con);
}
else {

     $tmp = mysql_query("select * from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "userfile");
    $savedir = "./pds";
	unlink("$savedir/$fname");
	
    // 새로이 첨부한 이미지 파일을 저장	
    $temp = ereg_replace(" ", "_", $userfile_name);
	$temp2 = ereg_replace(" ", "_", $userfileexplain_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('동일한 화일 이름이 서버에 존재합니다')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfile, "$savedir/$temp");
		 unlink($userfile);
    }
	if (file_exists("$savedir/$temp2")) {
         echo (" 
             <script>
             window.alert('동일한 화일 이름이 서버에 존재합니다')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfileexplain, "$savedir/$temp2");
		 unlink($userfileexplain);
    }
	$result = mysql_query("update product set class=$class, name='$name', content='$content', price1=$price1, price2=$price2, userfile='$temp',fileexplain='$temp2' where code='$code'", $con);
}

if (!$result) {
	echo("
      <script>
      window.alert('상품 수정에 실패했습니다')
      </script>
    ");
    exit;
} else {
	echo("
      <script>
      window.alert('상품 수정이 완료되었습니다')
      </script>
   ");
} 

mysql_close($con);		//데이터베이스 연결해제

echo ("<meta http-equiv='Refresh' content='0; url=p-adminlist.php'>");

?>