			<div class="tab-pane active" id="home1" role="tabpanel" aria-labelledby="home1-tab">
			  	<h1>Manage Product</h1>
			  	<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
			  		<p class="alert alert-danger"><?=$_GET['msg']?></p>
			  	<?php endif ?>
			  	<?php if (isset($_GET['error']) && $_GET['error'] == '0'): ?>
			  		<p class="alert alert-success"><?=$_GET['msg']?></p>
			  	<?php endif ?>
			  	<div class="btn-list">
			  		<!-- <button>Export</button> -->
			  		<button onclick="location.href = '<?=BASEURL?>seller/add-product';">Add Product</button>
			  		<button onclick="location.href = '<?=BASEURL?>seller/download-products-pricing';">Download Prices</button>
			  		<button class="open-product-pricing-upload-modal">Upload Prices</button>
			  		<button data-toggle="modal" href='#modal-bulk-product-uploads'>Upload Bulk Products</button>
			  		<button data-toggle="modal" href='#modal-bulk-images-uploads'>Upload Bulk Images</button>
			  	</div>
			  	<div class="product_list">
			  		<ul>
			  			<li>
			  				<span>All</span>
			  				<em class="all-count">(<?=count($products)?>)</em>
			  			</li>
			  			<li>
			  				<span>Live</span>
			  				<em class="live-count">(<?=$product_counts['live']['count']?>)</em>
			  			</li>
			  			<li>
			  				<span>Poor Quality</span>
			  				<em class="poor-count">(<?=$product_counts['poor']['count']?>)</em>
			  			</li>
			  			<li>
			  				<span>Sold Out</span>
			  				<em class="sold-count">(<?=$product_counts['sold']['count']?>)</em>
			  			</li>
			  			<li>
			  				<span>Inactive</span>
			  				<em class="inactive-count">(<?=$product_counts['inactive']['count']?>)</em>
			  			</li>
			  			<li>
			  				<span>Policy Voilation</span>
			  				<em class="policy-count">(<?=$product_counts['policy_voilation']['count']?>)</em>
			  			</li>
			  			<li style="border-right: none;">
			  				<span><strong>Sorted By Price Low To High</strong></span>
			  			</li>
			  		</ul>

		  			<?php if ($product_categories): ?>
			  			<div class="col-md-4">
			  				<div class="form-group">
			  						
			  					<select class="form-control get-category-products-seller-filter">
			  						<option value="0" selected="selected">All</option>
			  						<?php foreach ($product_categories as $key => $pCat): ?>
			  							<option value="<?=$pCat['id']?>"><?=$pCat['title']?></option>
			  						<?php endforeach ?>
			  					</select>

			  				</div>
			  			</div><!-- /4 -->
  					<?php endif ?>

		  			<!-- <div class="col-md-4">
		  				<div class="form-group">
		  					<button class="btn btn-primary get-all-products-seller-filter">All Products</button>
		  				</div>
		  			</div> --><!-- /4 -->


			  	</div>
			  	<div class="table-holder">
			  		<table id="tableData" class="product-table seller-product-table">
			  			<thead>
			  				<th>ID</th>
			  				<th>Name</th>
			  				<th>SKU</th>
			  				<th>Price</th>
			  				<th>Image</th>
			  				<th>Listing</th>
			  				<th>Status</th>
			  				<th>Action</th>
			  			</thead>
			  			<tbody>
			  				<?php foreach ($products as $key => $product): ?>
				  				<tr>
				  					<td><?=$product['product_id']?></td>
				  					<td><?=$product['product_name']?></td>
				  					<td><?=$product['sku']?></td>
				  					<td>
				  						<?php if ($product['sale_percentage'] > 0): ?>
				  							<?=$product['price']?>
				  						<?php else: ?>
				  							<?=$product['price']?>
				  						<?php endif ?>
				  					</td>
				  					<td>
				  						<?php if (strlen($product['product_image']) > 4): ?>
				  							<a href="<?=UPLOADS_PRO.$product['category_id'].'/'.$product['product_image']?>" target="_blank" style="font-size: 13px;">View Main Image</a><br>
				  							<a href="javascript://" class="get-images" data-id="<?=$product['product_id']?>" data-title="<?=$product['product_name']?>"  style="font-size: 11px;">More Images</a>
				  						<?php else: ?>
				  							<p>--- no image ---</p>
				  						<?php endif ?>
				  					</td>
				  					<td>
				  						<select name="seller_listing_id" class="seller-listing-change" data-id="<?=$product['product_id']?>">
				  							<option value="">Select Listing</option>
				  							<?php foreach ($listing as $key => $list): ?>
				  								<?php if ($product['seller_listing_id'] == $list['seller_listing_id']): ?>
				  									<option value="<?=$list['seller_listing_id']?>" selected="selected"><?=$list['title']?></option>
				  								<?php else: ?>
				  									<option value="<?=$list['seller_listing_id']?>"><?=$list['title']?></option>
				  								<?php endif ?>
				  							<?php endforeach ?>
				  							<option value="0">Remove From List</option>
				  						</select>
				  					</td>
				  					<td>
				  						<?php if ($product['in_stock'] == '1'): ?>
				  							<strong>Active</strong><br>
				  						<?php else: ?>
				  							<strong>Deactive</strong><br>
				  						<?php endif ?>
				  						<a href="<?=BASEURL.'product/'.$product['slug'].'-'.$product['product_id']?>" target="_blank">View Product</a>
				  						<?php
				  						/*if ($product['ratting'] > 0) {
				  							echo $product['ratting'].'<br>';
				  							echo 'based on <strong>'.$product['reviews'].'</strong> reviews';
				  						}*/
				  						?>
				  					</td>
				  					<td>
				  						<a href="<?=BASEURL.'seller/edit-product/'.$product['product_id']?>">Product Edit</a><br>
				  						<a href="javascript:del_q('<?=$product['product_id']?>')">Delete Product</a>
				  					</td>
				  				</tr>
			  				<?php endforeach ?>
			  			</tbody>
			  		</table>
			  	</div>
			  </div><!-- /tab-pane -->




<div class="modal fade" id="images-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Images</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'seller/upload-product-images'?>">
                	<input type="hidden" name="category_id">
                    <div class="form-group">
                        <label for="">Select Images (you can select multiple images)</label><br>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <input type="file" class="btn btn-info" name="post_photos[]" id="post_photo_form" multiple="multiple">
                        </span>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div><!-- /form-group -->
                </form>
                <table class="table table-bordered">
                    <thead>
                        <th>Imager</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">Nothing Found</td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><!-- /modal-footer -->
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- /images-modal -->

<div class="modal fade" id="modal-bulk-images-uploads">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Images</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'seller/upload-product-images-2'?>">
                    <div class="form-group">
                        <label for="">Select Images (you can select multiple images (upto 20 images at once))</label><br>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <input type="file" class="btn btn-info" name="post_photos[]" id="post_photo_form_2" multiple="multiple">
                        </span>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div><!-- /form-group -->
                </form>
            </div><!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><!-- /modal-footer -->
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- /modal-bulk-images-uploads -->




<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Wait a min. Are you really going to delete this product with id:"+id);
        if (cnfr) {
            document.location = "<?=BASEURL?>seller/delete-product/?id="+id;
        }
    }
</script>