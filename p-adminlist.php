<style>

button:hover {border-radius:100px;
				color:white;
				background-color:#62A834;
				padding:5px 10px 5px 10px;
				}
button {
				padding:5px 10px 5px 10px;
				border:0px;
				color:#62A834;
				background-color:white;
				}
.l { 
      border: none;
	  background: #000;
      /*�⺻���� ������ �ִ� �����׵θ��� ����*/ 
      border-bottom: 1px solid black; 
      /*���ο� �׵θ��� �غκи� ���� (���β�, �����, ������)*/
      background: none; 
      /*�⺻���� ������ �ִ� ������ ����*/
      font: 14px;
      /* �۾��� ����� �ٲ� (ũ��, ��Ʈ����)*/
	  }
</style>
<? include ("top.php");?>
<center>
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
$result = mysql_query("select * from product", $con);
if($field and $key){
$result = mysql_query("select * from product where $field like '%$key%'", $con);
}
$total = mysql_num_rows($result);
echo("<table border=0 width=1000 style='margin-top:200px;'><tr><td align=left>
	<form method=post action=p-adminlist.php?field=$field&key=$key> 
	<select name=field>
	<option value=code>�ڵ�</option>
	<option value=name>��ǰ��</option>
	</select>
	�˻���<input type=text name=key size=13 class='l'>
	<input type=submit value='' style='background-color:white; border:none; position:absolute; top:145px; margin-top:150px; opacity: 0;'><i class='fa-sharp fa-solid fa-magnifying-glass' style='font-size:18px;'></i></input>
	</td></tr></form>");
echo ("<table border=0 width=1000 style=' margin-bottom:50px; border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742;'>
	<tr><td align=center style='border-bottom:0.5px solid lightgray;' height=50><font size=3><b>��ǰ�ڵ�</td>
	<td colspan=2 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>��ǰ��</td>
	<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>���尡��</td>
	<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>�ǸŰ���</td>
	<td align=center style='border-bottom:0.5px solid lightgray;'><font size=3><b>����/����</td></tr>");
							
if (!$total) {

  echo("<tr><td colspan=6 align=center>���� ��ϵ� ��ǰ�� �����ϴ�</td></tr>");

} else {
if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 5;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/$pagesize);
	if (($total%$pagesize)!=0) $totalpage = $totalpage + 1;

	$counter = 0;

	while ($counter < $pagesize) :
	$newcounter=($cpage-1)*$pagesize+$counter;
		if ($newcounter == $total) break;

		$code=mysql_result($result,$newcounter,"code");
		$name=mysql_result($result,$newcounter,"name");
		$userfile=mysql_result($result,$newcounter,"userfile");
		$price1=mysql_result($result,$newcounter,"price1");
		$price2=mysql_result($result,$newcounter,"price2");

		echo ("
		   <tr><td width=100 align=center style='border-bottom:0.5px solid lightgray;'><font size=3>$code</td>
			 <td align=center width=30 style='border-bottom:0.5px solid lightgray; padding:20 0 20 0;'><img src=./pds/$userfile width=100 height=100 border=0 style='border-radius:10px;'></td>
			   <td width=350 align=left style='border-bottom:0.5px solid lightgray;'><a href=p-show.php?code=$code style='color:black;'><font size=3>$name</a></td>
			   <td align=right width=70 style='border-bottom:0.5px solid lightgray;'><font size=3><strike>$price1&nbsp;��</strike></td>
			   <td align=right width=70 style='border-bottom:0.5px solid lightgray;'><font size=3>$price2&nbsp;��</td>
			   <td width=70 align=center style='border-bottom:0.5px solid lightgray;'><font size=3><a href=p-modify.php?code=$code>����</a>/<a href=p-delete.php?code=$code>����</a></td></tr>");

		$counter++;
	endwhile;
}

echo ("</table>");
echo ("<table border=0 width=700 style='margin-bottom:200px;'>
		  <tr><td align=center nowrap>");
		   
	// ȭ�� �ϴܿ� ������ ��ȣ ���
	if ($cblock=='') $cblock=1;   // $cblock - ���� ������ ��ϰ�
	$blocksize = 5;             // $blocksize - ȭ��� ����� ������ ��ȣ ����

	$pblock = $cblock - 1;      // ���� ����� ���� ��� - 1
	$nblock = $cblock + 1;     // ���� ����� ���� ��� + 1
		
	// ���� ����� ù ������ ��ȣ
	$startpage = ($cblock - 1) * $blocksize + 1;	

	$pstartpage = $startpage - 1;  // ���� ����� ������ ������ ��ȣ
	$nstartpage = $startpage + $blocksize;  // ���� ����� ù ������ ��ȣ

	if ($pblock > 0)        // ���� ����� �����ϸ� [�������] ��ư�� Ȱ��ȭ
		echo ("<a href=p-adminlist.php?board=testboard&cblock=$pblock&cpage=$pstartpage><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:#B1CB6D;'></i></a> ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   if ($cpage==$i) {
	   echo ("<a href=p-adminlist.php?board=testboard&cblock=$cblock&cpage=$i><button style='background-color:#62A834; color:white; border-radius:100px;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=p-adminlist.php?board=testboard&cblock=$cblock&cpage=$i><button class='a' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=p-adminlist.php?board=testboard&cblock=$nblock&cpage=$nstartpage><i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:#B1CB6D;'></i></a> ");

	echo ("</td></tr></table>");

	     
mysql_close($con);

?>
<? include ("bot.php");?>