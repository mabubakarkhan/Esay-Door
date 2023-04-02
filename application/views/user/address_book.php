		<div class="tab-content" id="myTabContent">




			<div class="tab-pane fade show active" id="Products" role="tabpanel" aria-labelledby="Product-tab">
			  	<div class="user-panel-holder">
			  		<div class="top-heading">
			  			<h1>address book</h1>
			  			<!-- <div class="radio-holder">
			  				<div class="col-left">
								<input type="radio" id="test1" name="radio-group">
    							<label for="test1">Make default shipping address</label>
							</div>
							<div class="col-left">
								<input type="radio" id="test2" name="radio-group">
    							<label for="test2">Make default billing address</label>
							</div>
			  			</div> -->
			  		</div>
			  		<div class="profile_holder">
			  			<div class="table-holder">
			  				<table class="address-table user-address-book-table">
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
				  						<tr id="user-address-<?=$location['user_address_id']?>">
				  							<td><?=$location['receiver_name']?></td>
				  							<td><?=$location['house_no'].','.$location['socity']?></td>
				  							<td><?=$location['city']?></td>
				  							<td><?=$location['receiver_mobile']?></td>
				  							<td class="last">
				  								<?='<a href="javascript://" class="user-address-edit" data-id="'.$location['user_address_id'].'" data-name="'.$location['receiver_name'].'" data-title="'.$location['title'].'" data-pincode="'.$location['pincode'].'" data-mobile="'.$location['receiver_mobile'].'" data-country="'.$location['country_id'].'" data-state="'.$location['state_id'].'" data-city="'.$location['city_id'].'" data-city-name="'.$location['city'].'" data-socity="'.$location['socity_id'].'" data-socity-name="'.$location['socity'].'" data-house-no="'.$location['house_no'].'" data-email="'.$location['receiver_email'].'">'?>
				  									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
				  									edit
				  								</a>
				  							</td>
				  						</tr>
			  						<?php endforeach ?>
			  					</tbody>
			  				</table>
			  				<button class="address-table-btn btn-add-address">+ Add Neew Address</button>
			  			</div>
			  		</div>
			  		
			  	</div>
		  	</div><!-- products-tab -->




		</div><!-- /tab-content -->
	</div>
</div>



<div class="modal fade" id="modal-edit-address-btn">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">+ Edit Address</h4>
			</div>
			<div class="modal-body">
				

				<form id="edit-address-form">
					<input type="hidden" name="id">
					<div class="form-group">
						<label for="">Title *</label>
						<input class="form-control" type="text" name="title" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Name *</label>
						<input class="form-control" type="text" name="receiver_name" value="<?=$user['fname'].' '.$user['lname']?>" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Mobile *</label>
						<input class="form-control" type="text" name="receiver_mobile" value="<?=$user['phone']?>" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Email *</label>
						<input class="form-control" type="email" name="receiver_email" value="<?=$user['email']?>" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Countries *</label>
						<select class="form-control" name="country_id" required="required">
							<option value="">Select Country</option>
							<?php foreach ($countries as $key => $country): ?>
								<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
							<?php endforeach ?>
						</select>
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">State *</label>
						<select class="form-control" name="state_id" required="required">
							<option value="">Select State</option>
							<?php foreach ($states as $key => $state): ?>
								<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
							<?php endforeach ?>
						</select>
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">City *</label>
						<select class="form-control" name="city_id" required="required">
							<option value="">Select City</option>
							<?php foreach ($cities as $key => $city): ?>
								<option value="<?=$city['city_id']?>"><?=$city['name']?></option>
							<?php endforeach ?>
						</select>
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Pincode *</label>
						<input class="form-control" type="text" name="pincode" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Socity</label>
						<select class="form-control" name="socity_id">
							<option value="">Select Socity</option>
							<?php foreach ($socities as $key => $socity): ?>
								<option value="<?=$socity['socity_id']?>"><?=$socity['socity_name']?></option>
							<?php endforeach ?>
						</select>
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">House *</label>
						<input class="form-control" type="text" name="house_no" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Update</button>
					</div><!-- /form-group -->
				</form>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- /modal-edit-address-btn -->














