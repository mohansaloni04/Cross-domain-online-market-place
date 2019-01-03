<?php
session_start();

include 'productList.php';
if(isset($_GET['site'])){
	$site = $_GET['site'];

  if($site == "marketplace"){
    $arrayList = array_merge($productList,$productList2,$productList3,$productList4,$productList5,$productList6);
  }
  elseif($site == "thebodykey"){
    $arrayList = $productList;
  }
  elseif($site == "skeonline"){
    $arrayList = $productList2;
  }
	elseif($site == "thoughtstoaction"){
    $arrayList = $productList3;
  }
	elseif($site == "chunduridecor"){
    $arrayList = $productList4;
  }
	elseif($site == "khadikaelectronics"){
    $arrayList = $productList5;
  }
	elseif($site == "hungerbuddies"){
    $arrayList = $productList6;
  }

  // Obtain a list of columns
  foreach ($arrayList as $key => $row) {
      $visitCount[$key]  = $row[4];
  }


  // Sort the data with volume descending, edition ascending
  // Add $data as the last parameter, to sort by the common key
  array_multisort($visitCount, SORT_DESC, $arrayList);

  $displayProducts = array_slice($arrayList, 0, 5);
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
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2 sidenav hidden-xs">
            <ul class="nav nav-pills nav-stacked">
            <li><a href="recent_viewed_products.php">Last five previously visited products</a></li>
            <li><a href="most_viewed_products.php">Five most visited products</a></li>
            <li><a href="products.php">Products</a></li>
            </ul><br>
          </div>
          <div class="col-sm-10">
	  <?php

				foreach($displayProducts as $p => $v){
					if ($v[4] != 0){
						echo "
							<div class='col-md-4'>
								<div class='col-md-12'>
								<a href='product_details.php?pro_id=$p&site=$v[5]' style='float:left;'>
									<img src='./images/".$v[0] . "'></img>
									 </a>
								</div>
								<div class='col-md-12'>
									$". number_format((float)$displayProducts[$p][2], 2, '.', '') . "
								</div>
								<div class='col-md-12'>
								&nbsp;&nbsp;
								</div>
							</div>";
					}
			}
	  ?>
				</div>
			</div>
	  </div>
	</div>
  </body>
</html>
