<script language='Javascript'>
	function go_zip(){
		window.open('zipcode2.php', 'zipcode',   'width=470, height=180, scrollbars=yes');
	}
</script>
<style>
.submit{
		background:#57A621;
		color: white;
		border-radius:5px;
		font-size:14px;
		border:none;
		
		}
		.submit:hover {border-radius:5px;
				color:white;
		background-color:#2D6F01;
		}
input[type=text] { 
      border: none;
	  background: lightgray;
      /*�⺻���� ������ �ִ� �����׵θ��� ����*/ 
      border-bottom: 1px solid black; 
      /*���ο� �׵θ��� �غκи� ���� (���β�, �����, ������)*/
      background: none; 
      /*�⺻���� ������ �ִ� ������ ����*/
      font: 14px;
	  
      /* �۾��� ����� �ٲ� (ũ��, ��Ʈ����)*/
	  }
#butsize {
	width:100;
	height:50;
}
</style>
<? include ("top.php");?>


<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// ��ü ���ι� ���̺��� Ư�� ������� ���� �������� �о��
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$pointresult = mysql_query("select * from member where uid='$UserID'", $con);
$total = mysql_num_rows($result);
$point = mysql_result($pointresult,0, "point");
$phone = mysql_result($pointresult,0, "mphone");
echo("
<center>
<table width=1000 border=0 style='margin-top:100px;'>
<tr><td valign=top align=center height=100><font size=6><b>��ǰ ���� �ܰ�</b></td></tr>
<tr><td align=left><font size=2><b>$UserName</b>���� ���� ����   ǰ�� <font size=4 color=red>$total</font> ��</td>
</table>");
echo ("
	<table border=0 width=1000 style='border-collapse:collapse;'>
    <tr><td width=100 align=center style='border-top:2px #58A426 solid;'><font size=2>��ǰ����</td>
	<td width=300 align=center style='border-top:2px #58A426 solid;'><font size=2>��ǰ�̸�</td>
	<td width=90 align=center style='border-top:2px #58A426 solid;'><font size=2>����(�ܰ�)</td>
	<td width=50 align=center style='border-top:2px #58A426 solid;'><font ssize=2>����</td>
	<td width=100 align=center style='border-top:2px #58A426 solid;'><font size=2>ǰ���հ�</td></tr>
	");

if (!$total) {
     echo("<tr><td colspan=5 align=center><font   size=2><b>���ι鿡 ��� ��ǰ��   �����ϴ�.</b>
        </font></td></tr></table>");
} else {

    $counter=0;
    $totalprice=0;    // �� ���� �ݾ�  

    while ($counter < $total) :
		$pcode = mysql_result($result, $counter, "pcode");
		$quantity = mysql_result($result, $counter, "quantity");
      
		$subresult = mysql_query("select * from product where code='$pcode'", $con);
		$userfile = mysql_result($subresult, 0, "userfile");
		$pname = mysql_result($subresult, 0, "name");
		$price = mysql_result($subresult, 0, "price2");
       
		$subtotalprice = $quantity * $price;
		$totalprice = $totalprice + $subtotalprice; 
	 
		echo("<tr><td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><a href=#   onclick=\"window.open('./pds/$userfile', '_new', 'width=450, height=450')\"><img src='./pds/$userfile' width=100 height=150 border=0></a></td>
			<td align=left style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3><a href=p-show.php?code=$pcode style='text-decoration:none; color:black; font-size:18px;'>$pname</a></td>
			<td align=right style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3>$price&nbsp;��</td>
			<td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3>$quantity&nbsp;��</td>
			<td align=right style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=3 color=red><b>$subtotalprice&nbsp;</b>��</td></tr>");

		$counter++;

    endwhile;
	$totalprice=$totalprice-$usepoint;
	$totalprice2=$totalprice2-$usepoint;
     echo("<form method=post action=buy.php?totalprice2=$totalprice2>
	 <tr><td colspan=5 align=right height=80 style='border-top:2px #58A426 solid;'><font size=2>����Ʈ ���:<input type=text name=usepoint placeholder='$point ��' value='$usepoint'><button class='submit'>���</button></td></tr>
	 <tr><td colspan=5 align=right><font size=2>�� ���� �ݾ�(��ۺ� ����): <font size=4>$totalprice2</font> ��</td></tr></table></form>");
}

mysql_close($con);	//�����ͺ��̽� ��������

echo ("<br>
		<table border=0 width=690 style='margin-top:100px; margin-bottom:150px;'>
        <tr><td align=center><font size=2>�Ա� ����: <b><font color=red>��������</font> 302-1334-7341-81 (������: ������)</b><br><br>
		<font size=2 color=#90958D>
		* �����Ͻ� ��ǰ�� �Ա� Ȯ���� ��۵Ǹ�, �ֹ� ���� ��Ȳ�� �������������� Ȯ���Ͻ� �� �ֽ��ϴ�.<br>
		* ��ǰ ��� ������ �ֹ� ��Ҹ� ���Ͻø� �������������� ���� �ֹ� ��� ��û�� �Ͻø� �˴ϴ�.<br>
		* ��ǰ�� ��� ������ �Ŀ� ���� ��Ҹ� ���Ͻø� ������(��ȭ:010-9072-1938)�� �����ּ���.</font>
       </td></tr>
       </table>");

echo("
    <br><br>
	<table width=1000 border=0>
	<tr><td><font size=5><b>������� �Է�</b></td></tr>
	</table>

	<table width=1000 border=0 style='margin-bottom:150px; border-top:2px #58A426 solid;  border-spacing: 30px; border-collapse: separate;'>
	<form method=post action=endshopping.php?totalprice=$totalprice&usepoint=$usepoint&totalprice2=$totalprice2 name=buy>
	<tr><td align=left style='border-right:1px lightgray solid;'><font size=2>�� &nbsp;&nbsp;<font size=4>�ֹ���</font></td>
	<td><input type=text name=receiver size=10 placeholder='$UserName'></td>
	</tr>
	<tr>
	<td align=left style='border-right:1px lightgray solid;'><font size=2>�� &nbsp;&nbsp;<font size=4>��ȭ��ȣ</font></td>
	<td><input type=text name=phone   size=20 placeholder='$phone'></td>
	</tr>
	<tr><td height=30 align=left style='border-right:1px lightgray solid;'><font size=2>�� &nbsp;&nbsp;<font size=4>�����</font></td>
	<td align=left><input type=text size=6 name=zip readonly=readonly>
	<font size=2>[<a href='javascript:go_zip()'>�����ȣ�˻�</a>]<br>
	<input type=text size=55 name=addr1 readonly=readonly style='font-size:10pt; font-family:Tahoma;'><br>
	<br><input type=text size=30 name=addr2   style='font-size:10pt; font-family:Tahoma;'> ���ּ�</td>
	<tr><td align=left style='border-right:1px lightgray solid;'><font size=2>�� &nbsp;&nbsp;<font size=4>�ֹ��䱸����</font></td>
	<td><textarea name=message rows=3 cols=65></textarea></td></tr>
	<tr><td align=center valign=bottom colspan=2 height=200 style='border-top:2px #58A426 solid;'>
	<input type=submit value=���ſϷ� class='submit' id='butsize'></td></tr>
	</table>
	</form>
	</center>
");

?>
<? include ("bot.php");?>