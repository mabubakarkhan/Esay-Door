<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?=CSS?>style.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />


</head>
<body>

	<div id="wrapper">
		<div class="seller-header">
			<div class="fluid-container">
				<a class="seller-logo">
					<img src="<?=IMG?>logo.png" alt="logo">
				</a>
				<div class="right-panel">
					<a class="email" href="mailto:info@easydoor.com"><?=$user['email']?></a>
					<a class="access" href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						Easy Access
						<i class="fa fa-sort-desc" aria-hidden="true"></i>
					</a>
				</div> 
			</div>    
		</div>
		<div class="dashbord-content">
			<a class="mobile-left-menu" href="javascript://"><i class="fa fa-bars" aria-hidden="true"></i></a>
			<div class="left-bar">
				<div id="accordion" class="myaccordion">
				  <div class="card">
				    <div class="card-header" id="headingOne">
				      <h2 class="mb-0">
				        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
				        	<img src="<?=IMG?>bg-dashboard.png">
				        	Dashboard
				        </button>
				      </h2>
				    </div>
				    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
				    	<div class="card-body">
				        <ul class="nav nav-tabs" id="myTab" role="tablist">
				        	<li class="nav-item">
								<a class="nav-link" id="dashboard" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard-tab" aria-selected="true">Dashboard</a>
							</li>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingTwo">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				        	<img src="<?=IMG?>bg-product.png" alt="image">
				          	Products
				        </button>
				      </h2>
				    </div>
				    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				      <div class="card-body">
				        <ul class="nav nav-tabs" id="myTab" role="tablist">
				        	<li class="nav-item">
								<a class="nav-link" id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true">Manage Products</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="Products-tab" data-toggle="tab" href="#Products" role="tab" aria-controls="Products" aria-selected="false">Add Products</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="media-tab" data-toggle="tab" href="#media" role="tab" aria-controls="media" aria-selected="false">Media Center</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="manage-tab" data-toggle="tab" href="#manage" role="tab" aria-controls="manage" aria-selected="false">Manage image</a>
							</li>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
				        	<img src="<?=IMG?>bg-promotions.png" alt="image">
				          	Promotions
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
				      <div class="card-body">
				        <ul class="nav nav-tabs" id="myTab" role="tablist">
				          <li class="nav-item">
								<a class="nav-link" id="campaign-tab" data-toggle="tab" href="#campaign" role="tab" aria-controls="campaign" aria-selected="true">campaign</a>
							</li>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree1">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
				        	<img src="<?=IMG?>bg-finance.png" alt="image">
				          	Finance
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree1" class="collapse" aria-labelledby="headingThree1" data-parent="#accordion">
				      <div class="card-body">
				        <ul class="nav nav-tabs" id="myTab" role="tablist">
				        	<li class="nav-item">
								<a class="nav-link" id="statements-tab" data-toggle="tab" href="#statements" role="tab" aria-controls="statements" aria-selected="true">Account statements</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Order overview</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="transaction-tab" data-toggle="tab" href="#transaction" role="tab" aria-controls="transaction" aria-selected="true">Transaction overview</a>
							</li>
				        </ul>
				      </div>
				    </div>
				  </div>
				  <div class="card">
				    <div class="card-header" id="headingThree11">
				      <h2 class="mb-0">
				        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree11" aria-expanded="false" aria-controls="collapseThree11">
				        	<img src="<?=IMG?>bg-account.png" alt="image">
				          	Account & Settings
				        </button>
				      </h2>
				    </div>
				    <div id="collapseThree11" class="collapse" aria-labelledby="headingThree11" data-parent="#accordion">
				      <div class="card-body">
				        <ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item">
								<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="true">User Management</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Account settings</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Chat settings</a>
							</li>
				        </ul>
				      </div>
				    </div>
				  </div>
				</div>
			</div>
			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
			  	<div class="dash-holder">
			  		<div class="d-top">
			  			<span class="left">Welcome ! Complete Your to-do List and Earn 1 Free Quota of</span>
			  			<span class="right">0% completed, keep up the good work!</span>
			  		</div>
			  		<div class="d-columns">
			  			<a href="#" class="column active">
			  				<span class="icon">
			  					<i class="fa fa-map-marker" aria-hidden="true"></i>
			  					<strong>Manage Address Book</strong>
			  				</span>
			  				<em>Start to sell</em>
			  			</a>
			  			<a href="#" class="column">
			  				<span class="icon">
			  					<i class="fa fa-shield" aria-hidden="true"></i>
			  					<strong>Verify Corporate File</strong>
			  				</span>
			  				<em>Safegurad your account</em>
			  			</a>
			  			<a href="#" class="column">
			  				<span class="icon">
			  					<i class="fa fa-university" aria-hidden="true"></i>
			  					<strong>Fill in Bank Information</strong>
			  				</span>
			  				<em>To receive your money</em>
			  			</a>
			  			<a href="#" class="column">
			  				<span class="icon">
			  					<i class="fa fa-paperclip" aria-hidden="true"></i>
			  					<strong>Order Package Info</strong>
			  				</span>
			  				<em>Order Package Info Title</em>
			  			</a>
			  			<a href="#" class="column">
			  				<span class="icon">
			  					<i class="fa fa-file-text-o" aria-hidden="true"></i>
			  					<strong>Upload Your SKU</strong>
			  				</span>
			  				<em>Get your products ready</em>
			  			</a>
			  		</div>
			  		<div class="comp-holder">
				  		<div class="compaign-event">
				  			<h1>Campaign event</h1>
				  			<div class="slick-carousel">
								<div>
									<div class="slide-content">
										<div class="timer">
											<span>left</span>
											<ul class="time-list">
												<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
												<li>90h</li>
												:
												<li>05m</li>
												:
												<li>54s</li>
											</ul>
										</div>
										<img src="<?=IMG?>img132.jpg" alt="image">
										<span class="title">11.11 Shake Shake Voucher Compaign</span>
										<span class="date">Oct 31,2020 - Nov 17, 2020</span>
										<div class="bottom-box">
											<div class="left">
												<em>Seller:502</em>
												<em>Seller:502</em>
											</div>
											<div class="right">
												<a href="#">join</a>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="slide-content">
										<div class="timer">
											<span>left</span>
											<ul class="time-list">
												<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
												<li>90h</li>
												:
												<li>05m</li>
												:
												<li>54s</li>
											</ul>
										</div>
										<img src="<?=IMG?>img132.jpg" alt="image">
										<span class="title">11.11 Shake Shake Voucher Compaign</span>
										<span class="date">Oct 31,2020 - Nov 17, 2020</span>
										<div class="bottom-box">
											<div class="left">
												<em>Seller:502</em>
												<em>Seller:502</em>
											</div>
											<div class="right">
												<a href="#">join</a>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="slide-content">
										<div class="timer">
											<span>left</span>
											<ul class="time-list">
												<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
												<li>90h</li>
												:
												<li>05m</li>
												:
												<li>54s</li>
											</ul>
										</div>
										<img src="<?=IMG?>img132.jpg" alt="image">
										<span class="title">11.11 Shake Shake Voucher Compaign</span>
										<span class="date">Oct 31,2020 - Nov 17, 2020</span>
										<div class="bottom-box">
											<div class="left">
												<em>Seller:502</em>
												<em>Seller:502</em>
											</div>
											<div class="right">
												<a href="#">join</a>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="slide-content">
										<div class="timer">
											<span>left</span>
											<ul class="time-list">
												<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
												<li>90h</li>
												:
												<li>05m</li>
												:
												<li>54s</li>
											</ul>
										</div>
										<img src="<?=IMG?>img132.jpg" alt="image">
										<span class="title">11.11 Shake Shake Voucher Compaign</span>
										<span class="date">Oct 31,2020 - Nov 17, 2020</span>
										<div class="bottom-box">
											<div class="left">
												<em>Seller:502</em>
												<em>Seller:502</em>
											</div>
											<div class="right">
												<a href="#">join</a>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="slide-content">
										<div class="timer">
											<span>left</span>
											<ul class="time-list">
												<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
												<li>90h</li>
												:
												<li>05m</li>
												:
												<li>54s</li>
											</ul>
										</div>
										<img src="<?=IMG?>img132.jpg" alt="image">
										<span class="title">11.11 Shake Shake Voucher Compaign</span>
										<span class="date">Oct 31,2020 - Nov 17, 2020</span>
										<div class="bottom-box">
											<div class="left">
												<em>Seller:502</em>
												<em>Seller:502</em>
											</div>
											<div class="right">
												<a href="#">join</a>
											</div>
										</div>
									</div>
								</div>
								<div>
									<div class="slide-content">
										<div class="timer">
											<span>left</span>
											<ul class="time-list">
												<li><i class="fa fa-clock-o" aria-hidden="true"></i></li>
												<li>90h</li>
												:
												<li>05m</li>
												:
												<li>54s</li>
											</ul>
										</div>
										<img src="<?=IMG?>img132.jpg" alt="image">
										<span class="title">11.11 Shake Shake Voucher Compaign</span>
										<span class="date">Oct 31,2020 - Nov 17, 2020</span>
										<div class="bottom-box">
											<div class="left">
												<em>Seller:502</em>
												<em>Seller:502</em>
											</div>
											<div class="right">
												<a href="#">join</a>
											</div>
										</div>
									</div>
								</div>
								
							</div>
				  		</div>
				  	</div>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="home1" role="tabpanel" aria-labelledby="home1-tab">
			  	<h1>Manage Product</h1>
			  	<div class="btn-list">
			  		<button>Add New</button>
			  		<button>Export</button>
			  		<button>Import</button>
			  		<button>View History</button>
			  		<button>Name</button>
			  		<button>Seller SKU</button>
			  		<button>Shop SKU</button>
			  		<button>Brand Name</button>
			  		<button class="search">Search</button>
			  	</div>
			  	<div class="product_list">
			  		<ul>
			  			<li>
			  				<span>All</span>
			  				<em>(0)</em>
			  			</li>
			  			<li>
			  				<span>Live</span>
			  				<em>(0)</em>
			  			</li>
			  			<li>
			  				<span>Poor Quality</span>
			  				<em>(0)</em>
			  			</li>
			  			<li>
			  				<span>Sold Out</span>
			  				<em>(0)</em>
			  			</li>
			  			<li>
			  				<span>Inactive</span>
			  				<em>(0)</em>
			  			</li>
			  			<li>
			  				<span>Policy Voilation</span>
			  				<em>(0)</em>
			  			</li>
			  		</ul>
			  	</div>
			  	<div class="table-holder">
			  		<table class="product-table">
			  			<thead>
			  				<th>Name</th>
			  				<th>SKU</th>
			  				<th>Price</th>
			  				<th>Image</th>
			  				<th>Ratting</th>
			  				<th>reviews</th>
			  				<th>Action</th>
			  			</thead>
			  			<tbody>
			  				<?php foreach ($products as $key => $product): ?>
				  				<tr>
				  					<td><?=$product['product_name']?></td>
				  					<td><?=$product['sku']?></td>
				  					<td>
				  						<?php if ($product['sale_percentage'] > 0): ?>
				  							<?=$product['price']?>
				  						<?php else: ?>
				  							<?=$product['price']?>
				  						<?php endif ?>
				  					</td>
				  					<td><img src="<?=UPLOADS_PRO.$product['product_image']?>" width="150"></td>
				  					<td><?=$product['ratting']?></td>
				  					<td><?=$product['reviews']?></td>
				  					<td><a href="<?=BASEURL.'seller/edit-product/'.$product['product_id']?>">Edit</a></td>
				  				</tr>
			  				<?php endforeach ?>
			  			</tbody>
			  		</table>
			  	</div>
			  	<div class="pagination product">
			  		<ul>
			  			<li>
			  				<a href="#"><i class="fa fa-caret-left" aria-hidden="true"></i> Previous</a>
			  			</li>
			  			<li>
			  				<a class="active" href="#">1</a>
			  			</li>
			  			<li>
			  				<a href="#">Next <i class="fa fa-caret-right" aria-hidden="true"></i></a>
			  			</li>
			  		</ul>
			  		<div class="select_holder">
			  			<label>Items per page</label>
			  			<select>
			  				<option>10</option>
			  				<option>15</option>
			  				<option>20</option>
			  				<option>25</option>
			  			</select>
			  		</div>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="Products" role="tabpanel" aria-labelledby="Product-tab">
			  	<ul class="breadcrumbs">
			  		<li>
			  			<a href="#">Home</a>
			  		</li>
			  		<li>
			  			<a href="#">products</a>
			  		</li>
			  		<li>Add Product</li>
			  	</ul>
			  	<h1>basic information</h1>
			  	<form class="info-form" action="<?=BASEURL.'seller/post-product'?>" enctype="multipart/form-data" method="post">
			  		<input type="hidden" name="brand_id" value="<?=$brand['brand_id']?>">
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>product name<em>*</em></label>
			  				<input type="text" name="product_name" required="required">
			  				<!-- <a href="#" class="bottom-info">Add Multi-Languages</a> -->
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>category<em>*</em></label>
			  				<select class="product-add-cat-select parent-category category-select-tag" data-id="category-1" required="required">
			  					<option value="">Select Category</option>
                                    <?php foreach ($parents as $key => $parent): ?>
                                        <?php
                                        $filters = explode(',', $parent['filters']);
                                        if (in_array('size', $filters)) {
                                            $SizesFilter = 'true';
                                        }
                                        else{
                                            $SizesFilter = 'false';
                                        }
                                        if (in_array('color', $filters)) {
                                            $ColorsFilter = 'true';
                                        }
                                        else{
                                            $ColorsFilter = 'false';
                                        }
                                        ?>
                                        <option value="<?=$parent['id']?>"><?=$parent['title']?></option>
                                    <?php endforeach ?>
			  				</select>
			  				<a href="#" class="bottom-info">Recenty Used</a>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="info-row child-cats">

			  		</div><!-- /info-row/child-cats -->

			  		<div class="info-row">
			  			<div class="l-info">
				  			<h1>detailed description</h1>
								<textarea name="editor1" class="ckeditor"></textarea>
			  			</div><!-- /l-info -->
			  			<div class="l-info">
							<label>Mian Image<em>*</em></label>
			  				<input type="file" name="prod_img">
			  				<hr>
							<label>Status<em>*</em></label>
			  				<div class="radio-box">
			  					<input type="radio" id="in_stock" name="in_stock" value="1" checked>
    							<label for="in_stock">In Stock</label>
			  					<!-- <input type="radio" name="in_stock" value="1"  checked/>&nbsp;&nbsp; In Stock -->
			  				</div>
			  				<div class="radio-box">
			  					<input type="radio" id="in_stock1" name="in_stock" value="0">
    							<label for="in_stock1">Deactive</label>
			  					<!-- <input type="radio" name="in_stock"  value="0"  />&nbsp;&nbsp; Deactive -->
			  				</div>
			  				<hr>
							<label>New Product<em>*</em></label>
			  				<div class="radio-box">
			  					<input type="radio" id="new" name="new" value="yes">
    							<label for="new">Yes</label>
			  					<!-- <input type="radio" name="new"  value="yes"  />&nbsp;&nbsp; Yes -->
			  				</div>
			  				<div class="radio-box">
			  					<input type="radio" id="new1" name="new" value="no" checked="checked">
    							<label for="new1">No</label>
			  					<!-- <input type="radio" name="new"  value="no"  checked="checked" />&nbsp;&nbsp; No -->
			  				</div>
			  				<hr>
							<label>Featured Product<em>*</em></label>
			  				<div class="radio-box">
			  					<input type="radio" id="new2" name="new2" value="yes">
    							<label for="new2">Yes</label>
			  					<!-- <input type="radio" name="new"  value="yes"  />&nbsp;&nbsp; Yes -->
			  				</div>
			  				<div class="radio-box">
			  					<input type="radio" id="new3" name="new3" value="no" checked="checked">
    							<label for="new3">No</label>
			  					<!-- <input type="radio" name="new"  value="no"  checked="checked" />&nbsp;&nbsp; No -->
			  				</div>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row">
				  		<div class="l-info">
			  				<label>MRP</label>
			  				<input type="text" name="mrp">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>price<em>*</em></label>
			  				<input type="text" class="product-price" name="price" required="required">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>Sale Percentage</label>
			  				<input type="text" class="product-price-sale" name="sale_percentage" value="0">
			  			</div><!-- /l-info -->
				  		<div class="l-info">
			  				<label>Discount</label>
			  				<input type="text" class="product-price-diff" name="discount" required="required">
			  				<!-- <input type="text" class="product-price-old" name="new_price"> -->
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row">
				  		<div class="l-info">
			  				<label>Price TAX (%)</label>
			  				<input type="text" name="tax">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Unite Value</label>
			  				<input type="text" name="unit_value">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row">
				  		<div class="l-info">
			  				<label>Unit</label>
			  				<input type="text" name="unit">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->
			  		<div class="info-row size-block" style="display: none;">
		  				<h1>Size</h1>
			  			<?php foreach ($sizes as $key => $size): ?>
				  			<div class="l-info">
                                <div class="form-group">
                                	<span class="dummy">Dummy Text</span>
                                	<div class="dummy-holder">
										<label for="styled-checkbox-s"><?=$size['name']?></label>
	                                	<input class="styled-checkbox" name="size[]" id="styled-checkbox-s" type="checkbox" value="<?=$size['size_id']?>">
	                                </div>

                                    <!-- <input type="checkbox" name="size[]" value="<?=$size['size_id']?>" checked="checked"> &nbsp;&nbsp;
                                    <label class="control-label"><?=$size['name']?></label> -->
                                </div>
			  				</div><!-- /l-info -->
				  			<div class="l-info">
				  				<label>Price</label>
	                            <input type="text" data-name="size_price<?=$size['size_id']?>" class="size-price size-filter-price" value="0"> &nbsp;&nbsp;
				  			</div><!-- /l-info -->
                        <?php endforeach ?>
			  		</div><!-- /info-row -->
			  		<div class="info-row size-block" style="display: none;">
		  				<div class="l-info">
				  			<label>Size Note Title</label>
				  			<input type="text" name="size_note_title">
		  				</div><!-- /l-info -->
		  				<div class="l-info">
				  			<label>Size Note</label>
				  			<input type="text" name="size_note">
		  				</div><!-- /l-info -->
			  		</div><!-- /info-row -->






			  		<div class="info-row color-block" style="display: none;">
			  			<h1>Color</h1>
			  			<div class="color-block">
			  				<?php foreach ($colors as $key => $color): ?>
				  				<div class="l-info">
	                                <div class="form-group label-floating is-empty">
	                                	<input type="checkbox" name="color[]" value="<?=$color['color_id']?>" checked="checked"> &nbsp;&nbsp;
	                                    <label class="control-label"><?=$color['name']?></label>
	                                </div>
				  				</div><!-- /l-info -->
			  				<?php $ColorImages = explode(',', $product->color_images); ?>
			  					<div class="l-info">
		  							<label>Price</label>
	                        		<input type="text" data-name="color_price<?=$color['color_id']?>" class="form-control color-price color-filter-price" value="0"> &nbsp;&nbsp;
		  						</div><!-- /l-info -->
		  						<div class="l-info info-color-box">
		  							<label  style="<?=$color['name']?>;"><?=$color['name']?> Image
    									<input type="file" name="color_file<?=$color['color_id']?>">
    								</label> 
		  							<!-- <input type="file" name="color_file<?=$color['color_id']?>"> &nbsp;&nbsp;
                            		<label class="btn" style="display: block; cursor: pointer;background: #fff;color: #000;border: 3px solid <?=$color['name']?>;"><?=$color['name']?> Image</label>	 -->	
		  						</div><!-- /l-info-->
			  			</div><!-- {row} -->
			  				
                       	<?php endforeach ?>
			  		</div><!-- /info-row -->








			  		<div class="info-row color-block" style="display: none;">
		  				<div class="l-info">
				  			<label>Color Note Title</label>
				  			<input type="text" name="color_note_title">
		  				</div><!-- /l-info -->
		  				<div class="l-info">
				  			<label>Color Note</label>
				  			<input type="text" name="color_note">
		  				</div><!-- /l-info -->
			  		</div><!-- /info-row -->


			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>Which Filter Price To Show *</label>
			  				<select name="filter_price_show" required="required">
                                <option value="size">SIZE</option>
                                <option value="color" selected="selected">COLOR</option>
                            </select>
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

	                <div class="info-row dynamic-filters">
			  			
			  		</div><!-- /info-row/dynamic-filters -->

			  		<div class="info-row">
				  		<div class="l-info">
			  				<label>Rewards</label>
			  				<input type="text" name="rewards">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Warranty</label>
			  				<select name="warranty">
                                <option value="yes" selected="selected">Yes</option>
                                <option value="no">no</option>
                            </select>
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>SKU</label>
			  				<input type="text" name="sku">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Meta Title *</label>
			  				<input type="text" name="meta_title" required="required">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Meta Key Words *</label>
			  				<input type="text" name="meta_key" required="required">
			  			</div><!-- /l-info -->
			  			<div class="l-info">
			  				<label>Meta Description *</label>
			  				<input type="text" name="meta_desc" required="required">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="info-row cat-tags-area"></div>

			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>Select Images (you can select multiple images)</label>
			  				<input type="file" class="btn btn-info" name="post_photos[]" id="post_photo_form" multiple="multiple">
			  			</div><!-- /l-info -->
			  		</div><!-- /info-row -->

			  		<div class="btn btn-success">
						<button type="submit">submit</button>
					</div>

			  	</form>
			  	<h1 style="margin: 0;">Product Attributes</h1>
			  	<p style="color: #afafaf; font-size: 13px; margin: 0 0 20px;">
			  		Boost your item's searchability by filling-up the Key Product Information marked with KEY. <br> The more you fill-up, the easier for buyers to find your product.
			  	</p>
			  	<form class="attr-form info-form">
			  		<div class="info-row">
			  			<div class="column">
			  				<label>brand <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>protection <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>body type <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>E-Warranty <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Model Year <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Notchted Display <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Fast Charging <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Headphone Jack <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Wireless Charging <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Number of Cameras <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Battery capacity <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Phone Features <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>PPI</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Screen Size (inches) </label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>sim type</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Camera Front (Megapixels</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>RAM Memory</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Camera Back (Megapixels)</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="column">
			  				<label>Number of Cores</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>

			  			<div class="column">
			  				<label>Video Resolution</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  			<div class="column">
			  				<label>Type of Battery</label>
			  				<select>
			  					<option></option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  					<option>Brand</option>
			  				</select>
			  			</div>
			  		</div>
			  		<div class="pass-btn">
						<button>submit</button>
					</div>
					<h1>detailed description</h1>
					<div class="editor">
						<div class="cs-holder">
							<h1>heilights</h1>
							<div class="right-holder">
								<div class="btn-holder">
									<select>
										<option>Pakistan</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
						</div>
							<textarea name="editor1" class="ckeditor"></textarea>
					</div>
					<div class="editor">
						<div class="cs-holder">
							<h1>roduct description</h1>
							<div class="right-holder">
								<div class="btn-holder">
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
						</div>
							<textarea name="editor2" class="ckeditor"></textarea>
					</div>

					<div class="editor">
						<div class="cs-holder">
							<h1>english description</h1>
							<div class="right-holder">
								<div class="btn-holder">
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
									<select>
										<option>Normal</option>
										<option>Pakistan</option>
										<option>Pakistan</option>
									</select>
								</div>
							</div>
						</div>
							<textarea name="editor3" class="ckeditor"></textarea>
					</div>
					<div class="editor">
						<div class="cs-holder">
							<h1>What's in the box</h1>
							<input type="text" name="">
						</div>
					</div>
			  	</form>
			  	<h1>Price & Stock</h1>
			  	<form class="info-form" action="#">
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>product name<em>*</em></label>
			  				<input type="text">
			  				<a href="#" class="bottom-info">Add Multi-Languages</a>
			  			</div>
			  		</div>
			  		<div class="info-row">
			  			<div class="l-info">
			  				<label>Storage Capacity <em>*</em></label>
			  				<select>
			  					<option></option>
			  					<option>Category</option>
			  					<option>Category</option>
			  					<option>Category</option>
			  				</select>
			  				<a href="#" class="bottom-info" style="float: left; margin: 20px 0 0;">+ Add a new SKU</a>
			  			</div>
			  			<div class="l-info">
			  				<label>Color family <em>*</em></label>
			  				<input type="text">
			  			</div>
			  		</div>
			  		<div class="upload-box">
			  			<div class="upload-column">
			  				<input type="file" id="upload" hidden/>
							<label for="upload"><i class="fa fa-paperclip" aria-hidden="true"></i> Copy the first to the rest</label>
			  			</div>
			  			<div class="upload-column">
			  				<input type="file" id="upload" hidden/>
							<label for="upload"><i class="fa fa-paperclip" aria-hidden="true"></i>Copy the first stock to the rest only</label>
			  			</div>
			  			<div class="upload-column">
			  				<input type="file" id="upload" hidden/>
							<label for="upload"><i class="fa fa-paperclip" aria-hidden="true"></i>Copy the first price to the rest only</label>
			  			</div>
			  		</div>
			  			<ul class="stock-list">
			  				<li>
			  					<span class="top">Availability</span>
			  					<span class="bottom">
			  						<div>
									  <label class="switch-primary">
									    <input type="checkbox" class="switch switch-bootstrap status" name="status" id="" value="1">
									    <span class="switch-body"></span>
									  </label>
									</div>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">Storage Capacity</span>
			  					<span class="bottom">
			  						<select>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  						</select>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">Color Family</span>
			  					<span class="bottom">
			  						<select>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  							<option>Please Select</option>
			  						</select>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">price</span>
			  					<span class="bottom">
			  						<input type="text">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">Special Price</span>
			  					<span class="bottom">
			  						<a href="#" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">quantity</span>
			  					<span class="bottom">
			  						<input type="text">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">seller SKU</span>
			  					<span class="bottom">
			  						<input type="text" placeholder="Optional">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">shop SKU</span>
			  					<span class="bottom"></span>
			  				</li>
			  				<li>
			  					<span class="top">Free items</span>
			  					<span class="bottom">
			  						<input type="text">
			  					</span>
			  				</li>
			  				<li>
			  					<span class="top">action</span>
			  					<span class="bottom"><i class="fa fa-trash" aria-hidden="true"></i></span>
			  				</li>
			  			</ul>
			  			<div class="service-box">
				  			<h1>Service &amp; delivery</h1>
				  			<h2>service</h2>
				  			<div class="info-row">
				  				<div class="l-info">
				  					<label>warrenty type <em>*</em></label>
				  					<select>
				  						<option>Select</option>
				  						<option>Select</option>
				  						<option>Select</option>
				  					</select>
				  				</div>
				  				<div class="l-info">
				  					<label>warrenty periode <em>*</em></label>
				  					<input type="text">
				  				</div>
				  			</div>
				  			<h2>delivery</h2>
				  			<div class="delivery-row">
			  					<label>Package Weight (kg)</label>
			  					<input type="text" name="">
				  			</div>
				  			<div class="delivery-row">
			  					<label>Package Dimensions (cm)</label>
			  					<input type="text" name="">
			  					<input type="text" name="">
			  					<input type="text" name="">
				  			</div>
				  			<div class="delivery-row">
				  				<label>Dangerous Goods</label>
				  				<ul class="unstyled centered">
								<li>
									<input class="styled-checkbox" id="styled-checkbox-01" type="checkbox" value="value1">
									<label for="styled-checkbox-01">Battery</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-02" type="checkbox" value="value2">
									<label for="styled-checkbox-02">Flameable</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-03" type="checkbox" value="value3">
									<label for="styled-checkbox-03">Liquide</label>
								</li>
								<li>
									<input class="styled-checkbox" id="styled-checkbox-04" type="checkbox" value="value4">
									<label for="styled-checkbox-04">None</label>
								</li>
							</ul>
			  			</div>
			  		</div>
			  	</form>
			  	<div class="product-btn">
			  		<a href="#" class="submit">Submit</a>
			  		<a href="#" class="save">Save as draft</a>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
						  	<a class="nav-link" id="Delivery-tab" data-toggle="tab" href="#Delivery" role="tab" aria-controls="Delivery" aria-selected="false">Delivery Options</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="Shipping-tab" data-toggle="tab" href="#Shipping" role="tab" aria-controls="Shipping" aria-selected="false">Shipping Provider</a>
						</li>
						<li class="nav-item">
						  	<a class="nav-link" id="Invoice-tab" data-toggle="tab" href="#Invoice" role="tab" aria-controls="Invoice" aria-selected="false">Invoice Number</a>
						</li>
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
											</div>
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
													<input type="radio" id="yes" name="holiday_mode">
					    							<label for="yes">Yes</label>
					    						</div>
												<div class="radio-box">
													<input type="radio" id="no" name="holiday_mode">
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
								<?php endif ?>
							</div>

						</div>
						<div class="tab-pane fade" id="Commissions" role="tabpanel" aria-labelledby="Commissions-tab">
							Commissions Content
						</div>
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
						</div>
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
			  </div>
			  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.3..</div>
			  <div class="tab-pane fade" id="media" role="tabpanel" aria-labelledby="media-tab">.4..</div>
			  <div class="tab-pane fade" id="campaign" role="tabpanel" aria-labelledby="campaign-tab">.5..</div>
			  <div class="tab-pane fade" id="statements" role="tabpanel" aria-labelledby="statements-tab">
			  	<div class="account-statement">
				  	<ul class="breadcrumbs">
				  		<li>
				  			<a href="#">Home</a>
				  		</li>
				  		<li>
				  			<a href="#">products</a>
				  		</li>
				  		<li>Campaign Management</li>
				  	</ul>
				  	
					<div class="cs-holder">
						<h1>Account Statement</h1>
						<div class="right-holder">
							<p>There are no transactions available. Your account statement will appear here once there are transactions recorded.</p>
						</div>
					</div>
					<div class="expiry-box">
						<div class="info-row">
							<label>Period</label>
							<select>
								<option></option>
								<option>1</option>
								<option>1</option>
								<option>1</option>
							</select>
						</div>
						<div class="btn-holder">
							<button class="view">View expiry history</button>
							<button>export</button>
							<button>print</button>
						</div>
					</div>
					<div class="statement-holder">
						
					</div>
				</div>
			  </div>

			  <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">
			  
			  	<div class="overview-order">
				  	<ul class="breadcrumbs">
				  		<li>
				  			<a href="#">Home</a>
				  		</li>
				  		<li>
				  			<a href="#">products</a>
				  		</li>
				  		<li>Order Overview</li>
				  	</ul>
				  	
					<div class="cs-holder">
						<h1>Order Overview</h1>
					</div>
					<div class="tab-holder">
				  		<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#photo1" role="tab">All</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#pending" role="tab">Pending</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#ship" role="tab">In Process</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#shiped" role="tab">Shiped</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#delivered" role="tab">Deliverred</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#cancelled" role="tab">Cancelled</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#returned" role="tab">Returned</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#failed" role="tab">Failed Delivery</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="photo1" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-all">
											<?php foreach ($orders as $key => $order): ?>
												<tr id="order-item-id-<?=$order['sale_item_id']?>">
													<td><?=$order['sale_id']?></td>
													<td><?=date('d-m-Y',strtotime($order['at']))?></td>
													<td><?=$order['product_name']?></td>
													<td><?=$order['sku']?></td>
													<td><?=$order['payment_method']?></td>
													<td><?=$order['qty']?></td>
													<td><?=$order['price']?></td>
													<td><?=$order['total']?></td>
													<td class="order-item-status"><?=$order['status']?></td>
													<td>
														<?php
														if($order['OrderStatus'] == 0){
	                                                    ?>
	                                                    	<span class='badge badge-default'>Pending</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 1){
	                                                    ?>
	                                                        <span class='badge badge-success'>Confirm</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 2){
	                                                    ?>
	                                                    	<span class='badge badge-info'>Out</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 3){
	                                                    ?>
	                                                        <span class='badge badge-danger'>Cancel</span>
	                                                    <?php
	                                                    }
	                                                    else if($order['OrderStatus'] == 4){
	                                                    ?>
	                                                        <span class='badge badge-info'>complete</span>
	                                                    <?php
	                                                    }
	                                                    ?>
													</td>
													<td><a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (all orders) -->
							<div class="tab-pane" id="pending" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-pending">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'pending' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td><a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a></td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (pending orders) -->
							<div class="tab-pane" id="ship" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-in-process">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'in process' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td><a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a></td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (in process orders) -->
							<div class="tab-pane" id="shiped" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-delivered-to-courier">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'delivered to courier' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td><a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a></td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (delivered to courier orders) -->
							<div class="tab-pane" id="delivered" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-delivered">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'delivered' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td><a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a></td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (delivered orders) -->
							<div class="tab-pane" id="cancelled" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-cancelled">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'cancelled' || $order['OrderStatus'] == '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td>
															<?php if (1==2): ?>
																<a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a>
															<?php endif ?>
														</td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (cancelled orders) -->
							<div class="tab-pane" id="returned" role="tabpanel">
								<form class="search-block">
									<div class="search-row">
										<input type="text" placeholder="Order Number">
										<input type="text" placeholder="Customer">
										<input type="text" placeholder="Product">
										<select>
											<option>Select Tag</option>
											<option>Select Tag</option>
											<option>Select Tag</option>
										</select>
										<input type="text" placeholder="Seller SKU">
									</div>
									<div class="search-row">
										<input type="text" placeholder="Payment">
										<input type="text" placeholder="Fulfiment">
										<input type="text" placeholder="Delivery Option">
								        <input id="startDate" name="startDate" type="text" class="s-date" placeholder="Start Date" />
								        &nbsp;
								        <input id="endDate" name="endDate" type="text" class="e-date" placeholder="End Date"/>
									</div>
									<button>Search</button>
								</form>
								<div class="overview-table">
									<select>
										<option>Export</option>
										<option>Export</option>
										<option>Export</option>
									</select>
									<select>
										<option>Import</option>
										<option>Import</option>
										<option>Export</option>
									</select>
									<select>
										<option>Print</option>
										<option>Print</option>
										<option>Print</option>
									</select>
									<select>
										<option>Set Status</option>
										<option>Set Status</option>
										<option>Set Status</option>
									</select>
									<select>
										<option>View History</option>
										<option>View History</option>
										<option>View History</option>
									</select>
								</div><!-- /overview-table -->
								<div class="table-holder">
									<table>
										<thead>
											<th>Order No.</th>
											<th>Order Date</th>
											<th>Product</th>
											<th>SKU</th>
											<th>Payment Method</th>
											<th>QTY</th>
											<th>Price</th>
											<th>Total</th>>
											<th>Status</th>
											<th>Order Status</th>
											<th>Action</th>
										</thead>
										<tbody class="order-table-returned">
											<?php foreach ($orders as $key => $order): ?>
												<?php if ($order['status'] == 'returned' && $order['OrderStatus'] != '3'): ?>
													<tr id="order-item-id-<?=$order['sale_item_id']?>">
														<td><?=$order['sale_id']?></td>
														<td><?=date('d-m-Y',strtotime($order['at']))?></td>
														<td><?=$order['product_name']?></td>
														<td><?=$order['sku']?></td>
														<td><?=$order['payment_method']?></td>
														<td><?=$order['qty']?></td>
														<td><?=$order['price']?></td>
														<td><?=$order['total']?></td>
														<td class="order-item-status"><?=$order['status']?></td>
														<td>
															<?php
															if($order['OrderStatus'] == 0){
		                                                    ?>
		                                                    	<span class='badge badge-default'>Pending</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 1){
		                                                    ?>
		                                                        <span class='badge badge-success'>Confirm</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 2){
		                                                    ?>
		                                                    	<span class='badge badge-info'>Out</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 3){
		                                                    ?>
		                                                        <span class='badge badge-danger'>Cancel</span>
		                                                    <?php
		                                                    }
		                                                    else if($order['OrderStatus'] == 4){
		                                                    ?>
		                                                        <span class='badge badge-info'>complete</span>
		                                                    <?php
		                                                    }
		                                                    ?>
														</td>
														<td><a href="javascript://" class="change-order-item-status-seller" data-id="<?=$order['sale_item_id']?>">Change Status</a></td>
													</tr>
												<?php endif ?>
											<?php endforeach ?>
										</tbody>
									</table>
								</div><!-- /table-holder -->
							</div><!-- /tab-pane (returned orders) -->
							<div class="tab-pane" id="failed" role="tabpanel">8</div><!-- /tab-pane (delivered to courier orders) -->
						</div><!-- /tab-content -->
				  	</div><!-- /tab-holder -->
				</div><!-- /overview-order -->

			  </div><!-- #overview -->

			  <div class="tab-pane fade" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">...</div>
			  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">.8..</div>
			  <div class="tab-pane fade" id="management" role="tabpanel" aria-labelledby="management-tab">
			  	<ul class="breadcrumbs">
			  		<li>
			  			<a href="#">Home</a>
			  		</li>
			  		<li>
			  			<a href="#">products</a>
			  		</li>
			  		<li>Manage user</li>
			  	</ul>
			  	<h1>Manage user</h1>
				<div class="cs-holder">
					<div class="right-holder">
						<div class="btn-holder">
							<button class="add user">+ add user</button>
						</div>
					</div>
				</div>
			  	<div class="tab-holder">
					<div class="tab-content">
						<h3 class="user-heading">manage users</h3>
						<div class="table-holder">
							<table class="user-table">
								<thead>
									<th>email</th>
									<th>role</th>
									<th>user name</th>
									<th>status</th>
									<th>Action</th>
								</thead>
								<tbody>
									<tr>
										<td>usman_ghani@yahoo.com</td>
										<td>seller full access</td>
										<td>EastAccess</td>
										<td>active</td>
										<td></td>
									</tr>
									<tr>
										<td>usman_ghani@yahoo.com</td>
										<td>seller full access</td>
										<td>EastAccess</td>
										<td>active</td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
			  	<ul class="breadcrumbs">
			  		<li>
			  			<a href="#">Home</a>
			  		</li>
			  		<li>
			  			<a href="#">products</a>
			  		</li>
			  		<li>account settings</li>
			  	</ul>
			  	<h1>account setting</h1>
			  	<div class="tab-holder">
			  		<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#photo" role="tab">Change Profile Photo</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#Password" role="tab">Change Password</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="photo" role="tabpanel">
							<div class="photo-box">
								<h1>change Profile Photo</h1>
								<div class="photo-upload">

									<div class="logo-content">
										<input type='file' id="profile-image-file-input"/>
										<div class="blah-holder">
											<span>Current Profile Image</span>
										    <img class="file-upload-image" id="profile-image-change" src="<?=UPLOADS.'seller/'.$user['profile_img']?>" alt="profile image" />
										</div>
									</div>

									<?php if (1==2): ?>
										<div class="file-upload">
											<div class="image-upload-wrap">
										    	<input class="file-upload-input" id="profile-image-file-input" type='file' onchange="readURL(this);" accept="image/*" />
										    	<div class="drag-text">
										      		<h3>+</h3>
										    	</div>
										  	</div>
											<button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">
												Please Select Your Photo
											</button>
											<div class="file-upload-content">
											  	<?php if (strlen($user['profile_img']) > 4): ?>
											    	<img class="file-upload-image" id="profile-image-change" src="<?=BASEURL.'seller/'.$user['profile_img']?>" alt="profile image" />
											  	<?php else: ?>
											    	<img class="file-upload-image" src="#" alt="profile image" />
											  	<?php endif ?>
											    <div class="image-title-wrap">
											      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
											    </div>
										 	</div>
										</div>
									<?php endif ?>

								</div>
							</div>
						</div>
						<div class="tab-pane" id="Password" role="tabpanel">
							<h1>change Password</h1>
							<form class="password-form change-password-form">
								<div class="pass-row">
									<label>old password</label>
									<input type="password" name="password" required="required">
								</div>
								<div class="pass-row">
									<label>new password</label>
									<input type="password" name="new_password" required="required">
								</div>
								<div class="pass-row">
									<label>repeat password</label>
									<input type="password" name="new_password_2" required="required">
								</div>
								<div class="pass-btn">
									<button>save changes</button>
								</div>
							</form>
						</div>
					</div>
			  	</div>
			  </div>
			  <div class="tab-pane fade" id="chat" role="tabpanel" aria-labelledby="chat-tab">
			  	<ul class="breadcrumbs">
			  		<li>
			  			<a href="#">Home</a>
			  		</li>
			  		<li>
			  			<a href="#">products</a>
			  		</li>
			  		<li>chat settings</li>
			  	</ul>
			  	<h1>chat setting</h1>
			  	<div class="tab-holder">
			  		<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#user-managment" role="tab">user managment</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#quick-reply" role="tab">quick reply</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#auto-reply" role="tab">auto reply</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#notification" role="tab">notification</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="user-managment" role="tabpanel">
							<div class="cs-holder">
								<h1>customer support</h1>
								<div class="right-holder">
									<div class="search-holder">
										<input type="search" name="">
										<button><i class="fa fa-search" aria-hidden="true"></i></button>
									</div>
									<div class="btn-holder">
										<button class="add">+ add user</button>
										<button class="remove">remove</button>
									</div>
								</div>
							</div>
							<div class="admin_holder">
								<span>Admin</span>
								<span>usman_ghani940@yahoo.com</span>
								<div class="working-holder">
									<div class="time-holder">
										<input type="time" name="">
										<input type="time" name="">
									</div>
									<div class="select-holder">
										<label>working hours</label>
										<select>
											<option>On Weekday</option>
											<option>On Weekday</option>
											<option>On Weekday</option>
										</select>
									</div>
								</div>
							</div>
							<table class="support-table" action="#">
								<thead>
									<th>
										<input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
										<label for="styled-checkbox-1">Email</label>
									</th>
									<th>
										user name
									</th>
									<th>
										action
									</th>
								</thead>
								<tbody>
									<tr>
										<td>
											<input class="styled-checkbox" id="styled-checkbox-2" type="checkbox" value="value1">
											<label for="styled-checkbox-2">usman_ghani940@yahoo.com</label>
										</td>
										<td>EasyAccess</td>
										<td>
											<a href="#">remove</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="tab-pane" id="quick-reply" role="tabpanel">
							<div class="cs-holder">
								<h1>quick replies</h1>
								<div class="right-holder">
									<div class="btn-holder">
										<button class="add">+ add option</button>
									</div>
								</div>
							</div>
							<form class="q-rply" action="#">
								<div class="text-box">
									<textarea></textarea>
									<span>0/200</span>
								</div>
								<div class="text-box">
									<textarea></textarea>
									<span>0/200</span>
								</div>
								<div class="text-box">
									<textarea></textarea>
									<span>0/200</span>
								</div>
								<div class="pass-btn">
									<button>submit</button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="auto-reply" role="tabpanel">
							<div class="cs-holder">
								<h1>auto replies</h1>
								<div class="right-holder">
									<div class="btn-holder">
										<button class="add">+ add option</button>
									</div>
								</div>
							</div>
							<form class="q-rply" action="#">
								<div class="text-box">
									<div class="text-frame">
										<span>Auto Reply (When receiving a message)</span>
										<div class="radio-box">
											<input type="radio" id="test1" name="radio-group">
    										<label for="test1">yes</label>
    										<input type="radio" id="test2" name="radio-group">
    										<label for="test2">No</label>
										</div>
									</div>
									<textarea></textarea>
									<span>0/200</span>
								</div>
								<div class="text-box">
									<div class="text-frame">
										<span>Auto Reply (When receiving a message)</span>
										<div class="radio-box">
											<input type="radio" id="test3" name="radio-group">
    										<label for="test3">yes</label>
    										<input type="radio" id="test4" name="radio-group">
    										<label for="test4">No</label>
										</div>
									</div>
									<textarea></textarea>
									<span>0/200</span>
								</div>
								<div class="text-box">
									<div class="text-frame">
										<span>Auto Reply (When receiving a message)</span>
										<div class="radio-box">
											<input type="radio" id="test5" name="radio-group">
    										<label for="test5">yes</label>
    										<input type="radio" id="test6" name="radio-group">
    										<label for="test6">No</label>
										</div>
									</div>
									<textarea></textarea>
									<span>0/200</span>
								</div>
								<div class="pass-btn">
									<button>submit</button>
								</div>
							</form>
						</div>
						<div class="tab-pane" id="notification" role="tabpanel">
							<div class="cs-holder">
								<h1>notifications</h1>
							</div>
							<form class="q-rply" action="#">
								<div class="text-box">
									<div class="text-frame notification">
										<span>Auto Reply (When receiving a message)</span>
										<div class="radio-box">
											<input type="radio" id="test7" name="radio-group">
    										<label for="test7">yes</label>
    										<input type="radio" id="test8" name="radio-group">
    										<label for="test8">No</label>
										</div>
									</div>
								</div>
								
								<div class="pass-btn">
									<button>submit</button>
								</div>
							</form>
						</div>
					</div>
			  	</div>
			  </div>
			  <div class="suppotr_center">
			  	<span>Need some assistance? Visit our <a href="#">Support Center</a> or contact your <a href="#">Customer Success</a> Manager.</span>
			  </div>
			</div>
		</div>
	</div>

</body>

  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>

	<script>
		function readURL(input) {
		  if (input.files && input.files[0]) {

		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('.image-upload-wrap').hide();

		      $('.file-upload-image').attr('src', e.target.result);
		      $('.file-upload-content').show();

		      $('.image-title').html(input.files[0].name);
		    };

		    reader.readAsDataURL(input.files[0]);

		  } else {
		    removeUpload();
		  }
		}

		function removeUpload() {
		  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
		  $('.file-upload-content').hide();
		  $('.image-upload-wrap').show();
		}
		$('.image-upload-wrap').bind('dragover', function () {
		        $('.image-upload-wrap').addClass('image-dropping');
		    });
		    $('.image-upload-wrap').bind('dragleave', function () {
		        $('.image-upload-wrap').removeClass('image-dropping');
		});

	</script>
	<script type="text/javascript">
      CKEDITOR.replace( 'editor1' );
      CKEDITOR.add            
   </script>
	<script type="text/javascript">
      CKEDITOR.replace( 'editor2' );
      CKEDITOR.add            
   </script>
	<script type="text/javascript">
      CKEDITOR.replace( 'editor3' );
      CKEDITOR.add            
   </script>
   <script>
   	$().ready(function(){
	  $('.slick-carousel').slick({
	    arrows: true,
	    rows: 2,
	    slidesPerRow: 3,
	    centerPadding: "0px",
	    dots: false,
	   // autoplay:true,
	    slidesToShow: 3,
        speed: 300,
        slidesToScroll: 1,
        infinite: true,
	    touchThreshold: 500,
	    infinite: false
	  });
	});
				// $().ready(function(){
				//   $('.slick-carousel').slick({
		  //           dots: false,
		  //           infinite: true,
		  //           speed: 300,
		  //           slidesToShow: 4,
		  //           slidesToScroll: 4,
		  //           responsive: [{
		  //               breakpoint: 1200,
		  //               settings: {
		  //                   slidesToShow: 4,
		  //                   slidesToScroll: 4,
		  //                   infinite: true,
		  //                   dots: true
		  //               }
		  //           }, {
		  //               breakpoint: 992,
		  //               settings: {
		  //                   slidesToShow: 3,
		  //                   slidesToScroll: 3
		  //               }
		  //           }, {
		  //               breakpoint: 768,
		  //               settings: {
		  //                   slidesToShow: 3,
		  //                   slidesToScroll: 3
		  //               }
		  //           }, {
		  //               breakpoint: 480,
		  //               settings: {
		  //                   slidesToShow: 2,
		  //                   slidesToScroll: 2
		  //               }
		  //           }]
		  //       });
		  //   }
   </script>
   <script>
   	$("ul.nav-tabs a").click(function (e) {
	  e.preventDefault();  
	    $(this).tab('show');
	});
   </script>
<script>
$(function() {
  	$(".mobile-left-menu").click(function(){
		$("body").toggleClass("open-left-menu")
	});
	$('#datetimepicker1').datetimepicker({
		language: 'pt-BR'
	});


	$(document).on('change', '.parent-category', function(event) {
        event.preventDefault();
        $this = $(this);
        $(".child-cats").html('');
        $this.removeAttr('name');
        $id = $this.val();
        $.post('<?=BASEURL."seller/get-child-cats"?>', {id: $id}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $(".child-cats").append(resp.html);
            }
            else{
                $this.prop('name','category_id');
            }
        });
    });

    $(document).on('change', '.category-select-tag', function(event) {
        event.preventDefault();
        $(".cat-tags-area").hide(0);
        $(".cat-tags-area").html('');
        $cat = $(this).val();
        $.post('<?=BASEURL."seller/get-cat-tags"?>', {cat: $cat}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $(".cat-tags-area").html(resp.html);
                $(".cat-tags-area").show(0);
            }
        });
    });

    $(document).on('change', '.category-select-tag-dynamic', function(event) {
        event.preventDefault();
        $this = $(this);
        $this.parent('div').parent('div').next('div.l-info').remove();
        $this.removeAttr('name');
        $id = $this.val();
        $.post('<?=BASEURL."seller/get-child-cats"?>', {id: $id}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $(".child-cats").append(resp.html);
            }
            else{
                $this.prop('name','category_id');
            }
        });
    });

    $(document).on('change', '.category-select-tag', function(event) {
        event.preventDefault();
        $this = $(this);
        $(".size-block,.color-block").fadeOut(0);
        $size = $('option:selected',this).attr('data-size');
        $color = $('option:selected',this).attr('data-color');
        if ($size == 'true') {
            $(".size-block").fadeIn(0);
        }
        if ($color == 'true') {
            $(".color-block").fadeIn(0);
        }

        $id = $('option:selected',this).attr('data-filter-ids');
        $(".dynamic-filters").html('');
        $.post('<?=BASEURL."seller/get-filter-values-html"?>', {id: $id}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $(".dynamic-filters").html(resp.html);
            }
        });
    });

    $(document).on('blur', '.color-filter-price', function(event) {
        event.preventDefault();
        $price = parseInt($(this).val());
        if (!($price > 0)) {
            $(this).val(0);
            $(this).removeAttr('name');
        }
        else{
            $(this).prop('name',$(this).attr('data-name'));
        }
    });
    $(document).on('blur', '.size-filter-price', function(event) {
        event.preventDefault();
        $price = parseInt($(this).val());
        if (!($price > 0)) {
            $(this).val(0);
            $(this).removeAttr('name');
        }
        else{
            $(this).prop('name',$(this).attr('data-name'));
        }
    });


});
</script>
<script>
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>




<div class="modal fade" id="change-order-item--modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change Order Item Status</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">
				<form action="">
					<input type="hidden" name="id">
					<div class="form-group">
						<label for="">Status</label>
						<select name="status" class="form-control">
							<option value="">Select</option>
							<option value="pending">Pending</option>
                            <option value="in process">In Process</option>
                            <option value="delivered to courier">Delivered To Courier</option>
                            <option value="On Way">On Way</option>
                            <option value="delivered">Delivered</option>
                            <option value="returned">Returned</option>
                            <option value="cancelled">Cancelled</option>
						</select>
					</div><!-- /form-group -->
					<div class="form-group">
						<label for="">Any Note</label>
						<textarea name="msg" class="form-control" rows="5"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Save</button>
					</div><!-- /form-group -->
				</form>
			</div><!-- /modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div><!-- /modal-footer -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- /change-order-item--modal -->