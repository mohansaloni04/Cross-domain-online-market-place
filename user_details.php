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
      <h1>User actions</h1><hr>
	  <div class="container">
	    <a href="javascript:display_addUser_form();">Add User</a> | 
	    <a href="javascript:display_searchUser_form();">Search User</a> | 
		<a href="user_criteria_result.php">List All Users</a> | 
		<a href="user_marketplace.php">List All Users in Marketplace</a><br>
	    <form id = "addUserForm" action="user_details_result.php" method="post" style="display:none">
		    <div class="form-group required">
				<div class="row">
		        <label class="col-md-2 control-label">First name</label>
				<div class="col-md-4">
				<input class="form-control" id="id_first_name" maxlength="30" name="first_name" placeholder="first name" required="required" title="" type="text" />
				</div>
				</div>
			</div>
		    <div class="form-group required">
				<div class="row">
			    <label class="col-md-2 control-label">Last name</label>
			    <div class="col-md-4">
				<input class="form-control" id="id_last_name" maxlength="30" name="last_name" placeholder="last name" required="required" title="" type="text" />
			    </div></div>
			</div>
			<div class="form-group required">
				<div class="row">
				<label class="col-md-2 control-label">E-mail</label>
				<div class="col-md-4">
				<input class="form-control" id="id_email" name="email" placeholder="E-mail" required="required" title="" type="email" />
			    </div></div>
			</div>
			<div class="form-group required">
			<div class="row">
				<label class="col-md-2 control-label">Home address</label>
				<div class="col-md-4">
				<input class="form-control" id="id_home_address" name="home_address" placeholder="home address" required="required" title="" type="text" />
			    </div></div>
			</div>
			<div class="form-group required">
			<div class="row">
				<label class="col-md-2 control-label">Home Phone No.</label>
				<div class="col-md-4">
				<input class="form-control" id="id_home_phone" name="home_phone" placeholder="home phone number" required="required" title="" type="text" />
			    </div></div>
			</div>
			<div class="form-group required">
			<div class="row">
				<label class="col-md-2 control-label">Mobile No.</label>
				<div class="col-md-4">
				<input class="form-control" id="id_mobile_phone" name="mobile_phone" placeholder="Mobile Number" required="required" title="" type="text" />
			    </div></div>
			</div>
			<div class="form-group required">
			<div class="row">
		  	   <label class="col-md-2 control-label">Username</label>
			   <div class="col-md-4">
			   <input class="form-control" id="id_username" maxlength="30" name="username" placeholder="Username" required="required" title="" type="text" />
			   </div></div>
            </div>
		    <div class="form-group required">
			<div class="row">
				<label class="col-md-2 control-label">Password</label>
				<div class="col-md-4">
				<input class="form-control" id="id_password1" name="password" placeholder="Password" required="required" title="" type="password" />
				</div></div>
			</div>
		    <div class="form-group">
			<div class="row">
			    <div class="col-sm-offset-5">
			       <button type="submit" class="btn btn-primary">
				      <span class="glyphicon glyphicon-star"></span> Add User
			       </button>
			    </div>
			</div>
		    </div>
		</form>
		<br><br>
		<form id = "searchUserForm" action="user_criteria_result.php" method="post" style="display:none">
		 <div class="form-group required">
			<div class="row">
				<label class="col-md-2 control-label">Selection Criteria</label>
				<div class="col-md-4">
				<select id="id_select_criteria" name="select_criteria" required="required" onchange="updateSelectLabel();">
			    <option value = "">--Select--</option>
				<option value = "first_name">First Name</option>
				<option value = "last_name">Last Name</option>
				<option value = "home_address">Home</option>
				<option value = "email_id">E-mail</option>
				<option value = "cell_phone">Mobile Number</option>
				</select>
				</div>
			</div>
			<div class="form-group required">
				<div class="row">
			    <label class="col-md-2 control-label" id = "id_criteria_label" style="display:none"></label>
			    <div class="col-md-4">
				<input class="form-control" id="id_criteria_val" maxlength="30" name="criteria_val" " required="required" title="" type="text" style="display:none"/>
			    </div></div>
			</div>
		 </div>
		<div class="form-group">
			<div class="row">
			    <div class="col-sm-offset-1">
			       <button type="submit" class="btn btn-primary">
				      <span class="glyphicon glyphicon-star"></span> Search User
			       </button>
			    </div>
			</div>
		    </div>
		</form>
	   </div>
    </div> 
	<?php include 'footer.php' ?>
  </body>
</html>