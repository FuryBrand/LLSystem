<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/produces.php");
$produces=get_all_produces();
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
</style>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<div style="font-size:0">
		<?php for($i=0;$i<count($produces);$i++){ ?>
		<div class="gallery">
			<div class="wrap">
				<a href="<?php echo $produces[$i]['html_path'] ?>" target="_blank">
					<img src="./admin/images/produce/<?php echo $i+1 ?>.<?php echo $produces[$i]['type'] ?>" >
					<div class="text"><?php echo $produces[$i]['title'] ?></div>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
</div>