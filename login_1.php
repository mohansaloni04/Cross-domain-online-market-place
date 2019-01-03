<div id="login">   
  <h1>Welcome Back!</h1>
  
  <form action="validate.php" method="post">
  
	<div class="field-wrap">
	<label>
	  Username<span class="req">*</span>
	</label>
	<input name="username" type="text" required autocomplete="off"/>
  </div>
  
  <div class="field-wrap">
	<label>
	  Password<span class="req">*</span>
	</label>
	<input name="password" type="password"required autocomplete="off"/>
  </div>
  
  <p class="forgot"><a href="#">Forgot Password?</a></p>
  
  <button name="login" class="button button-block"/>Log In</button>
  
  </form>

</div>