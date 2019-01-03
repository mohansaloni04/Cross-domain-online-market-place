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


?>
<!DOCTYPE html>
<html>
<head>
<style>
table, tr, td
{

border-collapse: collapse;
padding: 50px;
}
td {
  padding:20px;  
}
body {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #414141;
  background: #caccf7 
  padding: 10px 0;
}
h1 {
  font-family: 'Fredoka One', Helvetica, Tahoma, sans-serif;
  color: #fff;
  text-shadow: 1px 2px 0 #7184d8;
  font-size: 3.5em;
  line-height: 1.1em;
  padding: 6px 0;
  font-weight: normal;
  text-align: center;
}

img { border: 0;  }
br { display: block; line-height: 1.6em; }
#page {
  display: block;
  background: #fff;
  padding: 5px 0;
  -webkit-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
  -moz-box-shadow: 0 2px 4px rgba(0,0,0,0.4);
}
tr.checkoutrow {
  background: #cfdae8;
  border-top: 1px solid #abc0db;
  border-bottom: 1px solid #abc0db;
}
td.checkout {
  padding: 12px 0;
  padding-top: 20px;
  width: 100%;
  text-align: right;
}
#title {
  display: block;
  width: 100%;
  background: #95a6d6;
  padding: 10px 0;
  -webkit-border-top-right-radius: 6px;
  -webkit-border-top-left-radius: 6px;
  -moz-border-radius-topright: 6px;
  -moz-border-radius-topleft: 6px;
  border-top-right-radius: 6px;
  border-top-left-radius: 6px;
}
#cart {
  display: block;
  border-collapse: collapse;
  margin: 0;
  width: 80%;
  font-size: 1.2em;
  color: #444;
}
#cart thead th {
  padding: 2px 0;
  font-weight: bold;
}

#cart thead th.first {
  width: 50px;
}


#cart tbody td {
  text-align: center;
  margin-top: 4px;
}

tr.productitm {
  height: 65px;
  line-height: 65px;
  border-bottom: 1px solid #d7dbe0;
}
.remove {
  cursor: pointer;
  position: relative;
  right: 12px;
  top: 5px;
}

.light {
  color: #888b8d;
  text-shadow: 1px 1px 0 rgba(255,255,255,0.45);
  font-size: 1.1em;
  font-weight: normal;
}
.thick {
  color: #272727;
  font-size: 1.7em;
  font-weight: bold;
}
</style>
</head>
<body>
<?php include 'header.php'?>
<div id="w">
    <header id="title">
      <h1>Shopping Cart</h1>
    </header>
    <div id="page">
      <table id="cart">
        <thead>
          <tr>
            <th class="first">Photo</th>
            <th class="second">Qty</th>
            <th class="third">Product</th>
            <th class="fourth">Line Total</th>
            <!--<th class="fifth">&nbsp;</th>-->
          </tr>
        </thead>
		<tbody>
		<?php
		$total=0;

		 for($index =0; $row = mysqli_fetch_row($query1); $index++)
         {
			 print('<tr class="productitm">');
			 print("<td><img src= './images/".$arrayList[$row[0]][0]. "' class = 'thumb'></td>");
			 print("<td>" . $row[2] . "</td>");
			 print("<td>". $arrayList[$row[0]][1] . "</td>");
			 print("<td>". $arrayList[$row[0]][2] . "</td>");
			 $finalprice = $finalprice +	(intval($arrayList[$row[0]][2]) * $row[2]);
			 print("</tr>");
			 
         }
		 print("<tr class='totalprice'>");
		 print("<td class='light'>Total:</td>");
		 print("<td colspan='2'>&nbsp;</td>");
		 print("<td colspan='2'><span class='thick'> $" .$finalprice."</span></td>");
		 print("</tr>");
		 print("<tr class='checkoutrow'>");
		 print("<td colspan='2' class='checkout'><a href='http://www.chunduridecor.com/decor/products/'><button>Continue Shopping</button></a></td>");
		 print("<td colspan='3' class='checkout'><a href='checkout.php'><button>Checkout with Paypal</button></a></td>");
		 
		 print("</tr>")
		 //mysqli_close($conn);
		?>
		 
    	</tbody>
	</table>
	</div>
</div>
<?php mysqli_close($connect);?>
</body>
</html>
		 
          