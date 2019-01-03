<?php

$myarray6 = array();



array_unshift($myarray6, "10");
array_unshift($myarray6, "20");
array_unshift($myarray6, "30");
array_unshift($myarray6, "40");
array_unshift($myarray6, "50");
array_unshift($myarray6, "60");
array_unshift($myarray6, "70");
print_r($myarray6);
echo "<br>";
$toJson= json_encode($myarray6);
setcookie("myarray6", $toJson);
print_r($_COOKIE);
echo "<br>";
?>

<html>
<body>
<?php
print_r($_COOKIE);
echo "<br>";


if(!isset($_COOKIE["myarray6"])) {
    echo "Cookie named is not set!";
} else {
    echo "Cookie is set!<br>";
    echo "Value is: " . $_COOKIE["myarray6"];
}

$getcookie = $_COOKIE["myarray6"];
$retcookie = json_decode($getcookie, true);

print_r($retcookie);
echo "<br>";
?>
</body>
</html