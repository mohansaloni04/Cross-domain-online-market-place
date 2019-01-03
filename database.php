<?php

//echo __DIR__;
$myfile = fopen(__DIR__ ."/database.txt", "r") or die("Unable to open file!");


// Output one line until end-of-file
while(!feof($myfile)) {
  $db = fgets($myfile);
}
fclose($myfile);

$line = chop( $db );
$field = explode( ",", $line);

/*
$host_name  = "db674136112.db.1and1.com";
$database   = "db674136112";
$user_name  = "dbo674136112";
$password   = "cchikpnostq";
*/

$host_name  = $field[0];
$database   = $field[1];
$user_name  = $field[2];
$password   = $field[3];


//$connect = mysqli_connect($host_name, $user_name, $password, $database);
$connect = mysqli_connect("localhost", "tester", "zaq@123" , "test");
?>