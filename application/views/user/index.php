

		<div class="dashbord-content" id="user-panel">
			<div class="container">
				<div class="left-bar">
					<div class="user-box">
						<img src="<?=IMG?>img135.png" alt="image">
						<div class="user-text">
							<span>Hello,</span>
							<strong class="user-full-name"><?=$user['fname'].' '.$user['lname']?></strong>
						</div>
					</div>
					<div id="accordion1" class="myaccordion">
					  <div class="card">
					    <div class="card-header" id="headingOne">
					      <h2 class="mb-0">
					        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					        	<img src="<?=IMG?>img137.png" class="img-1"> 
					        	Manage My Account
					        </button>
					      </h2>
					    </div>
					    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion1">
					    	<div class="card-body">
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
					        	<li class="nav-item">
									<a class="nav-link" id="home11-tab" data-toggle="tab" href="#home11" role="tab" aria-controls="home11" aria-selected="true">Manage My Account</a>
								</li>
					        	<li class="nav-item">
									<a class="nav-link" id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">My Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="Products-tab" data-toggle="tab" href="#Products" role="tab" aria-controls="Products" aria-selected="false">Address Book</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="media1-tab" data-toggle="tab" href="#media1" role="tab" aria-controls="media" aria-selected="false">My Payment Options</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="vouchers" data-toggle="tab" href="#vouchers" role="tab" aria-controls="vouchers-tab" aria-selected="true">Vouchers</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingTwo">
					      <h2 class="mb-0">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					        		<img src="<?=IMG?>img136.png" class="normal">
					        		<img src="<?=IMG?>img137.png" class="hover">
					          	My Orders
					        </button>
					      </h2>
					    </div>
					    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
					        	<li class="nav-item">
									<a class="nav-link" id="campaign-tab" data-toggle="tab" href="#campaign" role="tab" aria-controls="campaign" aria-selected="true">My Orders</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="Returns-tab" data-toggle="tab" href="#Returns" role="tab" aria-controls="Returns" aria-selected="false">My Returns</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">My Cancellation</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingThree">
					      <h2 class="mb-0">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					        	<img src="<?=IMG?>bg-promotions.png" alt="image">
					          	My Reviews
					        </button>
					      </h2>
					    </div>
					    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
					          	<li class="nav-item">
									<a class="nav-link" id="campaign1-tab" data-toggle="tab" href="#campaign1" role="tab" aria-controls="campaign1" aria-selected="true">My Reviews</a>
								</li>
								<!-- <li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Write Review</a>
								</li> -->
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingThree1">
					      <h2 class="mb-0">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
					        	<img src="<?=IMG?>bg-finance.png" alt="image">
					          	My Wishlist
					        </button>
					      </h2>
					    </div>
					    <div id="collapseThree1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
					        	<li class="nav-item">
									<a class="nav-link" id="statements-tab" data-toggle="tab" href="#statements" role="tab" aria-controls="statements" aria-selected="true">My Wishlist</a>
								</li>
								
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingThree11">
					      <h2 class="mb-0">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
					        	<img src="<?=IMG?>bg-account.png" alt="image">
					          	Account & Settings
					        </button>
					      </h2>
					    </div>
					    <div id="collapseThree11" class="collapse" aria-labelledby="headingThree11" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tabs" id="myTab" role="tablist">
								<li class="nav-item">
									<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="true">User Management</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Account settings</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Chat settings</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="tab-content" id="myTabContent">
				  <div class="tab-pane fade show active" id="home11" role="tabpanel" aria-labelledby="dashboard-tab">
				  	<div class="user-panel-holder">
				  		<h1>manage my account</h1>
				  		<div class="three-columns">
				  			<div class="column">
				  				<h2>Personal Profile</h2>
				  				<ul class="user-list">
				  					<li>
				  						<img src="<?=IMG?>img136.png" alt="image">
				  						<span class="user-full-name"><?=$user['fname'].' '.$user['lname']?></span>
				  					</li>
				  					<li>
				  						<img src="<?=IMG?>img124.png" alt="image">
				  						<span class="user-email"><?=$user['email']?></span>
				  					</li>
				  					<li>
				  						<a class="edit-btn" data-toggle="modal" data-target="#edit-profile">Edit Profile <i class="fa fa-pencil" aria-hidden="true"></i></a>
				  					</li>
				  				</ul>
				  			</div>
				  			<div class="column">
				  				<h2>Address Book</h2>
				  				<ul class="user-list">
				  					<li>Default Shipping Address</li>
				  					<li><?=$user['house_no']?></li>
				  					<li class="user-phone"><?=$user['phone']?></li>
				  				</ul>
				  				<?php if (1==2): ?>
				  					<a class="edit-address" data-toggle="modal" data-target="#edit-address">Edit Profile <i class="fa fa-map-marker" aria-hidden="true"></i></a>
				  				<?php endif ?>
				  			</div>
				  			<div class="column">
				  				<h2>newsletter  subscription</h2>
				  				<div class="news-letter">
				  					<em>I have read and understood</em>
				  					<a href="#" class="policy">Privacy Policy</a>
				  				</div>
				  				<a class="edit-btn">Subscribe</a>
				  			</div>
				  		</div>
				  		<div class="user-item-table">
				  			<h2>recent orders</h2>
				  			<div class="table-holder">
				  				<table>
				  					<thead>
				  						<th>order #</th>
				  						<th>palced on</th>
				  						<th>items</th>
				  						<th>total</th>
				  						<th>status</th>
				  					</thead>
				  					<tbody>
				  						<?php if ($orders): ?>
				  							<?php foreach ($orders as $key => $order): ?>
						  						<tr>
						  							<td><?=$order['sale_id']?></td>
						  							<td><?=date('d-m-Y',strtotime($order['at']))?></td>
						  							<td>
						  								<ul class="item-list">
						  									<?php
						  									$SaleID = $order['sale_id'];
                                							$items = $this->db->query("
                                								SELECT p.product_image AS image 
                                								FROM `sale_items` AS si 
                                								INNER JOIN `products` AS p ON si.product_id = p.product_id 
                                								WHERE si.sale_id = '$SaleID' 
                            								");
                            								if ($items->num_rows()>0){
	                    										foreach ($items->result_array() as $item) {
						  											echo '<li><img src="'.UPLOADS_PRO.$item['image'].'"></li>';
	                    										}
                            								}
                                							?>
						  								</ul>
						  							</td>
						  							<td>Rs. <?=$order['total_amount']+$order['delivery_charge']-$order['discount']?></td>
						  							<td>
						  								<?=$order['tracking_status']?>
						  								<!-- <a href="#" class="manage">manage</a> -->
						  							</td>
						  						</tr>
						  						<?php if ($key == 10): ?>
						  							<?php break; ?>
						  						<?php endif ?>
				  							<?php endforeach ?>
				  						<?php else: ?>
				  							<tr>
				  								<td colspan="5">No order</td>
				  							</tr>
				  						<?php endif ?>
				  						
				  					</tbody>
				  				</table>
				  			</div>
				  		</div>
				  	</div>
				  </div>
				<div class="tab-pane fade" id="home1" role="tabpanel" aria-labelledby="home1-tab">
				  		<div class="user-panel-holder">
					  		<h1>my profile</h1>
				  			<form action="" class="user-profile-form">
						  		<div class="profile_holder">
						  			<div class="column text">
						  				<span>first name</span>
						  				<input type="text" name="fname" class="makeNonEditable" placeholder="First Name" value="<?=$user['fname']?>" required="required">
						  			</div>
						  			<div class="column text">
						  				<span>last name</span>
						  				<input type="text" name="lname" class="makeNonEditable" placeholder="Last Name" value="<?=$user['lname']?>" required="required">
						  			</div>
						  			<div class="column email">
						  				<span>email address</span>
						  				<input type="email" name="email" placeholder="mail@domain.com" value="<?=$user['email']?>">
						  			</div>
						  			<div class="column mobile">
						  				<span>mobile</span>
						  				<input type="tel" name="phone" placeholder="03xxx xxxxxxx" value="<?=$user['phone']?>" required="required">
						  			</div>
						  			<div class="column mobile">
						  				<span>birthday</span>
						  				<input type="date" name="dob" value="<?=date('m/d/Y',strtotime($user['dob']))?>" placeholder="1990-04-04">
						  			</div>
						  			<div class="column gender">
						  				<span>gender</span>
						  				<select name="gender">
						  					<option value="">Select</option>
						  					<?php if ($user['gender'] == 'male'): ?>
							  					<option value="male" selected="selected">Male</option>
							  					<option value="female">female</option>
						  					<?php elseif($user['gender'] == 'female'): ?>
						  						<option value="male">Male</option>
							  					<option value="female" selected="selected">female</option>
						  					<?php endif ?>
						  				</select>
						  			</div>
						  			<div class="column city">
						  				<span>city</span>
						  				<select name="city">
						  					<option value="">Select</option>
						  					<?php foreach ($cities as $key => $city): ?>
						  						<?php if ($user['city'] == $city['city_id']): ?>
						  							<option value="<?=$city['city_id']?>" selected="selected"><?=$city['city_name']?></option>
						  						<?php else: ?>
						  							<option value="<?=$city['city_id']?>"><?=$city['city_name']?></option>
						  						<?php endif ?>
						  					<?php endforeach ?>
						  				</select>
						  			</div>
						  			<div class="column">
						  				<button class="btn btn-success" type="submit">Update</button>
						  			</div>
						  			<div class="btn-holder">
						  				<a class="edit-profile" href="#" data-toggle="modal" data-target="#edit-address">Edit Profile <i class="fa fa-pencil" aria-hidden="true"></i></a>
						  				<a class="edit-address" href="#" data-toggle="modal" data-target="#edit-address">change password <i class="fa fa-pencil" aria-hidden="true"></i></a>
						  			</div>
						  		</div>
				  			</form>
					  	</div>
				</div><!-- PROFILE-tab -->

				<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
					dfsdfsdf
				</div><!-- orders-tab -->

				<div class="tab-pane fade" id="Returns" role="tabpanel" aria-labelledby="Returns-tab">
				  	<div class="user-panel-holder">
				  		<h1>my returns</h1>
				  		  <div class="inner-tabs">
    
						    <div class="card">
						      <div class="card-body">
						        <div class="tab-content">

							        <div id="block-simple-text-1" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
							            

							        	<?php foreach ($orders as $key => $order): ?>
							            	<?php if ($order['tracking_status'] == 'returned'): ?>
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
		                    								SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
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
											            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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


							        </div><!-- #block-simple-text-1 -->
						          
						      	</div>
						       </div>
						  	</div>
				  		  </div>

				  	</div>
				</div>  <!-- Returns-tab -->

				  <div class="tab-pane fade" id="Products" role="tabpanel" aria-labelledby="Product-tab">
					  	<div class="user-panel-holder">
					  		<div class="top-heading">
					  			<h1>address book</h1>
					  			<div class="radio-holder">
					  				<div class="col-left">
										<input type="radio" id="test1" name="radio-group">
		    							<label for="test1">Make default shipping address</label>
									</div>
									<div class="col-left">
										<input type="radio" id="test2" name="radio-group">
		    							<label for="test2">Make default billing address</label>
									</div>
					  			</div>
					  		</div>
					  		<div class="profile_holder">
					  			<div class="table-holder">
					  				<table class="address-table">
					  					<thead>
					  						<th>
					  							<img src="<?=IMG?>img143.png" alt="image">
					  							Full name
					  						</th>
					  						<th>
					  							<img src="<?=IMG?>img144.png" alt="image">
					  							address
					  						</th>
					  						<th>
					  							<img src="<?=IMG?>img145.png" alt="image">
					  							city
					  						</th>
					  						<th>
					  							<img src="<?=IMG?>img146.png" alt="image">
					  							phone number
					  						</th>
					  						<th>
					  							<img src="<?=IMG?>img147.png" alt="image">
					  							edit
					  						</th>
					  					</thead>
					  					<tbody>
					  						<?php foreach ($locations as $key => $location): ?>
						  						<tr>
						  							<td><?=$location['receiver_name']?></td>
						  							<td><?=$location['house_no'].','.$location['Socity']?></td>
						  							<td><?=$location['City']?></td>
						  							<td><?=$location['receiver_mobile']?></td>
						  							<td class="last">
						  								<a href="#">
						  									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
						  									edit
						  								</a>
						  							</td>
						  						</tr>
					  						<?php endforeach ?>
					  					</tbody>
					  				</table>
					  				<button class="address-table-btn">+ Add Neew Address</button>
					  			</div>
					  		</div>
					  		
					  	</div>
				  </div><!-- products-tab -->
				<div class="tab-pane fade" id="media1" role="tabpanel" aria-labelledby="media1-tab">
				  	<div class="user-panel-holder">
				  		<h1>my payment options</h1>
				  		<div class="profile_holder">
				  			<div class="payment-holder">
				  				<img src="<?=IMG?>img148.png" alt="image" class="align-right">
				  			</div>
				  		</div>
				  	</div>
				</div><!-- payment option-->
				 <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">
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
					                    								SELECT p.product_image AS image, p.product_name AS Product, si.*  
					                    								FROM `sale_items` AS si 
					                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
					                    								WHERE si.sale_id = '$SaleID' 
					                								");
					                								if ($items->num_rows()>0){
					            										foreach ($items->result_array() as $item) {
								  										?>
									  										<li>
														            			<div class="img-holder">
														            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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
				<div class="tab-pane fade" id="campaign" role="tabpanel" aria-labelledby="campaign-tab">
				  	<div class="user-panel-holder">
				  		<h1>my orders</h1>
				  		  <div class="inner-tabs">
    
						    <div class="nav-tabs-wrapper">
						      <ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
						        <li class="nav-item"><a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-123" aria-selected="false" aria-controls="block-simple-text-1" id="block-simple-text-1-tab">All</a></li>
						        <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-2" aria-selected="false" aria-controls="block-simple-text-2" id="block-simple-text-2-tab">Pending</a></li>
						        <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-3" aria-selected="false" aria-controls="block-simple-text-3" id="block-simple-text-3-tab">In Process</a></li>
						        <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-4" aria-selected="false" aria-controls="block-simple-text-4" id="block-simple-text-4-tab">On Way</a></li>
						        <li class="nav-item"><a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-5" aria-selected="false" aria-controls="block-simple-text-5" id="block-simple-text-5-tab">Delivered</a></li>

						      </ul>
						      <div class="select-order">
									<label>Show</label>
									<select>
										<option>All Orders</option>
										<option>Orders</option>
										<option>Cancel</option>
									</select>
								</div>
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
								            		<?php if ($order['status'] == 0): ?>
								            			<button class="cancel-order-btn" data-id="<?=$order['sale_id']?>">Cancel Order</button>
								            		<?php endif ?>
								            	</div><!-- /top-detail -->
								            	<ul class="order-list">
								            		<?php
	                    							$items = $this->db->query("
	                    								SELECT p.product_image AS image, p.product_name AS Product, si.*  
	                    								FROM `sale_items` AS si 
	                    								INNER JOIN `products` AS p ON si.product_id = p.product_id 
	                    								WHERE si.sale_id = '$SaleID' 
	                								");
	                								if ($items->num_rows()>0){
	            										foreach ($items->result_array() as $item) {
				  										?>
					  										<li>
										            			<div class="img-holder">
										            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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
										            				<?php if ($order['status'] == 0): ?>
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
									            		<button class="cancel-order-btn" data-id="<?=$order['sale_id']?>">Cancel Order</button>
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
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
											            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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
											            				<?php if ($order['status'] == 0): ?>
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
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
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
											            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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
											            				<?php if ($order['status'] == 0): ?>
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
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
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
											            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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
											            				<?php if ($order['status'] == 0): ?>
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
									            	</div><!-- /top-detail -->
									            	<ul class="order-list">
									            		<?php
		                    							$items = $this->db->query("
		                    								SELECT p.product_image AS image, p.product_name AS Product, si.*, b.title AS Brand 
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
											            				<img src="<?=UPLOADS_PRO.$item['image']?>" alt="image">
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
											            				<?php if ($order['status'] == 0): ?>
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
				  <div class="tab-pane fade" id="campaign1" role="tabpanel" aria-labelledby="campaign1-tab">
				  	<div class="user-panel-holder">
				  		<h1>my Reviews</h1>
				  		  <div class="inner-tabs">
    
						    <div class="nav-tabs-wrapper">
						      <ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
						        <li class="nav-item">
						          <a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-111" aria-selected="false" aria-controls="block-simple-text-111" id="block-simple-text-111-tab">To Be Reviewed</a>
						        </li>
						        <li class="nav-item">
						          <a class="nav-link" data-toggle="tab" role="tab" href="#block-simple-text-222" aria-selected="false" aria-controls="block-simple-text-222" id="block-simple-text-222-tab">History</a>
						        </li>
						      </ul>
						    </div>
						    <div class="card">
						      <div class="card-body">
						        <div class="tab-content">

							        <div id="block-simple-text-111" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
							            <?php foreach ($purchesed_products as $key => $purchesed_product): ?>
							            	<?php if ($purchesed_product['ReviewStatus'] != 'active' && $purchesed_product['ReviewStatus'] != 'inactive'): ?>
									            <div class="user-order-holder">
									            	<ul class="order-list">
									            		<li>
									            			<div class="img-holder">
									            				<img src="<?=UPLOADS_PRO.$purchesed_product['image']?>" alt="<?=$purchesed_product['Product']?>">
									            			</div>
									            			<div class="product-detail_holder">
									            				<span class="date">Purchase on <?=date('d M, Y',strtotime($purchesed_product['at']))?></span>
									            				<p><?=$purchesed_product['Product']?> </p>
									            				<em class="short-description"><?=$purchesed_product['Category']?> </em>
									            			</div>
									            			<div class="right-holder">
									            				<div class="holder-holder">
									            					<span class="sold">Sold by:</span>
									            					<span class="seller">
									            						<?=$purchesed_product['Brand']?>
									            					</span>
									            					
									            				</div>
									            				<?php if ($purchesed_product['ReviewStatus'] == 'inactive'): ?>
									            					<a class="review-btn" style="background: red;color: white;">Rejected</a>
									            				<?php elseif ($purchesed_product['ReviewStatus'] == 'new'): ?>
									            					<a class="review-btn" style="background: #09f;color: white;">Under Observation</a>
									            				<?php else: ?>
								            						<a class="review-btn btn-review-action" data-toggle="tab" role="tab" href="#profile" data-id="<?=$purchesed_product['product_id']?>" data-image="<?=UPLOADS_PRO.$purchesed_product['image']?>" data-product="<?=$purchesed_product['Product']?>" data-brand="<?=$purchesed_product['Brand']?>" data-category="<?=$purchesed_product['Category']?>" data-at="Purchase on <?=date('d M, Y',strtotime($purchesed_product['at']))?>">Review</a>
									            				<?php endif ?>
									            			</div>
									            		</li>
									            	</ul>
									            </div><!-- /user-order-holder -->
							            	<?php endif ?>
							            <?php endforeach ?>

							        </div><!-- #block-simple-text-1 -->


						          <div id="block-simple-text-222" class="tab-pane block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-2-tab">
						            <?php foreach ($purchesed_products as $key => $purchesed_product): ?>
						            	<?php if ($purchesed_product['ReviewStatus'] == 'active' || $purchesed_product['ReviewStatus'] == 'inactive'): ?>
								            <div class="user-order-holder">
								            	<ul class="order-list">
								            		<li>
								            			<div class="img-holder">
								            				<img src="<?=UPLOADS_PRO.$purchesed_product['image']?>" alt="<?=$purchesed_product['Product']?>">
								            			</div>
								            			<div class="product-detail_holder">
								            				<span class="date">Purchase on <?=date('d M, Y',strtotime($purchesed_product['at']))?></span>
								            				<p><?=$purchesed_product['Product']?> </p>
								            				<em class="short-description"><?=$purchesed_product['Category']?> </em>
								            			</div>
								            			<div class="right-holder">
								            				<div class="holder-holder">
								            					<span class="sold">Sold by:</span>
								            					<span class="seller">
								            						<?=$purchesed_product['Brand']?>
								            					</span>
								            					
								            				</div>
								            				<?php if ($purchesed_product['ReviewStatus'] == 'inactive'): ?>
								            					<a class="review-btn" style="background: red;color: white;">Rejected</a>
								            				<?php elseif ($purchesed_product['ReviewStatus'] == 'active'): ?>
								            					<a class="review-btn" style="background: green;color: white;">Active</a>
								            				<?php endif ?>
								            			</div>
								            		</li>
								            	</ul>
								            </div><!-- /user-order-holder -->
						            	<?php endif ?>
						            <?php endforeach ?>
						          </div><!-- /block-simple-text-2 -->
						          
						        </div><!-- /tab-content -->
						      </div><!-- /card-body -->
						    </div><!-- /card -->
						  </div><!-- /inner-tabs -->
				  	</div><!-- /user-panel-holder -->
				  </div><!--  compaigns1 -->
				  <div class="tab-pane fade" id="statements" role="tabpanel" aria-labelledby="statements-tab">
					  	<div class="user-panel-holder">
					  		<h1>my wishlist</h1>
					  		  <div class="inner-tabs">
	    							<?php if (1==2): ?>
									    <div class="nav-tabs-wrapper">
									      <ul class="nav nav-tabs" id="tabs-title-region-nav-tabs" role="tablist">
									        <li class="nav-item">
									          <a class="nav-link active" data-toggle="tab" role="tab" href="#block-simple-text-1" aria-selected="false" aria-controls="block-simple-text-1" id="block-simple-text-1-tab">wishlist <i class="fa fa-heart-o" aria-hidden="true"></i></a>
									        </li>
									      </ul>
									      <button class="add-cart">Add All to cart</button>
									    </div>
	    							<?php endif ?>
								    <div class="card">
									      <div class="card-body">
										        <div class="tab-content">

											          <div id="block-simple-text-1" class="tab-pane active show block block-layout-builder block-inline-blockqfcc-blocktype-simple-text" role="tabpanel" aria-labelledby="block-simple-text-1-tab">
												            <?php foreach ($wishlist as $key => $wish): ?>
												            	<!-- bakar -->
													            <div class="user-order-holder">
													            	<ul class="order-list">
													            		<li>
													            			<div class="img-holder">
													            				<img src="<?=UPLOADS_PRO.$wish['image']?>" alt="image">
													            			</div>
													            			<div class="product-detail_holder">
													            				<!-- <span class="supplier">As Supplier (Rawalpindi)</span> -->
													            				<p><?=$wish['Product']?></p>
													            				<em class="short-description"><?=$wish['Brand']?></em>
													            			</div>
												            				<div class="right-box">
												            					<div class="box-1">
												            						<?php if ($wish['new_price'] > 0): ?>
													            						<span>Rs. <?=$wish['price']?></span>
													            						<span>Rs. <?=$wish['new_price']?> - <?=$wish['sale_percentage']?>%</span>
													            						<span>Price Droped</span>
												            						<?php else: ?>
												            							<span></span>
													            						<span>Rs. <?=$wish['price']?></span>
													            						<span></span>
												            						<?php endif ?>
												            					</div>
												            					<a href="<?=BASEURL.'product/'.$wish['slug'].'-'.$wish['product_id']?>" class="box-2">
												            						<img src="<?=IMG?>bg-cart.png" alt="image">
												            					</a>
												            					<a href="javascript://" class="box-3 delete-wish-list-btn" data-id="<?=$wish['wishlist_id']?>">
												            						<img src="<?=IMG?>bg-delete.png" alt="image">
												            					</a>
												            				</div>
													            		</li>
													            	</ul>
													            </div><!-- /user-order-holder -->
												            <?php endforeach ?>


											          </div><!-- #block-simple-text-1 -->
										        </div>
									       </div>
								    </div>
							    </div>
						</div>
				  </div><!-- /statements -->
				  <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">
				  	
				  </div>
				  <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">...</div>


				  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="user-panel-holder">
					  		<h1>Write Review</h1>
					  		<div class="profile_holder">
					  			<form action="<?=BASEURL.'submit-review'?>" class="review-form" enctype="multipart/form-data">
						  			<div class="payment-holder">
						  				<div class="review-holder">
						  					<div class="column">
						  						<div class="r-1">
						  							<div class="img-holder">
						  								<img src="<?=IMG?>img23.jpg" alt="image">
						  							</div>
						  							<div class="r-text">
						  								<span class="purchase">Purchase on 11 Nov 202</span>
						  								<strong>Kids Toys pack Kids Toys pack  Kids Toys pack </strong>
						  								<em>Multi Toys pack Multi Toys pack</em>
						  							</div>
						  						</div>
						  						<input type="hidden" name="reload" value="yes">
						  						<input type="hidden" name="product_id">
						  						<input type="hidden" name="user_id" value="<?=$_SESSION['user']['customer_id']?>">
						  						<div class="r-2">
						  							<div class="review-box">
														<div class="rating-holder">
															<fieldset class="rating">
															    <input type="radio" id="star5" name="ratting" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																<input type="radio" id="star4half" name="ratting" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																<input type="radio" id="star4" name="ratting" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																<input type="radio" id="star3half" name="ratting" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																<input type="radio" id="star3" name="ratting" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
																<input type="radio" id="star2half" name="ratting" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																<input type="radio" id="star2" name="ratting" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																<input type="radio" id="star1half" name="ratting" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																<input type="radio" id="star1" name="ratting" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																<input type="radio" id="starhalf" name="ratting" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
															</fieldset>
														</div>
													</div>
						  						</div>
						  						<div class="r-3">
						  							<p>
						  								Please share your product experience Was the product as description? What is the quality like? What did you like or details about the product?
						  							</p>
						  							<textarea placeholder="Write Your Review" name="comment"></textarea>

						  							<div class="image-upload-container">
													      <div class="image-upload-one">
													        <div class="center">
													          <div class="form-input">
													            <label for="file-ip-1">
													              <img id="file-ip-1-preview" src="https://i.ibb.co/ZVFsg37/default.png">
													              <button type="button" class="imgRemove" onclick="myImgRemove(1)"></button>
													            </label>
													            <input type="file"  name="image_1_" data-input="image_1" id="file-ip-1" accept="image/*" onchange="showPreview(event, 1);">
													            <input type="hidden" name="image_1">
													          </div>
													          <small class="small">Use the &#8634; icon to reset the image</small>
													        </div>
													      </div>
													      <!-- ************************************************************************************************************ -->
													      <div class="image-upload-two">
													        <div class="center">
													          <div class="form-input">
													            <label for="file-ip-2">
													              <img id="file-ip-2-preview" src="https://i.ibb.co/ZVFsg37/default.png">
													              <button type="button" class="imgRemove" onclick="myImgRemove(2)"></button>
													            </label>
													            <input type="file" name="image_2_" data-input="image_2" id="file-ip-2" accept="image/*" onchange="showPreview(event, 2);">
													            <input type="hidden" name="image_2">
													          </div>
													          <small class="small">Use the &#8634; icon to reset the image</small>
													        </div>
													      </div>

													      <!-- ************************************************************************************************************ -->
													      <div class="image-upload-three">
													        <div class="center">
													          <div class="form-input">
													            <label for="file-ip-3">
													              <img id="file-ip-3-preview" src="https://i.ibb.co/ZVFsg37/default.png">
													              <button type="button" class="imgRemove" onclick="myImgRemove(3)"></button>
													            </label>
													            <input type="file" name="image_3_" data-input="image_3" id="file-ip-3" accept="image/*" onchange="showPreview(event, 3);">
													            <input type="hidden" name="image_3">
													          </div>
													          <small class="small">Use the &#8634; icon to reset the image</small>
													        </div>
													      </div>
													      <!-- *********************************************************************************************************** -->
													        <div class="image-upload-four">
													          <div class="center">
													            <div class="form-input">
													              <label for="file-ip-4">
													                <img id="file-ip-4-preview" src="https://i.ibb.co/ZVFsg37/default.png">
													                <button type="button" class="imgRemove" onclick="myImgRemove(4)"></button>
													              </label>
													              <input type="file" name="image_4_" id="file-ip-4" data-input="image_4" accept="image/*" onchange="showPreview(event, 4);">
													              <input type="hidden" name="image_4">
													            </div>
													            <small class="small">Use the &#8634; icon to reset the image</small>
													          </div>
													        </div>
													        <!-- ************************************************************************************************************ -->
													        <div class="image-upload-five">
													          <div class="center">
													            <div class="form-input">
													              <label for="file-ip-5">
													                <img id="file-ip-5-preview" src="https://i.ibb.co/ZVFsg37/default.png">
													                <button type="button" class="imgRemove" onclick="myImgRemove(5)"></button>
													              </label>
													              <input type="file" name="image_5_" data-input="image_5" id="file-ip-5" accept="image/*" onchange="showPreview(event, 5);">
													              <input type="hidden" name="image_5">
													            </div>
													            <small class="small">Use the &#8634; icon to reset the image</small>
													          </div>
													        </div>
													  
													        <!-- ************************************************************************************************************ -->
													        <div class="image-upload-six">
													          <div class="center">
													            <div class="form-input">
													              <label for="file-ip-6">
													                <img id="file-ip-6-preview" src="https://i.ibb.co/ZVFsg37/default.png">
													                <button type="button" class="imgRemove" onclick="myImgRemove(6)"></button>
													              </label>
													              <input type="file" name="image_6_" data-input="image_6" id="file-ip-6" accept="image/*" onchange="showPreview(event, 6);">
													              <input type="hidden" name="image_6">
													            </div>
													            <small class="small">Use the &#8634; icon to reset the image</small>
													          </div>
													        </div>

													      <!-- ************************************************************************************************************** -->

	    											</div>
	    
	    											<div class="upload-frame">
	    												<p id="uploadMsg"></p>
												      	<span>Upload</span>
												      	<p>Upto 6 images</p>
												      	<p>Maximum 5 MB</p>
												      	<p>Relevant Images which meet Community Guidelines Happy Reviewing!</p>
												    </div>
						  						</div>

						  						
						  					</div>
						  					<div class="column">
						  						<div class="r-3">
						  							<div class="rate-box">
						  								<img src="<?=IMG?>emoji-1.png" alt="image" class="left">
						  								<div class="radi-box">
						  									<input type="radio" id="Excellent" name="title" value="Excellent" />
															<label for="Excellent">Excellent</label>
						  								</div>
						  								<img src="<?=IMG?>emoji-4.png" alt="image" class="right">
						  							</div>
						  							<div class="rate-box">
						  								<img src="<?=IMG?>emoji-2.png" alt="image" class="left">
						  								<div class="radi-box">
						  									<input type="radio" id="Good" name="title" value="Good" />
															<label for="Good">Good</label>
						  								</div>
						  								<img src="<?=IMG?>emoji-4.png" alt="image" class="right">
						  							</div>
						  							<div class="rate-box">
						  								<img src="<?=IMG?>emoji-3.png" alt="image" class="left">
						  								<div class="radi-box">
						  									<input type="radio" id="Bad" name="title" value="Bad" />
															<label for="Bad">Bad</label>
						  								</div>
						  								<img src="<?=IMG?>emoji-4.png" alt="image" class="right">
						  							</div>
						  						</div>
						  						<textarea placeholder="How was your experience with the seller? Was the seller helpful or not? How satisfied were you with the product's packaging?" name="brand_review" style="font-size: 12px; padding: 10px;"></textarea>
						  						<div class="r-2">
						  							<span>Rate Your Rider</span>
						  							<div class="review-box">
														<div class="rating-holder">
															<fieldset class="rating">
															    <input type="radio" id="star5_2" name="rider_ratting" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
																<input type="radio" id="star4half_2" name="rider_ratting" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
																<input type="radio" id="star4_2" name="rider_ratting" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
																<input type="radio" id="star3half_2" name="rider_ratting" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
																<input type="radio" id="star3_2" name="rider_ratting" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
																<input type="radio" id="star2half_2" name="rider_ratting" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
																<input type="radio" id="star2_2" name="rider_ratting" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
																<input type="radio" id="star1half_2" name="rider_ratting" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
																<input type="radio" id="star1_2" name="rider_ratting" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
																<input type="radio" id="starhalf_2" name="rider_ratting" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
															</fieldset>
														</div>
													</div>
						  						</div>
						  						<textarea placeholder="How was your overall experience with our rider?" name="rider_comment"></textarea>
						  						<div class="switch-slider">
						  							<em>Review as Faizan S.</em>
							  						<label class="switch">
														<input type="checkbox">
														<span class="slider round"></span>
													</label>
													<em>Anonymous</em>
												</div>
						  					</div>
						  					<button type="submit">Submit Review</button>
						  				</div>
						  			</div><!-- /payment-holder -->
					  			</form>
					  		</div>
					  	</div>
					  </div><!-- write review -->

				  
				  <div class="tab-pane fade" id="vouchers" role="tabpanel" aria-labelledby="vouchers-tab">dsfgdsfhdghf</div><!--  Vouchers -->
				
				</div>
			</div>
			</div>
		</div>

		











<script>
var number = 1;
do {
	function showPreview(event, number){
		if(event.target.files.length > 0){
			let src = URL.createObjectURL(event.target.files[0]);
			let preview = document.getElementById("file-ip-"+number+"-preview");
			preview.src = src;
			preview.style.display = "block";
		} 
	}
	function myImgRemove(number) {
		document.getElementById("file-ip-"+number+"-preview").src = "https://i.ibb.co/ZVFsg37/default.png";
		document.getElementById("file-ip-"+number).value = null;
	}
	number++;
}
while (number < 7);
</script>