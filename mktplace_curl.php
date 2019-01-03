<?php 
if (isset($_SERVER['REQUEST_METHOD'])) 
	 $_SERVER['REQUEST_METHOD']();

function get()
{			if (isset($_GET['function'])) 
			 $_GET['function']();
}

function getproducts()
{
			$servername = "localhost";
			$mysqluser = "root";
			$password = "swarnlata";	
			$dbname = "skeonline";
			$conn = new mysqli($servername, $mysqluser, $password, $dbname);
			if($conn->connect_error) die("Connection failed" .$conn->connect_error);
			else 
			{
				$sql_read = "SELECT * from ske_product";		  			
				$result = $conn->query($sql_read);
				while($row = mysqli_fetch_assoc($result)) 
    			$arr[] = $row; 
				echo json_encode($arr);
			}
}

function getprodrating()
{
			$servername = "localhost";
			$mysqluser = "root";
			$password = "swarnlata";	
			$dbname = "skeonline";
			$product_id = $_GET['product_id'];
			$conn = new mysqli($servername, $mysqluser, $password, $dbname);
			if($conn->connect_error) die("Connection failed" .$conn->connect_error);
			else 
			{
				$sql_read = "SELECT * from ske_product_rating where product_id = '$product_id'";		  			
				$result = $conn->query($sql_read);
				while($row = mysqli_fetch_assoc($result)) 
    			$arr[] = $row; 
				echo json_encode($arr);
			}
}

function getuserprodhistory()
{
			$servername = "localhost";
			$mysqluser = "root";
			$password = "swarnlata";	
			$dbname = "skeonline";
			$username = $_GET['username'];
			$conn = new mysqli($servername, $mysqluser, $password, $dbname);
			if($conn->connect_error) die("Connection failed" .$conn->connect_error);
			else 
			{
				$sql_read = "SELECT * from ske_userprodhistory where username = '$username'";		  			
				$result = $conn->query($sql_read);
				while($row = mysqli_fetch_assoc($result)) 
    			$arr[] = $row; 
				echo json_encode($arr);
			}
}

function post()
{			if (isset($_POST['function'])) 
			 $_POST['function']();
}
function rating()
{
			$servername = "localhost";
			$mysqluser = "root";
			$password = "swarnlata";	
			$dbname = "skeonline";
			$conn = new mysqli($servername, $mysqluser, $password, $dbname);
			if($conn->connect_error) die("Connection failed" .$conn->connect_error);
			else 
			{
				$product_id = $_POST['product_id'];
				$user = $_POST['user'];
				$rating = $_POST['rating'];
				$review_date = date('Y-m-d H:i:s');
				$comment = $_POST['comment'];
				$sql_write = "insert into ske_product_rating (product_id,user,rating, review_date, comments) values('$product_id','$user','$rating','$review_date','$comment');";		  			
				if ($conn->query($sql_write)) echo "202";
				$sql_update = "update ske_product set avg_rating = (select avg(rating) from ske_product_rating where product_id ='$product_id') where product_id ='$product_id'";
				if ($conn->query($sql_update)) echo "202";
				else echo $sql_update;
			}
}
function updatevisitcount()
{
			$servername = "localhost";
			$mysqluser = "root";
			$password = "swarnlata";	
			$dbname = "skeonline";
			$conn = new mysqli($servername, $mysqluser, $password, $dbname);
			if($conn->connect_error) die("Connection failed" .$conn->connect_error);
			else 
			{
				$product_id = $_POST['product_id'];
				$username = $_POST['username'];
				$visited_on = date('Y-m-d H:i:s');
				$sql_update = "update ske_product set visit_count = visit_count + '1' where product_id = '$product_id'";		  			
				if ($conn->query($sql_update)) echo "202";
				$sql_write = "insert into ske_userprodhistory (username,product_id,visited_on) values('$username','$product_id','$visited_on');";		  			
				if ($conn->query($sql_write)) echo "202";				
			}
}
function createuser()
{
			$servername = "localhost";
			$mysqluser = "root";
			$password = "swarnlata";	
			$dbname = "skeonline";
			$conn = new mysqli($servername, $mysqluser, $password, $dbname);
			if($conn->connect_error) die("Connection failed" .$conn->connect_error);
			else 
			{
				$username   	=	$_POST['username'] 		;
				$firstname      =   $_POST['firstname']     ;
				$lastname       =   $_POST['lastname']      ;
				$email          =   $_POST['email']         ;
				$homeaddress    =   $_POST['homeaddress']   ;
				$homephone      =   $_POST['homephone']     ;
				$cellphone      =   $_POST['cellphone']     ;
				$created_by     =   $_POST['created_by']   ;
				$password     =   $_POST['password']   ;
				$created_on     =   date('Y-m-d H:i:s');
				$sql_write = "insert into ske_user (username,firstname,lastname,email,homeaddress,homephone,cellphone,created_by,password,created_on) values('$username','$firstname','$lastname','$email','$homeaddress','$homephone','$cellphone','$created_by','$password','$created_on');";		  			
				if ($conn->query($sql_write)) echo "202";
			}
}
?>