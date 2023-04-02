<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K69RTPC');</script>
<!-- End Google Tag Manager -->
  	<title><?=$meta_title?></title>
	<meta name="keywords" content="<?=$meta_key?>">
	<meta name="description" content="<?=$meta_desc?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
	   <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-T8SRFQD1G7"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-T8SRFQD1G7');
</script>
	<!-- <link rel="stylesheet" type="text/css" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/164071/drift-basic.css"> -->
	<link rel="stylesheet" type="text/css" href="<?=CSS?>style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<style>
	.hide{
		display: none;
	}
	.item_holder{
		top: 0;
		left: 0;
	    opacity: 0;
	    visibility: hidden;
		height: 100%;
		width: 360px;
		z-index: 9999;
		position: fixed;
		padding: 30px 0;
		background: #fff;
		overflow-x: hidden;
		transition: all .5s;
		transform: translateX(-360px);
	}
	.item_holder.left{
	    opacity: 1;
	    visibility: visible;
		transform: translateX(0px);
	}
	.item_holder.new{
		overflow: visible;
		transform: translateX(-360px);
	}
	.more{
		z-index: 99;
		color:  #000;
		display: block;
		font-size: 13px;
		background: #fff;
		font-weight: 600;
		position: relative;
		padding: 11px 34px 0; 
		text-transform: capitalize;
	}
	.more:after{
		top: 50%;
		left: 130px;
		width: 12px;
		height: 7px;
		content: "";
		margin: 2px 0 0;
		position: absolute;
		transition: all .5s;
		-webkit-transition: all .5s;
		background: url(https://easydoor.pk/assets/images/arrow.png) no-repeat;
	}
	.more.less:after{
		transform: rotate(180deg);
	}
	.side-drop .holder-1 > ul > li.new-menu .sub-menu{
		opacity: 1;
		visibility: visible;
		transform: translateX(360px);
	}
	.side-drop .holder-1 > ul > li .sub-menu{
		opacity: 0;
		visibility: hidden;

	}
</style>
</head>

<body class="main-page">
	<!-- <div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0&appId=207733971372762&autoLogAppEvents=1" nonce="Vrc8ymZA"></script> -->
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K69RTPC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="wrapper" class="<?=$main_page_class?>">
		<div class="desktop">
			<div class="top-header">
				<div class="container">
					<div class="email">
						<i class="fa fa-envelope" aria-hidden="true"></i>
						<a href="mailto:<?=$settings[11]['value']?>"><?=$settings[11]['value']?></a>
					</div>
					<div class="right-panel">
						<ul>
							<?php if ($_SESSION['user']): ?>
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
									<i class="fa fa-user" aria-hidden="true"></i>
									<a href="<?=BASEURL.'user/'?>">my Account</a>
								</li>
								<li>
									<i class="fa fa-heart" aria-hidden="true"></i>
									<a href="<?=BASEURL.'user/my-wishlist'?>">my wishlist</a>
								</li>
								<li>
									<i class="fa fa-lock" aria-hidden="true"></i>
									<a href="<?=BASEURL.'logout/'?>">logout</a>
								</li>
							<?php elseif ($_SESSION['seller']): ?>
								<li>
									<i class="fa fa-user" aria-hidden="true"></i>
									<a href="<?=BASEURL.'seller/'?>">dashboard</a>
								</li>
								<li>
									<i class="fa fa-lock" aria-hidden="true"></i>
									<a href="<?=BASEURL.'logout/'?>">logout</a>
								</li>
							<?php else: ?>
								<li>
									<i class="fa fa-lock" aria-hidden="true"></i>
									<a href="<?=BASEURL.'login/'?>">User login</a>
								</li>
								<li>
									<i class="fa fa-lock" aria-hidden="true"></i>
									<a href="<?=BASEURL.'seller-login/'?>">Seller login</a>
								</li>
								<li>
									<i class="fa fa-lock" aria-hidden="true"></i>
									<a href="<?=BASEURL.'seller-signup/'?>">Seller Registration</a>
								</li>
							<?php endif ?>
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
						<input type="search" id="main-search-bar" name="search" placeholder="search Product" value="<?=$search_key?>">
						<button type="submit" id="main-search-direct-link">search</button>
						<style>
						.search-list{
							position: relative;
							width: 100%;
							background: #fff;
							list-style: none;
							padding: 20px;
							z-index: 1000;
							display: none;
						}
						</style>
						<ul class="search-list"></ul><!-- /search-list -->
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

			
			<?php if (1 == 2): ?>
				<nav id="nav" style="background: transparent;z-index: 1000;">
					<a class="menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
					<div class="container">

						<div class="side-menu">
							<i class="fa fa-bars" aria-hidden="true"></i>
							all categories
							<ul class="side-drop">
								<?php foreach ($parents as $key => $cat_): ?>
									<?php if ($cat_['main_right_menu'] == 'yes'): ?>
										<li>
											<a href="<?=BASEURL.'listing/'.$cat_['slug'].'/'?>"><?=$cat_['title']?></a>
											<?php
											$child = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '".$cat_['id']."' AND `status` = '1' ");
	                                        if ($child->num_rows()>0){
	                                        ?>
	                                        	<ul class="side-drop-menu">
			                                        <?php
			                                        foreach ($child->result_array() as $CCat1){ 
		                                        	?>
			                                        	<li>
			                                        		<a href="<?=BASEURL.'listing/'.$CCat1['slug'].'/'?>"><?=$CCat1['title']?></a>
			                                        		<?php
			                                        		$child2 = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '".$CCat1['id']."' AND `status` = '1' ");
	                                        				if ($child2->num_rows()>0){
	                                        				?>
	                                        					<ul class="side-drop-level-2">
		                                        					<?php
		                                        					foreach ($child2->result_array() as $CCat2) {
		                                        					?>
		                                        						<li>
		                                        							<a href="<?=BASEURL.'listing/'.$CCat2['slug'].'/'?>"><?=$CCat2['title']?></a>
		                                        							<?php
		                                        							$child3 = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '".$CCat2['id']."' AND `status` = '1' ");
	                                        								if ($child3->num_rows()>0){
	                                        								?>
	                                        									<ul class="side-drop-level-3">
	                                        										<?php
	                                        										foreach ($child3->result_array() as $CCat3) {
	                                        										?>
	                                        											<li><a href="<?=BASEURL.'listing/'.$CCat3['slug'].'/'?>"><?=$CCat3['title']?></a></li>
	                                        										<?php
	                                        										}
	                                        										?>
	                                        									</ul>
	                                        								<?php
	                                        								}
		                                        							?>
		                                        						</li>
		                                        					<?php	
	                                        						}	
		                                        					?>
	                                        					</ul>
	                                        				<?php
	                                        				}
			                                        		?>
			                                        	</li>
			                                        <?php
			                                        }
			                                        ?>
	                                        	</ul>
	                                        <?php
	                                        }
											?>
										</li>
									<?php endif ?>
								<?php endforeach ?>
							</ul>
						</div><!-- /side-menu -->

						<?php if (1==2): ?>
							<ul class="main-menu">
								<?php foreach ($main_menu as $key => $cat): ?>
									<?php if ($cat['main_menu'] == 'yes'): ?>
										<li>
											<a href="<?=BASEURL.'listing/'.$cat['slug'].'/'?>">
												<img src="<?=IMG?>img1.png" align="image">
												<?=$cat['title']?>
												<i class="fa fa-caret-down" aria-hidden="true"></i>
											</a>
											<?php
												$parent = $cat['id'];
												$child2 = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '$parent';");
		                                        if ($child2->num_rows()>0){
		                                        ?>
													<ul class="dropdown">
														<?php foreach ($child2->result_array() as $key => $cat3): ?>
															<li><a href="<?=BASEURL.'listing/'.$cat3['slug'].'/'?>"><?=$cat3['title']?></a></li>
														<?php endforeach ?>
													</ul>
		                                        <?php
		                                        }
											?>
										</li>
									<?php endif ?>
								<?php endforeach ?>
							</ul>
						<?php endif ?>
					</div><!-- /container -->
				</nav>
			<?php endif ?>


			<!-- New Menu -->
			<?php if ($parents && $user_panel == false): ?>
				<nav id="nav">
					<a class="menu" href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>

					<div class="container">
						<button class="btn-shut"><img src="<?=IMG?>bg-close.png" alt="image"></button>
						<div class="side-menu">
							<i class="fa fa-bars" aria-hidden="true"></i>
							<span class="side-menu-clcik">all categories</span>
							<div class="item_holder">
								<div class="side-drop">
									<?php foreach ($parents as $key => $cat_): ?>
										<div class="holder-1 items">
											<h2><?=$cat_['title']?></h2>
											<?php
											$child = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '".$cat_['id']."' AND `status` = '1' ");
	                                        if ($child->num_rows()>0){
	                                        ?>
	                                        	<ul class="main-nav">
	                                        		<?php
				                                    foreach ($child->result_array() as $CCat1){ 
		                                        	?>
													<li class="term-item">
														<a href="#"><?=$CCat1['title']?></a>
														<?php
		                                        		$child2 = $this->db->query("SELECT `id`,`title`,`slug` FROM `categories` WHERE `parent` = '".$CCat1['id']."' AND `status` = '1' ");
	                                    				if ($child2->num_rows()>0){
	                                    				?>
															<div class="sub-menu">
																<button class="close-btn"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button>
																<ul>
																	<?php
		                                        					foreach ($child2->result_array() as $CCat2) {
		                                        					?>
																		<li><a href="<?=BASEURL.'listing/'.$CCat2['slug'].'/'?>"><?=$CCat2['title']?></a></li>
		                                        					<?php
		                                        					}
		                                        					?>
																</ul>
															</div>
	                                    				<?php
	                                    				}
	                                    				?>
													</li>
													<?php } ?>
												</ul>
	                                        <?php
	                                        }
	                                        ?>
										</div>
									<?php endforeach ?>

								</div><!-- /side-drop -->
							</div><!-- / item_holder -->
						</div><!-- /side-menu -->						
					</div><!-- /container -->
				</nav>			
			<?php endif ?>
			<!-- New Menu -->

		</div><!-- /desktop -->





