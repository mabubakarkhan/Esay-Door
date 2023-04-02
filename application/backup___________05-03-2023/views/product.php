<?php
$filters = explode(',', $q['product']['filters']);
?>
<div class="desktop">
	<nav id="nav">
		<a class="menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
		<div class="container">
			<div class="detail-box">
				<div class="left-text">
					<h2><?=$q['product']['Category']?></h2>
					<p><?=$products_count_by_cat['count']?> item(s) found in <?=$q['product']['Category']?></p>
				</div>
			</div><!-- /detail-box -->
		</div><!-- /container -->
	</nav>

		<section class="check-out">
			<div class="container">
				<div class="left-detail">
					<div class="d-box">
						<div class="slider-holder">
							<div class="element">
							  <div class="wrap-gallery-article">
							    <div id="myCarouselArticle" class="carousel slide" data-ride="carousel">
							      
							      <div class="carousel-inner" role="listbox">
							        <div class="carousel-item active zoom">
							        	<img src="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$q['product']['product_image']?>">
							        </div>
							        <?php if ($images): ?>
							        	<?php foreach ($images as $key => $image): ?>
								        	<div class="carousel-item zoom">
									        	<img src="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$image['image']?>">
									        </div>	
							        	<?php endforeach ?>
							        <?php endif ?>
							        <?php if (strlen($q['product']['color_images']) > 10): ?>
							        	<?php $colorImages = explode(',', $q['product']['color_images']); ?>
							        	<?php foreach ($colorImages as $key => $colorImage): ?>
							        		<?php $colorid_ = explode('-', $colorImage); ?>
								        	<div class="carousel-item zoom" id="colorImageDiv<?=$colorid_[0]?>">
									        	<img src="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$colorImage?>">
									        </div>
							        	<?php endforeach ?>
							        <?php endif ?>
							      </div>
							      <a class="carousel-control-prev" href="#myCarouselArticle" role="button" data-slide="prev">
							        <img src="<?=IMG?>img64.jpg" alt="image">
							      </a>
							      <a class="carousel-control-next" href="#myCarouselArticle" role="button" data-slide="next">
							        <img src="<?=IMG?>img65.jpg" alt="image">
							      </a>
							    </div>
							    <div class="row hidden-xs " id="slider-thumbs">
			                        <!-- Bottom switcher of slider -->
								</div>
								      
                				</div>
							</div>
							<ul class="reset-ul d-flex flex-wrap list-thumb-gallery">
	                            <li><a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="0"><img src="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$q['product']['product_image']?>" alt="<?=$q['product']['product_name']?>"></a></li>
	                            <?php $CountImage = 1 ?>
	                            <?php if ($images): ?>
	                            	<?php foreach ($images as $key => $image): ?>
	                            		<li><a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="<?=$CountImage++?>"><img src="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$image['image']?>" alt="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$image['image']?>"></a></li>
	                            	<?php endforeach ?>
	                            <?php endif ?>
	                            <?php if (strlen($q['product']['color_images']) > 10): ?>
						        	<?php $colorImages = explode(',', $q['product']['color_images']); ?>
						        	<?php $colorid_ = explode('-', $colorImage); ?>
						        	<?php foreach ($colorImages as $key => $colorImage): ?>
	                            		<li><a class="thumbnail" data-target="#myCarouselArticle" data-slide-to="<?=$CountImage++?>"><img src="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$colorImage?>" alt="<?=UPLOADS_PRO.$q['product']['category_id'].'/'.$colorImage?>"></a></li>
						        	<?php endforeach ?>
						        <?php endif ?>
                       		 </ul>
						</div><!-- /slider-holder -->
						<div class="right-detail-box detail">
							<div class="top-box">
								<h2><?=$q['product']['product_name']?></h2>
								<ul class="share">
									<li><a href="javascript://"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
									<?php if ($_SESSION['user']): ?>
										<?php if ($check_wishlist): ?>
											<li><a href="javascript://"><i class="fa fa-heart" aria-hidden="true"></i></a></li>
										<?php else: ?>
											<li><a href="javascript://" class="add-wishlist-btn" data-id="<?=$q['product']['product_id']?>"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
										<?php endif ?>
									<?php endif ?>
								</ul>
							</div>
							<?php if (strlen($q['product']['Brand']) > 1): ?>
								<div class="brand-holder">
									<span class="left"><?=$q['product']['Brand']?> - <?=$q['product']['Category']?></span>
									<span class="right">Brand: <a href="<?=BASEURL.'brand/'.$q['product']['BrandSlug'].'-'.$q['product']['brand_id']?>"><?=$q['product']['Brand']?></a></span>
								</div>
							<?php endif ?>
							<?php if ($q['product']['sale_percentage'] > 0): ?>
								<div class="price-holder">
									<span class="new">Rs: <span class="price-show"><?=$q['product']['price']?></span></span>
									<span class="old" style="color: #4ad49b;">Rs: <span class="discount-price-show" style="color: #4ad49b;"><?=$q['product']['price']+$q['product']['discount']?></span></span>
								</div>
							<?php else: ?>
								<div class="price-holder">
									<span class="new">Rs: <span class="price-show"><?=$q['product']['price']?></span></span>
								</div>
							<?php endif ?>
							<div class="size-box">
								<?php if (in_array('size', $filters)): ?>
									<?php if ($sizes): ?>
										<?php $sizeCheck = 'false'; ?>
										<?php $Sizes = explode(',', $q['product']['size']); ?>
										<div class="size-holder">
											<p>
												<?php if ($q['product']['size_note_title']): ?>
													<strong><?=$q['product']['size_note_title']?></strong><br>
												<?php endif ?>
												<?php if ($q['product']['size_note']): ?>
													<?=$q['product']['size_note']?>
												<?php endif ?>
											</p>
											<?php foreach ($sizes as $key => $size1): ?>
												<?php
												if (in_array($size1['size_id'], $Sizes)) {
												?>
													<span class="label">size</span>
												<?php
												break;
												}
												?>
											<?php endforeach ?>
											<?php if (count($Sizes) > 40): ?>
												<?php if (strlen($sizes[0]['name']) > 0): ?>
													<select class="form-control select-size-select">
														<option value="">Select Size</option>
														<?php foreach ($sizes as $key => $size): ?>
															<?php
															if (in_array($size['size_id'], $Sizes)) {
																$sizeCheck = 'true';
															?>
																<option value="<?=$size['size_id']?>"><?=$size['full_name']?></option>
															<?php
															}
															?>
														<?php endforeach ?>
													</select>
												<?php endif ?>
											<?php else: ?>
												<?php if (strlen($sizes[0]['name']) > 0): ?>
													<ul class="size-list">
														<?php foreach ($sizes as $key => $size): ?>
															<?php
															if (in_array($size['size_id'], $Sizes)) {
																$sizeCheck = 'true';
																$priceOfSize = $q['product']['price'];
															?>
																<?php if ($q['product']['filter_price_show'] == 'size'): ?>
																	<?php
																	$sizePrices = explode(',', $q['product']['size_price']);
																	foreach ($sizePrices as $keySP => $sizePrice) {
																		$sizePrice = explode('-', $sizePrice);
																		if ($sizePrice[0] == $size['size_id']) {
																			$priceOfSize = $sizePrice[1];
																			break;
																		}
																		else{
																			$priceOfSize = $q['product']['price'];
																		}
																	}
																	?>
																	<li style="padding: 2px;border: 2px solid #fff;"><a href="javascript://" class="select-size-btn filter-price-btn" data-sizeid="<?=$size['size_id']?>" data-price="<?=$priceOfSize?>" data-discount-price="<?=$priceOfSize+$q['product']['discount']?>"><?=$size['name']?></a></li>
																<?php else: ?>
																	<li style="padding: 2px;border: 2px solid #fff;"><a href="javascript://" class="select-size-btn" data-sizeid="<?=$size['size_id']?>"><?=$size['name']?></a></li>
																<?php endif ?>
															<?php
															}
															?>
														<?php endforeach ?>
													</ul>
												<?php endif ?>
											<?php endif ?>
										</div><!-- /size-holder -->
										<input type="hidden" name="size_check" value="<?=$sizeCheck?>">
									<?php endif ?>
								<?php endif ?>
								<div class="quantity-block">
									<span class="label">Qty:</span>
									<div class="q-box">
										<button class="quantity-arrow-minus qty-minus"> - </button>
										<input class="quantity-num qty-input" type="number" value="1" readonly="readonly" />
										<button class="quantity-arrow-plus qty-plus"> + </button>
									</div>
								</div>
							</div>
							<?php if (in_array('color', $filters)): ?>
								<?php if ($colors): ?>
									<?php $colorCheck = 'false'; ?>
									<?php $Colors = explode(',', $q['product']['color']); ?>
									<div class="color-box">
										<p>
											<?php if ($q['product']['color_note_title']): ?>
												<strong><?=$q['product']['color_note_title']?></strong><br>
											<?php endif ?>
											<?php if ($q['product']['color_note']): ?>
												<?=$q['product']['color_note']?>
											<?php endif ?>
										</p>
										<?php foreach ($colors as $key => $color1): ?>
											<?php
											if (in_array($color1['color_id'], $Colors)) {
											?>
												<span class="label">Color</span>
											<?php
											break;
											}
											?>
										<?php endforeach ?>
										<?php if (count($Colors) > 60): ?>
											<?php if (strlen($Colors[0]['name']) > 0): ?>
												<select class="form-control select-size-color">
													<option value="">Select color</option>
													<?php foreach ($colors as $key => $color): ?>
														<?php
														if (in_array($color['color_id'], $Colors)) {
															$colorCheck = 'true';
														?>
															<option value="<?=$color['color_id']?>"><?=$color['name']?></option>
														<?php
														}
														?>
													<?php endforeach ?>
												</select>
											<?php endif ?>
										<?php else: ?>
											<?php if (strlen($Colors[0]['name']) > 0): ?>
												<ul class="color-list">
													<?php foreach ($colors as $key => $color): ?>
														<?php
														if (in_array($color['color_id'], $Colors)) {
															$colorCheck = 'true';
															$priceOfColor = $q['product']['price'];
														?>
															<?php if ($q['product']['filter_price_show'] == 'color'): ?>
																<?php
																$colorPrices = explode(',', $q['product']['color_price']);
																foreach ($colorPrices as $keyCP => $colorPrice) {
																	$colorPrice = explode('-', $colorPrice);
																	if ($colorPrice[0] == $color['color_id']) {
																		$priceOfColor = $colorPrice[1];
																		break;
																	}
																	else{
																		$priceOfColor = $q['product']['price'];
																	}
																}
																?>
																<li style="padding: 2px;border: 2px solid #fff;"><a href="javascript://" class="select-color-btn filter-price-btn" data-colorid="<?=$color['color_id']?>" data-colorimage="colorImageDiv<?=$color['color_id']?>" data-price="<?=$priceOfColor?>" data-discount-price="<?=$priceOfColor+$q['product']['discount']?>" style="background: <?=$color['name']?>;color: <?=$color['font_color']?>"><?=$color['name']?></a></li>
															<?php else: ?>
																<li style="padding: 2px;border: 2px solid #fff;"><a href="javascript://" class="select-color-btn" data-colorid="<?=$color['color_id']?>" data-colorimage="colorImageDiv<?=$color['color_id']?>" style="background: <?=$color['name']?>;color: <?=$color['font_color']?>"><?=$color['name']?></a></li>
															<?php endif ?>
														<?php
														}
														?>
													<?php endforeach ?>
												</ul>
											<?php endif ?>
										<?php endif ?>
									</div><!-- /color-box -->
									<input type="hidden" name="color_check" value="<?=$colorCheck?>">
								<?php endif ?>
							<?php endif ?>
							<?php if ($q['product']['sale_percentage'] > 0): ?>
								<a href="javascript://" data-proid="<?=$q['product']['product_id']?>" data-price="<?=$q['product']['price']?>" class="check_out add-to-cart-btn" data-redirect="true">Buy Now</a>
								<a href="javascript://" data-proid="<?=$q['product']['product_id']?>" data-price="<?=$q['product']['price']?>" class="check_out add-to-cart-btn" data-redirect="false">Add To Cart</a>
							<?php else: ?>
								<a href="javascript://" data-proid="<?=$q['product']['product_id']?>" data-price="<?=$q['product']['price']?>" class="check_out add-to-cart-btn" data-redirect="true">Buy Now</a>
								<a href="javascript://" data-proid="<?=$q['product']['product_id']?>" data-price="<?=$q['product']['price']?>" class="check_out add-to-cart-btn" data-redirect="false">Add To Cart</a>
							<?php endif ?>
						</div><!-- /right-detail-box -->
					</div><!-- /d-box -->
					<div class="tab-holder product_detail_block">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Reviews</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Return Policy</a>
							</li>
						</ul><!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane active" id="tabs-1" role="tabpanel">
								<?=$q['product']['product_description']?>
								<div class="info-box">
									<span class="heading">General Information</span>
									<?php if (strlen($q['product']['sku']) > 1): ?>
										<div class="infobox-box">
											<span class="left">SKU</span>
											<span class="right"><?=$q['product']['sku']?></span>
										</div><!-- /infobox-box -->
									<?php endif ?>
									<?php if (strlen($q['product']['warranty']) > 1): ?>
										<div class="infobox-box">
											<span class="left">Warranty</span>
											<span class="right"><?=$q['product']['warranty']?></span>
										</div><!-- /infobox-box -->
									<?php endif ?>
								</div><!-- /info-box -->
								<?php if ($q['tags']): ?>
									<div class="info-box">
										<span class="heading">Product Information</span>
										<?php foreach ($q['tags'] as $key => $tag): ?>
											<div class="infobox-box">
												<span class="left"><?=$tag['name']?></span>
												<span class="right"><?=$tag['value']?></span>
											</div><!-- /infobox-box -->
										<?php endforeach ?>
									</div><!-- /info-box -->
								<?php endif ?>
							</div><!-- /tab-pane -->
							<div class="tab-pane" id="tabs-2" role="tabpanel">
								<div class="review-holder">
									<strong>Customer Reviews (<?=$q['product']['reviews']?>)</strong>

									<?php if ($can_review): ?>
										<span>Write Review</span>
										<form action="<?=BASEURL.'submit-review'?>" class="review-form">
											<input type="hidden" name="reload" value="no">
											<input type="hidden" name="user_id" value="<?=$_SESSION['user']['customer_id']?>">
											<input type="hidden" name="product_id" value="<?=$ProID?>">

											<div class="review-row">
												<div class="review-col">
													<div class="review-box">
														<label>Rating</label>
														<div class="rating-holder">
															<fieldset class="rating">
																<input type="radio" id="star5" name="ratting" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																<input type="radio" id="star4half" name="ratting" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																<input type="radio" id="star4" name="ratting" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																<input type="radio" id="star3half" name="ratting" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																<input type="radio" id="star3" name="ratting" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
																<input type="radio" id="star2half" name="ratting" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																<input type="radio" id="star2" name="ratting" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																<input type="radio" id="star1half" name="ratting" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																<input type="radio" id="star1" name="ratting" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																<input type="radio" id="starhalf" name="ratting" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
															</fieldset>
														</div><!-- /rating-holder -->
													</div><!-- /review-box -->
												</div><!-- /review-row -->
												<div class="review-col">
													<div class="review-box">
														<label>Review Title</label>
														<select name="title">
															<option value="Excellent" selected="selected">Excellent</option>
															<option value="Good">Good</option>
															<option value="Bad">Bad</option>
														</select>
													</div><!-- /review-box -->
													<div class="review-box">
														<label>Body of Review</label>
														<textarea name="comment"></textarea>
													</div><!-- /review-box -->
												</div><!-- /review-col -->
												
											</div><!-- /review-row -->
											<div class="button-holder">
												<button type="submit">submit</button>
											</div><!-- /button-holder -->

										</form>
									<?php endif ?>
									<div class="product-reviews-block product-review">
										<span class="heading">product review</span>
										<ul>
											<?php if ($reviews): ?>
												<?php foreach ($reviews as $key => $review): ?>
													<li>
														<div class="left-box">
															<div class="top-box">
																<strong><?=$review['title']?></strong>
																<span class="verify"><img src="images/img134.png" alt="image"> verified purchese</span>
																<?php
																if (strlen($review['fname']) > 0 || strlen($review['fname']) > 0) {
																	echo '<strong>'.$review['fname'].' '.$review['lname'].'</strong>';
																}
																else{
																	echo '<strong>user</strong>';
																}
																?>
															</div>
															<p>
																<?=$review['comment']?>
															</p>
														</div>
														<div class="right_box">
															<span class="date"><?=date('d M, Y',strtotime($review['at']))?></span>
															<fieldset class="rating">
															    <?php
															    if ($review['ratting'] == '5' || $review['ratting'] > '4.5') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star5'.$review['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$review['review_id'].'" title="Awesome - 5 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star5'.$review['review_id'].'" value="5" required="required"/><label class = "full" for="star5'.$review['review_id'].'" title="Awesome - 5 stars"></label>';
																}
																if ($review['ratting'] == '4.5' || $review['ratting'] > '4') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star4half'.$review['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$review['review_id'].'" title="Pretty good - 4.5 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star4half'.$review['review_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$review['review_id'].'" title="Pretty good - 4.5 stars"></label>';
																}
																if ($review['ratting'] == '4' || $review['ratting'] > '3.5') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star4'.$review['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$review['review_id'].'" title="Pretty good - 4 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star4'.$review['review_id'].'" value="4" required="required"/><label class = "full" for="star4'.$review['review_id'].'" title="Pretty good - 4 stars"></label>';
																}
																if ($review['ratting'] == '3.5' || $review['ratting'] > '3') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star3half'.$review['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$review['review_id'].'" title="Meh - 3.5 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star3half'.$review['review_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$review['review_id'].'" title="Meh - 3.5 stars"></label>';
																}
																if ($review['ratting'] == '3' || $review['ratting'] > '2.5') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star3'.$review['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$review['review_id'].'" title="Meh - 3 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star3'.$review['review_id'].'" value="3" required="required"/><label class = "full" for="star3'.$review['review_id'].'" title="Meh - 3 stars"></label>';
																}
																if ($review['ratting'] == '2.5' || $review['ratting'] > '2') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star2half'.$review['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$review['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star2half'.$review['review_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$review['review_id'].'" title="Kinda bad - 2.5 stars"></label>';
																}
																if ($review['ratting'] == '2' || $review['ratting'] > '1.5') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star2'.$review['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$review['review_id'].'" title="Kinda bad - 2 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star2'.$review['review_id'].'" value="2" required="required"/><label class = "full" for="star2'.$review['review_id'].'" title="Kinda bad - 2 stars"></label>';
																}
																if ($review['ratting'] == '1.5' || $review['ratting'] > '1') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star1half'.$review['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$review['review_id'].'" title="Meh - 1.5 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star1half'.$review['review_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$review['review_id'].'" title="Meh - 1.5 stars"></label>';
																}
																if ($review['ratting'] == '1' || $review['ratting'] > '0.5') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="star1'.$review['review_id'].'" value="1" required="required"/><label class = "full" for="star1'.$review['review_id'].'" title="Sucks big time - 1 star"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="star1'.$review['review_id'].'" value="1" required="required"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
																}
																if ($review['ratting'] == '0.5' || $review['ratting'] > '0') {
															    	echo '<input type="radio" readonly="readonly" checked="checked" id="starhalf'.$review['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
																}
																else{
															    	echo '<input type="radio" readonly="readonly" id="starhalf'.$review['review_id'].'" value="0.5" required="required"/><label class="half" for="starhalf'.$review['review_id'].'" title="Sucks big time - 0.5 stars"></label>';
																}
															    ?>
															</fieldset>
															<div class="share-box">
																<a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
																<a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
															</div><!-- /share-box -->
														</div><!-- /right_box -->
													</li>
												<?php endforeach ?>
											<?php endif ?>
										</ul>
									</div><!-- /product-reviews-block -->
									<?php if ($reviews && !(($review_pages['count']/10) < 1)): ?>
										<ul class="pagination">
											<li>
												<a href="javascript://"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
											</li>
											<?php
											for ($i=1; $i <= $review_pages['count']/10; $i++) { 
												if ($i == 1) {
													echo '<li><a class="active review-page-btn" data-page="'.$i.'" data-id="'.$q['product']['product_id'].'" href="javascript://">'.$i.'</a></li>';
												}
												else{
													echo '<li><a class="review-page-btn" data-page="'.$i.'" data-id="'.$q['product']['product_id'].'" href="javascript://">'.$i.'</a></li>';
												}
											}
											?>
											<li>
												<a href="javascript://"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
											</li>
										</ul>
									<?php endif ?>
								</div><!-- /review-holder -->
								
							</div><!-- /tab-pane -->
							<div class="tab-pane" id="tabs-3" role="tabpanel">
								<?=$return_policy['pg_descri']?>
							</div><!-- /tab-pane -->
						</div><!-- /tab-content -->
					</div><!-- /tab-holder -->
				</div><!-- /left-detail -->
				<div class="right-detail">
					<span class="heading">Delivery Option</span>
					<ul class="delivery-list">
						<li>
							<div class="img-box">
								<img src="<?=IMG?>img66.png" alt="image">
							</div>
							<div class="l-text">
								<span><?=$settings[6]['value']?></span>
								<!-- <a class="edit" href="#">Edit</a> -->
							</div>
						</li>
						<li>
							<div class="img-box">
								<img src="<?=IMG?>img67.png" alt="image">
							</div>
							<div class="l-text">
								<span>Easy & Secure Payment</span>
							</div>
						</li>
						<li>
							<div class="img-box">
								<img src="<?=IMG?>img68.png" alt="image">
							</div>
							<div class="l-text">
								<strong><?=$settings[3]['value']?> Days Return</strong>
								<!-- <span>Change of mind available</span> -->
							</div>
						</li>
						<li>
							<div class="img-box">
								<img src="<?=IMG?>img69.png" alt="image">
							</div>
							<div class="l-text">
								<strong>Home Delivery</strong>
								<span><?=$settings[4]['value']?></span>
							</div>
						</li>
						<li>
							<div class="img-box">
								<img src="<?=IMG?>img70.png" alt="image">
							</div>
							<div class="l-text">
								<strong>Warranty</strong>
								<span><?=$settings[5]['value']?></span>
							</div>
						</li>
						<?php if (strlen($q['product']['Brand']) > 0): ?>
							<li class="brand-name">
								<div class="l-text">
									<span>Sold by</span>
									<strong><a href="<?=BASEURL.'brand/'.$q['product']['BrandSlug'].'-'.$q['product']['brand_id']?>"><?=$q['product']['Brand']?></a></strong>
								</div>
								<div class="img-box">
									<img src="<?=IMG?>img71.png" alt="image">
								</div>
							</li>
						<?php endif ?>
					</ul>
				</div><!-- /right-detail -->
			</div><!-- /container -->
		</section>


		<?php if ($related_products): ?>
			<section class="deal-section customer-slider">
				<div class="container">
					<span class="title">Customers who viewed this item also viewed</span>
					<div class="slider">
						<?php foreach ($related_products as $key => $product): ?>
							<div class="slide">
								<div class="containerr">	
									<div class="img-holder">
										<a href="<?=BASEURL.'product/'.$product['slug'].'-'.$product['product_id']?>"><img src="<?=UPLOADS_PRO.$product['category_id'].'/'.$product['product_image']?>" alt="<?=$product['product_name']?>"></a>
									</div><!-- /img-holder -->
									<div class="text-holder">
										<h2><?=$product['product_name']?></h2>
										<div class="price-holder">
											<div class="left">
												<?php if ($product['sale_percentage'] > 0): ?>
													<span class="new">Rs. <?=$product['price']?></span>
													<span class="old">Rs. <?=$product['price']+$product['discount']?></span>
												<?php else: ?>
													<span class="new">Rs. <?=$product['price']?></span>
												<?php endif ?>
											</div><!-- /left -->
										</div><!-- /price-holder -->
										<a class="add-cart add-cart-2" href="<?=BASEURL.'product/'.$product['slug'].'-'.$product['product_id']?>">Add to Cart</a>
									</div><!-- /text-holder -->
								</div><!-- /containerr -->
							</div><!-- /slide -->
						<?php endforeach ?>
					</div><!-- /slider -->
					<?php if (1===2): ?>
						<div class="btn-holder">
							<a href="#" class="shop-more">Shop More</a>
						</div>
					<?php endif ?>
				</div><!-- /container -->
			</section><!-- /deal-section -->
		<?php endif ?>


		<?php if (1==2): ?>
			<section class="sale-banner">
				<div class="container">
					<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
						<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
					<?php endif ?>
				</div>
			</section>
		<?php endif ?>


</div><!-- /desktop -->




<input type="hidden" class="size_id_add_to_cart" name="size_id" value="0">
<input type="hidden" class="color_id_add_to_cart" name="color_id" value="0">
