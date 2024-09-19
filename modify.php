<? include ("top.php");?>
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script></link>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script></link>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
			tabsize: 2,
        height: 300
		});
    });
    </script>
    <style type="text/css">
	table {
				border-collapse:collapse;
				font-family: 'Dongle', sans-serif;
				
				}
				input {font-family: 'Dongle', sans-serif;}
		.f {font-family: 'Dongle', sans-serif;}
			
			.r {font-family: 'Dongle', sans-serif;
			
				}
         tr.b { border-bottom:1px solid;}
		tr.a {border-bottom:1px solid;
		border-top:1px solid;}
      .login { 
      border: none;
	  background: #000;
      /*기본으로 가지고 있던 검정테두리를 없앰*/ 
      border-bottom: 1px solid black; 
      /*새로운 테두리를 밑부분만 생성 (선두께, 선모양, 선색깔)*/
      background: none; 
      /*기본으로 가지고 있던 배경색를 없앰*/
     
	  
      /* 글씨의 모양을 바꿈 (크기, 폰트종류)*/
	  }
		.a{
		background: #70A837;
		color: white;
		border-radius:5px;
		border:none;
		}
		.a:hover {border-radius:5px;
				color:white;
				background-color:#4B7225;
    </style>
<?
if($UserID != admin) {
$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);
	
$result = mysql_query("select * from product where code='$code'",   $con);
$subresult = mysql_query("select * from testboard where id='$id'",   $con);
$total = mysql_num_rows($result);
$name =  mysql_result($result, 0, "name");
$price =  mysql_result($result, 0, "price2");
$userfile =  mysql_result($result, 0, "userfile");
$topic =  mysql_result($subresult, 0, "topic");
$filename =  mysql_result($subresult, 0, "filename");
$content =  mysql_result($subresult, 0, "content");

}
echo("
	<center>
	<form method=post action='modify-process.php?code=$code&buydate=$buydate&id=$id' enctype='multipart/form-data'>
	<table width=850 border=0 style='margin-top:100px; margin-bottom:100px;'>
	<tr>
	<td width=100 align=right font><b>아이디</b></td>
	<td width=600>&nbsp;<b>$UserID</td>
	</tr>
	<tr><td height=5></td></tr>
	<tr>
	<td align=right ><b>제목</b> </td>
	<td>&nbsp;<input type=text name=topic value='$topic' size=60 class='login'></td>
	</tr>
	<tr><td height=5></td></tr>
	<tr>
	<td align=right nowrap><font><b>첨부화일&nbsp;</b></font></td>
    <td class='r'><input type=file name='userfile' value='$filename' size=45 maxlength=80></td>");
	if ($UserID != admin){
	echo ("
	<tr><td align=right>상품</td><td><img src=./pds/$userfile width=50 height=70></img><b>$name $price 원</td></tr>");
	}
	echo("
	<tr>
	<td align=right style='background:white;'><b>내용</b> </td>
	<td style='background:white;'><textarea name=content value='$content' rows=12 cols=60 id='summernote' font='arial'></textarea></td>
	</tr>
	<tr>
	<td align=right><b>별점</td>
	<td height=50><div class='star-rating'>
  <input type='radio' id='5-stars' name='rating' value='5' />
  <label for='5-stars' class='star'>&#9733;</label>
  <input type='radio' id='4-stars' name='rating' value='4' />
  <label for='4-stars' class='star'>&#9733;</label>
  <input type='radio' id='3-stars' name='rating' value='3' />
  <label for='3-stars' class='star'>&#9733;</label>
  <input type='radio' id='2-stars' name='rating' value='2' />
  <label for='2-stars' class='star'>&#9733;</label>
  <input type='radio' id='1-star' name='rating' value='1' />
  <label for='1-star' class='star'>&#9733;</label>
</div></td>
	</tr>
	<tr>
	<td align=right><b>암호</b> </td>
	<td>&nbsp;<input type=password name=passwd size=15></td>
	</tr>
	<tr>
	<td align=center colspan=2>
	<input type=submit value=수정완료 class='a'>
	<input type=reset value=지우기 class='a'></td>
	</tr>
	</table>
	</form>
	</center>
");

?>
<style>

.star-rating {
  border:solid 0px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.5em;
  justify-content:space-around;
  padding:0 .2em;
  text-align:center;
  width:5em;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}

/* explanation */

article {
  background-color:#ffe;
  box-shadow:0 0 1em 1px rgba(0,0,0,.25);
  color:#006;
  font-family:cursive;
  font-style:italic;
  margin:4em;
  max-width:30em;
  padding:2em;
}
</style>

<? include ("bot.php");?>