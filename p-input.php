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
<center>
<table border=0 width=850 height=900 style="border-collapse:collapse; border-top:4px solid #97B742; margin-top:200px; margin-bottom:200px;">
<form method=post action=p-process.php enctype='multipart/form-data'>
<tr>
<td width=100 align=right style="border-bottom:0.5px solid lightgray;">��ǰ�з�</td>
<td width=550 style="border-bottom:0.5px solid lightgray;">
	<select name=class>
	<option value=1>����</option>
	<option value=2>ä��</option>
	<option value=3>���</option>
	<option value=4>����</option>
	<option value=5>�����Ĺ�</option>
	<option value=6>������ҽ���</option>
	<option value=7>�����������</option>
	<option value=8>��Ÿ</option>
	</select>
</td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">��ǰ�ڵ�</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=code size=20></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">��ǰ�̸�</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=name size=70></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">��ǰ���� ����</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=file size=30 name=userfileexplain></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">��ǰ����</td>
<td style="border-bottom:0.5px solid lightgray;" height=400><textarea name=content id="summernote" rows=10 cols=75></textarea></td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">���󰡰�</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=price1 size=15>��</td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">���ΰ���</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=text name=price2 size=15>��</td>
</tr>
<tr>
<td align=right style="border-bottom:0.5px solid lightgray;">��ǰ����</td>
<td style="border-bottom:0.5px solid lightgray;"><input type=file size=30 name=userfile></td>
</tr>
<tr>
<td align=center colspan=5>
<input type=submit value=����ϱ� class="material"></td>
</tr>
</form>
</table>
<? include ("bot.php");?>
