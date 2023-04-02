




<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
			<div class="content">
				


				<table id="table-data" class="celled table">
			        <thead>
			            <tr>
			                <th>Level</th>
			                <th>Name</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>
			        	<?php foreach ($cats as $key => $q): ?>
			        		<tr>
			        			<td><?=$q['leval']+1?></td>
			        			<td><?=$q['title']?></td>
			        			<td><a href="javascript://" class="edit-cat" data-id="<?=$q['id']?>">Edit</a></td>
			        		</tr>
			        	<?php endforeach ?>
			        </tbody>
			        <tfoot>
			            <tr>
			                <th>Level</th>
			                <th>Name</th>
			                <th>Action</th>
			            </tr>
			        </tfoot>
			    </table>



			</div><!-- /content -->
		</div><!-- /12 -->
	</div><!-- /row -->
</div><!-- /container -->