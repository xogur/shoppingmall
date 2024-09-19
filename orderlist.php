<? include ("top.php");?>
<?

if ($UserID != 'admin') {
	echo ("<script>
		window.alert('관리자만 접근 가능한 기능입니다')
		history.go(-1)
		</script>");
    exit;
} 

echo ("<center><table border=0 width=980 style='margin-top:100px; font-color:black;'>
    <tr><td align=center><font size=6><b>주문 내역 조회</b></td></tr>
    <tr><td align=right height=80 valign=bottom><font size=3><a href=admin.php>뒤로</a></td>
	</tr></table>");
	  	  
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);
	
$result = mysql_query("select * from receivers order by buydate desc", $con);
$total = mysql_num_rows($result);

echo (" <table border=0 width=1000 style='border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742; margin-bottom:20px;'>
	<tr height=25 valign=center style='background-color:#EBF2D9'>
	<td align=center width=110 style='border-bottom:0.5px solid lightgray;'><font size=3><b>주문번호</b></td>
	<td width=120 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>주문일자</b></td>
	<td width=280 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>주문내역</b></td>
	<td width=70 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>주문총액</b></td>
	<td width=90 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>상태변경</b></td></tr>");	

if ($total > 0) {	
	$sumprice=0;
	$counter = 0;
		
	while($counter < $total) :

		$session =  mysql_result($result, $counter, "session");
		$buydate = mysql_result($result, $counter, "buydate");
		$ordernum = mysql_result($result, $counter, "ordernum");
		$status = mysql_result($result, $counter, "status");
		$code = mysql_result($result, $counter, "code");
			 
		switch ($status) {
			case 1:
				$tstatus = "주문신청";
				break;
			case 2:
				$tstatus = "주문접수";
				break;
			case 3: 
				$tstatus = "배송준비중";
				break;
			case 4:
				$tstatus = "배송중";
				break;
			case 5:
				$tstatus = "배송완료";
				break;
			case 6:
				$tstatus = "구매완료";
				break;
			case 7:
				$tstatus = "주문취소";
				break;
		}
		  
		$subresult = mysql_query("select * from orderlist where session='$session' and wdate='$buydate' and pcode='$code'",   $con);
		$subtotal = mysql_num_rows($subresult);

		$subcounter=0;
		$totalprice=0;

		while ($subcounter < $subtotal) :
			$pcode = mysql_result($subresult, $subcounter, "pcode");
			$quantity = mysql_result($subresult, $subcounter, "quantity");
			$tmpresult = mysql_query("select * from product where code='$pcode'", $con);
			$pname = mysql_result($tmpresult, 0, "name");
			$price = mysql_result($tmpresult, 0, "price2");
		   
			$subtotalprice = $quantity * $price;
			$totalprice = $totalprice + $subtotalprice;
			$subcounter++;
		endwhile;
		
		$items = $subtotal - 1;
		
		echo ("<tr><td align=center style='border-bottom:0.5px solid lightgray;'><a href=#   onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new', 'width=940, height=250, scrollbars=yes');\"><font size=3>$ordernum</a></td>
			<td align=center style='border-bottom:0.5px solid lightgray;' height=50><font size=3>$buydate</td>
			<td style='border-bottom:0.5px solid lightgray;' align=center><font size=3>$pname 외 $items 종</td>
			<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3>$totalprice 원</td>
			<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3>");
		if ($status < 6) { 
			echo ("<a href='changestatus.php?ordernum=$ordernum&buydate=$buydate&code=$code'> <b>$tstatus</b></a></td></tr>");
		} else if($status == 7){
		  echo ("<b><font color=red>$tstatus</b></td></tr>");
		}
		else{
		  echo ("<b>$tstatus</b></td></tr>");
		}
		
		$counter++;
		$sumprice=$sumprice + $totalprice;
	endwhile;
} else {
       echo ("<tr><td align=center colspan=5><font size=2><b>주문 내역이 존재하지 않습니다</b></td></tr>");
}

echo ("</table>");
echo ("<table width=900 style=' margin-bottom:200px;'>
		<tr><td align=right colspan=5><font size=4><b>총 매출액: <font color=red><b>$sumprice 원</b></font></td></tr></table>");
mysql_close($con);

?>
<? include ("bot.php");?>