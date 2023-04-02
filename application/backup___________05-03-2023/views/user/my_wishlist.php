		<div class="tab-content" id="myTabContent">




			<div class="tab-pane fade show active" id="statements" role="tabpanel" aria-labelledby="statements-tab">
			  	<div class="user-panel-holder">
			  		<h1>my wishlist</h1>
			  		  <div class="inner-tabs">
							<?php if (1==2): ?>
							    <div class="nav-tabs-wrapper">
							      <ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
							        <li class="nav-item">
							          <a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-1" aria-selected="false" aria-controls="block-simple-text-1" id="block-simple-text-1-tab">wishlist <i class="fa fa-heart-o" aria-hidden="true"></i></a>
							        </li>
							      </ul>
							      <button class="add-cart">Add All to cart</button>
							    </div>
							<?php endif ?>
						    <div class="card">
						      	<div class="card-body">
							        <div class="tab-content">

								          <div id="block-simple-text-1" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
									            <?php foreach ($wishlist as $key => $wish): ?>
									            	<!-- bakar -->
										            <div class="user-order-holder">
										            	<ul class="order-list">
										            		<li>
										            			<div class="img-holder">
										            				<img src="<?=UPLOADS_PRO.$wish['category_id'].'/'.$wish['image']?>" alt="image">
										            			</div>
										            			<div class="product-detail_holder">
										            				<!-- <span class="supplier">As Supplier (Rawalpindi)</span> -->
										            				<p><?=$wish['Product']?></p>
										            				<em class="short-description"><?=$wish['Brand']?></em>
										            			</div>
									            				<div class="right-box">
									            					<div class="box-1">
									            						<?php if ($wish['sale_percentage'] > 0): ?>
										            						<span>Rs. <?=$wish['price']?></span>
										            						<span>Rs. <?=$wish['discount']+$wish['price']?> (<?=$wish['sale_percentage']?>%)</span>
										            						<span>Price Droped</span>
									            						<?php else: ?>
									            							<span></span>
										            						<span>Rs. <?=$wish['price']?></span>
										            						<span></span>
									            						<?php endif ?>
									            					</div>
									            					<a href="<?=BASEURL.'product/'.$wish['slug'].'-'.$wish['product_id']?>" class="box-2">
									            						<img src="<?=IMG?>bg-cart.png" alt="image">
									            					</a>
									            					<a href="javascript://" class="box-3 delete-wish-list-btn" data-id="<?=$wish['wishlist_id']?>">
									            						<img src="<?=IMG?>bg-delete.png" alt="image">
									            					</a>
									            				</div>
										            		</li>
										            	</ul>
										            </div><!-- /user-order-holder -->
									            <?php endforeach ?>


								          </div><!-- #block-simple-text-1 -->
							        </div>
						       </div>
						    </div>
					    </div>
					</div>
		  		</div><!-- /statements -->




		</div><!-- /tab-content -->
	</div>
</div>