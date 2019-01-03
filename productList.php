<?php

include 'database.php';

$query = "SELECT product_id, product_title, product_price, product_desc, product_image ";
$query = $query . "FROM products " ;
//$query = $query . "WHERE " . $product_id . " = '" . $criteria_val . "'";

// Check connection
if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

$result = $connect->query($query);
//print_r($result);

$productList = array();
$i=0;
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$i=$i+1;
		$row["product_image"] = $row["product_image"] . ".jpg";
		$productList[$row["product_id"]] = array($row["product_image"], $row["product_title"], $row["product_price"], $row["product_desc"], $i, "thebodykey", "2.4");
	}
}

$connect->close();

function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function post_data($url,$param) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,$param);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
//website 1 products
$returned_content = get_data('http://skeonline.click/mktplace_curl.php?function=getproducts');
$arr = json_decode($returned_content, true);

$productList2 = array();
foreach ($arr as $k=>$v){
	$v["product_img"] = "skeonline/" . $v["product_img"];
	$productList2[$v["product_id"]] = array($v["product_img"], $v["product_name"],
																					$v["product_price"], $v["product_desc"],
																					$v["visit_count"], "skeonline", $v["avg_rating"]);
}


//anupama
$returned_content = get_data('http://thoughtstoaction.com/mktplace_curl.php?function=getproducts');
//echo $returned_content;
$arr = json_decode($returned_content, true);

$productList3 = array();
foreach ($arr as $k=>$v){
	$v["product_img"] = "thoughtstoaction/" . $v["product_img"];
	$productList3[$v["product_id"]] = array($v["product_img"], $v["product_name"],
																					$v["product_price"], $v["product_desc"],
																					$v["visit_count"], "thoughtstoaction", $v["avg_rating"]);
}

//sahitya
$returned_content = get_data('http://chunduridecor.com/decor/mktplace_curl.php?function=getproducts');
$arr = json_decode($returned_content, true);

$productList4 = array();
foreach ($arr as $k=>$v){
	$v["product_img"] = "chunduridecor/" . $v["product_img"];
	$productList4[$v["product_id"]] = array($v["product_img"], $v["product_name"],
																					$v["product_price"], $v["product_desc"],
																					$v["visit_count"], "chunduridecor", $v["avg_rating"]);
}


//Nischay

$returned_content = get_data('http://khadikaelectronics.com/mktplace_curl.php?function=getproducts');
$arr = json_decode($returned_content, true);

$productList5 = array();
foreach ($arr as $k=>$v){
	$v["product_img"] = "khadikaelectronics/" . $v["product_img"];
	$productList5[$v["product_id"]] = array($v["product_img"], $v["product_name"],
																					$v["product_price"], $v["product_desc"],
																					$v["visit_count"], "khadikaelectronics", $v["avg_rating"]);
}


$returned_content = get_data('http://hungerbuddies.000webhostapp.com/mktplace_curl.php?function=getproducts');
$arr = json_decode($returned_content, true);


$productList6 = array();
foreach ($arr as $k=>$v){
	$v["product_img"] = "hungerbuddies/" . $v["product_img"];
	$productList6[$v["product_id"]] = array($v["product_img"], $v["product_name"],
																					$v["product_price"], $v["product_desc"],
																					$v["visit_count"], "hungerbuddies", $v["avg_rating"]);
}
?>
