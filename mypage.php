<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
button {
				padding:5px 10px 5px 10px;
				border:0px;
				color:#62A834;
				background-color:white;
				}
button:hover {border-radius:100px;
				color:white;
				background-color:#62A834;
				padding:5px 10px 5px 10px;
				}
</style>
<? include ("top.php");?>
<?

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uid = mysql_result($result, 0,   "uid");
$uname = mysql_result($result, 0,   "uname");
$email = mysql_result($result, 0,   "email");
$zip = mysql_result($result, 0,   "zipcode");
$addr1 = mysql_result($result, 0,   "addr1");
$addr2 = mysql_result($result, 0,   "addr2");
$mphone = mysql_result($result, 0,   "mphone");
$point = mysql_result($result, 0,   "point");

?>
<center>
<table width=1000 border=0 style="border-radius:10px; margin-top:100px;">
<tr><td align=center style="font-size:30px;"><b> ȸ�� ���� </b></td></tr>
<tr><td align=right><a href=umodify.php><font size=2>ȸ����������</a></td></tr>
</table>

<table border=0 width=1000 style="border:1px solid lightgray; border-radius:10px;">
<tr><td height=300 colspan=5 align=center><img src="ȸ������.png" height=100 style="margin-top:50;"><br><font size=4 style="margin-bottom:50;"><br><b>ȯ���մϴ� <? echo $uname; ?>��</font><br><font size=2 color="#69B33F"><? echo $uname; ?>���� ���ߵ��� ������ ȸ���Դϴ�.</font></td></tr>
<tr style="background-color:#FAFAD2;">
<td width=100 style="border-bottom:0.5px solid lightgray; font-size:14px;">�̸�</td>
<td width=120 style="border-bottom:0.5px solid lightgray;"><font size=2><? echo $uname; ?></td>
<td width=80 style="border-bottom:0.5px solid lightgray;"><font size=2>�޴���ȭ</td>
<td width=140 style="border-bottom:0.5px solid lightgray;"><font size=2><? echo $mphone; ?></td></tr>
<tr style="background-color:#FAFAD2;">
<td width=80 style="border-bottom:0.5px solid lightgray;"><font size=2>�̸���</td>
<td width=170 colspan=3 style="border-bottom:0.5px solid lightgray;"><font size=2><? echo $email; ?></td></tr>
<tr style="background-color:#FAFAD2;"><td style="border-bottom:0.5px solid lightgray;"><font size=2>�ּ�</td>
<td style="border-bottom:0.5px solid lightgray;" colspan=3><font   size=2><? echo $zip . " " . $addr1 . " " . $addr2;   ?></td></tr>
<tr style="background-color:#FAFAD2;"><td><font size=2>��������Ʈ</td>
<td colspan=3><font   size=2><? echo("$point<font>��</font>"); ?></td></tr>
</table>
<br><br>

<?

$result = mysql_query("select * from receivers where id='$UserID' order by buydate desc", $con);
$result2 = mysql_query("select * from orderlist where id='$UserID' order by wdate desc", $con);
$total = mysql_num_rows($result);
$total2 = mysql_num_rows($result2);
$j = 0;
$e=0;
$q = 0;
$w = 0;
$e = 0;
$r = 0;
$c = 0;

	while ($e < $total2){
		$subdate = mysql_result($result2, $e, "wdate");
		$subcode = mysql_result($result2, $e, "pcode");
		$statusresult = mysql_query("select * from receivers where buydate='$subdate' and code='$subcode' order by buydate desc", $con);
		$substatus = mysql_result($statusresult, 0, "status");
	switch($substatus){
		case 1:
		$q=$q+1;
		break;
		case 2:
		$q=$q+1;
		break;
		case 3:
		$w=$w+1;
		break;
		case 4:
		$j=$j+1;
		break;
		case 5:
		$r=$r+1;
		break;
		case 6:
		$r=$r+1;
		break;
		case 7:
		$c=$c+1;
		break;
	}
	$e=$e+1;
}
echo("
<table border=0  width=1000 height=170 style='border:1px solid lightgray; border-radius:10px; margin-top:100px;'>
<tr><td colspan=5 align=center>���� �ֹ�ó�� ��Ȳ</td></tr>
<tr><td width=139 align=center style='border-right:0.5px solid lightgray;'>�Ա� ��</td><td width=139 align=center style='border-right:0.5px solid lightgray;'>��� �غ���</td><td width=139 align=center style='border-right:0.5px solid lightgray;'>�����</td><td width=139 align=center style='border-right:0.5px solid lightgray;'>��ۿϷ�</td><td width=139 align=center>���/��ȯ/��ǰ</tr>
<tr><td align=center style='border-right:0.5px solid lightgray;'>$q</td><td align=center style='border-right:0.5px solid lightgray;'>$w</td><td align=center style='border-right:0.5px solid lightgray;'>$j</td><td align=center style='border-right:0.5px solid lightgray;'>$r</td><td align=center>$c</td></tr>
</table>
");
			
echo ("
	<table width=690 border=0 style='margin-top:150px;'>
	<tr><td   align=center><b>���ų���</b></td></tr>
	<tr><td   align=center height=50></td></tr>
	<tr><td   align=center></td></tr>
	<tr><td>* <font color=red   size=2>�ֹ� ��ǰ�� ��� ���� �ܰ��̸� �¶������� �ֹ�   ��Ұ� �����մϴ�.</td></tr>
	<tr><td>* <font size=2>������̰ų� ���� �Ϸ�� ��ǰ�� ���� ��ǰ �� ȯ�� ��û��     ��� ������(��ȭ: 070-4065-8670)�� ���ǹٶ��ϴ�.</td></tr>
	</table>
");

echo("
	<table border=0 width=690 style='border:1px solid lightgray; margin-top:100px; margin-bottom:50px; border-radius:10px;'>
	<tr><td align=center style='border-bottom:1px solid lightgray;'><font size=2>���Ź�ȣ</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>��������</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>�ֹ�����</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>�ݾ�</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>�ֹ�����</td></tr>");
if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 5;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;


if ($total > 0) {	
	$counter = 0;
	while($counter < $pagesize) {
	$newcounter=($cpage-1)*$pagesize+$counter;
	if ($newcounter == $total) break;
		$session = mysql_result($result, $newcounter, "session");
		$buydate = mysql_result($result, $newcounter, "buydate");
		$ordernum = mysql_result($result, $newcounter, "ordernum");
		$status = mysql_result($result, $newcounter, "status");
		$code = mysql_result($result, $newcounter, "code");
		$oldstatus = $status;
	 
		switch ($status) {
		  case 1:
				$status = "�ֹ���û";
				break;
		  case 2:
				$status = "�ֹ�����";
				break;
		  case 3: 
				$status = "����غ���";
				break;
		  case 4:
				$status = "�����";
				break;
		  case 5:
				$status = "��ۿϷ�";
				break;
		  case 6:
				$status = "���ſϷ�";
				break;
		case 7:
				$status = "�ֹ����";
				break;
		}
	 
		$subresult = mysql_query("select * from orderlist where session='$session' and wdate='$buydate' and pcode='$code'",   $con);

      

        $pcode = mysql_result($subresult, 0, "pcode");
		$buydate2 = mysql_result($subresult, 0, "wdate");
        $quantity = mysql_result($subresult, 0, "quantity");
		$reivewcount = mysql_result($subresult, 0, "reviewwrite");
        $tmpresult = mysql_query("select * from product where code='$pcode'", $con);
        $pname = mysql_result($tmpresult, 0, "name");
		$price = mysql_result($tmpresult, 0, "price2");
        $subtotalprice = $quantity * $price;
        $totalprice = $totalprice + $subtotalprice;
		
 
		if ($oldstatus == 6 and $reivewcount == 0){
        echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>��</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice ��</td>
			<td align=center><font size=2>$status<br><a href='shop-input.php?code=$pcode&name=$pname&price=$price&buydate=$buydate2'>�ı� �ۼ��ϱ�</a>");
		}
		else if ($oldstatus == 6 and $reivewcount == 1) {
		echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>��</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice ��</td>
			<td align=center><font size=2>$status<br>�ı� �ۼ��Ϸ�");
		}
		else if ($oldstatus == 7) {
		echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>��</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice ��</td>
			<td align=center><font size=2 color=red>$status<br>");
		}
		else{
			echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>��</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice ��</td>
			<td align=center><font size=2>$status");
		}
		
		
		if ($oldstatus < 4) 
			echo ("<br>(<a href='cancle-pass.php?ordernum=$ordernum&buydate=$buydate&code=$pcode' style='color:blue;'>�ֹ����</a>)");

		echo ("</td></tr>");
			$counter++;
	}
		
	

} else {

	echo ("<tr><td align=center colspan=5><font size=2><b>�ֹ� ������ �������� �ʽ��ϴ�</b></td></tr>");

}

echo ("</table>");
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
		echo ("<a href=mypage.php?board=testboard&cblock=$pblock&cpage=$pstartpage><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:black; margin-bottom:150px'></i></a> ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   if ($cpage==$i) {
	   echo ("<a href=mypage.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; border-radius:100px; color:white; margin-bottom:150px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=mypage.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' nowrap style='margin-bottom:150px'>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=mypage.php?board=testboard&cblock=$nblock&cpage=$nstartpage<i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:black; margin-bottom:150px'></i></a> ");

	echo ("</td></tr></table>");

mysql_close($con);	

?>
<? include ("bot.php");?>