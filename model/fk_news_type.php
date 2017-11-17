<?php include(dirname(__FILE__)."\base.php");?>
<?php
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
function update_fk_news_type($setField,$setVal,$id){
    return db_update("fk_news_type",$setField,$setVal,$id);
}

////////针对单一问题的特定方法///////

?>

