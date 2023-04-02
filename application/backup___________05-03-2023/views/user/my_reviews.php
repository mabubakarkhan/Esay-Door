		<div class="tab-content" id="myTabContent">




			<div class="tab-pane fade show active" id="campaign1" role="tabpanel" aria-labelledby="campaign1-tab">
			  	<div class="user-panel-holder">
			  		<h1>my Reviews</h1>
			  		  <div class="inner-tabs">

					    <div class="nav-tabs-wrapper">
					      <ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
					        <li class="nav-item">
					          <a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-111" aria-selected="false" aria-controls="block-simple-text-111" id="block-simple-text-111-tab">To Be Reviewed</a>
					        </li>
					        <li class="nav-item">
					          <a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-222" aria-selected="false" aria-controls="block-simple-text-222" id="block-simple-text-222-tab">History</a>
					        </li>
					      </ul>
					    </div>
					    <div class="card">
					      <div class="card-body">
					        <div class="tab-content">

						        <div id="block-simple-text-111" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
						            <?php foreach ($purchesed_products as $key => $purchesed_product): ?>
						            	<?php if ($purchesed_product['ReviewStatus'] != 'active' && $purchesed_product['ReviewStatus'] != 'inactive'): ?>
								            <div class="user-order-holder">
								            	<ul class="order-list">
								            		<li>
								            			<div class="img-holder">
								            				<img src="<?=UPLOADS_PRO.$purchesed_product['category_id'].'/'.$purchesed_product['image']?>" alt="<?=$purchesed_product['Product']?>">
								            			</div>
								            			<div class="product-detail_holder">
								            				<span class="date">Purchase on <?=date('d M, Y',strtotime($purchesed_product['at']))?></span>
								            				<p><?=$purchesed_product['Product']?> </p>
								            				<em class="short-description"><?=$purchesed_product['Category']?> </em>
								            			</div>
								            			<div class="right-holder">
								            				<div class="holder-holder">
								            					<span class="sold">Sold by:</span>
								            					<span class="seller">
								            						<?=$purchesed_product['Brand']?>
								            					</span>
								            					
								            				</div>
								            				<?php if ($purchesed_product['ReviewStatus'] == 'inactive'): ?>
								            					<a class="review-btn" style="background: red;color: white;">Rejected</a>
								            				<?php elseif ($purchesed_product['ReviewStatus'] == 'new'): ?>
								            					<a class="review-btn" style="background: #09f;color: white;">Under Observation</a>
								            				<?php else: ?>
							            						<a class="review-btn btn-review-action" data-toggle="tab" role="tab" href="#profile" data-id="<?=$purchesed_product['product_id']?>" data-image="<?=UPLOADS_PRO.$purchesed_product['category_id'].'/'.$purchesed_product['image']?>" data-product="<?=$purchesed_product['Product']?>" data-brand="<?=$purchesed_product['Brand']?>" data-category="<?=$purchesed_product['Category']?>" data-at="Purchase on <?=date('d M, Y',strtotime($purchesed_product['at']))?>">Review</a>
								            				<?php endif ?>
								            			</div>
								            		</li>
								            	</ul>
								            </div><!-- /user-order-holder -->
						            	<?php endif ?>
						            <?php endforeach ?>

						        </div><!-- #block-simple-text-1 -->


					          <div id="block-simple-text-222" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-2-tab">
					            <?php foreach ($purchesed_products as $key => $purchesed_product): ?>
					            	<?php if ($purchesed_product['ReviewStatus'] == 'active' || $purchesed_product['ReviewStatus'] == 'inactive'): ?>
							            <div class="user-order-holder">
							            	<ul class="order-list">
							            		<li>
							            			<div class="img-holder">
							            				<img src="<?=UPLOADS_PRO.$purchesed_product['category_id'].'/'.$purchesed_product['image']?>" alt="<?=$purchesed_product['Product']?>">
							            			</div>
							            			<div class="product-detail_holder">
							            				<span class="date">Purchase on <?=date('d M, Y',strtotime($purchesed_product['at']))?></span>
							            				<p><?=$purchesed_product['Product']?> </p>
							            				<em class="short-description"><?=$purchesed_product['Category']?> </em>
							            			</div>
							            			<div class="right-holder">
							            				<div class="holder-holder">
							            					<span class="sold">Sold by:</span>
							            					<span class="seller">
							            						<?=$purchesed_product['Brand']?>
							            					</span>
							            					
							            				</div>
							            				<?php if ($purchesed_product['ReviewStatus'] == 'inactive'): ?>
							            					<a class="review-btn" style="background: red;color: white;">Rejected</a>
							            				<?php elseif ($purchesed_product['ReviewStatus'] == 'active'): ?>
							            					<a class="review-btn" style="background: green;color: white;">Active</a>
							            				<?php endif ?>
							            			</div>
							            		</li>
							            	</ul>
							            </div><!-- /user-order-holder -->
					            	<?php endif ?>
					            <?php endforeach ?>
					          </div><!-- /block-simple-text-2 -->
					          
					        </div><!-- /tab-content -->
					      </div><!-- /card-body -->
					    </div><!-- /card -->
					  </div><!-- /inner-tabs -->
			  	</div><!-- /user-panel-holder -->
		  	</div><!--  compaigns1 -->



		  	<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	<div class="user-panel-holder">
			  		<h1>Write Review</h1>
			  		<div class="profile_holder">
			  			<form action="<?=BASEURL.'submit-review'?>" class="review-form" enctype="multipart/form-data">
				  			<div class="payment-holder">
				  				<div class="review-holder">
				  					<div class="column">
				  						<div class="r-1">
				  							<div class="img-holder">
				  								<img src="<?=IMG?>img23.jpg" alt="image">
				  							</div>
				  							<div class="r-text">
				  								<span class="purchase">Purchase on 11 Nov 202</span>
				  								<strong>Kids Toys pack Kids Toys pack  Kids Toys pack </strong>
				  								<em>Multi Toys pack Multi Toys pack</em>
				  							</div>
				  						</div>
				  						<input type="hidden" name="reload" value="yes">
				  						<input type="hidden" name="product_id">
				  						<input type="hidden" name="user_id" value="<?=$_SESSION['user']['customer_id']?>">
				  						<div class="r-2">
				  							<div class="review-box">
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
												</div>
											</div>
				  						</div>
				  						<div class="r-3">
				  							<p>
				  								Please share your product experience Was the product as description? What is the quality like? What did you like or details about the product?
				  							</p>
				  							<textarea placeholder="Write Your Review" name="comment"></textarea>

				  							<div class="image-upload-container">
											      <div class="image-upload-one">
											        <div class="center">
											          <div class="form-input">
											            <label for="file-ip-1">
											              <img id="file-ip-1-preview" src="https://i.ibb.co/ZVFsg37/default.png">
											              <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button>
											            </label>
											            <input type="file"  name="image_1_" data-input="image_1" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);">
											            <input type="hidden" name="image_1">
											          </div>
											          <small class="small">Use the &#8634; icon to reset the image</small>
											        </div>
											      </div>
											      <!-- ************************************************************************************************************ -->
											      <div class="image-upload-two">
											        <div class="center">
											          <div class="form-input">
											            <label for="file-ip-2">
											              <img id="file-ip-2-preview" src="https://i.ibb.co/ZVFsg37/default.png">
											              <button type="button" class="imgRemove" onclick="myImgRemove(2)"></button>
											            </label>
											            <input type="file" name="image_2_" data-input="image_2" id="file-ip-2" accept="image/*" onchange="showPreview(event, 2);">
											            <input type="hidden" name="image_2">
											          </div>
											          <small class="small">Use the &#8634; icon to reset the image</small>
											        </div>
											      </div>

											      <!-- ************************************************************************************************************ -->
											      <div class="image-upload-three">
											        <div class="center">
											          <div class="form-input">
											            <label for="file-ip-3">
											              <img id="file-ip-3-preview" src="https://i.ibb.co/ZVFsg37/default.png">
											              <button type="button" class="imgRemove" onclick="myImgRemove(3)"></button>
											            </label>
											            <input type="file" name="image_3_" data-input="image_3" id="file-ip-3" accept="image/*" onchange="showPreview(event, 3);">
											            <input type="hidden" name="image_3">
											          </div>
											          <small class="small">Use the &#8634; icon to reset the image</small>
											        </div>
											      </div>
											      <!-- *********************************************************************************************************** -->
											        <div class="image-upload-four">
											          <div class="center">
											            <div class="form-input">
											              <label for="file-ip-4">
											                <img id="file-ip-4-preview" src="https://i.ibb.co/ZVFsg37/default.png">
											                <button type="button" class="imgRemove" onclick="myImgRemove(4)"></button>
											              </label>
											              <input type="file" name="image_4_" id="file-ip-4" data-input="image_4" accept="image/*" onchange="showPreview(event, 4);">
											              <input type="hidden" name="image_4">
											            </div>
											            <small class="small">Use the &#8634; icon to reset the image</small>
											          </div>
											        </div>
											        <!-- ************************************************************************************************************ -->
											        <div class="image-upload-five">
											          <div class="center">
											            <div class="form-input">
											              <label for="file-ip-5">
											                <img id="file-ip-5-preview" src="https://i.ibb.co/ZVFsg37/default.png">
											                <button type="button" class="imgRemove" onclick="myImgRemove(5)"></button>
											              </label>
											              <input type="file" name="image_5_" data-input="image_5" id="file-ip-5" accept="image/*" onchange="showPreview(event, 5);">
											              <input type="hidden" name="image_5">
											            </div>
											            <small class="small">Use the &#8634; icon to reset the image</small>
											          </div>
											        </div>
											  
											        <!-- ************************************************************************************************************ -->
											        <div class="image-upload-six">
											          <div class="center">
											            <div class="form-input">
											              <label for="file-ip-6">
											                <img id="file-ip-6-preview" src="https://i.ibb.co/ZVFsg37/default.png">
											                <button type="button" class="imgRemove" onclick="myImgRemove(6)"></button>
											              </label>
											              <input type="file" name="image_6_" data-input="image_6" id="file-ip-6" accept="image/*" onchange="showPreview(event, 6);">
											              <input type="hidden" name="image_6">
											            </div>
											            <small class="small">Use the &#8634; icon to reset the image</small>
											          </div>
											        </div>

											      <!-- ************************************************************************************************************** -->

											</div>

											<div class="upload-frame">
												<p id="uploadMsg"></p>
										      	<span>Upload</span>
										      	<p>Upto 6 images</p>
										      	<p>Maximum 5 MB</p>
										      	<p>Relevant Images which meet Community Guidelines Happy Reviewing!</p>
										    </div>
				  						</div>

				  						
				  					</div>
				  					<div class="column">
				  						<div class="r-3">
				  							<div class="rate-box">
				  								<img src="<?=IMG?>emoji-1.png" alt="image" class="left">
				  								<div class="radi-box">
				  									<input type="radio" id="Excellent" name="title" value="Excellent" />
													<label for="Excellent">Excellent</label>
				  								</div>
				  								<img src="<?=IMG?>emoji-4.png" alt="image" class="right">
				  							</div>
				  							<div class="rate-box">
				  								<img src="<?=IMG?>emoji-2.png" alt="image" class="left">
				  								<div class="radi-box">
				  									<input type="radio" id="Good" name="title" value="Good" />
													<label for="Good">Good</label>
				  								</div>
				  								<img src="<?=IMG?>emoji-4.png" alt="image" class="right">
				  							</div>
				  							<div class="rate-box">
				  								<img src="<?=IMG?>emoji-3.png" alt="image" class="left">
				  								<div class="radi-box">
				  									<input type="radio" id="Bad" name="title" value="Bad" />
													<label for="Bad">Bad</label>
				  								</div>
				  								<img src="<?=IMG?>emoji-4.png" alt="image" class="right">
				  							</div>
				  						</div>
				  						<textarea placeholder="How was your experience with the seller? Was the seller helpful or not? How satisfied were you with the product's packaging?" name="brand_review" style="font-size: 12px; padding: 10px;"></textarea>
				  						<div class="r-2">
				  							<span>Rate Your Rider</span>
				  							<div class="review-box">
												<div class="rating-holder">
													<fieldset class="rating">
													    <input type="radio" id="star5_2" name="rider_ratting" value="5" /><label class = "full" for="star5_2" title="Awesome - 5 stars"></label>
														<input type="radio" id="star4half_2" name="rider_ratting" value="4.5" /><label class="half" for="star4half_2" title="Pretty good - 4.5 stars"></label>
														<input type="radio" id="star4_2" name="rider_ratting" value="4" /><label class = "full" for="star4_2" title="Pretty good - 4 stars"></label>
														<input type="radio" id="star3half_2" name="rider_ratting" value="3.5" /><label class="half" for="star3half_2" title="Meh - 3.5 stars"></label>
														<input type="radio" id="star3_2" name="rider_ratting" value="3" /><label class = "full" for="star3_2" title="Meh - 3 stars"></label>
														<input type="radio" id="star2half_2" name="rider_ratting" value="2.5" /><label class="half" for="star2half_2" title="Kinda bad - 2.5 stars"></label>
														<input type="radio" id="star2_2" name="rider_ratting" value="2" /><label class = "full" for="star2_2" title="Kinda bad - 2 stars"></label>
														<input type="radio" id="star1half_2" name="rider_ratting" value="1.5" /><label class="half" for="star1half_2" title="Meh - 1.5 stars"></label>
														<input type="radio" id="star1_2" name="rider_ratting" value="1" /><label class = "full" for="star1_2" title="Sucks big time - 1 star"></label>
														<input type="radio" id="starhalf_2" name="rider_ratting" value="0.5" /><label class="half" for="starhalf_2" title="Sucks big time - 0.5 stars"></label>
													</fieldset>
												</div>
											</div>
				  						</div>
				  						<textarea placeholder="How was your overall experience with our rider?" name="rider_comment"></textarea>
				  						<div class="switch-slider">
				  							<em>Review as Faizan S.</em>
					  						<label class="switch">
												<input type="checkbox">
												<span class="slider round"></span>
											</label>
											<em>Anonymous</em>
										</div>
				  					</div>
				  					<button type="submit">Submit Review</button>
				  				</div>
				  			</div><!-- /payment-holder -->
			  			</form>
			  		</div>
			  	</div>
			  </div><!-- write review -->




		</div><!-- /tab-content -->
	</div>
</div>