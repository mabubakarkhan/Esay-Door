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
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">


</head>
<body>


  <div id="wrapper">
    <div class="seller-header">
      <div class="fluid-container">
        <a class="seller-logo" href="<?=BASEURL?>">
          <img src="<?=IMG?>logo.png" alt="logo">
        </a>
        <div class="right-panel">
          <a class="email" href="<?=BASEURL.'brand/'.$BRAND['slug'].'-'.$BRAND['brand_id']?>" style="text-transform: uppercase;letter-spacing: 1px;"><?=$BRAND['title']?></a>
          <a class="access" href="#">
            <i class="fa fa-cog" aria-hidden="true"></i>
            Easy Access
            <i class="fa fa-sort-desc" aria-hidden="true"></i>
          </a>
        </div> 
      </div>    
    </div><!-- /seller-header -->
    <div class="dashbord-content">
      <a class="mobile-left-menu" href="javascript://"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <div class="left-bar">
        <div id="accordion" class="myaccordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link <?=$dashboard_menu?>" data-toggle="collapse" data-target="#collapseOne" aria-expanded="<?=$dashboard_menu_true?>" aria-controls="collapseOne">
                  <img src="<?=IMG?>bg-dashboard.png">
                  Dashboard
                </button>
              </h2>
            </div>
            <div id="collapseOne" class="collapse <?=$dashboard_menu?>" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <ul class="nav nav-tab" id="myTab" role="tablist">
                  <li class="nav-item ">
                <a class="nav-link <?=$page_dashboard?>" href="<?=BASEURL.'seller/index'?>">Dashboard</a>
              </li>
                </ul>
              </div>
            </div>
          </div>
          <?php if ($_SESSION['seller']['status'] == 'active'): ?>
            <div class="card">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed <?=$products_menu?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="<?=$products_menu_true?>" aria-controls="collapseTwo">
                    <img src="<?=IMG?>bg-product.png" alt="image">
                      Products
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse <?=$products_menu?>" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                  <ul class="nav nav-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link <?=$page_products?>" href="<?=BASEURL.'seller/products'?>">Manage Products</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?=$page_categories?>" href="<?=BASEURL.'seller/categories'?>">Categories</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?=$page_add_product?>" href="<?=BASEURL.'seller/add-product'?>">Add Product</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingTwo11">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed <?=$listing_menu?>" data-toggle="collapse" data-target="#collapseTwo11" aria-expanded="<?=$listing_menu_true?>" aria-controls="collapseTwo11">
                    <img src="<?=IMG?>bg-product.png" alt="image">
                      Volume Listing
                  </button>
                </h2>
              </div>
              <div id="collapseTwo11" class="collapse <?=$listing_menu?>" aria-labelledby="headingTwo11" data-parent="#accordion">
                <div class="card-body">
                  <ul class="nav nav-tab" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link <?=$page_listing?>" href="<?=BASEURL.'seller/listing'?>">Listing</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?=$page_add_listing?>" href="<?=BASEURL.'seller/add-list'?>">Add List</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          <?php endif ?>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed <?=$campaign_menu?>" data-toggle="collapse" data-target="#collapseThree" aria-expanded="<?=$campaign_menu_true?>" aria-controls="collapseThree">
                  <img src="<?=IMG?>bg-promotions.png" alt="image">
                    Promotions
                </button>
              </h2>
            </div>
            <div id="collapseThree" class="collapse <?=$campaign_menu?>" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <ul class="nav nav-tab" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link <?=$page_campaign?>" href="<?=BASEURL.'seller/campaign'?>">campaign</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree1">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed <?=$finance_menu?>" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="<?=$finance_menu_true?>" aria-controls="collapseThree1">
                  <img src="<?=IMG?>bg-finance.png" alt="image">
                    Finance
                </button>
              </h2>
            </div>
            <div id="collapseThree1" class="collapse <?=$finance_menu?>" aria-labelledby="headingThree1" data-parent="#accordion">
              <div class="card-body">
                <ul class="nav nav-tab" id="myTab" role="tablist">
                  <!-- <li class="nav-item">
                    <a class="nav-link" id="statements-tab" data-toggle="tab" href="#statements" role="tab" aria-controls="statements" aria-selected="true">Account statements</a>
                  </li> -->
                  <?php if ($_SESSION['seller']['status'] == 'active'): ?>                      
                    <li class="nav-item">
                      <a class="nav-link <?=$page_orders?>" href="<?=BASEURL.'seller/orders'?>">Order overview</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link <?=$page_order_search?>" href="<?=BASEURL.'seller/order-search'?>">Order Search</a>
                    </li>
                  <?php endif ?>
                  <li class="nav-item">
                    <a class="nav-link <?=$page_transactions?>" href="<?=BASEURL.'seller/transactions'?>">Transaction overview</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree11">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed <?=$account_menu?>" data-toggle="collapse" data-target="#collapseThree11" aria-expanded="<?=$account_menu_true?>" aria-controls="collapseThree11">
                  <img src="<?=IMG?>bg-account.png" alt="image">
                    Account & Settings
                </button>
              </h2>
            </div>
            <div id="collapseThree11" class="collapse <?=$account_menu?>" aria-labelledby="headingThree11" data-parent="#accordion">
              <div class="card-body">
                <ul class="nav nav-tab" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link <?=$page_profile?>" href="<?=BASEURL.'seller/profile'?>">Profile</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" id="management-tab" data-toggle="tab" href="#management" role="tab" aria-controls="management" aria-selected="true">User Management</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link <?=$page_account_setting?>" href="<?=BASEURL.'seller/account-setting'?>">Account settings</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" id="chat-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Chat settings</a>
              </li> -->
                </ul>
              </div>
            </div>
          </div>
          <div class="card">
              <div class="card-header" id="headingThree111">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree111" aria-expanded="false" aria-controls="collapseThree111">
                    <img src="<?=IMG?>img153.png" alt="image">
                      Logout
                  </button>
                </h2>
              </div>
              <div id="collapseThree111" class="collapse" aria-labelledby="headingThree111" data-parent="#accordion">
                <div class="card-body">
                  <ul class="nav nav-tab" id="myTab111" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link" href="<?=BASEURL.'logout'?>">Logout</a>
                    </li>
                  </ul>
                </div>
              </div>
              
            </div>
        </div>
      </div><!-- /left-bar -->
      <div class="tab-content" id="myTabContent">
