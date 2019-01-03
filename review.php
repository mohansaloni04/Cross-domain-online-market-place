<?php

include 'productList.php';
include 'database.php';


if(!$connect) {
    die('Could not connect to database: '.mysql_error());
}

//print_r($_POST);
$value1 = $_POST['product'];
$value2 = $_POST['rating'];
$value3 = $_POST['comments'];
$value4 = $_POST['emailid'];
$site = $_POST['site'];

if(isset($_SESSION['username'])){
  $user = $_SESSION['username'];
}
else {
  $user = $value4;
}


$sql = "INSERT INTO pro_rating_review(product_id, user, rating, review_date, comments ) VALUES ('$value1','$user','$value2',curdate(),'$value3')";

if(!mysqli_query($connect, $sql)) {
    die('Error' .mysqli_error($connect));
}

$func = 'rating';
$param = "function=".$func."&product_id=".$value1."&user=".$user."&rating=".$value2."&comment=".$value3;

//echo $param;
if ($site  == "thebodykey") {
  $currentList = $productList;
  $returned_content = post_data('http://thebodykey.com/mktplace_curl.php',$param);
}
elseif($site== "skeonline"){
  $currentList = $productList2;
  $returned_content = post_data('http://skeonline.click/mktplace_curl.php',$param);
}
elseif($site== "thoughtstoaction"){
  $currentList = $productList3;
  $returned_content = post_data('http://thoughtstoaction.com/mktplace_curl.php',$param);
}
elseif($site== "chunduridecor"){
  $currentList = $productList4;
  $returned_content = post_data('http://chunduridecor.com/decor/mktplace_curl.php',$param);
}

elseif($site== "khadikaelectronics"){
  $currentList = $productList5;
  $returned_content = post_data('http://khadikaelectronics.com/mktplace_curl.php',$param);
}
elseif($site== "hungerbuddies"){
  $currentList = $productList6;
  $returned_content = post_data('http://hungerbuddies.000webhostapp.com/mktplace_curl.php',$param);
}

echo "<h3>Thank Your for your feedback</h3>";
$sql = "SELECT product_id, AVG(rating) FROM pro_rating_review WHERE product_id ='". $value1. "'";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));
while ($row = mysqli_fetch_array($result)){
              echo "Average rating of " . $currentList[$value1][1]   .": <b>" . $row[1] . "</b>";
}

mysqli_close($connect);

?>
