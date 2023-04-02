			<div class="tab-pane active" id="Products" role="tabpanel" aria-labelledby="Product-tab">
			  	<ul class="breadcrumbs">
			  		<li><a href="<?=BASEURL.'seller/dashboard'?>">home</a></li>
			  		<li><a href="<?=BASEURL.'seller/products'?>">products</a></li>
			  		<li>Add Product</li>
			  		<li><a data-toggle="modal" href='#modal-bulk-product-uploads'>Bulk Upload</a></li>
			  	</ul>
			  	<h1>basic information</h1>
			  	<form class="info-form" action="<?=BASEURL.'seller/post-product'?>" enctype="multipart/form-data" method="post">
			  		<input type="hidden" name="brand_id" value="<?=$brand['brand_id']?>">
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>product name<em>*</em></label>
			  				<input type="text" name="product_name" required="required">
			  				<!-- <a href="#" class="bottom-info">Add Multi-Languages</a> -->
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>category<em>*</em></label>
			  				<select class="product-add-cat-select parent-category category-select-tag" data-id="category-1" required="required">
			  					<option value="">Select Category</option>
                                    <?php foreach ($parents as $key => $parent): ?>
                                        <?php
                                        $filters = explode(',', $parent['filters']);
                                        if (in_array('size', $filters)) {
                                            $SizesFilter = 'true';
                                        }
                                        else{
                                            $SizesFilter = 'false';
                                        }
                                        if (in_array('color', $filters)) {
                                            $ColorsFilter = 'true';
                                        }
                                        else{
                                            $ColorsFilter = 'false';
                                        }
                                        ?>
                                        <option value="<?=$parent['id']?>"><?=$parent['title']?></option>
                                    <?php endforeach ?>
			  				</select>
			  				<!-- <a href="#" class="bottom-info">Recenty Used</a> -->
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="info-row child-cats">

			  		</div><!-- /info-row/child-cats -->

			  		<div class="info-row des-holder">
			  			<div class="l-info">
				  			<h1>detailed description</h1>
								<textarea name="editor1" class="ckeditor"></textarea>
			  			</div><!-- /l-info -->
			  			<div class="l-info radio_block">
							<label>Mian Image<em>*</em></label>
			  				<input type="file" name="prod_img">
			  				<hr>
			  				<div class="new-holder">
								<label>Status<em>*</em></label>
				  				<div class="radio-box">
				  					<input type="radio" id="in_stock" name="in_stock" value="1" checked>
	    							<label for="in_stock">In Stock</label>
				  				</div>
				  				<div class="radio-box">
				  					<input type="radio" id="in_stock1" name="in_stock" value="0">
	    							<label for="in_stock1">Deactive</label>
				  				</div>
			  				
								<label>New Product<em>*</em></label>
				  				<div class="radio-box">
				  					<input type="radio" id="new" name="new" value="yes">
	    							<label for="new">Yes</label>
				  				</div>
				  				<div class="radio-box">
				  					<input type="radio" id="new1" name="new" value="no" checked="checked">
	    							<label for="new1">No</label>
				  				</div>
			  				
								<label>Featured Product<em>*</em></label>
				  				<div class="radio-box">
				  					<input type="radio" id="new2" name="featured" value="yes">
	    							<label for="new2">Yes</label>
				  				</div>
				  				<div class="radio-box">
				  					<input type="radio" id="new3" name="featured" value="no" checked="checked">
	    							<label for="new3">No</label>
				  				</div>
				  			</div><!-- /new-holder -->
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<hr>
			  		<div class="info-row three-row">
				  		<div class="l-info">
			  				<label>MRP</label>
			  				<input type="text" name="mrp">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>price<em>*</em></label>
			  				<input type="text" class="product-price" name="price" required="required">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Sale Percentage</label>
			  				<input type="text" class="product-price-sale" name="sale_percentage" value="0">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row three-row">
			  			<div class="l-info">
			  				<label>Discount</label>
			  				<input type="text" class="product-price-diff" name="discount" required="required">
			  			</div><!-- /l-info -->
				  		<div class="l-info">
			  				<label>Price TAX (%)</label>
			  				<input type="text" name="tax">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Warranty</label>
			  				<select name="warranty">
                                <option value="yes" selected="selected">Yes</option>
                                <option value="no">no</option>
                            </select>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->


			  		<div class="info-row three-row">
				  		<div class="l-info">
			  				<label>Unit</label>
			  				<input type="text" name="unit">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Unite Value</label>
			  				<input type="text" name="unit_value">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Which Filter Price To Show *</label>
			  				<select name="filter_price_show" required="required">
                                <option value="size">SIZE</option>
                                <option value="color">COLOR</option>
                                <option value="none" selected="selected">NONE</option>
                            </select>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->



			  		<div class="info-row size-block size-block-sizes" style="display: none;">
		  				<h1>Size</h1>
			  			<?php foreach ($sizes as $key => $size): ?>
				  			<div class="l-info size-info">
                                <div class="form-group">
                                	<div class="size_holder">
	                                	<span class="dummy">Size</span>
	                                	<div class="dummy-holder">
	                                		<div class="check-size">
			                                	<input class="styled-checkbox" id="styled-checkbox-<?=$size['size_id']?>" type="checkbox" value="<?=$size['size_id']?>" name="size[]">
												<label for="styled-checkbox-<?=$size['size_id']?>"><?=$size['name']?></label>
											</div>
											<div class="price_frame">
												<span>Price</span>
												<input type="text" data-name="size_price<?=$size['size_id']?>" class="size-price size-filter-price" value="0"> &nbsp;&nbsp;
											</div>
		                                </div>
		                            </div>
                                </div>
			  				</div><!-- /l-info -->
				  			<div class="l-info price-info" style="display: none;"> <!-- none -->
				  				<label>Price</label>
	                            <input type="text" data-name="size_price<?=$size['size_id']?>" class="size-price size-filter-price" value="0"> &nbsp;&nbsp;
				  			</div><!-- /l-info -->
                        <?php endforeach ?>
			  		</div><!-- /info-row -->

			  		<div class="info-row size-block" style="display: none;">
			  			<div class="info-row size-block note-block" style="display: none;">
			  				<div class="l-info">
					  			<label>Size Note Title</label>
					  			<input type="text" name="size_note_title">
			  				</div><!-- /l-info -->
			  				<div class="l-info">
					  			<label>Size Note</label>
					  			<input type="text" name="size_note">
			  				</div><!-- /l-info -->
				  		</div><!-- /info-row -->
			  		</div><!-- /info-row -->

			  		<div class="info-row color-block" style="display: none;">
				  		<div class="info-row color-block" style="display: none;overflow-y: auto;max-height: 750px;">
				  			<h1>Color</h1>
				  			<div class="color-block color-block-colors">
				  				<div class="color-column"></div>
				  				<?php foreach ($colors as $key => $color): ?>
					  				<div class="l-info">
		                                <div class="form-group label-floating is-empty">
		                                	<div class="color-check-box">
			                                	<input class="styled-checkbox" id="color-styled-checkbox-<?=$color['color_id']?>" type="checkbox" value="<?=$color['color_id']?>" name="color[]">
												<label for="color-styled-checkbox-<?=$color['color_id']?>"><?=$color['name']?></label>
			                                </div>
		                                </div>
					  				</div><!-- /l-info -->
				  					<?php $ColorImages = explode(',', $product->color_images); ?>
				  					<div class="l-info">
			  							<label>Price</label>
		                        		<input type="text" data-name="color_price<?=$color['color_id']?>" class="form-control color-price color-filter-price" value="0"> &nbsp;&nbsp;
			  						</div><!-- /l-info -->
			  						<div class="l-info info-color-box">
			  							<label  style="background:<?=$color['name']?>;color: <?=$color['font_color']?>;"><?=$color['name']?> Image
	    									<input type="file" name="color_file<?=$color['color_id']?>">
	    								</label> 
			  						</div><!-- /l-info-->
	                       		<?php endforeach ?>
			  				</div><!-- /color-block -->
			  			</div><!-- /info-row/color-block -->
			  		</div><!-- /info-row -->

			  		<div class="info-row color-block note-block" style="display: none;">
		  				<div class="l-info">
				  			<label>Color Note Title</label>
				  			<input type="text" name="color_note_title">
		  				</div><!-- /l-info -->
		  				<div class="l-info">
				  			<label>Color Note</label>
				  			<input type="text" name="color_note">
		  				</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="info-row price-to-show">
			  			
			  		</div><!-- /info-row -->

	                <div class="info-row dynamic-filters color-family">
			  			
			  		</div><!-- /info-row/dynamic-filters -->

			  		<?php if (1==2): ?>
				  		<div class="info-row reward-holder">
					  		<div class="l-info" style="display: none">
				  				<label>Rewards</label>
				  				<input type="text" name="rewards">
				  			</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>SKU</label>
				  				<input type="text" name="sku">
				  			</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>Meta Title *</label>
				  				<input type="text" name="meta_title" required="required">
				  			</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>Meta Key Words *</label>
				  				<input type="text" name="meta_key" required="required">
				  			</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>Meta Description *</label>
				  				<input type="text" name="meta_desc" required="required">
				  			</div><!-- /l-info -->
				  		</div><!-- /info-row -->
			  		<?php endif ?>

			  		<div class="info-row cat-tags-area"></div>

			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>Select Images (you can select multiple images)</label>
			  				<input type="file" class="btn btn-info" name="post_photos[]" id="post_photo_form" multiple="multiple">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="btn btn-success">
						<button type="submit">submit</button>
					</div>

			  	</form>
			  	<?php if (1==2): ?>
			  	<h1 style="margin: 0;">Product Attributes</h1>
			  	<p style="color: #afafaf; font-size: 13px; margin: 0 0 20px;">
			  		Boost your item's searchability by filling-up the Key Product Information marked with KEY. <br> The more you fill-up, the easier for buyers to find your product.
			  	</p>
			  	<form class="attr-form info-form">
			  		<div class="info-row">
			  			<div class="column">
			  				<label>brand <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>protection <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>body type <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>E-Warranty <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Model Year <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Notchted Display <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Fast Charging <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Headphone Jack <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Wireless Charging <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Number of Cameras <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Battery capacity <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Phone Features <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>PPI</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Screen Size (inches) </label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>sim type</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Camera Front (Megapixels</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>RAM Memory</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Camera Back (Megapixels)</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Number of Cores</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Video Resolution</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Type of Battery</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="pass-btn">
						<button>submit</button>
					</div>
					<h1>detailed description</h1>
					<div class="editor">
						<div class="cs-holder">
							<h1>heilights</h1>
							<div class="right-holder">
								<div class="btn-holder">
									<select>
										<option>Pakistan</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
						</div>
							<textarea name="editor1" class="ckeditor"></textarea>
					</div>
					<div class="editor">
						<div class="cs-holder">
							<h1>roduct description</h1>
							<div class="right-holder">
								<div class="btn-holder">
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
						</div>
							<textarea name="editor2" class="ckeditor"></textarea>
					</div>

					<div class="editor">
						<div class="cs-holder">
							<h1>english description</h1>
							<div class="right-holder">
								<div class="btn-holder">
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
						</div>
							<textarea name="editor3" class="ckeditor"></textarea>
					</div>
					<div class="editor">
						<div class="cs-holder">
							<h1>What's in the box</h1>
							<input type="text" name="">
						</div>
					</div>
			  	</form>
			  	<h1>Price & Stock</h1>
			  	<form class="info-form" action="#">
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>product name<em>*</em></label>
			  				<input type="text">
			  				<a href="#" class="bottom-info">Add Multi-Languages</a>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>Storage Capacity <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Category</option>
			  					<option>Category</option>
			  					<option>Category</option>
			  				</select>
			  				<a href="#" class="bottom-info" style="float: left; margin: 20px 0 0;">+ Add a new SKU</a>
			  			</div>
			  			<div class="l-info">
			  				<label>Color family <em>*</em></label>
			  				<input type="text">
			  			</div>
			  		</div>
			  		<div class="upload-box">
			  			<div class="upload-column">
			  				<input type="file" id="upload" hidden/>
							<label for="upload"><i class="fa fa-paperclip" aria-hidden="true"></i> Copy the first to the rest</label>
			  			</div>
			  			<div class="upload-column">
			  				<input type="file" id="upload" hidden/>
							<label for="upload"><i class="fa fa-paperclip" aria-hidden="true"></i>Copy the first stock to the rest only</label>
			  			</div>
			  			<div class="upload-column">
			  				<input type="file" id="upload" hidden/>
							<label for="upload"><i class="fa fa-paperclip" aria-hidden="true"></i>Copy the first price to the rest only</label>
			  			</div>
			  		</div>
			  			<ul class="stock-list">
			  				<li>
			  					<span class="top">Availability</span>
			  					<span class="bottom">
			  						<div>
									  <label class="switch-primary">
									    <input type="checkbox" class="switch switch-bootstrap status" name="status" id="" value="1">
									    <span class="switch-body"></span>
									  </label>
									</div>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">Storage Capacity</span>
			  					<span class="bottom">
			  						<select>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  						</select>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">Color Family</span>
			  					<span class="bottom">
			  						<select>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  						</select>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">price</span>
			  					<span class="bottom">
			  						<input type="text">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">Special Price</span>
			  					<span class="bottom">
			  						<a href="#" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">quantity</span>
			  					<span class="bottom">
			  						<input type="text">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">seller SKU</span>
			  					<span class="bottom">
			  						<input type="text" placeholder="Optional">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">shop SKU</span>
			  					<span class="bottom"></span>
			  				</li>
			  				<li>
			  					<span class="top">Free items</span>
			  					<span class="bottom">
			  						<input type="text">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">action</span>
			  					<span class="bottom"><i class="fa fa-trash" aria-hidden="true"></i></span>
			  				</li>
			  			</ul>
			  			<div class="service-box">
				  			<h1>Service &amp; delivery</h1>
				  			<h2>service</h2>
				  			<div class="info-row">
				  				<div class="l-info">
				  					<label>warrenty type <em>*</em></label>
				  					<select>
				  						<option>Select</option>
				  						<option>Select</option>
				  						<option>Select</option>
				  					</select>
				  				</div>
				  				<div class="l-info">
				  					<label>warrenty periode <em>*</em></label>
				  					<input type="text">
				  				</div>
				  			</div>
				  			<h2>delivery</h2>
				  			<div class="delivery-row">
			  					<label>Package Weight (kg)</label>
			  					<input type="text" name="">
				  			</div>
				  			<div class="delivery-row">
			  					<label>Package Dimensions (cm)</label>
			  					<input type="text" name="">
			  					<input type="text" name="">
			  					<input type="text" name="">
				  			</div>
				  			<div class="delivery-row">
				  				<label>Dangerous Goods</label>
				  				<ul class="unstyled centered">
								<li>
									<input class="styled-checkbox" id="styled-checkbox-01" type="checkbox" value="value1">
									<label for="styled-checkbox-01">Battery</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-02" type="checkbox" value="value2">
									<label for="styled-checkbox-02">Flameable</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-03" type="checkbox" value="value3">
									<label for="styled-checkbox-03">Liquide</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-04" type="checkbox" value="value4">
									<label for="styled-checkbox-04">None</label>
								</li>
							</ul>
			  			</div>
			  		</div>
			  	</form>
			  	<div class="product-btn">
			  		<a href="#" class="submit">Submit</a>
			  		<a href="#" class="save">Save as draft</a>
			  	</div>
			  	<?php endif ?>
			  </div><!-- /tab-pane -->