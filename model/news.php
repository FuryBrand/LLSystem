<?php include(dirname(__FILE__)."\base.php");?>
<?php
////////针对单一问题的特定方法///////
//lwx:获取最新的6条新闻
function get_lastest(){
    $sql="SELECT * FROM news ORDER BY create_date LIMIT 6";
    return run_sql($sql,true);
}
//lwx:返回新闻数量
function get_counts(){
    $sql="SELECT COUNT(*) FROM news";

}

?>

