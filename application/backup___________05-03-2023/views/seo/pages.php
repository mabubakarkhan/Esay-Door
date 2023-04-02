




<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="content">
				


				<table id="table-data" class="celled table">
			        <thead>
			            <tr>
			                <th>Page</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php foreach ($pages as $key => $q): ?>
			        		<tr>
			        			<td><?=$q['pg_title']?></td>
			        			<td><a href="javascript://" class="edit-page" data-id="<?=$q['id']?>">Edit</a></td>
			        		</tr>
			        	<?php endforeach ?>
			        </tbody>
			        <tfoot>
			            <tr>
			                <th>Name</th>
			                <th>Action</th>
			            </tr>
			        </tfoot>
			    </table>



			</div><!-- /content -->
		</div><!-- /12 -->
	</div><!-- /row -->
</div><!-- /container -->