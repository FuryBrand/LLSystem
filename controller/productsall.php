<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include(Root_Path."/model/productsall.php");
 ?>
<?php
function productall_type_list(){
	$navList=get_productsall_type();
	$arr=array();
	$navs=array();
	for($i=0;$i<count($navList);$i++){
		if($navList[$i]['father_id']==0){
			array_push($arr,$navList[$i]);
			for($j=i;$j<count($navList);$j++){
				if($navList[$i]['id']==$navList[$j]['father_id']){
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