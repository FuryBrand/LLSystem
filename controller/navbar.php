<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
include(Root_Path."/model/navbar.php");
 ?>
<?php
function nav_list(){
	$navList=get_nav();
	$arr=array();
	$navs=array();
	for($i=0;$i<count($navList);$i++){
		if($navList[$i]['pid']==0){
			array_push($arr,$navList[$i]);
			for($j=0;$j<count($navList);$j++){
				if($navList[$i]['id']==$navList[$j]['pid']){
					array_push($arr,$navList[$j]);
				}
			}
			array_push($navs,$arr);
		}
		$arr=array();
	}
	return $navs;
}
?>