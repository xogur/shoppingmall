<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
a {text-decoration:none;}
button.material:hover {
				color:white;
				background-color:#4E654E;
				padding:5px 10px 5px 10px;
				}
button.material {
				padding:5px 10px 5px 10px;
				border:0px;
				color:white;
				background-color:#6C8B6C;
				}
button.cook{background-color:#2D8A2D;
color:white;
border-radius:5px;
border:none;
width:50px;
height:50px;
}
</style>
<? include ("top.php");?>
<?
$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
	
$result = mysql_query("select * from recipe where menu='$menu'", $con);
$subresult = mysql_query("select * from product where recipe='$menu'", $con);
$total = mysql_num_rows($subresult);
$menu=mysql_result($result,0,"menu");
$img=mysql_result($result,0,"img");
$produce=mysql_result($result,0,"produce");
$how=mysql_result($result,0,"how");
$material=mysql_result($result,0,"material");
if ($menu == ä����){
	$submenu ="chaegaejang";
}
if ($menu == ���ܼض� ){
	$submenu ="somddam";
}
if ($menu == �ڵκ������){
	$submenu ="jadubibim";
}
if ($menu == �丶��ް�����){
	$submenu ="tomatoegg";
}
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-top:100px; border-collapse:separate; border-spacing:40px; border-radius:10px; '>
    <tr><td width=400 align=center rowspan=2 style='padding:30 50 30 50px; border-right:0.5px solid lightgray;'>
	<a href=# onclick=\"window.open('./pds/$img', '_new', 'width=450, height=480')\"><img src='./pds/$img' width=400 height=300 border=0 style='border-radius:10px;'></a></td>
	<td align=left colspan=2 height=100 style='border-bottom:0.5px solid lightgray; font-size:30px;'>$menu<br><br>
	");
	$likeresult = mysql_query("select * from member where uid='$UserID'", $con);
	$heartresult = mysql_query("select heart from recipe where menu='$menu'", $con);
	$like=mysql_result($likeresult,0,"$submenu");
	$heart=mysql_result($heartresult,0,"heart");
	echo("<form action='like-pass.php?heart=$like&submenu=$submenu&menu=$menu' method=post name=comma>");
	if ($like == 0 or !$like){
		echo("
	<button style='background-color:white; border:none;'><font size=4><i class='fa-regular fa-heart'>&nbsp;like&nbsp;($heart)</i></button></td>
	</tr>");
	}
	if($like == 1){
		echo("
	<button style='background-color:white; border:none;'><font size=4><i class='fa-solid fa-heart' style='color:red'>&nbsp;like&nbsp;($heart)</i></button></td>
	</tr>");
	}
	
echo("</form>
	<tr><td width=45 valign=top><button class='cook'>�丮<br>���</button></td><td valign=top>$material</td></tr></table>");
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-top:50px;'>
	<tr><td align=left height=50>���û�ǰ</td></tr>");
echo ("<center><table border=0 width=1100 style='margin-bottom:10px; border-top:4px solid #97B742; border-bottom:0.5px solid lightgray;'><tr>");
if   ($cpage=='') $cpage=1;    // $cpage -  ���� ������ ��ȣ
	$pagesize = 2;                // $pagesize - �� �������� ����� ��� ����

	$totalpage = (int)($total/16);
	if (($total%16)!=0) $totalpage = $totalpage + 1;
	$counter = 0;
	$subcounter = 0;

	while ($counter < $total && $counter < 20 && $subcounter < $pagesize) :
	$newcounter=($cpage-1)*16+$counter;
	if ($newcounter == $total) break;
		if ($newcounter > 0 && ($newcounter % 8) == 0){ 
		$subcounter = $subcounter + 1;
		if ($subcounter >= $pagesize){
			break;
		}
		else if(($newcounter%16) != 0){
			echo ("</tr><tr><td colspan=5><hr size=1 color=green width=100%></td></tr><tr>");
			}
		}
		$name=mysql_result($subresult,$newcounter,"name");
		$price=mysql_result($subresult,$newcounter,"price2");
		$userfile=mysql_result($subresult,$newcounter,"userfile");
		$review=mysql_result($subresult,$newcounter,"review");
		$code=mysql_result($subresult,$newcounter,"code");
		
		echo ("<td width=135 height=300 align=center style='padding:20px 5px 20px 5px;'><a href=p-show.php?code=$code style='ccolor:black;'> <img src='./pds/$userfile' width=100 height=120 border=0 style='border-radius:10px;'><br><font color=blue style='text-decoration:none; font-size:10pt; color:black;'></font><br><br><font color=blue style='text-decoration:none; font-size:10pt; color:black;'>$name</a></font><br>");
		echo ("<font color=black size=2><b>$price&nbsp;��</font><br><font color=black size=2><b>���� ($review)</font></td>");
		$counter++;
	endwhile;
echo ("</tr></table>");
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-bottom:50px;'>
	<tr><td align=right height=50><button class='material'><a style='color:white;' href=tobag.php?menu=$menu><i class='fa-solid fa-cart-shopping' style='color:white; font-size:10px;'></i>&nbsp&nbsp��� �� ���� ���</a></button></td></tr></table>");
if($menu == ä����){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>��</font><br>
	<font size=4 color=#93B340><b>��� ���� ������</font><br><br>
<font size=6><b>ä����</b></font><br><br>
<font size=3 color=#8B8B8B>�������� ����� �丮�� ã�´ٸ� ä������ ����? ��⸦ ���� ���� ��� �������̿���.<br>
ä�ҿ� ������ ��� �ְ� ���� ���� ����ϰ� ��������.<br>
ĮĮ�ϰ� ��ū�� ���� ���п� �� �׸� �԰� ���� ���� �� ���� ������̿���.<br><br><font style='font-size:100px; color:lightgray;'>��</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style=' margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>�̷��� ���弼��</font><br><br>
	<font style='font-size:14px;'>
1.</b>���� �з��� ��� ��Ḧ ���� ������� ����� �ּ���.<br><br>
<b>2.</b> ���� 0.5cm �β��� ���� ���, ���Ĵ� 1cm �β��� ä ��� �ּ���. ���Ĵ� 6~7cm ���̷� ��� ��� �ּ���.<br><br>
<b>3.</b> ������ û��ä, ��縮�� �Ա� ���� �ٵ��, ���ִ� ������ �ľ� ���⸦ ������ �ּ���.<br><br>
<b>4.</b> ���� ���� �װ� �ٽø��� ���� �� ���̴ٰ� �ٽø��� ��������, û��ä�� ������ ä�Ҹ� �ְ� ���� �ּ���.<br><br>
<b>5.</b> ������ ������� �ְ� �� ���� �� 1�ð����� ���̴ٰ� û��ä�� �־� �ּ���.<br><br>
<b>6.</b> �ұ����� ���� ���� �� �ѼҲ� ���� �ָ� �ϼ��˴ϴ�.</td></tr></table>");
}
if($menu == �丶��ް�����){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>��</font><br>
	<font size=4 color=#93B340>������ �ް��� ��ŭ�� �丶���� ����</font><br><br>
<font size=6><b>�丶��ް�����</b></font><br><br>
<font size=3 color=#8B8B8B>���� �����ϰ� �߽��� ���� �� �� �ִ� '��޺�'�Դϴ�.<br>
�ް��� �丶�信 ���ҽ��� ����� ¬�ɸ��ϸ鼭�� ����� ���� ��ǰ����.<br>
���̾�Ʈ �丮�ε� �����̴� �ݺ��Ǵ� ���̾�Ʈ �Ĵܿ� �����ִٸ� �õ��غ�����!<br><br><font style='font-size:100px; color:lightgray;'>��</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style=' margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>�̷��� ���弼��</font><br><br>
	<font style='font-size:14px;'>
1.</b> �丶��� ������ �ľ� ������ ������ �� 6��� �ϰ�, ���Ĵ� 4cm ���̷� ��� �ּ���.<br><br>
<b>2.</b> ���� �ް��� �� �ְ� ���ҽ��� ���� ���� Ǯ�� �ּ���.<br><br>
<b>3.</b> �ޱ� �������ҿ� �Ŀ����� �θ� �� ���� ����, ����, �ĸ� �ְ� ���� �ּ���.<br><br>
<b>4.</b> �鿡 ���� ���� �����ϸ� �丶�並 �ְ� ���� �ּ���.<br><br>
<b>5.</b> �丶�䰡 �� ���� ������ ���� ���̰� �ް��� �־� ��ũ������ �� �������� ���ĸ� �ְ� �ѹ� ���� �ּ���.<br><br>
<b>6.</b> �븦 �׸��� ��� ���尡��(�����߸� �׶��δ��� ���� ����ϼ���)�� �ѷ� �ּ���.</td></tr></table>");
}
if($menu == ���ܼض�){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>��</font><br>
	<font size=4 color=#93B340>�����ϰ� ¬������ �±��� ������</font><br><br>
<font size=6><b>���ܼض�</b></font><br><br>
<font size=3 color=#8B8B8B>�ض��� �׸����ľ߷� ���� �±��� �����带 ���ؿ�.<br>
Ư���ϰ� ���ľ� ��� ���ܸ� Ȱ���� �ض��� ��������.<br>
������ �����԰� ����, ������ ������ ��, ������ ��ŭ��, �ǽ� �ҽ��� ¬©�� ���� ���ÿ� ���� �� �ִ� �̱����� �����忹��.<br><br><font style='font-size:100px; color:lightgray;'>��</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style=' margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>�̷��� ���弼��</font><br><br>
	<font style='font-size:14px;'>
1.</b> ������ ���� ���ܴ� ���� �κа� ���� ������ �� 0.5cm �β��� ä����ּ���. ��ٵ� 0.5cm �β��� ä���, ����丶��� ������ �� �� ������ ���, ����� �ٸ� ��� �غ��� �ּ���.<br><br>
<b>2.</b> ���ð� ��Ʈ������, �ǻ���, ������ ���� ���� �ּ���.<br><br>
<b>3.</b> ������ ������ �߶� ���� ¥ �ּ���.<br><br>
<b>4.</b> ���� �ǽ� �ҽ�, ����, ������ 3ū���� �ְ� ���� ���� �� ��, �踦 �ְ� ������ �ּ���.<br><br>
</td></tr></table>");
}
if($menu == �ڵκ������){
echo ("
<center>
	<table width=1100 border=0 align=center style=' margin-bottom:100px;'>
	<tr><td align=center  width=400><font style='font-size:100px; color:lightgray;'>��</font><br>
	<font size=4 color=#93B340><b>���� ���� �����ϰ� �� ���� ä���ִ�</font><br><br>
<font size=6><b>�ڵκ������</b></font><br><br>
<font size=3 color=#8B8B8B>�ָ� ���Ŀ� ��������� ���� �� ����.<br>
������ ����忡 ���� ���� �� ������ �� ���� ��Ʈ������ Ǯ����ϴ�.<br>
�ƻ��ϰ� �ÿ��� ���̿� ������ ��ġ, ������ ��ö ���� �ڵη� ������ ��信 ��ĥ���� ��������.<br><br><font style='font-size:100px; color:lightgray;'>��</font></td></tr></table>");
echo ("
<center>
	<table width=900 border=0 align=center style='margin-bottom:200px;'>
	<tr><td align=left  width=400><b><font size=5>�̷��� ���弼��</font><br><br>
	<font style='font-size:14px;'>
1.</b> ������ ���� ���� 3~4�а� ���� �� ������ ��� ���⸦ �� ¥ �ּ���.<br><br>
<b>2.</b> �ڵδ� �����̽��ϰ�, ���̴� ���ð� ä ��� �ּ���. ��ġ�� ���⸦ �����ϰ� ���� ���� �ּ���.<br><br>
<b>3.</b> �з��� ������, ����, ���ʸ� ���� ������� ����� �ּ���.<br><br>
<b>4.</b> �׸��� ���� ������ ��� ���� ������� �ø� �� �ڵ�, ����, ��ġ, ���� �ް���
��鿩 �ּ���. �������� ����� �ּ� �ѷ� �ּ���.
</td></tr></table>");
}
echo ("
<center>
	<table width=1100 border=0 align=center style='margin-bottom:50px;'>
	<tr><td align=right height=50><button class='material' width=400 height=300><a style='color:white;' href=recipe.php>&nbsp&nbsp<i class='fa-solid fa-scroll' style='font-size:30px;'></i>&nbsp&nbsp<font size=5>�ٸ� ������ ��������</a></button></td></tr></table>");
?>
<? include ("bot.php");?>