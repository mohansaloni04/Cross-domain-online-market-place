<!DOCTYPE html>
<html>
<?php
// Starting session
session_start();
?>
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
	<script src="./js/user_details.js"></script>

	<link rel="stylesheet" href="user_details.css">
  </head>

  <body>
    <?php include 'header.php' ?>
	<div class="jumbotron">
      <h1>Result</h1><hr>
	  <div class="container">
	  <?php
         extract($_POST);
		 //$query = "INSERT INTO user_details (first_name, last_name, email_id, home_address, home_phone, cell_phone, username, password)";
         //$query = $query . "VALUES ('" . $first_name . "','" . $last_name . "','" . $email . "','" . $home_address. "','";
		 //$query = $query . $home_phone . "','" . $mobile_phone . "','" . $username . "','" . $password . "')";

		 include 'database.php';

		 $stmt = $connect->prepare("INSERT INTO user_details (first_name, last_name, email_id, home_address, home_phone, cell_phone, username, password) 
		           VALUES (?,?,?,?,?,?,?,?)");
		 $stmt->bind_param("ssssssss", $first_name, $last_name, $email, $home_address, $home_phone, $mobile_phone, $username, $password);
		 //echo "$query";
    
		 if ($stmt->execute()) {
            echo "New user added successfully";
         } else {
            echo "Error: " . "<br>" . mysqli_error($connect);
         }

         $stmt->close();
         $connect->close();
      ?>
	   </div>
    </div> 
    <div class="learn-more">
	  <div class="container">
		<div class="row">
	      <div class="col-md-4">
			<h3>Weight Management</h3>
			<p>Check our body weight management programs which help you to gain or lose weight with proper supplements</p>
			<p><a href="#">See how to manage weight</a></p>
	      </div>
		  <div class="col-md-4">
			<h3>Nutrition</h3>
			<p>Provide your body with sufficient nutrients.</p>
			<p><a href="#">Learn more about nutrient products</a></p>
		  </div>
		  <div class="col-md-4">
			<h3>Energy Drinks and Snacks</h3>
			<p>Instant energy drinks to make you feel up and tasty snacks</p>
			<p><a href="#">Know about Energy Drinks</a></p>
		  </div>
	    </div>
	  </div>
	</div>
  </body>
</html>