<link rel="stylesheet" href="./view/css/normalize.css">
<link rel="stylesheet" href="./view/css/easySlider.css">
<script src="./view/js/easySlider.js"></script>
<style>
.responsive{
	height: 320px;
}
</style>
<div id="slider">
	<ul class="slides">
		<li><img class="responsive" src="./view/imgs/1.png"></li>
		<li><img class="responsive" src="./view/imgs/2.png"></li>
		<li><img class="responsive" src="./view/imgs/3.png"></li>
		<li><img class="responsive" src="./view/imgs/4.png"></li>
	</ul>
	<ul class="controls">
		<li><img src="./view/imgs/prev.png" alt="previous"></li>
		<li><img src="./view/imgs/next.png" alt="next"></li>
	</ul>
	<ul class="pagination">
		<li class="active"></li>
		<li></li>
		<li></li>
		<li></li>
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