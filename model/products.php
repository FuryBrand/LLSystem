<?php include_once(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_products($valArr){
    $nameArr = array("title", "type", "father_id","html_path");
    return db_insert("news",$nameArr,$valArr);
}
//lwx:删，删之前判断是否可删 can_del($id)
function del_products($id){
    return db_delete("products",$id);
}
//lwx:改
function update_products($type,$title,$html_path,$id){
    $sql="UPDATE products SET type='".$type."', title='".$title."' ,html_path='".$html_path."' WHERE id='".$id."'";
    return run_sql($sql);
}
//lwx:返回指定新闻页面
function get_products_by_id($id){
    return db_select("*","products","id",id);
}

//ly:映射表
function get_all_products(){
    return db_select_all("*","products");
}
////////针对单一问题的特定方法///////
//判断指定id是否为产品，是否为空的类别，是否可以被删除
function can_del($id){
    $sql1 = "SELECT * FROM products WHERE id=$id AND type=2";
    $sql2 = "SELECT * FROM products WHERE father_id = $id";
    if(count(run_sql($sql1,true))==0){
        return true;
    } else if(count(run_sql($sql2,true))==0){
        return true;
    } else {
        return false;
    }
}
//lwx：根据关键字查询匹配的产品标题
function search_products_by_title($input){
    $sql="SELECT * FROM products WHERE type=2 AND title LIKE '%$input%'";
    return run_sql($sql,true);
}
?>

