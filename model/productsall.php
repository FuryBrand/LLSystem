<?php include_once(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_productsall($valArr){
    $nameArr = array("title", "type", "father_id","html_path","thumb");
    return db_insert("productsall",$nameArr,$valArr);
}
//lwx:添加产品所属的公司
function add_company_productsall($title){
    $sql = "INSERT INTO productsall (title,type) VALUES ('$title',1)";
    return run_sql($sql);
}
//lwx:删，删之前判断是否可删 can_del($id)
function del_productsall($id){
    return db_delete("productsall",$id);
}
//lwx:改
function update_productsall($type,$title,$html_path,$id){
    $sql="UPDATE productsall SET type='".$type."', title='".$title."' ,html_path='".$html_path."' WHERE id='".$id."'";
    return run_sql($sql);
}
//lwx:改某一字段
function update_onefiled_productsall($id,$filed,$val){
    $sql="UPDATE productsall SET ".$filed."='".$val."' WHERE id='".$id."'";
    return run_sql($sql);
}
//lwx:返回指定产品页面
function get_productsall_by_id($id){
    return db_select("*","productsall","id",id);
}
////////针对单一问题的特定方法///////
//判断指定id是否为产品，是否为空的类别，是否可以被删除
function can_del_from_productsall($id){
    //$sql1 = "SELECT * FROM productsall WHERE id=$id AND type=2";
    $sql2 = "SELECT * FROM productsall WHERE father_id = $id";
    if(count(run_sql($sql2,true))>0){
        return false;
    } else {
        return true;
    }
}
//lwx：根据关键字查询匹配的产品标题
function search_productsall_by_title($input){
    $sql="SELECT * FROM productsall WHERE type=2 AND title LIKE '%$input%'";
    return run_sql($sql,true);
}
//lwx:返回分类信息
function get_productsall_type(){
    $sql = "SELECT id,title,father_id FROM productsall WHERE type=1 ORDER BY father_id";
    return run_sql($sql,true);
}
//lwx:返回所有的产品
function get_productsall(){
    $sql="SELECT id,title,html_path FROM productsall WHERE type=2";
    return run_sql($sql,true);
}
//lwx:根据类型返回产品
function get_productsall_by_fatherid($id){
    $sql="SELECT id,title,html_path,html_path FROM productsall WHERE father_id=$id";
    return run_sql($sql,true);
}
//lwx:无条件分页查询
function get_paged_productsall($startIndex,$pageSize){
    return db_pages('productsall',false,false,$startIndex,$pageSize);
}
//lwx:指定条件分页查询（指定产品类型）
function get_paged_productsall_by_fatherid($type,$startIndex,$pageSize){
    return db_pages('productsall','father_id=$type',false,$startIndex,$pageSize);
}
//lwx:
//id:id;    title:型号名;  html_path:html路径;   productType:所属分类;   company:所属公司
function get_all_productsall_forAdminPage(){
    $sql="SELECT c.id,c.title,c.html_path,c.productType,d.title company FROM(SELECT a.id,a.title,a.html_path,b.title productType,b.father_id pid FROM productsall a LEFT JOIN productsall b ON a.father_id=b.id WHERE a.type=2) c LEFT JOIN productsall d ON c.pid=d.id ORDER BY company,c.productType";
    return run_sql($sql,true);
}
//lwx:返回company
function get_company_from_productsall(){
    $sql="SELECT id,title FROM productsall WHERE type=1 AND father_id IS null";
    return run_sql($sql,true);
}
//lwx:返回指定company下的系列
function get_series_from_productsall_by_companyid($id){
    $sql = "SELECT id,title FROM productsall WHERE father_id=$id";
    return run_sql($sql,true);
}
?>

