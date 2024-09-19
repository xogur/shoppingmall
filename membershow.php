<? include ("top.php");?>
<?

if ($UserID != 'admin') {
	echo ("<script>
		window.alert('관리자만 접근 가능한 기능입니다')
		history.go(-1)
		</script>");
    exit;
} 

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);
	
$result = mysql_query("select * from member order by uname", $con);
$total = mysql_num_rows($result);

echo ("<center>
	<table border=0 width=980 style='margin-top:100px;'>
    <tr><td align=center><font size=6><b>회원 목록 조회</b></td></tr>
	<tr><td align=right height=80 valign=bottom><font><a href=admin.php style='color:black; font-size:18px;'>뒤로</a></td>
	</tr></table> ");

$i = 0;	

echo ("<center>
	<table border=0 width=1000 style='border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742; margin-bottom:200px;'>
	<tr height=35 style='background-color:#EBF2D9'>
	<td align=center width=60 style='border-bottom:0.5px solid lightgray;'><font size=3><b>ID</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><font   size=3><b>이름</b></td>
	<td align=center width=290 style='border-bottom:0.5px solid lightgray;'><font size=3><b>주소</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><font size=3><b>전화번호</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><font size=3><b>이메일</b></td>
	<td align=center width=40 style='border-bottom:0.5px solid lightgray;'><font size=3><b>승인</b></td></tr>
");	

while($i < $total):
	$uid = mysql_result($result, $i, "uid");
	$uname = mysql_result($result, $i, "uname");
	$zip = mysql_result($result, $i, "zipcode");
	$addr1 = mysql_result($result, $i, "addr1");
	$addr2 = mysql_result($result, $i, "addr2");
	$mphone = mysql_result($result, $i, "mphone");
	$email = mysql_result($result, $i, "email");
	$approved = mysql_result($result, $i, "approved");

	$address = "(" . $zip .   ")" . "&nbsp;" . $addr1 . "&nbsp;" .   $addr2;
	
    echo ("<tr height=30><td align=center style='border-bottom:0.5px solid lightgray;'><font size=3>$uid</td>
		<td align=center style='border-bottom:0.5px solid lightgray;' height=50><font size=3>$uname</td>
		<td style='border-bottom:0.5px solid lightgray;'><font size=3 >$address</td>
		<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3>$mphone</td>
		<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3>$email</td>");
		
	if ($approved == 0) {
		echo ("<td align=center style='border-bottom:0.5px solid lightgray;'><a href=memberchange.php?uid=$uid><font size=3>대기</a></td></tr>");
	} else {
		echo ("<td align=center style='border-bottom:0.5px solid lightgray;'><a href=memberchange.php?uid=$uid><font size=3>완료</a></td></tr>");
	}
	      
	$i++;
endwhile;

echo ("</table>");
mysql_close($con);

?>
<? include ("bot.php");?>
