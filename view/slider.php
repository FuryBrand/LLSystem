<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/slideshow.php");
?>
<?php 
$all_slides=get_all_slideshow();
?>
<link rel="stylesheet" href="./view/css/normalize.css">
<link rel="stylesheet" href="./view/css/easySlider.css">
<script src="./view/js/easySlider.js"></script>
<style>
	.responsive{
		/*height: 320px;*/
	}
</style>
<div id="slider">
	<ul class="slides">
		<?php for($i=0;$i<count($all_slides);$i++){ ?>
		<li>
			<a href="<?php echo $all_slides[$i]['url'] ?>">
				<img class="responsive" src="<?php echo Slider_Img.$all_slides[$i]['path'] ?>">
			</a>
		</li>
		<?php } ?>
	</ul>
	<ul class="controls">
		<li><img src="./view/imgs/prev.png" alt="previous"></li>
		<li><img src="./view/imgs/next.png" alt="next"></li>
	</ul>
	<ul class="pagination">
		<?php for($i=0;$i<count($all_slides);$i++){?>
		<li class="<?php $i==0 ? print 'active': print '' ?>"></li>
		<?php } ?>
	</ul>
</div>
<script>
	$(function() {
		$("#slider").easySlider( {
			slideSpeed: 500,
			autoSlide: true,
			paginationSpacing: "15px",
			paginationDiameter: "10px",
			paginationPositionFromBottom: "10px",
			slidesClass: ".slides",
			controlsClass: ".controls",
			paginationClass: ".pagination"					
		});
	});
</script>