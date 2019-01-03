<?php
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
$query = mysqli_query($connect,"DELETE FROM cart WHERE ipaddress = '$ip'");
mysqli_close($connect);
}
?>
<!DOCTYPE html>
<html>
<body>
<table align="center">
<tr>
<td><h3>Your order is successfully placed</h3></td>
</tr>
<tr>
<td style="padding:20px">
<a href="http://thebodykey.com/products.php"><button>Continue Shopping</button></a>
</td>
</tr>
</table>
</body>
</html>
