<?php
// Starting session
//session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT'])) .'/htdocs/thebodykey/tmp');
//print_r(realpath(dirname($_SERVER['DOCUMENT_ROOT'])));
session_start();
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
  <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/591cd5498028bb732704657d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>                        

	<link rel="stylesheet" href="main.css">

  </head>

  <body>
    <?php include 'header.php'; ?>

    <div class="jumbotron">
      <div class="container">
        <h1>The Bodykey</h1>
        <p>Provide your body with best nutrition.</p>
        <a href="#">Learn More</a>
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
