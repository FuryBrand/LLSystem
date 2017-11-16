<?php include(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_produces($valArr){
    $nameArr = array("title", "type", "father_id","html_path");
    return db_insert("news",$nameArr,$valArr);
}
//lwx:删，删之前判断是否可删 can_del($id)
function del_produces($id){
    return db_delete("produces",$id);
}
//lwx:改
function update_produces($setField,$setVal,$id){
    return db_update("produces",$setField,$setVal,$id);
}
//lwx:返回指定新闻页面
function get_produces_by_id($id){
    return db_select("*","produces","id",id);
}

////////针对单一问题的特定方法///////
//lwx:确认该id是否可以被删除
function can_del($id){
    //判断指定id是否为产品
    $sql1 = "SELECT * FROM produces WHERE id=$id AND type=2";
    $sql2 = "SELECT * FROM produces WHERE father_id = $id";
    if(count(run_sql($sql1,true))==0){
        return true;
    } else if(count(run_sql($sql2,true))==0){
        return true;
    } else {
        return false;
    }
}
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
?>

