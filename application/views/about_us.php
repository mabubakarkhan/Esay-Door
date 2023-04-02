<section class="main-banner">
	<img src="<?=IMG?>img82.jpg" alt="image">
	<div class="container">
		<div class="caption-box">
			<div class="cap-holder">
				<span>easy shopping</span>
				<h2><?=$page['pg_title']?></h2>
			</div>
		</div>
	</div>
</section>

		<section class="who-we-section">
			<div class="container">
				<div class="two-columns">
					<div class="column">
						<?=$page['pg_descri']?>
					</div>
					<?php if (strlen($page['video_code']) > 0): ?>
						<div class="column">
							<iframe width="" height="" src="https://www.youtube.com/embed/<?=$page['video_code']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					<?php endif ?>
				</div>
				<div class="three-columns">
					<div class="column">
						<img src="<?=IMG?>img32.jpg" alt="image">
						<strong>Free Shipping</strong>
						<span>Free shipping on all UK orders</span>
					</div>
					<div class="column">
						<img src="<?=IMG?>img33.jpg" alt="image">
						<strong>Money Gu arantee</strong>
						<span>30 days money back guarantee</span>
					</div>
					<div class="column">
						<img src="<?=IMG?>img34.jpg" alt="image">
						<strong>Online Support</strong>
						<span>We support online 24 hours a day</span>
					</div>
				</div>
			</div>
		</section>	

		<section class="work-section">
			<div class="container">
				<div class="work-text">
					<span>We work hard to</span>
					<h2>minimise mistakes,</h2>
					<em>
						but when they do happen, <br>
						we make them 100% right!
					</em>
					<div class="tool-holder">
						<div class="tool-tip">
							<p>
								You can now get your car inspected and sold at a fair price through our safe and hassle free process. Our nationwide network of purchase centers use an internally developed algorithm, and a professionally trained team to conduct inspections.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>	

		<section class="facilities-section">
			<div class="container">
				<div class="f-text">
					<span>Easy Door </span>
					<h2>Facilities</h2>
				</div>
				<p>
					Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
				</p>
				<ul class="logo-holder">
					<li>
						<a href="#">
							<div class="img-box">
								<img src="<?=IMG?>img74.png" alt="image">
							</div>
							<span>Fast Delivery</span>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="img-box">
								<img src="<?=IMG?>img75.png" alt="image">
							</div>
							<span>Fast Delivery</span>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="img-box">
								<img src="<?=IMG?>img76.png" alt="image">
							</div>
							<span>Fast Delivery</span>
						</a>
					</li>
					<li>
						<div class="img-box">
							<img src="<?=IMG?>img77.png" alt="image">
						</div>
							<span>Fast Delivery</span>
						</a>
					</li>
					<li>
						<a href="#">
							<div class="img-box">
								<img src="<?=IMG?>img78.png" alt="image">
							</div>
							<span>Fast Delivery</span>
						</a>
					</li>
				</ul>
			</div>
		</section>


<?php if ($testimonials): ?>
	<section class="testimonials">
		<div class="container">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php foreach ($testimonials as $key => $testimonial): ?>
						<?php
						if ($key == 0) {
							$class = 'active';
						}
						else{
							$class = '';
						}
						?>
				    	<li data-target="#carouselExampleIndicators" data-slide-to="<?=$key?>" class="<?=$class?>"></li>
					<?php endforeach ?>

				</ol>
				<div class="carousel-inner">

					<?php foreach ($testimonials as $key => $testimonial): ?>
						<?php
						if ($key == 0) {
							$class = 'active';
						}
						else{
							$class = '';
						}
						?>
						<div class="carousel-item <?=$class?>">
							<img src="<?=UPLOADS_CAT.$testimonial['image']?>" alt="<?=$testimonial['title']?>">
							<span class="name"><?=$testimonial['title']?></span>
							<p><?=$testimonial['detail']?></p>
							<ul class="stars-rating">
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
								<li><i class="fa fa-star" aria-hidden="true"></i></li>
							</ul>
						</div><!-- /carousel-item -->
					<?php endforeach ?>

				</div><!-- /carousel-inner -->
			</div><!-- /carousel -->
		</div><!-- /container -->
	</section><!-- /testimonials -->
<?php endif ?>