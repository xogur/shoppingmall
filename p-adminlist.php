<style>

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
.l { 
      border: none;
	  background: #000;
      /*기본으로 가지고 있던 검정테두리를 없앰*/ 
      border-bottom: 1px solid black; 
      /*새로운 테두리를 밑부분만 생성 (선두께, 선모양, 선색깔)*/
      background: none; 
      /*기본으로 가지고 있던 배경색를 없앰*/
      font: 14px;
      /* 글씨의 모양을 바꿈 (크기, 폰트종류)*/
	  }
</style>
<? include ("top.php");?>
<center>
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
$result = mysql_query("select * from product", $con);
if($field and $key){
$result = mysql_query("select * from product where $field like '%$key%'", $con);
}
$total = mysql_num_rows($result);
echo("<table border=0 width=1000 style='margin-top:200px;'><tr><td align=left>
	<form method=post action=p-adminlist.php?field=$field&key=$key> 
	<select name=field>
	<option value=code>코드</option>
	<option value=name>상품명</option>
	</select>
	검색어<input type=text name=key size=13 class='l'>
	<input type=submit value='' style='background-color:white; border:none; position:absolute; top:145px; margin-top:150px; opacity: 0;'><i class='fa-sharp fa-solid fa-magnifying-glass' style='font-size:18px;'></i></input>
	</td></tr></form>");
echo ("<table border=0 width=1000 style=' margin-bottom:50px; border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742;'>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;' height=50><font size=3><b>상품코드</td>
	<td colspan=2 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>상품명</td>
	<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>권장가격</td>
	<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>판매가격</td>
	<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>수정/삭제</td></tr>");
							
if (!$total) {

  echo("<tr><td colspan=6 align=center>아직 등록된 상품이 없습니다</td></tr>");

} else {
if   ($cpage=='') $cpage=1;    // $cpage -  현재 페이지 번호
	$pagesize = 5;                // $pagesize - 한 페이지에 출력할 목록 개수

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

	$counter = 0;

	while ($counter < $pagesize) :
	$newcounter=($cpage-1)*$pagesize+$counter;
		if ($newcounter == $total) break;

		$code=mysql_result($result,$newcounter,"code");
		$name=mysql_result($result,$newcounter,"name");
		$userfile=mysql_result($result,$newcounter,"userfile");
		$price1=mysql_result($result,$newcounter,"price1");
		$price2=mysql_result($result,$newcounter,"price2");

		echo ("
		   <tr><td width=100 align=center style='border-bottom:0.5px solid lightgray;'><font size=3>$code</td>
			 <td align=center width=30 style='border-bottom:0.5px solid lightgray; padding:20 0 20 0;'><img src=./pds/$userfile width=100 height=100 border=0 style='border-radius:10px;'></td>
			   <td width=350 align=left style='border-bottom:0.5px solid lightgray;'><a href=p-show.php?code=$code style='color:black;'><font size=3>$name</a></td>
			   <td align=right width=70 style='border-bottom:0.5px solid lightgray;'><font size=3><strike>$price1&nbsp;원</strike></td>
			   <td align=right width=70 style='border-bottom:0.5px solid lightgray;'><font size=3>$price2&nbsp;원</td>
			   <td width=70 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><a href=p-modify.php?code=$code>수정</a>/<a href=p-delete.php?code=$code>삭제</a></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");
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
		echo ("<a href=p-adminlist.php?board=testboard&cblock=$pblock&cpage=$pstartpage><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:#B1CB6D;'></i></a> ");

	// 현재 블록에 속한 페이지 번호를 출력	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // 마지막 페이지를 출력했으면 종료함
	   if ($cpage==$i) {
	   echo ("<a href=p-adminlist.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; color:white; border-radius:100px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=p-adminlist.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=p-adminlist.php?board=testboard&cblock=$nblock&cpage=$nstartpage><i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:#B1CB6D;'></i></a> ");

	echo ("</td></tr></table>");

	     
mysql_close($con);

?>
<? include ("bot.php");?>