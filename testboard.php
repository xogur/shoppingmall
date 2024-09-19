<script src="https://kit.fontawesome.com/951ce4e933.js" crossorigin="anonymous"></script>
 <style>
		table {
				border-collapse:collapse;
				font-family: 'Dongle', sans-serif;
				
				}
				input {font-family: 'Dongle', sans-serif; font-size:18px;}
				select {font-family: 'Dongle', sans-serif; font-size:18px;}
		button {
				font-family: 'Dongle', sans-serif;
				
				padding:1px 10px 1px 10px;
				border:0px;
				
				}
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
        tr.a { border-bottom:1px solid;}
		tr.b {border-bottom:1px solid;
		border-top:1px solid;}
		.a:hover {border-radius:100px;
				color:white;
				background-color:#62A834;
				padding:5px 10px 5px 10px;
				}
		.b {
		width: 30 px;
		height: 30 px;
		overflow: hidden;
		position: relative;
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
	  a {text-decoration:none; color:black;}
	  
	.d:hover {text-decoration:underline;}
	.p {position:absolute;
	top:110px; width:0px;
	}
    </style>
<? include ("top.php");?>
<?
 
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
if($mode==2){
mysql_query("update testboard set star=0 where writer='admin'", $con);
$result = mysql_query("select * from testboard order by star asc", $con);
}
else{
	mysql_query("update testboard set star=6 where writer='admin'", $con);
$result = mysql_query("select * from testboard order by star desc", $con);
}

$total = mysql_num_rows($result);
echo("<center>");
echo("<hr style='width:500px; height:2px; position:relative; top:30px; right:360px; margin-top:150px;' color=#738B32>
		<hr style='width:500px; height:2px; position:absolute; top:135px; right:230px; margin-top:150px;' color=#738B32>
	<table border=0 width=1000>
	<tr><td colspan=2 align=center><h1>리뷰 게시판</h1></td></tr>
	<tr><td align=left valign=bottom height=150>
	<form method=post action=search.php?board=testboard> 
	<select name=field>
	<option value=writer>아이디</option>
	<option value=topic>제목</option>
	<option value=content>내용</option>
	</select>
	검색어<input type=text name=key size=13 class='l'>
	<button style='background-color:white; position:absolute; top:285px; margin-top:150px;' class='p'><i class='fa-sharp fa-solid fa-magnifying-glass' style='font-size:18px;'></i></button>
	</td>");
	if($mode==2){
		echo("
	<td align=right valign=bottom><a href='testboard.php?mode=1' style='color:black;'>별점높은순</a>&nbsp;&nbsp;<a href='testboard.php?mode=2' style='color:#2C9100;'><b>별점낮은순</b></a></td>
	");
	}
	else {
		echo("
	<td align=right valign=bottom><a href='testboard.php?mode=1' style='color:#2C9100;'><b>별점높은순</b></a>&nbsp;&nbsp;<a href='testboard.php?mode=2' style='color:black;'>별점낮은순</a></td>
	");
	}
	echo("
	</form>
	
	</table>
	<table border=0 width=1000 style='border-top:4px solid #97B742; border-collapse:collapse; border-bottom:4px solid #97B742;'>
	<tr><td align=center width=50 style='border-bottom:0.5px solid lightgray;'><b>번호</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'><b>아이디</b></td>
	<td align=center width=100 style='border-bottom:0.5px solid lightgray;'></td>
	<td align=center width=300 style='border-bottom:0.5px solid lightgray;'></td>
	<td align=center width=150 style='border-bottom:0.5px solid lightgray;'><b>날짜</b></td>
	<td align=center width=50 style='border-bottom:0.5px solid lightgray;'><b>조회</b></td>
	</tr>
");

if (!$total){
	echo("
		<tr><td colspan=5 align=center>아직 등록된 글이 없습니다.</td></tr>
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
		$i = 0;
		if($writer != 'admin'){
		$subresult = mysql_query("select * from product where code='$code'", $con);
		$userfile=mysql_result($subresult,0,"userfile");
		}
		if   ($space>0) {
			for ($i=0 ; $i<=$space ; $i++)
				$t = $t . "&nbsp;";     // 답변 글의 경우 제목 앞 부분에 공백을 채움
		}
		if ($writer == 'admin'){
			if ($filename and $filesize):
			if ($to>0):
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><i class='fa-regular fa-bell' style='font-size:20px; color:red;'></i>&nbsp<font color=red>&nbsp&nbsp[공지]</font></td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'><font color=red>$topic&nbsp;[$to]</font></a>&nbsp;<i class='fa-sharp fa-solid fa-floppy-disk' style='color:#97B742;'></i></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><i class='fa-regular fa-bell' style='font-size:20px; color:red;'></i><font color=red>&nbsp&nbsp[공지]</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'><font color=red>$topic&nbsp;</a><i class='fa-sharp fa-solid fa-floppy-disk' style='color:#97B742;'></i></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
				endif;
		else:
			if ($to>0):
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><i class='fa-regular fa-bell' style='font-size:20px; color:red;'></i><font color=red>&nbsp&nbsp[공지]</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'><font color=red>$topic&nbsp;[$to]</a></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><i class='fa-regular fa-bell' style='font-size:20px; color:red;'></i><font color=red>&nbsp&nbsp[공지]</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'><font color=red>$topic</a></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			endif;
		endif;
		}
		else {
		if ($filename and $filesize):
			if ($to>0):
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150 style='border-radius:10px;'></img></td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'>$topic&nbsp;[$to]</a>&nbsp;<i class='fa-sharp fa-solid fa-floppy-disk' style='color:#97B742;'></i></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150 style='border-radius:10px;'></img></td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'>$topic&nbsp;</a><i class='fa-sharp fa-solid fa-floppy-disk' style='color:#97B742;'></i></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
				endif;
		else:
			if ($to>0):
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150 style='border-radius:10px;'></img></td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'>$topic&nbsp;[$to]</a></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr><td align=center width=150 height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$id<br><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$writer</td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><img src=./pds/$userfile width=100 height=150 style='border-radius:10px;'></img></td>
					<td align=left height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'><a href='testboard-content.php?board=testboard&id=$id&cblock=$cblock&ccpage=$cpage' class='d'>$topic</a></td>
					<td align=center height=150 style='padding:20 0 20 0; border-bottom:0.5px solid lightgray;'>$wdate</td><td align=center style='border-bottom:0.5px solid lightgray;'>$hit</td>
					</tr>
					");
			endif;
		endif;
		}
		$counter = $counter + 1;
	endwhile;

	echo("</table>");
if ($UserID == 'admin'){
echo ("<table border=0 width=900 style='margin-bottom:150px;margin-top:20px;'>
		  <tr><td align=right nowrap><a href='shop-input.php' color=black><i class='fa-solid fa-bullhorn' style='color:#FF860D; font-size:20px;'></i>&nbsp공지쓰기</a></td></tr></table>");
}
	echo ("<table border=0 width=700 style='margin-bottom:150px;margin-top:100px;'>
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
	   echo ("<a href=testboard.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; border-radius:50px; color:white; padding:5px 10px 5px 10px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=testboard.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' id='b' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// 다음 블록의 시작 페이지가 전체 페이지 수보다 작으면 [다음블록] 버튼 활성화  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=testboard.php?board=testboard&cblock=$nblock&cpage=$nstartpage><i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	echo ("</td></tr></table>");
}

mysql_close($con);

?>
<? include ("bot.php");?>