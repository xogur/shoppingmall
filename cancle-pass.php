<?
echo("
<!DOCTYPE html>
<html>
<head>
<title>�ڹٽ�ũ��Ʈ</title>
<script>
var con_test = confirm('���� �ֹ��� ����Ͻðڽ��ϱ�?');
if(con_test == true){
  document.write('�ֹ��� ��ҵǾ����ϴ�.');
  location.href='ordercancel.php?ordernum=$ordernum&buydate=$buydate&code=$code';
}
else if(con_test == false){
  document.write('���� �������� ���ư��ϴ�.');
  location.href='mypage.php';
}
</script>
</head>
<body>
</body>
</html>");
?>