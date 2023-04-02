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

	<section class="blog-holder">
		<div class="container">
			<img src="<?=UPLOADS_CAT.$blog['image']?>" alt="image">
			<em><?=$blog['title']?><br><?=$blog['short']?></em>
			<?=$blog['detail']?>
			<span>
				Published <?=date('d M, Y',strtotime($q['at']))?> by <a href="javascript://">Easy Door</a><!--  <br>Modified 30th October 2019 -->
			</span>
		</div>
	</section>

	<section class="sale-banner">
		<div class="container">
			<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
				<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
			<?php endif ?>
		</div>
	</section>