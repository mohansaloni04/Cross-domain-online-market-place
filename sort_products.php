<!DOCTYPE html>
<html>
<?php
// Starting session
session_start();

include 'productList.php';
if(isset($_GET['site'])){
	$site = $_GET['site'];
  $order = $_GET['order'];
  $crit = $_GET['crit'];

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

  // Obtain a list of columns on which sorting has to happen
  if($crit == "price"){
    foreach ($arrayList as $key => $row)
        $criteria[$key]  = $row[2];
  }elseif($crit == "rating"){
    foreach ($arrayList as $key => $row)
        $criteria[$key] = $row[6];
  }


  // Sort the data with volume descending, edition DESCending
  // Add $data as the last parameter, to sort by the common key
  if($order == "ASC" )
    array_multisort($criteria, SORT_ASC, $arrayList);
  else
    array_multisort($criteria, SORT_DESC, $arrayList);
}

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
	<link rel="stylesheet" href="user_details.css">
  </head>

  <body>
    <?php include 'header.php'; ?>
    <div class="jumbotron" >
      <h1>Products</h1><hr>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2 sidenav hidden-xs">
						<?php
						if($crit == "price"){
							if($order == "ASC"){ ?>
							Price Low to High
							<ul class="nav nav-pills nav-stacked">
								<li><a href="sort_products.php?site=marketplace&order=ASC&crit=price">MarketPlace</a></li>
								<li><a href="sort_products.php?site=thebodykey&order=ASC&crit=price">The Bodykey</a></li>
								<li><a href="sort_products.php?site=skeonline&order=ASC&crit=price">Skeonline</a></li>
								<li><a href="sort_products.php?site=thoughtstoaction&order=ASC&crit=price">Thoughts to Action</a></li>
								<li><a href="sort_products.php?site=chunduridecor&order=ASC&crit=price">Chunduri Decor</a></li>
								<li><a href="sort_products.php?site=khadikaelectronics&order=ASC&crit=price">Khadi Ka Electronics</a></li>
								<li><a href="sort_products.php?site=hungerbuddies&order=ASC&crit=price">Hunger Buddies</a></li>
							</ul>
						<?php }
							else{?>
								Price High to Low
								<ul class="nav nav-pills nav-stacked">
									<li><a href="sort_products.php?site=marketplace&order=DESC&crit=price">MarketPlace</a></li>
									<li><a href="sort_products.php?site=thebodykey&order=DESC&crit=price">The Bodykey</a></li>
									<li><a href="sort_products.php?site=skeonline&order=DESC&crit=price">Skeonline</a></li>
									<li><a href="sort_products.php?site=thoughtstoaction&order=DESC&crit=price">Thoughts to Action</a></li>
									<li><a href="sort_products.php?site=chunduridecor&order=DESC&crit=price">Chunduri Decor</a></li>
									<li><a href="sort_products.php?site=khadikaelectronics&order=DESC&crit=price">Khadi Ka Electronics</a></li>
									<li><a href="sort_products.php?site=hungerbuddies&order=DESC&crit=price">Hunger Buddies</a></li>
		            </ul>
							<?php }
						}elseif($crit == "rating"){
							if($order == "ASC"){?>
							Rating Low to High
							<ul class="nav nav-pills nav-stacked">
								<li><a href="sort_products.php?site=marketplace&order=ASC&crit=rating">MarketPlace</a></li>
								<li><a href="sort_products.php?site=thebodykey&order=ASC&crit=rating">The Bodykey</a></li>
								<li><a href="sort_products.php?site=skeonline&order=ASC&crit=rating">Skeonline</a></li>
								<li><a href="sort_products.php?site=thoughtstoaction&order=ASC&crit=rating">Thoughts to Action</a></li>
								<li><a href="sort_products.php?site=chunduridecor&order=ASC&crit=rating">Chunduri Decor</a></li>
								<li><a href="sort_products.php?site=khadikaelectronics&order=ASC&crit=rating">Khadi Ka Electronics</a></li>
								<li><a href="sort_products.php?site=hungerbuddies&order=ASC&crit=rating">Hunger Buddies</a></li>
							</ul>
							<?php }
							else{?>
							Rating High to Low
								<ul class="nav nav-pills nav-stacked">
									<li><a href="sort_products.php?site=marketplace&order=DESC&crit=rating">MarketPlace</a></li>
									<li><a href="sort_products.php?site=thebodykey&order=DESC&crit=rating">The Bodykey</a></li>
									<li><a href="sort_products.php?site=skeonline&order=DESC&crit=rating">Skeonline</a></li>
									<li><a href="sort_products.php?site=thoughtstoaction&order=DESC&crit=rating">Thoughts to Action</a></li>
									<li><a href="sort_products.php?site=chunduridecor&order=DESC&crit=rating">Chunduri Decor</a></li>
									<li><a href="sort_products.php?site=khadikaelectronics&order=DESC&crit=rating">Khadi Ka Electronics</a></li>
									<li><a href="sort_products.php?site=hungerbuddies&order=DESC&crit=rating">Hunger Buddies</a></li>
								</ul>
								<?php }
							}?>


            <br>
          </div>
          <div class="col-sm-10">

              <?php
                echo "<div class=\"row\">";
                foreach($arrayList as $product_id => $product){
                  //echo $productList[$product_id][0];

                  $product_image=$product[0];
                  $product_name = $product[1];
                  $product_price = $product[2];
                  $product_desc = $product[3];
                  //$product_visit_count=$product[4];

                  print("<div class='col-sm-3'>");
                    print("<div class='panel panel-primary'>");
                      print("<div class='panel-heading'>$product_name</div>");
                      echo "
                        <div class='panel-body fixed-panel'>
                        <a href='product_details.php?pro_id=$product_id&site=$product[5]' style='float:left;'>
                        <img src='./images/".$product[0] . "' style='width:200px;height: 200px' alt='Image'></img>
                        </a>
                        </div>";
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', ''). "</div>";
                    print("</div>");
                  print("</div>");
                }
                echo "</div>";
              ?>
          </div>
        </div>
      </div>
    </div>
    <?php include 'footer.php' ?>
  </body>
</html>
