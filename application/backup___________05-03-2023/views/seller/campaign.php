	<div class="tab-pane active" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
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
										<img src="<?=UPLOADS_PRO.$q['product_image']?>" alt="<?=$q['product_name']?>">
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
	</div><!-- /tab-pane -->