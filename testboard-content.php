<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style type="text/css">

       table.aa {
				border-collapse:collapse;
				font-family: 'Dongle', sans-serif;
				
				}
				input {font-family: 'Dongle', sans-serif; font-size:18px;}
			button {
				font-family: 'Dongle', sans-serif;
				
				}
         tr.b { border-bottom:1px solid;
		border-bottom:1px solid lightgray;
		}
		.a:hover {border-radius:5px;
				background-color:#2D6F01;
				color:white;
				border:1;
				border:none;
				}
		.a {background-color:#57A621; color:white;  border-radius:5px;border:none;}
      .login { 
      border: none;
	  background: #000;
      /*�⺻���� ������ �ִ� �����׵θ��� ����*/ 
      border-bottom: 1px solid black; 
      /*���ο� �׵θ��� �غκи� ���� (���β�, �����, ������)*/
      background: none; 
      /*�⺻���� ������ �ִ� ������ ����*/
      
	  
      /* �۾��� ����� �ٲ� (ũ��, ��Ʈ����)*/
	  }
		.d:hover {text-decoration:underline;}
		a {text-decoration:none; color:black;}
		.t {font-family: 'Dongle', sans-serif; font-size:30px;}
    </style>
<? include ("top.php");?>
<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result=mysql_query("select * from testboard where id=$id",$con);

// �� �ʵ忡 �ش��ϴ� �����͸� �̾� ���� ����
$id=mysql_result($result,0,"id");
$writer=mysql_result($result,0,"writer");
$topic=mysql_result($result,0,"topic");
$hit=mysql_result($result,0,"hit");

$hit = $hit +1;   //��ȸ���� �ϳ� ����
mysql_query("update testboard set hit=$hit where id=$id",$con);

$wdate=mysql_result($result,0,"wdate");
$code=mysql_result($result,0,"code");
$content=mysql_result($result,0,"content");
$filename = mysql_result($result, 0, "filename");
if($writer != admin){
$subresult=mysql_query("select * from product where code='$code'",$con);
$pname=mysql_result($subresult,0,"name");
$pprice=mysql_result($subresult,0,"price2");
$userfile=mysql_result($subresult,0,"userfile");
$star=mysql_result($result,0,"star");
}
// ���̺�κ��� ���� ������ ȭ�鿡 ���÷���
echo("<center>

	<table class='aa' border=0 width=1000 style='border-collapse:collapse; border-top:4px solid #97B742; border-bottom:4px solid #97B742; margin-top:100px;'>
	<tr class='b'>
	<td width=100><b>��ȣ: $id</td>
	<td width=200><b>���̵�:&nbsp;$writer</td>
	<td width=300><b>�۾���¥: $wdate</td>
	<td width=100><b>��ȸ: $hit</td>
	</tr>
	<tr class='b'>");
	if($writer == admin){
		echo("
	<td colspan=4><b>����:&nbsp</b><font color=red>[����] $topic</font></td>
	</tr>");
	}
	if ($writer != admin){
		echo ("
	<tr class='b'>
	<td align=center><b>��ǰ</b><br>");while( $i < $star ){ echo("<i class='fa-solid fa-star' style='color:#F9C206;'></i>"); $i++;} echo("</td><td><img src=./pds/$userfile width=100 height=150></img></td><td colspan=2>$pname&nbsp;$pprice ��</td>
	</tr>");
	}
if ($filename):
	echo("<tr class='b'><td align=center style='font-size:15;' valign=center><b>÷�� �̹���</td><td colspan=3><img src=./pds/$filename width=100 height=150></img></tr>");
endif;
echo("
	<tr class='b'>
	<td colspan=4 height=400 valign=top><pre class='t'><br>$content</pre></td>
	</tr>
	</table>



<table class='aa' border=0 width=1000>
<tr class='b'>
<form action='memo.php?id=$id&cblock=$cblock&ccpage=$ccpage' method=post>
<td><font size=4>�̸�</font></td>
<td><b>$UserID</td>
<td><font size=4>�޸�</font></td>
<td><input type=text size=30 maxlength=100 name=wmemo class='login'>
<input type=submit value='�޸𾲱�' class='a' style='font-family:Dongle; font-size:20px;'></td>
</form>

");
?>
<?
$con =   mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma",   $con);

$result =   mysql_query("select * from memojang where id=$id order by wdate desc", $con);

$total =   mysql_num_rows($result);
if($total){
echo ("
		<table class='aa' border=0 width=1000 style='border-bottom:4px solid #97B742;'>
		<tr class='b'><td width=100><b>�̸�</td>
		<td align=center width=150><b>����¥</td><td width=300 align=center><b>�޸�</td><td align=center width=100><b>����</td></tr>
	");

	$pagesize =   5;	// �� �������� ���� �� �޸� ���� ����

	if ($cpage ==  '') $cpage = 1; 

	$endpage = (int)($total / $pagesize);

	if ( ($total % $pagesize) != 0 ) $endpage = $endpage + 1;

	$i = 0;

	while ( $i   < $pagesize ) :
		$counter = $pagesize * ($cpage - 1) + $i;
		if ($counter == $total) break;
	
		$name = mysql_result($result, $counter, "name");
		$wdate = mysql_result($result, $counter, "wdate");
		$message = mysql_result($result,   $counter, "message");
		echo ("
			<tr class='b'><td>$name</td>
			<td>$wdate</td><td>$message</td>
			<td><a href='mmodify.php?d=$wdate&id=$id&cpage=$cpage&cblock=$cblock&ccpage=$ccpage&name=$name&message=$message'><button class='a'>����</button></a>&nbsp;<a href='mdelete.php?wdate=$wdate&id=$id'><button class='a'>����</button></a></td></tr>
		");

		$i++;

	endwhile;

	echo ("</table>");
}
else{
	echo ("</table><br><br><br><font style='font-family:Dongle; font-size:14px; color:red;'>���� ��ϵ� �޸� �����ϴ�.</font><br><br><br>");
}
echo ("<table class='aa' border=0 width=1000><tr class='b'><td align=center>");
	
$ppage =   $cpage - 1;
$npage =   $cpage + 1;

if ($cpage > 1) echo ("<a href=content.php?cpage=$ppage&id=$id&cblock=$cblock&ccpage=$ccpage class='d'><b>����</a>");

if ($cpage < $endpage) echo ("<a href=content.php?cpage=$npage&id=$id&cblock=$cblock&ccpage=$ccpage class='d'><b>����</a>");

echo ("</td></tr>
   </table>");

mysql_close($con);
echo("<table class='aa'   border=0 width=700><tr class='b' style='border-color:white;'><td><br></td></tr>
	<tr class='b' style='border-bottom:0px; border-top:0px;'><td align=center>");
	if($UserID == $writer){ echo("
	<a href=pass.php?board=testboard&id=$id&mode=0&writer=$writer&code=$code&num=$num><button class='a'>����</button></a>
	<a href=pass.php?board=testboard&id=$id&mode=1&num=$num&code=$code&writer=$writer><button class='a'>����</button></a>
	");
	}
	echo("
	<a href=testboard.php?board=testboard&cblock=$cblock&cpage=$ccpage><button class='a'>����Ʈ</button></a>
	</td></tr>
	</table>");
	echo("<br><br><br><br>");
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result = mysql_query("select * from testboard order by id asc", $con);

$total = mysql_num_rows($result);
echo("<center>");
echo("
	<table class='aa' border=0 width=700 style='margin-bottom:100px;'>
");
	$ad = $id;
	$j=$id-1;
	if ($j == 0):
	$j = 1;
	endif;
	$m=$id+1;
	if ($m > $total):
	$m = $total;
	endif;
	while($j<=$m):
		$id=mysql_result($result,$j-1,"id");
		$writer=mysql_result($result,$j-1,"writer");
		$topic=mysql_result($result,$j-1,"topic");
		$hit=mysql_result($result,$j-1,"hit");
		$wdate=mysql_result($result,$j-1,"wdate");
		$space=mysql_result($result,$j-1,"space");
		$filename=mysql_result($result,$j-1,"filename");
		$filesize=mysql_result($result,$j-1,"filesize");
		$num=mysql_result($result,$j-1,"num");
		$re = mysql_query("select * from memojang where id=$j", $con);
		$to = mysql_num_rows($re);
		$t="";

		if   ($space>0) {
			for ($i=0 ; $i<=$space ; $i++)
				$t = $t . "&nbsp;";     // �亯 ���� ��� ���� �� �κп� ������ ä��
		}
		if ($ad == $id){
		if ($filename and $filesize):
			if ($to>0):
				echo("
					<tr class='b' style='background-color:#DCE8BD;'><td align=center><font style='position:relative; left:-10px;'><font color=#70882F>��&nbsp;&nbsp;$id</font></td>
					<td align=center><font color=#70882F>$writer</td>
					<td align=left><font color=#70882F>$t<a href=testboard-content.php?board=testboard&id=$id class='d'><font color=#70882F>$topic&nbsp;[$to]</a>&nbsp;<i class='fa-sharp fa-solid fa-floppy-disk'></i></td>
					<td align=center><font color=#70882F>$wdate</td><td align=center><font color=#70882F>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr class='b' style='background-color:#DCE8BD;'><td align=center><font style='position:relative; left:-10px; color:#5A872E;'><font color=#70882F>��&nbsp;&nbsp;$id</font></td>
					<td align=center><font color=#70882F>$writer</td>
					<td align=left><font color=#70882F>$t<a href=testboard-content.php?board=testboard&id=$id class='d'><font color=#70882F>$topic&nbsp;</a><i class='fa-sharp fa-solid fa-floppy-disk'></i></td>
					<td align=center><font color=#70882F>$wdate</td><td align=center>$hit</td>
					</tr>
					");
				endif;
		else:
			if ($to>0):
				echo("
					<tr class='b' style='background-color:#DCE8BD;'><td align=center><font style='position:relative; left:-10px;'><font color=#70882F>��&nbsp;&nbsp;$id</font></td>
					<td align=center><font color=#70882F>$writer</td>
					<td align=left><font color=#70882F>$t<a href=testboard-content.php?board=testboard&id=$id class='d'><font color=#70882F>$topic&nbsp;[$to]</a></td>
					<td align=center><font color=#70882F>$wdate</td><td align=center><font color=#70882F>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr class='b' style='background-color:#DCE8BD;'><td align=center><font style='position:relative; left:-10px;'><font color=#70882F>��&nbsp;&nbsp;$id</font></td>
					<td align=center><font color=#70882F>$writer</td>
					<td align=left><font color=#70882F>$t<a href=testboard-content.php?board=testboard&id=$id&num=$num class='d'><font color=#70882F>$topic</a></td>
					<td align=center><font color=#70882F>$wdate</td><td align=center><font color=#70882F>$hit</td>
					</tr>
					");
			endif;
		endif;
		$j = $j + 1;
		}
		else{
			if ($filename and $filesize):
			if ($to>0):
				echo("
					<tr class='b'><td align=center>$id</td>
					<td align=center>$writer</td>
					<td align=left>$t<a href=testboard-content.php?board=testboard&id=$id class='d'>$topic&nbsp;[$to]</a>&nbsp;<i class='fa-sharp fa-solid fa-floppy-disk'></i></td>
					<td align=center>$wdate</td><td align=center>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr class='b'><td align=center>$id</td>
					<td align=center>$writer</td>
					<td align=left>$t<a href=testboard-content.php?board=testboard&id=$id class='d'>$topic&nbsp;</a><i class='fa-sharp fa-solid fa-floppy-disk'></i></td>
					<td align=center>$wdate</td><td align=center>$hit</td>
					</tr>
					");
				endif;
		else:
			if ($to>0):
				echo("
					<tr class='b'><td align=center>$id</td>
					<td align=center>$writer</td>
					<td align=left>$t<a href=testboard-content.php?board=testboard&id=$id class='d'>$topic&nbsp;[$to]</a></td>
					<td align=center>$wdate</td><td align=center>$hit</td>
					</tr>
					");
			else :
				echo("
					<tr class='b'><td align=center>$id</td>
					<td align=center>$writer</td>
					<td align=left>$t<a href=testboard-content.php?board=testboard&id=$id&num=$num class='d'>$topic</a></td>
					<td align=center>$wdate</td><td align=center>$hit</td>
					</tr>
					");
			endif;
		endif;
		$j = $j + 1;
		}
	endwhile;
	echo ("</table>");

?>
<? include ("bot.php");?>