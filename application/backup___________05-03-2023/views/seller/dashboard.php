			<div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
			  	<div class="dash-holder">
			  		<div class="d-top">
			  			<span class="left">Welcome ! <?=$brand['title']?></span>
			  			<?php if ($product_check): ?>
			  				<span class="right">100% completed, keep up the good work :)</span>
			  			<?php else: ?>
			  				<span class="right">80% completed, keep up going on and work good!</span>
			  			<?php endif ?>
			  		</div>
			  		<div class="d-columns">
			  			<a href="#" class="column active">
			  				<span class="icon">
			  					<i class="fa fa-map-marker" aria-hidden="true"></i>
			  					<strong>Manage Address Book</strong>
			  				</span>
			  				<em>Start to sell</em>
			  			</a>
			  			<a href="#" class="column active">
			  				<span class="icon">
			  					<i class="fa fa-shield" aria-hidden="true"></i>
			  					<strong>Verify Corporate File</strong>
			  				</span>
			  				<em>Safegurad your account</em>
			  			</a>
			  			<a href="#" class="column active">
			  				<span class="icon">
			  					<i class="fa fa-university" aria-hidden="true"></i>
			  					<strong>Fill in Bank Information</strong>
			  				</span>
			  				<em>To receive your money</em>
			  			</a>
			  			<a href="#" class="column active">
			  				<span class="icon">
			  					<i class="fa fa-paperclip" aria-hidden="true"></i>
			  					<strong>Order Package Info</strong>
			  				</span>
			  				<em>Order Package Info Title</em>
			  			</a>
			  			<?php if ($product_check): ?>
			  				<a href="#" class="column active">
			  			<?php else: ?>
			  				<a href="#" class="column">
			  			<?php endif ?>
			  				<span class="icon">
			  					<i class="fa fa-file-text-o" aria-hidden="true"></i>
			  					<strong>Upload Your Products</strong>
			  				</span>
			  				<em>Get your products ready</em>
			  			</a>
			  		</div>
			  		<div class="left-holder">
				  		<div class="comp-holder">
					  		<div class="compaign-event">
					  			<h1>Campaign event</h1>
					  			<div class="slick-carousel seller-page-deal-main-block">

					  				<!-- deal portion -->
									<?php if ($deals): ?>
										<?php foreach ($deals['products'] as $key => $q): ?>
											<div>
												<div class="slide-content">
													<div class="timer">
														<span>left</span>
														<ul class="time-list time-list-deals-<?=$q['product_id']?>">
															<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
															<li class="timer-days">90d</li>
															:
															<li class="timer-hours">90h</li>
															:
															<li class="timer-mints">05m</li>
															:
															<li class="timer-seconds">54s</li>
														</ul>
													</div>
													<img src="<?=UPLOADS_PRO.$q['category_id'].'/'.$q['product_image']?>" alt="<?=$q['product_name']?>">
													<span class="title"><?=$q['product_name']?></span>
													<span class="date"><?=date('d D-M-Y',strtotime($deals['deal']['start']))?> - <?=date('d D-M-Y',strtotime($deals['deal']['end']))?></span>
													<div class="bottom-box">
														<!-- <div class="left">
															<em>Seller:502</em>
															<em>Seller:502</em>
														</div> -->
														<!-- <div class="right">
															<a href="#">join</a>
														</div> -->
													</div>
												</div>
											</div>
										<?php endforeach ?>
									<?php endif ?>
									
								</div><!-- /slick-carousel -->
					  		</div>
					  	</div><!-- /comp-holder -->
					  	<div class="operation-holder">
					  		<h2>Setting</h2>
					  		<div class="operation-columns">
					  			<div class="column">
					  				<strong>products</strong>
					  				<ul class="operation-list">
					  					<li><a href="<?=BASEURL?>seller/categories">Categories</a></li>
					  					<li><a href="<?=BASEURL?>seller/products">All Products</a></li>
					  					<li><a href="<?=BASEURL?>seller/add-product">Add Product</a></li>
					  				</ul>
					  			</div>
					  			<div class="column">
					  				<strong>Account</strong>
					  				<ul class="operation-list">
					  					<li><a href="<?=BASEURL?>seller/account-setting">Change Profile Picture</a></li>
					  					<li><a href="<?=BASEURL?>seller/account-setting">Change Password</a></li>
					  					<li><a href="<?=BASEURL?>logout">Logout</a></li>
					  				</ul>
					  			</div>
					  			<div class="column">
					  				<strong>profile<!-- <sub>new</sub> --></strong>
					  				<ul class="operation-list">
					  					<li><a href="<?=BASEURL?>seller/profile">Seller Account</a></li>
					  					<li><a href="<?=BASEURL?>seller/profile">Business information</a></li>
					  					<li><a href="<?=BASEURL?>seller/profile">Bank Detail</a></li>
					  				</ul>
					  			</div>
					  		</div>
					  	</div><!-- /operation-holder -->
			  		</div><!-- /left-holder -->

			  		<div class="right-box">
						<strong>Short Summary</strong>
						<ul class="box-list">
		  					<li>
		  						<span class="top-text">Balance</span>
		  						<span class="bottom-text">RKR <?=number_format(intval($user['balance']))?></span>
		  					</li>
		  					<li>
		  						<span class="top-text">Deduction</span>
		  						<span class="bottom-text"><?=$user['profit_percentage'].'%'?></span>
		  					</li>
		  					<li>
		  						<span class="top-text">Total Item Sold</span>
		  						<span class="bottom-text"><?=number_format(intval($total_sale['items']))?></span>
		  					</li>
		  					<li>
		  						<span class="top-text">Total Sales</span>
		  						<span class="bottom-text">RKR <?=number_format(intval($total_sale['total']))?></span>
		  					</li>
		  				</ul>
						<ul class="box-list">
			  				<!-- <li>
		  						<span class="top-text">Quote Usage</span>
		  						<span class="bottom-text"><?=$product_counts['live']['count']?> / <span style="font-size: 20px;">&infin;</span></span>
		  					</li> -->
		  					<li>
		  						<span class="top-text">Page View</span>
		  						<span class="bottom-text"><?=$brand['brand_visit']?></span>
		  					</li>
		  					<li>
		  						<span class="top-text">Click Page View</span>
		  						<span class="bottom-text"><?=$brand['product_visit']?></span>
		  					</li>
		  				</ul>
				  	</div><!-- /right-box -->

			  	</div><!-- /dash-holder -->
			  </div><!-- /tab-pane -->