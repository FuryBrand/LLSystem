<?php include_once(dirname(__FILE__)."/base.php");?>
<?php
//ly:查询所有新闻分类
function get_fk_news_type(){
    return db_select_all("*","fk_news_type");
}
//lwx:添加新闻分类
function add_fk_news_type($valArr){
    $nameArr = array("name");
    return db_insert("fk_news_type",$nameArr,$valArr);
}
//lwx:删除新闻分类
function del_fk_news_type($id){
    return db_delete("fk_news_type",$id);
}
//lwx:修改新闻分类
function update_fk_news_type($name,$id){
    return db_update("fk_news_type","name",$name,$id);
}

////////针对单一问题的特定方法///////

?>

