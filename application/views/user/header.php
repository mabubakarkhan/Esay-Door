<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$meta_title?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=CSS?>style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
</head>
<body>

	<div id="wrapper">
		<div class="top-header">
			<div class="container">
				<div class="email">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<a href="mailto:<?=$settings[11]['value']?>"><?=$settings[11]['value']?></a>
				</div>
				<div class="right-panel">
					<ul>
						<li>
							<?php if ($_SESSION['user']['signup_type'] == 'phone'): ?>
								<i class="fa fa-mobile" aria-hidden="true"></i>
								<a href="javascript://"><?=$_SESSION['user']['phone']?></a>
							<?php else: ?>
								<i class="fa fa-user" aria-hidden="true"></i>
								<a href="javascript://"><?=$_SESSION['user']['fname'].' '.$_SESSION['user']['lname']?></a>
							<?php endif ?>
						</li>
						<li>
							<i class="fa fa-heart" aria-hidden="true"></i>
							<a href="<?=BASEURL.'user/my-wishlist'?>">my wishlist</a>
						</li>
						<li>
							<i class="fa fa-lock" aria-hidden="true"></i>
							<a href="<?=BASEURL.'logout'?>">logout</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<header id="header">
			<div class="container">
				<div class="logo">
					<a href="<?=BASEURL?>">
						<img src="<?=IMG?>logo.png" alt="image">
					</a>
				</div>
				<div class="search-holder">
					<i class="fa fa-search" aria-hidden="true"></i>
					<input type="search" name="search" placeholder="search Product">
					<button type="submit">search</button>
				</div>
				<div class="cart-holder">
					<a href="#" class="google">
						<img src="<?=IMG?>bg-google.png" alt="image">
					</a>
					<a class="cart" href="<?=BASEURL.'check-out'?>">
						<img src="<?=IMG?>bg-cart.png" alt="image">
						<?php
						$cartCount = count($_SESSION['cart']);
						if ($cartCount > 0) {
						?>
							<span class="counter cart-counter"><?=$cartCount?></span>
						<?php	
						}
						else{
						?>
							<span class="counter cart-counter">0</span>
						<?php
						}
						?>
					</a>
				</div>
			</div>
		</header>

		<div class="dashbord-content" id="user-panel">
			<a class="mobile-left-menu" href="javascript://"><i class="fa fa-bars" aria-hidden="true"></i></a>
			<div class="container">
				<div class="left-bar">
					<div class="user-box">
						<img src="<?=IMG?>img135.png" alt="image">
						<div class="user-text">
							<span>Hello,</span>
							<strong><?=$user['fname'].' '.$user['lname']?></strong>
						</div>
					</div>
					<div id="accordion1" class="myaccordion">
					  <div class="card">
					    <div class="card-header" id="headingOne">
					      <h2 class="mb-0">
					        <button class="btn btn-link <?=$manage_account_menu?>" data-toggle="collapse" data-target="#collapseOne" aria-expanded="<?=$manage_account_menu_true?>" aria-controls="collapseOne">
					        	<img src="<?=IMG?>img149.png" class="img-1"> 
					        	Manage My Account
					        </button>
					      </h2>
					    </div>
					    <div id="collapseOne" class="collapse <?=$manage_account_menu?>" aria-labelledby="headingOne" data-parent="#accordion1">
					    	<div class="card-body">
					        <ul class="nav nav-tab" id="myTab" role="tablist">
					        	
					        	<li class="nav-item">
									<a class="nav-link <?=$page_dashboard?>" href="<?=BASEURL.'user/dashboard'?>">Manage My Account</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_my_profile?>" href="<?=BASEURL.'user/my-profile'?>">My Profile</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_address_book?>" href="<?=BASEURL.'user/address-book'?>">Address Book</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">My Payment Options</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_vouchers?>" href="<?=BASEURL.'user/vouchers'?>">Vouchers</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingTwo">
					      <h2 class="mb-0">
					        <button class="btn btn-link <?=$orders_menu?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="<?=$orders_menu_true?>" aria-controls="collapseTwo">
					        		<img src="<?=IMG?>img150.png">
					          	My Orders
					        </button>
					      </h2>
					    </div>
					    <div id="collapseTwo" class="collapse <?=$orders_menu?>" aria-labelledby="headingTwo" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tab" id="myTab" role="tablist">
					        	<li class="nav-item">
									<a class="nav-link <?=$page_my_orders?>" href="<?=BASEURL.'user/my-orders'?>">My Orders</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_my_delivered?>" href="<?=BASEURL.'user/my-delivered'?>">My Delivered</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_my_returns?>" href="<?=BASEURL.'user/my-returns'?>">My Returns</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_my_cancellation?>" href="<?=BASEURL.'user/my-cancellation'?>">My Cancellation</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingTwo2">
					      <h2 class="mb-0">
					        <button class="btn btn-link <?=$cards_menu?>" data-toggle="collapse" data-target="#collapseTwo2" aria-expanded="<?=$cards_menu_true?>" aria-controls="collapseTwo2">
					        		<img src="<?=IMG?>img150.png">
					          	My Payments Options
					        </button>
					      </h2>
					    </div>
					    <div id="collapseTwo2" class="collapse <?=$cards_menu?>" aria-labelledby="headingTwo2" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tab" id="myTab" role="tablist">
					        	<li class="nav-item">
									<a class="nav-link <?=$page_cards?>" href="<?=BASEURL.'user/cards'?>">Cards</a>
								</li>
								<li class="nav-item">
									<a class="nav-link <?=$page_add_card?>" href="<?=BASEURL.'user/add-card/'?>">Add Card</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingThree">
					      <h2 class="mb-0">
					        <button class="btn btn-link <?=$my_reviews_menu?>" data-toggle="collapse" data-target="#collapseThree" aria-expanded="<?=$my_reviews_menu_true?>" aria-controls="collapseThree">
					        	<img src="<?=IMG?>img151.png" alt="image">
					          	My Reviews
					        </button>
					      </h2>
					    </div>
					    <div id="collapseThree" class="collapse <?=$my_reviews_menu?>" aria-labelledby="headingThree" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tab" id="myTab" role="tablist">
					          <li class="nav-item">
									<a class="nav-link <?=$page_my_reviews?>" href="<?=BASEURL.'user/my-reviews'?>">My Reviews</a>
								</li>
					        </ul>
					      </div>
					    </div>
					  </div>
					  <div class="card">
					    <div class="card-header" id="headingThree1">
					      <h2 class="mb-0">
					        <button class="btn btn-link <?=$my_wishlist_menu?>" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="<?=$my_wishlist_menu_true?>" aria-controls="collapseThree1">
					        	<img src="<?=IMG?>img152.png" alt="image">
					          	My Wishlist
					        </button>
					      </h2>
					    </div>
					    <div id="collapseThree1" class="collapse <?=$my_wishlist_menu?>" aria-labelledby="headingThree1" data-parent="#accordion1">
					      <div class="card-body">
					        <ul class="nav nav-tab" id="myTab" role="tablist">
					        	<li class="nav-item">
									<a class="nav-link <?=$page_my_wishlist?>" href="<?=BASEURL.'user/my-wishlist'?>">My Wishlist</a>
								</li>
								
					        </ul>
					      </div>
					    </div>
					  </div>
					  <!-- <div class="card">
					    <div class="card-header" id="headingThree11">
					      <h2 class="mb-0">
					        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
					        	<img src="<?=IMG?>img153.png" alt="image">
					          	Sell on Easy Door
					        </button>
					      </h2>
					    </div>
					  </div> -->
					  
					</div>
				</div>
				<!-- header -->