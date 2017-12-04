<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');

if(!array_key_exists('id', $_GET)){
	include_once(Root_Path."./404.html");
	die();
}
$filePath;
$pageId=$_GET['id'];
$isNews='false';
if(array_key_exists("isNews",$_GET)){
	$isNews=$_GET["isNews"];
}
if($isNews=="true"){
	$filePath=News_File;
	include_once(Root_Path."/model/news.php");
	include_once(Root_Path."/model/fk_news_type.php");
	$article_type=get_fk_news_type();
	$articles=get_news_by_id($pageId);

}else{
	$filePath=Productsall_File;
	include_once(Root_Path."/model/productsall.php");
	$articles=get_productsall_by_id($pageId);
}
if(count($articles)==0){
	include_once(Root_Path."./404.html");
	die();
}
$page_article_type=0;
$hasType=array_key_exists('type', $_GET);
if($hasType){
	$page_article_type=$_GET['type'];
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
					<h3 style="text-align:center;margin:20px"><?php echo $articles[0]['title'] ?></h3>
					<?php include($filePath.$articles[0]['content']) ?>
					<div class="clearfix">
						<span class="left">发布时间: <?php echo date("Y-m-d",strtotime($articles[0]['create_date'])) ?></span>
						<?php if($filePath==News_File){?>
							<span class="right" >类型: <?php echo $articles[0]['name'] ?></span>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
