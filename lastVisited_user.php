<?php
session_start();

include 'header.php';
include 'productList.php';
include 'database.php';

$arrayList = array_merge($productList,$productList2,$productList3,$productList4,$productList5,$productList6);

function cmp($a, $b)
{
    if ($a["visited_on"] == $b["visited_on"]) {
        return 0;
    }
    return ($a["visited_on"] > $b["visited_on"]) ? -1 : 1;
}

if(isset($_SESSION['username'])){
  $user=$_SESSION['username'];
  if(isset($_GET['site'])){
  	$site = $_GET['site'];


    $query = "SELECT product_id ";
    $query = $query . "FROM user_prod_history " ;
    $query = $query . "WHERE  username = '" . $user . "' ";
    if($site != "marketplace")
      $query = $query . "AND   site = '" . $site . "' ";
    $query = $query . "ORDER BY visited_on DESC LIMIT 5";

    // Check connection
     if ($connect->connect_error) {
      die("Connection failed: " . $connect->connect_error);
     }

     $result = $connect->query($query);
     //print_r($result);
     $product_ids = array();
     if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
          array_push($product_ids, $row["product_id"]);
       }
     }
  }
}
else {
  $user = "";
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
    <div class="jumbotron" >
			<h1>Recently Viewed Products</h1><hr>
      <div class="container-fluid">
        <div class="row">
          <?php if($user == "") { echo "User must be logged in to access this feature"; die();}
                if(count($product_ids) ==0) {echo "No Products visited here by you"; die();}
            ?>
          <div class="col-sm-2 sidenav hidden-xs">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="lastVisited_user.php?site=marketplace">MarketPlace</a></li>
                <li><a href="lastVisited_user.php?site=thebodykey">The Bodykey</a></li>
                <li><a href="lastVisited_user.php?site=skeonline">Skeonline</a></li>
                <li><a href="lastVisited_user.php?site=thoughtstoaction">Thoughts to Action</a></li>
                <li><a href="lastVisited_user.php?site=chunduridecor">Chunduri Decor</a></li>
                <li><a href="lastVisited_user.php?site=khadikaelectronics">Khadi Ka Electronics</a></li>
                <li><a href="lastVisited_user.php?site=hungerbuddies">Hunger Buddies</a></li>
            </ul><br>
          </div>
          <div class="col-sm-10">
	  <?php
      echo "<div class=\"row\">";
				foreach($product_ids as $product_id){
						echo "
							<div class='col-md-3'>
								<div class='panel panel-primary'>
                  <div class='panel-heading'>".$arrayList[$product_id][1]."</div>
                  <div class='panel-body fixed-panel'>
                    <a href='product_details.php?pro_id=$product_id&site=".$arrayList[$product_id][5]."' style='float:left;'>
    									<img src='./images/".$arrayList[$product_id][0] . "' style='width:200px;height: 200px'></img>
    								</a>
                  </div>

								<div class='panel-footer'>
									$". number_format((float)$arrayList[$product_id][2], 2, '.', '') . "
								</div>
              </div>
						</div>";
			}
	  ?>
				</div>
			</div>
	  </div>
	</div>
</div>
  </body>
</html>
