<div class="desktop">
	<!-- Main Banner -->

	<section class="banner">
		<img src="<?=IMG?>img5.jpg" alt="image">
	</section>

	<!-- three Ad Boxes -->
	<?php if ($ads): ?>
		<section class="posts">
			<div class="container">
				<div class="post-columns">
					<?php foreach ($ads as $key => $ad): ?>
						<?php if ($ad['ad_id'] == 1 && strlen($ad['image']) > 3): ?>
							<div class="column">
								<a href="<?=$ad['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ad['image']?>"></a>
							</div>
						<?php elseif ($ad['ad_id'] == 2 && strlen($ad['image']) > 3): ?>
							<div class="column">
								<a href="<?=$ad['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ad['image']?>"></a>
							</div>
						<?php elseif ($ad['ad_id'] == 3 && strlen($ad['image']) > 3): ?>
							<div class="column">
								<a href="<?=$ad['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ad['image']?>"></a>
							</div>
						<?php endif ?>
					<?php endforeach ?>
				</div>
			</div>
		</section>
	<?php endif ?>

	<!-- deal portion -->
	<?php if ($deals): ?>
		<section class="deal-section home-page-deal-main-block">
			<div class="container">
				<div class="top-head">
					<span class="heading"><a href="<?=BASEURL.'deals'?>" style="color:#fff;">Deal of The Day</a></span>
					<div class="timer-holder">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
						<div id="timer"></div>
					</div>
				</div><!-- /top-head -->
				<div class="slider">
					<?php foreach ($deals['products'] as $key => $q): ?>
						<div class="slide">
							<div class="container">	
								<div class="img-holder">
									<a href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>"><img src="<?=UPLOADS_PRO.$q['category_id'].'/'.$q['product_image']?>" alt="<?=$q['product_name']?>"></a>
									<?php if ($q['sale_percentage'] > 0): ?>
										<span class="discount">-<?=intval($q['sale_percentage'])?>%</span>
									<?php endif ?>
								</div>
								<div class="text-holder">
									<h2><?=$q['product_name']?></h2>
									<!-- <p>Lorem Ipsum is simply dummy text Lorem Ipsum is simply dummy text........</p> -->
									<div class="price-holder">
										<div class="left">
											<?php if ($q['sale_percentage'] > 0): ?>
												<span class="new">Rs. <?=$q['price']?></span>
												<span class="old">Rs. <?=$q['price']+$q['discount']?></span>
											<?php else: ?>
												<span class="new">Rs. <?=$q['price']?></span>
											<?php endif ?>
										</div><!-- /left -->
										<div class="right">
											<div class="rating-holder">
												<fieldset class="rating">
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '5') ? 'checked="checked"' : '' ?> id="star5__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="5" required="required"/><label class = "full" for="star5__<?=$q['product_id']?>" title="Awesome - 5 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '4.5') ? 'checked="checked"' : '' ?> id="star4half__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="4.5" required="required"/><label class="half" for="star4half__<?=$q['product_id']?>" title="Pretty good - 4.5 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '4') ? 'checked="checked"' : '' ?> id="star4__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="4" required="required"/><label class = "full" for="star4__<?=$q['product_id']?>" title="Pretty good - 4 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '3.5') ? 'checked="checked"' : '' ?> id="star3half__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="3.5" required="required"/><label class="half" for="star3half__<?=$q['product_id']?>" title="Meh - 3.5 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '3') ? 'checked="checked"' : '' ?> id="star3__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="3" required="required"/><label class = "full" for="star3__<?=$q['product_id']?>" title="Meh - 3 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '2.5') ? 'checked="checked"' : '' ?> id="star2half__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="2.5" required="required"/><label class="half" for="star2half__<?=$q['product_id']?>" title="Kinda bad - 2.5 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '2') ? 'checked="checked"' : '' ?> id="star2__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="2" required="required"/><label class = "full" for="star2__<?=$q['product_id']?>" title="Kinda bad - 2 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '1.5') ? 'checked="checked"' : '' ?> id="star1half__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="1.5" required="required"/><label class="half" for="star1half__<?=$q['product_id']?>" title="Meh - 1.5 stars"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '1') ? 'checked="checked"' : '' ?> id="star1__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="1" required="required"/><label class = "full" for="star1__<?=$q['product_id']?>" title="Sucks big time - 1 star"></label>
												    <input type="radio" readonly="readonly" <?=($q['ratting'] == '0.5') ? 'checked="checked"' : '' ?> id="starhalf__<?=$q['product_id']?>" name="ratting__<?=$q['product_id']?>" value="0.5" required="required"/><label class="half" for="starhalf__<?=$q['product_id']?>" title="Sucks big time - 0.5 stars"></label>
												</fieldset>
												<em>(<?=$q['reviews']?>)</em>
											</div><!-- /rating-holder -->
										</div><!-- /right -->
									</div><!-- /price-holder -->
								</div><!-- /text-holder -->
							</div><!-- /container -->
						</div><!-- /slide -->
					<?php endforeach ?>

				</div><!-- /slider -->
			</div><!-- /container -->
		</section><!-- /deal-section -->
	<?php endif ?>



	<?php if ($featured_products): ?>
		<section class="product-holder">
			<div class="container">
				<h1>Featured Products</h1>
				<div class="right-content" style="width: 100%;">
					<?php foreach ($featured_products as $key => $q): ?>
						<?php $ProUrl = BASEURL.'product/'.$q['slug'].'-'.$q['product_id']; ?>
						<div class="column" onclick="window.location.href = '<?=$ProUrl?>';" style="cursor: pointer;">
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
								<div class="rating-holder">
									<fieldset class="rating">
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '5') ? 'checked="checked"' : '' ?> id="star5____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="5" required="required"/><label class = "full" for="star5____________<?=$q['product_id']?>" title="Awesome - 5 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '4.5') ? 'checked="checked"' : '' ?> id="star4half____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="4.5" required="required"/><label class="half" for="star4half____________<?=$q['product_id']?>" title="Pretty good - 4.5 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '4') ? 'checked="checked"' : '' ?> id="star4____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="4" required="required"/><label class = "full" for="star4____________<?=$q['product_id']?>" title="Pretty good - 4 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '3.5') ? 'checked="checked"' : '' ?> id="star3half____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="3.5" required="required"/><label class="half" for="star3half____________<?=$q['product_id']?>" title="Meh - 3.5 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '3') ? 'checked="checked"' : '' ?> id="star3____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="3" required="required"/><label class = "full" for="star3____________<?=$q['product_id']?>" title="Meh - 3 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '2.5') ? 'checked="checked"' : '' ?> id="star2half____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="2.5" required="required"/><label class="half" for="star2half____________<?=$q['product_id']?>" title="Kinda bad - 2.5 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '2') ? 'checked="checked"' : '' ?> id="star2____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="2" required="required"/><label class = "full" for="star2____________<?=$q['product_id']?>" title="Kinda bad - 2 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '1.5') ? 'checked="checked"' : '' ?> id="star1half____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="1.5" required="required"/><label class="half" for="star1half____________<?=$q['product_id']?>" title="Meh - 1.5 stars"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '1') ? 'checked="checked"' : '' ?> id="star1____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="1" required="required"/><label class = "full" for="star1____________<?=$q['product_id']?>" title="Sucks big time - 1 star"></label>
									    <input type="radio" readonly="readonly" <?=($q['ratting'] == '0.5') ? 'checked="checked"' : '' ?> id="starhalf____________<?=$q['product_id']?>" name="ratting ____________<?=$q['product_id']?>" value="0.5" required="required"/><label class="half" for="starhalf____________<?=$q['product_id']?>" title="Sucks big time - 0.5 stars"></label>
									</fieldset>
									<em>(<?=$q['reviews']?>)</em>
								</div><!-- /rating-holder -->
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
				</div><!-- /right-content -->
			</div><!-- /container -->
		</section>
	<?php endif ?>



	<?php foreach ($parents as $key => $cat_home): ?>
		<?php if ($cat_home['main_home_page'] == 'yes'): ?>
		
			<section class="fashion">
				<div class="container">
					<div class="top-head">
						<span class="heading"><?=$cat_home['title']?></span>
						<ul class="nav nav-tabs" role="tablist">
							<?php
							$tabParents = array();
							$parent = $cat_home['id'];
							$first = true;
							$hcfcz = $this->db->query("SELECT `id`,`title`,`slug`,`image` FROM `categories` WHERE `parent` = '$parent' AND `main_home_page_under_parent` = 'yes';");
                            if ($hcfcz->num_rows()>0){
								foreach ($hcfcz->result_array() as $key => $cat_home2) {
									if ($first == true) {
										$class = 'active';
										$first = false;
									}
									else{
										$class = '';
									}
									$tabParents[] = $cat_home2;
								?>
									<li class="nav-item"><a class="nav-link <?=$class?>" href="#home-tab-<?=$cat_home2['id']?>" role="tab" data-toggle="tab"><?=$cat_home2['title']?></a></li>
								<?php
								}
                            }
							?>
						</ul>
						<a href="<?=BASEURL.'listing/'.$cat_home['slug'].'/'?>" class="shop-more">Shop More</a>
					</div><!-- /top-head -->
					<div class="tabs-holder">
						<div class="tab-content">
							<?php $second = true; ?>
							<?php foreach ($tabParents as $key => $tabParent): ?>
								<?php
								if ($key == 0) {
									$class = 'in active show';
								}
								else{
									$class = '';
								}
								?>
								<div role="tabpanel" class="tab-pane fade <?=$class?>" id="home-tab-<?=$tabParent['id']?>">
									<div class="tabs_column">
										<div class="column first">
											<img src="<?=UPLOADS_CAT.$tabParent['image']?>" align="<?=$tabParent['title']?>">
										</div>
										<div class="column">
											<ul>
												<?php
												$countTabs = 0;
												$hcscz = $this->db->query("SELECT `id`,`title`,`slug`,`image` FROM `categories` WHERE `parent` = '".$tabParent['id']."' AND `main_home_page_under_parent` = 'yes';");
                            					if ($hcscz->num_rows()>0){
                            					?>
													<?php foreach ($hcscz->result_array() as $key => $cat_home3): ?>
														<?php if ($countTabs < 6): ?>
															<li>
																<a href="<?=BASEURL.'listing/'.$cat_home3['slug'].'/'?>">
																	<img src="<?=UPLOADS_CAT.$cat_home3['image']?>" align="<?=$cat_home3['title']?>">
																	<span><?=$cat_home3['title']?></span>
																</a>
															</li>
															<?php $countTabs++; ?>
														<?php endif ?>
													<?php endforeach ?>
                            					<?php
                            					}
												?>
											</ul>
										</div><!-- /column -->
									</div><!-- /tabs_column -->
								</div><!-- /tabpanel -->
							<?php endforeach ?>

						</div><!-- /tab-content -->
					</div><!-- /tabs-holder -->
				</div><!-- /container -->
			</section><!-- /fashion -->

			<section class="sale-banner">
				<div class="container">
					<img src="<?=UPLOADS_CAT.$cat_home['image']?>" alt="<?=$cat_home['title']?>">
				</div>
			</section><!-- /sale-banner -->

		<?php endif ?>
	<?php endforeach ?>
	
	<!-- <div class="btn-holder">
		<a href="#" class="learn-more">learn more</a>
	</div> -->

</div><!-- /desktop -->




