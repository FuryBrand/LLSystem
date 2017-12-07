	<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
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
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-5">
			<img src="./view/imgs/newlogo.png" style="height:74px">
		</div>
		<div class="col-lg-6 col-md-5 col-sm-6 col-xs-7 margin-top10">
			<div class="col-xs-12" >
				<form method="post" action="./controller/ajax.php?fun=search">
				<div style="float:right">
					<div class="search">
						<input type="radio" name="type" value="0" id="product" <?php ($hasKeyword&&$from=="0"||!$hasKeyword)?print 'checked' : "" ?>>
						<label for="product" >产品</label>
						<input type="radio" name="type" value="1" id="news" <?php ($hasKeyword&&$from=="1")?print 'checked' : "" ?>>
						<label for="news">新闻</label>
						<input type="text" name="keyword" value="<?php ($hasKeyword)?print $keyword : '' ?>" placeholder="关键字" style="width:40%;height:25px">
						<input type="submit" value="搜索" style="width:50px;height:25px">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<?php 
					include_once(Root_Path.'/view/navbar.php') 
					?>
		</div>
	</div>
