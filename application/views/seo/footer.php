








<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


<script>


$(function(){


    $('#table-data').DataTable();
    CKEDITOR.replace( 'editor4' );


    $(document).on('click', '.edit-cat', function(event) {
    	event.preventDefault();
    	$id = $(this).attr('data-id');
    	$.post('<?=BASEURL."seo/get-cat"?>', {id: $id}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-cat .modal-title").text(resp.data.title);
    			$("#modal-cat input[name='id']").val($id);
    			$("#modal-cat input[name='slug']").val(resp.data.slug);
    			$("#modal-cat input[name='meta_title']").val(resp.data.meta_title);
    			$("#modal-cat textarea[name='meta_key']").val(resp.data.meta_key);
    			$("#modal-cat textarea[name='meta_desc']").val(resp.data.meta_desc);
    			$("#modal-cat textarea[name='description']").val(resp.data.description);
    			$("#modal-cat").modal('show');
				CKEDITOR.replace( 'editor1' );
    		}
    		else{
    			alert('nothing found');
    		}
    	});
    });


    $(document).on('submit', '#modal-cat form', function(event) {
    	event.preventDefault();
    	$form = $(this);
    	$.post('<?=BASEURL."seo/submit-cat"?>', {data: $form.serialize()}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-cat").modal('hide');
    		}
    		alert(resp.msg);
    	});
    });

    $(document).on('click', '.edit-page', function(event) {
    	event.preventDefault();
    	$id = $(this).attr('data-id');
    	$.post('<?=BASEURL."seo/get-page"?>', {id: $id}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-page .modal-title").text(resp.data.pg_title);
    			$("#modal-page input[name='id']").val($id);
    			$("#modal-page input[name='pg_title']").val(resp.data.pg_title);
    			$("#modal-page input[name='video_code']").val(resp.data.video_code);
    			$("#modal-page textarea[name='pg_descri']").val(resp.data.pg_descri);
    			$("#modal-page input[name='meta_title']").val(resp.data.meta_title);
    			$("#modal-page textarea[name='meta_key']").val(resp.data.meta_key);
    			$("#modal-page textarea[name='meta_desc']").val(resp.data.meta_desc);
    			$("#modal-page").modal('show');
				CKEDITOR.replace( 'editor2' );
    		}
    		else{
    			alert('nothing found');
    		}
    	});
    });


    $(document).on('submit', '#modal-page form', function(event) {
    	event.preventDefault();
    	$form = $(this);
    	$.post('<?=BASEURL."seo/submit-page"?>', {data: $form.serialize()}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-page").modal('hide');
    		}
    		alert(resp.msg);
    	});
    });

    $(document).on('click', '.edit-blog', function(event) {
    	event.preventDefault();
    	$id = $(this).attr('data-id');
    	$.post('<?=BASEURL."seo/get-blog"?>', {id: $id}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-edit-blog .modal-title").text(resp.data.title);
    			$("#modal-edit-blog input[name='id']").val($id);
    			$("#modal-edit-blog input[name='title']").val(resp.data.title);
    			$("#modal-edit-blog input[name='slug']").val(resp.data.slug);
    			$("#modal-edit-blog textarea[name='short']").val(resp.data.short);
    			$("#modal-edit-blog textarea[name='detail']").val(resp.data.detail);
    			$("#modal-edit-blog input[name='meta_title']").val(resp.data.meta_title);
    			$("#modal-edit-blog textarea[name='meta_key']").val(resp.data.meta_key);
    			$("#modal-edit-blog textarea[name='meta_desc']").val(resp.data.meta_desc);
    			$("#modal-edit-blog").modal('show');
				CKEDITOR.replace( 'editor3' );
    		}
    		else{
    			alert('nothing found');
    		}
    	});
    });

    $(document).on('submit', '#modal-edit-blog form', function(event) {
    	event.preventDefault();
    	$form = $(this);
    	$.post('<?=BASEURL."seo/update-blog"?>', {data: $form.serialize()}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-edit-blog").modal('hide');
    		}
    		alert(resp.msg);
    	});
    });
    $(document).on('submit', '#modal-add-blog form', function(event) {
    	event.preventDefault();
    	$form = $(this);
    	$.post('<?=BASEURL."seo/post-blog"?>', {data: $form.serialize()}, function(resp) {
    		resp = JSON.parse(resp);
    		if (resp.status == true) {
    			$("#modal-add-blog").modal('hide');
    			location.reload();
    		}
    		alert(resp.msg);
    	});
    });


});//onload
</script>


</body>
</html>




<div class="modal fade" id="modal-cat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal title</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">

				<form class="cat-form">
					<input type="hidden" name="id">
					<div class="form-group">
						<label>URL Slug *</label>
						<input type="text" name="slug" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Description</label>
						<textarea id="editor1" name="description" class="form-control" rows="5"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Title *</label>
						<input type="text" name="meta_title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Key *</label>
						<textarea name="meta_key" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Description *</label>
						<textarea name="meta_desc" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Update</button>
					</div><!-- /form-group -->
				</form>
				
			</div><!-- /modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div><!-- /modal-footer -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- #modal-cat -->


<div class="modal fade" id="modal-page">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal title</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">

				<form class="page-form">
					<input type="hidden" name="id">
					<div class="form-group">
						<label>Page Title *</label>
						<input type="text" name="pg_title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Page Detail</label>
						<textarea id="editor2" name="pg_descri" class="form-control" rows="5"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Video Code</label>
						<input type="text" name="video_code" class="form-control">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Title *</label>
						<input type="text" name="meta_title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Key *</label>
						<textarea name="meta_key" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Description *</label>
						<textarea name="meta_desc" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Update</button>
					</div><!-- /form-group -->
				</form>
				
			</div><!-- /modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div><!-- /modal-footer -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- #modal-page -->


<div class="modal fade" id="modal-edit-blog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal title</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">

				<form class="blog-edit-form">
					<input type="hidden" name="id">
					<div class="form-group">
						<label>Title *</label>
						<input type="text" name="title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Slug *</label>
						<input type="text" name="slug" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Short Detail *</label>
						<textarea name="short" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Detail *</label>
						<textarea id="editor3" name="detail" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Title *</label>
						<input type="text" name="meta_title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Key *</label>
						<textarea name="meta_key" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Description *</label>
						<textarea name="meta_desc" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Update</button>
					</div><!-- /form-group -->
				</form>
				
			</div><!-- /modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div><!-- /modal-footer -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- #modal-edit-blog -->


<div class="modal fade" id="modal-add-blog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add New Blog</h4>
			</div><!-- /modal-header -->
			<div class="modal-body">

				<form class="blog-add-form">
					<div class="form-group">
						<label>Title *</label>
						<input type="text" name="title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Slug *</label>
						<input type="text" name="slug" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Short Detail *</label>
						<textarea name="short" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Detail *</label>
						<textarea id="editor4" name="detail" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Title *</label>
						<input type="text" name="meta_title" class="form-control" required="required">
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Key *</label>
						<textarea name="meta_key" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<label>Meta Description *</label>
						<textarea name="meta_desc" class="form-control" rows="5" required="required"></textarea>
					</div><!-- /form-group -->
					<div class="form-group">
						<button class="btn btn-primary">Submit</button>
					</div><!-- /form-group -->
				</form>
				
			</div><!-- /modal-body -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div><!-- /modal-footer -->
		</div><!-- /modal-content -->
	</div><!-- /modal-dialog -->
</div><!-- #modal-add-blog -->




