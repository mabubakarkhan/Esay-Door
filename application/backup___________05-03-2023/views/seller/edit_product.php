
			  <div class="tab-pane active" id="Products" role="tabpanel" aria-labelledby="Product-tab">
			  	<ul class="breadcrumbs">
			  		<li><a href="<?=BASEURL.'seller/dashboard'?>">home</a></li>
			  		<li><a href="<?=BASEURL.'seller/products'?>">products</a></li>
			  		<li>Edit Product</li>
			  		<!-- <li><a data-toggle="modal" href='#modal-bulk-product-uploads'>Bulk Upload</a></li> -->
			  	</ul>
			  	<h1>basic information</h1>
			  	<form class="info-form" action="<?=BASEURL.'seller/update-product'?>" enctype="multipart/form-data" method="post">
			  		<input type="hidden" name="product_id" value="<?=$q['product_id']?>">
			  		<input type="hidden" name="brand_id" value="<?=$brand['brand_id']?>">
			  		<?php
                    $filters = explode(',', $cat['filters']);
                    if (in_array('size', $filters)) {
                        $SizesCheck = true;
                        $SizesDisplay = 'flex';
                    }
                    else{
                        $SizesCheck = false;
                        $SizesDisplay = 'none';
                    }
                    if (in_array('color', $filters)) {
                        $ColorsCheck = true;
                        $ColorsDisplay = 'flex';
                    }
                    else{
                        $ColorsCheck = false;
                        $ColorsDisplay = 'none';
                    }
                    ?>
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>product name<em>*</em></label>
			  				<input type="text" name="product_name" value="<?=$q['product_name']?>" required="required">
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
                                        <?php if ($parent['id'] == $parent['id']): ?>
                                        	<option value="<?=$parent['id']?>" selected="selected"><?=$parent['title']?></option>
                                        <?php else: ?>
                                        	<option value="<?=$parent['id']?>"><?=$parent['title']?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
			  				</select>
			  				<a href="#" class="bottom-info">Recenty Used</a>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="info-row child-cats">
			  			<?php if ($Cat1): ?>
		  					<?php
		  					$html = '<div class="l-info">';
			                    $html .= '<label>Select Category<em>*</em></label>';
			                    $html .= '<select class="text-input category-select-tag category-select-tag-dynamic" id="'.$_POST['blockID'].'" data-id="'.$next.'" required="required">';
			                        $html .= '<option value="">Select Catgory</option>';
			                        foreach ($Cat1s as $key => $Q) {
			                            $filters = explode(',', $Q['filters']);
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
			                            if ($Q['id'] == $Cat1['id']) {
			                            	$html .= '<option value="'.$Q['id'].'" data-size="'.$SizesFilter.'" data-color="'.$ColorsFilter.'" data-filter-ids="'.$Q['filter_ids'].'" selected="selected">'.$Q['title'].'</option>';
			                            }
			                            else{
			                            	$html .= '<option value="'.$Q['id'].'" data-size="'.$SizesFilter.'" data-color="'.$ColorsFilter.'" data-filter-ids="'.$Q['filter_ids'].'">'.$Q['title'].'</option>';
			                            }
			                        }
			                    $html .= '</select>';
			                $html .= '</div>';
			                echo $html;
		  					?>
		  				<?php endif ?>
		  				<?php if ($Cats): ?>
		  					<?php
		  					$html2 = '<div class="l-info">';
			                    $html2 .= '<label>Select Category<em>*</em></label>';
			                    $html2 .= '<select class="text-input category-select-tag category-select-tag-dynamic" name="category_id" id="'.$_POST['blockID'].'" data-id="'.$next.'" required="required">';
			                        $html2 .= '<option value="">Select Catgory</option>';
			                        foreach ($Cats as $key => $Q) {
			                            $filters = explode(',', $Q['filters']);
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
			                            if ($Q['id'] == $cat['id']) {
			                            	$html2 .= '<option value="'.$Q['id'].'" data-size="'.$SizesFilter.'" data-color="'.$ColorsFilter.'" data-filter-ids="'.$Q['filter_ids'].'" selected="selected">'.$Q['title'].'</option>';
			                            }
			                            else{
			                            	$html2 .= '<option value="'.$Q['id'].'" data-size="'.$SizesFilter.'" data-color="'.$ColorsFilter.'" data-filter-ids="'.$Q['filter_ids'].'">'.$Q['title'].'</option>';
			                            }
			                        }
			                    $html2 .= '</select>';
			                $html2 .= '</div>';
			                echo $html2;
		  					?>
		  				<?php endif ?>
			  		</div><!-- /info-row/child-cats -->

			  		<div class="info-row">
			  			<div class="l-info">
				  			<h1>detailed description</h1>
								<textarea name="editor1" class="ckeditor"><?=$q['product_description']?></textarea>
			  			</div><!-- /l-info -->
			  			<div class="l-info radio_block">
							<label>Mian Image<em>*</em></label>
			  				<input type="file" name="prod_img"> <a href="<?=UPLOADS_PRO.$q['product_image']?>" target="_blank"><img src="<?=UPLOADS_PRO.$q['product_image']?>" width="100"></a>
			  				<hr>
			  				<div class="new-holder">
								<label>Status<em>*</em></label>
				  				<div class="radio-box">
				  					<?php if ($q['in_stock'] == '1'): ?>
				  						<input type="radio" id="in_stock" name="in_stock" value="1"  checked="checked"/>
				  					<?php else: ?>
				  						<input type="radio" id="in_stock" name="in_stock" value="1"/>
				  					<?php endif ?>
				  					<label for="in_stock">In Stock</label>
				  				</div>
				  				<div class="radio-box">
				  					<?php if ($q['in_stock'] == '0'): ?>
				  						<input type="radio" name="in_stock" id="in_stock1"  value="0" checked="checked" />
				  					<?php else: ?>
				  						<input type="radio" name="in_stock" id="in_stock1"  value="0"  />
				  					<?php endif ?>
				  					<label for="in_stock1">Deactive</label>
				  				</div>
								<label>New Product<em>*</em></label>
				  				<div class="radio-box">
				  					<?php if ($q['new'] == 'yes'): ?>
				  						<input type="radio" name="new" id="new" value="yes" checked="checked" />
				  					<?php else: ?>
				  						<input type="radio" name="new" id="new" value="yes"  />
				  					<?php endif ?>
				  					<label for="new">Yes</label>
				  				</div>
				  				<div class="radio-box">
				  					<?php if ($q['new'] == 'no'): ?>
				  						<input type="radio" name="new" id="new1" value="no"  checked="checked" />
				  					<?php else: ?>
				  						<input type="radio" name="new" id="new1" value="no" />
				  					<?php endif ?>
				  					<label for="new1">No</label>
				  				</div>
								<label>Featured Product<em>*</em></label>
				  				<div class="radio-box">
				  					<?php if ($q['featured'] == 'yes'): ?>
				  						<input type="radio" name="featured" id="new2" value="yes" checked="checked" />
				  					<?php else: ?>
				  						<input type="radio" name="featured" id="new2" value="yes"  />
				  					<?php endif ?>
				  					<label for="new2">Yes</label>
				  				</div>
				  				<div class="radio-box">
				  					<?php if ($q['featured'] == 'no'): ?>
				  						<input type="radio" name="featured" id="new3" value="no"  checked="checked" />
				  					<?php else: ?>
				  						<input type="radio" name="featured" id="new3" value="no"  />
				  					<?php endif ?>
				  					<label for="new3">No</label>
				  				</div>
			  				</div><!-- /new-holder -->
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row three-row">
				  		<div class="l-info">
			  				<label>MRP</label>
			  				<input type="text" name="mrp" value="<?=$q['mrp']?>">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>price<em>*</em></label>
			  				<input type="text" name="price" class="product-price" value="<?=$q['price']?>" required="required">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Sale Percentage</label>
			  				<input type="text" class="product-price-sale" name="sale_percentage" value="<?=$q['sale_percentage']?>">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row three-row">
			  			<div class="l-info">
			  				<label>Discount</label>
			  				<input type="text" class="product-price-diff" value="<?=$q['discount']?>" name="discount" required="required">
			  				<!-- <input type="text" class="product-price-old" name="new_price"> -->
			  			</div><!-- /l-info -->
				  		<div class="l-info">
			  				<label>Price TAX (%)</label>
			  				<input type="text" name="tax" value="<?=$q['tax']?>">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Warranty</label>
			  				<select name="warranty">
			  					<?php if ($q['warranty'] == 'yes'): ?>
	                                <option value="yes" selected="selected">Yes</option>
	                                <option value="no">no</option>
			  					<?php else: ?>
			  						<option value="yes">Yes</option>
	                                <option value="no" selected="selected">no</option>
			  					<?php endif ?>
                            </select>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row three-row">
				  		<div class="l-info">
			  				<label>Unit</label>
			  				<input type="text" name="unit" value="<?=$q['unit']?>">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Unite Value</label>
			  				<input type="text" name="unit_value" value="<?=$q['unit_value']?>">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Which Filter Price To Show *</label>
			  				<select name="filter_price_show" required="required">
                                <?php if ($q['filter_price_show'] == 'color'): ?>
                                	<option value="none">NONE</option>
                                    <option value="size">SIZE</option>
                                    <option value="color" selected="selected">COLOR</option>
                                <?php elseif ($q['filter_price_show'] == 'size'): ?>
                                	<option value="none">NONE</option>
                                    <option value="size" selected="selected">SIZE</option>
                                    <option value="color">COLOR</option>
                                <?php else: ?>
                                    <option value="none" selected="selected">NONE</option>
                                    <option value="size">SIZE</option>
                                    <option value="color">COLOR</option>
                                <?php endif ?>
                            </select>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<?php $catSizes = explode(',', $cat['sizes']); ?>
                    <?php
                    if (strlen($catSizes[0]) > 0) {
                        $SizesDisplay = 'flex';
                    }
                    else{
                        $SizesDisplay = 'none';
                    }
                    ?>

			  		<div class="info-row size-block size-block-sizes" style="display: <?=$SizesDisplay?>;">

			  			<?php $Sizes = explode(',', $q['size']); ?>
		  				<h1>Size</h1>
			  			<?php foreach ($sizes as $key => $size): ?>
			  				<?php if (in_array($size['size_id'], $catSizes)): ?>
				  				<div class="l-info size-info">
	                                <div class="form-group">
	                                	<div class="size_holder">
		                                	<span class="dummy">Size</span>
		                                	<div class="dummy-holder">
		                                		<div class="check-size">
													<?php if (in_array($size['size_id'], $Sizes)): ?>
				                                		<input class="styled-checkbox" id="styled-checkbox-<?=$size['size_id']?>" type="checkbox" value="<?=$size['size_id']?>" name="size[]" checked="checked">
				                                    <?php else: ?>
				                                		<input class="styled-checkbox" id="styled-checkbox-<?=$size['size_id']?>" type="checkbox" value="<?=$size['size_id']?>" name="size[]">
				                                    <?php endif ?>
													<label for="styled-checkbox-<?=$size['size_id']?>"><?=$size['name']?></label>
												</div>
												<div class="price_frame">
													<span>Price</span>
									  				<?php
					                                $SizePrices = explode(',',$q['size_price']);
					                                foreach ($SizePrices as $keyCP => $size_price) {
					                                    $sizePrice = explode('-', $size_price);
					                                    if ($sizePrice[0] == $size['size_id'] && strlen($sizePrice[1]) > 0) {
					                                        $sizePriceName = 'name="size_price'.$size['size_id'].'"';
					                                        $sizePriceValue = 'value="'.$sizePrice[1].'"';
					                                        break;
					                                    }
					                                    else{
					                                        $sizePriceName = '';
					                                        $sizePriceValue = 'value="0"';
					                                    }
					                                }
					                                ?>
													<input type="text" data-name="size_price<?=$size['size_id']?>" <?=$sizePriceName?> <?=$sizePriceValue?> class="size-price size-filter-price"> &nbsp;&nbsp;
												</div>
			                                </div>
			                            </div>
	                                </div>
				  				</div><!-- /l-info -->
			  				<?php endif ?>
                        <?php endforeach ?>
			  		</div><!-- /info-row -->

			  		<div class="info-row size-block">
				  		<div class="info-row size-block note-block" style="display: <?=$SizesDisplay?>;">
			  				<div class="l-info">
					  			<label>Size Note Title</label>
					  			<input type="text" name="size_note_title" value="<?=$q['size_note_title']?>">
			  				</div><!-- /l-info -->
			  				<div class="l-info">
					  			<label>Size Note</label>
					  			<input type="text" name="size_note" value="<?=$q['size_note']?>">
			  				</div><!-- /l-info -->
				  		</div><!-- /info-row -->
			  			<hr>
		  			</div><!-- /info-row size-block -->


		  			<?php $catColors = explode(',', $cat['colors']); ?>
                    <?php
                    if (strlen($catColors[0]) > 0) {
                        $ColorsDisplay = 'flex';
                    }
                    else{
                        $ColorsDisplay = 'none';
                    }
                    ?>
			  		<div class="info-row color-block color-block-colors" style="display: <?=$ColorsDisplay?>;overflow-y: auto;max-height: 750px;">

			  			<h1>Color</h1>
                        <?php $Colors = explode(',', $q['color']); ?>
                        <?php $ColorImages = explode(',', $q['color_images']); ?>
			  			<?php foreach ($colors as $key => $color): ?>
			  				<?php if (in_array($color['color_id'], $catColors)): ?>
					  			<div class="l-info">
	                                <div class="form-group label-floating is-empty">
	                                	<div class="color-check-box">
		                                	<?php if (in_array($color['color_id'], $Colors)): ?>
		                                		<input class="styled-checkbox" id="color-styled-checkbox-<?=$color['color_id']?>" type="checkbox" value="<?=$color['color_id']?>" name="color[]" checked="checked">
		                                	<?php else: ?>
		                                		<input class="styled-checkbox" id="color-styled-checkbox-<?=$color['color_id']?>" type="checkbox" value="<?=$color['color_id']?>" name="color[]">
		                                	<?php endif ?>
											<label for="color-styled-checkbox-<?=$color['color_id']?>"><?=$color['name']?></label>
		                                </div>
	                                </div>
				  				</div><!-- /l-info -->
			  					<div class="l-info">
		  							<label>Price</label>
	                        		<?php
	                                $ColorPrices = explode(',',$q['color_price']);
	                                foreach ($ColorPrices as $keyCP => $color_price) {
	                                    $colorPrice = explode('-', $color_price);
	                                    if ($colorPrice[0] == $color['color_id'] && strlen($colorPrice[1]) > 0) {
	                                        $colorPriceName = 'name="color_price'.$color['color_id'].'"';
	                                        $colorPriceValue = 'value="'.$colorPrice[1].'"';
	                                        break;
	                                    }
	                                    else{
	                                        $colorPriceName = '';
	                                        $colorPriceValue = 'value="0"';
	                                    }
	                                }
	                                ?>
	                        		<input type="text" data-name="color_price<?=$color['color_id']?>" <?=$colorPriceName?> <?=$colorPriceValue?> class="form-control color-price color-filter-price"> &nbsp;&nbsp;
		  						</div><!-- /l-info -->
		  						<div class="l-info info-color-box">
		  							<?php
	                                foreach ($ColorImages as $keyCI => $ColorImage) {
	                                    $colorImage = explode('-', $ColorImage);
	                                    if ($colorImage[0] == $color['color_id'] && strlen($ColorImage) > 4) {
	                                    ?>
	                                        <input type="hidden" name="color_file_value<?=$color['color_id']?>" value="<?=$ColorImage?>">
	                                        <img src="<?=UPLOADS_PRO.$ColorImage?>" style="width: 50px;">
	                                    <?php
	                                    }
	                                }
	                                ?>
		  							<label  style="background:<?=$color['name']?>;color: <?=$color['font_color']?>;"><?=$color['name']?> Image (<?=$color['font_color']?>)
										<input type="file" name="color_file<?=$color['color_id']?>">
									</label> 
		  						</div><!-- /l-info-->

	  						<?php endif ?>
                       	<?php endforeach ?>


			  		</div><!-- /info-row -->

			  		<div class="info-row color-block note-block" style="display: <?=$ColorsDisplay?>;">
		  				<div class="l-info">
				  			<label>Color Note Title</label>
				  			<input type="text" name="color_note_title" value="<?=$q['color_note_title']?>">
		  				</div><!-- /l-info -->
		  				<div class="l-info">
				  			<label>Color Note</label>
				  			<input type="text" name="color_note" value="<?=$q['color_note']?>">
		  				</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="info-row">
			  			
			  		</div><!-- /info-row -->

	                <div class="info-row dynamic-filters color-family">
	                	<?php if ($filters_html != 'false'): ?>
			  				<?=$filters_html?>
	                	<?php endif ?>
			  		</div><!-- /info-row/dynamic-filters -->


			  		<div class="info-row reward-holder">
				  		<div class="l-info" style="display: none;">
			  				<label>Rewards</label>
			  				<input type="text" name="rewards" value="<?=$q['rewards']?>">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>SKU</label>
			  				<input type="text" name="sku" value="<?=$q['sku']?>">
			  			</div><!-- /l-info -->
			  			<?php if (1==2): ?>
				  			<div class="l-info">
				  				<label>Meta Title *</label>
				  				<input type="text" name="meta_title" value="<?=$q['meta_title']?>" required="required">
				  			</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>Meta Key Words *</label>
				  				<input type="text" name="meta_key" value="<?=$q['meta_key']?>" required="required">
				  			</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>Meta Description *</label>
				  				<input type="text" name="meta_desc" value="<?=$q['meta_desc']?>" required="required">
				  			</div><!-- /l-info -->
			  			<?php endif ?>
			  		</div><!-- /info-row -->

			  		<div class="info-row cat-tags-area"><?=$tags_html?></div>

			  		<div class="btn btn-success">
						<button type="submit">submit</button>
					</div>

			  	</form>
			  </div><!-- /tab-pane -->
			  
