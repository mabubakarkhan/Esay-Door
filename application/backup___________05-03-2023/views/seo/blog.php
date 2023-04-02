




<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="content">
				
				<a class="btn btn-primary" data-toggle="modal" href='#modal-add-blog' style="margin-bottom: 10px;">+ Add New</a>

				<table id="table-data" class="celled table">
			        <thead>
			            <tr>
			                <th>Title</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php foreach ($blog as $key => $q): ?>
			        		<tr>
			        			<td><?=$q['title']?></td>
			        			<td><a href="javascript://" class="edit-blog" data-id="<?=$q['blog_id']?>">Edit</a></td>
			        		</tr>
			        	<?php endforeach ?>
			        </tbody>
			        <tfoot>
			            <tr>
			                <th>Title</th>
			                <th>Action</th>
			            </tr>
			        </tfoot>
			    </table>



			</div><!-- /content -->
		</div><!-- /12 -->
	</div><!-- /row -->
</div><!-- /container -->