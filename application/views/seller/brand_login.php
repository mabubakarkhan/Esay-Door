<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Login</title>
	<link rel="stylesheet" href="<?=CSS?>bootstrap.min.css">
</head>
<body style="background:#000;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<form action="<?=BASEURL.'admin/process-login/'.$brand?>" method="post">
					<div style="background:#fff;border-radius: 5px;margin: 30px 0;padding: 20px;">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required name="email">
						</div><!-- /form-group -->
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" required name="password">
						</div><!-- /form-group -->
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Login</button>
						</div><!-- /form-group -->
					</div>
				</form>
			</div><!-- /4 -->
		</div><!-- /row -->
	</div><!-- /container -->
</body>
</html>