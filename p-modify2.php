<?

if (!$name){
	echo("
		<script>
		window.alert('��ǰ���� �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

if(!$price1){
	echo("
		<script>
		window.alert('������ �����ϴ�. �ٽ� �Է��ϼ���.')
		history.go(-1)
		</script>
	");
	exit;
}

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
// ���� ��ǰ �̹����� �״�� ����ϴ� ���
if (!$userfile and $userfileexplain){
 // ���� ��ǰ �̹��� ������ ����
	$tmp = mysql_query("select fileexplain from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "fileexplain");
    $savedir = "./pds";
	unlink("$savedir/$fname");
	
    // ������ ÷���� �̹��� ������ ����	
    $temp = ereg_replace(" ", "_", $userfileexplain_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('������ ȭ�� �̸��� ������ �����մϴ�')
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
	 // ���� ��ǰ �̹��� ������ ����
	$tmp = mysql_query("select userfile from product where code='$code'", $con);
	$fname = mysql_result($tmp, 0, "userfile");
    $savedir = "./pds";
	unlink("$savedir/$fname");
	
    // ������ ÷���� �̹��� ������ ����	
    $temp = ereg_replace(" ", "_", $userfile_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('������ ȭ�� �̸��� ������ �����մϴ�')
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
	
    // ������ ÷���� �̹��� ������ ����	
    $temp = ereg_replace(" ", "_", $userfile_name);
	$temp2 = ereg_replace(" ", "_", $userfileexplain_name);
    if (file_exists("$savedir/$temp")) {
         echo (" 
             <script>
             window.alert('������ ȭ�� �̸��� ������ �����մϴ�')
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
             window.alert('������ ȭ�� �̸��� ������ �����մϴ�')
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
      window.alert('��ǰ ������ �����߽��ϴ�')
      </script>
    ");
    exit;
} else {
	echo("
      <script>
      window.alert('��ǰ ������ �Ϸ�Ǿ����ϴ�')
      </script>
   ");
} 

mysql_close($con);		//�����ͺ��̽� ��������

echo ("<meta http-equiv='Refresh' content='0; url=p-adminlist.php'>");

?>