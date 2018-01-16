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
</style>
<div class="container-fluid news_list">
	<?php include_once("./view/header.php") ?>
	<div class="row">
		<?php include_once('./view/leftNav.php') ?>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="panel panel-default news-left-up" style="margin-bottom:10px">
				<?php for($i=0;$i<count($article_list);$i++){ 
					$href="./article_detail.php?isNews=".$isNews."&id=".$article_list[$i]['id']."&type=".$page_article_type."&from=".$from;
					if($i==0){
						?>
						<div style="margin:0 30px 0 27px" class="panel-body">
							<a href="<?php echo $href ?>">
								<h4><?php echo $article_list[$i]['title'] ?></h4>
							</a>
							<a style="display:block;text-align:center" href="<?php echo $href ?>">
								<img src="<?php echo $imgPath.$article_list[$i]['thumb'];?>" style="width:100%;" />
							</a>
							<div class="clearfix">
								<span class="left"><?php echo date("Y-m-d",strtotime($article_list[$i]['create_date'])) ?></span>
								<a class="right" href="<?php echo $href ?>">阅读全文 &gt;</a>
							</div>
							<hr style="display:<?php $i==(count($article_list)-1)? print 'none' : print 'block' ?>"/>
						</div>
						<?php }else{ ?>
						<div style="margin:0 30px 0 27px" class="panel-body">
							<a href="<?php echo $href ?>">
								<h4><?php echo $article_list[$i]['title'] ?></h4>
							</a>
							<a style="display:block;text-align:center" href="<?php echo $href ?>">
								<img src="<?php echo $imgPath.$article_list[$i]['thumb'];?>" style="width:100%;" />
							</a>
							<div class="clearfix">
								<span class="left"><?php echo date("Y-m-d",strtotime($article_list[$i]['create_date'])) ?></span>
								<a class="right" href="<?php echo $href ?>">阅读全文 &gt;</a>
							</div>
							<hr style="display:<?php $i==(count($article_list)-1)? print 'none' : print 'block' ?>"/>
						</div>
						<?php }
					} ?>
					</div>
					<div style="margin-top: 0px;" class="panel panel-default news-left-down">
						<div class="panel-body">
							<ul class="list-inline text-center">
								<nav>
									<ul class="pagination" style="margin:0 auto">
										<li><a href="./article_list.php?isNews=<?php echo $isNews ?>&amp;keyword=<?php echo $keyword ?>&amp;page=1&amp;type=<?php echo $page_article_type ?>&amp;from=<?php echo $from ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
										<?php for($i=0;$i<$pages;$i++){ ?>
										<li class="<?php ($i+1)==$current_page? print 'active' : print '' ?>">
											<a href="./article_list.php?isNews=<?php echo $isNews ?>&amp;keyword=<?php echo $keyword ?>&amp;page=<?php echo ($i+1).'&type='.$page_article_type ?>&amp;from=<?php echo $from ?>"><?php echo ($i+1) ?></a>
										</li>
										<?php } ?>
										<li><a href="./article_list.php?isNews=<?php echo $isNews ?>&amp;keyword=<?php echo $keyword ?>&amp;page=<?php echo $pages ?>&amp;type=<?php echo $page_article_type ?>&amp;from=<?php echo $from ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
									</ul>
								</nav>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<?php include_once("./view/footer.php") ?>
		</div>
		<script type="text/javascript">
		$('img').error(function(){
			$(this).attr('src', "./view/imgs/error.jpg");
			$(this).css("width",'200px');
		});
		</script>