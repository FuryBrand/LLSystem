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
	//默认返回全部的列表
}
$news_type=get_fk_news_type();
//加载所有新闻
$news_list=get_paged_news(1,News_Page_Size);
$news_count=get_news_counts();
//新闻总页数
$pages= floor($news_count/News_Page_Size);
//当前页面新闻类型
$page_news_type=0;
$hasType=array_key_exists('type', $_GET);
if($hasType){
	$page_news_type=$_GET['type'];
}
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
				<a href="./news_list.php?type=0"><li style="cursor:pointer" class="<?php $page_news_type==0? print 'active': print '' ?>">全部</li></a>
				<?php for($i=0;$i<count($news_type);$i++){?>
				<a href="./news_list.php?type=<?php echo $news_type[$i]['id'] ?>" >
					<li style="cursor:pointer" class="<?php $page_news_type==$news_type[$i]['id']? print 'active': print '' ?>">
						<?php echo $news_type[$i]['name'] ?>
					</li>
				</a>
				<?php } ?>
			</ul>	
		</div>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="panel panel-default news-left-up" style="margin-bottom:10px">
				<?php for($i=0;$i<count($news_list);$i++){ ?>
				<div style="margin:0 30px 0 27px" class="panel-body">
					<a href="./news_detail.php?id=<?php echo $news_list[$i]['id'] ?>">
						<h4><?php echo $news_list[$i]['title'] ?></h4>
					</a>
					<a href="./news_detail.php?id=<?php echo $news_list[$i]['id'] ?>">
						<img src="<?php echo News_Thumb.$news_list[$i]['thumb'] ?>" style="width:100%;" />
					</a>
					<div class="clearfix">
						<span class="left"><?php echo date("Y-m-d",strtotime($news_list[$i]['create_date'])) ?></span><a class="right" href="./news_detail?id=<?php echo $news_list[$i]['id'] ?>">阅读全文 &gt;</a>
					</div>
					<hr style="display:<?php $i==(count($news_list)-1)? print 'none' : print 'block' ?>"/>
				</div>
				<?php } ?>
			</div>
			<div style="margin-top: 0px;" class="panel panel-default news-left-down">
				<div class="panel-body">
					<ul class="list-inline text-center">
						<nav>
							<ul class="pagination" style="margin:0 auto">
								<li><a href="./news_list?page=1&amp;type=<?php echo $news_list[$i]['type'] ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
								<?php for($i=0;$i<$pages;$i++){ ?>
								<li><a href="./news_list?page=<?php echo ($i+1).'&type='.$news_list[$i]['type'] ?>">1</a></li>
								<?php } ?>
								<li><a href="news?page=<?php echo $pages ?>&amp;type=<?php echo $news_list[$i]['type'] ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
							</ul>
						</nav>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
