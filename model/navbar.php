<?php include_once(dirname(__FILE__)."/base.php");?>
<?php
////////针对单一问题的特定方法///////
function get_nav(){
    return db_select_all("*","navbar");
}
function add_nav($text,$href,$pid){
    return db_insert("navbar",['name','href','pid'],[$text,$href,$pid]);
}
function delete_nav($id){
    return db_delete("navbar",$id);
}
function update_nav($name,$href,$id){
	$sql="UPDATE navbar SET name='".$name."' ,href='".$href."' WHERE id='".$id."'";
    return run_sql($sql);
}
function get_second_nav($pid){
	return db_select("*","navbar",'pid',$pid);
}
//$db=db_select("*","index_comment","content","中文");
//$db=db_update("index_comment","content","呵呵",1);
//$db=db_select_all("time,content","index_comment");
//$db=db_insert("index_comment",['content'],[1]);
//$db=db_delete("index_comment",9);
//var_dump($db);
?>

