<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
a {text-decoration:none;}
button.material:hover {
				color:white;
				background-color:#4E654E;
				padding:5px 10px 5px 10px;
				}
button.material {
				padding:5px 10px 5px 10px;
				border:0px;
				color:white;
				background-color:#6C8B6C;
				}
button.cook{background-color:#2D8A2D;
color:white;
border-radius:5px;
border:none;
width:50px;
height:50px;
}
</style>
<? include ("top.php");?>
<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
$result = mysql_query("select * from recipe where menu='$menu'", $con);
$subresult = mysql_query("select * from product where recipe='$menu'", $con);
$total = mysql_num_rows($subresult);
$menu=mysql_result($result,0,"menu");
$img=mysql_result($result,0,"img");
$produce=mysql_result($result,0,"produce");
$how=mysql_result($result,0,"how");
$material=mysql_result($result,0,"material");
if ($menu == 채개장){
	$submenu ="chaegaejang";
}
if ($menu == 참외솜땀 ){
	$submenu ="somddam";
}
if ($menu == 자두비빔국수){
	$submenu ="jadubibim";
}
if ($menu == 토마토달걀볶음){
	$submenu ="tomatoegg";
}
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-top:100px; border-collapse:separate; border-spacing:40px; border-radius:10px; '>
    <tr><td width=400 align=center rowspan=2 style='padding:30 50 30 50px; border-right:0.5px solid lightgray;'>
	<a href=# onclick=\"window.open('./pds/$img', '_new', 'width=450, height=480')\"><img src='./pds/$img' width=400 height=300 border=0 style='border-radius:10px;'></a></td>
	<td align=left colspan=2 height=100 style='border-bottom:0.5px solid lightgray; font-size:30px;'>$menu<br><br>
	");
	$likeresult = mysql_query("select * from member where uid='$UserID'", $con);
	$heartresult = mysql_query("select heart from recipe where menu='$menu'", $con);
	$like=mysql_result($likeresult,0,"$submenu");
	$heart=mysql_result($heartresult,0,"heart");
	echo("<form action='like-pass.php?heart=$like&submenu=$submenu&menu=$menu' method=post name=comma>");
	if ($like == 0 or !$like){
		echo("
	<button style='background-color:white; border:none;'><font size=4><i class='fa-regular fa-heart'>&nbsp;like&nbsp;($heart)</i></button></td>
	</tr>");
	}
	if($like == 1){
		echo("
	<button style='background-color:white; border:none;'><font size=4><i class='fa-solid fa-heart' style='color:red'>&nbsp;like&nbsp;($heart)</i></button></td>
	</tr>");
	}
	
echo("</form>
	<tr><td width=45 valign=top><button class='cook'>요리<br>재료</button></td><td valign=top>$material</td></tr></table>");
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-top:50px;'>
	<tr><td align=left height=50>관련상품</td></tr>");
echo ("<center><table border=0 width=1100 style='margin-bottom:10px; border-top:4px solid #97B742; border-bottom:0.5px solid lightgray;'><tr>");
if   ($cpage=='') $cpage=1;    // $cpage -  현재 페이지 번호
	$pagesize = 2;                // $pagesize - 한 페이지에 출력할 목록 개수

	$totalpage = (int)($total/16);
	if (($total%16)!=0) $totalpage = $totalpage + 1;
	$counter = 0;
	$subcounter = 0;

	while ($counter < $total && $counter < 20 && $subcounter < $pagesize) :
	$newcounter=($cpage-1)*16+$counter;
	if ($newcounter == $total) break;
		if ($newcounter > 0 && ($newcounter % 8) == 0){ 
		$subcounter = $subcounter + 1;
		if ($subcounter >= $pagesize){
			break;
		}
		else if(($newcounter%16) != 0){
			echo ("</tr><tr><td colspan=5><hr size=1 color=green width=100%></td></tr><tr>");
			}
		}
		$name=mysql_result($subresult,$newcounter,"name");
		$price=mysql_result($subresult,$newcounter,"price2");
		$userfile=mysql_result($subresult,$newcounter,"userfile");
		$review=mysql_result($subresult,$newcounter,"review");
		$code=mysql_result($subresult,$newcounter,"code");
		
		echo ("<td width=135 height=300 align=center style='padding:20px 5px 20px 5px;'><a href=p-show.php?code=$code style='ccolor:black;'> <img src='./pds/$userfile' width=100 height=120 border=0 style='border-radius:10px;'><br><font color=blue style='text-decoration:none; font-size:10pt; color:black;'></font><br><br><font color=blue style='text-decoration:none; font-size:10pt; color:black;'>$name</a></font><br>");
		echo ("<font color=black size=2><b>$price&nbsp;원</font><br><font color=black size=2><b>리뷰 ($review)</font></td>");
		$counter++;
	endwhile;
echo ("</tr></table>");
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-bottom:50px;'>
	<tr><td align=right height=50><button class='material'><a style='color:white;' href=tobag.php?menu=$menu><i class='fa-solid fa-cart-shopping' style='color:white; font-size:10px;'></i>&nbsp&nbsp재료 한 번에 담기</a></button></td></tr></table>");
if($menu == 채개장){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>″</font><br>
	<font size=4 color=#93B340><b>고기 없는 육개장</font><br><br>
<font size=6><b>채개장</b></font><br><br>
<font size=3 color=#8B8B8B>가볍지만 든든한 요리를 찾는다면 채개장이 어떨까요? 고기를 넣지 않은 비건 육개장이에요.<br>
채소와 버섯을 듬뿍 넣고 끓어 맛이 깔끔하고 개운하죠.<br>
칼칼하고 얼큰한 국물 덕분에 한 그릇 먹고 나면 땀이 쭉 나는 보양식이에요.<br><br><font style='font-size:100px; color:lightgray;'>″</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style=' margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>이렇게 만드세요</font><br><br>
	<font style='font-size:14px;'>
1.</b>볼에 분량의 양념 재료를 섞어 양념장을 만들어 주세요.<br><br>
<b>2.</b> 무는 0.5cm 두께로 나박 썰고, 양파는 1cm 두께로 채 썰어 주세요. 대파는 6~7cm 길이로 길게 썰어 주세요.<br><br>
<b>3.</b> 버섯과 청경채, 고사리는 먹기 좋게 다듬고, 숙주는 깨끗이 씻어 물기를 제거해 주세요.<br><br>
<b>4.</b> 냄비에 물을 붓고 다시마를 넣은 후 끓이다가 다시마는 건져내고, 청경채를 제외한 채소를 넣고 끓여 주세요.<br><br>
<b>5.</b> 국물에 양념장을 넣고 잘 섞은 후 1시간가량 끓이다가 청경채를 넣어 주세요.<br><br>
<b>6.</b> 소금으로 간을 맞춘 후 한소끔 끓여 주면 완성됩니다.</td></tr></table>");
}
if($menu == 토마토달걀볶음){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>″</font><br>
	<font size=4 color=#93B340>보드라운 달걀과 상큼한 토마토의 만남</font><br><br>
<font size=6><b>토마토달걀볶음</b></font><br><br>
<font size=3 color=#8B8B8B>쉽고 간단하게 중식의 맛을 낼 수 있는 '토달볶'입니다.<br>
달걀과 토마토에 굴소스가 배어들어 짭쪼름하면서도 고소한 맛이 일품이죠.<br>
다이어트 요리로도 제격이니 반복되는 다이어트 식단에 지쳐있다면 시도해보세요!<br><br><font style='font-size:100px; color:lightgray;'>″</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style=' margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>이렇게 만드세요</font><br><br>
	<font style='font-size:14px;'>
1.</b> 토마토는 깨끗이 씻어 꼭지를 제거한 후 6등분 하고, 쪽파는 4cm 길이로 썰어 주세요.<br><br>
<b>2.</b> 볼에 달걀을 깨 넣고 굴소스를 더해 골고루 풀어 주세요.<br><br>
<b>3.</b> 달군 프라이팬에 식용유를 두른 후 다진 생강, 마늘, 파를 넣고 볶아 주세요.<br><br>
<b>4.</b> ③에 향이 나기 시작하면 토마토를 넣고 볶아 주세요.<br><br>
<b>5.</b> 토마토가 반 정도 익으면 불을 줄이고 달걀을 넣어 스크램블한 후 마지막에 쪽파를 넣고 한번 섞어 주세요.<br><br>
<b>6.</b> ⑤를 그릇에 담고 후춧가루(통후추를 그라인더에 갈아 사용하세요)를 뿌려 주세요.</td></tr></table>");
}
if($menu == 참외솜땀){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>″</font><br>
	<font size=4 color=#93B340>새콤하고 짭조름한 태국식 샐러드</font><br><br>
<font size=6><b>참외솜땀</b></font><br><br>
<font size=3 color=#8B8B8B>솜땀은 그린파파야로 만든 태국식 샐러드를 말해요.<br>
특별하게 파파야 대신 참외를 활용해 솜땀을 만들어보세요.<br>
참외의 달콤함과 마늘, 고추의 매콤한 맛, 라임의 상큼함, 피시 소스의 짭짤한 맛을 동시에 느낄 수 있는 이국적인 샐러드예요.<br><br><font style='font-size:100px; color:lightgray;'>″</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style=' margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>이렇게 만드세요</font><br><br>
	<font style='font-size:14px;'>
1.</b> 깨끗이 씻은 참외는 꼭지 부분과 씨를 제거한 후 0.5cm 두께로 채썰어주세요. 당근도 0.5cm 두께로 채썰고, 방울토마토는 꼭지를 뗀 후 반으로 썰고, 고수는 잎만 떼어내 준비해 주세요.<br><br>
<b>2.</b> 마늘과 베트남고추, 건새우, 땅콩은 굵게 다져 주세요.<br><br>
<b>3.</b> 라임은 반으로 잘라 즙을 짜 주세요.<br><br>
<b>4.</b> 볼에 피시 소스, 설탕, 라임즙 3큰술을 넣고 골고루 섞은 후 ①, ②를 넣고 버무려 주세요.<br><br>
</td></tr></table>");
}
if($menu == 자두비빔국수){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>″</font><br>
	<font size=4 color=#93B340><b>새콤 달콤 매콤하게 입 안을 채워주는</font><br><br>
<font size=6><b>자두비빔국수</b></font><br><br>
<font size=3 color=#8B8B8B>주말 별식에 비빔국수가 빠질 수 없죠.<br>
매콤한 양념장에 면을 훌훌 비벼 먹으면 한 주의 스트레스가 풀린답니다.<br>
아삭하고 시원한 오이와 새콤한 김치, 달콤한 제철 과일 자두로 고추장 양념에 감칠맛을 더해줬어요.<br><br><font style='font-size:100px; color:lightgray;'>″</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style='margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>이렇게 만드세요</font><br><br>
	<font style='font-size:14px;'>
1.</b> 국수는 끓는 물에 3~4분간 삶은 후 찬물에 헹궈 물기를 꼭 짜 주세요.<br><br>
<b>2.</b> 자두는 슬라이스하고, 오이는 가늘게 채 썰어 주세요. 김치는 물기를 제거하고 굵게 다져 주세요.<br><br>
<b>3.</b> 분량의 고추장, 설탕, 식초를 섞어 양념장을 만들어 주세요.<br><br>
<b>4.</b> 그릇에 ①의 국수를 담고 ③의 양념장을 올린 후 자두, 오이, 김치, 삶은 달걀을
곁들여 주세요. 마지막에 통깨를 솔솔 뿌려 주세요.
</td></tr></table>");
}
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-bottom:50px;'>
	<tr><td align=right height=50><button class='material' width=400 height=300><a style='color:white;' href=recipe.php>&nbsp&nbsp<i class='fa-solid fa-scroll' style='font-size:30px;'></i>&nbsp&nbsp<font size=5>다른 레시피 보러가기</a></button></td></tr></table>");
?>
<? include ("bot.php");?>