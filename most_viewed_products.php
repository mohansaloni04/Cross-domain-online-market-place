<?php
session_start();

if(isset($_COOKIE["mostVisited"]))  {
	$getcookie = $_COOKIE["mostVisited"];
	$mostVisited = json_decode($getcookie, true);
	arsort($mostVisited);
	$displayProducts = array_slice($mostVisited,0,5);
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
    
  </head>

  <body>
    <?php include 'header.php'; ?>
    <div class="jumbotron" >
	<h1>Most Viewed Products</h1><hr>
      <div class="container">
	  <?php
			include 'productList.php';
			if(!isset($_COOKIE["mostVisited"])) {
				echo "No products viewed yet";
			} else {
				foreach($displayProducts as $product => $count){
					echo "
						<div class='col-md-4'>
							<div class='col-md-12'>
							<a href='product_details.php?pro_id=$product' style='float:left;'>
								<img src='./images/".$productList[$product][0] . ".jpg'></img>
								 </a>
							</div>
							<div class='col-md-12'>
								$". number_format((float)$productList[$product][2], 2, '.', '') . "
							</div>
							<div class='col-md-12'>
							&nbsp;&nbsp;
							</div>
						</div>
					";
				}
			}
	  ?>	
	  </div>
	</div>
  </body>
</html>