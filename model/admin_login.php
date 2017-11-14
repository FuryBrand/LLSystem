<?php include(dirname(__FILE__)."\base.php");?>
<?php 
function get_user($uname,$pwd){
	$pwd=md5(md5($pwd));
	$sql="select * from admin_login where name='".$uname."' and pwd='".$pwd."'";
	return run_sql($sql,true);
}
function update_pwd($uname,$pwd){
	$pwd=md5(md5($pwd));
	$sql="update admin_login set pwd='".$pwd."' where name='".$uname."'";
    return run_sql($sql,false);
}
?>