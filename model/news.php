<?php include_once(dirname(__FILE__)."\base.php");?>
<?php
//lwx:增
function add_news($title,$content,$type,$thumb){
	$nameArr = array("title","content","type","thumb");
	$valArr=array($title,$content,$type,$thumb);
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
//lwx:返回所有新闻
function get_all_news(){
	$sql = "SELECT a.id,a.title,a.content,a.create_date,a.type,a.thumb,b.name FROM news a LEFT JOIN fk_news_type b ON a.type=b.id";
	return run_sql($sql,true);
}

////////针对单一问题的特定方法///////
//lwx:获取最新的6条新闻
function get_lastest_news(){
	$sql="SELECT * FROM news ORDER BY create_date DESC LIMIT 6";
	return run_sql($sql,true);
}
//lwx:返回新闻数量
function get_news_counts($type=0){
	$sql="SELECT COUNT(*) as count FROM news";
	if($type!=0){
		$sql=$sql." WHERE type=".$type;
	}
	$countStr=run_sql($sql,true);
	$countStr=$countStr[0]['count'];
	return intval($countStr);
}
//lwx:分页查询
function get_paged_news($page,$pageSize,$newsType=0){
	//传入需要第几页数据,实际转换成数据库需要的startIndex
	$startIndex=($page-1)*$pageSize;
	$where="";
	if($newsType!=0){
		$where=" WHERE type=".$newsType;
	}
	$sql="SELECT * FROM news ".$where." ORDER BY create_date DESC LIMIT $startIndex,$pageSize";
    /*var_dump($sql);
    die();*/
    return run_sql($sql,true);
}
//lwx：根据关键字查询匹配的新闻标题
function search_news_by_title($input){
	$sql="SELECT * FROM news WHERE title LIKE '%$input%'";
	return run_sql($sql,true);
}
?>

