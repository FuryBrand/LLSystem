<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
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
	<script type="text/javascript" src="./view/js/utils.js"></script>
	<script type="text/javascript" src="./view/js/tether.min.js"></script>
	<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
	<style>
		.search input{ width:15px; height: 15px; }
		.search label{ font-size: 16px; }
		#content p{
			text-indent: 2rem;
			font-size: 16px;
			margin-bottom: 20px;
			line-height: 30px;
		}
		#content h1{
			text-align: center;
			margin-bottom: 30px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<?php include(Root_Path.'/view/header.php') ?>
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 problems-left">
				<ul id="commonHelpNav" class="text-left">
					<div class="title">
						帮助中心
					</div>
					<li role="presentation" class="active">
						<a href="#introduce" aria-controls="introduce" role="tab" data-toggle="tab">公司介绍</a>
					</li>
					<li role="presentation" class="active">
						<a href="#promise" aria-controls="promise" role="tab" data-toggle="tab">售后服务承诺</a>
					</li>
					<li role="presentation">
						<a href="#contact_us" aria-controls="contact_us" role="tab" data-toggle="tab">联系我们</a>
					</li>
					<li role="presentation">
						<a href="#legal" aria-controls="legal" role="tab" data-toggle="tab">法律声明</a>
					</li>
					<li role="presentation">
						<a href="#privacy" aria-controls="privacy" role="tab" data-toggle="tab">隐私条款</a>
					</li>
				</ul>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div id="content" class="tab-content" style="min-height:500px">
					<?php
					include_once('./static/pages/help/introduce.html');
					include_once('./static/pages/help/promise.html');
					include_once('./static/pages/help/contact_us.php');
					include_once('./static/pages/help/legal.html');
					include_once('./static/pages/help/privacy.html');
					?>
				</div>
			</div>
		</div>
		<?php include('./view/footer.php') ?>
	</div>
</body>
<script type="text/javascript">
	$(function(){
		var page=getQueryString('page');
		if(page){
			$("#commonHelpNav").find("a[href=#"+page+"]").click();
		}
	})
</script>
</html>