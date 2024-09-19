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
	  <tr><td align=center>상품가격: </td>
	  <td>&nbsp;&nbsp;<strike>$price1&nbsp;원</strike></td></tr>
	  <tr><td align=center>할인가격: </td>
	  <td>&nbsp;&nbsp;<b>$price2&nbsp;원</b></td></tr>
    	  <tr><td colspan=2 height=100 valign=bottom align=center>
	     <form method=post action=tobag.php?code=$code>
	     <input type=text size=3 name=quantity value=1>&nbsp;
	     <input type=submit value=담기 class='damgi'>
	     </td></tr></form>
	</table>
	</td>
	</tr>
	</table>	
	<br>
	<table width=1000 border=0 align=center style='margin-top:100px; border-collapse:collapse; margin-bottom:200px;'>
	<tr>");
	if ($mode == 1 or !$mode){
		echo ("<td align=center width=333 height=50 style='background-color:#6AB649; color:white; border:1px solid lightgray;'><a href='p-show.php?mode=1&code=$code' style='background-color:#6AB649; color:white;'><b>상품 상세 설명</a></td>");
	}
	else {
		echo("<td align=center width=333 height=50 style='color:black; border:1px solid lightgray;'><a href='p-show.php?mode=1&code=$code' style='color:black;'>상품 상세 설명</a></td>");
	}
	if ($mode == 2){
		echo ("<td align=center width=333 height=50 style='background-color:#6AB649; color:white; border:1px solid lightgray;'><a href='p-show.php?mode=2&code=$code' style='background-color:#6AB649; color:white;'><b>상품 후기($review)</a></td>");
	}
	else {
		echo("<td align=center width=333 height=50 style='color:black; border:1px solid lightgray;'><a href='p-show.php?mode=2&code=$code' style='color:black;'>상품 후기($review)</a></td>");
	}
	if ($mode == 3){
		echo ("<td align=center width=333 height=50 style='background-color:#6AB649; color:white; border:1px solid lightgray;'><a href='p-show.php?mode=3&code=$code' style='background-color:#6AB649; color:white;'><b>배송/교환/반품</a></td></tr>");
	}
	else {
		echo("<td align=center width=333 height=50 style='color:black; border:1px solid lightgray;'><a href='p-show.php?mode=3&code=$code' style='color:black;'>배송/교환/반품</a></td></tr>");
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
			case 0:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from testboard where code='$code'", $con);
	   
				break;
			case 1:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from testboard where code='$code' order by hit desc", $con);
	   
				break;
			case 2:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from testboard where code='$code' order by hit asc", $con);
				break;
			case 3:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from testboard where code='$code' order by star desc", $con);
				break;
			case 4:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from testboard where code='$code' order by star asc", $con);
	   
				break;
}
$total = mysql_num_rows($result);
echo ("<table border=0 width=1000 style='border-collapse:collapse; margin-top:100px;'><tr><td align=right>");
if ($smode == 2){
	echo("
<a href='p-show.php?class=$class&smode=2&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>낮은조회순</a>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=2&mode=2&code=$code' style='color:black;'>낮은조회순</a>");
}
if ($smode == 1){
	echo("
<a href='p-show.php?class=$class&smode=1&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>높은조회순</a>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=1&mode=2&code=$code' style='color:black;'>높은조회순</a>");
}
if ($smode == 3){
	echo("
<a href='p-show.php?class=$class&smode=3&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>별점높은순</a>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=3&mode=2&code=$code' style='color:black;'>별점높은순</a>");
}
if ($smode == 4){
	echo("
<a href='p-show.php?class=$class&smode=4&mode=2&code=$code' style='font-size:20px; color:#2C9100;'>별점낮은순</a></td></tr>");
}
else {
echo("
<a href='p-show.php?class=$class&smode=4&mode=2&code=$code' style='color:black;'>별점낮은순</a></td></tr>");
}
echo ("
</table>
	<table border=0 width=1000 style='border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742;'>
	<tr class='b'><td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>번호</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>아이디</b></td>
	<td align=center width=150 style='border-bottom:0.5px solid lightgray;'></td>
	<td style='border-bottom:0.5px solid lightgray;'></td>
	<td align=center width=150 style='border-bottom:0.5px solid lightgray;'><b>날짜</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>조회</b></td>
	</tr>
");

if (!$total){
	echo("
		<tr><td colspan=5 align=center height=100 style='color:red;'>아직 등록된 글이 없습니다.</td></tr>
		<table style='margin-bottom:200px;'><tr><td></td></tr></table>
	");
} else {

	if   ($cpage=='') $cpage=1;    // $cpage -  현재 페이지 번호
	$pagesize = 5;                // $pagesize - 한 페이지에 출력할 목록 개수

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
				$t = $t . "&nbsp;";     // 답변 글의 경우 제목 앞 부분에 공백을 채움
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
		echo ("<a href=testboard.php?board=testboard&cblock=$pblock&cpage=$pstartpage><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	// 현재 블록에 속한 페이지 번호를 출력	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // 마지막 페이지를 출력했으면 종료함
	   if ($cpage==$i) {
	   echo ("<a href=p-show.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; border-radius:50px; color:white; padding:5px 10px 5px 10px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=p-show.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' id='b'>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=testboard.php?board=testboard&cblock=$nblock&cpage=$nstartpage<i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	echo ("</td></tr></table>");
}

mysql_close($con);
		echo("</td></tr>
	</table>");
	}
	if ($mode == 3 ){
		echo("<tr><td height=100></td></tr><tr><td colspan=3 style='color:#898989; border:0.5px solid lightgray; padding-left:50px;padding-bottom:50px; border-radius:10px;'><br><br><br><br><b>배송/반품/교환</b><br>
<br><font color=black><b>01. 배송기간</b></font><br>
<br>택배<br>
2일 후 발송 상품이 있는 주문 : 주문/결제완료 후 2일 뒤 발송<br>

냉장 / 냉동 상품이 있는 주문 : 주문/결제완료 후 다음날 발송<br>

상온 상품만 주문 : 주문/결제완료 후 다음날 발송<br>

고객인수는 발송일로부터 1~2일 소요<br>
1. 모든 상품을 한꺼번에 주문할 경우 배송기간은 2일 후 발송 > 저온 /냉동 > 상온 순서대로 신청됩니다.<br>

2. 결제방법에 따른 결제완료 시점 / 배송기간 산정<br>

<br>가상계좌 : 주문완료 후 발급받은 가상계좌로 입금 시 결제완료<br>
신용카드 / 실시간계좌이체 : 주문과 동시에 결제완료<br>

<br><font color=red>※ 토/일/공휴일 결제 완료 시 발송은 다음 평일부터 진행됩니다.<br>
</font>
<br>3. 별도 배송기간 안내가 있을 경우 별도 안내를 우선합니다.<br>

<br>명절 연휴, 법정 공휴일, 예약 상품, 업체(산지) 배송 상품, 이 외 배송관련 사전 알림이 있는 경우<br>
4. 배송기간 예외 사항<br>

<br>추가 배송기간 소요 : 일부 도서 / 산간 지역<br>
각 영업소 사정에 따른 배송지연은 배송기간에 포함하지 않음.<br>
초록배송<br>
마감시간 이전 주문: 주문/결제완료 후 당일 배송<br>

<br>1. 마감시간은 매장별로 다르며, 주문 시 이용가능시간이 안내됩니다.<br>
2. 초록배송은 배송받고자 하는 주소지 내 배송가능한 매장이 있을 경우 선택 가능합니다.<br>
3. 별도 배송기간 안내가 있을 경우 별도 안내를 우선합니다.<br><br><br>
<font color=black><b>02. 배송비</b></font><br><br>
40,000원 이상 무료배송 (40,000원 미만, 3,000원 별도 부과) 예외 사항<br>

<br>1. 일부 도서 / 산간지역은 추가 배송비 발생 (도선료 외)<br>
2. 업체배송은 업체별 별도 배송비 발생<br>
(주문 시 업체별 배송비 꼭! 확인하세요.)<br>

<br><font color=black><b>03. 배송지역</b></font><br>
전국배송 (일부 도서지역 / 택배불가 지역 제외)<br>

<br><font color=black><b>04. 반품/교환 유효기간</b></font><br>
제품에 이상이 있을 경우 교환/반품은 상품 수령일로부터 2일 이내입니다. (단, 유통기한이 넘지 않은 제품과 개봉하지 않은 제품만 가능)<br>
<font color=red>제품 이상이란?</font> 제품의 파손, 변질, 유통기한 경과, 이물질 혼입 등 상품에 중대한 결함이 발생한 경우를 지칭함.<br>
- 생식품/신선식품/냉동식품 : 상품수령 후 2일 이내<br>
- 상온상품 : 상품수령 후 7일 이내<br><br>
<font color=black><b>05. 반품/교환 배송비용</b></font><br><br>
고객 단순변심에 의한 교환/반품은 배송비가 고객부담입니다. (고객부담 배송비 6,000원 - 왕복배송비)<br>
(단, 신선식품(채소, 청과, 일부 신선가공식품) / 냉동식품은 고객변심으로인한교환/반품/환불 불가))<br>

<br><font color=red>고객 단순변심이란?</font><br>
- 개인 사정에 의한 부재로주문 상품을 미수령할 경우<br>
- 주문 상품에 대해 특별한 사유없이 취소 / 반품할 경우<br>
- [배송준비] 상태에서 주소변경 사유 등으로 취소하는 경우<br><br>
<font color=black><b>06. 취소/반품/교환 불가 사항</b></font><br><br>
1. 해당 상품이 포함된 주문건은 고객 단순변심에 의한 취소/교환/반품이 불가합니다.<br>
- 신선식품 : 채소, 청과, 일부 신선가공식품 (두부 / 빵 외)<br>
- 냉동식품<br>
- 예약상품 : 산지직송 상품, 주문제작 상품도 해당<br>

<br>2. [결제완료] 상태에서만 취소가 가능 합니다. (배송준비중/배송중 단계에는 불가)<br>
- 주문취소는 [배송준비중] 이전단계에 [주문내역]을 통해 직접처리 가능 (취소와 동시에 결제 취소)</td></tr>
	</table>");
	}

?>
<? include ("bot.php");?>