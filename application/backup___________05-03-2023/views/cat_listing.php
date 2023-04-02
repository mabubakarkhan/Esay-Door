<div class="desktop">

	<nav id="nav">
		<a class="menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
		<div class="container">
			<div class="detail-box">
				<div class="left-text">
					<h2><?=$cat['title']?></h2>
					<p><?=$cat['Items']?> item(s) found in <?=$cat['title']?></p>
				</div><!-- /left-text -->
				<div class="select-holder">
					<label>Sort By:</label>
					<select class="price-filter">
						<option value="ASC" selected="selected">Price: Low to High</option>
						<option value="DESC">Price: High to Low</option>
					</select>
				</div><!-- /select-holder -->
			</div><!-- /detail-box -->
		</div><!-- /container -->
	</nav>

	<section class="product-holder">
		<div class="container">
			<div class="left-frame">


				<div class="accordion_1" id="accordionExample">

					<h3>Categories</h3>
					<?php
					$ParentCatID = $cat['id'];
					$CatSideBar1 = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '$ParentCatID' ");
					$catIDz = '0';
					if ($CatSideBar1->num_rows()>0) {
					?>
						<?php foreach ($CatSideBar1->result_array() as $SBCAT_KEY => $sbcat): ?>
							<?php $catIDz .= ','.$sbcat['id']; ?>
							<div class="card">

								<div class="card-head" id="headingOne-<?=$SBCAT_KEY?>">
									<h2 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseOne-<?=$SBCAT_KEY?>" aria-expanded="false" aria-controls="collapseOne-<?=$SBCAT_KEY?>">
										<div class="img-box"><img src="<?=IMG?>img156.png" alt="image"></div>
										<?=$sbcat['title']?>
									</h2>
								</div><!-- /card-head -->

								<div id="collapseOne-<?=$SBCAT_KEY?>" class="collapse" aria-labelledby="headingOne-<?=$SBCAT_KEY?>" data-parent="#accordionExample">
									<div class="card-body">
										<ul class="accordion-list">
											<?php
											$CatSideBar2 = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '".$sbcat['id']."' ");
											if ($CatSideBar2->num_rows()>0) {
												foreach ($CatSideBar2->result_array() as $SBCAT_KEY_2 => $sbcat_2){
													$catIDz .= ','.$sbcat_2['id'];
											?>
												<li><a href="javascript://" class="ListingCatID" data-id="<?=$sbcat_2['id']?>"><img src="<?=IMG?>img157.png" alt="image"><?=$sbcat_2['title']?></a></li>
											<?php
												}
											}
											else{
											?>
												<li><a href="javascript://" class="ListingCatID" data-id="<?=$sbcat['id']?>"><img src="<?=IMG?>img157.png" alt="image"><?=$sbcat['title']?></a></li>
											<?php
											}
											?>
										</ul>
									</div><!-- /card-body -->
								</div><!-- #collapseOne -->

							</div><!-- /card -->
						<?php endforeach ?>
					<?php
					}
					?>

				</div><!-- /accordion_1 -->




				<div class="left-holder">
					<input type="hidden" id="ListingCatID" value="<?=$cat['id']?>">
					<div class="filter-box">
						<h3>price</h3>
						<form>
							<div class="left-col">
								<label>min</label>
								<input type="text" name="min_price">
							</div>
							<div class="right-col">
								<label>max</label>
								<input type="text" name="max_price">
							</div>
							<button class="min-max-price-btn">Done</button>
						</form>
					</div><!-- /filter-box -->
					<?php if ($brands): ?>
						<div class="filter-box">
							<h3>brand</h3>
							<ul class="unstyled centered">
								<?php foreach ($brands as $key => $brand): ?>
									<li>
										<input class="styled-checkbox brand-filter" id="styled-checkbox-brand-<?=$brand['BrandID']?>" type="checkbox" value="<?=$brand['BrandID']?>">
										<label for="styled-checkbox-brand-<?=$brand['BrandID']?>"><?=$brand['title']?></label>
									</li>
								<?php endforeach ?>
							</ul>
						</div><!-- /filter-box -->
					<?php endif ?>
					<?php if ($sizes): ?>
						<div class="filter-box">
							<h3>Size Model is wearing</h3>
							<ul class="unstyled centered">
								<?php foreach ($sizes as $key => $size): ?>
									<li>
										<input class="styled-checkbox size-filter" id="styled-checkbox-size-<?=$size['size_id']?>" type="checkbox" value="<?=$size['size_id']?>">
										<label for="styled-checkbox-size-<?=$size['size_id']?>"><?=$size['name']?></label>
									</li>
								<?php endforeach ?>
							</ul>
						</div><!-- /filter-box -->
					<?php endif ?>
					<?php if ($colors): ?>
						<div class="filter-box">
							<h3>Color</h3>
							<ul class="unstyled centered">
								<?php foreach ($colors as $key => $color): ?>
									<li>
										<input class="styled-checkbox color-filter" id="styled-checkbox-color-<?=$color['color_id']?>" type="checkbox" value="<?=$color['color_id']?>">
										<label for="styled-checkbox-color-<?=$color['color_id']?>"><?=$color['name']?></label>
									</li>
								<?php endforeach ?>
							</ul>
						</div><!-- /filter-box -->
					<?php endif ?>
					<?php if (1==2): ?>
						<div class="filter-box">
							<h3>services</h3>
							<ul class="unstyled centered">
								<li>
									<input class="styled-checkbox" id="styled-checkbox-9" type="checkbox" value="value9">
									<label for="styled-checkbox-9">Cash On Delivery</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-10" type="checkbox" value="value10">
									<label for="styled-checkbox-10">Free Shipping</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-11" type="checkbox" value="value11">
									<label for="styled-checkbox-11">Fulfilled By Easy Door</label>
								</li>
							</ul>
						</div><!-- /filter-box -->
						<div class="filter-box">
							<h3>Warrany Type</h3>
							<ul class="unstyled centered">
								<li>
									<input class="styled-checkbox" id="styled-checkbox-24" type="checkbox" value="value24">
									<label for="styled-checkbox-24">No warranty</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-25" type="checkbox" value="value25">
									<label for="styled-checkbox-25">Local Warranty</label>
								</li>
							</ul>
						</div><!-- /filter-box -->
						<div class="filter-box">
							<h3>Express Delivery</h3>
							<ul class="unstyled centered">
								<li>
									<input class="styled-checkbox" id="styled-checkbox-29" type="checkbox" value="value29">
									<label for="styled-checkbox-29">Lahore</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-30" type="checkbox" value="value30">
									<label for="styled-checkbox-30">Karachi</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-31" type="checkbox" value="value31">
									<label for="styled-checkbox-31">Faisalabad</label>
								</li>
							</ul>
						</div><!-- /filter-box -->
					<?php endif ?>
				</div><!-- /left-holder -->
				<a href="javascript://"><img src="<?=IMG?>img44.jpg" alt="image"></a>
			</div><!-- /left-frame -->

			<div class="right-content">
				<div class="listing-product-block">
					<?php
					$catIDz = str_replace('0,', '', $catIDz);
					$products = $this->db->query("SELECT `product_id`,`product_name`,`product_image`,`price`,`discount`,`new`,`reviews`,`ratting`,`slug` FROM `products` WHERE `category_id` IN($catIDz) AND `in_stock` = 1 ORDER BY `price` ASC;");
					if ($products->num_rows()>0) {
					?>
						<?php foreach ($products->result_array() as $key => $q): ?>

							<?php $ProUrl = BASEURL.'product/'.$q['slug'].'-'.$q['product_id']; ?>
							<div class="column" onclick="window.location.href = '<?=$ProUrl?>';" style="cursor: pointer;">
								<div class="img-box">
									<a href="<?=BASEURL.'product/'.$q['slug'].'-'.$q['product_id']?>"><img src="<?=UPLOADS_PRO.$q['product_image']?>" alt="<?=$q['product_name']?>"></a>
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
										    <?php
											    if ($q['ratting'] == '5' || $q['ratting'] > '4.5') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star5'.$q['product_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['product_id'].'" title="Awesome - 5 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star5'.$q['product_id'].'" value="5" required="required"/><label class = "full" for="star5'.$q['product_id'].'" title="Awesome - 5 stars"></label>';
												}
												if ($q['ratting'] == '4.5' || $q['ratting'] > '4') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star4half'.$q['product_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['product_id'].'" title="Pretty good - 4.5 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star4half'.$q['product_id'].'" value="4.5" required="required"/><label class="half" for="star4half'.$q['product_id'].'" title="Pretty good - 4.5 stars"></label>';
												}
												if ($q['ratting'] == '4' || $q['ratting'] > '3.5') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star4'.$q['product_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['product_id'].'" title="Pretty good - 4 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star4'.$q['product_id'].'" value="4" required="required"/><label class = "full" for="star4'.$q['product_id'].'" title="Pretty good - 4 stars"></label>';
												}
												if ($q['ratting'] == '3.5' || $q['ratting'] > '3') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star3half'.$q['product_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['product_id'].'" title="Meh - 3.5 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star3half'.$q['product_id'].'" value="3.5" required="required"/><label class="half" for="star3half'.$q['product_id'].'" title="Meh - 3.5 stars"></label>';
												}
												if ($q['ratting'] == '3' || $q['ratting'] > '2.5') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star3'.$q['product_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['product_id'].'" title="Meh - 3 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star3'.$q['product_id'].'" value="3" required="required"/><label class = "full" for="star3'.$q['product_id'].'" title="Meh - 3 stars"></label>';
												}
												if ($q['ratting'] == '2.5' || $q['ratting'] > '2') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star2half'.$q['product_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['product_id'].'" title="Kinda bad - 2.5 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star2half'.$q['product_id'].'" value="2.5" required="required"/><label class="half" for="star2half'.$q['product_id'].'" title="Kinda bad - 2.5 stars"></label>';
												}
												if ($q['ratting'] == '2' || $q['ratting'] > '1.5') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star2'.$q['product_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['product_id'].'" title="Kinda bad - 2 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star2'.$q['product_id'].'" value="2" required="required"/><label class = "full" for="star2'.$q['product_id'].'" title="Kinda bad - 2 stars"></label>';
												}
												if ($q['ratting'] == '1.5' || $q['ratting'] > '1') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star1half'.$q['product_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['product_id'].'" title="Meh - 1.5 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star1half'.$q['product_id'].'" value="1.5" required="required"/><label class="half" for="star1half'.$q['product_id'].'" title="Meh - 1.5 stars"></label>';
												}
												if ($q['ratting'] == '1' || $q['ratting'] > '0.5') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="star1'.$q['product_id'].'" value="1" required="required"/><label class = "full" for="star1'.$q['product_id'].'" title="Sucks big time - 1 star"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="star1'.$q['product_id'].'" value="1" required="required"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>';
												}
												if ($q['ratting'] == '0.5' || $q['ratting'] > '0') {
											    	echo '<input type="radio" readonly="readonly" checked="checked" id="starhalf'.$q['product_id'].'" value="0.5" required="required"/><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>';
												}
												else{
											    	echo '<input type="radio" readonly="readonly" id="starhalf'.$q['product_id'].'" value="0.5" required="required"/><label class="half" for="starhalf'.$q['product_id'].'" title="Sucks big time - 0.5 stars"></label>';
												}
											    ?>
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
					<?php } ?>
				</div><!-- /listing-product-block -->
				<?php if (1==2): ?>
					<div class="btn-holder">
						<a href="#" class="learn-more">load more</a>
					</div><!-- /btn-holder -->
				<?php endif ?>
			</div><!-- /right-content -->

		</div><!-- /container -->
	</section><!-- /product-holder -->


	<section class="sale-banner">
		<div class="container">
			<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
				<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
			<?php endif ?>
		</div>
	</section>


</div><!-- /desktop -->