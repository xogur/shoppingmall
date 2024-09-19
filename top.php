<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
.hamContainer{
	position:absolute;
	z-index:3;
  
  width: 30rem;
  top:20px;
  left:50px;
}

.hamContainer input{
  height: 50px;
  width: 50px;
  z-index: 3;
  opacity: 0;
}

.hamContainer .hamLines{
   width: 50px;
   height: 30px;
   display: flex;
   flex-direction: column;
   justify-content: space-between;
   align-content: center;
   position: absolute;
   top: 10px;
   z-index: -1;
   /* opacity: 0; */
}

.hamContainer .hamLines span{
  height: 5px;
  width: 40px;
  background: #167626;
}

.hamContainer .hamItems{
     height: 30rem;
     width: 20rem;
     background: #7DC90B;
     display: flex;
     justify-content: center;
     align-content: center;
     display: none;
     padding: 1rem;
     border-radius: 30px;
}
.hamContainer .hamItems ul{
     list-style: none;
     text-decoration: none;
     text-transform: capitalize;
     font-size: 2em;
}
.hamContainer .hamItems ul li{
     margin: 1.5rem 0 0 2rem;
}
.hamContainer .hamItems ul li a{
     text-decoration: none;
     color: white;
}
.hamContainer .hamItems ul li a:hover{
      background: #6666;
      padding: 0.3rem 0.5rem;
      border-radius: 30px;
      
}
.hamContainer  .hamLines .line1{
  transform-origin: 0% 0%;
  transition: transform 0.4s ease-in-out;
}
.hamContainer .hamLines .line2{
  transition: transform 0.4s ease-in-out;
}
.hamContainer .hamLines .line3{
  transform-origin: 0% 100%;
  transition: transform 0.4s ease-in-out;
}
.hamContainer input[type="checkbox"]:checked ~ .hamItems{
  display: block;
  
}
.hamContainer  input[type="checkbox"]:checked ~ .hamLines .line1{
  transform: rotate(45deg);
  background: #7DC90B;
}
.hamContainer  input[type="checkbox"]:checked ~ .hamLines .line2{
  transform: scaleY(0);
  background: #7DC90B;
}
.hamContainer  input[type="checkbox"]:checked ~ .hamLines .line3{
  transform: rotate(-45deg);
  background: #7DC90B;
}
a {text-decoration:none;}
</style>
<body style="margin:0px; padding:0px;">
<h1 style="background-color:white; color:white; height:70; border-bottom:1px solid;"></h1>
<center>
<a href="home.php"><img src="무제1.png" width=350 height=250 style="position:absolute; top:0px; margin-top:-66px; left:700px; z-index:10"></img></a>
</center>

<h1 style="background-color:#gray; box-shadow:5px 2px 2px gray; height:1; position:relative; z-index:3;"></h1>
</body>
<?
$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// 전체 쇼핑백 테이블에서 특정 사용자의 구매 정보만을 읽어낸다
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$total = mysql_num_rows($result);
?>
<?
echo ("<div class='hamContainer'>
        <input type='checkbox'>
        <div class='hamLines'>
            <span class='line line1'></span>
            <span class='line line2'></span>
            <span class='line line3'></span>
        </div>
        <div class='hamItems' style='font-size:10;'>
            <ul>
				<li><a href='p-list.php?class=0'>전체</a></li>
                <li><a href='p-list.php?class=1'>과일</a></li>
                <li><a href='p-list.php?class=2'>채소</a></li>
                <li><a href='p-list.php?class=3'>곡류</a></li>
                <li><a href='p-list.php?class=4'>서류</a></li>
                <li><a href='p-list.php?class=5'>화장품·생활용품</a></li>
                <li><a href='p-list.php?class=6'>장류·소스류</a></li>
				<li><a href='p-list.php?class=7'>정육·계란류</a></li>
				<li><a href='p-list.php?class=8'>기타</a></li>
            </ul>
        </div>
     </div>");
if ($UserID==admin) {
	echo("
	<a href='logout.php' style='position:absolute; right:200px; top:20px; z-index:3; font-size:14; text-decoration:none; color:#767676 z-index:3;'>로그아웃</a>
<a href='admin.php' style='position:absolute; right:270px; top:20px; z-index:3; font-size:14; color:#7DC90B; text-decoration:none; z-index:3;'>관리자페이지</a>
<a href='showbag.php' style='position:absolute; right:100px; top:30px; z-index:3'><i class='fa-solid fa-cart-shopping' style='color:#228B22; font-size:40px; z-index:3;'></i><font style='position:absolute; right:14px; font-size:18px; top:-2px; color:white;'>$total</font><font style='position:absolute; right:14px; font-size:18px; top:-2px; color:white;'>$total</font></a>");
}
else {
if (!$UserID){
echo("
<a href='login.php' style='position:absolute; right:200px; top:20px; z-index:3; font-size:14; color:#767676 z-index:10;'>로그인</a>
<a href='member.php' style='position:absolute; right:270px; top:20px; z-index:3; font-size:14; color:#7DC90B; text-decoration:none; z-index:3;'>회원가입</a>
<a style='position:absolute; right:100px; top:30px; z-index:3'><i class='fa-solid fa-cart-shopping' style='color:#228B22; font-size:40px; z-index:3;'></i><font style='position:absolute; right:14px; font-size:18px; top:-2px; color:white;'>$total</font></a> ");
}
else {
	echo("
<a href='logout.php' style='position:absolute; right:200px; top:20px; z-index:3; font-size:14; text-decoration:none; color:#767676 z-index:3;'>로그아웃</a>
<a href='mypage.php' style='position:absolute; right:270px; top:20px; z-index:3; font-size:14; color:#7DC90B; text-decoration:none; z-index:3;'>마이페이지</a>
<a href='showbag.php' style='position:absolute; right:100px; top:30px; z-index:3;'><i class='fa-solid fa-cart-shopping' style='color:#228B22; font-size:40px; z-index:3;'></i><font style='position:absolute; right:14px; font-size:18px; top:-2px; color:white;'>$total</font><font style='position:absolute; right:14px; font-size:18px; top:-2px; color:white;'>$total</font></a> ");
}
}
?>
<style>
.search {
  position: relative;
  width: 200px;
}

input.search {
  width: 100%;
  border: 1px solid #bbb;
  border-radius: 20px;
  padding: 10px 12px;
  font-size: 14px;
  background-color:#7DC90B;
  height:40px;
}

img.search {
  position : absolute;
  width: 17px;
  top: 10px;
  right: 12px;
  margin: 0;
}
</style>
<?
echo ("<form method=post action=p-search.php?board=testboard>
<div class='search' style='position:absolute; right:160px; top:45px; z-index:3;'>
  <input type='text' class='search' placeholder='검색어 입력' name=key value=$key>
  <button style='position:absolute; right:10px; background-color:#7DC90B; border:none; top:10px;'><img class='search' src='https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/icon/search.png' style='position:absolute; top:0px;'></button>
</div></form>");
?>
