<?php include_once(dirname(__FILE__)."\base.php");?>
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
function update_news($id,$title,$type,$thumb){
    $sql="UPDATE news SET type='".$type."', title='".$title."' ,thumb='".$thumb."' WHERE id='".$id."'";
    return run_sql($sql,true);
}
//lwx:改一个字段
function update_onepro_news($setField,$setVal,$id){
    return db_update("news",$setField,$setVal,$id);
}
    //lwx:返回指定新闻页面
function get_news_by_id($id){
    $sql = "SELECT n.id,n.title,n.content,n.create_date,n.type,f.name FROM news n LEFT JOIN fk_news_type f ON n.type=f.id WHERE n.id=$id";
    return run_sql($sql,true);
}
//lwx:返回指定类型的新闻页面
function get_news_by_type($typeid){
    $sql = "SELECT * FROM news WHERE type=$typeid";
    return run_sql($sql,true);
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

