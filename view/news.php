<?php
include_once('model/news.php');
$news_list=get_lastest_news();
?>
<style>
	.news-title{
		border-bottom:1px solid #ddd;
		font-size: 15px;
		height: 50px;
		line-height: 50px;
		padding-left:20px;
	}
	.title {
		font-size:18px;
		border-bottom:1px solid #ddd;
		height:28px;
		line-height:28px;
	}
	.news a{
		color: #333;
		text-decoration: none;
	}
	.news a:hover{
		color: #0094ff;
	}
</style>
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 news">
	<h3 class="title"><span style="border-bottom:2px solid #0094ff">最新资讯</span></h3>
	<?php for($i=0;$i<count($news_list);$i++){ ?>
	<div class="news-title row">
		<div class="col-xs-9">
			<a href="http://localhost/LLSystem/article_detail.php?isNews=true&id=<?php echo $news_list[$i]['id'] ?>&type=0">
				<?php echo $news_list[$i]['title'] ?>
			</a>
		</div>
		<div class="col-xs-3" style="font-size:14px">
			<?php echo date("Y-m-d",strtotime($news_list[$i]['create_date'])) ?>
		</div>
	</div>
	<?php } ?>
</div>