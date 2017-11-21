<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/news.php");
include_once(Root_Path."/model/fk_news_type.php");
$news_type=get_fk_news_type();
if(array_key_exists('id', $_GET)){
	$pageId=$_GET['id'];
	$news=get_news_by_id($pageId);
}else{
	print '没有新闻id,无法显示新闻';
	die();
}
$page_news_type=0;
$hasType=array_key_exists('type', $_GET);
if($hasType){
	$page_news_type=$_GET['type'];
}
//设置让leftNav带有返回按钮
$back=true;
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
		<?php include_once('./view/leftNav.php') ?>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="panel panel-default news-left-up" style="margin-bottom:10px">
				<div style="margin:0 30px 0 27px" class="panel-body">
						<h3 style="text-align:center;margin:20px"><?php echo $news[0]['title'] ?></h3>
						<?php include(News_File.$news[0]['content']) ?>
					<div class="clearfix">
						<span class="left">发布时间: <?php echo date("Y-m-d",strtotime($news[0]['create_date'])) ?></span>
						<span class="right" >类型: <?php echo $news[0]['name'] ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
