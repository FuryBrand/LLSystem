<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/fk_news_type.php");
include_once(Root_Path."/model/news.php");
$keyword = false;
if(array_key_exists("keyword",$_GET)){
	$keyword=$_GET["keyword"];
}
if($keyword){
	//根据关键字检索

}else{
}
$news_type=get_fk_news_type();
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
<div class="container news_list">
	<?php include_once("./view/header.php") ?>
	<div class="row">
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<ul class="types">
				<li style="background-color:#008cd6;color:white;border:0">资讯类别</li>
				<?php for($i=0;$i<count($news_type);$i++){?>
				<a href="./news_list.php?news_id=<?php echo $news_type[$i]['id'] ?>"><li style="cursor:pointer" class="<?php $i==0?print 'active':'' ?>"><?php echo $news_type[$i]['name'] ?></li></a>
				<?php } ?>
			</ul>	
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="panel panel-default news-left-up">
				<div style="margin:0 30px 0 27px" class="panel-body">
					<a href="./article?req=323">
						<h4>【新品预发】丹柠伯爵罗纳河口干红葡萄酒</h4>
					</a>
					<a href="./article?req=323">
					<img src="https://www.dosale.cn:3000/manager2/attach//201704/5e2f436f70bb322ea207a500d592bb6d/lnhkyf-news da.jpg" style="width:100%;" />
					</a>
					<div class="clearfix">
						<span class="left">2017-04-20</span><a class="right" href="./article?req=323">阅读全文 &gt;</a>
					</div>
					<hr />
				</div>
			</div>
			<div style="margin-top: -18px;" class="panel panel-default news-left-down">
				<div class="panel-body">
					<ul class="list-inline text-center">
						<nav>
							<ul class="pagination">
								<li><a href="news?page=1&amp;type=0" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
								<li><a href="news?page=1&amp;type=0">1</a></li>
								<li><a href="news?page=2&amp;type=0">2</a></li>
								<li><a href="news?page=3&amp;type=0">3</a></li>
								<li><a href="news?page=4&amp;type=0">4</a></li>
								<li><a href="news?page=5&amp;type=0">5</a></li>
								<li><a href="news?page=6&amp;type=0">6</a></li>
								<li><a href="news?page=7&amp;type=0">7</a></li>
								<li><a href="news?page=8&amp;type=0">8</a></li>
								<li><a href="news?page=8&amp;type=0" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
							</ul>
						</nav>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
