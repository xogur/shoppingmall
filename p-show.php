<? include ("top.php");?>
<style>
a {text-decoration:none; color:black;}
button#b{
			background-color:white; border-radius:50px; color:#62A834; padding:5px 10px 5px 10px;
		}
		button.a:hover {border-radius:100px;
				color:white;
				background-color:#62A834;
				padding:5px 10px 5px 10px;
				}
		button#b:hover {border-radius:100px;
				color:white;
				background-color:#62A834;
				padding:5px 10px 5px 10px;
				}
button {
				font-family: 'Dongle', sans-serif;
				
				padding:1px 10px 1px 10px;
				border:0px;
				
				}
input.damgi:hover {background-color:#2D6F01;
					color:white;
}
input.damgi {
	padding:4px; background-color:#62A834; color:white; border:none; border-radius:5px;
}
</style>
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
mysql_query("update product set hit=hit+1 where code='$code'", $con);
$result = mysql_query("select * from product where code='$code'", $con);
$total = mysql_num_rows($result);
$review=mysql_result($result,0,"review");
$name=mysql_result($result,0,"name");
$content=mysql_result($result,0,"content");
$content=nl2br($content);

$price1=mysql_result($result,0,"price1");
$price2=mysql_result($result,0,"price2");
$userfile=mysql_result($result,0,"userfile");
$fileexplain=mysql_result($result,0,"fileexplain");

echo ("
<center>
	<table width=650 border=0 align=center style='margin-top:100px;'>
    <tr><td width=250 align=center>
	<a href=# onclick=\"window.open('./pds/$userfile', '_new', 'width=450, height=600')\"><img src='./pds/$userfile' width=300 height=350 border=0 style='border-radius:10px;'></a></td>
    <td width=400 valign=top>
    <table border=0 width=100% style='padding-left:50px;'>
	  <tr><td width=80 colspan=2 align=left style='border-bottom:2px green solid; font-size:20px;'><b>$name</b>&nbsp;&nbsp;($code)</td></tr>
	  <tr><td align=center>��ǰ����: </td>
	  <td>&nbsp;&nbsp;<strike>$price1&nbsp;��</strike></td></tr>
	  <tr><td align=center>���ΰ���: </td>
	  <td>&nbsp;&nbsp;<b>$price2&nbsp;��</b></td></tr>
    	  <tr><td colspan=2 height=100 valign=bottom align=center>
	     <form method=post action=tobag.php?code=$code>
	     <input type=text size=3 name=quantity value=1>&nbsp;
	     <input type=submit value=��� class='damgi'>
	     </td></tr></form>
	</table>
	</td>
	</tr>
	</table>	
	<br>
	<table width=1000 border=0 align=center style='margin-top:100px; border-collapse:collapse; margin-bottom:200px;'>
	<tr>");
	if ($mode == 1 or !$mode){
		echo ("<td align=center width=333 height=50 style='background-color:#6AB649; color:white; border:1px solid lightgray;'><a href='p-show.php?mode=1&code=$code' style='background-color:#6AB649; color:white;'><b>��ǰ �� ����</a></td>");
	}
	else {
		echo("<td align=center width=333 height=50 style='color:black; border:1px solid lightgray;'><a href='p-show.php?mode=1&code=$code' style='color:black;'>��ǰ �� ����</a></td>");
	}
	if ($mode == 2){
		echo ("<td align=center width=333 height=50 style='background-color:#6AB649; color:white; border:1px solid lightgray;'><a href='p-show.php?mode=2&code=$code' style='background-color:#6AB649; color:white;'><b>��ǰ �ı�($review)</a></td>");
	}
	else {
		echo("<td align=center width=333 height=50 style='color:black; border:1px solid lightgray;'><a href='p-show.php?mode=2&code=$code' style='color:black;'>��ǰ �ı�($review)</a></td>");
	}
	if ($mode == 3){
		echo ("<td align=center width=333 height=50 style='background-color:#6AB649; color:white; border:1px solid lightgray;'><a href='p-show.php?mode=3&code=$code' style='background-color:#6AB649; color:white;'><b>���/��ȯ/��ǰ</a></td></tr>");
	}
	else {
		echo("<td align=center width=333 height=50 style='color:black; border:1px solid lightgray;'><a href='p-show.php?mode=3&code=$code' style='color:black;'>���/��ȯ/��ǰ</a></td></tr>");
	}
	if ($mode == 1 or !$mode){
	echo("
	<tr><td colspan=3><img src='./pds/$fileexplain' width=1000 height=800 style='margin-top:100px;'></img><br><font style='font-size:18px; color:#737373;'><br><br>$content</font></td></tr>
	</table>");
	}
	if ($mode == 2 ){
		echo("<tr><td colspan=3>");
		$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result = mysql_query("select * from testboard where code='$code' order by id desc", $con);
if (!$smode){ $smode=3;}
switch($smode) {
			case 0:        // �ʱ�ȭ�鿡 ����� �α� ��ǰ ���
				$result = mysql_query("select * from testboard where code='$code'", $con);
	   
				break;
			case 1:        // �ʱ�ȭ�鿡 ����� �α� ��ǰ ���
				$result = mysql_query("select * from testboard where code='$code' order by hit desc", $con);
	   
				break;
			case 2:        // �ʱ�ȭ�鿡 ����� �α� ��ǰ ���
				$result = mysql_query("select * from testboard where code='$code' order by hit asc", $con);
				break;
			case 3:        // �ʱ�ȭ�鿡 ����� �α� ��ǰ ���
				$result = mysql_query("select * from testboard where code='$code' order by star desc", $con);
				break;
			case 4:        // �ʱ�ȭ�鿡 ����� �α� ��ǰ ���
				$result = mysql_query("select * from testboard where code='$code' order by star asc", $con);
	   
				break;
}
$total = mysql_num_rows($result);
echo ("<table border=0 width=1000 style='border-collapse:collapse; margin-top:100px;'><tr><td align=right>");
if ($smode == 2){
	echo("
<a href='p-show.php?class=$class&smode=2&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>������ȸ��</a>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=2&mode=2&code=$code' style='color:black;'>������ȸ��</a>");
}
if ($smode == 1){
	echo("
<a href='p-show.php?class=$class&smode=1&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>������ȸ��</a>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=1&mode=2&code=$code' style='color:black;'>������ȸ��</a>");
}
if ($smode == 3){
	echo("
<a href='p-show.php?class=$class&smode=3&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>����������</a>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=3&mode=2&code=$code' style='color:black;'>����������</a>");
}
if ($smode == 4){
	echo("
<a href='p-show.php?class=$class&smode=4&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>����������</a></td></tr>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=4&mode=2&code=$code' style='color:black;'>����������</a></td></tr>");
}
echo ("
</table>
	<table border=0 width=1000 style='border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742;'>
	<tr class='b'><td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>��ȣ</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>���̵�</b></td>
	<td align=center width=150 style='border-bottom:0.5px solid lightgray;'></td>
	<td style='border-bottom:0.5px solid lightgray;'></td>
	<td align=center width=150 style='border-bottom:0.5px solid lightgray;'><b>��¥</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>��ȸ</b></td>
	</tr>
");

if (!$total){
	echo("
		<tr><td colspan=5 align=center height=100 style='color:red;'>���� ��ϵ� ���� �����ϴ�.</td></tr>
		<table style='margin-bottom:200px;'><tr><td></td></tr></table>
	");
} else {

	if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 5;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

	$counter=0;

	while($counter<$pagesize):
		$newcounter=($cpage-1)*$pagesize+$counter;
		if ($newcounter == $total) break;
		$code=mysql_result($result,$newcounter,"code");
		$id=mysql_result($result,$newcounter,"id");
		$writer=mysql_result($result,$newcounter,"writer");
		$topic=mysql_result($result,$newcounter,"topic");
		$hit=mysql_result($result,$newcounter,"hit");
		$wdate=mysql_result($result,$newcounter,"wdate");
		$space=mysql_result($result,$newcounter,"space");
		$filename=mysql_result($result,$newcounter,"filename");
		$filesize=mysql_result($result,$newcounter,"filesize");
		$num=mysql_result($result,$newcounter,"num");
		$star=mysql_result($result,$newcounter,"star");
		$re = mysql_query("select * from memojang where id=$id", $con);
		$to = mysql_num_rows($re);
		$t="";
		$subresult = mysql_query("select * from product where code='$code'", $con);
		$userfile=mysql_result($subresult,0,"userfile");
		$i = 0;
		if   ($space>0) {
			for ($i=0 ; $i<=$space ; $i++)
				$t = $t . "&nbsp;";     // �亯 ���� ��� ���� �� �κп� ������ ä��
		}
		if ($filename and $filesize):
			if ($to>0):
				echo("
					<tr class='b'><td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150></img></td><td style='border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage&code=$code&mode=1' class='d'>$topic&nbsp;[$to]</a>&nbsp;<i class='fa-sharp fa-solid fa-floppy-disk' style='color:#97B742;'></i></td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr class='b'><td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150></img></td><td style='border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage&code=$code&mode=1' class='d'>$topic&nbsp;</a><i class='fa-sharp fa-solid fa-floppy-disk' style='color:#97B742;'></i></td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
				endif;
		else:
			if ($to>0):
				echo("
					<tr class='b'><td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150></img></td><td style='border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage&code=$code&mode=1' class='d'>$topic&nbsp;[$to]</a></td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr class='b'><td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150></img></td><td style='border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage&code=$code&mode=1' class='d'>$topic</a></td>
					<td align=center height=150 style='border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			endif;
		endif;
		$counter = $counter + 1;
	endwhile;

	echo("</table>");

	echo ("<table border=0 width=1000 style='margin-top:50px; margin-bottom:100px;'>
		  <tr><td align=center nowrap>");
		   
	// ȭ�� �ϴܿ� ������ ��ȣ ���
	if ($cblock=='') $cblock=1;   // $cblock - ���� ������ ��ϰ�
	$blocksize = 5;             // $blocksize - ȭ��� ����� ������ ��ȣ ����

	$pblock = $cblock - 1;      // ���� ����� ���� ��� - 1
	$nblock = $cblock + 1;     // ���� ����� ���� ��� + 1
		
	// ���� ����� ù ������ ��ȣ
	$startpage = ($cblock - 1) * $blocksize + 1;	

	$pstartpage = $startpage - 1;  // ���� ����� ������ ������ ��ȣ
	$nstartpage = $startpage + $blocksize;  // ���� ����� ù ������ ��ȣ

	if ($pblock > 0)        // ���� ����� �����ϸ� [�������] ��ư�� Ȱ��ȭ
		echo ("<a href=testboard.php?board=testboard&cblock=$pblock&cpage=$pstartpage><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   if ($cpage==$i) {
	   echo ("<a href=p-show.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; border-radius:50px; color:white; padding:5px 10px 5px 10px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=p-show.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' id='b'>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=testboard.php?board=testboard&cblock=$nblock&cpage=$nstartpage<i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	echo ("</td></tr></table>");
}

mysql_close($con);
		echo("</td></tr>
	</table>");
	}
	if ($mode == 3 ){
		echo("<tr><td height=100></td></tr><tr><td colspan=3 style='color:#898989; border:0.5px solid lightgray; padding-left:50px;padding-bottom:50px; border-radius:10px;'><br><br><br><br><b>���/��ǰ/��ȯ</b><br>
<br><font color=black><b>01. ��۱Ⱓ</b></font><br>
<br>�ù�<br>
2�� �� �߼� ��ǰ�� �ִ� �ֹ� : �ֹ�/�����Ϸ� �� 2�� �� �߼�<br>

���� / �õ� ��ǰ�� �ִ� �ֹ� : �ֹ�/�����Ϸ� �� ������ �߼�<br>

��� ��ǰ�� �ֹ� : �ֹ�/�����Ϸ� �� ������ �߼�<br>

���μ��� �߼��Ϸκ��� 1~2�� �ҿ�<br>
1. ��� ��ǰ�� �Ѳ����� �ֹ��� ��� ��۱Ⱓ�� 2�� �� �߼� > ���� /�õ� > ��� ������� ��û�˴ϴ�.<br>

2. ��������� ���� �����Ϸ� ���� / ��۱Ⱓ ����<br>

<br>������� : �ֹ��Ϸ� �� �߱޹��� ������·� �Ա� �� �����Ϸ�<br>
�ſ�ī�� / �ǽð�������ü : �ֹ��� ���ÿ� �����Ϸ�<br>

<br><font color=red>�� ��/��/������ ���� �Ϸ� �� �߼��� ���� ���Ϻ��� ����˴ϴ�.<br>
</font>
<br>3. ���� ��۱Ⱓ �ȳ��� ���� ��� ���� �ȳ��� �켱�մϴ�.<br>

<br>���� ����, ���� ������, ���� ��ǰ, ��ü(����) ��� ��ǰ, �� �� ��۰��� ���� �˸��� �ִ� ���<br>
4. ��۱Ⱓ ���� ����<br>

<br>�߰� ��۱Ⱓ �ҿ� : �Ϻ� ���� / �갣 ����<br>
�� ������ ������ ���� ��������� ��۱Ⱓ�� �������� ����.<br>
�ʷϹ��<br>
�����ð� ���� �ֹ�: �ֹ�/�����Ϸ� �� ���� ���<br>

<br>1. �����ð��� ���庰�� �ٸ���, �ֹ� �� �̿밡�ɽð��� �ȳ��˴ϴ�.<br>
2. �ʷϹ���� ��۹ް��� �ϴ� �ּ��� �� ��۰����� ������ ���� ��� ���� �����մϴ�.<br>
3. ���� ��۱Ⱓ �ȳ��� ���� ��� ���� �ȳ��� �켱�մϴ�.<br><br><br>
<font color=black><b>02. ��ۺ�</b></font><br><br>
40,000�� �̻� ������ (40,000�� �̸�, 3,000�� ���� �ΰ�) ���� ����<br>

<br>1. �Ϻ� ���� / �갣������ �߰� ��ۺ� �߻� (������ ��)<br>
2. ��ü����� ��ü�� ���� ��ۺ� �߻�<br>
(�ֹ� �� ��ü�� ��ۺ� ��! Ȯ���ϼ���.)<br>

<br><font color=black><b>03. �������</b></font><br>
������� (�Ϻ� �������� / �ù�Ұ� ���� ����)<br>

<br><font color=black><b>04. ��ǰ/��ȯ ��ȿ�Ⱓ</b></font><br>
��ǰ�� �̻��� ���� ��� ��ȯ/��ǰ�� ��ǰ �����Ϸκ��� 2�� �̳��Դϴ�. (��, ��������� ���� ���� ��ǰ�� �������� ���� ��ǰ�� ����)<br>
<font color=red>��ǰ �̻��̶�?</font> ��ǰ�� �ļ�, ����, ������� ���, �̹��� ȥ�� �� ��ǰ�� �ߴ��� ������ �߻��� ��츦 ��Ī��.<br>
- ����ǰ/�ż���ǰ/�õ���ǰ : ��ǰ���� �� 2�� �̳�<br>
- ��»�ǰ : ��ǰ���� �� 7�� �̳�<br><br>
<font color=black><b>05. ��ǰ/��ȯ ��ۺ��</b></font><br><br>
�� �ܼ����ɿ� ���� ��ȯ/��ǰ�� ��ۺ� ���δ��Դϴ�. (���δ� ��ۺ� 6,000�� - �պ���ۺ�)<br>
(��, �ż���ǰ(ä��, û��, �Ϻ� �ż�������ǰ) / �õ���ǰ�� �������������ѱ�ȯ/��ǰ/ȯ�� �Ұ�))<br>

<br><font color=red>�� �ܼ������̶�?</font><br>
- ���� ������ ���� ������ֹ� ��ǰ�� �̼����� ���<br>
- �ֹ� ��ǰ�� ���� Ư���� �������� ��� / ��ǰ�� ���<br>
- [����غ�] ���¿��� �ּҺ��� ���� ������ ����ϴ� ���<br><br>
<font color=black><b>06. ���/��ǰ/��ȯ �Ұ� ����</b></font><br><br>
1. �ش� ��ǰ�� ���Ե� �ֹ����� �� �ܼ����ɿ� ���� ���/��ȯ/��ǰ�� �Ұ��մϴ�.<br>
- �ż���ǰ : ä��, û��, �Ϻ� �ż�������ǰ (�κ� / �� ��)<br>
- �õ���ǰ<br>
- �����ǰ : �������� ��ǰ, �ֹ����� ��ǰ�� �ش�<br>

<br>2. [�����Ϸ�] ���¿����� ��Ұ� ���� �մϴ�. (����غ���/����� �ܰ迡�� �Ұ�)<br>
- �ֹ���Ҵ� [����غ���] �����ܰ迡 [�ֹ�����]�� ���� ����ó�� ���� (��ҿ� ���ÿ� ���� ���)</td></tr>
	</table>");
	}

?>
<? include ("bot.php");?>