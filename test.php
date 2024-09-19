<div id="slide">
    <div class="slidebanner">
        <ul>
            <li><img src="http://placehold.it/1200x300/332255?text=slide1" alt="slide1"></li>
            <li><img src="http://placehold.it/1200x300/339944?text=slide2" alt="slide2"></li>
            <li><img src="http://placehold.it/1200x300/334488?text=slide3" alt="slide3"></li>
        </ul>
    </div>
</div>
 <style>
 div#slide {
    width: 1200px;
    margin: 0 auto;
}
div#slide div.slidebanner {
    width: 1200px;
    height: 300px;
    overflow: hidden;
}
div#slide div.slidebanner ul {
    width: 1200px;
    height: 900px;
    position: relative;
}
div#slide div.slidebanner ul li {
    width: 1200px;
    height: 300px;
    float: left;
}
 
 </style>
 <script>
 $(document).ready(function(){
    
    setInterval(function(){
        $('div.slidebanner ul').animate({
            top: "-300"
        },1000,function(){
            $('div.slidebanner ul').append($('div.slidebanner ul li').eq(0));
            $('div.slidebanner ul').css("top",0);
        })
    },3000);
})
 </script>