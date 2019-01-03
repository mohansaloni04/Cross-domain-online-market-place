<?php
include 'productList.php';

$arrayList = array_merge($productList,$productList2,$productList3,$productList4,$productList5,$productList6);
function getIp()
{
	$ip = $_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	return $ip;
}
$ip = getIp();

include 'database.php';

$query1 = mysqli_query($connect, "SELECT * FROM cart WHERE ipaddress = '$ip'");

$finalprice =0;
for($index =0; $row = mysqli_fetch_row($query1); $index++)
{
	$i = $row[0];

	//print_r($arrayList[$i]);

	$finalprice = $finalprice +	(intval($arrayList[$row[0]][2]) * $row[2]);
}
mysqli_close($connect);

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

	<link rel="stylesheet" href="main.css" />
	<meta charset="UTF-8" >
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/style.css">

  </head>
<body>
	<div class="jumbotron">
<div class="container">

<h2> Pay now with Paypal</h2>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="marketplace@online.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <!--<input type="hidden" name="item_name" value="Hot Sauce-12oz. Bottle">-->
  <input type="hidden" name="amount" value="<?php print($finalprice); ?>">
  <input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="return" value="http://thebodykey.com/success.php"/>
<input type="hidden" name="cancel_return" value="www.thebodykey.com/payment_cancel.php" />
<!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/btn_buynow_107x26.png"
  alt="Buy Now" />
  <img alt="" border="0" width="10" height="10"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" />

</form>
</div>
</div>
</body>
</html>
