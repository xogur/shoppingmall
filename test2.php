<script src="https:kit.fontawesome.com/acfe1c41fb.js" crossorigin="anonymous"></script>
<style>
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
  width:1670;
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
<? echo("
<body style='margin:0px; padding:0px;'>
<h1 style='background-color:white; color:white; height:70; border-bottom:1px solid;'>
<img src='무제1.png' width=350 height=250 style='position:absolute; top:-70px; left:700px; z-index:1'>
</h1>
<h1 style='background-color:#gray; box-shadow:5px 2px 2px gray; height:1;'>
</body>
<hr style='position:absolute; top:70px; z-index:1; background-color:gray;' width=1670 height=1></hr>");

echo ("<div class='hamContainer'>
        <input type='checkbox'>
        <div class='hamLines'>
            <span class='line line1'></span>
            <span class='line line2'></span>
            <span class='line line3'></span>
        </div>
        <div class='hamItems' style='font-size:10;'>
            <ul>
                <li><a href='home'>과일</a></li>
                <li><a href='home'>채소</a></li>
                <li><a href='home'>곡류</a></li>
                <li><a href='home'>서류</a></li>
                <li><a href='home'>원예식물</a></li>
                <li><a href='home'>공업용</a></li>
				<li><a href='home'>사료용</a></li>
				<li><a href='home'>비료용</a></li>
            </ul>
        </div>
     </div>
<a style='position:absolute; right:200px; top:20px; z-index:1; font-size:14; color:#767676'>로그인</a>
<a style='position:absolute; right:270px; top:20px; z-index:1; font-size:14; color:#7DC90B'>회원가입</a>
<a style='position:absolute; right:100px; top:30px; z-index:1'><i class='fa-solid fa-cart-shopping' style='color:#228B22'></i></a> ");
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
echo ("<form method=post action=search.php?board=testboard>
<div class='search' style='position:absolute; right:160px; top:45px; z-index:1;'>
  <input type='text' placeholder='검색어 입력'>
  <button style='position:absolute; top:10px; right:10px; background-color:#7DC90B; border:none;'><img class='search' src='https://s3.ap-northeast-2.amazonaws.com/cdn.wecode.co.kr/icon/search.png'></button>
</div>
<section class='carousel' aria-label='Gallery'>
  <ol class='carousel__viewport'>
    <li id='carousel__slide1'
        tabindex='0'
        class='carousel__slide'>
		<a href='top.php'>
		<img src='배너.jpg' width=1670 height=700>
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
		<a href='top.php'>
		<img src='배너2.jpg' width=1670 height=700>
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
		<a href='top.php'>
		<img src='배너3.jpg' width=1670 height=700>
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
		<a href='top.php'>
		<img src='배너5.jpg' width=1670 height=700>
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
<h2 style='position:absolute; top:700px; left:520px; font-family: 'Nanum Gothic Coding', monospace; font-size:40;'>장바구니로 바로!! 강력 추천 상품!!<br><font style='font-size:18; color:#69B33F;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;인기 상품과 신선한 제철 상품들을 한번에 만나보세요</font></br></br></h2>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Swiper demo</title>
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
        <div id=apple class='swiper-slide' style='height:300px; position:relative; top:0px; background-size:100% 100%; border-radius:14px;'><font style='position:relative; top:200px;'>apple</font></div>
        <div class='swiper-slide'>Slide 2</div>
        <div class='swiper-slide'>Slide 3</div>
        <div class='swiper-slide'>Slide 4</div>
        <div class='swiper-slide'>Slide 5</div>
        <div class='swiper-slide'>Slide 6</div>
        <div class='swiper-slide'>Slide 7</div>
        <div class='swiper-slide'>Slide 8</div>
        <div class='swiper-slide'>Slide 9</div>
      </div>
      <div class='swiper-button-next'></div>
      <div class='swiper-button-prev'></div>
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
<h2 style='position:absolute; top:1400px; left:650px; font-family: 'Nanum Gothic Coding', monospace; font-size:40;'>오늘 이런 메뉴 어때요?<br><br><font style='font-size:18; color:#69B33F;'>몸과 마음을 따뜻하고 든든하게 채워주는 건강한 집 밥 제안</font></br></br></h2>
<img src='육개장.jpg' style='position:absolute; top:1650px; left:200px; border-radius:50px;'></img>
<table style='position:absolute; top:1650px; right:50px; border-collapse:collapse;' border=0 width=700 height=400>
<tr><td valign=top height=40><font style='font-size:22px; color:#85AB6F;'>&nbsp;&nbsp;&nbsp;고기없는 육개장</font></td></tr>
<tr><td valign=top height=60><font style='font-size:35px; color:#85AB6F;'>&nbsp;&nbsp;<b>채개장</b></font></td></tr>
<tr><td valign=top height=200 style='border-bottom:1px solid lightgray; color:#A3A6A2;'><br>가볍지만 든든한 요리를 찾는다면 채개장이 어떨까요? 고기를 넣지 않은 비건 육개장이에요. 채소와 버섯을 듬뿍 넣고 끓어 맛이 깔끔하고 개운하죠. 칼칼하고 얼큰한 국물 덕분에 한 그릇 먹고 나면 땀이 쭉 나는 보양식이에요.</td></tr>
<tr><td valign=top height=50 style='border-bottom:0.5px solid lightgray;'>&nbsp;&nbsp;레시피 보기 <i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr>
<tr><td valign=top height=50>&nbsp;&nbsp;재료 담으러 가기<i class='fa-solid fa-chevron-right' style='color:#7C7C7C'></i></td></tr></table>");
?>
<style>
div#apple {background-image:url("apple.jpg");}
</style>
<?
echo ("<center>
		<hr width=1300 style='background-color:#2C6E00; position:absolute; bottom:-1400; left:200;'>
		");
echo ("<table border=0 style='border-collapse:collapse; table-layout:fixed; position:absolute; bottom:-1750; left:200;' width=1200 height=250>
		<tr><td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>1:1 문의<br><br><i class='fa-solid fa-headset' style='color:#A7DF86; font-size:80px;'></i></br></td>
			<td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>게시판<br><br><img src='board.png'></img></td>
			<td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>회사소개<br><br><img src='company.png'></img></td>
			<td align=center height=80 width=250 style='font-size:20px; color:#67A643' nowrap>배송<br><br><img src='delivery.png'></img></td>
		<td><img src='무제1.png' width=300 height=200 style='position:relative; top:0px; z-index:1'></td></tr>
		<tr><td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'>평일 오전 11:00 ~ 오후 18:00<br><br>점심 12:00 ~ 오후 13:00<br><br>휴무 토요일, 일요일, 공휴일</td>
			<td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'>공지사항<br><br>리뷰 게시판</td>
			<td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'></td>
			<td align=center valign=top height=170 width=250 style='font-size:14px; color:#90958D'>창원시 창원대학교<br><br>CJ대한통운 택배 1588-1255<br><br>CJ대한통운 택배를 이용해주세요</td>
			<td></td></tr></table></hr>
			<h1 style='background-color:#gray; box-shadow:1px 1px 1px lightgray; height:1; width:1300; position:absolute; bottom:-1800; left:200;'></h1>
		<table border=0 style='border-collapse:collapse; table-layout:fixed; position:absolute; bottom:-2000; left:200;' width=1200 height=200>
		<tr valign=top><td colspan=5 style='font-size:14px; color:#90958D'>(주)배추도사무도사 경남 창원시 창원대학교 51호관 3층  대표:권태혁
						<br><br>사업자 등록번호:123-45-44444			개인정보 보호 책임자:권태혁
						<br><br>고객센터:010-1234-4444				E-mail:snsk656@naver.com
						<br><br>Copyright 2021. The Chorocmaeul Co., Ltd.
						<br>고객님은 안전거래를 위해 현금 결제시 저희 쇼핑몰이 가입한 소비자피해보상보험서비스를 이용하실 수 있습니다. </td></tr>
						</table>
		");
echo("</table>");
?>