			<div class="tab-pane active" id="voucher-campaign" role="tabpanel" aria-labelledby="home1-tab">
			  	<div class="pay-box">
					<h1>Categories</h1>	
				</div>		  		
			  			
						<div class="v-box wear-box">

					  		<div class="wear-head">
					  			<strong><?=$cat['title']?> <em style="font-style: normal; font-size: 12px; font-weight: normal;">(<?=$cat['Items']?>)</em></strong>
					  		</div>
						  	<div class="cate_holder">
					  			<?php foreach ($products as $key => $q): ?>
						  			<div class="cate_list">
						  				<div class="cate_box">
							  				<div class="img-holder">
							  					<img src="<?=UPLOADS_PRO.$q['product_image']?>" alt="<?=$q['product_name']?>">
							  				</div>
							  				<div class="text_holder">
								  				<h3><?=$q['product_name']?></h3>
								  				<div class="price-holder">
								  					<?php if ($q['sale_percentage'] > 0): ?>
														<span>Rs. <?=$q['price']?></span>
														<sup>Rs. <?=$q['price']+$q['discount']?></sup>
													<?php else: ?>
														<span>Rs. <?=$q['price']?></span>
													<?php endif ?>
								  				</div>
								  			</div>
							  			</div>
						  			</div>
					  			<?php endforeach ?>
					  		</div><!-- /cate_holder -->

						</div><!-- /v-box -->


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