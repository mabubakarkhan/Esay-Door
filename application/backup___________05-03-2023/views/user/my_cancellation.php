		<div class="tab-content" id="myTabContent">


			<?php if ($orders[0]['tracking_status'] == 'cancelled'): ?>
				<p class="alert alert-info">No 'Cancelled' Order Found Yet.</p>
			<?php else: ?>
				<div class="tab-pane fade show active" id="media" role="tabpanel" aria-labelledby="media-tab">
				  	<div class="user-panel-holder">
				  		<h1>my Cancellation</h1>
				  		  <div class="inner-tabs">

						    <div class="card">
							     <div class="card-body">
								        <div class="tab-content">

									        <div id="block-simple-text-1" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text my-cancellation-section" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
									            

									        	<?php foreach ($orders as $key => $order): ?>
									            	<?php if ($order['tracking_status'] == 'cancelled'): ?>
										          		<?php $SaleID = $order['sale_id']; ?>
											            <div class="user-order-holder">
											            	<div class="top-detail">
											            		<span class="order">
											            			Order #<?=$order['sale_id']?>
											            		</span>
											            		<span class="placed">Placed on <?=date('d M, Y H:i',strtotime($order['at']))?></span>
											            		<span class="total-product">Total Product:  <?=$order['total_items']?></span>
											            		<span class="total-price">Total Price:  <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></span>
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
													            				<span class="cancel"><?=$item['status']?></span>
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


									        </div><!-- /block-simple-text-1 -->
								          
								      	</div>
							    </div>
						    </div>
				  	    </div>
			  		</div>
			  	</div><!--  my cancellations -->
			<?php endif ?>




		</div><!-- /tab-content -->
	</div>
</div>