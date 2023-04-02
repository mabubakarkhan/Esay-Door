<div class="desktop">

	<div class="brand-banner">
		<div class="banner-text">
			<h1><?=$brand['title']?></h1>
		</div>
	</div>
	<nav id="nav">
		<div class="container">
			<div class="detail-box brands">
				<div class="left-text">
					<h2><?=$brand['title']?></h2>
					<p><?=$Count?> items found in <?=$brand['title']?></p>
				</div>
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
					<div class="b_holder">
						<div class="brand-holder category-section">
							<div class="container">
								<?php if ($all_content): ?>
									<?php foreach ($all_content as $key => $que): ?>
										<div class="brand-list">
											<div class="category-box">
												<h3><?=$que['cat']['title']?></h3>
											</div>
											<div class="brands-column">
												<?php $products = $que['products'] ?>
												<?php foreach ($products as $key => $q): ?>

													<div class="column">
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

											</div><!-- /brands-column -->
										</div><!-- /brand-list -->
									<?php endforeach ?>
								<?php endif ?>

							</div><!-- /container -->
						</div><!-- /brand-holder -->
					</div><!-- /b_holder -->
				</div><!-- /tab-pane -->

			<?php foreach ($content as $mainKey => $row): ?>
				<?php
				if ($mainKey == 0) {
					$mainClass = 'show active';
				}
				else{
					$mainClass = '';
				}
				?>
				<div class="tab-pane fade" id="home-tab-1-<?=$row['list']['seller_listing_id']?>" role="tabpanel" aria-labelledby="home-tab">
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




















