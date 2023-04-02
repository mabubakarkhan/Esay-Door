			<div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
			  	<div class="p-holder">
			  		<h1>Profile</h1>
			  		<div class="p-tabs">
			  			<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="General-tab" data-toggle="tab" href="#General" role="tab" aria-controls="General" aria-selected="true">General</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="Logo-tab" data-toggle="tab" href="#Logo" role="tab" aria-controls="Logo" aria-selected="false">Logo</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="Commissions-tab" data-toggle="tab" href="#Commissions" role="tab" aria-controls="Commissions" aria-selected="false">Commissions</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="BrandDetail-tab" data-toggle="tab" href="#BrandDetail" role="tab" aria-controls="BrandDetail" aria-selected="false">Brand Page</a>
						</li>
						<!-- <li class="nav-item">
						  	<a class="nav-link" id="Delivery-tab" data-toggle="tab" href="#Delivery" role="tab" aria-controls="Delivery" aria-selected="false">Delivery Options</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="Shipping-tab" data-toggle="tab" href="#Shipping" role="tab" aria-controls="Shipping" aria-selected="false">Shipping Provider</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="Invoice-tab" data-toggle="tab" href="#Invoice" role="tab" aria-controls="Invoice" aria-selected="false">Invoice Number</a>
						</li> -->
					</ul>
					<div class="tab-content" id="myTabContentt">
						<div class="tab-pane fade show active" id="General" role="tabpanel" aria-labelledby="General-tab">
							<div class="inner-tabs">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="nested-home-tab" data-toggle="tab" href="#nestedHome" role="tab" aria-controls="home" aria-selected="true">Seller Account</a>
									</li>
									<li class="nav-item">
									  	<a class="nav-link" id="nested-profile-tab" data-toggle="tab" href="#nestedProfile" role="tab" aria-controls="profile" aria-selected="false">  Business Information</a>
									</li>
									<li class="nav-item">
									  	<a class="nav-link" id="nested-contact-tab" data-toggle="tab" href="#nestedContact" role="tab" aria-controls="contact" aria-selected="false">Bank Account</a>
									</li>
									<li class="nav-item">
									  	<a class="nav-link" id="nested-Address-tab" data-toggle="tab" href="#nestedAddress" role="tab" aria-controls="Address" aria-selected="false">Warehouse Address</a>
									</li>
									<li class="nav-item">
									  	<a class="nav-link" id="nested-Return-tab" data-toggle="tab" href="#nestedReturn" role="tab" aria-controls="contact" aria-selected="false">Return Address</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade show active" id="nestedHome" role="tabpanel" aria-labelledby="home-tab">
										<form class="seller-account-form seller-account-form-1">
											<!-- <div class="seller-row">
												<label>ID Seller <em>*</em></label>
												<input type="text" disabled="disabled" placeholder="PK2BNUJYD1">
											</div> -->
											<div class="seller-row">
												<label>First Name <em>*</em></label>
												<input type="text" name="fname" value="<?=$user['fname']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Last Name <em>*</em></label>
												<input type="text" name="lname" value="<?=$user['lname']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Email <em>*</em></label>
												<input type="email" name="email" value="<?=$user['email']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Display Name / Shop Name <em>*</em></label>
												<input type="text" name="brand_name" value="<?=$user['brand_name']?>" required="required">
											</div>
											<div class="seller-row">
												<label>City <em>*</em></label>
												<input type="text" name="city" value="<?=$user['city']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Address <em>*</em></label>
												<input type="text" name="address" value="<?=$user['address']?>" required="required">
											</div>
											<div class="seller-row">
												<label>CNIC <em>*</em></label>
												<input type="text" name="cnic" value="<?=$user['cnic']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Name on CNIC <em>*</em></label>
												<input type="text" name="name_on_cnic" value="<?=$user['name_on_cnic']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Upload CNIC Front <em>*</em></label>
												<input type="file" id="cnic-front-Input-file">
												<a href="<?=UPLOADS.'seller/'.$user['cnic_front']?>" target="_blank"><img src="<?=UPLOADS.'seller/'.$user['cnic_front']?>" id="cnic-front-image-file" width="200"></a>
												<input type="hidden" name="cnic_front" value="<?=$user['cnic_front']?>">
											</div>
											<div class="seller-row">
												<label>Upload CNIC Back <em>*</em></label>
												<input type="file" id="cnic-back-Input-file">
												<a href="<?=UPLOADS.'seller/'.$user['cnic_back']?>" target="_blank"><img src="<?=UPLOADS.'seller/'.$user['cnic_back']?>" id="cnic-back-image-file" width="200"></a>
												<input type="hidden" name="cnic_back" value="<?=$user['cnic_back']?>">
											</div>
											<!-- <div class="seller-row">
												<label>Holiday Mode <em>*</em></label>
												<div class="radio-box">
													<input type="radio" id="yes" name="radio-group">
					    							<label for="yes">Yes</label>
					    						</div>
												<div class="radio-box">
													<input type="radio" id="no" name="radio-group">
					    							<label for="no">No</label>
					    						</div>
											</div>
											<div class="seller-row">
												<label>Holiday Mode Period <em>*</em></label>
												<div id="datetimepicker1" class="input-append date">
											      <input class="calander" data-format="dd/MM/yyyy hh:mm:ss" type="text" placeholder="Select Date Time">
											      <span class="add-on"><i data-time-icon="icon-time" data-date-icon="icon-calendar"></i></span>
											    </div>      
											</div> -->
											<div class="btn-holder">
												<button>Submit</button>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="nestedProfile" role="tabpanel" aria-labelledby="profile-tab">
										<form class="seller-account-form seller-account-form-2">
											<?php if ($business_detail): ?>
												<input type="hidden" name="form" value="update">
											<?php else: ?>
												<input type="hidden" name="form" value="insert">
											<?php endif ?>
											<div class="seller-row">
												<label>Legal Name / Business Owner <em>*</em></label>
												<input type="text" name="owner" value="<?=$business_detail['owner']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Address <em>*</em></label>
												<input type="text" name="address" value="<?=$business_detail['address']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Country / Region <em>*</em></label>
												<select name="country" required="required">
													<?php if ($business_detail): ?>
														<?php foreach ($countries as $key => $country): ?>
															<?php if ($business_detail['country'] == $country['country_id']): ?>
																<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
															<?php else: ?>
																<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<?php foreach ($countries as $key => $country): ?>
															<?php if ($country['country_id'] == 166): ?>
																<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
															<?php else: ?>
																<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>State <em>*</em></label>
												<select name="state" required="required">
													<?php if ($business_detail): ?>
														<?php foreach ($states as $key => $state): ?>
															<?php if ($business_detail['state'] == $state['state_id']): ?>
																<option value="<?=$state['state_id']?>" selected="selected"><?=$state['name']?></option>
															<?php else: ?>
																<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<option value="">Select</option>
														<?php foreach ($states as $key => $state): ?>
															<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
														<?php endforeach ?>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>City <em>*</em></label>
												<select name="city" required="required">
													<?php if ($business_detail): ?>
														<?php foreach ($cities as $key => $city): ?>
															<?php if ($business_detail['city'] == $city['city_id']): ?>
																<option value="<?=$city['city_id']?>" selected="selected"><?=$city['name']?></option>
															<?php else: ?>
																<option value="<?=$city['city_id']?>"><?=$city['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<option value="">Select State First</option>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>Person in Charge</label>
												<input type="text" name="person_in_charge" value="<?=$business_detail['person_in_charge']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Person in Charge Mobile</label>
												<input type="text" name="person_in_charge_mobile" value="<?=$business_detail['person_in_charge_mobile']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Person in Charge Email</label>
												<input type="text" name="person_in_charge_email" value="<?=$business_detail['person_in_charge_email']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Business Registration Number <em>*</em></label>
												<input type="text" name="registration_number" value="<?=$business_detail['registration_number']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Upload Business Document</label>
												<input type="file" id="business_document_file">
												<?php if (strlen($business_detail['file']) > 4): ?>
													<a href="<?=UPLOADS.'seller/'.$business_detail['file']?>" target="_blank">Document</a>
												<?php endif ?>
												<input type="hidden" name="file" value="<?=$business_detail['file']?>">
											</div>
											<div class="btn-holder">
												<button>Submit</button>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="nestedContact" role="tabpanel" aria-labelledby="contact-tab">
										<form class="seller-account-form seller-account-form seller-account-form-3">
											<div class="seller-row">
												<label>Account Title <em>*</em></label>
												<input type="text" name="bank_title" value="<?=$user['bank_title']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Bank IBAN <em>*</em></label>
												<input type="text" name="bank_iban" value="<?=$user['bank_iban']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Bank Name <em>*</em></label>
												<input type="text" name="bank_name" value="<?=$user['bank_name']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Branch Code <em>*</em></label>
												<input type="tel" name="branch_code" value="<?=$user['branch_code']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Upload Cheque Copy <em>*</em></label>
												<input type="file" id="Cheque-Input-file">
												<a href="<?=UPLOADS.'seller/'.$user['cheque_image']?>" target="_blank"><img src="<?=UPLOADS.'seller/'.$user['cheque_image']?>" id="Cheque-image-file" width="200"></a>
												<input type="hidden" name="cheque_image" value="<?=$user['cheque_image']?>">
											</div>
											<div class="btn-holder">
												<button>Submit</button>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="nestedAddress" role="tabpanel" aria-labelledby="Address-tab">
										<form class="seller-account-form seller-account-form-4">
											<?php if ($warehouse): ?>
												<input type="hidden" name="form" value="update">
											<?php else: ?>
												<input type="hidden" name="form" value="insert">
											<?php endif ?>
											<div class="seller-row">
												<label>First and Last Name <em>*</em></label>
												<input type="text" name="name" value="<?=$warehouse['name']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Address <em>*</em></label>
												<input type="text" name="address" value="<?=$warehouse['address']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Mobile Number <em>*</em></label>
												<input type="text" name="mobile" value="<?=$warehouse['mobile']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Email <em>*</em></label>
												<input type="email" name="email" value="<?=$warehouse['email']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Country / Region <em>*</em></label>
												<select name="country" required="required">
													<?php if ($warehouse): ?>
														<?php foreach ($countries as $key => $country): ?>
															<?php if ($warehouse['country'] == $country['country_id']): ?>
																<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
															<?php else: ?>
																<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<?php foreach ($countries as $key => $country): ?>
															<?php if ($country['country_id'] == 166): ?>
																<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
															<?php else: ?>
																<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>State <em>*</em></label>
												<select name="state" required="required">
													<?php if ($warehouse): ?>
														<?php foreach ($states2 as $key => $state): ?>
															<?php if ($warehouse['state'] == $state['state_id']): ?>
																<option value="<?=$state['state_id']?>" selected="selected"><?=$state['name']?></option>
															<?php else: ?>
																<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<option value="">Select</option>
														<?php foreach ($states2 as $key => $state): ?>
															<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
														<?php endforeach ?>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>City <em>*</em></label>
												<select name="city" required="required">
													<?php if ($warehouse): ?>
														<?php foreach ($cities2 as $key => $city): ?>
															<?php if ($warehouse['city'] == $city['city_id']): ?>
																<option value="<?=$city['city_id']?>" selected="selected"><?=$city['name']?></option>
															<?php else: ?>
																<option value="<?=$city['city_id']?>"><?=$city['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<option value="">Select State First</option>
													<?php endif ?>
												</select>
											</div>
											<div class="btn-holder">
												<button>Submit</button>
											</div>
										</form>
									</div>
									<div class="tab-pane fade" id="nestedReturn" role="tabpanel" aria-labelledby="Return-tab">
										<form class="seller-account-form seller-account-form-5">
											<?php if ($return_address): ?>
												<input type="hidden" name="form" value="update">
											<?php else: ?>
												<input type="hidden" name="form" value="insert">
											<?php endif ?>
											<div class="seller-row">
												<label>Holiday Mode <em>*</em></label>
												<div class="radio-box">
													<?php if ($return_address['holiday_mode'] == 'yes'): ?>
														<input type="radio" id="yes" value="yes" name="holiday_mode" checked="checked">
													<?php else: ?>
														<input type="radio" id="yes" value="yes" name="holiday_mode">
													<?php endif ?>
					    							<label for="yes">Yes</label>
					    						</div>
												<div class="radio-box">
													<?php if ($return_address['holiday_mode'] == 'no'): ?>
														<input type="radio" id="no" value="no" name="holiday_mode" checked="checked">
													<?php else: ?>
														<input type="radio" id="no" value="no" name="holiday_mode">
													<?php endif ?>
					    							<label for="no">No</label>
					    						</div>
											</div>
											<div class="seller-row">
												<label>First and Last Name <em>*</em></label>
												<input type="text" name="name" value="<?=$return_address['name']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Address <em>*</em></label>
												<input type="text" name="address" value="<?=$return_address['address']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Mobile Number <em>*</em></label>
												<input type="text" name="mobile" value="<?=$return_address['mobile']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Email <em>*</em></label>
												<input type="email" name="email" value="<?=$return_address['email']?>" required="required">
											</div>
											<div class="seller-row">
												<label>Country / Region <em>*</em></label>
												<select name="country" required="required">
													<?php if ($return_address): ?>
														<?php foreach ($countries as $key => $country): ?>
															<?php if ($return_address['country'] == $country['country_id']): ?>
																<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
															<?php else: ?>
																<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<?php foreach ($countries as $key => $country): ?>
															<?php if ($country['country_id'] == 166): ?>
																<option value="<?=$country['country_id']?>" selected="selected"><?=$country['name']?></option>
															<?php else: ?>
																<option value="<?=$country['country_id']?>"><?=$country['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>State <em>*</em></label>
												<select name="state" required="required">
													<?php if ($return_address): ?>
														<?php foreach ($states3 as $key => $state): ?>
															<?php if ($return_address['state'] == $state['state_id']): ?>
																<option value="<?=$state['state_id']?>" selected="selected"><?=$state['name']?></option>
															<?php else: ?>
																<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<option value="">Select</option>
														<?php foreach ($states3 as $key => $state): ?>
															<option value="<?=$state['state_id']?>"><?=$state['name']?></option>
														<?php endforeach ?>
													<?php endif ?>
												</select>
											</div>
											<div class="seller-row">
												<label>City <em>*</em></label>
												<select name="city" required="required">
													<?php if ($return_address): ?>
														<?php foreach ($cities3 as $key => $city): ?>
															<?php if ($return_address['city'] == $city['city_id']): ?>
																<option value="<?=$city['city_id']?>" selected="selected"><?=$city['name']?></option>
															<?php else: ?>
																<option value="<?=$city['city_id']?>"><?=$city['name']?></option>
															<?php endif ?>
														<?php endforeach ?>
													<?php else: ?>
														<option value="">Select State First</option>
													<?php endif ?>
												</select>
											</div>
											<div class="btn-holder">
												<button>Submit</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="Logo" role="tabpanel" aria-labelledby="Logo-tab">

							<div class="logo-content">
								<?php if ($brand): ?>

									<input type='file' id="brand-logo-change-input"/>
									<div class="blah-holder">
										<span>Current Logo</span>
										<img id="brand-logo-change" src="<?=UPLOADS_CAT.$brand['image']?>" alt="<?=$brand['title']?>" />
									</div>
									<hr>
									<input type='file' id="brand-banner-change-input"/>
									<div class="blah-holder">
										<span>Current Banner (will display in case you do not have any slider image)</span>
										<img id="brand-banner-change" src="<?=UPLOADS_CAT.$brand['banner']?>" alt="<?=$brand['title']?>" />
									</div>

								<?php endif ?>
							</div>

						</div>
						<div class="tab-pane fade" id="Commissions" role="tabpanel" aria-labelledby="Commissions-tab">
							<table class="delivery-table">
								<th>Type</th>
								<th>Commissions</th>
								<tbody>
									<tr>
										<td>Easy door will cut commissions on every single order automatically</td>
										<td><?=$user['profit_percentage']?>%</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="BrandDetail" role="tabpanel" aria-labelledby="Delivery-tab">
							<?php if ($brand): ?>

								<form class="save-brand-about">
									<div class="form-group">
										<label for="">About</label>
										<textarea name="about" class="form-control" rows="5" required><?=$brand['about']?></textarea><br>
										<button type="submit" class="btn btn-success">Update</button>
									</div>	
								</form>

								<input type='file' id="brand-ad-1-change-input"/>
								<div class="blah-holder">
									<span>Brand Page Ad One</span>
									<img id="brand-ad-1-change" src="<?=UPLOADS_CAT.$brand['ad_1']?>" alt="<?=$brand['title']?>" />
								</div>
								<hr>
								<input type='file' id="brand-ad-2-change-input"/>
								<div class="blah-holder">
									<span>Brand Page Ad One</span>
									<img id="brand-ad-2-change" src="<?=UPLOADS_CAT.$brand['ad_2']?>" alt="<?=$brand['title']?>" />
								</div>

								<h1>Slider</h1>
								<hr>
								<input type='file' id="brand-slide-1-change-input"/>
								<div class="blah-holder">
									<span>Slide 1</span>
									<img id="brand-slide-1-change" src="<?=UPLOADS_CAT.$brand['slide_1']?>" alt="<?=$brand['title']?>" />
								</div>

								<hr>
								<input type='file' id="brand-slide-2-change-input"/>
								<div class="blah-holder">
									<span>Slide 2</span>
									<img id="brand-slide-2-change" src="<?=UPLOADS_CAT.$brand['slide_2']?>" alt="<?=$brand['title']?>" />
								</div>

								<hr>
								<input type='file' id="brand-slide-3-change-input"/>
								<div class="blah-holder">
									<span>Slide 3</span>
									<img id="brand-slide-3-change" src="<?=UPLOADS_CAT.$brand['slide_3']?>" alt="<?=$brand['title']?>" />
								</div>

							<?php endif ?>
						</div><!-- #BrandDetail -->
						<div class="tab-pane fade" id="Delivery" role="tabpanel" aria-labelledby="Delivery-tab">
							<table class="delivery-table">
								<th>type</th>
								<th>Avaliable</th>
								<tbody>
									<tr>
										<td>Economy</td>
										<td><i class="fa fa-times" aria-hidden="true"></i></td>
									</tr>
									<tr>
										<td>Standard</td>
										<td><i class="fa fa-times" aria-hidden="true"></i></td>
									</tr>
									<tr>
										<td>Express</td>
										<td><i class="fa fa-times" aria-hidden="true"></i></td>
									</tr>
								</tbody>
							</table>
						</div><!-- #Delivery -->
						<div class="tab-pane fade" id="Shipping" role="tabpanel" aria-labelledby="Shipping-tab">
							<table class="shipping-table">
								<th>Warehouse ID</th>
								<th>Shipping Provider</th>
								<th>Package Profile</th>
								<th>Type</th>
								<th>Drop-Off Point Locator</th>
								<tbody>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane fade" id="Invoice" role="tabpanel" aria-labelledby="Invoice-tab">
							<div class="invoice-holder">
								<label>Generation Type</label>
								<select>
									<option>Provide Number Manually</option>
									<option>Use Autoincrement Number</option>
									<option>Use Order Number</option>
								</select>
							</div>
							<div class="btn-holder">
								<button>save</button>
							</div>
						</div>
					</div>
			  		</div>
			  	</div>
			  </div><!-- /tab-pane -->