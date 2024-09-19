<script language='Javascript'>
	function go_zip(){
		window.open('zipcode2.php', 'zipcode',   'width=470, height=180, scrollbars=yes');
	}
</script>
<style>
.submit{
		background:#57A621;
		color: white;
		border-radius:5px;
		font-size:14px;
		border:none;
		
		}
		.submit:hover {border-radius:5px;
				color:white;
		background-color:#2D6F01;
		}
input[type=text] { 
      border: none;
	  background: lightgray;
      /*기본으로 가지고 있던 검정테두리를 없앰*/ 
      border-bottom: 1px solid black; 
      /*새로운 테두리를 밑부분만 생성 (선두께, 선모양, 선색깔)*/
      background: none; 
      /*기본으로 가지고 있던 배경색를 없앰*/
      font: 14px;
	  
      /* 글씨의 모양을 바꿈 (크기, 폰트종류)*/
	  }
#butsize {
	width:100;
	height:50;
}
</style>
<? include ("top.php");?>


<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// 전체 쇼핑백 테이블에서 특정 사용자의 구매 정보만을 읽어낸다
$result = mysql_query("select * from orderlist where session='$Session' and wdate='$buydate'", $con);
$total = mysql_num_rows($result);
echo("
<center>
<table width=1000 border=0 style='margin-top:100px;'>
<tr><td valign=top align=center height=100><font size=6><b>구매해 주셔서 감사합니다.</b></td></tr>
<tr><td align=left><font size=2><b>$UserName</b>님의 구입 목록 <font size=4 color=red>$total</font> 개</td>
</table>");
echo ("
	<table border=0 width=1000 style='border-collapse:collapse;'>
    <tr><td width=100 align=center style='border-top:2px #58A426 solid;'><font size=2>상품사진</td>
	<td width=300 align=center style='border-top:2px #58A426 solid;'><font size=2>상품이름</td>
	<td width=90 align=center style='border-top:2px #58A426 solid;'><font size=2>가격(단가)</td>
	<td width=50 align=center style='border-top:2px #58A426 solid;'><font ssize=2>수량</td>
	<td width=100 align=center style='border-top:2px #58A426 solid;'><font size=2>품목별합계</td></tr>
	");

if (!$total) {
     echo("<tr><td colspan=5 align=center><font   size=2><b>쇼핑백에 담긴 상품이   없습니다.</b>
        </font></td></tr></table>");
} else {

    $counter=0;
    $totalprice=0;    // 총 구매 금액  

    while ($counter < $total) :
		$pcode = mysql_result($result, $counter, "pcode");
		$quantity = mysql_result($result, $counter, "quantity");
      
		$subresult = mysql_query("select * from product where code='$pcode'", $con);
		$userfile = mysql_result($subresult, 0, "userfile");
		$pname = mysql_result($subresult, 0, "name");
		$price = mysql_result($subresult, 0, "price2");
       
		$subtotalprice = $quantity * $price;
		$totalprice = $totalprice + $subtotalprice; 
	 
		echo("<tr><td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><a href=#   onclick=\"window.open('./pds/$userfile', '_new', 'width=450, height=450')\"><img src='./pds/$userfile' width=100 height=150 border=0></a></td>
			<td align=left style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3><a href=p-show.php?code=$pcode style='text-decoration:none; color:black; font-size:18px;'>$pname</a></td>
			<td align=right style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3>$price&nbsp;원</td>
			<td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3>$quantity&nbsp;개</td>
			<td align=right style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3 color=red><b>$subtotalprice&nbsp;</b>원</td></tr>");

		$counter++;

    endwhile;
	$totalprice=$totalprice-$usepoint;
	if($totalprice < 20000){
		$totalprice = $totalprice + 3000;
	}
	$totalprice2=$totalprice2-$usepoint;
     echo("<form method=post action=buy.php?totalprice2=$totalprice2>

	 <tr><td colspan=5 align=right><font size=2>총 구매 금액(배송비 포함): <font size=4>$totalprice</font> 원</td></tr></table></form>");
}
$orderresult = mysql_query("select * from receivers where session='$Session' and buydate='$buydate'", $con);
$phone = mysql_result($orderresult,0, "phone");
$receiver = mysql_result($orderresult,0, "receiver");
$address=mysql_result($orderresult,0, "address");
$message=mysql_result($orderresult,0, "message");

echo("
    <br><br>
	<table width=1000 border=0>
	<tr><td><font size=5><b>배송정보</b></td></tr>
	</table>

	<table width=1000 border=0 style='margin-bottom:0px; border-top:2px #58A426 solid;  border-spacing: 30px; border-collapse: separate;'>
	<tr><td align=left width=200 style='border-right:1px lightgray solid;'><font size=2>● &nbsp;&nbsp;<font size=4>주문자</font></td>
	<td>$UserName</td>
	</tr>
	<tr>
	<td align=left style='border-right:1px lightgray solid;'><font size=2>● &nbsp;&nbsp;<font size=4>전화번호</font></td>
	<td>$phone</td>
	</tr>
	<tr><td height=30 align=left style='border-right:1px lightgray solid;'><font size=2>● &nbsp;&nbsp;<font size=4>배송지</font></td>
	<td align=left>$address</td>
	<tr><td align=left style='border-right:1px lightgray solid;'><font size=2>● &nbsp;&nbsp;<font size=4>주문요구사항</font></td>
	<td>$message</td></tr>
	<tr><td align=center valign=bottom colspan=2 height=200 style='border-top:2px #58A426 solid;'>
	</tr>
	</table>
	
	</center>
	
	<center>
	
	<h1 style='margin-bottom:130px;'><font size=5>5초 뒤 자동으로 초기화면으로 돌아갑니다.</font><h1>
	<meta http-equiv='Refresh' content='5; url=home.php'>
");
mysql_close($con);	//데이터베이스 연결해제
?>
<? include ("bot.php");?>