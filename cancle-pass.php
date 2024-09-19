<?
echo("
<!DOCTYPE html>
<html>
<head>
<title>자바스크립트</title>
<script>
var con_test = confirm('정말 주문을 취소하시겠습니까?');
if(con_test == true){
  document.write('주문이 취소되었습니다.');
  location.href='ordercancel.php?ordernum=$ordernum&buydate=$buydate&code=$code';
}
else if(con_test == false){
  document.write('이전 페이지로 돌아갑니다.');
  location.href='mypage.php';
}
</script>
</head>
<body>
</body>
</html>");
?>