

<section class="forgot-password">
	<div class="container">
		<div class="img-box">
			<img src="<?=IMG?>img154.png" alt="image">
		</div>
		<div class="forgot-form">
			<strong>forgot password</strong>
			<form id="forgot-password-form">
				<div class="form-row first_">
					<label><i class="fa fa-mobile" aria-hidden="true"></i>Enter Your mobile number <em>*</em></label>
					<input type="text" id="forgot-password-mobile" placeholder="Enter Your mobile number" title="03331234567" pattern="[0-9]{1}[0-9]{10}" required="required">
				</div>
				<div class="form-row second_ last">
					<label><i class="fa fa-lock" aria-hidden="true"></i>Enter Your Recived Code</label>
					<input type="password" id="forgot-password-code" disabled="disabled">
				</div>
				<div class="form-row third_ last">
					<label><i class="fa fa-lock" aria-hidden="true"></i>Enter Your New Password</label>
					<input type="password" id="forgot-password-new" disabled="disabled">
				</div>
				<button class="forgot-password-btn-1" type="submit">Next</button>
			</form>
		</div>
	</div>
</section>