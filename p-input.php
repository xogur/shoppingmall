<? include ("top.php");?>
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
			tabsize: 2,
        height: 300
		});
    });
    </script>
<style>
input {
      border: none;
	  background: #000;
      /*기본으로 가지고 있던 검정테두리를 없앰*/ 
      border-bottom: 2px solid #97B742; 
      /*새로운 테두리를 밑부분만 생성 (선두께, 선모양, 선색깔)*/
      background: none; 
      /*기본으로 가지고 있던 배경색를 없앰*/
     
	  
      /* 글씨의 모양을 바꿈 (크기, 폰트종류)*/
	  }
.material:hover {
				color:white;
				background-color:#3E4F3E;
				}
.material{background-color:#6C8B6C; color:white;}
</style>
<center>
<table border=0 width=850 height=900 style="border-collapse:collapse; border-top:4px solid #97B742; margin-top:200px; margin-bottom:200px;">
<form method=post action=p-process.php enctype='multipart/form-data'>
<tr>
<td width=100 align=right style="border-bottom:0.5px solid lightgray;">상품분류</td>
<td width=550 style="border-bottom:0.5px solid lightgray;">
	<select name=class>
	<option value=1>과일</option>
	<option value=2>채소</option>
	<option value=3>곡류</option>
	<option value=4>서류</option>
	<option value=5>원예식물</option>
	<option value=6>장류·소스류</option>
	<option value=7>정류·계란류</option>
	<option value=8>기타</option>
	</select>
</td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">상품코드</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=code size=20></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">상품이름</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=name size=70></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">상품설명 사진</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=file size=30 name=userfileexplain></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">상품설명</td>
<td style="border-bottom:0.5px solid lightgray;" height=400><textarea name=content id="summernote" rows=10 cols=75></textarea></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">정상가격</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=price1 size=15>원</td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">할인가격</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=price2 size=15>원</td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">상품사진</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=file size=30 name=userfile></td>
</tr>
<tr>
<td align=center colspan=5>
<input type=submit value=등록하기 class="material"></td>
</tr>
</form>
</table>
<? include ("bot.php");?>
