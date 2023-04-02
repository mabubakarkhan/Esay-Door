



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
			  						<a class="edit-btn" href="<?=BASEURL.'user/my-profile'?>">Edit Profile <i class="fa fa-pencil" aria-hidden="true"></i></a>
			  					</li>
			  				</ul>
			  			</div>
			  			<div class="column">
			  				<h2>Address Book</h2>
			  				<ul class="user-list">
			  					<?php if ($last_address): ?>
				  					<li>Last Shipping Address</li>
				  					<li><?=$last_address['house_no']?></li>
				  					<li class="user-phone"><?=$last_address['receiver_mobile']?></li>
			  					<?php else: ?>
			  						<li>Default Shipping Address</li>
				  					<li><?=$user['house_no']?></li>
				  					<li class="user-phone"><?=$user['phone']?></li>
			  					<?php endif ?>
			  					<li><a class="edit-btn" href="<?=BASEURL.'user/address-book'?>">Address Book</a></li>
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
			  				<?php if ($user['newsletter'] == 'no'): ?>
				  				<a class="edit-btn newsletter-btn" data-toggle="modal" href='#modal-newsletter'>Subscribe</a>
				  				<a class="edit-btn after-newsletter-btn" href='javascript://' style="display: none;">Subscribed</a>
			  				<?php else: ?>
				  				<a class="edit-btn after-newsletter-btn" href='javascript://'>Subscribed</a>
			  				<?php endif ?>
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
			  								<?php if ($key == 20): ?>
			  									<?php break; ?>
			  								<?php endif ?>
					  						<tr>
					  							<td><?=$order['sale_id']?></td>
					  							<td><?=date('d-m-Y',strtotime($order['at']))?></td>
					  							<td>
					  								<ul class="item-list">
					  									<?php
					  									$SaleID = $order['sale_id'];
			                							$items = $this->db->query("
			                								SELECT p.product_image AS image, p.category_id 
			                								FROM `sale_items` AS si 
			                								INNER JOIN `products` AS p ON si.product_id = p.product_id 
			                								WHERE si.sale_id = '$SaleID' 
			            								");
			            								if ($items->num_rows()>0){
			        										foreach ($items->result_array() as $item) {
					  											echo '<li><img src="'.UPLOADS_PRO.$item['category_id'].'/'.$item['image'].'"></li>';
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



		</div><!-- /tab-content -->
	</div>
</div>



<div class="modal fade" id="modal-newsletter">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<form id="newsletter-email-form">
					<div class="form-group">
						<label for="">Enter You Email</label>
						<input type="email" name="email" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Submit</button>
					</div><!-- /form-group -->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- /modal-newsletter -->