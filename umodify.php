<? include ("top.php");?>
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
<? 
$con =   mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);
	
$result = mysql_query("select * from member where uid='$UserID'", $con);
	
$uname = mysql_result($result, 0, "uname");
$email = mysql_result($result, 0, "email");
$zip = mysql_result($result, 0, "zipcode");
$addr1 = mysql_result($result, 0,  "addr1");
$addr2 = mysql_result($result, 0,  "addr2");
$mphone = mysql_result($result, 0, "mphone");
	
echo ("<center>
	<script language='Javascript'>
	function go_zip(){
		window.open('zipcode.php','ZIP','width=470, height=180, scrollbars=yes');
	}
	</script>

	<form action=register2.php method=post name=comma>
	<table width=670 border=0 cellpadding=0 cellspacing=5 style='margin-top:200px;'>
	<tr><td height=40 align=center style='font-size:30px;'><b>ȸ������ ����</b></td></tr>
	</table>
	<table border=0 width=670 height=350 style='border-radius:10px; border:1px solid lightgray;'>
	<tr><td>
		<table width=670 border=0 align=center>
			<tr><td width=5% align=right>*</td>
			<td width=15% height=30><font size=2>ȸ�� ID</td>
			<td width=80%><font   size=2><b>$UserID</b></td></tr>
			<tr><td align=right>*</td>
			<td height=30><font size=2>��й�ȣ</font></td>
			<td><input type=password   maxlength=15 style='height:20;' size=20 name=upass1></td></tr>
			<tr><td   align=right>*</td>
			<td height=30><font size=2>��й�ȣȮ��</font></td>
			<td><input type=password   maxlength=15 style='height:20;' size=20 name=upass2></td></tr>
			<tr><td align=right>*</td>
			<td height=30><font size=2>�� ��</font></td>
			<td><input type=text size=10   name=uname value=$uname></td></tr>
			<tr><td align=right>*</td>
			<td height=30><font size=2>�޴���ȭ</font></td>
			<td><input type=text size=20 name=mphone value=$mphone></td> </tr>
			<tr><td align=right>*</td>
		    <td height=30><font size=2>�̸���</td>
		    <td><input type=text size=30 name=email value=$email></td></tr>
			<tr><td align=right>*</td>
		    <td height=30><font size=2>���ּ�</td>
		    <td><input type=text size=7   name=zip value=$zip readonly=readonly> <font size=2>[<a   href='javascript:go_zip()'>�����ȣ�˻�</a>]</font><br>
			<input type=text size=50 name=addr1 value='$addr1' readonly=readonly><br><input type=text size=35 name=addr2 value='$addr2'> 
			</td></tr>
		</table>
    </td></tr>
	</table>
  
	<table width=670 border=0 cellpadding=0 cellspacing=5 style='margin-bottom:200px;'>
	<tr><td height=40 align=center><input type=submit value='ȸ����������' class='material'> </td></tr>
	</table>
	</form>
");

?>
<? include ("bot.php");?>