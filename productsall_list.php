<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path.'/controller/productsall.php');
$productsall_type=productsall_type_list();
//var_dump($productsall_type);
?>
<link href="./view/css/bootstrap.min.css" rel="stylesheet">
<link href="./view/css/news_list.css" rel="styleSheet" />
<link href="./view/css/base.css" rel="stylesheet">
<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./view/js/tether.min.js"></script>
<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
<style type="text/css">
	.types{
		
	}
	.types li{
		height: 50px;
		line-height: 50px;
		text-align: center;
		font-size: 18px;
		border-bottom:1px solid #ddd;
		border-left:1px solid #ddd;
		border-right:1px solid #ddd;
	}
	.active{
		border-left:3px solid #008cd6 !important;
		color:#008cd6;
	}
	.news_list a{
		text-decoration: none;
	}
	.news_list a:hover{
		color:#008cd6;
	}
</style>
<div class="container news_list">
	<?php include_once("./view/header.php") ?>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<ul class="types">
				<li style="background-color:#008cd6;color:white;border:0">产品分类</li>
				<?php for($i=0;$i<count($productsall_type);$i++){
						if(count($productsall_type[$i])<=1){
							continue;
						}else{ ?>
							<li class=""><p><?php echo $productsall_type[$i][0]["title"] ?><b class="caret"></b></p>
									<?php for($j=1;$j<count($productsall_type[$i]);$j++){?>
									<li><a href="#" style="margin-left:20"><?php echo $productsall_type[$i][$j]['title'] ?></a></li>
									<?php } ?>
							</li>
				<?php }
				} ?>
	</div>
</div>
