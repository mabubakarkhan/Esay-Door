<section class="login-section">
	<div class="container">
		<div class="seller-signup sign-up">
			<h1>Welcome to Easy Door Plz Signup</h1>
			<form class="seller-signup-form seller-signup-form-1">
				<div class="signup-row">
					<label>First Name</label>
					<input type="text" name="fname" required="required">
				</div>
				<div class="signup-row">
					<label>Last Name</label>
					<input type="text" name="lname" required="required">
				</div>
				<div class="signup-row">
					<label>Phone Number *</label>
					<input type="tel" name="mobile" required="required">
				</div>
				<div class="signup-row">
					<label>Password</label>
					<input type="password" name="password" required="required">
				</div>
				<div class="signup-row">
					<label>Email</label>
					<input type="email" name="email" required="required">
				</div>
				<div class="signup-row">
					<label>Business Address</label>
					<input type="text" name="shop_address" required="required">
				</div>
				<div class="signup-row">
					<label>Preferred Shop Name</label>
					<input type="text" name="brand_name" required="required">
				</div>
				<?php if (1==2): ?>
				<div class="signup-row birth">
					<div class="sign-col">
						<label>Birth Day</label>
						<input type="text" name="dob_day" placeholder="Day">
					</div>
					<div class="sign-col">
						<label class="empty">Birth Month</label>
						<input type="text" name="dob_month" placeholder="Month">
					</div>
					<div class="sign-col">
						<label class="empty">Birth Year</label>
						<input type="text" name="dob_year" placeholder="Year">
					</div>
					<div class="sign-col">
						<label>Gender</label>
						<select name="gender">
							<option value="">Select</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
							<option value="not mentioned">Not Mention</option>
						</select>
					</div>
				</div>
				<div class="signup-row check-box">
					<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
					<label for="styled-checkbox-1">i want to recieve exclusive offers and promotions from easy door</label>
				</div>
				<?php endif ?>
				<input type="submit" value="Signup">
			</form>
			<div class="social-login">
				<span>By clicking “Sign up”, I agree to Easy Door Term of use and privacy policy</span>
				<input type="submit" value="Signup with Email">
					<div class="form-row">
					<a href="#" class="facebook">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						Facebook
					</a>
					<a href="#" class="google">
						<i class="fa fa-google-plus" aria-hidden="true"></i>
						Google
					</a>
				</div>
			</div>
		</div>
	</div>
</section>