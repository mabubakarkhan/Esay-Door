<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style>
	*{
		padding: 0;
		margin: 0;
		text-decoration: none;
		font-size: 100%;
	}
	body{
		background: #000;
	}
	.box{
		margin-top: 20px;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-o-border-radius: 5px;
		border: 1px solid #eee;
		background: #fff;
		padding: 10px;
	}
	</style>
</head>
<body>
	


	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="box">
					<form action="<?=BASEURL.'seo/post-login'?>" method="post">
						<div class="form-group">
							<label>Username</label>
							<input type="text" name="username" class="form-control" required="required">
						</div><!-- /form-group -->
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="password" class="form-control" required="required">
						</div><!-- /form-group -->
						<div class="form-group">
							<button class="btn btn-primary">Login</button>
						</div><!-- /form-group -->
					</form>
				</div><!-- /box -->
			</div><!-- /4 -->
		</div><!-- /row -->
	</div><!-- /container -->


</body>
</html>