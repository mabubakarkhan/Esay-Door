			<div class="tab-pane active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
			  
			  	<div class="overview-order">
				  	<ul class="breadcrumbs">
				  		<li><a href="<?=BASEURL.'seller/dashboard/'?>">Home</a></li>
				  		<li>Order Overview</li>
				  	</ul>
				  	
					<div class="cs-holder">
						<h1>Order Overview</h1>
					</div>
					<div class="tab-holder">
				  		<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#photo1" role="tab">All</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#pending" role="tab">Pending</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#ship" role="tab">In Process</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#shiped" role="tab">Shiped</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#delivered" role="tab">Deliverred</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#cancelled" role="tab">Cancelled</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#returned" role="tab">Returned</a>
							</li>
							<!-- <li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#failed" role="tab">Failed Delivery</a>
							</li> -->
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="photo1" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-all">
											<?php foreach ($orders as $key => $order): ?>
												<tr id="order-item-id-<?=$order['sale_item_id']?>">
													<td><?=$order['sale_id']?></td>
													<td><?=date('d-m-Y',strtotime($order['at']))?></td>
													<td><?=$order['product_name']?></td>
													<td><?=$order['sku']?></td>
													<td><?=$order['payment_method']?></td>
													<td><?=$order['qty']?></td>
													<td><?=$order['price']?></td>
													<td><?=$order['total']?></td>
													<td class="order-item-status"><?=$order['status']?></td>
													<td>
														<?php
														if($order['OrderStatus'] == 0){
	                                                    ?>
	                                                    	<span class='badge badge-default'>Pending</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 1){
	                                                    ?>
	                                                        <span class='badge badge-success'>Confirm</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 2){
	                                                    ?>
	                                                    	<span class='badge badge-info'>Out</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 3){
	                                                    ?>
	                                                        <span class='badge badge-danger'>Cancel</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 4){
	                                                    ?>
	                                                        <span class='badge badge-info'>complete</span>
	                                                    <?php
	                                                    }
	                                                    ?>
													</td>
													<td>
														<?php
														if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
	                                                    ?>
															<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
	                                                    <?php
	                                                    }
	                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
	                                                    ?>
															<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
	                                                    <?php
	                                                    }
	                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
	                                                    ?>
	                                                    	---
	                                                    <?php
	                                                    }
	                                                    ?>
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (all orders) -->
							<div class="tab-pane" id="pending" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-pending">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'pending' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php
															if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
		                                                    ?>
		                                                    	---
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (pending orders) -->
							<div class="tab-pane" id="ship" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-in-process">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'in process' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php
															if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
		                                                    ?>
		                                                    	---
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (in process orders) -->
							<div class="tab-pane" id="shiped" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-delivered-to-courier">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'delivered to courier' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php
															if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
		                                                    ?>
		                                                    	---
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (delivered to courier orders) -->
							<div class="tab-pane" id="delivered" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-delivered">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'delivered' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php
															if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
		                                                    ?>
		                                                    	---
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (delivered orders) -->
							<div class="tab-pane" id="cancelled" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-cancelled">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'cancelled' || $order['OrderStatus'] == '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php
															if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
		                                                    ?>
		                                                    	---
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (cancelled orders) -->
							<div class="tab-pane" id="returned" role="tabpanel">
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-returned">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'returned' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php
															if($order['status'] == 'pending' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'in process' && $order['OrderStatus'] != 4 && $order['OrderStatus'] != 3){
		                                                    ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
		                                                    <?php
		                                                    }
		                                                    else if($order['status'] == 'delivered to courier' || $order['status'] == 'On Way' || $order['status'] == 'delivered' || $order['status'] == 'returned' || $order['status'] == 'cancelled' || $order['OrderStatus'] != 4 || $order['OrderStatus'] != 3){
		                                                    ?>
		                                                    	---
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (returned orders) -->
							<div class="tab-pane" id="failed" role="tabpanel">8</div><!-- /tab-pane (delivered to courier orders) -->
						</div><!-- /tab-content -->
				  	</div><!-- /tab-holder -->
				</div><!-- /overview-order -->

			  </div><!-- /tab-pane -->