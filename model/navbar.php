<?php include(dirname(__FILE__)."\base.php");?>
<?php
////////针对单一问题的特定方法///////
function get_nav(){
    return db_select_all("*","navbar");
}
function add_comment($content){
    $content=strip_tags($content);
    $arrStr=array('content');
    $arrContent=array($content);
    return db_insert("comment",$arrStr,$arrContent);
}
function get_all_department(){
    return db_select_all("*","department");
}
function add_dingcan($department,$count){
    return db_insert("foodcount",['department','count'],[intval($department),intval($count)]);
}
function each_depart_count(){
    $sql="SELECT * from foodcount where date>'".date('Y/m/d 00:00:00')."'";
    return run_sql($sql,true);
}
//$db=db_select("*","index_comment","content","中文");
//$db=db_update("index_comment","content","呵呵",1);
//$db=db_select_all("time,content","index_comment");
//$db=db_insert("index_comment",['content'],[1]);
//$db=db_delete("index_comment",9);
//var_dump($db);
?>

