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

	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="contact-us.css">

    
  </head>

  <body>
    <?php include 'header.php' ?>
	<div class="jumbotron">
      <h1>Admin Section</h1><hr>
	  <div class="container">
        <?php
			echo "<br>The current user list is : <br>";
			$userlist = fopen(__DIR__ ."/users.txt", "r") or die("Unable to open file!");
			while(!feof($userlist)) {
				$userdetails = $field = explode( ",", chop(fgets($userlist)), 4 );
				echo  "<br>" . $userdetails[0]. " " . $userdetails[1] ;
			}
			fclose($userlist);
		?>
	  </div>
	</div>
  </body>
</html>