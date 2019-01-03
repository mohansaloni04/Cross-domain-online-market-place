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

	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="contact-us.css">
  <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAevuz4mDRNExXdFdhMxegSBbxf7zo24WY&callback=initMap" type="text/javascript"></script><script type="text/javascript">// <![CDATA[
  var markers = [{"lat":"37.3360008","lng":"-121.8847221","description":"Name: Sudheer Sammeta<br><a href='http://thebodykey.com/'>Body Products</a>"},
  {"lat":"37.4997475","lng":"-122.2970704","description":"Name: Nishchay Madan<br><a href='http://khadikaelectronics.com/'>Electronic Store</a>"},
  {"lat":"37.431553","lng":"-121.919988","description":"Name: Sahitya Mullapudi<br><a href='http://chunduridecor.com/'>Decor Store</a>"},
  {"lat":"37.3093131","lng":"-122.078664","description":"Name: Anupama Upadhyayula<br><a href='http://thoughtstoaction.com/'>Travel Website</a>"},
  {"lat":"37.3897202","lng":"-122.0941611","description":"Name: Saloni Mohan<br><a href='http://hungerbuddies.000webhost.com/'>Food Site</a>"},
  {"lat":"37.5295019","lng":"-122.0689912","description":"Name: Swarnlata Kumari<br><a href='http://skeonline.click/'>Cooking </a>"}];
  window.onload = function () {
  var mapOptions = {
  center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
  zoom: 15,
  mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
  var infoWindow = new google.maps.InfoWindow();
  var lat_lng = new Array();
  var latlngbounds = new google.maps.LatLngBounds();
  for (i = 0; i < markers.length; i++) {
  var data = markers[i]
  var myLatlng = new google.maps.LatLng(data.lat, data.lng);
  lat_lng.push(myLatlng);
  var marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  title: data.title
  });
  latlngbounds.extend(marker.position);
  (function (marker, data) {
  google.maps.event.addListener(marker, "click", function (e) {
  infoWindow.setContent(data.description);
  infoWindow.open(map, marker);
  });
  })(marker, data);
  }
  map.setCenter(latlngbounds.getCenter());
  map.fitBounds(latlngbounds);

  }
  </script>

  </head>

  <body>
    <?php include 'header.php' ?>
      <div id="dvMap" style="width: 1500px; height: 300px;"></div>
      <h1>Contact Us</h1><hr>
	  <div class="container">
        <?php
			//echo __DIR__;
			$myfile = fopen(__DIR__ ."/contactdetails.txt", "r") or die("Unable to open file!");

			// Output one line until end-of-file
			while(!feof($myfile)) {
			  echo fgets($myfile) . "<br>";
			}
			fclose($myfile);
			?>
	   </div>
  </body>
</html>
