	<section class="main-banner">
		<img src="<?=IMG?>img82.jpg" alt="image">
		<div class="container">
			<div class="caption-box">
				<div class="cap-holder">
					<span>easy shopping</span>
					<h2>At home</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="blog-listing">
		<div class="container">
			<h2>
				Software development news from our <br>team of software developers
			</h2>
			<div class="blog-columns">
			<?php foreach ($blog as $key => $q): ?>
				<div class="column">
					<img src="<?=UPLOADS_CAT.$q['image']?>" alt="image">
					<div class="blog-text">
						<strong><?=$q['title']?></strong>
						<p><?=$q['short']?></p>
						<div class="date">
							<em>EasyDoor</em>
							<span><?=date('d M, Y',strtotime($q['at']))?></span>
						</div>
						<a class="read-more" href="<?=BASEURL.'blog/'.$q['slug']?>">read more</a>
					</div><!-- /blog-text -->
				</div><!-- /column -->
			<?php endforeach ?>
			</div><!-- /blog-columns -->

			<?php if (1==2): ?>
				<div class="pagination">
					<ul>
						<li>
							<a href="#"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>previous</a>
						</li>
						<li>
							<a href="#">1</a>
						</li>
						<li>
							<a href="#">2</a>
						</li>
						<li>
							<a href="#">3</a>
						</li>
						<li>
							<a class="dot" href="#" style="pointer-events: none;">...</a>
						</li>
						<li>
							<a href="#">6</a>
						</li>
						<li>
							<a href="#">Next<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
						</li>
					</ul>
				</div><!-- /pagination -->
			<?php endif ?>
		</div><!-- /container -->
	</section><!-- /blog-listing -->

	<section class="sale-banner">
		<div class="container">
			<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
				<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
			<?php endif ?>
		</div>
	</section>