<div class="tab-pane fade show active" id="Products" role="tabpanel" aria-labelledby="Product-tab">
  	<div class="user-panel-holder">
  		<div class="top-heading">
  			<h1>Create Volume</h1>
  		</div><!-- /top-heading -->
  		<div class="profile_holder volume-box">
  			<div class="volume-holder">
  				<label><img src="<?=IMG?>img180.png" alt="image">Volume Name</label>
  				<form id="<?=$form_id?>">
  					<?php if ($mode == 'edit'): ?>
  						<input type="hidden" name="id" value="<?=$q['seller_listing_id']?>">
  					<?php endif ?>
	  				<input type="text" name="title" placeholder="Type Volume Name" value="<?=$q['title']?>" required="required">
	  				<input type="submit" class="submit" value="Add Volume">
  				</form>
  			</div><!-- /volume-holder -->
  		</div><!-- /volume-box -->
  	</div><!-- /user-panel-holder -->
</div><!-- tab-pane -->