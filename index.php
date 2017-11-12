
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>盛达杰森(北京)自动化设备有限公司</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="./view/css/bootstrap.min.css" rel="stylesheet">
	<link href="./view/css/base.css" rel="stylesheet">
	<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./view/js/tether.min.js"></script>
	<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
	<style>
	.search input{ width:15px; height: 15px; }
	.search label{ font-size: 16px; }
	</style>
</head>
<body>
	<div class="large-container">
		<div class="row margin-top30">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<img src="./view/imgs/logo.png" style="width:100%">
			</div>
			<div class="col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12 margin-top10">
				<form method="post" action="./controller/ajax.php?fun=search">
					<div class="search">
						<input type="radio" name="type" value="0" id="product">
						<label for="product" class="margin-right10">产品</label>
						<input type="radio" name="type" value="1" id="news">
						<label for="news">新闻</label>
					</div>
					<div class="margin-top10">
						<div class="row">
							<div class="col-xs-8">
								<input type="text" name="keyWord" placeholder="请输入关键字" style="width:100%;height:40px">
							</div>
							<div class="col-xs-4">
								<input type="submit" name="keyWord" value="搜索" class="btn btn-info" style="height:40px">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<?php include('./view/navbar.php') ?>
		<?php include('./view/slider.php') ?>
	</div>
</body>
<script type="text/javascript">
function dingcan(id){ var department=$("#department").val(),
count=$("#count").val(); if(department==="0"){ alert("请选择部门!"); return false; }(); if(!comment){ alert("请输入内容!"); return false; }