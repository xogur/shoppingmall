<? include ("top.php");?>
<style>
a {text-decoration:none;}
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
</style>
<?
echo ("<center><table border=0 width=1200 style='margin-top:100px; margin-bottom:70px;'><tr>
<td align=center style='font-size:30px;'><b>�ǰ� ������</td></tr></table>");
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	   

$result = mysql_query("select * from recipe", $con);
$total = mysql_num_rows($result);
echo ("<center><table border=0 width=1200 style='margin-bottom:50px;'><tr>");

if (!$total){
	echo ("<td align=center><font color=red>���� ��ϵ� ��ǰ�� �����ϴ�</td>");
} else {
if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 2;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/10);
	if (($total%10)!=0) $totalpage = $totalpage + 1;
	$counter = 0;
	$subcounter = 0;

	while ($counter < $total && $counter < 15 && $subcounter < $pagesize) :
	$newcounter=($cpage-1)*10+$counter;
	if ($newcounter == $total) break;
		if ($newcounter > 0 && ($newcounter % 5) == 0){ 
		$subcounter = $subcounter + 1;
		if ($subcounter >= $pagesize){
			break;
		}
		else if(($newcounter%10) != 0){
			echo ("</tr><tr><td colspan=5><hr size=1 color=green width=100%></td></tr><tr>");
			}
		}
		$menu=mysql_result($result,$newcounter,"menu");
		$img=mysql_result($result,$newcounter,"img");

		echo ("<td width=135 align=center style='padding:60px 20px 60px 20px;'><a href=recipe-show.php?menu=$menu style='ccolor:black;'> <img src='./pds/$img' width=200 height=250 border=0 style='border-radius:10px;'><br><font color=blue style='text-decoration:none; font-size:10pt; color:black;'>[���ο丮]</font><br><br><font color=blue style='text-decoration:none; font-size:14pt; color:black;'>$menu</a></font><br>");

		$counter++;
	endwhile;


}
echo ("</tr></table>");
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
		echo ("<a href=recipe.php?board=testboard&cblock=$pblock&cpage=$pstartpage&class=$class&mode=$mode><i class='fa-sharp fa-solid fa-chevron-left' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	// ���� ��Ͽ� ���� ������ ��ȣ�� ���	
	$i =   $startpage;
	while($i < $nstartpage):
	   if ($i > $totalpage) break;  // ������ �������� ��������� ������
	   if ($cpage==$i) {
	   echo ("<a href=recipe.php?board=testboard&cblock=$cblock&cpage=$i&class=$class&mode=$mode><button style='background-color:#62A834; border-radius:100px; color:white; border:none;' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	   else{
		   echo ("<a href=recipe.php?board=testboard&cblock=$cblock&cpage=$i&class=$class&mode=$mode><button class='a' nowrap>$i</button></a>&nbsp;");
	   $i = $i + 1;
	   }
	endwhile;
	 
	// ���� ����� ���� �������� ��ü ������ ������ ������ [�������] ��ư Ȱ��ȭ  
	if ($nstartpage <= $totalpage)   
		echo ("<a href=recipe.php?board=testboard&cblock=$nblock&cpage=$nstartpage&class=$class&mode=$mode><i class='fa-sharp fa-solid fa-chevron-right' style='font-size:20px; position:relative; top:4px; color:black;'></i></a> ");

	echo ("</td></tr></table>");
   
mysql_close($con);
?>
<? include ("bot.php");?>