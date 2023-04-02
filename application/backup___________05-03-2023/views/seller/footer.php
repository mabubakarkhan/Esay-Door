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
    $(document).on('change', '#modal-bulk-product-uploads .parent-category-bulk', function(event) {
        event.preventDefault();
        $this = $(this);
        $(".child-cats").html('');
        $this.removeAttr('name');
        $id = $this.val();
        $(".product-bulk-sample-file").hide(0);
        $.post('<?=BASEURL."seller/get-child-cats-for-bulk"?>', {id: $id,child:'no'}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#modal-bulk-product-uploads .child-cats").append(resp.html);
            }
            else{
                $this.prop('name','category_id');
                $(".product-bulk-sample-file").html('<a href="<?=BASEURL?>seller/create-bulk-products-csv-file/'+$id+'" target="_blank">Download Sample File</a>');
                $(".product-bulk-sample-file").show(0);
            }
        });
    });

    $(document).on('change', '.category-select-tag', function(event) {
        event.preventDefault();
        $(".cat-tags-area").hide(0);
        $(".cat-tags-area").html('');
        $cat = $(this).val();
        $.post('<?=BASEURL."seller/get-cat-tags"?>', {cat: $cat,child:'no'}, function(resp) {
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
        $.post('<?=BASEURL."seller/get-child-cats"?>', {id: $id,child: 'yes'}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $(".child-cat-remove-before-append").remove();
                $(".child-cats").append(resp.html);
            }
            else{
                $this.prop('name','category_id');
            }
        });
    });
    $(document).on('change', '#modal-bulk-product-uploads .category-select-tag-dynamic-bulk', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.val();
        $(".product-bulk-sample-file").hide(0);
        $.post('<?=BASEURL."seller/get-child-cats-for-bulk"?>', {id: $id}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $("#modal-bulk-product-uploads .child-cats .remove-me-before-new-call").remove();
                $("#modal-bulk-product-uploads .child-cats").append(resp.html);
            }
            else{
                $this.prop('name','category_id');
                $(".product-bulk-sample-file").html('<a href="<?=BASEURL?>seller/create-bulk-products-csv-file/'+$id+'" target="_blank">Download Sample File</a>');
                $(".product-bulk-sample-file").show(0);
            }
        });
    });

    $(document).on('change', '.category-select-tag', function(event) {
        //working
        event.preventDefault();
        $this = $(this);
        $id = $this.val();
        $(".size-block,.color-block").fadeOut(0);
        $size = $('option:selected',this).attr('data-size');
        $color = $('option:selected',this).attr('data-color');
        $("#loading").fadeIn(400);
        if ($size == 'true') {
            $.post('<?=BASEURL."seller/get-sizes-by-cat"?>', {id: $id}, function(resp) {
                resp = JSON.parse(resp);
                if (resp.status == true) {
                    $(".size-block.size-block-sizes").html(resp.html);
                    $(".size-block").fadeIn(0);
                }
            });
        }
        if ($color == 'true') {
            $.post('<?=BASEURL."seller/get-colors-by-cat"?>', {id: $id}, function(resp) {
                resp = JSON.parse(resp);
                if (resp.status == true) {
                    $(".color-block.color-block-colors").html(resp.html);
                    $(".color-block").fadeIn(0);
                }
            });
        }

        $filter = $('option:selected',this).attr('data-filter-ids');
        $(".dynamic-filters").html('');
        $.post('<?=BASEURL."seller/get-filter-values-html"?>', {id: $filter}, function(resp) {
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $(".dynamic-filters").html(resp.html);
            }
        });
        $("#loading").fadeOut(400);
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

    $(document).on('click', '.open-product-pricing-upload-modal', function(event) {
        event.preventDefault();
        $("#modal-upload-product-pricing").modal('show');
    });

    $(document).on('click', '.get-all-products-seller-filter', function(event) {
        event.preventDefault();
        $('.get-category-products-seller-filter').val('');
        $(".seller-product-table tbody").html('<tr><td colspan="7">Loading..</td></tr>');
        $.post('<?=BASEURL?>seller/get-seller-products-ajax', {id: 0}, function(resp) {
            resp =JSON.parse(resp);
            $(".seller-product-table tbody").html(resp.html);
        });
    });
    $(document).on('change', '.get-category-products-seller-filter', function(event) {
        event.preventDefault();
        $id = $(this).val();
        if ($id.length > 0) {
            $(".seller-product-table tbody").html('<tr><td colspan="7">Loading..</td></tr>');
            $.post('<?=BASEURL?>seller/get-seller-products-ajax', {id: $id}, function(resp) {
                resp =JSON.parse(resp);
                $(".seller-product-table tbody").html(resp.html);
                if (resp.status == true) {
                    $(".all-count").html(resp.count.all.count);
                    $(".live-count").html(resp.count.live.count);
                    $(".poor-count").html(resp.count.poor.count);
                    $(".sold-count").html(resp.count.sold.count);
                    $(".inactive-count").html(resp.count.inactive.count);
                    $(".policy-count").html(resp.count.policy.count);
                }
                else{
                    $(".all-count").html(0);
                    $(".live-count").html(0);
                    $(".poor-count").html(0);
                    $(".sold-count").html(0);
                    $(".inactive-count").html(0);
                    $(".policy-count").html(0);
                }
            });
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

<div id="loading" style="display: none;"><img id="loading-image" src="<?=IMG?>Easy-Door-gifmaker.gif" alt="Loading..." /></div>


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
                            <?php if (1==2): ?>
                                <option value="On Way">On Way</option>
                                <option value="delivered">Delivered</option>
                                <option value="returned">Returned</option>
                                <option value="cancelled">Cancelled</option>
                            <?php endif ?>
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



<div class="modal fade" id="modal-bulk-product-uploads">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Products Bulk Upload</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'seller/products-csv-uploads'?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Category *</label>
                        <select class="parent-category-bulk form-control" data-id="category-1" required="required">
                            <option value="">Select Category</option>
                            <?php foreach ($parents as $key => $parent): ?>
                                <option value="<?=$parent['id']?>"><?=$parent['title']?></option>
                            <?php endforeach ?>
                        </select>
                    </div><!-- /form-group -->
                    <div class="child-cats">
                        
                    </div><!-- /child-cats -->
                    <div class="form-group">
                        <label>CSV File *</label>
                        <input type="file" name="csv" required="required">
                    </div><!-- /form-group -->
                    <div class="form-group">
                        <p class="product-bulk-sample-file" style="display: none;"><a href="<?=BASEURL.'seller/create-bulk-products-csv-file/'?>">Download Sample File</a></p>
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
</div>




<div class="modal fade" id="modal-upload-product-pricing">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload Product Pricing</h4>
            </div>
            <div class="modal-body">
                <form action="<?=BASEURL.'seller/products-pricing-csv-upload'?>" method="post" enctype="multipart/form-data">
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







<script>
$(function(){
	$(document).on('submit', '.seller-account-form-1', function(event) {
		event.preventDefault();
		$form = $(this);
		$("#loading").fadeIn(400);
		$.post('<?=BASEURL."seller/seller-account-form-1"?>', {data: $form.serialize()}, function(resp) {
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
	$(document).on('submit', '.seller-account-form-2', function(event) {
		event.preventDefault();
		$form = $(this);
		$("#loading").fadeIn(400);
		$.post('<?=BASEURL."seller/seller-account-form-2"?>', {data: $form.serialize()}, function(resp) {
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
	$(document).on('submit', '.seller-account-form-3', function(event) {
		event.preventDefault();
		$form = $(this);
		$("#loading").fadeIn(400);
		$.post('<?=BASEURL."seller/seller-account-form-3"?>', {data: $form.serialize()}, function(resp) {
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
	$(document).on('submit', '.seller-account-form-4', function(event) {
		event.preventDefault();
		$form = $(this);
		$("#loading").fadeIn(400);
		$.post('<?=BASEURL."seller/seller-account-form-4"?>', {data: $form.serialize()}, function(resp) {
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
	$(document).on('submit', '.seller-account-form-5', function(event) {
		event.preventDefault();
		$form = $(this);
		$("#loading").fadeIn(400);
		$.post('<?=BASEURL."seller/seller-account-form-5"?>', {data: $form.serialize()}, function(resp) {
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
	$(document).on('submit', '.change-password-form', function(event) {
		event.preventDefault();
		$form = $(this);
		$("#loading").fadeIn(400);
		$.post('<?=BASEURL."seller/change-password"?>', {data: $form.serialize()}, function(resp) {
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




	$("#Cheque-Input-file").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-photo-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true)
                {
                    $("#Cheque-image-file").attr('src',"<?=UPLOADS.'seller/'?>"+resp.data);
                    $("input[name='cheque_image']").val(resp.data);
                }
                else
                {
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });
    $("#cnic-front-Input-file").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-photo-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true)
                {
                    $("#cnic-front-image-file").attr('src',"<?=UPLOADS.'seller/'?>"+resp.data);
                    $("input[name='cnic_front']").val(resp.data);
                }
                else
                {
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });
    $("#cnic-back-Input-file").on('change',function(){
		var data = new FormData();
    	data.append('img', $(this).prop('files')[0]);
    	$("#loading").fadeIn(400);
	    $.ajax({
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        data: data,
	        url: '<?=BASEURL?>seller/post-photo-ajax',
	        dataType : 'json',
	        success: function(resp){
	        	$("#loading").fadeOut(400);
	       		if (resp.status == true)
	       		{
	       			$("#cnic-back-image-file").attr('src',"<?=UPLOADS.'seller/'?>"+resp.data);
	       			$("input[name='cnic_back']").val(resp.data);
	       		}
	       		else
	       		{
	       			$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
	       		}
	        }
	    });
	});

	$("#brand-logo-change-input").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-brand-logo-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true){
                    $("#brand-logo-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
                }
                else{
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });
    $("#brand-banner-change-input").on('change',function(){
		var data = new FormData();
    	data.append('img', $(this).prop('files')[0]);
    	$("#loading").fadeIn(400);
	    $.ajax({
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        data: data,
	        url: '<?=BASEURL?>seller/post-brand-banner-ajax',
	        dataType : 'json',
	        success: function(resp){
	        	$("#loading").fadeOut(400);
	       		if (resp.status == true){
	       			$("#brand-banner-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
	       		}
	       		else{
	       			$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
	       		}
	        }
	    });
	});

	$("#profile-image-file-input").on('change',function(){
		var data = new FormData();
    	data.append('img', $(this).prop('files')[0]);
    	$("#loading").fadeIn(400);
	    $.ajax({
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        data: data,
	        url: '<?=BASEURL?>seller/post-profile-img-ajax',
	        dataType : 'json',
	        success: function(resp){
	        	$("#loading").fadeOut(400);
	       		if (resp.status == true){
	       			$("#profile-image-change").attr('src',"<?=UPLOADS.'seller/'?>"+resp.data);
	       		}
	       		else{
	       			$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
	       		}
	        }
	    });
	});

    $("#brand-ad-1-change-input").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-brand-ad-1-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true){
                    $("#brand-ad-1-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
                }
                else{
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });

    $("#brand-ad-2-change-input").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-brand-ad-2-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true){
                    $("#brand-ad-2-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
                }
                else{
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });

    $("#brand-slide-1-change-input").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-brand-slide-1-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true){
                    $("#brand-slide-1-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
                }
                else{
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });

    $("#brand-slide-2-change-input").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-brand-slide-2-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true){
                    $("#brand-slide-2-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
                }
                else{
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });

    $("#brand-slide-3-change-input").on('change',function(){
        var data = new FormData();
        data.append('img', $(this).prop('files')[0]);
        $("#loading").fadeIn(400);
        $.ajax({
            type: 'POST',
            processData: false,
            contentType: false,
            data: data,
            url: '<?=BASEURL?>seller/post-brand-slide-3-ajax',
            dataType : 'json',
            success: function(resp){
                $("#loading").fadeOut(400);
                if (resp.status == true){
                    $("#brand-slide-3-change").attr('src',"<?=UPLOADS_CAT?>"+resp.data);
                }
                else{
                    $("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
                }
            }
        });
    });

    $(document).on('submit', '.save-brand-about', function(event) {
        event.preventDefault();
        $about = $(".save-brand-about textarea[name='about']").val();
        $("#loading").fadeIn(400);
        $.post('<?=BASEURL."seller/update-brand-about"?>', {about: $about}, function(resp) {
            $("#loading").fadeOut(400);
        });
    });

	$(document).on('change', '.product-add-cat-select', function(event) {
        event.preventDefault();
        $(".cat-tags-area").hide(0);
        $(".cat-tags-area").html('');
        $cat = $(this).val();
        $("#loading").fadeIn(400);
        $.post('<?=site_url( 'seller/get-cat-tags' )?>', {cat: $cat}, function(resp) {
            resp = JSON.parse(resp);
            $("#loading").fadeOut(400);
            if (resp.status == true) {
                $(".cat-tags-area").html(resp.html);
                $(".cat-tags-area").show(0);
            }
        });
    });

    $(document).on('change', '.seller-account-form-2 select[name="country"]', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$country = $this.val();
    	$(".seller-account-form-2 select[name='state']").html('<option value="">Select</option>');
    	$(".seller-account-form-2 select[name='city']").html('<option value="">Select State First</option>');
    	if ($country.length > 0) {
			$("#loading").fadeIn(400);
    		$.post('<?=BASEURL."seller/get-states"?>', {country: $country}, function(resp) {
    			resp = JSON.parse(resp);
    			$("#loading").fadeOut(400);
    			if (resp.status == true) {
    				$(".seller-account-form-2 select[name='state']").html(resp.html);
    			}
    			else{
    				$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
    			}
    		});
    	}
    });
    $(document).on('change', '.seller-account-form-2 select[name="state"]', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$state = $this.val();
    	$(".seller-account-form-2 select[name='city']").html('<option value="">Select</option>');
    	if ($state.length > 0) {
    		$("#loading").fadeIn(400);
    		$.post('<?=BASEURL."seller/get-cities"?>', {state: $state}, function(resp) {
    			resp = JSON.parse(resp);
    			$("#loading").fadeOut(400);
    			if (resp.status == true) {
    				$(".seller-account-form-2 select[name='city']").html(resp.html);
    			}
    			else{
    				$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
    			}
    		});
    	}
    });

    $("#business_document_file").on('change',function(){
		var data = new FormData();
    	data.append('img', $(this).prop('files')[0]);
    	$("#loading").fadeIn(400);
	    $.ajax({
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        data: data,
	        url: '<?=BASEURL?>seller/post-photo-ajax',
	        dataType : 'json',
	        success: function(resp){
	        	$("#loading").fadeOut(400);
	       		if (resp.status == true){
	       			$(".seller-account-form-2 input[name='file']").val(resp.data);
	       		}
	       		else{
	       			$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
	       		}
	        }
	    });
	});

	$(document).on('change', '.seller-account-form-4 select[name="country"]', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$country = $this.val();
    	$(".seller-account-form-4 select[name='state']").html('<option value="">Select</option>');
    	$(".seller-account-form-4 select[name='city']").html('<option value="">Select State First</option>');
    	if ($country.length > 0) {
    		$("#loading").fadeIn(400);
    		$.post('<?=BASEURL."seller/get-states"?>', {country: $country}, function(resp) {
    			resp = JSON.parse(resp);
    			$("#loading").fadeOut(400);
    			if (resp.status == true) {
    				$(".seller-account-form-4 select[name='state']").html(resp.html);
    			}
    			else{
    				$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
    			}
    		});
    	}
    });
    $(document).on('change', '.seller-account-form-4 select[name="state"]', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$state = $this.val();
    	$(".seller-account-form-4 select[name='city']").html('<option value="">Select</option>');
    	if ($state.length > 0) {
    		$("#loading").fadeIn(400);
    		$.post('<?=BASEURL."seller/get-cities"?>', {state: $state}, function(resp) {
    			resp = JSON.parse(resp);
    			$("#loading").fadeOut(400);
    			if (resp.status == true) {
    				$(".seller-account-form-4 select[name='city']").html(resp.html);
    			}
    			else{
    				$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
    			}
    		});
    	}
    });

    $(document).on('change', '.seller-account-form-5 select[name="country"]', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$country = $this.val();
    	$(".seller-account-form-5 select[name='state']").html('<option value="">Select</option>');
    	$(".seller-account-form-5 select[name='city']").html('<option value="">Select State First</option>');
    	if ($country.length > 0) {
    		$("#loading").fadeIn(400);
    		$.post('<?=BASEURL."seller/get-states"?>', {country: $country}, function(resp) {
    			resp = JSON.parse(resp);
    			$("#loading").fadeOut(400);
    			if (resp.status == true) {
    				$(".seller-account-form-5 select[name='state']").html(resp.html);
    			}
    			else{
    				$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
    			}
    		});
    	}
    });
    $(document).on('change', '.seller-account-form-5 select[name="state"]', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$state = $this.val();
    	$(".seller-account-form-5 select[name='city']").html('<option value="">Select</option>');
    	if ($state.length > 0) {
    		$("#loading").fadeIn(400);
    		$.post('<?=BASEURL."seller/get-cities"?>', {state: $state}, function(resp) {
    			resp = JSON.parse(resp);
    			$("#loading").fadeOut(400);
    			if (resp.status == true) {
    				$(".seller-account-form-5 select[name='city']").html(resp.html);
    			}
    			else{
    				$("#errorModal .modal-footer p").html(resp.msg);
                    $("#errorModal").modal('show');
    			}
    		});
    	}
    });

    $(document).on('click', '.change-order-item-status-seller', function(event) {
    	event.preventDefault();
    	$this = $(this);
    	$("#change-order-item--modal input[name='id']").val($this.attr('data-id'));
    	$("#change-order-item--modal").modal('show');
    });

    $(document).on('submit', '#change-order-item--modal form', function(event) {
    	event.preventDefault();
    	$form = $(this);
    	$("#loading").fadeIn(400);
    	$.post('<?=BASEURL."seller/change-sale-item-status"?>', {data: $form.serialize(),brand: '<?=$brand['brand_id']?>'}, function(resp) {
    		resp = JSON.parse(resp);
	    	$("#loading").fadeOut(400);
    		if (resp.status == true) {
    			$id = "#order-item-id-"+resp.id;
                $($id).children('.order-item-status').html(resp.item_status);
                $(".order-table-pending").html(resp.pending);
                $(".order-table-in-process").html(resp.in_process);
                $(".order-table-delivered-to-courier").html(resp.delivered_to_courier);
                $(".order-table-delivered").html(resp.delivered);
                $(".order-table-cancelled").html(resp.cancelled);
    			$(".order-table-returned").html(resp.returned);
                $("#change-order-item--modal").modal('hide');
    		}
    		else{
    			$("#errorModal .modal-footer p").html(resp.msg);
                $("#errorModal").modal('show');
    		}
    	});
    });

    $(document).on('click', '.get-images', function(event) {
        event.preventDefault();
        $this = $(this);
        $id = $this.attr('data-id');
        $title = $this.attr('data-title');
        $("#images-modal table tbody").html('<tr><td colspan="2">Nothing Found</td></tr>');
        $("#images-modal .modal-title").html('Product Title');
        $("#loading").fadeIn(400);
        $.post("<?=BASEURL.'seller/get-product-images'?>", {id: $id}, function(resp) {
            $("#loading").fadeOut(400);
            resp = JSON.parse(resp);
            $("#images-modal form").attr('action',"<?=BASEURL.'seller/upload-product-images/'?>"+$id);
            $("#images-modal input[name='category_id']").val(resp.category_id);
            $("#images-modal .modal-title").html($title);
            if (resp.status == true) {
                $("#images-modal table tbody").html(resp.html);
            }
            $("#images-modal").modal('show');
        });
    });
    $(document).on('click', '.delete-product-image', function(event) {
        event.preventDefault();
        $this = $(this);
        $("#loading").fadeIn(400);
        $.post("<?=BASEURL.'seller/delete-product-image'?>", {id: $this.attr('data-id')}, function(resp) {
            $("#loading").fadeOut(400);
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $this.parent('td').parent('tr').remove();
            }
            else{
                alert(resp.msg);
            }
        });
    });
    $(document).on('submit', '#images-modal form', function(event) {
        event.preventDefault();
        $form = $(this);
        var fd = new FormData();
        var files = $("#post_photo_form").get(0).files;
        fd.append("label", "sound");

        for (var i = 0; i < files.length; i++) {
            fd.append("img" + i, files[i]);
        }

        $("#loading").fadeIn(400);
        $.ajax({
            type: "POST",
            url: $form.attr('action'),
            contentType: false,
            processData: false,
            data: fd,
            success: function (resp) {
                $("#loading").fadeOut(400);
                resp = JSON.parse(resp);
                if (resp.status == true) {
                    $("#images-modal table tbody").html(resp.html);
                }
            }    
        })
    })//post-photo-uploader

    $(document).on('submit', '#modal-bulk-images-uploads form', function(event) {
        event.preventDefault();
        $form = $(this);
        var fd = new FormData();
        var files = $("#post_photo_form_2").get(0).files;
        fd.append("label", "sound");

        for (var i = 0; i < files.length; i++) {
            fd.append("img" + i, files[i]);
        }

        $("#loading").fadeIn(400);
        $.ajax({
            type: "POST",
            url: $form.attr('action'),
            contentType: false,
            processData: false,
            data: fd,
            success: function (resp) {
                $("#loading").fadeOut(400);
                resp = JSON.parse(resp);
                alert(resp.msg);
                if (resp.status == true) {
                    $("#modal-bulk-images-uploads").modal('hide');
                }
            }    
        })
    })//post-photo-uploader

    $(document).on('click', '.check-all-tags-seller', function(event) {
        if ($(this).parent('div').children('input').prop('checked') == false) {
            $(this).parent('div').parent('.dynamic-filter-x-class').children('.l-info').children('input').prop('checked',true);
            $(this).parent('div').children('input').prop('checked',false);
        }
        else{
            $(this).parent('div').parent('.dynamic-filter-x-class').children('.l-info').children('input').prop('checked',false);
            $(this).parent('div').children('input').prop('checked',true);
        }
    });

    /**
    *
    *   PRODUCT DIFF
    *
    */
    $(document).on('keyup', '.product-price-sale,.product-price', function(event) {
        event.preventDefault();
        $price = parseInt($(".product-price").val());
        $diff = parseInt($(".product-price-diff").val());
        $sale = parseFloat($(".product-price-sale").val());
        if ($sale > 0) {
            $unit = $price/100;
            $Diff = $unit*$sale;
            $(".product-price-diff").val(parseInt($Diff));
        }
        else{
            $(".product-price-diff").val(0);
        }
    });
    $(document).on('keyup', '.product-price-diff', function(event) {
        event.preventDefault();
        $price = parseInt($(".product-price").val());
        $diff = parseInt($(".product-price-diff").val());
        $sale = parseFloat($(".product-price-sale").val());
        if ($diff == 0 || isNaN($diff)) {
            $(".product-price-diff").val(0);
            $(".product-price-sale").val(0);
        }
        else{
            $unit = $price/100;
            $Diff = $diff/$unit;
            $(".product-price-sale").val(parseInt($Diff));
        }
    });


    /*
    *
    *   LISTING
    *
    */
    $(document).on('submit', '#add-list-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $("#loading").fadeIn(400);
        $.post('<?=BASEURL."seller/post-list"?>', {data: $form.serialize()}, function(resp) {
            $("#loading").fadeOut(400);
            resp = JSON.parse(resp);
            alert(resp.msg);
            $("#add-list-form input[name='title']").val('');
            $("#add-list-form input[name='title']").focus();
        });
    });
    $(document).on('submit', '#edit-list-form', function(event) {
        event.preventDefault();
        $form = $(this);
        $("#loading").fadeIn(400);
        $.post('<?=BASEURL."seller/update-list"?>', {data: $form.serialize()}, function(resp) {
            $("#loading").fadeOut(400);
            resp = JSON.parse(resp);
            window.location.replace("<?=BASEURL?>seller/listing");
        });
    });
    $(document).on('click', '.delete-list', function(event) {
        event.preventDefault();
        $row = $(this);
        $id = $row.attr('data-id');
        $("#loading").fadeIn(400);
        $.post('<?=BASEURL?>seller/delete-list/'+$id+'/', {one: 1}, function(resp) {
            $("#loading").fadeOut(400);
            resp = JSON.parse(resp);
            if (resp.status == true) {
                $row.parent('td').parent('tr').remove();
            }
            else{
                alert(resp.msg);
            }
        });
    });
    $(document).on('change', '.seller-listing-change', function(event) {
        event.preventDefault();
        $this = $(this);
        if (parseInt($this.val()) > 0) {
            $("#loading").fadeIn(400);
            $.post('<?=BASEURL?>seller/product-add-to-list', {list: $this.val(), product: $this.attr('data-id')}, function(resp) {
                $("#loading").fadeOut(400);
                resp = JSON.parse(resp);
                alert(resp.msg);
            });
        }
        else if (parseInt($this.val()) == 0 && $this.val().length > 0) {
            $("#loading").fadeIn(400);
            $.post('<?=BASEURL?>seller/product-remove-from-list', {product: $this.attr('data-id')}, function(resp) {
                $("#loading").fadeOut(400);
                resp = JSON.parse(resp);
                alert(resp.msg);
            });
        }
    });

});//onload

$(function () {
    var sd = new Date(), ed = new Date();
  
    $('#startDate').datetimepicker({ 
      format: "Y/m/d H:i:s", 
      defaultDate: sd, 
      maxDate: ed 
    });
  
    $('#endDate').datetimepicker({ 
      format: "Y/m/d H:i:s", 
      defaultDate: ed, 
      minDate: sd 
    });

    //passing 1.jquery form object, 2.start date dom Id, 3.end date dom Id
    bindDateRangeValidation($("#order-search-form"), 'startDate', 'endDate');
});



</script>





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
        <p>Order submitted successfully,</p>
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



<?php if ($_SESSION['seller']['status'] != 'active'): ?>
<script>
$(function(){
    $("#accountmodal125").modal('show');
});//onload
</script>
<?php endif ?>


<!-- Modal -->
<div class="modal fade" id="accountmodal125" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="modal-columns">
            <div class="column-left">
                <img src="<?=IMG?>img175.png" alt="image">
            </div>
            <div class="column-right">
                <h2>Your Account Activation Proccessed</h2>
                <p>your account is not active, account activation you will be able to post add or manage products.</p>
                <button type="button" class="modal-btn" data-dismiss="modal">OK</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>