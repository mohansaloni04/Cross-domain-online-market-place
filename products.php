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

	<link rel="stylesheet" href="user_details.css">

  </head>

  <body>
    <?php include 'header.php'; ?>
    <div class="jumbotron" >
      <h1>Products</h1><hr>
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-2 sidenav hidden-xs">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="mostViewed_marketPlace.php?site=marketplace"> Top Five marketplace products</a></li>
            </ul>
            <strong>Sort by Price</strong>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="sort_products.php?site=marketplace&order=ASC&crit=price">Low to High</a></li>
              <li><a href="sort_products.php?site=marketplace&order=DESC&crit=price">High to Low</a></li>
            </ul>
            <strong>Sort by Rating</strong>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="sort_products.php?site=marketplace&order=ASC&crit=rating">Low to High</a></li>
              <li><a href="sort_products.php?site=marketplace&order=DESC&crit=rating">High to Low</a></li>
            </ul><br>
            <strong>Last Visited Products by User</strong>
            <ul class="nav nav-pills nav-stacked">
              <li><a href="lastVisited_user.php?site=marketplace">Recently Visited</a></li>
            </ul>
          </div>
          <div class="col-sm-10">

              <?php
                include 'productList.php';

                echo "<div class=\"row\">";
                foreach($productList as $product_id => $product){
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
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', '')."<a href = 'singleitem.php?addcart=" . $product_id ."&site=$product[5]'><button name='Addcart'>Add to Cart</button></a></div>";
                    print("</div>");
                  print("</div>");
                }
                echo "</div>";

                echo "<strong><h2>Products from <a href='http://skeonline.click'>Skeonline</a></h2></strong>";
                echo "<div class=\"row\">";
                foreach($productList2 as $product_id => $product){
                  //echo $productList[$product_id][0];

                  $product_image=$product[0];
                  $product_name = $product[1];
                  $product_price = $product[2];
                  $product_desc = $product[3];
                  $product_visit_count=$product[4];

                  print("<div class='col-sm-3'>");
                    print("<div class='panel panel-primary'>");
                      print("<div class='panel-heading'>$product_name</div>");
                      echo "
                        <div class='panel-body fixed-panel'>
                        <a href='product_details.php?pro_id=$product_id&site=$product[5]' style='float:left;'>
                        <img src='./images/".$product[0] . "' style='width:200px;height: 200px' alt='Image'></img>
                        </a>
                        </div>";
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', '')."<a href = 'singleitem.php?addcart=" . $product_id ."&site=$product[5]'><button name='Addcart'>Add to Cart</button></a></div>";
                    print("</div>");
                  print("</div>");
                  //print("<br><br>");
                }
                echo "</div>";


                echo "<strong><h2>Products from <a href='http://thoughtstoaction.com'>Thoughts to action</a></h2></strong>";
                echo "<div class=\"row\">";
                foreach($productList3 as $product_id => $product){
                  //echo $productList[$product_id][0];

                  $product_image=$product[0];
                  $product_name = $product[1];
                  $product_price = $product[2];
                  $product_desc = $product[3];
                  $product_visit_count=$product[4];

                  print("<div class='col-sm-3'>");
                    print("<div class='panel panel-primary'>");
                      print("<div class='panel-heading'>$product_name</div>");
                      echo "
                        <div class='panel-body fixed-panel'>
                        <a href='product_details.php?pro_id=$product_id&site=$product[5]' style='float:left;'>
                        <img src='./images/".$product[0] . "' style='width:200px;height: 200px' alt='Image'></img>
                        </a>
                        </div>";
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', '')."<a href = 'singleitem.php?addcart=" . $product_id ."&site=$product[5]'><button name='Addcart'>Add to Cart</button></a></div>";
                    print("</div>");
                  print("</div>");
                  //print("<br><br>");
                }
                echo "</div>";

                echo "<strong><h2>Products from <a href='http://chunduridecor.com/decor'>Chunduri</a></h2></strong>";
                echo "<div class=\"row\">";
                foreach($productList4 as $product_id => $product){
                  //echo $productList[$product_id][0];

                  $product_image=$product[0];
                  $product_name = $product[1];
                  $product_price = $product[2];
                  $product_desc = $product[3];
                  $product_visit_count=$product[4];

                  print("<div class='col-sm-3'>");
                    print("<div class='panel panel-primary'>");
                      print("<div class='panel-heading'>$product_name</div>");
                      echo "
                        <div class='panel-body fixed-panel'>
                        <a href='product_details.php?pro_id=$product_id&site=$product[5]' style='float:left;'>
                        <img src='./images/".$product[0] . "' style='width:200px;height: 200px' alt='Image'></img>
                        </a>
                        </div>";
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', '')."<a href = 'singleitem.php?addcart=" . $product_id ."&site=$product[5]'><button name='Addcart'>Add to Cart</button></a></div>";
                    print("</div>");
                  print("</div>");
                  //print("<br><br>");
                }
                echo "</div>";


                echo "<strong><h2>Products from <a href='http://khadikaelectronics.com'>Khadi ka electronics</a></h2></strong>";
                echo "<div class=\"row\">";
                foreach($productList5 as $product_id => $product){
                  //echo $productList[$product_id][0];

                  $product_image=$product[0];
                  $product_name = $product[1];
                  $product_price = $product[2];
                  $product_desc = $product[3];
                  $product_visit_count=$product[4];

                  print("<div class='col-sm-3'>");
                    print("<div class='panel panel-primary'>");
                      print("<div class='panel-heading'>$product_name</div>");
                      echo "
                        <div class='panel-body fixed-panel'>
                        <a href='product_details.php?pro_id=$product_id&site=$product[5]' style='float:left;'>
                        <img src='./images/".$product[0] . "' style='width:200px;height: 200px' alt='Image'></img>
                        </a>
                        </div>";
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', '')."<a href = 'singleitem.php?addcart=" . $product_id ."&site=$product[5]'><button name='Addcart'>Add to Cart</button></a></div>";
                    print("</div>");
                  print("</div>");
                  //print("<br><br>");
                }
                echo "</div>";


                echo "<strong><h2>Products from <a href='http://hungerbuddies.000webhostapp.com'>Hunger Buddies</a></h2></strong>";
                echo "<div class=\"row\">";
                foreach($productList6 as $product_id => $product){
                  //echo $productList[$product_id][0];

                  $product_image=$product[0];
                  $product_name = $product[1];
                  $product_price = $product[2];
                  $product_desc = $product[3];
                  $product_visit_count=$product[4];

                  print("<div class='col-sm-3'>");
                    print("<div class='panel panel-primary'>");
                      print("<div class='panel-heading'>$product_name</div>");
                      echo "
                        <div class='panel-body fixed-panel'>
                        <a href='product_details.php?pro_id=$product_id&site=$product[5]' style='float:left;'>
                        <img src='./images/".$product[0] . "' style='width:200px;height: 200px' alt='Image'></img>
                        </a>
                        </div>";
                      echo "<div class='panel-footer'>$". number_format((float)$product[2], 2, '.', '')."<a href = 'singleitem.php?addcart=" . $product_id ."&site=$product[5]'><button name='Addcart'>Add to Cart</button></a></div>";
                    print("</div>");
                  print("</div>");
                  //print("<br><br>");
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
