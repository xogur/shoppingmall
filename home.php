<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
a{text-decoration:none;}
.hamContainer{
	position:absolute;
	z-index:2;
  
  width: 30rem;
  top:10px;
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
</style>

<style>
@keyframes tonext {
  75% {
    left: 0;
  }
  95% {
    left: 100%;
  }
  98% {
    left: 100%;
  }
  99% {
    left: 0;
  }
}

@keyframes tostart {
  75% {
    left: 0;
  }
  95% {
    left: -300%;
  }
  98% {
    left: -300%;
  }
  99% {
    left: 0;
  }
}

@keyframes snap {
  96% {
    scroll-snap-align: center;
  }
  97% {
    scroll-snap-align: none;
  }
  99% {
    scroll-snap-align: none;
  }
  100% {
    scroll-snap-align: center;
  }
}

body {
  max-width: 37.5rem;
  margin: 0 auto;
  padding: 0 1.25rem;
  font-family: 'Lato', sans-serif;
}

* {
  box-sizing: border-box;
  scrollbar-color: transparent transparent; /* thumb and track color */
  scrollbar-width: 100px;
}

*::-webkit-scrollbar {
  width: 0;
}

*::-webkit-scrollbar-track {
  background: transparent;
}

*::-webkit-scrollbar-thumb {
  background: transparent;
  border: none;
}

* {
  -ms-overflow-style: none;
}

ol, li {
  list-style: none;
  margin: 0;
  padding: 0;
}

.carousel {
  position: relative;
  padding-top: 75%;
  filter: drop-shadow(0 0 10px #0003);
  perspective: 100px;
}

.carousel__viewport {
	z-index:-10;
  position: absolute;
  top: -100;
  right: 0;
  bottom: 0;
  left: 0;
  display: flex;
  overflow-x: scroll;
  counter-reset: item;
  scroll-behavior: smooth;
  scroll-snap-type: x mandatory;
  width:1770;
  height:700px;
  
}

.carousel__slide {
  position: relative;
  flex: 0 0 100%;
  width: 100%;
  background-color: #f99;
  counter-increment: item;
  
}
.carousel__slide:nth-child(even) {
  background-color: black;
}



.carousel__snapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  scroll-snap-align: center;
}

@media (hover: hover) {
  .carousel__snapper {
    animation-name: tonext, snap;
    animation-timing-function: ease;
    animation-duration: 2s;
    animation-iteration-count: infinite;
  }

  .carousel__slide:last-child .carousel__snapper {
    animation-name: tostart, snap;
  }
}

@media (prefers-reduced-motion: reduce) {
  .carousel__snapper {
    animation-name: none;
  }
}

.carousel:hover .carousel__snapper,
.carousel:focus-within .carousel__snapper {
  animation-name: none;
}

.carousel__navigation {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  text-align: center;
}

.carousel__navigation-list,
.carousel__navigation-item {
  display: inline-block;
}

.carousel__navigation-button {
  display: inline-block;
  width: 1.5rem;
  height: 1.5rem;
  background-color: #333;
  background-clip: content-box;
  border: 0.25rem solid transparent;
  border-radius: 50%;
  font-size: 0;
  transition: transform 0.1s;
  position:relative; left:540px; top:100px;
}

.carousel::before,
.carousel::after,
.carousel__prev,
.carousel__next {
  position: absolute;
  top: 0;
  margin-top: 37.5%;
  width: 4rem;
  height: 4rem;
  transform: translateY(-50%);
  border-radius: 50%;
  font-size: 0;
  outline: 0;
}

.carousel::before,
.carousel__prev {
  left: -1rem;
}

.carousel::after,
.carousel__next {
  right: -1rem;
}



.carousel::before {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='0,50 80,100 80,0' fill='%23fff'/%3E%3C/svg%3E");
  position:absolute; left:50px;
}

.carousel::after {
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolygon points='100,50 20,100 20,0' fill='%23fff'/%3E%3C/svg%3E");
position:absolute; right:-1000px;
}

</style>
<?
$con =   mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);

// ��ü ���ι� ���̺��� Ư�� ������� ���� �������� �о��
$result = mysql_query("select * from shoppingbag where session='$Session'", $con);
$total = mysql_num_rows($result);
?>
<? echo("
<body style='margin:0px; padding:0px;'>
<h1 style='background-color:white; color:white; height:70; border-bottom:1px solid;'>
<img src='����1.png' width=350 height=250 style='position:absolute; top:-70px; left:700px; z-index:1'>
</h1>
<h1 style='background-color:#gray; box-shadow:5px 2px 2px gray; height:1;'>
</body>
<hr style='position:absolute; top:80px; z-index:1; background-color:gray;' width=1770 height=1></hr>");

echo ("<div class='hamContainer'>
        <input type='checkbox'>
        <div class='hamLines'>
            <span class='line line1'></span>
            <span class='line line2'></span>
            <span class='line line3'></span>
        </div>
        <div class='hamItems' style='font-size:10;'>
            <ul>
				<li><a href='p-list.php?class=0'>��ü</a></li>
                <li><a href='p-list.php?class=1'>����</a></li>
                <li><a href='p-list.php?class=2'>ä��</a></li>
                <li><a href='p-list.php?class=3'>���</a></li>
                <li><a href='p-list.php?class=4'>����</a></li>
                <li><a href='p-list.php?class=5'>�����Ĺ�</a></li>
                <li><a href='p-list.php?class=6'>������ҽ���</a></li>
				<li><a href='p-list.php?class=7'>�����������</a></li>
				<li><a href='p-list.php?class=8'>��Ÿ</a></li>
            </ul>
        </div>
     </div>
");
if ($UserID==admin){
	echo("
	<a href='logout.php' style='position:absolute; right:200px; top:20px; z-index:1; font-size:14; color:#767676; text-decoration:none;'>�α׾ƿ�</a>
<a href='admin.php' style='position:absolute; right:270px; top:20px; z-index:1; font-size:14; color:#7DC90B; text-decoration:none;'>������������</a>
<a style='position:absolute; right:100px; top:30px; z-index:1'><i class='fa-solid fa-cart-shopping' style='color:#228B22'></i></a> ");
}
else {
if (!$UserID){
echo("
<a href='login.php' style='position:absolute; right:200px; top:20px; z-index:1; font-size:14; color:#767676; text-decoration:none;'>�α���</a>
<a href='member.php' style='position:absolute; right:270px; top:20px; z-index:1; font-size:14; color:#7DC90B; text-decoration:none;'>ȸ������</a>
<a style='position:absolute; right:100px; top:30px; z-index:1'><i class='fa-solid fa-cart-shopping' style='color:#228B22'></i></a> ");
}
else {
	echo("
<a href='logout.php' style='position:absolute; right:200px; top:20px; z-index:1; font-size:14; color:#767676; text-decoration:none;'>�α׾ƿ�</a>
<a href='mypage.php' style='position:absolute; right:270px; top:20px; z-index:1; font-size:14; color:#7DC90B; text-decoration:none;'>����������</a>
<a href='showbag.php' style='position:absolute; right:100px; top:30px; z-index:1'><i class='fa-solid fa-cart-shopping' style='color:#228B22; font-size:40px;'></i><font style='position:absolute; right:14px; font-size:18px; top:-2px; color:white;'>$total</font></a> ");
}
}
?>
<style>
.search {
  position: relative;
  width: 200px;
}

input {
  width: 100%;
  border: 1px solid #bbb;
  border-radius: 20px;
  padding: 10px 12px;
  font-size: 10px;
  background-color:#7DC90B;
  height:40px;
}

img.search {
  position : absolute;
  width: 17px;
  right: 12px;
  margin: 0;
}
</style>
<?

$con = mysql_connect("localhost","root","apmsetup");
mysql_select_db("comma",$con);
$result = mysql_query("select * from product order by hit desc", $con);
	$code1=mysql_result($result,0,"code");
	$name1=mysql_result($result,0,"name");
	$userfile1=mysql_result($result,0,"userfile");
	$fileexplain1=mysql_result($result,0,"fileexplain");
	$price21=mysql_result($result,0,"price2");
	$review1=mysql_result($result,0,"review");
	
	$code2=mysql_result($result,1,"code");
	$name2=mysql_result($result,1,"name");
	$userfile2=mysql_result($result,1,"userfile");
	$fileexplain2=mysql_result($result,1,"fileexplain");
	$price22=mysql_result($result,1,"price2");
	$review2=mysql_result($result,1,"review");
	
	$code3=mysql_result($result,2,"code");
	$name3=mysql_result($result,2,"name");
	$userfile3=mysql_result($result,2,"userfile");
	$fileexplain3=mysql_result($result,2,"fileexplain");
	$price23=mysql_result($result,2,"price2");
	$review3=mysql_result($result,2,"review");
	
	$code4=mysql_result($result,3,"code");
	$name4=mysql_result($result,3,"name");
	$userfile4=mysql_result($result,3,"userfile");
	$fileexplain4=mysql_result($result,3,"fileexplain");
	$price24=mysql_result($result,3,"price2");
	$review4=mysql_result($result,3,"review");
	
	$code5=mysql_result($result,4,"code");
	$name5=mysql_result($result,4,"name");
	$userfile5=mysql_result($result,4,"userfile");
	$fileexplain5=mysql_result($result,4,"fileexplain");
	$price25=mysql_result($result,4,"price2");
	$review5=mysql_result($result,4,"review");
	
	$code6=mysql_result($result,5,"code");
	$name6=mysql_result($result,5,"name");
	$userfile6=mysql_result($result,5,"userfile");
	$fileexplain6=mysql_result($result,5,"fileexplain");
	$price26=mysql_result($result,5,"price2");
	$review6=mysql_result($result,5,"review");
	
	$code7=mysql_result($result,6,"code");
	$name7=mysql_result($result,6,"name");
	$userfile7=mysql_result($result,6,"userfile");
	$fileexplain7=mysql_result($result,6,"fileexplain");
	$price27=mysql_result($result,6,"price2");
	$review7=mysql_result($result,6,"review");
	
	$code8=mysql_result($result,7,"code");
	$name8=mysql_result($result,7,"name");
	$userfile8=mysql_result($result,7,"userfile");
	$fileexplain8=mysql_result($result,7,"fileexplain");
	$price28=mysql_result($result,7,"price2");
	$review8=mysql_result($result,7,"review");
	
	$code9=mysql_result($result,8,"code");
	$name9=mysql_result($result,8,"name");
	$userfile9=mysql_result($result,8,"userfile");
	$fileexplain9=mysql_result($result,8,"fileexplain");
	$price29=mysql_result($result,8,"price2");
	$review9=mysql_result($result,8,"review");

mysql_close($con);
?>
<?
echo ("<form method=post action=p-search.php?board=testboard>
<div class='search' style='position:absolute; right:160px; top:45px; z-index:1;'>
  <input type='text' placeholder='�˻��� �Է�' name=key style='font-size:14px;'>
  <button style='position:absolute; top:10px; right:10px; background-color:#7DC90B; border:none;'><img class='search' src='https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/icon/search.png'></button>
</form>
</div>
<section class='carousel' aria-label='Gallery'>
  <ol class='carousel__viewport'>
    <li id='carousel__slide1'
        tabindex='0'
        class='carousel__slide'>
		<a href='p-search.php?class=8&key=��'>
		<img src='���.jpg' width=1770 height=700>
      <div class='carousel__snapper'></div>
        <a href='#carousel__slide4'
           class='carousel__prev'>Go to last slide</a>
        <a href='#carousel__slide2'
           class='carousel__next'>Go to next slide</a>
		   </img>
		   </a>
    </li>
	</a>
    <li id='carousel__slide2'
        tabindex='0'
        class='carousel__slide'>
		<a href='p-search.php?class=3'>
		<img src='���2.jpg' width=1770 height=700>
      <div class='carousel__snapper'></div>
      <a href='#carousel__slide1'
         class='carousel__prev'>Go to previous slide</a>
      <a href='#carousel__slide3'
         class='carousel__next'>Go to next slide</a>
		</img>
		 </a>
    </li>
    <li id='carousel__slide3'
        tabindex='0'
        class='carousel__slide'>
		<a href='p-search.php?class=2&key=����'>
		<img src='���3.jpg' width=1770 height=700>
      <div class='carousel__snapper'></div>
      <a href='#carousel__slide2'
         class='carousel__prev'>Go to previous slide</a>
      <a href='#carousel__slide4'
         class='carousel__next'>Go to next slide</a>
		 </img>
		 </a>
    </li>
    <li id='carousel__slide4'
        tabindex='0'
        class='carousel__slide'>
		<a href='recipe.php'>
		<img src='���5.jpg' width=1770 height=700>
      <div class='carousel__snapper'></div>
      <a href='#carousel__slide3'
         class='carousel__prev'>Go to previous slide</a>
      <a href='#carousel__slide1'
         class='carousel__next'>Go to first slide</a>
		 </img>
		 </a>
    </li>
  </ol>
  <aside class='carousel__navigation'>
    <ol class='carousel__navigation-list'>
      <li class='carousel__navigation-item'>
        <a href='#carousel__slide1'
           class='carousel__navigation-button'>Go to slide 1</a>
      </li>
      <li class='carousel__navigation-item'>
        <a href='#carousel__slide2'
           class='carousel__navigation-button'>Go to slide 2</a>
      </li>
      <li class='carousel__navigation-item'>
        <a href='#carousel__slide3'
           class='carousel__navigation-button'>Go to slide 3</a>
      </li>
      <li class='carousel__navigation-item'>
        <a href='#carousel__slide4'
           class='carousel__navigation-button'>Go to slide 4</a>
      </li>
    </ol>
  </aside>
</section>
<h2 style='position:absolute; top:700px; left:650px; font-family: 'Nanum Gothic Coding', monospace; font-size:40;'>��ٱ��Ϸ� �ٷ�!! ���� ��õ ��ǰ!!<br><font style='font-size:18; color:#69B33F; position:relative; right:30px;'>�α� ��ǰ�� �ż��� ��ö ��ǰ���� �ѹ��� ����������</font></br></br></h2>
<!DOCTYPE html>
<html lang='en'>
  <head>

    <meta
      name='viewport'
      content='width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1'
    />
    <!-- Link Swiper's CSS -->
    <link
      rel='stylesheet'
      href='https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css'
    />

    <!-- Demo styles -->
    <style>
      .swiper {
        width: 1400px;
        height: 500px;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    </style>
  </head>

  <body class='bottom'>
    <!-- Swiper -->
    <div class='swiper mySwiper2' style='position:absolute; top:900px; left:150px;'>
      <div class='swiper-wrapper'>
        <div id=apple class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code1 style='ccolor:black;'><img src='./pds/$userfile1' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name1<br>$price21 �� <br>����($review1)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code2 style='ccolor:black;'><img src='./pds/$userfile2' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name2<br>$price22 �� <br>����($review2)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code3 style='ccolor:black;'><img src='./pds/$userfile3' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name3<br>$price23 �� <br>����($review3)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code4 style='ccolor:black;'><img src='./pds/$userfile4' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name4<br>$price24 �� <br>����($review4)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code5 style='ccolor:black;'><img src='./pds/$userfile5' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name5<br>$price25 �� <br>����($review5)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code6 style='ccolor:black;'><img src='./pds/$userfile6' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name6<br>$price26 �� <br>����($review6)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code7 style='ccolor:black;'><img src='./pds/$userfile7' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name7<br>$price27 �� <br>����($review7)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code8 style='ccolor:black;'><img src='./pds/$userfile8' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name8<br>$price28 �� <br>����($review8)</font></a></div>
        <div class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><a href=p-show.php?code=$code9 style='ccolor:black;'><img src='./pds/$userfile9' border=0 style='border-radius:10px; height:250; width:200'><font style='position:relative; top:20px; color:black;'>$name9<br>$price29 �� <br>����($review9)</font></a></div>
      </div>
      <div class='swiper-button-next' style='margin-top:20px; color:#85AB6F;'></div>
      <div class='swiper-button-prev' style='margin-top:20px; color:#85AB6F;'></div>
    </div>

    <!-- Swiper JS -->
    <script src='https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js'></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper('.mySwiper2', {
        slidesPerView: 5,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        }, spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
      });
    </script>
  </body>
</html>
<h2 style='position:absolute; top:1400px; left:700px; font-family: 'Nanum Gothic Coding', monospace; font-size:40;'>���� �̷� �޴� ���?<br><br><font style='font-size:18; color:#69B33F; position:relative; right:100px;'>���� ������ �����ϰ� ����ϰ� ä���ִ� �ǰ��� �� �� ����</font></br></br></h2>
");
$recipe =rand(1,4);
if ($recipe == 1){
echo ("
<img src='������.jpg' style='position:absolute; top:1650px; left:270px; border-radius:50px;' width=600 height=400></img>
<table style='position:absolute; top:1650px; right:50px; border-collapse:collapse;' border=0 width=700 height=400>
<tr><td valign=top height=40><font style='font-size:22px; color:#85AB6F;'>&nbsp;&nbsp;&nbsp;������ ������</font></td></tr>
<tr><td valign=top height=60><font style='font-size:35px; color:#85AB6F;'>&nbsp;&nbsp;<b>ä����</b></font></td></tr>
<tr><td valign=top height=200 style='border-bottom:1px solid lightgray; color:#A3A6A2;'><br>�������� ����� �丮�� ã�´ٸ� ä������ ����? ��⸦ ���� ���� ��� �������̿���. ä�ҿ� ������ ��� �ְ� ���� ���� ����ϰ� ��������. ĮĮ�ϰ� ��ū�� ���� ���п� �� �׸� �԰� ���� ���� �� ���� ������̿���.</td></tr>
<tr><td valign=top height=50 style='border-bottom:0.5px solid lightgray;'><a href='recipe-show.php?menu=ä����' style='color:#525252;'>&nbsp;&nbsp;������ ����</a> <i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr>
<tr><td valign=top height=50><a style='color:#525252;' href='tobag.php?menu=ä����'>&nbsp;&nbsp;��� ������ ����</a><i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr></table>");
}
if ($recipe == 2){
echo ("
<img src='���ܼض�.jpg' style='position:absolute; top:1650px; left:270px; border-radius:50px; ' width=600 height=400></img>
<table style='position:absolute; top:1650px; right:50px; border-collapse:collapse;' border=0 width=700 height=400>
<tr><td valign=top height=40><font style='font-size:22px; color:#85AB6F;'>&nbsp;&nbsp;&nbsp;�����ϰ� ¬������ �±��� ������</font></td></tr>
<tr><td valign=top height=60><font style='font-size:35px; color:#85AB6F;'>&nbsp;&nbsp;<b>���ܼض�</b></font></td></tr>
<tr><td valign=top height=200 style='border-bottom:1px solid lightgray; color:#A3A6A2;'><br>�ض��� �׸����ľ߷� ���� �±��� �����带 ���ؿ�.
Ư���ϰ� ���ľ� ��� ���ܸ� Ȱ���� �ض��� ��������.
������ �����԰� ����, ������ ������ ��, ������ ��ŭ��, �ǽ� �ҽ��� ¬©�� ���� ���ÿ� ���� �� �ִ� �̱����� �����忹��.</td></tr>
<tr><td valign=top height=50 style='border-bottom:0.5px solid lightgray;'><a href='recipe-show.php?menu=���ܼض�' style='color:#525252;'>&nbsp;&nbsp;������ ����</a><i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr>
<tr><td valign=top height=50><a style='color:#525252;' href='tobag.php?menu=���ܼض�'>&nbsp;&nbsp;��� ������ ����</a><i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr></table>");
}
if ($recipe == 3){
echo ("
<img src='�丶��ް�����.jpg' style='position:absolute; top:1650px; left:270px; border-radius:50px;' width=600 height=400></img>
<table style='position:absolute; top:1650px; right:50px; border-collapse:collapse;' border=0 width=700 height=400>
<tr><td valign=top height=40><font style='font-size:22px; color:#85AB6F;'>&nbsp;&nbsp;&nbsp;������ �ް��� ��ŭ�� �丶���� ����</font></td></tr>
<tr><td valign=top height=60><font style='font-size:35px; color:#85AB6F;'>&nbsp;&nbsp;<b>�丶��ް�����</b></font></td></tr>
<tr><td valign=top height=200 style='border-bottom:1px solid lightgray; color:#A3A6A2;'><br>���� �����ϰ� �߽��� ���� �� �� �ִ� '��޺�'�Դϴ�.
�ް��� �丶�信 ���ҽ��� ����� ¬�ɸ��ϸ鼭�� ����� ���� ��ǰ����.
���̾�Ʈ �丮�ε� �����̴� �ݺ��Ǵ� ���̾�Ʈ �Ĵܿ� �����ִٸ� �õ��غ�����!</td></tr>
<tr><td valign=top height=50 style='border-bottom:0.5px solid lightgray;'><a href='recipe-show.php?menu=�丶��ް�����' style='color:#525252;'>&nbsp;&nbsp;������ ����</a> <i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr>
<tr><td valign=top height=50><a style='color:#525252;' href='tobag.php?menu=�丶��ް�����'>&nbsp;&nbsp;��� ������ ����</a><i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr></table>");
}
if ($recipe == 4){
echo ("
<img src='�ڵκ������.jpg' style='position:absolute; top:1650px; left:270px; border-radius:50px;' width=600 height=400></img>
<table style='position:absolute; top:1650px; right:50px; border-collapse:collapse;' border=0 width=700 height=400>
<tr><td valign=top height=40><font style='font-size:22px; color:#85AB6F;'>&nbsp;&nbsp;&nbsp;���� ���� �����ϰ� �� ���� ä���ִ�</font></td></tr>
<tr><td valign=top height=60><font style='font-size:35px; color:#85AB6F;'>&nbsp;&nbsp;<b>�ڵκ������</b></font></td></tr>
<tr><td valign=top height=200 style='border-bottom:1px solid lightgray; color:#A3A6A2;'><br>�ָ� ���Ŀ� ��������� ���� �� ����.
������ ����忡 ���� ���� �� ������ �� ���� ��Ʈ������ Ǯ����ϴ�.
�ƻ��ϰ� �ÿ��� ���̿� ������ ��ġ, ������ ��ö ���� �ڵη� ������ ��信 ��ĥ���� ��������.

</td></tr>
<tr><td valign=top height=50 style='border-bottom:0.5px solid lightgray;'><a href='recipe-show.php?menu=�ڵκ������' style='color:#525252;'>&nbsp;&nbsp;������ ���� </a><i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr>
<tr><td valign=top height=50><a style='color:#525252;' href='tobag.php?menu=�ڵκ������'>&nbsp;&nbsp;��� ������ ����</a><i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr></table>");
}
?>
<style>

</style>
<?
echo ("<center>
		<hr width=1300 style='background-color:#2C6E00; position:absolute; bottom:-1400; left:200;'>
		");
echo ("<table border=0 style='border-collapse:collapse; table-layout:fixed; position:absolute; bottom:-1750; left:200;' width=1200 height=250>
		<tr><td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>1:1 ����<br><br><a href='tel:010-9072-1938'><i class='fa-solid fa-headset' style='color:#A7DF86; font-size:80px;'></i></a></br></td>
			<td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap><a href='testboard.php' style='color:#67A643'>�Խ���<br><br><img src='board.png'></img></a></td>
			<td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>ȸ��Ұ�<br><br><img src='company.png'></img></td>
			<td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>���<br><br><img src='delivery.png'></img></td>
		<td><img src='����1.png' width=300 height=200 style='position:relative; top:0px; z-index:1'></td></tr>
		<tr><td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'>���� ���� 11:00 ~ ���� 18:00<br><br>���� 12:00 ~ ���� 13:00<br><br>�޹� �����, �Ͽ���, ������</td>
			<td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'>��������<br><br>���� �Խ���</td>
			<td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'></td>
			<td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'>â���� â�����б�<br><br>CJ������� �ù� 1588-1255<br><br>CJ������� �ù踦 �̿����ּ���</td>
			<td></td></tr></table></hr>
			<h1 style='background-color:#gray; box-shadow:1px 1px 1px lightgray; height:1; width:1300; position:absolute; bottom:-1800; left:200;'></h1>
		<table border=0 style='border-collapse:collapse; table-layout:fixed; position:absolute; bottom:-2000; left:200;' width=1200 height=200>
		<tr valign=top><td colspan=5 style='font-size:14px; color:#90958D'>(��)���ߵ��繫���� �泲 â���� â�����б� 51ȣ�� 3��  ��ǥ:������
						<br><br>����� ��Ϲ�ȣ:123-45-44444			�������� ��ȣ å����:������
						<br><br>������:010-1234-4444				E-mail:snsk656@naver.com
						<br><br>Copyright 2021. The Chorocmaeul Co., Ltd.
						<br>������ �����ŷ��� ���� ���� ������ ���� ���θ��� ������ �Һ������غ����輭�񽺸� �̿��Ͻ� �� �ֽ��ϴ�. </td></tr>
						</table>
		");
echo("</table>");
?>