<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/news.php");
$keyword = false;
if(array_key_exists("keyword",$_GET)){
	$keyword=$_GET["keyword"];
}
//当前页面新闻类型
$page_article_type=0;
$hasType=array_key_exists('type', $_GET);

//获取当前是第几页
$current_page=1;
if(array_key_exists('page', $_GET)){
	$current_page=$_GET['page'];
}

if($hasType){//当选择了新闻类型时
	$page_article_type=$_GET['type'];
	$article_count=get_news_counts($page_article_type);
	//获取分页新闻列表
	if($keyword){
	//按照关键字搜索的情况
		$article_list=get_paged_news_by_title($current_page,News_Page_Size,$keyword);
	}else{
	//非关键字的情况
		$article_list=get_paged_news($current_page,News_Page_Size,$page_article_type);
	}
}else{//没有新闻类型时
	//加载所有新闻
	$article_count=get_news_counts();	
	if($keyword){
	//按照关键字搜索的情况
		$article_list=search_news_by_title($current_page,News_Page_Size,$keyword);
	}else{
	//非关键字的情况
		//获取分页新闻列表
		$article_list=get_paged_news($current_page,News_Page_Size);
	}
}

//新闻总页数
$pages= ceil($article_count/News_Page_Size);
?>