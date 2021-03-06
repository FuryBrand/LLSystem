<?php 
include_once('./controller/article_list.php');
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
	.types .active{
		border-left:3px solid #008cd6 !important;
		color:#008cd6;
	}
	.news_list a{
		text-decoration: none;
	}
	.news_list a:hover{
		color:#008cd6;
	}
	.gallery{
		width: 33%;
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
<div class="container news_list">
	<?php include_once("./view/header.php") ?>
	<div class="row">
		<?php include_once('./view/leftNav.php') ?>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div style="font-size:0">
				<?php for($i=0;$i<count($article_list);$i++){ 
					$href="./article_detail.php?isNews=".$isNews."&id=".$article_list[$i]['id']."&type=".$page_article_type;
					?>
					<div class="gallery">
						<div class="wrap">
							<a href="<?php echo $href ?>">
								<img class="img-responsive" src="<?php echo $imgPath.$article_list[$i]['thumb'];?>" >
								<div class="text"><?php echo $article_list[$i]['title'] ?></div>
							</a>
						</div>
					</div>
				<?php } ?>
			</div>

			<div style="margin-top: 0px;" class="panel panel-default news-left-down">
				<div class="panel-body">
					<ul class="list-inline text-center">
						<nav>
							<ul class="pagination" style="margin:0 auto">
								<li><a href="./article_list.php?isNews=<?php echo $isNews ?>&amp;keyword=<?php echo $keyword ?>&amp;page=1&amp;type=<?php echo $page_article_type ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
								<?php for($i=0;$i<$pages;$i++){ ?>
								<li class="<?php ($i+1)==$current_page? print 'active' : print '' ?>">
									<a href="./article_list.php?isNews=<?php echo $isNews ?>&amp;keyword=<?php echo $keyword ?>&amp;page=<?php echo ($i+1).'&type='.$page_article_type ?>"><?php echo ($i+1) ?></a>
								</li>
								<?php } ?>
								<li><a href="./article_list.php?isNews=<?php echo $isNews ?>&amp;keyword=<?php echo $keyword ?>&amp;page=<?php echo $pages ?>&amp;type=<?php echo $page_article_type ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
							</ul>
						</nav>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('img').error(function(){
		$(this).attr('src', "./view/imgs/error.jpg");
		$(this).css("width",'200px');
	});
</script>