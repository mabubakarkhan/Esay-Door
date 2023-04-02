<section class="main-banner">
	<img src="<?=IMG?>img82.jpg" alt="image">
	<div class="container">
		<div class="caption-box">
			<div class="cap-holder">
				<span>easy shopping</span>
				<h2>FAQs</h2>
			</div>
		</div>
	</div>
</section>
	<?php if ($faqs): ?>
		<section class="faq-section">
			<div class="container">
				<div class="faq-heading">
					<h1>Frequently Asked Questions</h1>
					<p>
						Confused, annoyed, or desperate to leave a review? <br>Find the answers to the most frequently asked questions below.
					</p>
				</div>
				<div class="accordion" id="accordionExample">

					<?php foreach ($faqs as $key => $q): ?>
						<?php
						if ($key == 0) {
							$class = 'show';
							$class2 = '';
							$expanded = 'true';
						}
						else{
							$class = '';
							$class2 = 'collapsed';
							$expanded = 'false';
						}
						?>
						<div class="card">
						    <div class="card-head" id="heading<?=$key?>">
						      <h2 class="mb-0 <?=$class2?>" data-toggle="collapse" data-target="#collapse<?=$key?>" aria-expanded="<?=$expanded?>" aria-controls="collapse<?=$key?>">
						          <img src="<?=IMG?>img83.png" alt="image">
						          <?=$q['title']?>
						      </h2>
						    </div>

						    <div id="collapse<?=$key?>" class="collapse <?=$class?>" aria-labelledby="heading<?=$key?>" data-parent="#accordionExample">
						      <div class="card-body">
						        <?=$q['detail']?>
						      </div>
						    </div>
						</div><!-- /card -->
					<?php endforeach ?>

				</div><!-- /accordion -->
			</div><!-- /container -->
		</section><!-- /faq-section -->
	<?php endif ?>

	<section class="sale-banner">
		<div class="container">
			<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
				<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
			<?php endif ?>
		</div>
	</section>