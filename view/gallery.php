<?php ?>
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
		<div class="gallery">
			<div class="wrap">
				<img src="./view/imgs/1.png" >
				<div class="text">123123</div>
			</div>
		</div>
		<div class="gallery">
			<div class="wrap">
				<img src="./view/imgs/2.png" >
				<div class="text">123123</div>
			</div>
		</div>
		<div class="gallery">
			<div class="wrap">
				<img src="./view/imgs/3.png" >
				<div class="text">123123</div>
			</div>
		</div>
		<div class="gallery">
			<div class="wrap">
				<img src="./view/imgs/4.png" >
				<div class="text">123123</div>
			</div>
		</div>
	</div>
</div>