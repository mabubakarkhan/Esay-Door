

	<section class="login-section">
		<div class="container">
			<?php if ($type == 'login'): ?>
				<form class="login-form" id="login-form" action="<?=BASEURL.'submit-login/'?>" method="post">
					<?php $label = 'Enter Your Password'; ?>
			<?php else: ?>
				<?php $label = 'Create Your Password'; ?>
				<form class="login-form" id="login-form" action="<?=BASEURL.'submit-signup/'?>" method="post">
			<?php endif ?>
				<p class="alert alert-danger show-error" style="display: none;"></p>
				<input type="hidden" name="username" value="<?=$phone?>">
				<?php if ($type == 'login'): ?>
					<h1>Welcome to Easy Door Plz login</h1>
				<?php else: ?>
					<h1>Welcome to Easy Door</h1>
				<?php endif ?>
				<h1><?=$phone?></h1>
				<div class="form-row">
					<label>
						<i class="fa fa-lock" aria-hidden="true"></i>
						<?=$label?> *
					</label>
					<input type="password" name="password" placeholder="<?=$label?>" required="required">
					<?php if ($type == 'login'): ?>
						<a class="forget" href="<?=BASEURL.'forgot-password'?>">Forget Password?</a>
					<?php endif ?>
				</div><!-- /form-row -->
				<div class="form-row-btns">
					<a href="<?=BASEURL.'login?phone='.$phone?>" class="login-back">Back</a>
					<input type="submit" value="Submit">
				</div><!-- /form-row-btns -->
			</form>
		</div><!-- /container -->
	</section><!-- /login-section -->