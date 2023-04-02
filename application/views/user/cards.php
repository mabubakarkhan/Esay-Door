		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active" id="voucher-campaign" role="tabpanel" aria-labelledby="campaign-tab">
			  	
				<div class="pay-box">
					<h1>My Payment Options</h1>
					<a href="<?=BASEURL.'user/add-card'?>">+ Add Cart</a>
				</div>

				<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
					<p class="alert alert-danger"><?=$_GET['msg']?></p>
				<?php endif ?>
				<?php if (isset($_GET['error']) && $_GET['error'] == '0'): ?>
					<p class="alert alert-success"><?=$_GET['msg']?></p>
				<?php endif ?>

				<div class="v-box">
			  		<strong>Your Cards</strong>
				  	<div class="table-holder">
						<table class="platform-table">
							<thead>
								<th>Company</th>
								<th>Holder</th>
								<th>Expiry</th>
								<th>Stand</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							<tbody>
								<?php if ($cards): ?>
									<?php foreach ($cards as $key => $q): ?>
										<tr>
											<td><?=$q['company']?></td>
											<td><?=$q['name']?></td>
											<td><?=$q['month'].'/'.$q['year']?></td>
											<td>
												<div class="switch-holder">
													<div class="left-switch">
														<label class="switch">
															<?php if ($q['type'] == 'primary'): ?>
														  		<input type="checkbox" class="primary-card-click" data-id="<?=$q['card_id']?>" checked>
															<?php else: ?>
														  		<input type="checkbox" class="primary-card-click" data-id="<?=$q['card_id']?>">
															<?php endif ?>
														  <span class="slider round"></span>
														</label>
														<p>Primary Card</p>
													</div>
													<div class="left-switch">
														<label class="switch">
															<?php if ($q['type'] == 'secondary'): ?>
														  		<input type="checkbox" class="secondary-card-click" data-id="<?=$q['card_id']?>" checked>
															<?php else: ?>
														  		<input type="checkbox" class="secondary-card-click" data-id="<?=$q['card_id']?>">
															<?php endif ?>
														  <span class="slider round"></span>
														</label>
														<p>Secondary Card</p>
													</div>
												</div>
											</td>
											<td><?=$q['status']?></td>
											<td>
												<a href="<?=BASEURL.'user/edit-card/'.$q['card_id'].'/'?>"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 20px;"></i></a>
											</td>
										</tr>
									<?php endforeach ?>
								<?php else: ?>
									<tr>
										<td colspan="5">No Card Found, <a href="<?=BASEURL.'user/add-card'?>">+ Add First Card</a></td>
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
