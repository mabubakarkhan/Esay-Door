

	<section class="login-section">
		<div class="container">
			<form class="login-form" action="<?=BASEURL.'submit-login-1/'?>" method="post">
				<h1>Welcome to Easy Door Plz login</h1>
				<div class="form-row">
					<label>
						<i class="fa fa-user" aria-hidden="true"></i>
						Phone Number *
					</label>
					<!-- <input type="text" name="username" required="required" placeholder="Please enter your phone Number" title="03331234567" pattern="[0-9]{1}[0-9]{10}"> -->
					<input type="tel" name="username" required="required" placeholder="Please enter your phone Number" title="03331234567" value="<?=$_GET['phone']?>">
				</div><!-- /form-row -->
				<!-- <div class="form-row">
					<label>
						<i class="fa fa-lock" aria-hidden="true"></i>
						Password *
					</label>
					<input type="password" name="password" placeholder="enter your password">
					<a class="forget" href="#">Forget Password?</a>
				</div> --><!-- /form-row -->
				<input type="submit" value="Next">
				<div class="form-row">
					<a href="javascript://" class="facebook"  id="fbbutton">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						Facebook
					</a>
					<a href="#" class="google">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
						Google
					</a>
				</div><!-- /form-row -->
			</form>
		</div><!-- /container -->
	</section><!-- /login-section -->