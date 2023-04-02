		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active" id="voucher-campaign" role="tabpanel" aria-labelledby="campaign-tab">
			  	
				<h1>Voucher</h1>

				<div class="v-box">
			  		<strong>Your Orders</strong>
				  	<div class="table-holder">
						<table class="platform-table">
							<thead>
								<th>Order #</th>
								<th>Placed On</th>
								<th>Items</th>
								<th>Voucher</th>
								<th>Total</th>
								<th>Discount</th>
								<th>Sub Total</th>
								<th>Status</th>
							</thead>
							<tbody>
								<?php if ($orders): ?>
									<?php foreach ($orders as $key => $q): ?>
										<tr>
											<td><?=$q['sale_id']?></td>
											<td><?=date('d-m-Y H:i',strtotime($q['at']))?></td>
											<td><?=$q['total_items']?></td>
											<td><?=$q['discount_code']?></td>
											<td><?=$q['total_amount']?></td>
											<td><?=$q['discount']?></td>
											<td><?=$q['total_amount']-$q['discount']?></td>
											<td><?=$q['tracking_status']?></td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="5">No order found</td>
									</tr>
								<?php endif ?>
							</tbody>
						</table>
					</div>
				</div><!-- /v-box -->

			</div> <!--  my orders -->

		</div><!-- /tab-content -->
	</div>
</div>
