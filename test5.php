<?
echo ("
<form action='test5.php' method=post name=comma>
<div class='star-rating'>
  <input type='radio' id='5-stars' name='rating' value='5' />
  <label for='5-stars' class='star'>&#9733;</label>
  <input type='radio' id='4-stars' name='rating' value='4' />
  <label for='4-stars' class='star'>&#9733;</label>
  <input type='radio' id='3-stars' name='rating' value='3' />
  <label for='3-stars' class='star'>&#9733;</label>
  <input type='radio' id='2-stars' name='rating' value='2' />
  <label for='2-stars' class='star'>&#9733;</label>
  <input type='radio' id='1-star' name='rating' value='1' />
  <label for='1-star' class='star'>&#9733;</label>
</div>
");
?>
<style>

.star-rating {
  border:solid 0px #ccc;
  display:flex;
  flex-direction: row-reverse;
  font-size:1.5em;
  justify-content:space-around;
  padding:0 .2em;
  text-align:center;
  width:5em;
}

.star-rating input {
  display:none;
}

.star-rating label {
  color:#ccc;
  cursor:pointer;
}

.star-rating :checked ~ label {
  color:#f90;
}

.star-rating label:hover,
.star-rating label:hover ~ label {
  color:#fc0;
}

/* explanation */

article {
  background-color:#ffe;
  box-shadow:0 0 1em 1px rgba(0,0,0,.25);
  color:#006;
  font-family:cursive;
  font-style:italic;
  margin:4em;
  max-width:30em;
  padding:2em;
}
</style>