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
      /*�⺻���� ������ �ִ� �����׵θ��� ����*/ 
      border-bottom: 2px solid #97B742; 
      /*���ο� �׵θ��� �غκи� ���� (���β�, �����, ������)*/
      background: none; 
      /*�⺻���� ������ �ִ� ������ ����*/
     
	  
      /* �۾��� ����� �ٲ� (ũ��, ��Ʈ����)*/
	  }
.material:hover {
				color:white;
				background-color:#3E4F3E;
				}
.material{background-color:#6C8B6C; color:white;}
</style>
<? include ("top.php");?>
<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

$result = mysql_query("select * from product where code='$code'", $con);

$class=mysql_result($result,0,"class");
$name=mysql_result($result,0,"name");
$price1=mysql_result($result,0,"price1");
$price2=mysql_result($result,0,"price2");
$content=mysql_result($result,0,"content");
$userfile=mysql_result($result,0,"userfile");
$fileexplain=mysql_result($result,0,"fileexplain");
$file1 = $userfile;
$file2 = $fileexplain;	
echo ("
    <table align=center border=0 width=850 height=900 style='border-collapse:collapse; border-top:4px solid #97B742; margin-top:200px; margin-bottom:200px;'>     
	<form method=post action='p-modify2.php?code=$code&file1=$file1&file2=$file2' enctype='multipart/form-data'>
	<tr><td width=100 align=center style='border-bottom:0.5px solid lightgray;'>��ǰ�ڵ�</td>
	<td width=550 style='border-bottom:0.5px solid lightgray;'><b>$code</b></td></tr>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;'>��ǰ�з�</td>
	<td style='border-bottom:0.5px solid lightgray;'><select name=class>");
	if ($class == 1){
		echo("
		<option value=1 selected>����</option>
		");
	}
	else{
		echo("
		<option value=1>����</option>
		");
	}
	if ($class == 2){
		echo("
		<option value=2 selected>ä��</option>
		");
	}
	else{
		echo("
		<option value=2>ä��</option>
		");
	}
	if ($class == 3){
		echo("
		<option value=3 selected>���</option>
		");
	}
	else{
		echo("
		<option value=3>���</option>
		");
	}
	if ($class == 4){
		echo("
		<option value=4 selected>����</option>
		");
	}
	else{
		echo("
		<option value=4>����</option>
		");
	}
	if ($class == 5){
		echo("
		<option value=5 selected>�����Ĺ�</option>
		");
	}
	else{
		echo("
		<option value=5>�����Ĺ�</option>
		");
	}
	if ($class == 6){
		echo("
		<option value=6 selected>���,�ҽ���</option>
		");
	}
	else{
		echo("
		<option value=6>���,�ҽ���</option>
		");
	}
	if ($class == 7){
		echo("
		<option value=7 selected>����,�ް���</option>
		");
	}
	else{
		echo("
		<option value=7>����,�ް���</option>
		");
	}
	if ($class == 8){
		echo("
		<option value=8 selected>��Ÿ</option>
		");
	}
	else{
		echo("
		<option value=8>��Ÿ</option>
		");
	}
echo ("</select></td></tr>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;'>��ǰ�̸�</td><td style='border-bottom:0.5px solid lightgray;'><input type=text name=name size=70 value='$name'></td></tr>
	<tr>
	<td align=right style='border-bottom:0.5px solid lightgray;'>��ǰ���� ����</td>
	<td style='border-bottom:0.5px solid lightgray;'><input type=file size=30 name=userfileexplain>��--$fileexplain</td>
	</tr>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;'>��ǰ����</td><td style='border-bottom:0.5px solid lightgray;'><textarea name=content rows=15 cols=75>$content</textarea></td></tr>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;'>���󰡰�</td><td style='border-bottom:0.5px solid lightgray;'><input type=text name=price1 size=15 value=$price1>��</td></tr>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;'>���ΰ���</td><td style='border-bottom:0.5px solid lightgray;'><input type=text name=price2 size=15 value=$price2>��</td></tr>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;'>��ǰ����</td><td style='border-bottom:0.5px solid lightgray;'><input type=file size=30 name=userfile>��-- $userfile</td></tr>
	<tr><td align=center colspan=2><input type=submit class='material' value=�����Ϸ�></tr>
	</form>
	</table>");

mysql_close($con);

?>
<? include ("bot.php");?>
