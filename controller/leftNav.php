<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
if($isNews=="true"){//新闻页,一级子菜单
	include_once(Root_Path."/model/fk_news_type.php");
	$article_type=get_fk_news_type();
	$href="./article_list.php";
}else{//产品页,二级子菜单
	$href="./products_list.php";
	include_once(Root_Path."/model/productsall.php");
	$productsall_type=get_productsall_type();
	$article_type=[];
	$subType=[];
	$tempArr=[];
	for($i=0;$i<count($productsall_type);$i++) {  
		if($productsall_type[$i]['father_id']==""){
			foreach($productsall_type as $type2){
				if($productsall_type[$i]['id']==$type2['father_id']){
					array_push($subType, $type2);
				}
			}	
			$tempArr['name']=$productsall_type[$i]['title'];
			$tempArr['id']=-1;
			$tempArr['subType']=$subType;
			$article_type[$i]=$tempArr;

			$tempArr=[];
			$subType=[];
		}
	}
}
if(array_key_exists('type', $_GET)){
	$page_article_type=$_GET['type'];
}
//判断是否有返回按键
if(!isset($back)){
	$back=false;
}
?>