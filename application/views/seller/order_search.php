			<div class="tab-pane active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
			  
			  	<div class="overview-order">
				  	<ul class="breadcrumbs">
				  		<li><a href="<?=BASEURL.'seller/dashboard/'?>">Home</a></li>
				  		<li>Order Search</li>
				  	</ul>
				  	
					<div class="cs-holder">
						<h1>Search</h1>
					</div>
					<div class="tab-holder">
						<div class="tab-content">

							<div class="tab-pane active" id="photo1" role="tabpanel">
								<form class="search-block" id="order-search-form" method="get">
									<div class="search-row">
										<input type="hidden" name="search" value="true">
										<input type="text" name="order_number" value="<?=$get['order_number']?>" placeholder="Order Number">
										<input type="text" name="product_name" value="<?=$get['product_name']?>" placeholder="Product">
										<input type="text" name="sku" value="<?=$get['sku']?>" placeholder="Seller SKU">
										<select name="payment_method">
											<option value="">Select Payment Method</option>
											<option value="COD" <?=($get['payment_method'] == 'COD') ? 'selected="selected"' : ''?>>COD</option>
											<option value="card" <?=($get['payment_method'] == 'card') ? 'selected="selected"' : ''?>>Card</option>
										</select>
									</div>
									<div class="search-row">
										<input type="text" name="qty" placeholder="QTY">
										<input id="startDate" name="start_date" type="text" class="s-date" placeholder="Start Date" required="required" value="<?=$get['start_date']?>" />
								        &nbsp;
								        <input id="endDate" name="end_date" type="text" class="e-date" placeholder="End Date" value="<?=$get['end_date']?>"/>
										<select name="status">
											<option value="">Select Status</option>
											<option value="pending" <?=($get['status'] == 'pending') ? 'selected="selected"' : ''?>>Pending</option>
											<option value="in process" <?=($get['status'] == 'in process') ? 'selected="selected"' : ''?>>In Process</option>
											<option value="delivered to courier" <?=($get['status'] == 'delivered to courier') ? 'selected="selected"' : ''?>>Delivered To Courier</option>
											<option value="on way" <?=($get['status'] == 'on way') ? 'selected="selected"' : ''?>>On Way</option>
											<option value="delivered" <?=($get['status'] == 'delivered') ? 'selected="selected"' : ''?>>Delivered</option>
											<option value="returned" <?=($get['status'] == 'returned') ? 'selected="selected"' : ''?>>Returned</option>
											<option value="cancelled" <?=($get['status'] == 'cancelled') ? 'selected="selected"' : ''?>>Cancelled</option>
										</select>
									</div>
									<button type="submit">Search</button>
								</form>
								<div class="overview-table">
									<a href="<?=$download_url?>" class="btn btn-success" target="_blank">Download CSV File</a>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table id="tableData">
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
							
						</div><!-- /tab-content -->
				  	</div><!-- /tab-holder -->
				</div><!-- /overview-order -->

			  </div><!-- /tab-pane -->