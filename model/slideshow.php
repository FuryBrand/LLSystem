<?php include_once(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_slideshow($valArr){
    $nameArr = array("path", "url");
    return db_insert("slideshow",$nameArr,$valArr);
}
//lwx:删
function del_slideshow($id){
    return db_delete("slideshow",$id);
}
//lwx:改
function update_slideshow($setField,$setVal,$id){
    return db_update("slideshow",$setField,$setVal,$id);
}
//lwx:返回指定轮播图
function get_slideshow_by_id($id){
    return db_select("*","slideshow","id",id);
}
//ly:返回所有轮播图
function get_all_slideshow(){
    return db_select_all("*","slideshow");
}
////////针对单一问题的特定方法///////

?>