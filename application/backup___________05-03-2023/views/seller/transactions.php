			<div class="tab-pane active" id="transaction" role="tabpanel" aria-labelledby="transaction-tab">
				<p style="font-size: 25px;">Balance: <strong>RS. <?=number_format(intval($user['balance']))?></strong></p>
			  	<div class="table-holder">
			  		<table>
			  			<thead>
			  				<th>#</th>
			  				<th>Dated</th>
			  				<th>Amount</th>
			  				<th>Method</th>
			  			</thead>
			  			<tbody>
			  				<?php foreach ($transfer_history as $key => $thq): ?>
			  					<tr>
			  						<td><?=$thq['transfer_history_id']?></td>
			  						<td><?=date('d-m-Y H:i:s',strtotime($thq['at']))?></td>
			  						<td><?=$thq['amount']?></td>
			  						<td><?=$thq['method']?></td>
			  					</tr>
			  				<?php endforeach ?>
			  			</tbody>
			  		</table>
			  	</div><!-- /table-holder -->
			  </div><!-- /tab-pane -->