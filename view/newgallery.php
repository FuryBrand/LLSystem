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
		height: 100%;
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
	}
	.main2-list-item {
    float: left;
    width: 250px;
    overflow: hidden;
    height: 150px;
    border: 1px solid #DBDBDB;
    display: block;
    margin-left: 20px;
    margin-top: 20px;
    position: relative;
	}
	.main2-list-item-pic {
    width: 100%;
    height: 100%;
	}
	.main2-list-item-txt1 {
    position: absolute;
    bottom: 0;
    width: 100%;
    left: 0;
    background: url(./view/imgs/opacity-black50.png) repeat;
    line-height: 40px;
    color: #fff;
    text-align: center;
    font-size: 16px;
	}
	.thide {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
</style>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div style="font-size:0">
		<?php for($i=0;$i<count($products);$i++){ ?>
		<div class="">
			<div class="">
				<a href="http://localhost/LLSystem/article_detail.php?isNews=false&id=<?php echo $products[$i]['id'] ?>&type=0" class="main2-list-item">
					<div class="main2-list-item-pic" style="background: url(<?php echo productsall_Thumb.$products[$i]['thumb'];?>) no-repeat center center; background-size: cover;"></div>
					<h2 class="main2-list-item-txt1 thide"><?php echo $products[$i]['title'] ?></h2>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>