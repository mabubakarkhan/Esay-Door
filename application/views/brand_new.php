<div class="desktop">

	<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" style="position: relative;min-height: 275px;">
		<div class="carousel-inner">
			<?php if ($brandSlider): ?>
				<?php foreach ($brandSlider as $key => $slide): ?>
					<?php
					if ($key == 0) {
						$slideClass = 'active';
					}
					else{
						$slideClass = '';
					}
					?>
					<div class="carousel-item <?=$slideClass?>">
						<img class="d-block w-100" src="<?=$slide['slide']?>" alt="<?=$brand['title']?>">
					</div><!-- /carousel-item -->
				<?php endforeach ?>
			<?php else: ?>
				<?php if (strlen($brand['banner']) > 4): ?>
					<div class="carousel-item active">
						<img class="d-block w-100" src="<?=UPLOADS_CAT.$brand['banner']?>" alt="banner">
					</div><!-- /carousel-item -->
				<?php else: ?>
					<?php foreach ($commonSlider as $key => $slide): ?>
						<?php
						if ($key == 0) {
							$slideClass = 'active';
						}
						else{
							$slideClass = '';
						}
						?>
						<div class="carousel-item <?=$slideClass?>">
							<img class="d-block w-100" src="<?=UPLOADS_ADMIN.'sliders/'.$slide['slider_image']?>" alt="<?=$slide['slider_title']?>">
						</div><!-- /carousel-item -->
					<?php endforeach ?>
				<?php endif ?>
			<?php endif ?>
		</div><!-- /carousel-inner -->
			<div class="container">
				<div class="brand-page-title-new">
					<div class="clear"></div>
					<div class="img"><img src="<?=UPLOADS_CAT.$brand['image']?>"></div>
					<div class="meta-detail">
						<h1><?=$brand['title']?></h1>
						<p><?=$Count?> total products listed by <?=$brand['title']?></p><br>
						<p><?=number_format($brand['brand_visit']+$brand['product_visit'])?> views</p>
					</div><!-- /meta-detail -->
					<div class="clear"></div>
				</div><!-- /brand-page-title-new -->
		</div><!-- /container -->
	</div><!-- /carouselExampleSlidesOnly -->



	<nav id="nav">
		<div class="container">
			<div class="detail-box brands">
				<div class="brands-tabs">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item"><a class="nav-link active" id="home-tab-000" data-toggle="tab" href="#home-tab-1-000" role="tab" aria-controls="home-tab-1-000" aria-selected="true">All</a></li>
						<?php foreach ($content as $key => $list): ?>
							<li class="nav-item"><a class="nav-link" id="home-tab-<?=$list['list']['seller_listing_id']?>" data-toggle="tab" href="#home-tab-1-<?=$list['list']['seller_listing_id']?>" role="tab" aria-controls="home-tab-1-<?=$list['seller_listing_id']?>" aria-selected="false"><?=$list['list']['title']?></a></li>
						<?php endforeach ?>
					</ul>
				</div><!-- /brands-tabs -->
			</div><!-- /detail-box -->
		</div><!-- /container -->
	</nav>



	<div class="tab-content brand-content" id="myTabContent">
		<div class="container">

				<div class="tab-pane fade show active" id="home-tab-1-000" role="tabpanel" aria-labelledby="home-tab">

					<?php if ($catsData): ?>
						<ul class="brand-cat-listing">
							<?php foreach ($catsData as $key => $que): ?>
								<?php if ($key == 0): ?>
									<li class="active brand-page-cat-li" data-cat="<?=$que['id']?>" data-brand="<?=$brand['brand_id']?>"><?=$que['title']?></li>
								<?php else: ?>
									<li class="brand-page-cat-li" data-cat="<?=$que['id']?>" data-brand="<?=$brand['brand_id']?>"><?=$que['title']?></li>
								<?php endif ?>
							<?php endforeach ?>
						</ul><!-- /brand-cat-listing -->
					<?php endif ?>

					<div class="row">
						<div class="col-md-9">
							<p class="cat-pro-count"><?=count($products)?> product(s) found</p>
							<div class="brands-column brand-page-listing">
								<?php foreach ($products as $key => $q): ?>
									<div class="column">
										<div class="img-box">
											<a href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>"><img src="<?=UPLOADS_PRO.$q['category_id'].'/'.$q['product_image']?>" alt="<?=$q['product_name']?>"></a>
											<?php if ($q['new'] == 'yes'): ?>
												<span class="offer">New</span>
											<?php endif ?>
										</div><!-- /img-box -->
										<span class="heading"><?=$q['product_name']?></span>
										<div class="price-box">
											<div class="p-box">
												<?php if ($q['sale_percentage'] > 0): ?>
													<span class="new">Rs. <?=$q['price']?></span>&nbsp;&nbsp;
													<span class="old"><?=$q['price']+$q['discount']?></span>
												<?php else: ?>
													<span class="new">Rs. <?=$q['price']?></span>
												<?php endif ?>
											</div>
										</div><!-- /price-box -->
										<a class="add-cart" href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>">Add to Cart</a>
									</div><!-- /column -->
									
								<?php endforeach ?>

							</div><!-- /brands-column -->
						</div><!-- /9 -->
						<div class="col-md-3">
							<?php if (strlen($brand['about']) > 1): ?>
								<div class="brand-page-ad">
									<h3>About</h3>
									<p><?=$brand['about']?></p>
								</div><!-- /brand-page-ad -->
							<?php endif ?>

							<?php if ($brandAds): ?>
								<?php foreach ($brandAds as $key => $ad): ?>
									<div class="brand-page-ad">
										<img src="<?=UPLOADS_CAT.$ad['ad']?>">
									</div><!-- /brand-page-ad -->
								<?php endforeach ?>
							<?php else: ?>
								<div class="brand-page-ad">
									<img src="<?=UPLOADS_ADMIN.'ad/'.$common_ad[3]['image']?>">
								</div><!-- /brand-page-ad -->
							<?php endif ?>
						</div><!-- /3 -->
					</div><!-- /row -->

				</div><!-- /tab-pane -->




				<!-- LISTING View -->

				<?php foreach ($content as $mainKey => $row): ?>
					<div class="tab-pane fade hide" id="home-tab-1-<?=$row['list']['seller_listing_id']?>" role="tabpanel" aria-labelledby="home-tab">
						<div class="b_holder">
							<div class="brand-holder category-section">
								<div class="container">
									<?php if ($row['content']): ?>
										<?php foreach ($row['content'] as $key => $que): ?>
											<div class="brand-list">
												<div class="category-box">
													<h3><?=$que['cat']['title']?></h3>
												</div>
												<div class="brands-column">
													<?php $products = $que['products'] ?>
													<?php foreach ($products as $key => $q): ?>

														<div class="column">
															<div class="img-box">
																<a href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>"><img src="<?=UPLOADS_PRO.$q['category_id'].'/'.$q['product_image']?>" alt="<?=$q['product_name']?>"></a>
																<?php if ($q['new'] == 'yes'): ?>
																	<span class="offer">New</span>
																<?php endif ?>
															</div><!-- /img-box -->
															<span class="heading"><?=$q['product_name']?></span>
															<div class="price-box">
																<div class="p-box">
																	<?php if ($q['sale_percentage'] > 0): ?>
																		<span class="new">Rs. <?=$q['price']?></span>
																		<span class="old">Rs. <?=$q['price']+$q['discount']?></span>
																	<?php else: ?>
																		<span class="new">Rs. <?=$q['price']?></span>
																	<?php endif ?>
																</div>
															</div><!-- /price-box -->
															<a class="add-cart" href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>">Add to Cart</a>
															<div class="overlay">
																<a href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>">
																	<i class="fa fa-shopping-cart" aria-hidden="true"></i>
																	Add to Cart
																</a>
															</div><!-- /overlay -->
														</div><!-- /column -->
														
													<?php endforeach ?>

												</div><!-- /brands-column -->
											</div><!-- /brand-list -->
										<?php endforeach ?>
									<?php endif ?>

								</div><!-- /container -->
							</div><!-- /brand-holder -->
						</div><!-- /b_holder -->
					</div><!-- /tab-pane -->
				<?php endforeach ?>

			
		
		</div><!-- /container -->
	</div><!-- /tab-content -->




</div><!-- /desktop -->



<style>
.clear{ clear: both;  }
.carousel-inner{
	height: 400px;
}
.carousel-inner .carousel-item{
	width: 100%;
	height: 100%;
	object-fit: contain;
	-webkit-object-fit: contain;
	-moz-object-fit: contain;
	-o-object-fit: contain;
}
.carousel-inner .carousel-item img{
	width: 100%;
	height: 100%;
	object-fit: cover;
	-webkit-object-fit: cover;
	-moz-object-fit: cover;
	-o-object-fit: cover;
}
#myTabContent{
	width: 100% !important;
}
.brand-page-title-new{
	position: absolute;
	bottom: 0;
}
.brand-page-title-new .img{
	padding: 3px;
	background: #fff;
	width: 150px;
	height: 150px;
	overflow: hidden;

	object-fit: contain;
	-webkit-object-fit: contain;
	-moz-object-fit: contain;
	-o-object-fit: contain;
	float: left;

	border-radius: 10px 10px 0 0;
	-webkit-border-radius: 10px 10px 0 0;
	-moz-border-radius: 10px 10px 0 0;
	-o-border-radius: 10px 10px 0 0;

	box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
	-webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
	-moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
	-o-box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
}
.brand-page-title-new .img img{
	width: 100%;
	height: 100%;
	object-fit: contain;
	-webkit-object-fit: contain;
	-moz-object-fit: contain;
	-o-object-fit: contain;
	border-radius: 10px 10px 0 0;
	-webkit-border-radius: 10px 10px 0 0;
	-moz-border-radius: 10px 10px 0 0;
	-o-border-radius: 10px 10px 0 0;
}
.brand-page-title-new .meta-detail{
	float: left;
	padding-top: 30px;
	padding-left: 25px;
}
.brand-page-title-new h1{
	font-size: 25px;
	color: #fff;
	font-weight: bold;
	text-transform: uppercase;
	letter-spacing: 1px;
}
.brand-page-title-new p{
	font-size: 13px;
	color: #fff;
	background: #000;
	padding: 2px 5px;
	margin: 0;
	margin-bottom: 5px;
	display: inline-block;
}
.brand-cat-listing{
	list-style: none;
	padding: 0;
	margin: 0;
	margin-top: 20px;
	margin-bottom: 20px;
}
.brand-cat-listing li{
	display: inline-block;
	border:  1px solid #ff6c00;
	padding: 10px 20px;
	font-size: 17px;
	font-weight: 400;
	text-transform: uppercase;
	margin-right: 7px;
	margin-bottom: 15px;
	cursor: pointer;
	border-radius: 10px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-o-border-radius: 10px;
	-webkit-transition: all .4s ease-out;
	-moz-transition: all .4s ease-out;
	-o-transition: all .4s ease-out;
	transition: all .4s ease-out;
}
.brand-cat-listing li.active,
.brand-cat-listing li:hover{
	color: #fff;
	background: #ff6c00;
}
.brand-page-ad{
	width: 100%;
	margin: 20px 0;
	cursor: pointer;
	box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
	-webkit-box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
	-moz-box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
	-o-box-shadow: rgba(0, 0, 0, 0.1) 0px 20px 25px -5px, rgba(0, 0, 0, 0.04) 0px 10px 10px -5px;
}
.brand-page-ad h3{
	padding: 5px 15px;
	display: inline-block;
	border-bottom: 1px solid #000;
}
.brand-page-ad p{
	padding: 15px;
}
.brand-page-ad img{
	width: 100%;
}
</style>




