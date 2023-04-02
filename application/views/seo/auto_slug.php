<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Auto Redirect</title>
</head>
<body style="background: #f5f5f5;">
	

	<p style="color: #fff;background: #000;padding: 20px;text-align: center;font-size: 17px;text-transform: uppercase;letter-spacing: 1px;margin: 40px auto;width: 70%;">
		This page will redirect after 1 seconds, please do not close this page and wait
		<progress value="0" max="1" id="progressBar"></progress>
	</p>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	var timeleft = 1;
	var downloadTimer = setInterval(function(){
	  if(timeleft <= 0){
	    clearInterval(downloadTimer);
	  }
	  document.getElementById("progressBar").value = 1 - timeleft;
	  timeleft -= 1;
	}, 1000);
	$(document).ready(function() {

		setTimeout(function() {
		    location.reload();
		}, 1000);
	});
	</script>


</body>
</html>