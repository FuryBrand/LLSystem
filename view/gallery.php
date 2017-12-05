<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/productsall.php");
$products=get_lastest_productsall();
?>
<style>
	.gallery{
		width: 50%;
		height: 160px;
		display: inline-block;
		margin-bottom: 10px;
	}
	.gallery img{
		width: 100%;
	}
	.gallery .text{
		font-size: 18px;
		text-align: center;
		height: 30px;
		line-height: 30px;
		color: white;
		background: rgba(0,0,0,0.5);
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		margin-right: 10px;
	}
	.wrap{
		margin-right:10px;
		height: 100%;
		position: relative;
		border:1px solid #e3e3e3;
		overflow: hidden;
	}
</style>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div style="font-size:0">
		<?php for($i=0;$i<count($products);$i++){ ?>
		<div class="gallery">
			<div class="wrap">
				<a href="article_detail.php?isNews=false&id=<?php echo $products[$i]['id'] ?>&type=0" >
					<img src="<?php echo Productsall_Thumb.$products[$i]['thumb'];?>" >
					<div class="text"><?php echo $products[$i]['title'] ?></div>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>