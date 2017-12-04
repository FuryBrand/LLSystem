<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
$isNews='false';
$imgPath;
if(array_key_exists("isNews",$_GET)){
	$isNews=$_GET["isNews"];
}
if($isNews=="true"){
	$imgPath=News_Thumb;
	include_once(Root_Path."/model/news.php");
}else{
	$imgPath=Productsall_Thumb;
	include_once(Root_Path."/model/productsall.php");
}

$keyword = false;
if(array_key_exists("keyword",$_GET)){
	$keyword=$_GET["keyword"];
}
//当前页面新闻类型
$page_article_type=0;
$hasType=array_key_exists('type', $_GET);
if($hasType){
	$page_article_type=$_GET['type'];
	if($page_article_type=="0"){
		$hasType=false;
	}
}

//获取当前是第几页
$current_page=1;
if(array_key_exists('page', $_GET)){
	$current_page=$_GET['page'];
}
//设定总页数
$article_count=1;

//获取新闻数据逻辑
if($isNews=="true"){
	if($keyword){
		$article_count=get_news_counts_by_title($keyword);
		$article_list=get_paged_news_by_title($current_page,News_Page_Size,$keyword);
	}else{
		if($hasType){
			$article_count=get_news_counts($page_article_type);
			$article_list=get_paged_news($current_page,News_Page_Size,$page_article_type);
		}else{
			$article_count=get_news_counts();
			$article_list=get_paged_news($current_page,News_Page_Size);
		}
	}
}else{
	if($keyword){
		$article_count=get_product_count_by_title($keyword);
		$article_list=search_paged_productsall_by_title($keyword,$current_page,News_Page_Size);
	}else{
		if($hasType){
			$article_count=get_product_count_by_fatherId($page_article_type);
			$article_list=get_paged_productsall_by_fatherid($page_article_type,$current_page,News_Page_Size);
		}else{
			$article_count=get_all_products_count();
			$article_list=get_paged_productsall(Type4Product,$current_page,News_Page_Size);
		}
	}
}
//新闻总页数
$pages= ceil($article_count/News_Page_Size);
?>