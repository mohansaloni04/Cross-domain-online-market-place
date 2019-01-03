<?php
session_start();

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
}
else {
	$username = '';
}

if(isset($_GET['pro_id'])){
	$product_id = $_GET['pro_id'];
	$site = $_GET['site'];

	include 'productList.php';

	//Update visit count
	$func = 'updatevisitcount';
	$param = "function=".$func."&product_id=".$product_id."&username=".$username;

	if ($site  == "thebodykey") {
		$currentList = $productList;
		$returned_content = post_data('http://thebodykey.com/mktplace_curl.php',$param);
	}
	elseif($site== "skeonline"){
		$currentList = $productList2;
		$returned_content = post_data('http://skeonline.click/mktplace_curl.php',$param);
	}
	elseif($site== "thoughtstoaction"){
		$currentList = $productList3;
		$returned_content = post_data('http://thoughtstoaction.com/mktplace_curl.php',$param);
	}
	elseif($site== "chunduridecor"){
		$currentList = $productList4;
		$returned_content = post_data('http://chunduridecor.com/decor/mktplace_curl.php',$param);
	}

	elseif($site== "khadikaelectronics"){
		$currentList = $productList5;
		$returned_content = post_data('http://khadikaelectronics.com/mktplace_curl.php',$param);
	}
	elseif($site== "hungerbuddies"){
		$currentList = $productList6;
		$returned_content = post_data('http://hungerbuddies.000webhostapp.com/mktplace_curl.php',$param);
	}
}
if($username !=""){
	//echo "inseting";
	include 'database.php';
	$query = "INSERT INTO user_prod_history(username, product_id, visited_on, site) ";
	$query = $query . "VALUES('" . $username . "','" . $product_id . "','";
	$query = $query . date('Y-m-d H:i:s') . "','" . $site . "')";
	//echo "$query";

	// Check connection
	if ($connect->connect_error) {
			 die("Connection failed: " . $connect->connect_error);
	}

	if (mysqli_query($connect, $query)) {
		//do nothing
	}

	mysqli_close($connect);
}
?>


<!DOCTYPE html>
<html>
  <head>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">

    <link rel="stylesheet" href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/bootstrap.css">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

	<link rel="stylesheet" href="user_details.css">
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
    <?php include 'header.php'; ?>
    <div class="jumbotron" >
	<h1>Product Details</h1><hr>
      <div class="container">
				<div class="row">
	  <?php

			echo "
			<div class='col-md-4'>
				<img src='./images/".$currentList[$product_id][0] . "' style='width:300px;height: 300px'></img>
			</div>
			<div class='col-md-8'>
				<div class='col-md-12 productname'>
				<h2>". $currentList[$product_id][1]  . "</h2>
				</div>
				<div class='col-md-12'>
				<strong>$". number_format((float)$currentList[$product_id][2], 2, '.', '') . "</strong>
				</div>
				<div class='col-md-12'>
				". $currentList[$product_id][3]. "
				</div>";
				?>
				<div class='col-md-12'>
					<form action="review.php" method="post" accept-charset="utf-8">
						<input type="hidden" name="product" value="<?php echo $product_id; ?>" />
						<input type="hidden" name="site" value="<?php echo $site; ?>" />
					<fieldset><h3>Review this Product</h3></legend>
						<br>
						<div class='col-md-5'>
					<ul class="rate-area">
					  <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing"></label>
					  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good"></label>
					  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average"></label>
					  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good"></label>
					  <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad"></label>
					</ul></div><br><br><br><br>
					EmailId<textarea class= "error" name = "emailid" rows = "1" cols = "50"></textarea>
					<br>
					Review<textarea name = "comments" rows = "5" cols = "50"></textarea><br />
					<input type = "submit" value = "Submit Review">
					</form>
				</div>

	</div>
	</div>
	  </div>
	</div>
  </body>
</html>
