<div id="signup">
  <h1>Sign Up for Free</h1>
  <form action="validate.php" method="post">

  <div class="top-row">
	<div class="field-wrap">
	  <label>
		First Name <span class="req">*</span>
	  </label>
	  <input name="firstname" type="text" required autocomplete="off" />
	</div>

	<div class="field-wrap">
	  <label>
		Last Name<span class="req">*</span>
	  </label>
	  <input name="lastname" type="text"required autocomplete="off"/>
	</div>
  </div>

  <div class="top-row">
    <div class="field-wrap">
  	<label>
  	  Username<span class="req">*</span>
  	</label>
  	<input name="username" type="text" required autocomplete="off"/>
    </div>

    <div class="field-wrap">
  	<label>
  	  Set A Password<span class="req">*</span>
  	</label>
  	<input name="password" type="password" required autocomplete="off"/>
    </div>
  </div>

  <div class="top-row">
    <div class="field-wrap">
  	<label>
  	  Home Phone<span class="req">*</span>
  	</label>
  	<input name="homephone" type="text" required autocomplete="off"/>
    </div>
    <div class="field-wrap">
  	<label>
  	  Mobile<span class="req">*</span>
  	</label>
  	<input name="mobile" type="text" required autocomplete="off"/>
    </div>
  </div>

  <div class="field-wrap">
	<label>
	  Email address<span class="req">*</span>
	</label>
	<input name="emailId" type="text" required autocomplete="off"/>
  </div>

  <div class="field-wrap">
	<label>
	  City<span class="req">*</span>
	</label>
	<input name="city" type="text" required autocomplete="off"/>
  </div>

  <button name="signup" type="submit" class="button button-block"/>Get Started</button>

  </form>

</div>
