<?php ?>
<style>
.news-title{
	border-bottom:1px solid #f6f6f6;
	font-size: 17px;
	height: 50px;
	line-height: 50px;
	padding-left:20px;
}
.title {
	font-size:19px;
	border-bottom:1px solid #f6f6f6;
	height:28px;
	line-height:28px;
}
</style>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	<h3 class="title"><span style="border-bottom:2px solid #0094ff">新闻中心</span></h4>
	<?php for($i=0;$i<6;$i++){ ?>
	<div class="news-title">第<?php echo $i ?>条新闻 <span style="margin-left:30px">2017-7-7</span></div>
	<?php } ?>
</div>