<?

if (!$code){
	echo("
		<script>
		window.alert('상품코드명이 없습니다. 다시 입력하세요.')
		history.go(-1)
		</script>
	");
	exit;
}

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

if (!$userfile){
	echo("
		<script>
        window.alert('상품 사진을 선택해 주세요')
        history.go(-1)
        </script>
    ");
    exit;
} else {
    $savedir = "./pds";
    $temp = ereg_replace(" ", "_", $userfile_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('동일한 화일 이름이 이미 서버에 존재합니다')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfile, "$savedir/$temp");
         unlink($userfile);
    }
}

if (!$userfileexplain){
	echo("
		<script>
        window.alert('설명 사진을 선택해 주세요')
        history.go(-1)
        </script>
    ");
    exit;
} else {
    $savedir = "./pds";
    $temp2 = ereg_replace(" ", "_", $userfileexplain_name);
    if (file_exists("$savedir/$temp2")) {
         echo (" 
             <script>
             window.alert('동일한 화일 이름이 이미 서버에 존재합니다')
             history.go(-1)
             </script>
         ");
         exit;
    } else {
         copy($userfileexplain, "$savedir/$temp2");
         unlink($userfileexplain);
    }
}
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result = mysql_query("insert into product(class, code, name, content, price1, price2, userfile,fileexplain, hit,review,recipe) values ($class, '$code', '$name', '$content', '$price1', '$price2','$temp','$temp2', 0,0,'0')", $con);

mysql_close($con);		

if (!$result) {
   echo("
      <script>
      window.alert('이미 사용중인 상품 코드입니다')
      history.go(-1)
      </script>
   ");
   exit;
} else {
   echo("
      <script>
      window.alert('상품 등록이 완료되었습니다')
      </script>
   ");
}
echo ("<meta http-equiv='Refresh' content='0; url=p-adminlist.php'>");

?>
