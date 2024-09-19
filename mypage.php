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
<tr><td align=center style="font-size:30px;"><b> 회원 정보 </b></td></tr>
<tr><td align=right><a href=umodify.php><font size=2>회원정보수정</a></td></tr>
</table>

<table border=0 width=1000 style="border:1px solid lightgray; border-radius:10px;">
<tr><td height=300 colspan=5 align=center><img src="회원정보.png" height=100 style="margin-top:50;"><br><font size=4 style="margin-bottom:50;"><br><b>환영합니다 <? echo $uname; ?>님</font><br><font size=2 color="#69B33F"><? echo $uname; ?>님은 배추도사 무도사 회원입니다.</font></td></tr>
<tr style="background-color:#FAFAD2;">
<td width=100 style="border-bottom:0.5px solid lightgray; font-size:14px;">이름</td>
<td width=120 style="border-bottom:0.5px solid lightgray;"><font size=2><? echo $uname; ?></td>
<td width=80 style="border-bottom:0.5px solid lightgray;"><font size=2>휴대전화</td>
<td width=140 style="border-bottom:0.5px solid lightgray;"><font size=2><? echo $mphone; ?></td></tr>
<tr style="background-color:#FAFAD2;">
<td width=80 style="border-bottom:0.5px solid lightgray;"><font size=2>이메일</td>
<td width=170 colspan=3 style="border-bottom:0.5px solid lightgray;"><font size=2><? echo $email; ?></td></tr>
<tr style="background-color:#FAFAD2;"><td style="border-bottom:0.5px solid lightgray;"><font size=2>주소</td>
<td style="border-bottom:0.5px solid lightgray;" colspan=3><font   size=2><? echo $zip . " " . $addr1 . " " . $addr2;   ?></td></tr>
<tr style="background-color:#FAFAD2;"><td><font size=2>적립포인트</td>
<td colspan=3><font   size=2><? echo("$point<font>원</font>"); ?></td></tr>
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
<tr><td colspan=5 align=center>나의 주문처리 현황</td></tr>
<tr><td width=139 align=center style='border-right:0.5px solid lightgray;'>입금 전</td><td width=139 align=center style='border-right:0.5px solid lightgray;'>배송 준비중</td><td width=139 align=center style='border-right:0.5px solid lightgray;'>배송중</td><td width=139 align=center style='border-right:0.5px solid lightgray;'>배송완료</td><td width=139 align=center>취소/교환/반품</tr>
<tr><td align=center style='border-right:0.5px solid lightgray;'>$q</td><td align=center style='border-right:0.5px solid lightgray;'>$w</td><td align=center style='border-right:0.5px solid lightgray;'>$j</td><td align=center style='border-right:0.5px solid lightgray;'>$r</td><td align=center>$c</td></tr>
</table>
");
			
echo ("
	<table width=690 border=0 style='margin-top:150px;'>
	<tr><td   align=center><b>구매내역</b></td></tr>
	<tr><td   align=center height=50></td></tr>
	<tr><td   align=center></td></tr>
	<tr><td>* <font color=red   size=2>주문 물품이 배송 이전 단계이면 온라인으로 주문   취소가 가능합니다.</td></tr>
	<tr><td>* <font size=2>배송중이거나 구매 완료된 제품에 대한 반품 및 환불 요청은     당사 고객센터(전화: 070-4065-8670)로 문의바랍니다.</td></tr>
	</table>
");

echo("
	<table border=0 width=690 style='border:1px solid lightgray; margin-top:100px; margin-bottom:50px; border-radius:10px;'>
	<tr><td align=center style='border-bottom:1px solid lightgray;'><font size=2>구매번호</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>구매일자</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>주문내역</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>금액</td>
	<td align=center style='border-bottom:1px solid lightgray;'><font size=2>주문상태</td></tr>");
if   ($cpage=='') $cpage=1;    // $cpage -  현재 페이지 번호
	$pagesize = 5;                // $pagesize - 한 페이지에 출력할 목록 개수

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
				$status = "주문신청";
				break;
		  case 2:
				$status = "주문접수";
				break;
		  case 3: 
				$status = "배송준비중";
				break;
		  case 4:
				$status = "배송중";
				break;
		  case 5:
				$status = "배송완료";
				break;
		  case 6:
				$status = "구매완료";
				break;
		case 7:
				$status = "주문취소";
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
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>개</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice 원</td>
			<td align=center><font size=2>$status<br><a href='shop-input.php?code=$pcode&name=$pname&price=$price&buydate=$buydate2'>후기 작성하기</a>");
		}
		else if ($oldstatus == 6 and $reivewcount == 1) {
		echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>개</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice 원</td>
			<td align=center><font size=2>$status<br>후기 작성완료");
		}
		else if ($oldstatus == 7) {
		echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>개</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice 원</td>
			<td align=center><font size=2 color=red>$status<br>");
		}
		else{
			echo ("<tr><td align=center style='border-right:1px solid lightgray;'><font size=2>
			<a href=# onclick=\"window.open('detailview.php?ordernum=$ordernum', '_new',   'width=940, height=250, scrollbars=yes');\">$ordernum</a></td><td   align=center><font size=2>$buydate</td>
			<td style='border-right:1px solid lightgray;'><font size=2>$pname ($quantity<a>개</a>)</td><td align=right style='border-right:1px solid lightgray;'><font   size=2>$subtotalprice 원</td>
			<td align=center><font size=2>$status");
		}
		
		
		if ($oldstatus < 4) 
			echo ("<br>(<a href='cancle-pass.php?ordernum=$ordernum&buydate=$buydate&code=$pcode' style='color:blue;'>주문취소</a>)");

		echo ("</td></tr>");
			$counter++;
	}
		
	

} else {

	echo ("<tr><td align=center colspan=5><font size=2><b>주문 내역이 존재하지 않습니다</b></td></tr>");

}

echo ("</table>");
// 화면 하단에 페이지 번호 출력
	if ($cblock=='') $cblock=1;   // $cblock - 현재 페이지 블록값
	$blocksize = 5;             // $blocksize - 화면상에 출력할 페이지 번호 개수

	$pblock = $cblock - 1;      // 이전 블록은 현재 블록 - 1
	$nblock = $cblock + 1;     // 다음 블록은 현재 블록 + 1
		
	// 현재 블록의 첫 페이지 번호
	$startpage = ($cblock - 1) * $blocksize + 1;	

	$pstartpage = $startpage - 1;  // 이전 블록의 마지막 페이지 번호
	$nstartpage = $startpage + $blocksize;  // 다음 블록의 첫 페이지 번호

	if ($pblock > 0)        // 이전 블록이 존재하면 [이전블록] 버튼을 활성화
		echo ("<a href=mypage.php?board=testboard&cblock=$pblock&cpage=$pstartpage><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:black; margin-bottom:150px'></i></a> ");

	// 현재 블록에 속한 페이지 번호를 출력	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // 마지막 페이지를 출력했으면 종료함
	   if ($cpage==$i) {
	   echo ("<a href=mypage.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; border-radius:100px; color:white; margin-bottom:150px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=mypage.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' nowrap style='margin-bottom:150px'>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=mypage.php?board=testboard&cblock=$nblock&cpage=$nstartpage<i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:black; margin-bottom:150px'></i></a> ");

	echo ("</td></tr></table>");

mysql_close($con);	

?>
<? include ("bot.php");?>