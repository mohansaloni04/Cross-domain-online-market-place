<!DOCTYPEhtml>

<?php
session_start();

include 'productList.php';
if(isset($_GET['site'])){
	$site = $_GET['site'];
  $product_id = $_GET['product_id'];
}
?>
<html>
<head>
<style>
rate-area {
  float: left;
  border-style: none;
}
 .rate-area:not(:checked) > input
  {
  position: absolute;
  top: -9999px;
  clip: rect(0,0,0,0);
}
.rate-area:not(:checked) > label
{
  float: right;
  width: 1em;
  padding: 0 .1em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 300%;
  line-height: 1.2;
  color: lightgrey;
  text-shadow: 1px 1px #bbb;
}

 .rate-area:not(:checked) > label:before { content: '★'; }

.rate-area > input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px #c60;
  font-size: 300% !important;
}

 .rate-area:not(:checked) > label:hover, .rate-area:not(:checked) > label:hover ~ label { color: gold; }

 .rate-area > input:checked + label:hover, .rate-area > input:checked + label:hover ~ label, .rate-area > input:checked ~ label:hover, .rate-area > input:checked ~ label:hover ~ label, .rate-area > label:hover ~ input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px goldenrod;
}

 .rate-area > label:active {
  position: relative;
  top: 2px;
  left: 2px;
}
</style>
</head>
<body>
<form action="review.php" method="post" accept-charset="utf-8">
    <fieldset><h3>Review this Product</h3></legend>
<form method = "POST" action = "review.php">
<input type = "text" name = "product" value= "<?php echo $value; ?>">
<ul class="rate-area">
  <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing"></label>
  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good"></label>
  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average"></label>
  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good"></label>
  <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad"></label>
</ul>

<textarea class= "error" name = "emailid" rows = "1" cols = "10">EmailId</textarea>
<textarea name = "comments" rows = "5" cols = "50">Review</textarea><br />
<input type = "submit" value = "Submit Review">
</form>
</body>
</html>
