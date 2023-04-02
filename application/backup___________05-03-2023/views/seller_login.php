<section class="login-section seller-section">
	<div class="container">
		<form class="login-form-seller">
			<h1>Welcome to Easy Door Plz login</h1>
			<div class="form-row">
				<label>
					<i class="fa fa-user" aria-hidden="true"></i>
					Phone Number  or email *
				</label>
				<input type="text" name="mobile" required="required" placeholder="Please enter your phone Number or email">
			</div>
			<div class="form-row">
				<label>
					<i class="fa fa-lock" aria-hidden="true"></i>
					Password *
				</label>
				<input type="password" name="password" required="required" placeholder="enter your password">
				<a class="forget" href="<?=BASEURL.'seller-forgot-password'?>">Forget Password?</a>
			</div>
			<input type="submit" value="Login">
			<div class="form-row seller-row" style="text-align: center;">
				<span>Don’t have an account yet?</span>
				<a href="<?=BASEURL.'seller-signup'?>">Become A Seller</a>
			</div>
		</form>
		<div class="seller-holder">
			<a href="#">
				<img src="<?=IMG?>logo.png">
			</a>
			<h1>Welcome to Seller Center</h1>
			<p>
				3 Simple Steps to Sell on Easy Door
			</p>
			<ul>
				<li>
					<a href="#">
						<img src="<?=IMG?>img117.png" align="image">
						<span>Sign-up store profile</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?=IMG?>img118.png" align="image">
						<span>Upload product to start seling</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img src="<?=IMG?>img119.png" align="image">
						<span>Adopt tools to maximize sales</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</section>