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
	<style type="text/css">
	.logo-height{
        	height:88px;
        }
	@media (max-width: 769px) {
        .right-text{
        	text-align: left;
        }
        .logo-height{
        	height:auto;
        }
    }
	</style>
	<div class="row margin-top30">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<img src="./view/imgs/newlogo.png" class="logo-height">
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<form method="post" class="search right-text" action="./controller/ajax.php?fun=search">
				<input type="radio" name="type" value="0" id="product" <?php ($hasKeyword&&$from=="0"||!$hasKeyword)?print 'checked' : "" ?>>
				<label for="product" style="margin-right:10px;">产品</label>
				<input type="radio" name="type" value="1" id="news" <?php ($hasKeyword&&$from=="1")?print 'checked' : "" ?>>
				<label for="news" style="margin-right:20px;">新闻</label>
				<input type="text" name="keyword" value="<?php ($hasKeyword)?print $keyword : '' ?>" placeholder="关键字" style="width:40%;height:30px">
				<input type="submit" value="搜索" class="btn btn-info" style="width:60px;height:30px;line-height:10px;vertical-align: top;">
			</form>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<?php include_once(Root_Path.'/view/navbar.php') ?>
		</div>
	</div>