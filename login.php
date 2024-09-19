<style>
.submit{
		background:#57A621;
		color: white;
		border-radius:5px;
		width:350px;
		height:50px;
		font-size:30px;
		}
		.submit:hover {border-radius:50px;
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
input[type=password] { 
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
</style>
<? include ("top.php");?>
<center>

<tr><td>
<form method=post action=login-pass.php onsubmit="if(!this.uid.value || !this.upass.value) return false;">
<table border=0 width=500 style="padding-left:80px; padding-top:200px;">
        <tr><td align=right height=70><br>아이디 </td><td><br><input type=text style="margin-left:30px; height:30px;" placeholder="아이디를 입력해주세요." size=25 name=uid></td></tr>
<tr><td align=right height=70>비밀번호 </td><td><input type=password style="margin-left:30px; height:30px;" placeholder="비밀번호를 입력해주세요" size=25 name=upass></td></tr>
<tr><td colspan=2 align=center style="padding-right:80px;"><input type=submit value=로그인 class='submit' style="border:none;"></td></tr>
</form>
</table>
</td></tr>


<table width=170 cellspacing=0 cellpadding=0 border=0 align=center style="padding-top:10px; padding-bottom:200px;">
<tr><td align=center><a href="member.php" style="color:#7DC90B; text-decoration:none;">회원등록</a>&nbsp;&nbsp;<a href=findidpw.php style="color:#767676; text-decoration:none;">비번분실</a></td></tr>
</table>
<center>
<? include ("bot.php");?>"bot.php");?>