<?php
session_start();

if(isset($_SESSION['username'])){
	$username = $_SESSION['username'];
}
else {
	$username = '';
}

if(isset($_GET['addcart'])){
	$product_id = $_GET['addcart'];
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

function getIp()
{
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}
$ip = getIp();

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
  </head>

  <body>
    <?php include 'header.php'; ?>
    <div class="jumbotron" >
	<h1>Selected Item</h1><hr>
      <div class="container">
				<div class="row">
	  <?php

      include 'database.php';
      $query1 = mysqli_query($connect, "SELECT * FROM cart WHERE ipaddress = '$ip'");
      if(mysqli_num_rows($query1) > 0)
    	{
    		//print("I am in if >0 loop");
    	$flag = 1;
    	for($index =0; $row = mysqli_fetch_row($query1); $index++)
    	{
    		//print("Iam in the loop");
    		//$row1 = mysql_fetch_array($row);
    		$row1 = $row ;

    		if(($row1[0] == $product_id) && ($row1[1] == $ip))
    		{
    			$quantity = $row1[2] + 1;
    			$intocart = "UPDATE cart SET quantity = '$quantity' WHERE productid = '$product_id' AND ipaddress = '$ip'";
    			$insert = mysqli_query($connect, $intocart);
    			$flag = 0;
    		}
    	}
    	if($flag == 1)
    		{
    			//print("Iam here in first else loop");
    			$quantity = 1;
    			 $intocart = "INSERT INTO cart (productid, ipaddress, quantity)
                                 VALUES ('$product_id', '$ip', '$quantity')";
    			$insert = mysqli_query($connect, $intocart);
    		}
    	}

    	else
    	{
    		//print("Iam here in else loop");
    		$quantity = 1;
    		$intocart = "INSERT INTO cart (productid, ipaddress, quantity)
                               VALUES ('$product_id', '$ip', '$quantity')";
    		$insert = mysqli_query($connect, $intocart);
    	}
    mysqli_close($connect);

			echo "
			<div class='col-md-6'>
      <div class='col-md-12 productname'>
      1 item added to cart
      <h2>". $currentList[$product_id][1]  . "</h2>
      </div>
				<img src='./images/".$currentList[$product_id][0] . "' style='width:300px;height: 300px'></img>
			</div>
			<div class='col-md-8'>

				<div class='col-md-12'>
				<strong>$". number_format((float)$currentList[$product_id][2], 2, '.', '') . "</strong>
				</div>
        <div><a href=\"products.php\"><button>Continue Shopping</button></a>&nbsp;&nbsp;<a href=\"checkout.php\"><button>Checkout</button></a></div>";
				?>
	</div>
	</div>
	  </div>
	</div>
  </body>
</html>
