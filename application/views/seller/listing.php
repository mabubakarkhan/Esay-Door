<div class="tab-pane fade show active" id="Products" role="tabpanel" aria-labelledby="Product-tab">
  	<div class="user-panel-holder">
  		<div class="top-heading">
  			<h1>Volume Listing</h1>
  		</div><!-- /top-heading -->
  		<div class="profile_holder">
  			<div class="table-holder">
  				<table class="address-table volume-table">
  					<thead>
  						<th>No.</th>
  						<th>Volume Name</th>
  						<th>No of Products</th>
  						<th>View</th>
  						<th>Date</th>
  						<th>Action</th>
  					</thead>
  					<tbody>
  						<?php if ($listing): ?>
  							<?php foreach ($listing as $key => $q): ?>
		  						<tr>
		  							<td><?=$q['seller_listing_id']?></td>
		  							<td><?=$q['title']?></td>
		  							<td><?=$q['count']?></td>
		  							<td><a href="<?=BASEURL.'seller/listing-products/'.$q['seller_listing_id'].'/'?>" class="edit"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
		  							<td><?=date('d-m-Y',strtotime($q['date']))?></td>
		  							<td class="last">
		  								<a href="<?=BASEURL.'seller/edit-list/'.$q['seller_listing_id'].'/'?>" class="edit"> Edit<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		  								<a href="javascript://" class="delete delete-list" data-id="<?=$q['seller_listing_id']?>">Delete<i class="fa fa-trash" aria-hidden="true"></i></a>
		  							</td>
		  						</tr>
  							<?php endforeach ?>
  						<?php else: ?>
  							<tr>
  								<td colspan="5">No listing found, <a href="<?=BASEURL.'seller/add-list'?>">add your first listing ?</a></td>
  							</tr>
  						<?php endif ?>
  					</tbody>
  				</table>
  			</div><!-- /table-holder -->
  		</div><!-- /profile_holder -->
  	</div><!-- /user-panel-holder -->
</div><!-- tab-pane -->