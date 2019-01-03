<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/591cd5498028bb732704657d/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>


<div class="nav">
  <div class="container">
	<ul class="pull-left">
	  <li><a href="index.php">Home</a></li>
	  <li><a href="products.php">Products</a></li>
	  <li><a href="news.php">News</a></li>
	  <li><a href="about-us.php">About Us</a></li>
	  <li><a href="contactus_page.php">Contact Us</a></li>
	  <li><a href="user_details.php">Users</a></li>
	  <?php if(isset($_SESSION['username']) and $_SESSION['username'] == "admin"){ ?>
	  <li><a href="admin.php">Secure</a></li>
	  <?php }?>
	</ul>
	<ul class="pull-right">
	<?php if(isset($_SESSION['username'])){ ?>
	   <li><a href="logout.php">Log Out</a></li>
	<?php }else{ ?>
	  <li><a href="login.php?login=2">Sign Up</a></li>
	  <li><a href="login.php?login=1">Log In</a></li>
	<?php } ?>
	  <li><a href="#">Help</a></li>
	</ul>
  </div>
</div>
