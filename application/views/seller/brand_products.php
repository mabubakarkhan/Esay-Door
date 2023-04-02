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
      </div>    
    </div><!-- /seller-header -->
    <div class="dashbord-content">
      <a class="mobile-left-menu" href="javascript://"><i class="fa fa-bars" aria-hidden="true"></i></a>
      <div class="left-bar">
        <div id="accordion" class="myaccordion">
          <div class="card">
            <div class="card-header" id="headingThree1">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed <?=$finance_menu?>" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="<?=$finance_menu_true?>" aria-controls="collapseThree1">
                  <img src="<?=IMG?>bg-finance.png" alt="image">
                    Products
                </button>
              </h2>
            </div>
          </div>


        </div>
      </div><!-- /left-bar -->
      <div class="tab-content" id="myTabContent">


			<div class="tab-pane active" id="home1" role="tabpanel" aria-labelledby="home1-tab">
			  	<h1>Manage Product</h1>
			  	<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
			  		<p class="alert alert-danger"><?=$_GET['msg']?></p>
			  	<?php endif ?>
			  	<?php if (isset($_GET['error']) && $_GET['error'] == '0'): ?>
			  		<p class="alert alert-success"><?=$_GET['msg']?></p>
			  	<?php endif ?>
			  	<div class="btn-list">
			  		<!-- <button>Export</button> -->
			  		<button onclick="location.href = '<?=BASEURL?>admin/download-products-pricing/<?=$brand?>';">Download Prices</button>
			  		<button class="open-product-pricing-upload-modal">Upload Prices</button>
			  	</div>
			  	<div class="product_list">
			  		<ul>
			  			<li>
			  				<span>All</span>
			  				<em class="all-count">(<?=count($products)?>)</em>
			  			</li>
			  		</ul>


			  	</div>
			  	<div class="table-holder">
			  		<table id="tableData" class="product-table seller-product-table">
			  			<thead>
			  				<th>ID</th>
			  				<th>Name</th>
			  				<th>SKU</th>
			  				<th>Price</th>
			  				<th>Image</th>
			  				<th>Status</th>
			  			</thead>
			  			<tbody>
			  				<?php foreach ($products as $key => $product): ?>
				  				<tr>
				  					<td><?=$product['product_id']?></td>
				  					<td><?=$product['product_name']?></td>
				  					<td><?=$product['sku']?></td>
				  					<td>
				  						<?php if ($product['sale_percentage'] > 0): ?>
				  							<?=$product['price']?>
				  						<?php else: ?>
				  							<?=$product['price']?>
				  						<?php endif ?>
				  					</td>
				  					<td>
				  						<?php if (strlen($product['product_image']) > 4): ?>
				  							<a href="<?=UPLOADS_PRO.$product['product_image']?>" target="_blank" style="font-size: 13px;">View Main Image</a><br>
				  						<?php else: ?>
				  							<p>--- no image ---</p>
				  						<?php endif ?>
				  					</td>
				  					<td>
				  						<?php if ($product['in_stock'] == '1'): ?>
				  							<strong>Active</strong><br>
				  						<?php else: ?>
				  							<strong>Deactive</strong><br>
				  						<?php endif ?>
				  						<a href="<?=BASEURL.'product/'.$product['slug'].'-'.$product['product_id']?>" target="_blank">View Product</a>
				  					</td>
				  				</tr>
			  				<?php endforeach ?>
			  			</tbody>
			  		</table>
			  	</div>
			  </div><!-- /tab-pane -->




<div class="modal fade" id="images-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Images</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'seller/upload-product-images'?>">
                    <div class="form-group">
                        <label for="">Select Images (you can select multiple images)</label><br>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <input type="file" class="btn btn-info" name="post_photos[]" id="post_photo_form" multiple="multiple">
                        </span>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div><!-- /form-group -->
                </form>
                <table class="table table-bordered">
                    <thead>
                        <th>Imager</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="2">Nothing Found</td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><!-- /modal-footer -->
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- /images-modal -->

<div class="modal fade" id="modal-bulk-images-uploads">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Images</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'seller/upload-product-images-2'?>">
                    <div class="form-group">
                        <label for="">Select Images (you can select multiple images (upto 20 images at once))</label><br>
                        <span class="btn btn-rose btn-round btn-file">
                            <span class="fileinput-new">Select image</span>
                            <input type="file" class="btn btn-info" name="post_photos[]" id="post_photo_form_2" multiple="multiple">
                        </span>
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div><!-- /form-group -->
                </form>
            </div><!-- /modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div><!-- /modal-footer -->
        </div><!-- /modal-content -->
    </div><!-- /modal-dialog -->
</div><!-- /modal-bulk-images-uploads -->




<script type="text/javascript">
    function del_q(id) {
        cnfr = confirm("Wait a min. Are you really going to delete this product with id:"+id);
        if (cnfr) {
            document.location = "<?=BASEURL?>seller/delete-product/?id="+id;
        }
    }
</script>



























                <div class="suppotr_center">
                    <span>Need some assistance? Visit our <a href="#">Support Center</a> or contact your <a href="#">Customer Success</a> Manager.</span>
                </div>
            </div><!-- /tab-content -->
        </div><!-- /dashbord-content -->
    </div><!-- #wrapper -->
</body>

  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#tableData').DataTable();
        } );//onload

        
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

      $(document).on('click', '.open-product-pricing-upload-modal', function(event) {
	        event.preventDefault();
	        $("#modal-upload-product-pricing").modal('show');
	    });



    });
   </script>
   <script>
    $("ul.nav-tabs a").click(function (e) {
      e.preventDefault();  
        $(this).tab('show');
    });
   </script>
</html>


<div class="modal fade" id="modal-upload-product-pricing">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Product Pricing</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'admin/products-pricing-csv-upload/'.$brand?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>CSV File *</label>
                        <input type="file" name="csv" required="required">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <button class="btn btn-primary">Upload</button>
                    </div><!-- /form-group -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!-- /#modal-upload-product-pricing -->