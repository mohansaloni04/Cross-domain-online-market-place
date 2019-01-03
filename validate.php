<?php
// Starting session
//session_save_path(realpath(dirname($_SERVER['DOCUMENT_ROOT'])) .'/thebodykey/tmp');
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

	<link rel="stylesheet" href="main.css">
	<meta charset="UTF-8">
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="validation.css">


  </head>

  <body>
	<?php

		include 'database.php';
    include 'curl.php';

		$USERNAME = $_POST["username"];
		$PASSWORD = $_POST["password"];
		$_SESSION["username"] = $USERNAME ;
		$_SESSION["password"] = $PASSWORD ;

	extract($_POST);
//	print_r($_POST);

	// check if user has left USERNAME or PASSWORD field blank
	if ( !$USERNAME || !$PASSWORD ) {
		fieldsBlank();
	}
	else{

		// check if the New User button was clicked
		//$signup = 0;
		if ( isset( $signup ) ) {

			$FIRSTNAME = $_POST["firstname"];
			$LASTNAME = $_POST["lastname"];
      $HOMEPHONE = $_POST["homephone"];
      $MOBILE = $_POST["mobile"];
      $EMAILID = $_POST["emailId"];
      $CITY = $_POST["city"];
			$_SESSION["firstname"] = $FIRSTNAME ;
			$_SESSION["lastname"] = $LASTNAME ;

			$query = "INSERT INTO user_details(first_name, last_name, username, password, home_phone, cell_phone, email_id, home_address) ";
			$query = $query . "VALUES('" . $FIRSTNAME . "','" . $LASTNAME . "','";
      $query = $query . $USERNAME . "','" . $PASSWORD . "','";
			$query = $query . $HOMEPHONE . "','" . $MOBILE . "','";
      $query = $query . $EMAILID . "','" . $CITY . "')";


			//echo "$query";

			// Check connection
			if ($connect->connect_error) {
			     die("Connection failed: " . $connect->connect_error);
			}

			if (mysqli_query($connect, $query)) {
        $retval = userAdded( $USERNAME );

        // Create user function
       $func = 'createuser';
       $username   	= $USERNAME;
       $firstname      = $FIRSTNAME;
       $lastname       = $LASTNAME;
       $email          = $EMAILID;
       $homeaddress    = $CITY;
       $homephone      = $HOMEPHONE;
       $cellphone      = $MOBILE;
       $created_by		= "mktplace";
       //$created_on		= date('Y-m-d H:i:s');
       $password		= $PASSWORD;
       $param = "function=".$func."&username=".$username."&firstname=".$firstname."&lastname=".$lastname."&email=".$email."&homeaddress=".$homeaddress."&homephone=".$homephone."&cellphone=".$cellphone."&created_by=".$created_by."&password=".$password;
       //echo $param;
       $returned_content = post_data('http://skeonline.click/mktplace_curl.php',$param);
       $returned_content = post_data('http://chunduridecor.com/decor/mktplace_curl.php',$param);
       $returned_content = post_data('http://thoughtstoaction.com/mktplace_curl.php',$param);
       $returned_content = post_data('http://khadikaelectronics.com/mktplace_curl.php',$param);
       $returned_content = post_data('http://hungerbuddies.000webhostapp.com/mktplace_curl.php',$param);
       //echo $returned_content;
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($connect);
			}
		}
		else {

			$userVerified = 0;

			$query = "SELECT username, password ";
			$query = $query . "FROM user_details " ;
			$query = $query . "WHERE  username = '" . $USERNAME . "' ";
			$query = $query . "AND  password = '" . $PASSWORD . "'";

			// Check connection
			 if ($connect->connect_error) {
				die("Connection failed: " . $connect->connect_error);
			 }

			 $result = $connect->query($query);
			 //print_r($result);

			 if ($result->num_rows > 0) {
				 $retval = accessGranted( $USERNAME );
			 }
			 else{
				 $retval = accessDenied();
			 }
		}
	}

	function wrongPassword()
	{
	  session_unset();

	  return "<p style = \"font-family: arial;
		 font-size: 2em; color: red\">
		 <strong>You entered an invalid
		 password.<br />Access has
		 been denied.</strong></p>";
	}

	function accessGranted( $name )
	{
		return "<p style = \"font-family: arial;
			font-size: 2em; color: blue\">
			<strong>Permission has been
			granted, $name. <br />
			Enjoy the site.</strong></p>";
	}

	function fieldsBlank()
    {
		print( "<p style = \"font-family: arial;
		font-size: 2em; color: red\">
		<strong>
		Please fill in all form fields.
		<br /></strong></p>" );
    }

	// print a message indicating access has been denied
   function accessDenied()
   {
	  session_unset();
	  return "<p style = \"font-family: arial;
		font-size: 2em; color: red; font-weight: 0\">
		You were denied access to the server.
		<br /></p>";
   }


    // verify user password and return a boolean
	function checkPassword( $userpassword, $filedata )
	{
	   if ( $userpassword == $filedata[ 3 ] )
		  return true;
	   else
		  return false;
	}

	function userAdded( $name )
	{
	  return "
		 <p style = \"font-family: arial;
		 font-size: 2em; color: blue\">
		 <strong>You have been added
		 to the user list, $name.
		 <br />Enjoy the site.</strong></p>";
   }


	function displayUserList(){
		$userlist = fopen(__DIR__ ."/users.txt", "r") or die("Unable to open file!");
		while(!feof($userlist)) {
			$userdetails = $field = explode( ",", chop(fgets($userlist)), 4 );
			echo  "<br>" . $userdetails[0]. " " . $userdetails[1] ;
		}
		fclose($userlist);
	}
?>
<?php include 'header.php' ?>

	<div class="jumbotron">
		<h1>Validation</h1><hr>
		<div id="cont" class="container">
			<?php
				print($retval);
				//if still session variable exist, it means user entered valid credentials.
				if(isset($_SESSION['username'])){
					if($_SESSION["username"] == "admin"){
						//displayUserList();
					}
				}
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

<?php
  // destroy the session if invalid credentials entered
  if(!isset($_SESSION['username'])){
	session_destroy();
	echo "session destroyed";
  }
  print_r($_SESSION);
?>
</html>
