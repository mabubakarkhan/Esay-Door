		<section class="info-section">
			<div class="container">
				<div class="info-columns">
					<div class="column">
						<div class="img">
							<img src="<?=IMG?>img32.jpg" alt="image">
						</div>
						<div class="text-holder">
							<strong>Free Shiping</strong>
							<p>Free shiping on all uk orders</p>
						</div>
					</div>
					<div class="column">
						<div class="img">
							<img src="<?=IMG?>img33.jpg" alt="image">
						</div>
						<div class="text-holder">
							<strong>Money Guarantee</strong>
							<p>30 days money back guarantee</p>
						</div>
					</div>
					<div class="column">
						<div class="img">
							<img src="<?=IMG?>img34.jpg" alt="image">
						</div>
						<div class="text-holder">
							<strong>Online Support</strong>
							<p>We support online 24 hours a day</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer id="footer">
			<div class="container">
				<div class="footer-column">
					<div class="column">
						<a class="logo">
							<img src="<?=IMG?>logo.png" alt="image">
						</a>
						<div class="address-box">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<span>615 Garden Heights New Garden Lahore Lahre.</span>
						</div>
						<div class="address-box">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<a href="tel:03327147122">0332 7147122</a>
						</div>
						<div class="address-box">
							<i class="fa fa-mobile" aria-hidden="true"></i>
							<a href="mailto:customer@easydoor.com">customer@easydoor.com</a>
						</div>
					</div>
					<div class="column">
						<strong>my account</strong>
						<ul>
							<li><a href="<?=BASEURL.'about-us'?>">about us</a></li>
							<li><a href="<?=BASEURL.'contact-us'?>">contact us</a></li>
							<li><a href="<?=BASEURL.'terms'?>">Terms & Conditions</a></li>
							<li><a href="<?=BASEURL.'faqs'?>">FAQs</a></li>
							<li><a href="<?=BASEURL.'blog'?>">Blog</a></li>
						</ul>
					</div>
					<div class="column">
						<strong>Information</strong>
						<ul>
							<li>
								<a href="#">about us</a>
							</li>
							<li>
								<a href="#">order history</a>
							</li>
							<li>
								<a href="#">information</a>
							</li>
							<li>
								<a href="#">privacy policy</a>
							</li>
							<li>
								<a href="#">site map</a>
							</li>
						</ul>
					</div>
					<div class="column">
						<strong>Our Services</strong>
						<ul>
							<li>
								<a href="#">about us</a>
							</li>
							<li>
								<a href="#">order history</a>
							</li>
							<li>
								<a href="#">information</a>
							</li>
							<li>
								<a href="#">privacy policy</a>
							</li>
							<li>
								<a href="#">site map</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="bottom-holder">
					<div class="bottom-column">
						<span class="heading">Payment Methods</span>
						<ul class="pay-list">
							<li>
								<a href="#">
									<img src="<?=IMG?>img37.png" alt="image">
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
					<div class="bottom-column">
						<span class="heading">Follow us</span>
						<ul class="follow-list">
							<li>
								<a href="#">
									<i class="fa fa-facebook" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-linkedin" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-pinterest-p" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fa fa-google-plus" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
					<div class="bottom-column">
						<span class="heading">Download App</span>
						<ul class="download-list">
							<li>
								<a href="#">
									<img src="<?=IMG?>img41.png" alt="image">
								</a>
							</li>
							<li>
								<a href="#">
									<img src="<?=IMG?>img42.png" alt="image">
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<div class="bottom-footer">
			<div class="container">
				<span class="copyright">Copyright 2020 easydoor.com Designed By:<a href="#"> Magic Mayo</a></span>
				<ul class="footer-nav">
					<li>
						<a href="#">About Us </a>
					</li>
					<li>
						<a href="#">Our Blog </a>
					</li>
					<li>
						<a href="#">Sitemap</a>
					</li>
					<li>
						<a href="#">Terms & Conditions </a>
					</li>
					<li>
						<a href="#">Privacy Policy</a>
					</li>
				</ul>
			</div>
		</div>
	</div><!-- #wrapper -->

</body>
<style>
	.hide{
		display: none;
	}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
	<script>
		$(document).ready(function(){
		  $(".menu").click(function(){
		    $("body").toggleClass("open-nav");
		  });
		});
	</script>
	<script>
		$('.slider').slick({
	infinite: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	arrows: true,
	autoplay: true,
	autoplaySpeed: 2000,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
			// settings: "unslick"
		}

	]
});
	</script>
	<script>
		function updateTimer() {
    future = Date.parse("sept 2, 2020 11:30:00");
    now = new Date();
    diff = future - now;

    days = Math.floor(diff / (1000 * 60 * 60 * 24));
    hours = Math.floor(diff / (1000 * 60 * 60));
    mins = Math.floor(diff / (1000 * 60));
    secs = Math.floor(diff / 1000);

    d = days;
    h = hours - days * 24;
    m = mins - hours * 60;
    s = secs - mins * 60;

    document.getElementById("timer")
        .innerHTML =
        '<div class="day">' + d + '<span>d</span></div> ' + 
        '<div class="hours">' + h + '<span>h</span></div> :' +
        '<div class="minuts">' + m + '<span>m</span></div>:' +
        '<div class="seconds">' + s + '<span>s</span></div>';
}
setInterval('updateTimer()', 1000);
	</script>





	<script>
	$(function(){

		// SIZE & COLOR Selection
		$(document).on('click', '.select-size-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$('.select-size-btn').parent('li').css('border', '2px solid #fff');
			$this.parent('li').css('border', '2px solid #000');
			$(".size_id_add_to_cart").val($this.attr('data-sizeid'));
		});
		$(document).on('click', '.select-color-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$('.select-color-btn').parent('li').css('border', '2px solid #fff');
			$this.parent('li').css('border', '2px solid #000');
			$(".color_id_add_to_cart").val($this.attr('data-colorid'));
		});


		/**
		*
		*	CART
		*
		*/


		// add to cart plus minus
		$(document).on('click', '.qty-minus', function(event) {
			event.preventDefault();
			$number = parseInt($(".qty-input").val());
			if ($number > 1) {
				$(".qty-input").val($number-1);
			}
		});
		$(document).on('click', '.qty-plus', function(event) {
			event.preventDefault();
			$number = parseInt($(".qty-input").val());
			$(".qty-input").val($number+1);

		});

		// add to cart
		$(document).on('click', '.add-to-cart-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$id = $this.attr('data-proid');
			$price = $this.attr('data-price');
			$size_id = parseInt($('.size_id_add_to_cart').val());
			$color_id = parseInt($('.color_id_add_to_cart').val());
			$qty = parseInt($(".qty-input").val());
			if ($size_id > 0 || $color_id > 0) {
				if ($qty > 0) {
					$.post('<?=BASEURL."add-to-cart"?>', {
						id: $id,
						qty: $qty,
						size_id: $size_id,
						color_id: $color_id,
						price: $price,
					}, function(resp) {
						resp = JSON.parse(resp);
						if (resp.status == true) {
							$(".cart-counter").text(resp.count);
						}
						else{
							alert(resp.msg);
						}
					});
				}
				else{
					alert('Qty not valid');
				}
			}
			else{
				alert('please select size and color');
			}

		});

		// Delete Cart
		$(document).on('click', '.delete-cart-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$.post('<?=BASEURL."delete-cart-product"?>', {key: $this.attr('data-key')}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status) {
					$(".cart-products-block").html(resp.html);
					$(".cart-total").html(resp.TotalCart);
					$(".cart-counter").html(resp.count);
					$("span.delivery_charges").html(resp.delivery_charges);
					$(".cart-total-final").html(parseInt(resp.TotalCart) + parseInt(resp.delivery_charges));
				}
				else{
					alert(resp.msg);
				}
			});
		});

		$(document).on('submit', '.coupon_form', function(event) {
			event.preventDefault();
			$form = $(this);
			$(".checkout-form-1 input[name='coupon']").val('');
			$.post('<?=BASEURL."get-coupon-discount"?>', {code: $("form.coupon_form input[name='coupon_name']").val()}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status) {
					$(".checkout-form-1 input[name='coupon']").val($("form.coupon_form input[name='coupon_name']").val());
					$("span.cart-discount").html(resp.data.discount_value);
					var TotalCartFinal = parseInt($(".cart-total-final").html());
					$(".cart-total-final").html(TotalCartFinal - parseInt(resp.data.discount_value));
				}
				else{
					alert(resp.msg);
				}
			});
		});



		$(document).on('click', '.GetgifCode', function(event) {
            event.preventDefault();
            $code = $("input[name='gifCode']").val();
            $("input[name='coupon']").val('');
            if ($code.length > 1) {
                $.post('<?=BASEURL."get-coupon-discount"?>', {code: $code}, function(resp) {
                    resp = JSON.parse(resp);
                    if (resp.status == true) {
                        $total = parseInt($(".cart-total-span").attr('data-total'));
                        $cartValue = parseInt(resp.data.cart_value);
                        if ($total >= $cartValue) {
                            $("input[name='coupon']").val(resp.data.coupon_code);
                            $newTotal = parseInt($(".cart-total-span").attr('data-total'));
                            $newTotal = $newTotal - parseInt(resp.data.discount_value);
                            $(".cart-total-span").attr('data-total',$newTotal);
                            $(".cart-total-span").text($newTotal);

                            $netTotal = parseInt($(".cart-total-span-net").attr('data-net-total'));
                            $netTotal = $netTotal - parseInt(resp.data.discount_value);
                            $(".cart-total-span-net").attr('data-net-total',$netTotal);
                            $(".cart-total-span-net").text($netTotal);

                            $(".discount-show").text(resp.data.discount_value);
                        }
                        else{
                            alert('cart total must be greater than or equal to: '+resp.data.cart_value);
                        }
                    }
                    else{
                        alert(resp.msg);
                    }
                });
            }
        });


		var check_out_form_1_check = false;
		var check_out_form_2_check = false;


		$(document).on('submit', '.checkout-form-1', function(event) {
			event.preventDefault();
			$('html, body').animate({
		        scrollTop: $("#checkout-form-2").offset().top
		    }, 400);
		    check_out_form_1_check = true;

		    check_check_out_button(check_out_form_1_check,check_out_form_2_check);
		});

		$(document).on('submit', '.checkout-form-2', function(event) {
			event.preventDefault();
		    if ($('input[name="payment_method"]:checked').val() == 'card') {

			    var $form         = $(".require-validation");

		    	var $form         = $(".require-validation"),
			        inputSelector = ['input[type=text]'].join(', '),
			        $inputs       = $form.find('.required').find(inputSelector),
			        $errorMessage = $form.find('div.error'),
			        valid         = true;
			        $errorMessage.addClass('hide');
			 
		        $('.has-error').removeClass('has-error');
		        $inputs.each(function(i, el) {
		        	var $input = $(el);
		        	if ($input.val() === '') {
				        $input.parent().addClass('has-error');
				        $errorMessage.removeClass('hide');
				        // e.preventDefault();
				    }
				});
		 
		    	if (!$form.data('cc-on-file')) {
			    	// e.preventDefault();
			    	Stripe.setPublishableKey($form.data('stripe-publishable-key'));
			    	Stripe.createToken({
				        number: $('.card-number').val(),
				        cvc: $('.card-cvc').val(),
				        exp_month: $('.card-expiry-month').val(),
				        exp_year: $('.card-expiry-year').val()
				      }, stripeResponseHandler);
		    	}

			  	function stripeResponseHandler(status, response) {
			        if (response.error) {
			            $('.error')
			                .removeClass('hide')
			                .find('.alert')
			                .text(response.error.message);
			            // check_out_form_2_check = false;
			            $('#check_out_form_2_check').val(0);
			        } else {
			            // check_out_form_2_check = true;
			            $('#check_out_form_2_check').val(1);
			            va = check_out_form_2_check;
			            var token = response['id'];
			            $form.find('input[type=text]').empty();
			            $('#stripe_token').val(token);
			            // $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
			            $('html, body').animate({
					        scrollTop: $("#check-out-final-submit").offset().top
					    }, 400);
			            // $form.get(0).submit();
			        }
			    }  
		    }else{
	            $('#check_out_form_2_check').val(1);
		    	$('html, body').animate({
			        scrollTop: $("#check-out-final-submit").offset().top
			    }, 400);
		    }
		    check_check_out_button(check_out_form_1_check,check_out_form_2_check);
		});

		$(document).on('click', '.check-out-final-submit-active', function(event) {
			event.preventDefault();
			alert('hello')
			$.post('<?=BASEURL."submit-order"?>', {
				data1: $('.checkout-form-1').serialize(),
				data2: $('.checkout-form-2').serialize()
			}, function(resp) {
				resp = JSON.parse(resp);
				alert(resp.msg);
				if (resp.status == true) {
					window.location.replace('<?=BASEURL."index"?>');
				}
			});
		});

		function check_check_out_button($form1,$form2) {
			if ($('#check_out_form_2_check').val() == '0') {
		    	$form2 = false;
		    }else if ($('#check_out_form_2_check').val() == '1') {
		    	$form2 = true;
		    }
			if ($form1 == true, $form2 == true) {
				$(".check-out-final-submit").addClass('check-out-final-submit-active');
			}
			else{
				$(".check-out-final-submit").removeClass('check-out-final-submit-active');
			}
		}


		/**
		*
		*
		*	LISTTING FILTERS
		*
		*
		**/

		$(document).on('change', 'select.price-filter', function(event) {
			event.preventDefault();
			filtters();
		});
		$(document).on('change', '.brand-filter', function(event) {
			event.preventDefault();
			filtters();
		});
		$(document).on('change', '.size-filter', function(event) {
			event.preventDefault();
			filtters();
		});
		$(document).on('change', '.color-filter', function(event) {
			event.preventDefault();
			filtters();
		});
		$(document).on('click', '.min-max-price-btn', function(event) {
			event.preventDefault();
			filtters();
		});


		function filtters(){
			$sort = $("select.price-filter").val();
			$min_price = $("input[name='min_price']").val();
			$max_price = $("input[name='max_price']").val();
			$BrandID = '';
			$SizeID = false;
			$ColorID = false;
			$count = 0;
			$('.brand-filter').each(function () {
				$brand_id = (this.checked ? $(this).val() : "");
				$brand_id = parseInt($brand_id);
				if ($brand_id > 0) {
					if ($count == 0) {
						$BrandID = $brand_id;
						$count = 1;
					}
					else{
						$BrandID += ','+$brand_id;
						$count = 1;
					}
				}
			});
			$brandID = parseInt($("input[name='brandID']").val());
			if ($brandID > 0) {
				if ($BrandID.length > 0) {
					$BrandID += ','+$brandID;
				}
				else{
					$BrandID = $brandID;
				}
			}
			$count = 0;
			$('.size-filter').each(function () {
				$size_id = (this.checked ? $(this).val() : "");
				$size_id = parseInt($size_id);
				if ($size_id > 0) {
					if ($count == 0) {
						$SizeID = $size_id;
						$count = 1;
					}
					else{
						$SizeID += ','+$size_id;
						$count = 1;
					}
				}
			});
			$count = 0;
			$('.color-filter').each(function () {
				$color_id = (this.checked ? $(this).val() : "");
				$color_id = parseInt($color_id);
				if ($color_id > 0) {
					if ($count == 0) {
						$ColorID = $color_id;
						$count = 1;
					}
					else{
						$ColorID += ','+$color_id;
						$count = 1;
					}
				}
			});
			$(".listing-product-block").html('<p class="alert alert-info">wait...</p>');
			$.post('<?=BASEURL."get-listting"?>', {
				sort: $sort,
				min_price: $min_price,
				max_price: $max_price,
				BrandID: $BrandID,
				SizeID: $SizeID,
				ColorID: $ColorID,
				CatID: "<?=$cat['id']?>"
			}, function(resp) {
				resp = JSON.parse(resp);
				$(".listing-product-block").html(resp.html);
			});
			$([document.documentElement, document.body]).animate({
		        scrollTop: $(".listing-product-block").offset().top
		    }, 400);
		}


		/**
		*
		*	CUSTOMER
		*
		*/
		$(document).on('submit', '#login-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$(".show-error").fadeOut(400);
			$.post($form.attr('action'), {
				username: $("#login-form input[name='username']").val(),
				password: $("#login-form input[name='password']").val()
			}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					window.location.replace(resp.url);
				}
				else{
					$(".show-error").text(resp.msg);
					$(".show-error").fadeIn(400);
				}
			});
		});


		$(document).on('submit', 'form.review-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$.post($form.attr('action'), {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				alert(resp.msg);
				if (resp.status == true) {
					$(".product-reviews-block ul").html(resp.html);
					$('form.review-form').remove();
					if (resp.reload == 'yes') {
						location.reload();
					}
				}
			});
		});


		$(document).on('click', '.review-page-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$('.review-page-btn').removeClass('active');
			$this.addClass('active');
			$product_id = $this.attr('data-id');
			$page = $this.attr('data-page');
			$.post('<?=BASEURL."get-review-ajax"?>', {page: $page, product_id: $product_id}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status) {
					$(".product-reviews-block ul").html(resp.html);
				}
				else{
					alert(resp.msg);
				}
			});
		});

		$(document).on('click', '.add-wishlist-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$id = $this.attr('data-id');
			$.post('<?=BASEURL."add-wishlist"?>', {id: $id}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					$this.html('<i class="fa fa-heart" aria-hidden="true"></i>');
				}
				else{
					alert(resp.msg);
				}
			});
		});



		/**** SEARCH *****/
		$(document).on('keyup', '#main-search-bar', function(event) {
			event.preventDefault();
			$this = $(this);
			$key = $this.val();
			if ($key.length > 1) {
				$.post('<?=BASEURL."get-search-ajax"?>', {key: $key}, function(resp) {
					resp = JSON.parse(resp);
					$(".search-list").fadeIn(100);
					if (resp.status == true) {
						$(".search-list").html(resp.html);
					}
					else{
						$(".search-list").html('');
					}
				});
			}
		});

		/**
		*
		*
		*
		*	USER SIDE
		*
		*
		**/
		$(document).on('click', '.cancel-order-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			//window.location.replace('<?=BASEURL."user/cancel-order/"?>'+$(this).attr('data-id'));
			$.post('<?=BASEURL."user/cancel-order/"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				$this.hide(0);
				if (resp.status == true) {
					$(".my-cancellation-section").html(resp.html);
					$(".my-pedding-section").html(resp.html2);
				}
				else{
					alert(resp.msg);
				}
			});
		});
		$(document).on('click', '.delete-wish-list-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$.post('<?=BASEURL."user/delete-wish-list"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					$this.parent('div').parent('li').parent('ul').parent('div').remove();
				}
			});
		});
		$(document).on('submit', '.user-profile-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$.post('<?=BASEURL."user/update-profile"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					//do something..
				}
			});
		});
		$(document).on('click', '.change-item-status', function(event) {
			event.preventDefault();
			$this = $(this);
			$.post('<?=BASEURL."user/change-order-item-status"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				if (resp.status == true) {
					$this.closest('.user-order-holder').children('.top-detail').children('span.total-product').text('Total Product: '+resp.data.total_items);
					$total_amonut = parseInt(resp.data.total_amount) + parseInt(resp.data.delivery_charge) - parseInt(resp.data.discount);
					$this.closest('.user-order-holder').children('.top-detail').children('span.total-price').text('Total Price: '+$total_amonut);
					$this.parent('span').html('cancelled');
					$(".my-cancellation-section").html(resp.html);
					$(".my-pedding-section").html(resp.html2);
				}
			});
		});

		$(document).on('click', '.btn-review-action', function(event) {
			event.preventDefault();
			$this = $(this);
			$(".review-form input[name='product_id']").val($this.attr('data-id'));
			$(".review-form .r-1 img").prop('src',$this.attr('data-image'));
			$(".review-form .r-1 .r-text .purchase").html($this.attr('data-at'));
			$(".review-form .r-1 .r-text strong").html($this.attr('data-product'));
			$(".review-form .r-1 .r-text em").html($this.attr('data-category'));
		});

		$("input[name='image_1_'],input[name='image_2_'],input[name='image_3_'],input[name='image_4_'],input[name='image_5_'],input[name='image_6_']").on('change',function(){
			$("#uploadMsg").text('Wait File Is Uploading');
			$this = $(this);
			$input = $this.attr('data-input');
			var data = new FormData();
	    	data.append('img', $(this).prop('files')[0]);
		    $.ajax({
		        type: 'POST',
		        processData: false,
		        contentType: false,
		        data: data,
		        url: '<?=BASEURL?>user/post-photo-ajax/reviews',
		        dataType : 'json',
		        success: function(resp){
		       		if (resp.status == true)
		       		{
		       			$("#uploadMsg").text('');
		       			$('input[name="'+$input+'"]').val(resp.data);
		       		}
		       		else
		       		{
		       			alert(resp.msg)
		       			$("#uploadMsg").text('Upload An Image First');
		       		}
		        }
		    });
		})

	});//onload
	</script>

</html>