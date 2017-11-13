<?php include(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_object($valArr){
    $nameArr = array("title", "content", "create_date");
    return db_insert("news",$nameArr,$valArr);
}
//lwx:删
function del_object($id){
    return db_delete("news",$id);
}
//lwx:改
function update_object($setField,$setVal,$id){
    return db_update("news",$setField,$setVal,$id);
}
//lwx:返回指定新闻页面
function get_Object_by_id($id){
    return db_select("*","news","id",id);
}

////////针对单一问题的特定方法///////
//lwx:获取最新的6条新闻
function get_lastest(){
    $sql="SELECT * FROM news ORDER BY create_date DESC LIMIT 6";
    return run_sql($sql,true);
}
//lwx:返回新闻数量
function get_counts(){
    $sql="SELECT COUNT(*) FROM news";
    return run_sql($sql,true);
}
//lwx:分页查询
function get_page_object($startIndex,$pageSize){
    $sql="SELECT * FROM news ORDER BY create_date DESC LIMIT $startIndex,$pageSize";
    return run_sql($sql,true);
}
?>

