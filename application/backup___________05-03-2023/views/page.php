<section class="main-banner">
	<img src="<?=IMG?>img82.jpg" alt="image">
	<div class="container">
		<div class="caption-box">
			<div class="cap-holder">
				<span>easy shopping</span>
				<h2><?=$page['pg_title']?></h2>
			</div>
		</div>
	</div>
</section>

<section class="who-we-section">
	<div class="container">
		<div class="two-columns">
			<div class="column">
				<?=$page['pg_descri']?>
			</div>
			<?php if (strlen($page['video_code']) > 0): ?>
				<div class="column">
					<iframe width="" height="" src="https://www.youtube.com/embed/<?=$page['video_code']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			<?php endif ?>
		</div>
	</div>
</section>

		