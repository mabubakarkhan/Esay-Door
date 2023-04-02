
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div style="height: 400px;margin: 20px 0;">
					<p>Please write the 4 gidit code here </p>
					<?php if (date('Y-m-d H:i:s') < date("Y-m-d H:i:s",strtotime(date($seller['varification_code_expiry'])." +10 minutes"))): ?>
						<p align="center"><span id="CountDown" style="font-size: 30px;font-weight: bold;"></span></p>
						<div id="varification_code_form_block">
							<form>
								<input type="number" name="code" class="form-control" required="required">
								<button type="submit" class="btn btn-success">Save</button>
							</form>
						</div><!-- /varification_code_form_block -->
					<?php endif ?>
					<a href="javascript://" class="resend_code">Resend Code ?</a>
				</div>
			</div><!-- /4 -->
		</div><!-- /row -->
	</div>

<?php if (date('Y-m-d H:i:s') < date("Y-m-d H:i:s",strtotime(date($seller['varification_code_expiry'])." +10 minutes"))): ?>
	<script>
	window.onload = function() {
	  var minute = 9;
	  var sec = 60;
	  setInterval(function() {
	    document.getElementById("CountDown").innerHTML = minute + " : " + sec;
	    sec--;
	    if (sec == 00) {
	      minute --;
	      sec = 60;
	      if (minute == 0) {
	    	document.getElementById("varification_code_form_block").innerHTML = '';
	    	document.getElementById("CountDown").innerHTML = "0 : 00";
	      }
	    }
	  }, 1000);
	}
	</script>
<?php endif ?>