		<div class="tab-content" id="myTabContent">

			<div class="tab-pane fade show active" id="statements" role="tabpanel" aria-labelledby="campaign-tab">
			  	
				<div class="account-statement">
				  	
					<div class="cs-holder">
						<h1>Add Card Detail</h1>
						<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
							<p class="alert alert-danger"><?=$_GET['msg']?></p>
						<?php endif ?>
						<div class="card-detail-box">
							<div class="form_holder">
								<div class="img-holder">
									<img src="<?=IMG?>img178.png" alt="image">
								</div>
								<form action="<?=$post_url?>" method="post">
									<?php if ($mode == 'edit'): ?>
										<input type="hidden" name="id" value="<?=$q['card_id']?>">
									<?php endif ?>
									<div class="card-row">
										<label>Card Number</label>
										<input type="text" name="number" required="required" value="<?=$q['number']?>" placeholder="Card Number">
									</div>
									<div class="card-row">
										<label>Full Name</label>
										<input type="text" name="name" required="required" value="<?=$q['name']?>" placeholder="Full Name">
									</div>
									<div class="card-row">
										<label>Expiry Month</label>
										<input type="number" name="month" required="required" value="<?=$q['month']?>" placeholder="Expiry Month">
									</div>
									<div class="card-row">
										<label>Expiry Year</label>
										<input type="number" name="year" required="required" value="<?=$q['year']?>" placeholder="Expiry Year">
									</div>
									<div class="card-row">
										<label>CVC</label>
										<input type="text" name="cvc" required="required" value="<?=$q['cvc']?>" placeholder="CVC">
									</div>
									<div class="card-row">
										<label>Company</label>
										<input type="text" name="company" required="required" value="<?=$q['company']?>" placeholder="Company">
									</div>
									<div class="card-row">
										<label>Status</label>
										<select name="status" required="required">
											<?php if ($q['status'] == 'inactive'): ?>
												<option value="active">Active</option>
												<option value="inactive" selected="selected">Inactive</option>
											<?php else: ?>
												<option value="active" selected="selected">Active</option>
												<option value="inactive">Inactive</option>
											<?php endif ?>
										</select>
									</div>
									<div class="card-btn">
										<?php if ($mode == 'edit'): ?>
											<button class="submit" type="submit">Update</button>
										<?php else: ?>
											<button class="submit" type="submit">Submit</button>
										<?php endif ?>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

			</div> <!--  my orders -->

		</div><!-- /tab-content -->
	</div>
</div>
