<!DOCTYPE html>
<html>
<?php include 'header.php'; ?>
<body onload="session_load()">
<?php include 'navigation.php'; ?>
	</br><br><br>
<div class="container-fluid"> 
  <div class="row">
    <div class="col-sm-3 sidenav hidden-xs">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="sort_visited.php?sort_value=1">Last five previously visited products</a></li>
        <li><a href="sort_visited.php?sort_value=2">Five most visited products</a></li>
        <li><a href="product.php">Products</a></li>
      </ul><br>
    </div> 
    <div class="col-sm-9">  
  <div class="row">

<?php
  include 'productList.php';


  foreach($productList as $product_id => $product){
			//echo $productList[$product_id][0];
			echo "
				<div class='col-md-4'>
					<div class='col-md-12'>
					<a href='product_details.php?pro_id=$product_id' style='float:left;'>
						<img src='./images/".$product[0] . ".jpg'></img>
						 </a>
					</div>
					<div class='col-md-12'>
						$". number_format((float)$product[2], 2, '.', '') . "
					</div>
					<div class='col-md-12'>
					&nbsp;&nbsp;
					</div>
				</div>
			";
		}




  $arr = json_decode($returned_content, true);
  foreach($productList as $product_id => $product){
    print("<div class='col-sm-3'>");
    print("<div class='panel panel-primary'>");
	
	$product_image=$product[0];
	$product_name = $product[1];
	$product_price = $product[2];
	$product_desc = $product[3];
    $product_visit_count=$product[4];


      print("<div class='panel-heading'>$product_name</div>");
      echo "<div class='panel-body fixed-panel'><a href='product_description.php?product=$i'><img src=$product_image alt='Image' style='width:200px;height: 200px'></a></div><div class='panel-footer'>$product_price</div>";                          
    print("</div></div>");
	
					<a href='product_details.php?pro_id=$product_id' style='float:left;'>
						<img src='./images/".$product[0] . ".jpg'></img>
						 </a>
					</div>
					<div class='col-md-12'>
						$". number_format((float)$product[2], 2, '.', '') . "
					</div>
					<div class='col-md-12'>
					&nbsp;&nbsp;
  }
  ?>
</div><br>
</div></div>


	</br><br><br><br>
	<?php include 'footer.php'; ?>
	<?php include 'script.php'; ?>
	</div>
</body>
</html>
