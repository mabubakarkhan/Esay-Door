		<section class="info-section">
			<div class="container">
				<div class="info-columns">
					<div class="column">
						<div class="img">
							<!-- <img src="<?=IMG?>img32.jpg" alt="image"> -->
							<i class="far fa-truck"></i>
						</div>
						<div class="text-holder">
							<strong>Free Shiping</strong>
							<p>Free shiping on all uk orders</p>
						</div>
					</div>
					<div class="column">
						<div class="img">
							<!-- <img src="<?=IMG?>img33.jpg" alt="image"> -->
							<i class="far fa-dollar-sign"></i>
						</div>
						<div class="text-holder">
							<strong>Money Guarantee</strong>
							<p>30 days money back guarantee</p>
						</div>
					</div>
					<div class="column">
						<div class="img">
							<!-- <img src="<?=IMG?>img34.jpg" alt="image"> -->
							<i class="far fa-cogs"></i>
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
							<i class="fas fa-map-marker-alt"></i>
							<span>615 Garden Heights New Garden Lahore.</span>
						</div>
						<div class="address-box">
							<i class="fas fa-mobile-alt"></i>
							<a href="tel:03327147122">0332 7147122</a>
						</div>
						<div class="address-box">
							<i class="fa fa-envelope" aria-hidden="true"></i>
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
							<li><a href="<?=BASEURL.'sellers'?>">seller</a></li>
							<li><a href="<?=BASEURL.'privacy-policies'?>">Privacy Policies</a></li>
							<li><a href="<?=BASEURL.'terms-of-use'?>">Terms Of Use</a></li>
							<li><a href="<?=BASEURL.'return-policy'?>">Return Policy</a></li>
						</ul>
					</div>
					<div class="column last-col">
						<strong>Our Services</strong>
						<ul class="download-list">
							<li>
								<a href="javascript://">
									<img src="<?=IMG?>img41.png" alt="image">
								</a>
							</li>
							<li>
								<a href="javascript://">
									<img src="<?=IMG?>img42.png" alt="image">
								</a>
							</li>
						</ul>
						<ul class="follow-list">
							<li>
								<a href="javascript://">
									<i class="fab fa-facebook-f" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="javascript://">
									<i class="fab fa-twitter" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="javascript://">
									<i class="fab fa-linkedin-in"></i>
								</a>
							</li>
							<li>
								<a href="javascript://">
									<i class="fab fa-pinterest-p" aria-hidden="true"></i>
								</a>
							</li>
							<li>
								<a href="javascript://">
									<i class="fab fa-google-plus-g" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<div class="bottom-footer">
			<div class="container">
				<span class="copyright">Copyright 2020 easydoor.com Designed By:<a href="javascript://"> Magic Mayo</a></span>
				<img src="<?=IMG?>img174.png" alt="image">
			</div>
		</div>
	</div><!-- #wrapper -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<a href="https://wa.me/message/OS7ZETXJKGUNG1" class="float" target="_blank">
	<i class="fa fa-whatsapp my-float"></i>
	</a>


</body>
<style>
	.hide{
		display: none;
	}
</style>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/164071/Drift.min.js"></script>
	<!-- <script src="https://github.com/Modernizr/Modernizr/raw/master/modernizr.js"></script> -->
	<script src="<?=JS?>jquery.zoom.js"></script>
     
	<script>
var jq = $.noConflict();
		$(".filter").click(function(){
		    $("body").toggleClass("open-filter");
	  	});

		$(document).on('click', '.side-menu-clcik', function(event) {
	  		$("body").toggleClass("nav-slide");
		});
		$(document).on('click', '.btn-shut', function(event) {
            $('body').removeClass('nav-slide');
        });


		$('.side-drop .holder-1 ul li').each(function(index, val) {
		    $checkClass = $(val).children('div');
		    if ($checkClass.hasClass("sub-menu")) {
				$(val).addClass("item");
			}
			else{
				$(val).removeClass("item");
			}
		});


		$(".side-drop .holder-1 ul li a").click(function(){
			//$(this).parent().addClass("new-menu");
			let li = $(this).parent();
			$checkClass = li.children('div');
			if ($checkClass.hasClass("sub-menu")) {
				li.addClass("new-menu");
				li.addClass("item");
			}
			else{
				li.removeClass("new-menu");
				li.removeClass("item");
			}
		});
	  	$(".close-btn").click(function(){
			$(".side-drop .holder-1 ul li a").parent().removeClass("new-menu");
		});


		$(document).ready(function(){
			$(window).load(function() {
				$("#PreLoaderWebsite").fadeOut(400);
			});

			$(".mobile-left-menu").click(function(){
				$("body").toggleClass("open-left-menu")
			});

		$(document).on('click', '.menu', function(event) {
		    $("body").toggleClass("open-nav");
		  });
		  
		});
	</script>
	<script>
		$(document).ready(function(){
		  $(".fashion .top-head .menu").click(function(){
		    $("body").toggleClass("open-tabs");
		  });

		});
	</script>
	<script>
		$(document).ready(function(){
			$(".side-drop .holder-1 > ul > li.item > a").click(function(){
				$(".item_holder").addClass("new");
			})
			$(".close-btn").click(function(){
				$(".item_holder").removeClass("new");
			})
		})
	</script>
	<script>
		$(document).ready(function(){
			$(".side-menu-clcik").click(function(){
				$(".item_holder").addClass("left")
			})
			$(".btn-shut").click(function(){
				$(".item_holder").removeClass("left")
			})
		})
	</script>
	
	<script>
		$(document).ready(function(){
				$('ul.main-nav').each(function(){
			  var LiN = $(this).find('li.term-item').length;
			  if( LiN > 3){    
			    $('li.term-item', this).eq(2).nextAll().hide().addClass('toggleable');
			    $(this).append('<li class="more"> Show More</li>');    
			  }  
			});
			$('ul.main-nav').on('click','.more', function(){
			  if( $(this).hasClass('less') ){    
			    $(this).text('Show More').removeClass('less');    
			  }else{
			    $(this).text('Show Less').addClass('less'); 
			  }
			  $(this).siblings('li.toggleable').slideToggle(); 
			}); 
		});
	</script>
	<script>
		$(document).ready(function(){
		  $(".fashion .top-head .menu").click(function(){
		    $("body").toggleClass("open-tabs");
		  });
		});
	</script>
	<script type="text/javascript">
		/* <![CDATA[ */
		( function( $ ) {
		   $( 'a[href="javascript://"]' ).click( function(e) {
		      e.preventDefault();
		   } );
		} )( jQuery );
		/* ]]> */
	</script>
	<!-- <script>
		var demoTrigger = document.querySelector('.demo-trigger');
			var paneContainer = document.querySelector('.detail');

			new Drift(demoTrigger, {
			  paneContainer: paneContainer,
			  inlinePane: false,
			});
	</script>
	<script>
		var demoTrigger = document.querySelector('.demo-trigger2');
			var paneContainer = document.querySelector('.detail');

			new Drift(demoTrigger, {
			  paneContainer: paneContainer,
			  inlinePane: false,
			});
	</script>
	<script>
		var demoTrigger = document.querySelector('.demo-trigger3');
			var paneContainer = document.querySelector('.detail');

			new Drift(demoTrigger, {
			  paneContainer: paneContainer,
			  inlinePane: false,
			});
	</script> -->
	<script>
	
	jq(function() {
		   // alert('gfhdgfhdg');
			jq('.zoom').zoom();
		});
	</script>
	<script>
		$(document).ready(function(){
			

			/**
			*
			*/
			var $window = $(window);  
			var $sidebar = $(".right-sidebar"); 
			var $sidebarHeight = $sidebar.innerHeight();   
			var $footerOffsetTop = $(".info-section").offset().top; 
			var $sidebarOffset = $sidebar.offset();
			  
			$window.scroll(function() {
			    if($window.scrollTop() > $sidebarOffset.top) {
			      $sidebar.addClass("fixed");   
			    }
			    else {
			      $sidebar.removeClass("fixed");   
			    }    
			    if($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
			      $sidebar.css({"top" : -($window.scrollTop() + $sidebarHeight - $footerOffsetTop)});        
			    }
			    else {
			      $sidebar.css({"top": "0",});  
			    }
			});

		});
	</script>
	<script>

		jq('.slider').slick({
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
		    future = Date.parse("<?=$deals['deal']['end']?>");
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

		    if (days < 0) {
		    	$(".home-page-deal-main-block").html('');
		    	$(".home-page-deal-main-block").remove();
		    	return;
		    }
		    else{
			    document.getElementById("timer")
			    .innerHTML =
			    '<div class="day">' + d + '<span>d</span></div> ' + 
			    '<div class="hours">' + h + '<span>h</span></div> :' +
			    '<div class="minuts">' + m + '<span>m</span></div>:' +
			    '<div class="seconds">' + s + '<span>s</span></div>';
		    }

		}
		//setInterval('updateTimer()', 1000);
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
			$ColorImageID = '#'+$this.attr('data-colorimage');
			if ($($ColorImageID).length == 1) {
				$(".carousel-item").removeClass('active');
				$($ColorImageID).addClass('active');
			}
		});
		$(document).on('click', '.filter-price-btn', function(event) {
			event.preventDefault();
			$price = $(this).attr('data-price');
			$(".price-show").text($price);
			$(".discount-price-show").text($(this).attr('data-discount-price'));

			$(".add-to-cart-btn").attr('data-price',$price);
		});
		$(document).on('change', '.select-size-select', function(event) {
			event.preventDefault();
			$this = $(this);
			$(".size_id_add_to_cart").val($this.val());
		});
		$(document).on('change', '.select-size-color', function(event) {
			event.preventDefault();
			$this = $(this);
			$(".color_id_add_to_cart").val($this.val());
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
		$(document).on('click', 'button.quantity-arrow-minus-2', function(event) {
			event.preventDefault();
			$qty_input_2 = $(this).parent('div').children('.qty-input-2');
			// $number = parseInt($(".qty-input-2").val());
			$number = parseInt($qty_input_2.val());
			if ($number > 1) {
				$qty_input_2.val($number-1);
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."change-cart-item-qty"?>', {
					qty: $qty_input_2.val(),
					key: $qty_input_2.attr('data-id')
				}, function(resp) {
					resp = JSON.parse(resp);
					$("#loading").fadeOut(400);
					if (resp.status == true) {
						$("#loading").fadeOut(400);
						if (resp.status == true) {
							$(".cart-total").html(resp.TotalCart);
							$(".cart-counter").html(resp.count);
							$("span.delivery_charges").html(resp.delivery_charges);
							$(".cart-total-final").html(parseInt(resp.TotalCart) + parseInt(resp.delivery_charges));
							if (parseInt(resp.count) == 0) {
								$("#orderModal .modal-footer p").html('No item remains in your cart, go back and continue shopping');
								$("#orderModal").modal('show');
								setInterval(function(){
									window.location.replace('<?=BASEURL."index"?>');
								}, 2000)
							}
						}
						else{
							$("#errorModal .modal-footer p").html(resp.msg);
							$("#errorModal").modal('show');
						}
					}
					else{
						$("#errorModal .modal-footer p").html(resp.msg);
						$("#errorModal").modal('show');
					}
				});//post
			}
		});
		$(document).on('click', 'button.quantity-arrow-plus-2', function(event) {
			event.preventDefault();
			$qty_input_2 = $(this).parent('div').children('.qty-input-2');
			//$number = parseInt($(".qty-input-2").val());
			$number = parseInt($qty_input_2.val());
			$qty_input_2.val($number+1);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."change-cart-item-qty"?>', {
				qty: $qty_input_2.val(),
				key: $qty_input_2.attr('data-id')
			}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$("#loading").fadeOut(400);
					if (resp.status == true) {
						$(".cart-total").html(resp.TotalCart);
						$(".cart-counter").html(resp.count);
						$("span.delivery_charges").html(resp.delivery_charges);
						$(".cart-total-final").html(parseInt(resp.TotalCart) + parseInt(resp.delivery_charges));
						if (parseInt(resp.count) == 0) {
							$("#orderModal .modal-footer p").html('No item remains in your cart, go back and continue shopping');
							$("#orderModal").modal('show');
							setInterval(function(){
								window.location.replace('<?=BASEURL."index"?>');
							}, 2000)
						}
					}
					else{
						$("#errorModal .modal-footer p").html(resp.msg);
						$("#errorModal").modal('show');
					}
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});//post
		});

		// add to cart
		$(document).on('click', '.add-to-cart-btn', function(event) {
		    	alert("buy button clicked");
			event.preventDefault();
		
			$("#loading").fadeIn(400);
			$redirect = $(this).attr('data-redirect');
			$this = $(this);
			$id = $this.attr('data-proid');
			$price = $this.attr('data-price');
			$size_id = parseInt($('.size_id_add_to_cart').val());
			$color_id = parseInt($('.color_id_add_to_cart').val());
			$qty = parseInt($(".qty-input").val());
			$size_check = $("input[name='size_check']").val();
			$color_check = $("input[name='color_check']").val();
			if ($size_check == 'true' && $size_id == 0) {
				$("#errorModal .modal-footer p").html('please select size');
				$("#errorModal").modal('show');
				$("#loading").fadeOut(400);
				return
			}
			if ($color_check == 'true' && $color_id == 0) {
				$("#errorModal .modal-footer p").html('please select color');
				$("#errorModal").modal('show');
				$("#loading").fadeOut(400);
				return
			}
			
			if ($qty > 0) {
				$.post('<?=BASEURL."add-to-cart"?>', {
					id: $id,
					qty: $qty,
					size_id: $size_id,
					color_id: $color_id,
					price: $price,
				}, function(resp) {
					resp = JSON.parse(resp);
					$("#loading").fadeOut(400);
					if (resp.status == true) {
						$(".cart-counter").text(resp.count);
						if ($redirect == 'true') {
							window.location.replace('<?=BASEURL."check-out"?>');
						}
					}
					else{
						$("#errorModal .modal-footer p").html(resp.msg);
						$("#errorModal").modal('show');
					}
				});
			}
			else{
				$("#errorModal .modal-footer p").html('Qty not valid');
				$("#errorModal").modal('show');
				$("#loading").fadeOut(400);
			}
			
		});

		// Delete Cart
		$(document).on('click', '.delete-cart-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."delete-cart-product"?>', {key: $this.attr('data-key')}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$(".cart-products-block").html(resp.html);
					$(".cart-total").html(resp.TotalCart);
					$(".cart-counter").html(resp.count);
					$("span.delivery_charges").html(resp.delivery_charges);
					$(".cart-total-final").html(parseInt(resp.TotalCart) + parseInt(resp.delivery_charges));
					if (parseInt(resp.count) == 0) {
						$("#orderModal .modal-footer p").html('No item remains in your cart, go back and continue shopping');
						$("#orderModal").modal('show');
						setInterval(function(){
							window.location.replace('<?=BASEURL."index"?>');
						}, 2000)
					}
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});

		$(document).on('submit', '.coupon_form', function(event) {
			event.preventDefault();
			$form = $(this);
			$(".checkout-form-1 input[name='coupon']").val('');
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."get-coupon-discount"?>', {code: $("form.coupon_form input[name='coupon_name']").val()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status) {
					$(".checkout-form-1 input[name='coupon']").val($("form.coupon_form input[name='coupon_name']").val());
					$("span.cart-discount").html(resp.data.discount_value);
					var TotalCartFinal = parseInt($(".cart-total-final").html());
					$(".cart-total-final").html(TotalCartFinal - parseInt(resp.data.discount_value));
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});



		$(document).on('click', '.GetgifCode', function(event) {
            event.preventDefault();
			$("#loading").fadeIn(400);
            $code = $("input[name='gifCode']").val();
            $("input[name='coupon']").val('');
            if ($code.length > 1) {
                $.post('<?=BASEURL."get-coupon-discount"?>', {code: $code}, function(resp) {
                    resp = JSON.parse(resp);
                    $("#loading").fadeOut(400);
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
                        $("#errorModal .modal-footer p").html(resp.msg);
						$("#errorModal").modal('show');
                    }
                });
            }
        });


		var check_out_form_1_check = false;
		var check_out_form_2_check = false;

		$(document).on('click', '#checkout-form-1-show', function(event) {
			event.preventDefault();
		    $(".checkout-form-1-done").fadeOut(0);
			$(".checkout-form-1").fadeIn(0);
		});
		$(document).on('submit', '.checkout-form-1', function(event) {
			event.preventDefault();
			$('html, body').animate({
		        scrollTop: $("#checkout-form-2").offset().top
		    }, 400);
		    check_out_form_1_check = true;
		    $(".checkout_form_receiver_name").val($(".checkout-form-1 input[name='receiver_name']").val());
		    $(".checkout_form_pincode").val($(".checkout-form-1 input[name='pincode']").val());
		    $(".checkout_form_receiver_mobile").val($(".checkout-form-1 input[name='receiver_mobile']").val());
		    //$(".checkout_form_city_id").val($(".checkout-form-1 select[name='city_id'] option:selected").text());
		    if ($(".checkout-form-1 select[name='city_id']").find(":selected").text().length > 1) {
		    	$(".checkout-form-1-done .checkout_form_city_id").val($(".checkout-form-1 select[name='city_id']").find(":selected").text());
		    }
		    else{
		    	$(".checkout-form-1-done .checkout_form_city_id").val($(".checkout-form-1 .check-out-form-city-input").val());
		    }
		    //$(".checkout_form_socity_id").val($(".checkout-form-1 select[name='socity_id'] option:selected").text());
		    /*if ($(".checkout-form-1 select[name='socity_id']").find(":selected").text().length > 1) {
		    	$(".checkout-form-1-done .checkout_form_socity_id").val($(".checkout-form-1 select[name='socity_id']").find(":selected").text());
		    }
		    else{
		    	$(".checkout-form-1-done .checkout_form_socity_id").val($(".checkout-form-1 .check-out-form-socity-input").val());
		    }*/
		    $(".checkout_form_house_no").val($(".checkout-form-1 input[name='house_no']").val());
		    $(".checkout_form_receiver_email").val($(".checkout-form-1 input[name='receiver_email']").val());
		    $(".checkout-form-1").fadeOut(0);
		    $(".checkout-form-1-done").fadeIn(0);

		    check_check_out_button(check_out_form_1_check,check_out_form_2_check);
		});

		$(document).on('click', '#checkout-form-2-show', function(event) {
			event.preventDefault();

			//Changing the Inputs (if last card save)
			$(".checkout-form-2 input[name='card_name']").show(0);
			$(".checkout_form_card_name_to_hide").remove();

			$(".checkout-form-2 input[name='card_number']").show(0);
			$(".checkout_form_card_number_to_hide").remove();

			$(".checkout-form-2 .cvc_input_block").show(0);
			$(".checkout-form-2 .checkout_form_expiry_block_to_show").show(0);
			$(".checkout_form_expiry_block_to_hide").remove();


			//Changing the blocks
		    $(".checkout-form-2-done").fadeOut(0);
			$(".checkout-form-2").fadeIn(0);
		});
		$(document).on('submit', '.checkout-form-2', function(event) {
			event.preventDefault();
		    if ($('input[name="payment_method"]:checked').val() == 'card') {
				$("#loading").fadeIn(400);

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
			            $('#check_out_form_2_check').val('0');
			        } else {
			            // check_out_form_2_check = true;
			            $('#check_out_form_2_check').val('1');
			            var token = response['id'];
			            $form.find('input[type=text]').empty();
			            $('#stripe_token').val(token);
			            // $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
			            $('html, body').animate({
					        scrollTop: $("#check-out-final-submit").offset().top
					    }, 400);
			            // $form.get(0).submit();
		    			$(".checkout_form_card_name").val($(".checkout-form-2 input[name='card_name']").val());
						$checkout_form_card_name = $(".checkout-form-2 input[name='card_number']").val();
						$(".checkout_form_card_number").val('xxxxxxxxxxxx'+$checkout_form_card_name[12]+''+$checkout_form_card_name[13]+''+$checkout_form_card_name[14]+''+$checkout_form_card_name[15]);
		    			//$(".checkout_form_card_number").val($(".checkout-form-2 input[name='card_number']").val());
		    			$(".checkout_form_expiry").val($(".checkout-form-2 input[name='card_expiry_month']").val()+'/'+$(".checkout-form-2 input[name='card_expiry_year']").val());
		    			if ($('input[name="save_my_card"]:checked').length > 0) {
							$(".checkout_form_card_save").attr('checked','checked');
		    			}
			            $(".checkout-form-2").fadeOut(0);
		    			$(".checkout-form-2-done").fadeIn(0);
			        }
			    }
			    $("#loading").fadeOut(400);
		    }
		    else{
	            $('#check_out_form_2_check').val('1');
		    	$('html, body').animate({
			        scrollTop: $("#check-out-final-submit").offset().top
			    }, 400);
		    }
		    setInterval(function(){
			    if ($('#check_out_form_2_check').val() == 0) {
			    	check_out_form_2_check = false;
			    	check_check_out_button(check_out_form_1_check,check_out_form_2_check);
			    }else if ($('#check_out_form_2_check').val() == 1) {
			    	check_out_form_2_check = true;
			    	check_check_out_button(check_out_form_1_check,check_out_form_2_check);
			    }
		    }, 100)
		});

		$(document).on('click', '.check-out-final-submit-active', function(event) {
			event.preventDefault();
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."submit-order"?>', {
				data1: $('.checkout-form-1').serialize(),
				data2: $('.checkout-form-2').serialize()
			}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$("#orderModal .modal-footer p").html(resp.msg);
					$("#orderModal").modal('show');
					setInterval(function(){
						window.location.replace('<?=BASEURL."index"?>');
					}, 2000)
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});

		/*$('.place-order').on('click', function(event) {
			check_check_out_button(check_out_form_1_check, check_out_form_2_check);
		});*/
		function check_check_out_button($form1,$form2) {
			console.log($('#check_out_form_2_check').val());
			
			if ($form1 == true, $form2 == true) {
				$(".check-out-final-submit").addClass('check-out-final-submit-active');
				$(".check-out-final-submit").addClass('enable');
			}
			else{
				$(".check-out-final-submit").removeClass('check-out-final-submit-active');
				$(".check-out-final-submit").removeClass('enable');
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
		$(document).on('change', '.cat-filter', function(event) {
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
		$(document).on('change', '.dynamic-filter', function(event) {
			event.preventDefault();
			filtters();
		});
		$(document).on('click', '.min-max-price-btn', function(event) {
			event.preventDefault();
			filtters();
		});
		$(document).on('click', '.ListingCatID', function(event) {
			event.preventDefault();
			$this = $(this);
			$(".ListingCatID").removeClass('active');
			$this.parent('li').addClass('active');
			$("#ListingCatID").val($this.attr('data-id'));
			filtters($this.attr('data-id'));
		});

		$(document).on('click', '.deal-page-number', function(event) {
			event.preventDefault();
			$this = $(this);
			$page = $this.attr('data-page');
			filtters(false,$page,true)
		});

		function filtters($CatID = false,$page = 1,$page_click = false){
			$listing_type = $("input[name='listing_type']").val();
			$search = $("input[name='search_']").val();
			if ($search == 'true') {
				$search = true;
				$search_key = $("input[name='search_key']").val();
				$search_type = $("input[name='search_type']").val();
			}
			else{
				$search = false;
				$search_key = false;
				$search_type = false;
			}
			$product_ids = $("input[name='product_ids']").val();
			$sort = $("select.price-filter").val();
			$min_price = $("input[name='min_price']").val();
			$max_price = $("input[name='max_price']").val();
			$BrandID = '';
			$SizeID = false;
			$ColorID = false;
			$DynamicFilterID = false;
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
			$count = 0;
			$('.dynamic-filter').each(function () {
				$daynamic_filter_id = (this.checked ? $(this).val() : "");
				$daynamic_filter_id = parseInt($daynamic_filter_id);
				if ($daynamic_filter_id > 0) {
					if ($count == 0) {
						$DynamicFilterID = $daynamic_filter_id;
						$count = 1;
					}
					else{
						$DynamicFilterID += ','+$daynamic_filter_id;
						$count = 1;
					}
				}
			});
			$(".listing-product-block").html('<p class="alert alert-info">wait...</p>');
			if ($listing_type == 'deal') {
				$count = 0;
				$('.cat-filter').each(function () {
					$cat_id = (this.checked ? $(this).val() : "");
					$cat_id = parseInt($cat_id);
					if ($cat_id > 0) {
						if ($count == 0) {
							$CatID = $cat_id;
							$count = 1;
						}
						else{
							$CatID += ','+$cat_id;
							$count = 1;
						}
					}
				});
			}
			else{
				if ($CatID.length > 0) {
					$CatID = $CatID;
				}
				else{
					$CatID = $("#ListingCatID").val();
				}
				$product_ids = 0;
			}
			$.post('<?=BASEURL."get-listting"?>', {
				sort: $sort,
				min_price: $min_price,
				max_price: $max_price,
				BrandID: $BrandID,
				SizeID: $SizeID,
				ColorID: $ColorID,
				DynamicFilterID: $DynamicFilterID,
				//CatID: "<?=$cat['id']?>",
				CatID: $CatID,
				listing_type: $listing_type,
				product_ids: $product_ids,
				page: $page,
				page_click: $page_click,
				search: $search,
				search_key: $search_key,
				search_type: $search_type
			}, function(resp) {
				resp = JSON.parse(resp);
				$(".listing-product-block").html(resp.html);
				if ($page_click == false) {
					if (resp.pages) {
						$(".deal-page-pagination").html(resp.pages);
					}
					else{
						$(".deal-page-pagination").html(false);
					}
				}
			});
			$([document.documentElement, document.body]).animate({
		        //scrollTop: $(".listing-product-block").offset().top
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
			$("#loading").fadeIn(400);
			$.post($form.attr('action'), {
				username: $("#login-form input[name='username']").val(),
				password: $("#login-form input[name='password']").val()
			}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					window.location.replace(resp.url);
				}
				else{
					$('input[name="password"]').focus();
					$(".show-error").text(resp.msg);
					$(".show-error").fadeIn(400);
				}
			});
		});


		$(document).on('submit', 'form.review-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post($form.attr('action'), {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$(".product-reviews-block ul").html(resp.html);
					$('form.review-form').remove();
					$("#orderModal .modal-footer p").html(resp.msg);
					$("#orderModal").modal('show');
					setInterval(function(){
						if (resp.reload == 'yes') {
							location.reload();
						}
					}, 2000)
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
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
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
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
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});



		/**** SEARCH *****/
		/*$(document).on('keyup', '#main-search-bar', function(event) {
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
		});*/
		$(document).on('keyup', '#main-search-bar', function(event) {
			event.preventDefault();
			$this = $(this);
			//headers: {  'Access-Control-Allow-Origin': 'http://The web site allowed to access' },
			$key = $this.val();
			if ($key.length > 1) {
				searchPostData = new Object();
				searchPostData.key = $key;
				$.ajax({
					type: "POST",
					data: searchPostData,
					crossDomain: true,
   					dataType: 'json',
					url: '<?=BASEURL."get-search-ajax"?>',
					/* etc */
					success: function(resp){
						$(".search-list").fadeIn(100);
						if (resp.status == true) {
							$(".search-list").html(resp.html);
						}
						else{
							$(".search-list").html('');
						}
					}
				})
			}
		});

		$(document).on('click', '#main-search-direct-link', function(event) {
			event.preventDefault();
			$key = $("#main-search-bar").val();
			if ($key.length > 1) {
				$url = '<?=BASEURL?>search?type=direct&key='+$key;
				window.location.replace($url);
			}
			
		});

		$(document).on('click', function (e) {
			if ($(e.target).closest(".search-list").length === 0) {
				$(".search-list").hide(0);
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
			$this.prop('id','delete-me-after-'+$this.attr('data-id'));
			$("#order-cancel-pre-modal .cancel-order-second-btn").attr('data-id',$this.attr('data-id'));
			$("#order-cancel-pre-modal .cancel-order-second-btn").attr('data-this','#delete-me-after-'+$this.attr('data-id'));
			$("#order-cancel-pre-modal").modal('show');
			/*$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/cancel-order/"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				$this.hide(0);
				if (resp.status == true) {
					$(".my-cancellation-section").html(resp.html);
					$(".my-pedding-section").html(resp.html2);
					$this.parent('div.top-detail').parent('div.user-order-holder').children('ul').children('li').children('.right-btns').children('span.cancel').html('cancelled');
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});*/
		});
		$(document).on('click', '.cancel-order-second-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$remove = $($this.attr('data-this'));
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/cancel-order/"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				$remove.hide(0);
				$("#order-cancel-pre-modal").modal('hide');
				if (resp.status == true) {
					$(".my-cancellation-section").html(resp.html);
					$(".my-pedding-section").html(resp.html2);
					$remove.parent('div.top-detail').parent('div.user-order-holder').children('ul').children('li').children('.right-btns').children('span.cancel').html('cancelled');
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
			
		});
		$(document).on('click', '.delete-wish-list-btn', function(event) {
			event.preventDefault();
			$this = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/delete-wish-list"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$this.parent('div').parent('li').parent('ul').parent('div').remove();
				}
			});
		});
		$(document).on('submit', '.user-profile-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/update-profile"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$(".user-full-name").text(resp.data.fname+' '+resp.data.lname);
					$(".user-email").text(resp.data.email);
					$(".user-phone").text(resp.data.phone);
					alert('Profile Updated :)');
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});
		$(document).on('click', '.change-item-status', function(event) {
			event.preventDefault();
			$this = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/change-order-item-status"?>', {id: $this.attr('data-id')}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$this.closest('.user-order-holder').children('.top-detail').children('span.total-product').text('Total Product: '+resp.data.total_items);
					$total_amonut = parseInt(resp.data.total_amount) + parseInt(resp.data.delivery_charge) - parseInt(resp.data.discount);
					if (parseInt($total_amonut) == 0) {
						$this.closest('.user-order-holder').children('div.top-detail').children('button.cancel-order-btn').remove();
					}
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
	    	$("#loading").fadeIn(400);
		    $.ajax({
		        type: 'POST',
		        processData: false,
		        contentType: false,
		        data: data,
		        url: '<?=BASEURL?>user/post-photo-ajax/reviews',
		        dataType : 'json',
		        success: function(resp){
		        	$("#loading").fadeOut(400);
		       		if (resp.status == true)
		       		{
		       			$("#uploadMsg").text('');
		       			$('input[name="'+$input+'"]').val(resp.data);
		       		}
		       		else
		       		{
		       			$("#errorModal .modal-footer p").html(resp.msg);
						$("#errorModal").modal('show');
		       			$("#uploadMsg").text('Upload An Image First');
		       		}
		        }
			});
		})

		$(document).on('click', '.btn-add-address', function(event) {
			event.preventDefault();
			$("#modal-add-address-btn").modal('show');
		});
		$(document).on('submit', '#add-address-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/post-user-address"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$(".user-address-book-table tbody").html(resp.html);
					$(".user-address-book-table-checkout-page tbody").html(resp.html2);
					$("#modal-add-address-btn").modal('hide');
				}
				else{
					$("#errorModal").modal('show');
	       			$("#uploadMsg").text(resp.msg);
				}
			});
		});

		$(document).on('click', '.user-address-edit', function(event) {
			event.preventDefault();
			$this = $(this);
			$("#loading").fadeIn(400);
			$country = $this.attr('data-country');
			$state = $this.attr('data-state');
			$city = $this.attr('data-city');
			$("#edit-address-form input[name='id']").val($this.attr('data-id'));
			$("#edit-address-form input[name='receiver_name']").val($this.attr('data-name'));
			$("#edit-address-form input[name='title']").val($this.attr('data-title'));
			$("#edit-address-form input[name='receiver_mobile']").val($this.attr('data-mobile'));
			$("#edit-address-form input[name='receiver_email']").val($this.attr('data-email'));
			$("#edit-address-form input[name='pincode']").val($this.attr('data-pincode'));
			$("#edit-address-form input[name='house_no']").val($this.attr('data-house-no'));
			$("#edit-address-form select[name='country_id'] option").each(function(index, el) {
				if ($(el).val() == $country) {
					$(el).attr('selected','selected');
				}
			});
			$.post('<?=BASEURL."get-state-html"?>', {id: $country}, function(resp) {
				resp = $.parseJSON(resp);
				$("#edit-address-form select[name='state_id']").html(resp.html);
				$("#edit-address-form select[name='state_id'] option").each(function(index, el) {
					if ($(el).val() == $state) {
						$(el).attr('selected','selected');
					}
				});
			});
			$.post('<?=BASEURL."get-city-html"?>', {id: $state}, function(resp) {
				resp = $.parseJSON(resp);
				$("#edit-address-form select[name='city_id']").html(resp.html);
				$("#edit-address-form select[name='city_id'] option").each(function(index, el) {
					if ($(el).val() == $city) {
						$(el).attr('selected','selected');
					}
				});
			});
			$("#loading").fadeOut(400);
			$("#modal-edit-address-btn").modal('show');
		});

		$(document).on('submit', '#edit-address-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/update-user-address"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$(".user-address-book-table tbody").html(resp.html);
					$(".user-address-book-table-checkout-page tbody").html(resp.html2);
					$("#modal-edit-address-btn").modal('hide');
				}
				else{
					$("#errorModal").modal('show');
	       			$("#uploadMsg").text(resp.msg);
				}
			});
		});

		$(document).on('click', '.change-address', function(event) {
			event.preventDefault();
			$("#modal-user-addresses").modal('show');
		});

		$(document).on('click', '.add-address-to-form', function(event) {
			event.preventDefault();
			$this = $(this);

			$(".checkout-form-1 input[name='receiver_name']").val($this.attr('data-name'));
			$(".checkout-form-1-done .checkout_form_receiver_name").val($this.attr('data-name'));

			$(".checkout-form-1 input[name='pincode']").val($this.attr('data-pincode'));
			$(".checkout-form-1-done .checkout_form_pincode").val($this.attr('data-pincode'));

			$(".checkout-form-1 input[name='receiver_mobile']").val($this.attr('data-mobile'));
			$(".checkout-form-1-done .checkout_form_receiver_mobile").val($this.attr('data-mobile'));

			$(".checkout-form-1 .check-out-form-city-input").val($this.attr('data-city-name'));
			$(".checkout-form-1 input[name='city_id']").val($this.attr('data-city'));
			$(".checkout-form-1-done .checkout_form_city_id").val($this.attr('data-city-name'));

			/*$(".checkout-form-1 .check-out-form-socity-input").val($this.attr('data-socity-name'));
			$(".checkout-form-1 input[name='socity_id']").val($this.attr('data-socity'));
			$(".checkout-form-1-done .checkout_form_socity_id").val($this.attr('data-socity-name'));*/

			$(".checkout-form-1 input[name='house_no']").val($this.attr('data-house-no'));
			$(".checkout-form-1-done .checkout_form_house_no").val($this.attr('data-house-no'));

			$(".checkout-form-1 input[name='receiver_email']").val($this.attr('data-email'));
			$(".checkout-form-1-done .checkout_form_receiver_email").val($this.attr('data-email'));

			$("#modal-user-addresses").modal('hide');
		});
		$(document).on('submit', '#newsletter-email-form', function(event) {
			event.preventDefault();
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/save-newsletter"?>', {email: $("#newsletter-email-form input[name='email']").val()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$(".newsletter-btn").remove();
					$(".after-newsletter-btn").show(0);
					$("#modal-newsletter").modal('hide');
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});

		$(document).on('click', '.get-user-order-detail', function(event) {
			event.preventDefault();
			$("#loading").fadeIn(400);
			$id = $(this).attr('data-id');
			$.post('<?=BASEURL.'user/get-order-detail-ajax'?>', {id: $id}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					$("#user-order-detail-modal .modal-body").html(resp.html);
					$("#user-order-detail-modal").modal('show');
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});

		$(document).on('click', '#forgot-password-form .forgot-password-btn-1', function(event) {
			event.preventDefault();
			$this = $(this);
			$mobile = $("#forgot-password-mobile").val();
			if ($mobile.length > 8) {
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."forgot-password-mobile-submit"?>', {mobile: $mobile}, function(resp) {
					$("#loading").fadeOut(400);
					resp = JSON.parse(resp);
					if (resp.status == true) {
						$("#forgot-password-form .first_").addClass('last');
						$("#forgot-password-form .first_").hide(0);
						$("#forgot-password-form .second_").removeClass('last');
						$this.removeClass('forgot-password-btn-1');
						$this.addClass('forgot-password-btn-2');
						$this.text('Submit');
						$("#forgot-password-mobile").prop('disabled','disabled');
						$("#forgot-password-code").removeAttr('disabled','disabled');
					}
					else{
						alert(resp.msg);
					}
				});
			}
		});

		$(document).on('click', '#forgot-password-form .forgot-password-btn-2', function(event) {
			event.preventDefault();
			$this = $(this);
			$mobile = $("#forgot-password-mobile").val();
			$code = $("#forgot-password-code").val();
			if ($mobile.length > 8 && $code.length == 4) {
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."forgot-password-code-submit"?>', {mobile: $mobile, code: $code}, function(resp) {
					$("#loading").fadeOut(400);
					resp = JSON.parse(resp);
					if (resp.status == true) {
						$("#forgot-password-form .second_").addClass('last');
						$("#forgot-password-form .second_").hide(0);
						$("#forgot-password-form .third_").removeClass('last');
						$this.removeClass('forgot-password-btn-2');
						$this.addClass('forgot-password-btn-3');
						$this.text('Submit');
						$("#forgot-password-code").prop('disabled','disabled');
						$("#forgot-password-new").removeAttr('disabled','disabled');
					}
					else{
						alert(resp.msg);
					}
				});
			}
		});

		$(document).on('click', '#forgot-password-form .forgot-password-btn-3', function(event) {
			event.preventDefault();
			$this = $(this);
			$mobile = $("#forgot-password-mobile").val();
			$code = $("#forgot-password-code").val();
			$password = $("#forgot-password-new").val();
			if ($mobile.length > 8 && $code.length == 4 && $password.length > 3) {
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."forgot-password-submit"?>', {mobile: $mobile, code: $code, password: $password}, function(resp) {
					$("#loading").fadeOut(400);
					resp = JSON.parse(resp);
					if (resp.status == true) {
						alert('password is changed, please login with your new password');
						window.location.replace('<?=BASEURL."login"?>');
					}
					else{
						alert(resp.msg);
					}
				});
			}
			else{
				alert('password lenght is not valid, please enter minimum 4 characters');
			}
		});
		$(document).on('submit', '.change-password-form', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."user/change-password-submit"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
	                $("#orderModal .modal-footer p").html(resp.msg);
	                $("#orderModal").modal('show');
	            }
	            else{
	                $("#errorModal .modal-footer p").html(resp.msg);
	                $("#errorModal").modal('show');
	            }
			});
		});

		/**
		*
		*
		*
		*	SELLER SIDE
		*
		*
		**/
		$(document).on('click', '#seller-forgot-password-form .forgot-password-btn-1', function(event) {
			event.preventDefault();
			$this = $(this);
			$mobile = $("#seller-forgot-password-mobile").val();
			$email = $("#seller-forgot-password-email").val();
			if ($mobile.length > 8 && $email.length > 8) {
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."seller-forgot-password-mobile-submit"?>', {mobile: $mobile, email: $email}, function(resp) {
					$("#loading").fadeOut(400);
					resp = JSON.parse(resp);
					if (resp.status == true) {
						$("#seller-forgot-password-form .first_").addClass('last');
						$("#seller-forgot-password-form .first_").hide(0);
						$("#seller-forgot-password-form .second_").removeClass('last');
						$this.removeClass('forgot-password-btn-1');
						$this.addClass('forgot-password-btn-2');
						$this.text('Submit');
						$("#seller-forgot-password-mobile").prop('disabled','disabled');
						$("#seller-forgot-password-email").prop('disabled','disabled');
						$("#seller-forgot-password-code").removeAttr('disabled','disabled');
					}
					else{
						alert(resp.msg);
					}
				});
			}
		});

		$(document).on('click', '#seller-forgot-password-form .forgot-password-btn-2', function(event) {
			event.preventDefault();
			$this = $(this);
			$mobile = $("#seller-forgot-password-mobile").val();
			$email = $("#seller-forgot-password-email").val();
			$code = $("#seller-forgot-password-code").val();
			if ($mobile.length > 8 && $code.length == 4) {
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."seller-forgot-password-code-submit"?>', {mobile: $mobile,email: $email, code: $code}, function(resp) {
					$("#loading").fadeOut(400);
					resp = JSON.parse(resp);
					if (resp.status == true) {
						$("#seller-forgot-password-form .second_").addClass('last');
						$("#seller-forgot-password-form .second_").hide(0);
						$("#seller-forgot-password-form .third_").removeClass('last');
						$this.removeClass('forgot-password-btn-2');
						$this.addClass('forgot-password-btn-3');
						$this.text('Submit');
						$("#seller-forgot-password-code").prop('disabled','disabled');
						$("#seller-forgot-password-new").removeAttr('disabled','disabled');
					}
					else{
						alert(resp.msg);
					}
				});
			}
		});

		$(document).on('click', '#seller-forgot-password-form .forgot-password-btn-3', function(event) {
			event.preventDefault();
			$this = $(this);
			$mobile = $("#seller-forgot-password-mobile").val();
			$email = $("#seller-forgot-password-email").val();
			$code = $("#seller-forgot-password-code").val();
			$password = $("#seller-forgot-password-new").val();
			if ($mobile.length > 8 && $email.length > 8 && $code.length == 4 && $password.length > 3) {
				$("#loading").fadeIn(400);
				$.post('<?=BASEURL."seller-forgot-password-submit"?>', {mobile: $mobile, email: $email, code: $code, password: $password}, function(resp) {
					$("#loading").fadeOut(400);
					resp = JSON.parse(resp);
					if (resp.status == true) {
						alert('password is changed, please login with your new password');
						window.location.replace('<?=BASEURL."seller-login"?>');
					}
					else{
						alert(resp.msg);
					}
				});
			}
			else{
				alert('password lenght is not valid, please enter minimum 4 characters');
			}
		});



		$(document).on('submit', '.seller-signup-form-1', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."post-seller-signup-form-1"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == true) {
					// window.location.replace('<?=BASEURL."seller-signup-step"?>');
					window.location.replace('<?=BASEURL."seller/index"?>');
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});
		$(document).on('click', '.resend_code', function(event) {
			event.preventDefault();
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."reset-seller-mobile-varification-code"?>', {data: true}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (res.status == true) {
					$html = '<form><input type="number" name="code" class="form-control" required="required"><button type="submit" class="btn btn-success">Save</button></form>';
					var minute = 9;
					var sec = 60;
					setInterval(function() {
						document.getElementById("CountDown").innerHTML = minute + " : " + sec;
						sec--;
						if (sec == 00) {
							minute --;
							sec = 60;
							if (minute == 0) {
								document.getElementById("varification_code_form_block").innerHTML = '';
								document.getElementById("CountDown").innerHTML = "0 : 00";
							}
						}
					}, 1000);
				}
				else{
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
			});
		});

		$(document).on('submit', '#varification_code_form_block form', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."varify-seller-mobile"?>', {code: $("#varification_code_form_block form input[name='code']").val()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == false) {
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
				else{
					window.location.replace('<?=BASEURL."seller-signup-step"?>');
				}
			});
		});

		$(document).on('submit', '.seller-signup-form-3', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."submit-seller-signup-form-3"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == false) {
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
				else{
					window.location.replace('<?=BASEURL."seller-signup-step"?>');
				}
			});
		});

		$(document).on('submit', '.login-form-seller', function(event) {
			event.preventDefault();
			$form = $(this);
			$("#loading").fadeIn(400);
			$.post('<?=BASEURL."submit-seller-login"?>', {data: $form.serialize()}, function(resp) {
				resp = JSON.parse(resp);
				$("#loading").fadeOut(400);
				if (resp.status == false) {
					$("#errorModal .modal-footer p").html(resp.msg);
					$("#errorModal").modal('show');
				}
				else{
					window.location.replace('<?=BASEURL."seller/index"?>');
				}
			});
		});


		/*LOGIN FB/GOOGLE*/

	        window.fbAsyncInit = function() {
	            FB.init({
	                appId: '207733971372762',
	                cookie: true,
	                xfbml: true,
	                version: 'v3.0'
	            });

	            FB.AppEvents.logPageView();

	            document.getElementById('fbbutton').addEventListener('click', function() {
	                //do the login
	                FB.login(statusChangeCallback, {
	                    scope: 'public_profile,email',
	                    return_scopes: true
	                });
	            }, false);

	        };

	        (function(d, s, id) {
	            var js, fjs = d.getElementsByTagName(s)[0];
	            if (d.getElementById(id)) {
	                return;
	            }
	            js = d.createElement(s);
	            js.id = id;
	            js.src = "https://connect.facebook.net/en_US/sdk.js";
	            fjs.parentNode.insertBefore(js, fjs);
	        }(document, 'script', 'facebook-jssdk'));

	        function statusChangeCallback(response) {
	            FB.api('/me', {
	                fields: 'name,email'
	            }, function(response) {
	            	console.log(response);
	                $.post('<?=BASEURL.'social-signup'?>', {
	                    'res': response,
	                    'action': 'facebook'
	                }, function(resp) {
	                    resp = $.parseJSON(resp);
	                    if (resp.status == false) {
	                        $("#errorModal .modal-footer p").html('Something Went Wrong Try Again later.!');
							$("#errorModal").modal('show');
	                    }
	                    else {
	                        window.location.replace(resp.url);
	                    }
	                });
	            });
	        }

	        /* CITY/STATE/COUNTRY */
	        $(document).on('change', 'select[name="country_id"]', function(event) {
	        	event.preventDefault();
	        	$id = $(this).val();
	        	$('select[name="state_id"]').html('<option value="">Select</option>');
	        	$('select[name="city_id"]').html('<option value="">Select</option>');
	        	$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."get-state-html"?>', {id: $id}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$("#loading").fadeOut(400);
	        		if (resp.status == true) {
	        			$('select[name="state_id"]').html(resp.html);
	        		}
	        		else{
	        			alert(resp.msg);
	        		}
	        	});
	        });
	        $(document).on('change', 'select[name="state_id"]', function(event) {
	        	event.preventDefault();
	        	$id = $(this).val();
	        	$('select[name="city_id"]').html('<option value="">Select</option>');
	        	$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."get-city-html"?>', {id: $id}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$("#loading").fadeOut(400);
	        		if (resp.status == true) {
	        			$('select[name="city_id"]').html(resp.html);
	        		}
	        		else{
	        			alert(resp.msg);
	        		}
	        	});
	        });

	        $(document).on('click', '.brand-page-cat-li', function(event) {
	        	event.preventDefault();
	        	$this = $(this);
	        	$(".brand-page-cat-li").removeClass('active');
	        	$this.addClass('active');
	        	$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."get-brand-pros-bycat"?>', {cat: $this.attr('data-cat'),brand: $this.attr('data-brand')}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$(".brand-page-listing").html(resp.html);
	        		$(".cat-pro-count").html(resp.count);
	        		$("#loading").fadeOut(400);
	        	});
	        });


	        //USER CARDS
	        $(document).on('change', '.primary-card-click', function(event) {
	        	event.preventDefault();
	        	$this = $(this);
	        	$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."user/change-card-type"?>', {id: $this.attr('data-id'),type: 'primary'}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$("#loading").fadeOut(400);
	        		if (resp.status == true) {
	        			location.reload();
	        		}
	        		else{
	        			alert(resp.msg);
	        		}
	        	});
	        });
	        $(document).on('change', '.secondary-card-click', function(event) {
	        	event.preventDefault();
	        	$this = $(this);
	        	$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."user/change-card-type"?>', {id: $this.attr('data-id'),type: 'secondary'}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$("#loading").fadeOut(400);
	        		if (resp.status == true) {
	        			location.reload();
	        		}
	        		else{
	        			alert(resp.msg);
	        		}
	        	});
	        });

	        $(document).on('change', '#change-customer-card-select', function(event) {
	        	event.preventDefault();
	        	$this = $(this);
	        	$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."get-single-card-ajax"?>', {id: $this.val()}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$("#loading").fadeOut(400);
	        		if (resp.status == true) {

	        			$("input[name='card_name']").val(resp.card.name);
	        			$("input.checkout_form_card_name_to_hide").val(resp.card.name);
	        			$("input.checkout_form_card_name").val(resp.card.name);

	        			$("input[name='card_number']").val(resp.card.number);
	        			$("input.checkout_form_card_number_to_hide").val('xxxxxxxxxxxx'+resp.card.number[12]+resp.card.number[13]+resp.card.number[14]+resp.card.number[15]);
	        			$("input.checkout_form_card_number").val(resp.card.number);
	        		}
	        		else{
	        			alert(resp.msg);
	        		}
	        	});
	        });

	        $(document).on('submit', '#modal-add-card-form', function(event) {
	        	event.preventDefault();
	        	$form = $(this);
    			$("#loading").fadeIn(400);
	        	$.post('<?=BASEURL."submit-card"?>', {data: $form.serialize()}, function(resp) {
	        		resp = $.parseJSON(resp);
	        		$("#modal-add-card").modal('show');
	        		if (resp.status == true) {
	        			$("#modal-add-card").modal('show');

	        			$("#loading").fadeOut(400);

	        			$("#change-customer-card-select").html(resp.html);

	        			$("input[name='card_name']").val(resp.card.name);
	        			$("input.checkout_form_card_name_to_hide").val(resp.card.name);
	        			$("input.checkout_form_card_name").val(resp.card.name);

	        			$("input[name='card_number']").val(resp.card.number);
	        			$("input.checkout_form_card_number_to_hide").val('xxxxxxxxxxxx'+resp.card.number[12]+resp.card.number[13]+resp.card.number[14]+resp.card.number[15]);
	        			$("input.checkout_form_card_number").val(resp.card.number);

	        		}
	        		else{
	        			alert(resp.msg);
	        		}
	        	});
	        });
	        
		});//onload
	</script>

</html>

<div id="loading" style="display: none;"><img id="loading-image" src="<?=IMG?>Easy-Door-gifmaker.gif" alt="Loading..." /></div>




<!-- Order Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="img-holder">
        	<img src="<?=IMG?>bg-order.png" alt="image">
        </div>
      </div>
      <div class="modal-footer">
      	<p></p>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- Order Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      	<div class="img-holder">
        	<img src="<?=IMG?>bg-error.png" alt="image">
        </div>
      </div>
      <div class="modal-footer">
      	<p></p>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="modal-add-address-btn">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">+ Add Address</h4>
			</div>
			<div class="modal-body">
				

				<form id="add-address-form">
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
					<!-- <div class="form-group">
						<label for="">Socity</label>
						<select class="form-control" name="socity_id">
							<option value="">Select Socity</option>
							<?php foreach ($socities as $key => $socity): ?>
								<option value="<?=$socity['socity_id']?>"><?=$socity['socity_name']?></option>
							<?php endforeach ?>
						</select>
					</div> --><!-- /form-group -->
					<div class="form-group">
						<label for="">House *</label>
						<input class="form-control" type="text" name="house_no" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Save</button>
					</div><!-- /form-group -->
				</form>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div><!-- /modal-add-address-btn -->





<div id="PreLoaderWebsite"><img src="<?=IMG.'website-preloader.gif'?>"></div>
<style>
#PreLoaderWebsite{
	display: none;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: rgba(0,0,0,.9);
    z-index: 10000;
    transition: all 0s ease;
    -webkit-transition: all 0s ease;
    -moz-transition: all 0s ease;
    -khtml-transition: all 0s ease;
    -o-transition: all 0s ease;
    overflow: auto;
}
#PreLoaderWebsite img{
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 100%;
}
</style>








<div class="modal fade" id="user-order-detail-modal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="background: #ff6c00;color:#fff;text-transform: uppercase;letter-spacing: 1px;">
				<h4 class="modal-title">Order Detail</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">

				<div class="address-detail">
					<h2>Address</h2>
					<p>
						<strong>address</strong>: house no <br>
						<strong>town</strong>: model town <br>
						<strong>city</strong>: lahore <br>
						<strong>postcode</strong>: 54000 <br>
						<strong>name</strong>: M Ab Khan <br>
						<strong>mobile</strong>: 0333125545 <br>
						<strong>email</strong>: mail@domain.com <br>
						<strong>dated</strong>: 02-02-2021
					</p>
				</div><!-- /address-detail -->
				<table class="table table-bordered table-hover">
					<thead>
						<th>Product</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Detail</th>
						<th>Status</th>
					</thead>
					<tbody>
						<tr>
							<td>Product Name</td>
							<td>2000</td>
							<td>2</td>
							<td>
								<p><strong>size:</strong> M</p>
								<p><strong>color:</strong> red</p>
							</td>
							<td>status</td>
						</tr>
						<tr>
							<td colspan="3" align="right">Delivery Charge</td>
							<td colspan="2">130</td>
						</tr>
						<tr>
							<td colspan="3" align="right">Total</td>
							<td colspan="2">2130</td>
						</tr>
					</tbody>
				</table>
				
			</div><!-- /modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			</div><!-- /modal-footer -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- /user-order-detail-modal -->










<div class="modal fade" id="order-cancel-pre-modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background: #ff6c00;color:#fff;text-transform: uppercase;letter-spacing: 1px;">
				<h4 class="modal-title">Order Cancel</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">
				<p>are sure! you want to cancel your order ?</p>
				<button type="button" class="btn btn-danger cancel-order-second-btn" data-id="" data-this="">YES</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">No</button>
			</div><!-- /modal-body -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- /order-cancel-pre-modal -->

<style>
.float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:40px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
  	font-size:30px;
	box-shadow: 2px 2px 3px #999;
  	z-index:100;
}

.my-float{
	margin-top:16px;
}
</style>
