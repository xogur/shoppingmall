<? include ("top.php");?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap');
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
#butsize {
	width:100;
	height:50;
}
</style>
<?
if (!isset($UserID)) {
	echo ("<script>
		window.alert('�α��� ����ڸ� �̿��Ͻ� �� �־��')
		history.go(-1)
		</script>");
	exit;
}
$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// ��ü ���ι� ���̺��� Ư�� ������� ���� �������� �о��
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$total = mysql_num_rows($result);
echo ("
<center><h1 style='margin-top:100px;'>��ٱ���</h1>
<table width=1000 border=0 style='margin-top:100px;'>
<tr><td align=center><font size=3><b></b></td></tr>
<tr><td align=left><font size=4><b>$UserName</b>���� ���� ��ٱ��� ��ǰ <font color=red size=6>$total</font><a>��</a> </td>
</table>
");


echo ("<center>
	<table border=0 width=1000 style='border-collapse:collapse;'>
    <tr><td width=100 align=center style='border-top:2px #58A426 solid;'><font size=2>��ǰ����</td>
	<td width=300 align=center style='border-top:2px #58A426 solid;'><font size=2>��ǰ�̸�</td>
	<td width=90 align=center style='border-top:2px #58A426 solid;'><font size=2>����(�ܰ�)</td>
	<td width=50 align=center style='border-top:2px #58A426 solid;'><font size=2>����</td>
	<td width=100 align=center style='border-top:2px #58A426 solid;'><font size=2>ǰ���հ�</td>
	<td width=50 align=center style='border-top:2px #58A426 solid;'><font size=2>����</td></tr>
");

if (!$total) {
     echo("<tr><td colspan=6 align=center><font size=2>���ι鿡 ��� ��ǰ�� �����ϴ�.</td></tr></table>");
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

		echo ("<tr><td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'>
			<a href=# onclick=\"window.open('./pds/$userfile', '_new', 'width=750,   height=750')\"><img src='./pds/$userfile' width=100 height=150  border=0></a></td>
			<td align=left style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=2><a   href=p-show.php?code=$pcode style='text-decoration:none; color:black; font-size:18px;'>$pname </a></td>
			<td align=right style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=2>$price&nbsp;��</td>
			<td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'>
			<form method=post action=qmodify.php?pcode=$pcode><input type=text name=newnum size=1 value=$quantity><input type=submit value=���� class='submit'>
			</td></form>
			<td align=right style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'><font size=2 color=red><b>$subtotalprice&nbsp;��</td>
			<td align=center style='border-top:1px lightgray solid; border-bottom:1px lightgray solid;'>
			<form method=post action=itemdelete.php?pcode=$pcode><input type=submit value=���� class='submit'></td></form>
			</tr>");

		$counter++;
    endwhile;
 	
     echo("<tr><td colspan=6 align=right style='border-top:2px #58A426 solid;'><font size=4></td></tr></table>
	 <h2><font size=2 color=red>*20000�� �̻� �ֹ��� ����� ��۵˴ϴ�.</h2>");

}

mysql_close($con);	//�����ͺ��̽� ��������

echo ("<table width=440 border=0 style='margin-bottom:200px; margin-top:50px; border-collapse:collapse; border-color:lightgray;'>
<tr><td colspan=2 align=left height=50 style='padding-left:30px; border-top:1px solid; border-left:1px solid; border-right:1px solid; border-color:lightgray; font-size:20px; border-radius:5px;'><b>���� ���� �ݾ�</b></td></tr>
				<tr><td align=left style='padding-left:30px; border-left:1px solid; border-color:lightgray;'>�� ��ǰ �ݾ� </td> <td align=right style='border-right:1px solid; border-color:lightgray;'><font style='margin-right:10px;'><b>$totalprice</b> ��</font></td></tr>
				<tr><td align=left style='padding-left:60px; border-left:1px solid; border-color:lightgray;'>+</td><td style='border-right:1px solid; border-color:lightgray;'></td></tr>");
				if ($totalprice > 20000){
				echo("<tr><td align=left style='padding-left:30px; border-left:1px solid; border-color:lightgray;'>�� ��ۺ�  </td> <td align=right style='border-right:1px solid; border-color:lightgray;'><font style='margin-right:10px;'><b>0</b> ��</font></td></tr>");
				$totalprice2 = $totalprice;
				}
				else{
					if(!$total){
						echo("<tr><td align=left style='padding-left:30px; border-left:1px solid; border-color:lightgray;'>�� ��ۺ�  </td> <td align=right style='border-right:1px solid; border-color:lightgray;'><font style='margin-right:10px;'><b>0</b> ��</font></td></tr>");
					}
					else {
				echo("<tr><td align=left style='padding-left:30px; border-left:1px solid; border-color:lightgray;'>�� ��ۺ�  </td> <td align=right style='border-right:1px solid; border-color:lightgray;'><font style='margin-right:10px;'><b>3000</b> ��</font></td></tr>");
				$totalprice2 = $totalprice + 3000;
					}
				}
				echo("
				<tr><td align=left style='padding-left:30px; border-left:1px solid; border-color:lightgray;'>�� �ֹ� �ݾ� </td> <td align=right style='border-right:1px solid; border-color:lightgray;'><font style='margin-right:10px; color:red;'><b>$totalprice2</b> ��</font></td></tr>
				<tr><td colspan=2 height=150 style='border-left:1px solid; border-right:1px solid; border-color:lightgray;'></td></tr>
	<tr><td align=center height=100 colspan=2 style='border-left:1px solid; border-bottom:1px solid; border-right:1px solid; border-color:lightgray;'><font size=2><button type=button class='submit' id='butsize'><a href=buy.php?&totalprice2=$totalprice2 style='color:white; text-decoration:none;'>���Ű���</a></button> &nbsp; <button type=button class='submit' id='butsize'><a href=p-list.php style='color:white; text-decoration:none;'>���ΰ��</a></button></td></tr></table>");

?>
<? include ("bot.php");?>