<?

$con=mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

mysql_query("delete from testboard where id=$id",$con);
mysql_query("delete from memojang where id=$id",$con);
mysql_query("update product set review=review-1 where code='$code'", $con);
echo("
	<script>
	window.alert('���� ���� �Ǿ����ϴ�.');
	</script>
");

// ������ �ۺ��� �� ��ȣ�� ū �Խù��� �� ��ȣ�� 1�� ����
$tmp = mysql_query("select id from testboard order by id desc", $con);
$last = mysql_result($tmp, 0, "id");
     // ���� ������ �� ��ȣ ����
$i = $id + 1;       // ������ ���� ��ȣ���� 1�� ū �� ��ȣ���� ����
while($i <= $last):
	mysql_query("update testboard set id=id-1 where id=$i", $con);
	mysql_query("update memojang set id=id-1 where id=$i", $con);
	$i++;
endwhile;

// �� ���� ����� �����ֱ� ���� �� ��� ���� ���α׷� ȣ��
echo("<meta http-equiv='Refresh' content='5; url=testboard.php?board=testboard'>");

mysql_close($con);

?>
