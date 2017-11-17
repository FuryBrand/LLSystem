<?php include(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_news($valArr){
    $nameArr = array("title", "content", "create_date","type");
    return db_insert("news",$nameArr,$valArr);
}
//lwx:删
function del_news($id){
    return db_delete("news",$id);
}
//lwx:改
function update_news($setField,$setVal,$id){
    return db_update("news",$setField,$setVal,$id);
}
//lwx:返回指定新闻页面
function get_news_by_id($id){
    return db_select("*","news","id",id);
}

////////针对单一问题的特定方法///////
//lwx:获取最新的6条新闻
function get_lastest_news(){
    $sql="SELECT * FROM news ORDER BY create_date DESC LIMIT 6";
    return run_sql($sql,true);
}
//lwx:返回新闻数量
function get_news_counts(){
    $sql="SELECT COUNT(*) FROM news";
    return run_sql($sql,true);
}
//lwx:分页查询
function get_paged_news($startIndex,$pageSize){
    $sql="SELECT * FROM news ORDER BY create_date DESC LIMIT $startIndex,$pageSize";
    return run_sql($sql,true);
}
//lwx：根据关键字查询匹配的新闻标题
function search_news_by_title($input){
    $sql="SELECT * FROM news WHERE title LIKE '%$input%'";
    return run_sql($sql,true);
}
?>

