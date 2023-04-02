		<div class="tab-content" id="myTabContent">

			<?php if (!($orders)): ?>
				<p class="alert alert-info">No Order Found Yet.</p>
			<?php else: ?>
				<div class="tab-pane fade show active" id="campaign" role="tabpanel" aria-labelledby="campaign-tab">
				  	<div class="user-panel-holder">
				  		<h1>my orders</h1>
				  		  <div class="inner-tabs">

						    <div class="nav-tabs-wrapper">
								<ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
									<li class="nav-item"><a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-123" aria-selected="false" aria-controls="block-simple-text-1" id="block-simple-text-1-tab">All</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-2" aria-selected="false" aria-controls="block-simple-text-2" id="block-simple-text-2-tab">Pending</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-3" aria-selected="false" aria-controls="block-simple-text-3" id="block-simple-text-3-tab">In Process</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-6" aria-selected="false" aria-controls="block-simple-text-6" id="block-simple-text-6-tab">Delivered To Courier</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-4" aria-selected="false" aria-controls="block-simple-text-4" id="block-simple-text-4-tab">On Way</a></li>
									<li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-5" aria-selected="false" aria-controls="block-simple-text-5" id="block-simple-text-5-tab">Delivered</a></li>
								</ul>
						      	<!-- <div class="select-order">
									<label>Show</label>
									<select>
										<option>All Orders</option>
										<option>Orders</option>
										<option>Cancel</option>
									</select>
								</div> -->
						    </div>
						    <div class="card">
						      <div class="card-body">
						        <div class="tab-content">

						          	<div id="block-simple-text-123" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
							          	<?php foreach ($orders as $key => $order): ?>
							          		<?php $SaleID = $order['sale_id']; ?>
								            <div class="user-order-holder">
								            	<div class="top-detail">
								            		<span class="order">
								            			Order #<?=$order['sale_id']?>
								            		</span>
								            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
								            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
								            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
								            		<a href="javascript://" class="get-user-order-detail" data-id="<?=$order['sale_id']?>" style="color:white;font-weight: bold">Detail</a>
								            		<?php if ($order['status'] == 0): ?>
								            			<button class="cancel-order-btn" data-id="<?=$order['sale_id']?>">Cancel Order</button>
								            		<?php endif ?>
								            	</div><!-- /top-detail -->
								            	<ul class="order-list">
								            		<?php
	                    							$items = $this->db->query("
	                    								SELECT p.product_image AS image, p.product_name AS Product, p.category_id, si.*  
	                    								FROM `sale_items` AS si 
	                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
	                    								WHERE si.sale_id = '$SaleID' 
	                								");
	                								if ($items->num_rows()>0){
	            										foreach ($items->result_array() as $item) {
				  										?>
					  										<li>
										            			<div class="img-holder">
										            				<img src="<?=UPLOADS_PRO.$item['category_id'].'/'.$item['image']?>" alt="image">
										            			</div>
										            			<div class="product-detail_holder">
										            				<p><?=$item['Product']?> </p>
										            				<em>Qty: <?=$item['qty']?></em>
										            			</div>
										            			<div class="right-btns">
										            				<span class="p-holder">
										            					Price:
										            					<br>
										            					Rs: <?=$item['total']?>
										            				</span>
										            				<?php if ($order['tracking_status'] == 'pending' || $order['tracking_status'] == 'in process'): ?>
										            					<?php if ($item['status'] == 'pending' || $item['status'] == 'in process'): ?>
										            						<span class="cancel"><a href="javascript://" data-id="<?=$item['sale_item_id']?>" class="btn btn-danger change-item-status">cancel item</a></span>
										            					<?php else: ?>
										            						<span class="cancel"><?=$item['status']?></span>
										            					<?php endif ?>
										            				<?php else: ?>
										            					<span class="cancel"><?=$item['status']?></span>
										            				<?php endif ?>
										            			</div>
										            		</li>
				  										<?php
	            										}
	                								}
	                    							?>
								            	</ul><!-- /order-list -->
								            </div><!-- /user-order-holder -->
							          	<?php endforeach ?>
						          	</div><!-- #block-simple-text-123 -->

						          	<div id="block-simple-text-2" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text my-pedding-section" role="tabpanel" aria-labelledby="block-simple-text-2-tab">
							            <?php foreach ($orders as $key => $order): ?>
							            	<?php if ($order['tracking_status'] == 'pending'): ?>
								          		<?php $SaleID = $order['sale_id']; ?>
									            <div class="user-order-holder">
									            	<div class="top-detail">
									            		<span class="order">
									            			Order #<?=$order['sale_id']?>
									            		</span>
									            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
									            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
									            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
									            		<a href="javascript://" class="get-user-order-detail" data-id="<?=$order['sale_id']?>" style="color:white;font-weight: bold">Detail</a>
									            		<button class="cancel-order-btn" data-id="<?=$order['sale_id']?>">Cancel Order</button>
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product,p.category_id,  si.*, b.title AS Brand 
		                    								FROM `sale_items` AS si 
		                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
		                    								LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
		                    								WHERE si.sale_id = '$SaleID' 
		                								");
		                								if ($items->num_rows()>0){
		            										foreach ($items->result_array() as $item) {
					  										?>
						  										<li>
											            			<div class="img-holder">
											            				<img src="<?=UPLOADS_PRO.$item['category_id'].'/'.$item['image']?>" alt="image">
											            			</div>
											            			<div class="product-detail_holder">
											            				<p><?=$item['Product']?> </p>
											            				<em>Qty: <?=$item['qty']?></em>
											            			</div>
											            			<div class="right-btns">
											            				<span class="p-holder">
											            					Price:
											            					<br>
											            					Rs: <?=$item['total']?>
											            				</span>
											            				<?php if ($order['tracking_status'] == 'pending' || $order['tracking_status'] == 'in process'): ?>
											            					<?php if ($item['status'] == 'pending' || $item['status'] == 'in process'): ?>
											            						<span class="cancel"><a href="javascript://" data-id="<?=$item['sale_item_id']?>" class="btn btn-danger change-item-status">cancel item</a></span>
											            					<?php else: ?>
											            						<span class="cancel"><?=$item['status']?></span>
											            					<?php endif ?>
											            				<?php else: ?>
											            					<span class="cancel"><?=$item['status']?></span>
											            				<?php endif ?>
											            			</div>
											            		</li>
					  										<?php
		            										}
		                								}
		                    							?>
									            	</ul><!-- /order-list -->
									            </div><!-- /user-order-holder -->
							            	<?php endif ?>
							          	<?php endforeach ?>
						          	</div><!-- #block-simple-text-2 -->

						          	<div id="block-simple-text-3" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-3-tab">
							            <?php foreach ($orders as $key => $order): ?>
							            	<?php if ($order['tracking_status'] == 'in process'): ?>
								          		<?php $SaleID = $order['sale_id']; ?>
									            <div class="user-order-holder">
									            	<div class="top-detail">
									            		<span class="order">
									            			Order #<?=$order['sale_id']?>
									            		</span>
									            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
									            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
									            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
									            		<a href="javascript://" class="get-user-order-detail" data-id="<?=$order['sale_id']?>" style="color:white;font-weight: bold">Detail</a>
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, p.category_id, si.*, b.title AS Brand 
		                    								FROM `sale_items` AS si 
		                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
		                    								LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
		                    								WHERE si.sale_id = '$SaleID' 
		                								");
		                								if ($items->num_rows()>0){
		            										foreach ($items->result_array() as $item) {
					  										?>
						  										<li>
											            			<div class="img-holder">
											            				<img src="<?=UPLOADS_PRO.$item['category_id'].'/'.$item['image']?>" alt="image">
											            			</div>
											            			<div class="product-detail_holder">
											            				<p><?=$item['Product']?> </p>
											            				<em>Qty: <?=$item['qty']?></em>
											            			</div>
											            			<div class="right-btns">
											            				<span class="p-holder">
											            					Price:
											            					<br>
											            					Rs: <?=$item['total']?>
											            				</span>
											            				<?php if ($order['tracking_status'] == 'pending' || $order['tracking_status'] == 'in process'): ?>
											            					<?php if ($item['status'] == 'pending' || $item['status'] == 'in process'): ?>
											            						<span class="cancel"><a href="javascript://" data-id="<?=$item['sale_item_id']?>" class="btn btn-danger change-item-status">cancel item</a></span>
											            					<?php else: ?>
											            						<span class="cancel"><?=$item['status']?></span>
											            					<?php endif ?>
											            				<?php else: ?>
											            					<span class="cancel"><?=$item['status']?></span>
											            				<?php endif ?>
											            			</div>
											            		</li>
					  										<?php
		            										}
		                								}
		                    							?>
									            	</ul><!-- /order-list -->
									            </div><!-- /user-order-holder -->
							            	<?php endif ?>
							          	<?php endforeach ?>
						          	</div><!-- #block-simple-text-3 -->

						          	<div id="block-simple-text-6" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-6-tab">
							            <?php foreach ($orders as $key => $order): ?>
							            	<?php if ($order['tracking_status'] == 'delivered to courier'): ?>
								          		<?php $SaleID = $order['sale_id']; ?>
									            <div class="user-order-holder">
									            	<div class="top-detail">
									            		<span class="order">
									            			Order #<?=$order['sale_id']?>
									            		</span>
									            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
									            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
									            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
									            		<a href="javascript://" class="get-user-order-detail" data-id="<?=$order['sale_id']?>" style="color:white;font-weight: bold">Detail</a>
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, p.category_id, si.*, b.title AS Brand 
		                    								FROM `sale_items` AS si 
		                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
		                    								LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
		                    								WHERE si.sale_id = '$SaleID' 
		                								");
		                								if ($items->num_rows()>0){
		            										foreach ($items->result_array() as $item) {
					  										?>
						  										<li>
											            			<div class="img-holder">
											            				<img src="<?=UPLOADS_PRO.$item['category_id'].'/'.$item['image']?>" alt="image">
											            			</div>
											            			<div class="product-detail_holder">
											            				<p><?=$item['Product']?> </p>
											            				<em>Qty: <?=$item['qty']?></em>
											            			</div>
											            			<div class="right-btns">
											            				<span class="p-holder">
											            					Price:
											            					<br>
											            					Rs: <?=$item['total']?>
											            				</span>
											            				<?php if ($order['tracking_status'] == 'pending' || $order['tracking_status'] == 'in process'): ?>
											            					<?php if ($item['status'] == 'pending' || $item['status'] == 'in process'): ?>
											            						<span class="cancel"><a href="javascript://" data-id="<?=$item['sale_item_id']?>" class="btn btn-danger change-item-status">cancel item</a></span>
											            					<?php else: ?>
											            						<span class="cancel"><?=$item['status']?></span>
											            					<?php endif ?>
											            				<?php else: ?>
											            					<span class="cancel"><?=$item['status']?></span>
											            				<?php endif ?>
											            			</div>
											            		</li>
					  										<?php
		            										}
		                								}
		                    							?>
									            	</ul><!-- /order-list -->
									            </div><!-- /user-order-holder -->
							            	<?php endif ?>
							          	<?php endforeach ?>
						          	</div><!-- #block-simple-text-6 -->

						          	<div id="block-simple-text-4" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-4-tab">
							            <?php foreach ($orders as $key => $order): ?>
							            	<?php if ($order['tracking_status'] == 'on way'): ?>
								          		<?php $SaleID = $order['sale_id']; ?>
									            <div class="user-order-holder">
									            	<div class="top-detail">
									            		<span class="order">
									            			Order #<?=$order['sale_id']?>
									            		</span>
									            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
									            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
									            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
									            		<a href="javascript://" class="get-user-order-detail" data-id="<?=$order['sale_id']?>" style="color:white;font-weight: bold">Detail</a>
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, p.category_id, si.*, b.title AS Brand 
		                    								FROM `sale_items` AS si 
		                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
		                    								LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
		                    								WHERE si.sale_id = '$SaleID' 
		                								");
		                								if ($items->num_rows()>0){
		            										foreach ($items->result_array() as $item) {
					  										?>
						  										<li>
											            			<div class="img-holder">
											            				<img src="<?=UPLOADS_PRO.$item['category_id'].'/'.$item['image']?>" alt="image">
											            			</div>
											            			<div class="product-detail_holder">
											            				<p><?=$item['Product']?> </p>
											            				<em>Qty: <?=$item['qty']?></em>
											            			</div>
											            			<div class="right-btns">
											            				<span class="p-holder">
											            					Price:
											            					<br>
											            					Rs: <?=$item['total']?>
											            				</span>
											            				<?php if ($order['tracking_status'] == 'pending' || $order['tracking_status'] == 'in process'): ?>
											            					<?php if ($item['status'] == 'pending' || $item['status'] == 'in process'): ?>
											            						<span class="cancel"><a href="javascript://" data-id="<?=$item['sale_item_id']?>" class="btn btn-danger change-item-status">cancel item</a></span>
											            					<?php else: ?>
											            						<span class="cancel"><?=$item['status']?></span>
											            					<?php endif ?>
											            				<?php else: ?>
											            					<span class="cancel"><?=$item['status']?></span>
											            				<?php endif ?>
											            			</div>
											            		</li>
					  										<?php
		            										}
		                								}
		                    							?>
									            	</ul><!-- /order-list -->
									            </div><!-- /user-order-holder -->
							            	<?php endif ?>
							          	<?php endforeach ?>
						          	</div><!-- #block-simple-text-4 -->

						          	<div id="block-simple-text-5" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-5-tab">
							            <?php foreach ($orders as $key => $order): ?>
							            	<?php if ($order['tracking_status'] == 'delivered'): ?>
								          		<?php $SaleID = $order['sale_id']; ?>
									            <div class="user-order-holder">
									            	<div class="top-detail">
									            		<span class="order">
									            			Order #<?=$order['sale_id']?>
									            		</span>
									            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
									            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
									            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
									            		<a href="javascript://" class="get-user-order-detail" data-id="<?=$order['sale_id']?>" style="color:white;font-weight: bold">Detail</a>
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, p.category_id, si.*, b.title AS Brand 
		                    								FROM `sale_items` AS si 
		                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
		                    								LEFT JOIN `brand` AS b ON p.brand_id = b.brand_id 
		                    								WHERE si.sale_id = '$SaleID' 
		                								");
		                								if ($items->num_rows()>0){
		            										foreach ($items->result_array() as $item) {
					  										?>
						  										<li>
											            			<div class="img-holder">
											            				<img src="<?=UPLOADS_PRO.$item['category_id'].'/'.$item['image']?>" alt="image">
											            			</div>
											            			<div class="product-detail_holder">
											            				<p><?=$item['Product']?> </p>
											            				<em>Qty: <?=$item['qty']?></em>
											            			</div>
											            			<div class="right-btns">
											            				<span class="p-holder">
											            					Price:
											            					<br>
											            					Rs: <?=$item['total']?>
											            				</span>
											            				<?php if ($order['tracking_status'] == 'pending' || $order['tracking_status'] == 'in process'): ?>
											            					<?php if ($item['status'] == 'pending' || $item['status'] == 'in process'): ?>
											            						<span class="cancel"><a href="javascript://" data-id="<?=$item['sale_item_id']?>" class="btn btn-danger change-item-status">cancel item</a></span>
											            					<?php else: ?>
											            						<span class="cancel"><?=$item['status']?></span>
											            					<?php endif ?>
											            				<?php else: ?>
											            					<span class="cancel"><?=$item['status']?></span>
											            				<?php endif ?>
											            			</div>
											            		</li>
					  										<?php
		            										}
		                								}
		                    							?>
									            	</ul><!-- /order-list -->
									            </div><!-- /user-order-holder -->
							            	<?php endif ?>
							          	<?php endforeach ?>
						          	</div><!-- #block-simple-text-5 -->

						        </div>
						      </div>
						    </div>
						  </div>
				  	</div>
				</div> <!--  my orders -->
			<?php endif ?>



		</div><!-- /tab-content -->
	</div>
</div>
