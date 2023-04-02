	<section class="checkout-holder">
		<div class="container">
			<div class="left-checkout">
				<div class="heading-section">
					<div class="head-sec">
						<span>1</span>
						<h2>Delivery information</h2>
						<i class="fa fa-angle-down" aria-hidden="true"></i>
					</div>
					<button><i class="fa fa-pencil-square-o change-address" id="checkout-form-1-show" aria-hidden="true"></i></button>
				</div>
				<form class="checkout-form checkout-form-1" action="#">
					<?php
					if ($delivery_information) {
						$ReadOnly = 'readonly="readonly"';
						$Style = 'style="border-top:none;border-left:none;border-right:none;"';
					}
					else{
						$ReadOnly = '';
						$Style = '';
					}
					?>
					<input type="hidden" name="coupon">
					<div class="form-row">
						<div class="col-left">
							<label>Full Name *</label>
							<input type="text" name="receiver_name" value="<?=$delivery_information['receiver_name']?>" required="required" <?=$ReadOnly?> <?=$Style?>>
						</div>
						<div class="col-right">
							<label>post code *</label>
							<input type="text" name="pincode" value="<?=$delivery_information['pincode']?>" <?=$ReadOnly?> <?=$Style?> required="required">
						</div>
					</div>
					<div class="form-row">
						<div class="col-left">
							<label>Number *</label>
							<input type="text" name="receiver_mobile" value="<?=$delivery_information['receiver_mobile']?>" required="required" <?=$ReadOnly?> <?=$Style?>>
						</div>
						<div class="col-right">
							<label>City *</label>
							<?php if (!($delivery_information)): ?>
								<select name="city_id" required="required">
									<option value="">Select City</option>
									<?php foreach ($cities as $key => $city): ?>
										<?php if ($city['city_id'] == $delivery_information['city_id']): ?>
											<?php $City = $city['name']; ?>
											<option value="<?=$city['city_id']?>" selected="selected"><?=$city['name']?></option>
										<?php else: ?>
											<option value="<?=$city['city_id']?>"><?=$city['name']?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
							<?php else: ?>
								<?php foreach ($cities as $key => $city): ?>
									<?php if ($city['city_id'] == $delivery_information['city_id'	]): ?>
										<?php $City = $city['name']; ?>
										<?php $CityID = $city['city_id']; ?>
									<?php endif ?>
								<?php endforeach ?>
								<input type="text" class="check-out-form-city-input" value="<?=$City?>" required="required" readonly="readonly" <?=$Style?>>
								<input type="hidden" name="city_id" value="<?=$CityID?>">
							<?php endif ?>
						</div>
					</div>
					<div class="form-row">
						<!-- <div class="col-left">
							<label>Area *</label>
							<?php if (!($delivery_information)): ?>
								<select name="socity_id" required="required">
									<option value="">Select Area</option>
									<?php foreach ($socities as $key => $socity): ?>
										<?php if ($socity['socity_id'] == $delivery_information['socity_id']): ?>
											<?php $Socity = $socity['socity_name']; ?>
											<option value="<?=$socity['socity_id']?>" selected="selected"><?=$socity['socity_name']?></option>
										<?php else: ?>
											<option value="<?=$socity['socity_id']?>"><?=$socity['socity_name']?></option>
										<?php endif ?>
									<?php endforeach ?>
								</select>
							<?php else: ?>
								<?php foreach ($socities as $key => $socity): ?>
									<?php if ($socity['socity_id'] == $delivery_information['socity_id']): ?>
										<?php $Socity = $socity['socity_name']; ?>
										<?php $SocityID = $socity['socity_id']; ?>
									<?php endif ?>
								<?php endforeach ?>
								<input type="text" class="check-out-form-socity-input" value="<?=$Socity?>" required="required" readonly="readonly" <?=$Style?>>
								<input type="hidden" name="socity_id" value="<?=$SocityID?>">
							<?php endif ?>
						</div> -->
						<div class="col-right">
							<label>address *</label>
							<input type="text" name="house_no" value="<?=$delivery_information['house_no']?>" required="required" <?=$ReadOnly?> <?=$Style?>>
						</div>
						<div class="col-left">
							<label>email *</label>
							<input type="email" name="receiver_email" value="<?=$delivery_information['receiver_email']?>" <?=$ReadOnly?> <?=$Style?> required="required">
						</div>
						<a href="javascript://" class="change-address">Change Address</a>
					</div>
					<button>Save & Continue</button>
				</form>

				<form class="checkout-form checkout-form-1-done" action="#" style="display: none;">
					<input type="text" class="checkout-readonly-inputs checkout_form_receiver_name" value="<?=$delivery_information['receiver_name']?>" readonly="readonly" style="border:none;">
					<input type="text" class="checkout-readonly-inputs checkout_form_pincode" value="<?=$delivery_information['pincode']?>" readonly="readonly" style="border:none;">
					<input type="text" class="checkout-readonly-inputs checkout_form_receiver_mobile" value="<?=$delivery_information['receiver_mobile']?>" readonly="readonly" style="border:none;">
					<input type="text" class="checkout-readonly-inputs checkout_form_city_id" value="<?=$City?>" readonly="readonly" style="border:none;">
					<input type="text" class="checkout-readonly-inputs checkout_form_house_no" value="<?=$delivery_information['house_no']?>" readonly="readonly" style="border:none;">
					<input type="text" class="checkout-readonly-inputs checkout_form_receiver_email" value="<?=$delivery_information['receiver_email']?>"  readonly="readonly" style="border:none;">
					<!-- <input type="text" class="checkout_form_socity_id" value="<?=$Socity?>" readonly="readonly" style="border:none;"> -->
				</form>



				<!-- CART PRODUCTS -->
				<div class="cart-products-block">
					<?php $cart_total = 0 ?>
					<?php foreach ($checkout_products as $key => $cart): ?>
						<?php $cart_total = $cart_total + $cart['cart']['total'] ?>
						<div class="box">
							<!-- <span class="heading">Pakage 1 of 2</span> -->
							<div class="box-detail">
								<!-- <span class="delivery-option">delivery option</span>
								<i class="fa fa-check-circle" aria-hidden="true"></i>
								<span class="price">Rs: 35</span>
								<span class="standard">Standard</span>
								<span class="get-by">Get by 1-3 Aug</span> -->
							</div>
							<div class="item-detail">
								<div class="left-box">
									<img src="<?=UPLOADS_PRO.$cart['product']['category_id'].'/'.$cart['product']['product_image']?>" alt="<?=$cart['product']['product_name']?>">
									<div class="text-box">
										<em>Side By Side</em>
										<span class="detail-heading"><?=$cart['product']['product_name']?></span>
										<em>Seller: <?=$cart['product']['Brand']?></em>
									</div>
								</div>
								<div class="price-box">
									<?php if ($cart['product']['sale_percentage'] > 0): ?>
										<span class="new">Rs: <?=$cart['cart']['price']?></span>
										<span class="old">Rs: <?=$cart['cart']['price']+$cart['product']['discount']?></span>
										<span class="discount">-<?=intval($cart['product']['sale_percentage'])?>%</span>
									<?php else: ?>
										<span class="new">Rs: <?=$cart['cart']['price']?></span>
									<?php endif ?>
								</div>
								<?php if (1==2): ?>
									<div class="qty-box">
										<span class="qty">Qty: <?=$cart['cart']['qty']?></span>
									</div>
								<?php endif ?>
								<div class="quantity-block">
									<div class="q-box">
										<button class="quantity-arrow-minus quantity-arrow-minus-2"> - </button>
										<input class="quantity-num qty-input-2" data-id="<?=$key?>" type="number" value="<?=$cart['cart']['qty']?>" />
										<button class="quantity-arrow-plus quantity-arrow-plus-2"> + </button>
									</div>
								</div>
							</div>
							<div class="bottom-bar">
								<span class="shipment">Shipped by: Reasonable Store</span>
								<a href="javascript://" class="delete-cart-btn" data-key="<?=$key?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</div>
						</div><!-- /box -->
					<?php endforeach ?>
				</div><!-- /cart-products-block -->
				<!-- CART PRODUCTS END -->


				<div class="heading-section" id="checkout-form-2">
					<div class="head-sec">
						<span>2</span>
						<h2>Payment</h2>
						<i class="fa fa-angle-down" aria-hidden="true"></i>
					</div>
					<!-- <a href="#" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a> -->
					<button><i class="fa fa-pencil-square-o" id="checkout-form-2-show" aria-hidden="true"></i></button>
				</div><!-- /heading-section -->
				<?php if ($cards): ?>
					<select id="change-customer-card-select">
						<option value="">Select Card</option>
						<?php foreach ($cards as $key => $card_): ?>
							<?php if ($card_['type'] != 'none'): ?>
								<option value="<?=$card_['card_id']?>"><?=$card_['name'].'('.$card_['company'].') - '.$card_['type']?></option>
							<?php else: ?>
								<option value="<?=$card_['card_id']?>"><?=$card_['name'].'('.$card_['company'].')'?></option>
							<?php endif ?>
						<?php endforeach ?>
					</select>
				<?php endif ?>
				
				
				<form class="checkout-form checkout-form-2 require-validation" action="#"
					data-cc-on-file="false"
					data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
					id="payment-form">
					<input type="hidden" id="stripe_token" name='stripeToken'>
					<input type="hidden" id="check_out_form_2_check" value="0">
					<div class="form-row">
						<div class="col-left">
							<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
								<input type="radio" id="test1" name="payment_method" value="card" checked="checked">
							<?php else: ?>
								<input type="radio" id="test1" name="payment_method" value="card"   onclick="show2();">
							<?php endif ?>
							<label for="test1">Credit /Debit Card</label>
						</div>
						<div class="col-right">
							<ul class="cash-list">
								<li>
									<a href="#">
										<img src="<?=IMG?>img58.png" alt="image">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?=IMG?>img38.png" alt="image">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?=IMG?>img39.png" alt="image">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?=IMG?>img40.png" alt="image">
									</a>
								</li>
							</ul>
						</div>
					</div>
					
					<div class="hide" id="div1" style="display: none;">
					    <div class="form-row">
						<label>Name</label>
						<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
							<input type="text" name="card_name" value="<?=$last_card['card_name']?>" style="display: none;">
							<input type="text" class="checkout_form_card_name_to_hide" value="<?=$last_card['card_name']?>" readonly="readonly" style="border-top:none;border-left:none;border-right:none;">
						<?php else: ?>
							<input type="text" name="card_name" value="">
						<?php endif ?>
					</div>
    					<div class="form-row">
    						<div class="col-left">
    							<label>Enter your card number</label>
    							<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    								<input type="text" name="card_number" autocomplete='off' class="card-number" value="<?=$last_card['card_number']?>" style="display: none;">
    								<input type="text" class="checkout_form_card_number_to_hide" value="<?='xxxxxxxxxxxx'.$last_card['card_number'][12].$last_card['card_number'][13].$last_card['card_number'][14].$last_card['card_number'][15]?>" readonly="readonly" style="border-top:none;border-left:none;border-right:none;">
    							<?php else: ?>
    								<!-- <input type="text" name="card_number" autocomplete='off' class="card-number" value="4242424242424242"> -->
    								<input type="text" name="card_number" autocomplete='off' class="card-number" value="">
    							<?php endif ?>
    						</div>
    						<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    							<?php $CVC_display = 'none'; ?>
    							<?php $CVC_value = $last_card['card_cvc']; ?>
    						<?php else: ?>
    							<?php $CVC_display = 'block'; ?>
    							<?php $CVC_value = ''; ?>
    							<?php //$CVC_value = '123'; ?>
    						<?php endif ?>
    						<div class="col-right cvc_input_block" style="display: <?=$CVC_display?>">
    							<label>CVC</label>
    							<input autocomplete='off' name="card_cvc" class='form-control card-cvc' value="<?=$CVC_value?>" size='4' type='text'>
    						</div>
    						<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    							<div class="col-right checkout_form_expiry_block_to_hide">
    								<label>Expiry</label>
    								<input autocomplete='off' class='form-control' value="<?=$last_card['card_expiry_month'].'/'.$last_card['card_expiry_year']?>" size='4' readonly="readonly" style="border-top:none;border-left:none;border-right:none;">
    							</div>
    						<?php endif ?>
    					</div>
    					<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    						<?php $EX_display = 'none'; ?>
    					<?php else: ?>
    						<?php $EX_display = 'block'; ?>
    					<?php endif ?>
    					<div class="form-row checkout_form_expiry_block_to_show" style="display: <?=$EX_display?>">
    						<div class="col-left">
    							<label>Expiry Month</label>
    							<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    								<input class='form-control card-expiry-month' name="card_expiry_month" placeholder='MM' size='2' value="<?=$last_card['card_expiry_month']?>" type='text'>
    							<?php else: ?>
    								<input class='form-control card-expiry-month' name="card_expiry_month" placeholder='MM' size='2' value="" type='text'>
    							<?php endif ?>
    						</div>
    						<div class="col-right">
    							<label>Expiry Year</label>
    							<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    								<input class='form-control card-expiry-year' name="card_expiry_year" placeholder='YYYY' size='4' value="<?=$last_card['card_expiry_year']?>" type='text'>
    							<?php else: ?>
    								<input class='form-control card-expiry-year' name="card_expiry_year" placeholder='YYYY' size='4' value="" type='text'>
    							<?php endif ?>
    						</div>
    					</div>
    					<div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'></div>
                            </div>
                        </div>
    					<div class="form-row">
    						<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
    							<input class="styled-checkbox" name="save_my_card" id="styled-checkbox-1" type="checkbox" value="yes" checked="checked">
    						<?php else: ?>
    							<input class="styled-checkbox" name="save_my_card" id="styled-checkbox-1" type="checkbox" value="yes">
    						<?php endif ?>
    						<label for="styled-checkbox-1">Save this card for your next payment</label>
    					</div>
    				</div>
					<div class="form-row">
						<div class="cod">
							<?php if ($last_card['payment_method'] == 'card' && $last_card['save_my_card'] == 'yes'): ?>
								<input type="radio" id="tes1" name="payment_method" value="COD">
							<?php else: ?>
								<input type="radio" id="tes1" name="payment_method" value="COD" checked="checked"  onclick="show1();">
							<?php endif ?>
							<label for="tes1">Cash On Delivery</label>
						</div>
						<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-card">Add New Card</button>-->
						<div class="cod" style="padding: 0 0 0 12px; border: 0;">
						    <button class="card-btn  data-toggle="modal" data-target="#modal-add-card""><i class="fa fa-credit-card-alt" aria-hidden="true"></i>New credit card</button>
						</div>
					</div>
					<div class="form-row add">
						<a href="#" class="voucher">Do you have a voucher?</a>
						<span>By making this purchase you agree to our <a href="#" class="terms"> terms and conditions.</a></span>
					</div>
					<button class="place-order">Save & Continue</button>
					<span class="agree">I agree and I demand that you execute the ordered service before the end of the revocation period. I am aware that after complete fulfillment of the service I lose my right of recission. Payment transactions will be processed abroad.</span>
				</form>

				<form class="checkout-form checkout-form-2-done" style="display: none;">
					
					<div class="form-row">
						<div class="col-left">
							<input type="radio" id="test1" checked="checked" value="card">
							<label for="test1">Credit /Debit Card</label>
						</div>
						<div class="col-right">
							<ul class="cash-list">
								<li>
									<a href="#">
										<img src="<?=IMG?>img58.png" alt="image">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?=IMG?>img38.png" alt="image">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?=IMG?>img39.png" alt="image">
									</a>
								</li>
								<li>
									<a href="#">
										<img src="<?=IMG?>img40.png" alt="image">
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="form-row">
						<label>Name</label>
						<input type="text" class="checkout_form_card_name" value="test" readonly="readonly" style="border-top:none;border-left:none;border-right:none;">
					</div>
					<div class="form-row">
						<div class="col-left">
							<label>Enter your card number</label>
							<input type="text" class="checkout_form_card_number" value="4242424242424242" readonly="readonly" style="border-top:none;border-left:none;border-right:none;">
						</div>
						<div class="col-right">
							<label>Expiry</label>
							<input autocomplete='off' class='form-control checkout_form_expiry' value="123" size='4' readonly="readonly" style="border-top:none;border-left:none;border-right:none;">
						</div>
					</div>
					<div class="form-row">
						<input class="styled-checkbox checkout_form_card_save" id="styled-checkbox-2" type="checkbox" readonly="readonly">
						<label for="styled-checkbox-2">Save this card for your next payment</label>
					</div>
					<div class="form-row add">
						<a href="#" class="voucher">Do you have a voucher?</a>
						<span>By making this purchase you agree to our <a href="#" class="terms"> terms and conditions.</a></span>
					</div>
				</form>

			</div><!-- /left-checkout -->
			<div class="right-sidebar">
				<div class="right-checkout">
					<div class="order-summary" id="check-out-final-submit">
						<span class="heading">Order Summary</span>
						<div class="order-holder">
							<span class="left">Subtotal (<span class="cart-counter"><?=count($checkout_products)?></span> items)</span>
							<span class="right">Rs. <span class="cart-total"><?=$cart_total?></span></span>
						</div>
						<div class="order-holder">
							<span class="left">Shipping Fee</span>
							<?php if ($cart_total == 0): ?>
								<span class="right delivery_charges">Rs. 0</span>
								<?php $cart_total = 0 ?>
							<?php else: ?>
								<?php if ($cart_total > $delivery_charges_waive_off_limit): ?>
									<span class="right delivery_charges">Rs. 0</span>
								<?php else: ?>
									<?php $cart_total = $cart_total + $delivery_charges ?>
									<span class="right delivery_charges">Rs. <?=$delivery_charges?></span>
								<?php endif ?>
							<?php endif ?>
						</div>
						<form class="coupon_form">
							<input type="text" name="coupon_name" required="required">
							<button type="submit">Apply</button>
						</form>
						<div class="order-holder">
							<span class="left">Discount</span>
							<span class="right">Rs. <span class="cart-discount">0</span></span>
						</div>
						<span class="total">
							<em>Total:</em>
							Rs. <span class="cart-total-final"><?=$cart_total?></span>
						</span>
						<span class="vat">VAT included, where applicable</span>
						<a href="javascript://" class="procced check-out-final-submit">Place Order</a>
					</div><!-- /order-summary -->
				</div><!-- /right-checkout -->
			</div><!-- /right-sidebar -->
		</div><!-- /container -->
	</section><!-- /checkout-holder -->

	<section class="sale-banner">
		<div class="container">
			<?php if ($ads[4]['ad_id'] == 5 && strlen($ads[4]['image']) > 3): ?>
				<a href="<?=$ads[4]['url']?>"><img src="<?=UPLOADS_ADMIN.'ad/'.$ads[4]['image']?>"></a>
			<?php endif ?>
		</div>
	</section>











<div class="modal fade" id="modal-user-addresses">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Adresses</h4>
			</div>
			<div class="modal-body">
				
				<table class="table table-bordered user-address-book-table-checkout-page">
  					<thead>
  						<th>Title</th>
  						<th>Full name</th>
  						<th>address</th>
  						<th>city</th>
  						<th>phone number</th>
  						<th>Action</th>
  					</thead>
  					<tbody>
  						<?php foreach ($addresses as $key => $address): ?>
	  						<tr>
	  							<td><strong><?=$address['title']?></strong></td>
	  							<td><?=$address['receiver_name']?></td>
	  							<!-- <td><?=$address['house_no'].','.$address['socity']?></td> -->
	  							<td><?=$address['house_no']?></td>
	  							<td><?=$address['city']?></td>
	  							<td><?=$address['receiver_mobile']?></td>
	  							<td>
	  								<!-- <button class="btn btn-success add-address-to-form" data-name="<?=$address['receiver_name']?>" data-pincode="<?=$address['pincode']?>" data-mobile="<?=$address['receiver_mobile']?>" data-city="<?=$address['city_id']?>" data-city-name="<?=$address['city']?>" data-socity="<?=$address['socity_id']?>" data-socity-name="<?=$address['socity']?>" data-house-no="<?=$address['house_no']?>" data-email="<?=$address['receiver_email']?>">USE</button> -->
	  								<button class="btn btn-success add-address-to-form" data-name="<?=$address['receiver_name']?>" data-pincode="<?=$address['pincode']?>" data-mobile="<?=$address['receiver_mobile']?>" data-city-name="<?=$address['city']?>" data-socity="<?=$address['socity_id']?>" data-house-no="<?=$address['house_no']?>" data-email="<?=$address['receiver_email']?>">USE</button>
	  								<!-- <?='<a href="javascript://" class="user-address-edit btn btn-info" data-id="'.$address['user_address_id'].'" data-name="'.$address['receiver_name'].'" data-title="'.$address['title'].'" data-pincode="'.$address['pincode'].'" data-mobile="'.$address['receiver_mobile'].'" data-city="'.$address['city_id'].'" data-city-name="'.$address['city'].'" data-socity="'.$address['socity_id'].'" data-socity-name="'.$address['socity'].'" data-house-no="'.$address['house_no'].'" data-email="'.$address['receiver_email'].'">'?> -->
	  								<?='<a href="javascript://" class="user-address-edit btn btn-info" data-id="'.$address['user_address_id'].'" data-name="'.$address['receiver_name'].'" data-title="'.$address['title'].'" data-pincode="'.$address['pincode'].'" data-mobile="'.$address['receiver_mobile'].'" data-country="'.$address['country_id'].'" data-state="'.$address['state_id'].'" data-city="'.$address['city_id'].'" data-city-name="'.$address['city'].'" data-house-no="'.$address['house_no'].'" data-email="'.$address['receiver_email'].'">'?>
	  									<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	  									edit
	  								</a>
	  							</td>
	  						</tr>
  						<?php endforeach ?>
  					</tbody>
  				</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary btn-add-address">Add New</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- /modal-user-addresses -->


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


<div class="modal fade" id="modal-add-card">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">+ Add New Card</h4>
			</div>
			<div class="modal-body">
				

				<form id="modal-add-card-form">
					<div class="form-group">
						<label for="">Name *</label>
						<input class="form-control" type="text" name="name" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for=""> Number *</label>
						<input class="form-control" type="text" name="number" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Company *</label>
						<input class="form-control" type="text" name="company" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">CVC *</label>
						<input class="form-control" type="text" name="cvc" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Month *</label>
						<input class="form-control" type="text" name="month" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Year *</label>
						<input class="form-control" type="text" name="year" required="required">
					</div><!-- /form-group -->
					
					<div class="form-group">
						<button class="btn btn-primary">Add</button>
					</div><!-- /form-group -->
				</form>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- /modal-edit-address-btn -->

<script>
	function show1(){
	  document.getElementById('div1').style.display ='none';
	}
	function show2(){
	  document.getElementById('div1').style.display = 'block';
	}
</script>