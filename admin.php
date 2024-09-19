<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
a.logo {position:relative;}
.lg:hover {opacity: 0;
  transition: 0.5s;
  font {z-index:1;}
				}

</style>
<? include ("top.php");?>
<center>
<table border=0 width=500 style="margin-top:100px; font-size:25px;">
<tr><td align=center><b>관리 메뉴</b></td></tr>
</table>
<table border=0 width=1000 style="margin-bottom:200px; margin-top:100px;">
<tr><td width=140 align=center rowspan=3 height=440 style="background-color:#91CE54;"><font size=4 style="position:relative; top:-100;" color=white><b>회 원 관 리</b></font><br><a href=membershow.php class="a" style="color:white;"><img class="lg" src="회원목록.png" style="position:relative; width:150; height:150; border-radius:100px; left:60; z-index:2;"></img><font size=3.5 style="position:relative; right:70; bottom:70; z-index:1;"><b>회원 목록 조회</a></td>
      <td width=40>&nbsp;</td>
      <td width=140 align=center rowspan=2 style="background-color:#9CBD46;"><font size=4 style="position:relative; top:-20;" color=white><b>상 품 관 리</b><br><a href=p-input.php class="a" style="color:white;"><img src="상품관리.png" class="lg" style="position:relative; width:150; height:150; border-radius:100px; left:60; top:20; z-index:2;"></img></font><font size=4 style="position:relative; right:70; bottom:70; z-index:1;"><b>신규상품등록</a></td>
	<td width=40>&nbsp;</td>
	<td width=140 align=center rowspan=3 style="background-color:#91CE54;"><font size=4 style="position:relative; top:-100; right:0;" color=white><b>주 문 관 리</b></font><br><a href=orderlist.php class="a" style="color:white;"><img src="주문내역조회.png" class="lg" style="position:relative; width:150; height:150; border-radius:100px; left:55; top:0; z-index:2;"></img><font size=2 size=4 style="position:relative; right:70; bottom:70; z-index:1; font-size:16px;"><b>주문 내역 조회</a></td>
</tr>
<tr><td align=center></td>
	<td>&nbsp;</td>

</tr>	  
<tr><td align=center>&nbsp;</td>
	<td align=center height=200 style="background-color:#62772B"><a href=p-adminlist.php class="a"><img src="수정삭제.png" class="lg" style="position:relative; width:150; height:150; border-radius:100px; left:60; top:20; z-index:2;"></img><font size=4 style="position:relative; top:-140; right:75;" color=white><b>상품 수정/삭제</a></td>
      <td>&nbsp;</td>
	
</tr>	  
</table>
<? include ("bot.php");?>