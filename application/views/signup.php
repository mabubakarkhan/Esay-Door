
<?php if ($cats): ?>
	<nav id="nav">
		<a class="menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
		<div class="container">
			<ul class="main-menu">
				<?php foreach ($cats as $key => $cat): ?>
					<?php if ($cat['main_menu'] == 'yes'): ?>
						<li>
							<a class="active" href="<?=BASEURL.'listing/'.$cat['id'].'/'?>">
								<img src="<?=IMG?>img1.png" align="image">
								<?=$cat['title']?>
								<i class="fa fa-caret-down" aria-hidden="true"></i>
							</a>
							<?php
							$parent = $cat['id'];
							$check = false;
							foreach ($cats as $key => $cat2) {
								if ($cat2['parent'] == $parent) {
									$check = true;
									break;
								}
							}
							if ($check) {
							?>
								<ul class="dropdown">
									<?php foreach ($cats as $key => $cat3): ?>
										<?php if ($cat3['parent'] == $parent): ?>
											<li><a href="<?=BASEURL.'listing/'.$cat3['id'].'/'?>"><?=$cat3['title']?></a></li>
										<?php endif ?>
									<?php endforeach ?>
								</ul>
							<?php
							}
							?>
						</li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
			<div class="side-menu">
				<i class="fa fa-bars" aria-hidden="true"></i>
				all categories
				<ul class="side-drop">
					<?php foreach ($cats as $key => $cat_): ?>
						<?php if ($cat_['main_right_menu'] == 'yes'): ?>
							<li><a href="<?=BASEURL.'listing/'.$cat_['id'].'/'?>"><?=$cat_['title']?></a></li>
						<?php endif ?>
					<?php endforeach ?>
				</ul>
			</div><!-- /side-menu -->
		</div><!-- /container -->
	</nav>
<?php endif ?>


	<section class="login-section">
		<div class="container">
			<form class="login-form">
				<h1>Welcome to Easy Door Plz login</h1>
				<div class="form-row">
					<label>
						<i class="fa fa-user" aria-hidden="true"></i>
						Phone Number *
					</label>
					<input type="text" name="mobile" placeholder="Please enter your mobile number" required="required">
				</div><!-- /form-row -->
				<div class="form-row">
					<label>
						<i class="fa fa-user" aria-hidden="true"></i>
						Email 
					</label>
					<input type="email" name="email" placeholder="Please enter your email">
				</div><!-- /form-row -->
				<div class="form-row">
					<label>
						<i class="fa fa-lock" aria-hidden="true"></i>
						Password *
					</label>
					<input type="password" name="password" placeholder="enter your password" required="required">
					<a class="forget" href="#">Forget Password?</a>
				</div><!-- /form-row -->
				<input type="submit" value="Login">
				<div class="form-row">
					<a href="#" class="facebook">
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