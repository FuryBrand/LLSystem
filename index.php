<?php 
include_once("./config.php"); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>盛达杰森(北京)自动化设备有限公司</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="./view/css/bootstrap.min.css" rel="stylesheet">
	<link href="./view/css/base.css" rel="stylesheet">
	<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./view/js/tether.min.js"></script>
	<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<?php include('./view/header.php') ?>
		<?php include('./view/slider.php') ?>
		<div class="row margin-top30">
			<?php include('./view/gallery.php') ?>
			<?php include('./view/news.php') ?>
		</div>	
	</div>
	<?php include('./view/footer.php') ?>
</body>