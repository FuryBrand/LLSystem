<?php 
include_once("./config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>帮助</title>
	<link href="./view/css/bootstrap.min.css" rel="stylesheet">
	<link href="./view/css/news_list.css" rel="styleSheet" />
	<link href="./view/css/service.css" rel="stylesheet">
	<link href="./view/css/base.css" rel="stylesheet">
	<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./view/js/tether.min.js"></script>
	<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<?php include('./view/header.php') ?>
		<?php include('./view/slider.php') ?>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 problems-left">
				<ul id="commonHelpNav" class="text-left">
					<div class="title">
						购物指南
					</div>
					<li role="presentation" class="active">
						<a href="#yhzc" aria-controls="yhzc" role="tab" data-toggle="tab">如何开始</a>
					</li>
					<div class="title">
						特色服务
					</div>
					<li role="presentation"><a href="#ccwl" aria-controls="ccwl" role="tab" data-toggle="tab">仓储质检</a></li>
				</ul>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				hehe
			</div>
		</div>
		<?php include('./view/footer.php') ?>
	</div>
</body>
</html>