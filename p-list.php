<style>
a {text-decoration:none;}
button:hover {border-radius:100px;
				color:white;
				background-color:#62A834;
				padding:5px 10px 5px 10px;
				}
button {
				padding:5px 10px 5px 10px;
				border:0px;
				color:#62A834;
				background-color:white;
				}
</style>
<? include ("top.php");?>
<?						
if($class==0){
echo ("<img src='./pds/전체.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==1){
echo ("<img src='./pds/과일.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==2){
echo ("<img src='./pds/채소.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}

if($class==3){
echo ("<img src='./pds/곡류.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==4){
echo ("<img src='./pds/서류.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==5){
echo ("<img src='./pds/원예식물.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==6){
echo ("<img src='./pds/장류.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==7){
echo ("<img src='./pds/정육.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
if($class==8){
echo ("<img src='./pds/전체.png' style='position:absolute; top:-50px; left:0; z-index:1;' width=1720 height=400></img>");
}
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	   
if (!isset($class)) $class=0;

switch($class) {
   case 0:        // 초기화면에 출력할 인기 상품 목록
       $result = mysql_query("select * from product", $con);
	   switch($mode) {
			case 0:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product", $con);
	   
				break;
			case 1:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product order by hit desc", $con);
	   
				break;
			case 2:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product order by price2 asc", $con);
	   
				break;
			case 3:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product order by price2 desc", $con);
	   
				break;
			case 4:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product order by review desc", $con);
	   
				break;
}
	   
		break;
   default:       // 카테고리별 메뉴 화면에 출력할 상품 목록
       $result = mysql_query("select * from product where class=$class", $con);
	   switch($mode) {
			case 0:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product where class=$class", $con);
	   
				break;
			case 1:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product where class=$class order by hit desc", $con);
	   
				break;
			case 2:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product where class=$class order by price2 desc", $con);
	   
				break;
			case 3:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product where class=$class order by price2 asc", $con);
	   
				break;
			case 4:        // 초기화면에 출력할 인기 상품 목록
				$result = mysql_query("select * from product where class=$class order by review desc", $con);
	   
				break;
}
		break;
}

$total = mysql_num_rows($result);
echo ("<center><table border=0 width=1200 style='margin-top:300px; margin-left:200px; border-bottom:2px solid #97B742;'><tr>
		<td align=right>
		");
if ($mode == 2){
	echo("
<a href='p-list.php?class=$class&mode=2' style='font-size:20px; color:#2C9100;'>낮은가격</a>");
}
else {
echo("
<a href='p-list.php?class=$class&mode=2' style='color:black;'>낮은가격</a>");
}
if ($mode == 3){
	echo("
<a href='p-list.php?class=$class&mode=3' style='font-size:20px; color:#2C9100;'>높은가격</a>");
}
else {
echo("
<a href='p-list.php?class=$class&mode=3' style='color:black;'>높은가격</a>");
}
if ($mode == 4){
	echo("
<a href='p-list.php?class=$class&mode=4' style='font-size:20px; color:#2C9100;'>리뷰순</a>");
}
else {
echo("
<a href='p-list.php?class=$class&mode=4' style='color:black;'>리뷰순</a>");
}
if ($mode == 1){
	echo("
<a href='p-list.php?class=$class&mode=1' style='font-size:20px; color:#2C9100;'>조회순</a></td></tr>");
}
else {
echo("
<a href='p-list.php?class=$class&mode=1' style='color:black;'>조회순</a></td></tr>");
}
echo ("<center><table border=0 width=1200 style='margin-bottom:50px; margin-left:200px;'><tr>");

if (!$total){
	echo ("<td align=center><font color=red>아직 등록된 상품이 없습니다</td>");
} else {
if   ($cpage=='') $cpage=1;    // $cpage -  현재 페이지 번호
	$pagesize = 2;                // $pagesize - 한 페이지에 출력할 목록 개수

	$totalpage = (int)($total/10);
	if (($total%10)!=0) $totalpage = $totalpage + 1;
	$counter = 0;
	$subcounter = 0;

	while ($counter < $total && $counter < 15 && $subcounter < $pagesize) :
	$newcounter=($cpage-1)*10+$counter;
	if ($newcounter == $total) break;
		if ($newcounter > 0 && ($newcounter % 5) == 0){ 
		$subcounter = $subcounter + 1;
		if ($subcounter >= $pagesize){
			break;
		}
		else if(($newcounter%10) != 0){
			echo ("</tr><tr><td colspan=5><hr size=1 color=#97B742 width=100%></td></tr><tr>");
			}
		}
		$code=mysql_result($result,$newcounter,"code");
		$name=mysql_result($result,$newcounter,"name");
		$userfile=mysql_result($result,$newcounter,"userfile");
		$fileexplain=mysql_result($result,$newcounter,"fileexplain");
		$price2=mysql_result($result,$newcounter,"price2");
		$review=mysql_result($result,$newcounter,"review");
		

		switch(strlen($price2)) {
		  case 6: 
			 $price2 = substr($price2, 0, 3) . "," . substr($price2, 3, 3);
			 break;
		  case 5:
			 $price2 = substr($price2, 0, 2) . "," . substr($price2, 2, 3);
			 break;
		  case 4:
			 $price2 = substr($price2, 0, 1) . "," . substr($price2, 1, 3);
			 break;		   
		}
		
		echo ("<td width=135 align=left style='padding:60px 20px 60px 20px;'><a href=p-show.php?code=$code style='ccolor:black;'> <img src='./pds/$userfile' width=200 height=250 border=0 style='border-radius:10px;'><br><br><font color=blue style='text-decoration:none; font-size:10pt; color:black;'>$name</a></font><br><br>");
		echo ("<font color=black size=3><b>$price2&nbsp;원</font><br><font color=black size=2><b>리뷰 ($review)</font></td>");

		$counter++;
	endwhile;


}
echo ("</tr></table>");
echo ("<table border=0 width=700 style='margin-bottom:200px;'>
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
		echo ("<a href=p-list.php?board=testboard&cblock=$pblock&cpage=$pstartpage&class=$class&mode=$mode><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:#B1CB6D;'></i></a> ");

	// 현재 블록에 속한 페이지 번호를 출력	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // 마지막 페이지를 출력했으면 종료함
	   if ($cpage==$i) {
	   echo ("<a href=p-list.php?board=testboard&cblock=$cblock&cpage=$i&class=$class&mode=$mode><button style='background-color:#62A834; border-radius:100px; color:white;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=p-list.php?board=testboard&cblock=$cblock&cpage=$i&class=$class&mode=$mode><button class='a' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=p-list.php?board=testboard&cblock=$nblock&cpage=$nstartpage&class=$class&mode=$mode><i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:#B1CB6D;'></i></a> ");

	echo ("</td></tr></table>");
   
mysql_close($con);

?>
<font style="position:absolute; bottom:400px; right:1400px; color:#31A500;" size=6><b>카테고리</b></font>
<hr width=300 style="height: 5px;background:#3F8113; position:absolute; bottom:380px;"></tr>
<?
echo ("<table border=0 width=300 height=400 style='position:absolute; bottom:-20px;'>");
if ($class == 0){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=0' style='color:#3F8113;'><b>전체&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=0' style='color:#62A834;'>전체</td></tr>");
}
if ($class == 1){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=1' style='color:#3F8113;'><b>과일&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=1' style='color:#62A834;'>과일</td></tr>");
}
if ($class == 2){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=2' style='color:#3F8113;'><b>채소&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=2' style='color:#62A834;'>채소</td></tr>");
}
if ($class == 3){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=3' style='color:#3F8113;'><b>곡류&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=3' style='color:#62A834;'>곡류</td></tr>");
}
if ($class == 4){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=4' style='color:#3F8113;'><b>서류&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=4' style='color:#62A834;'>서류</td></tr>");
}
if ($class == 5){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=5' style='color:#3F8113;'><b>화장품·생활용품&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=5' style='color:#62A834;'>화장품·생활용품</td></tr>");
}
if ($class == 6){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=6' style='color:#3F8113;'><b>장류·소스류&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=6' style='color:#62A834;'>장류·소스류</td></tr>");
}
if ($class == 7){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=7' style='color:#3F8113;'><b>정육·계란류&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=7' style='color:#62A834;'>정육·계란류</td></tr>");
}
if ($class == 8){
	echo ("<tr><td align=center style='font-size:20px;'><a href='p-list.php?class=8' style='color:#3F8113;'><b>기타&nbsp;&nbsp;<i class='fa-solid fa-caret-left' style='color:#3F8113; font-size:25px;'></i></b></td></tr>");
}
else {
	echo ("<tr><td align=center><a href='p-list.php?class=8' style='color:#62A834;'>기타</td></tr>");
}
		
?>
<? include ("bot.php");?>
