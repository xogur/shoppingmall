<script language='Javascript'>
function a() {
   var id = document.idcheck.newid.value;
   if (id == '') {
        window.alert('���̵� �Է��� �ּ���!')
   } else {
if (id.length < 5) 
             window.alert('���̵� 5���� �̻� �Է��� �ּ���!')
          else 
             document.idcheck.submit();
   }
}

function b() {
    opener.comma.uid.value = document.idcheck.id.value;
    this.close();
}
</script>

<form method=post action=id_check.php name=idcheck>
<table border=1 align=center width=400>
<tr><td height=130 align=center>

<?

if   (isset($newid)) $id = $newid;

$con = mysql_connect("localhost", "root", "apmsetup");
mysql_select_db("comma", $con);
	
$result = mysql_query("select * from member where uid='$id'",$con);
$total = mysql_num_rows($result);
	
if ($total == 0) {
echo ("<font size=2 color=red><b>$id</b></font><font size=2> ��(��) ��� ������   ���̵��Դϴ�.<br>����Ͻðڽ��ϱ�?<br><br>[<a href='javascript:b()'> <input type=hidden name=id value='$id'>YES</a>]<br><br>* <b>���̵�</b> <input type=text name=newid   size=20>&nbsp;&nbsp;<a href='javascript:a()'>ID�ߺ��˻�</a>");
} else {
echo "<font size=2 color=red><b>$id</b></font><font size=2> ��(��) �̹� ������� ���̵��Դϴ�.<br>�ٸ� ���̵� �Է��� �ּ���.<br><br><br>* <b>���̵� </b> <input type=text   name=newid size=20>&nbsp;&nbsp;<a href='javascript:a()'>ID�ߺ��˻�</a>";
}

mysql_close($con);

?>

</td></tr>
</table>
</form>
