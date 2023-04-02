<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<style>
	*{
		padding: 0;
		margin: 0;
		text-decoration: none;
		font-size: 100%;
		list-style: none;
	}
	body{
		background: #f5f5f5;
	}
	header{
		padding: 10px;
		margin: 20px 0;
	}
	.content{
		background: #fff;
		padding: 10px;
		border: 1px solid #eee;
		border-radius: 7px;
		-webkit-border-radius: 7px;
		-moz-border-radius: 7px;
		-o-border-radius: 7px;
	}
	</style>
</head>
<body>






	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<header>
					<a href="<?=BASEURL.'seo/index'?>" class="btn btn-primary">Categories</a>
					<a href="<?=BASEURL.'seo/pages'?>" class="btn btn-success">Pages</a>
					<a href="<?=BASEURL.'seo/blog'?>" class="btn btn-info">Blog</a>
					<a href="<?=BASEURL.'seo/logout'?>" class="btn btn-danger">Logout</a>
				</header>
			</div>
		</div><!-- /row -->
	</div><!-- /container -->





