



		<div class="brand-holder category-section">
			<div class="container">
				<div class="brand-list">
					<div class="category-box new-cat">
						<h3><?=$cat['title']?></h3>
						<em class="c-show"><?=count($child_cats)?> Categories found in <?=$cat['title']?></em>
					</div>
					<?php if (strlen($cat['description']) > 10): ?>
						<section class="bran-text-holder">
							<div class="container">
								<h3>Description</h3>
								<p>
									<?=$cat['description']?>
								</p>
							</div>
						</section>
					<?php endif ?>
					<div class="brands-column">

						<?php if ($child_cats): ?>
							<?php foreach ($child_cats as $key => $q): ?>
								<a href="<?=BASEURL.'listing/'.$q['slug'].'/'?>" class="column new-1">
									<img src="<?=UPLOADS_CAT.$q['image']?>" alt="image">
									<span class="brand-name">
										<div class="easy-logo"><img src="<?=IMG?>IMG171.png" alt="image"></div>
										<?=$q['title']?>
									</span>
								</a>
							<?php endforeach ?>
						<?php else: ?>
							<p class="alert alert-warning">Nothing Found</p>
						<?php endif ?>


					</div>
				</div>
			</div>
		</div>