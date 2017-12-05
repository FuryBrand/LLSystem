	<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
	include_once(Root_Path."/controller/utils.php");
	 if(is_mobile_request()){ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
	<?php }else{ ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php } ?>
	<?php
	$hasKeyword=false;
	$from="";
	if(array_key_exists("keyword",$_GET)&&$_GET["keyword"]!=""){
		$keyword=$_GET["keyword"];

		$hasKeyword=true;
	}
	if(array_key_exists("from",$_GET)&&$_GET["from"]!=""){
		$from=$_GET["from"];
	}
	?>
	<div class="row margin-top30">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<img src="./view/imgs/logo.png" style="width:100%">
		</div>
		<div class="col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12 margin-top10">
			<form method="post" action="./controller/ajax.php?fun=search">
				<div class="search">
					<input type="radio" name="type" value="0" id="product" <?php ($hasKeyword&&$from=="0"||!$hasKeyword)?print 'checked' : "" ?>>
					<label for="product" class="margin-right10">产品</label>
					<input type="radio" name="type" value="1" id="news" <?php ($hasKeyword&&$from=="1")?print 'checked' : "" ?>>
					<label for="news">新闻</label>
				</div>
				<div class="margin-top10">
					<div class="row">
						<div class="col-xs-8">
							<input type="text" name="keyword" value="<?php ($hasKeyword)?print $keyword : '' ?>" placeholder="请输入关键字" style="width:100%;height:40px">
						</div>
						<div class="col-xs-4">
							<input type="submit" value="搜索" class="btn btn-info" style="height:40px">
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php 
	include_once(Root_Path.'/view/navbar.php') 
	?>