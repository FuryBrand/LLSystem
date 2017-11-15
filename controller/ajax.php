<?php
include($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/admin_login.php");
include_once(Root_Path."/model/navbar.php");
$fun=$_GET['fun'];
$res="";
switch ($fun){
  case "changepwd":
  $newpwd=$_POST["newpwd"];
  $uname=$_COOKIE['user'];
  $res=update_pwd($uname,$newpwd);
  $res=['succ'=>$res];
  break;
  case "login":
  $uname=$_POST["uname"];
  $pwd=$_POST["pwd"];
  $res=get_user($uname,$pwd);
  if(count($res)!=1){
    $res=["succ"=>false,"errcode"=>-1];
  }else{
   $res=["succ"=>true,"errcode"=>-1];
 }
 break;
 case "add_nav":
 $name=$_POST["name"];
 $href=$_POST["href"];
 $pid=$_POST["pid"];
 $res=add_nav($name,$href,$pid);
 $res=['succ'=>$res];
 break;
 case "delete_nav":
 $id=$_POST["id"];
 $res=delete_nav($id);
 $res=['succ'=>$res];
 break;
 case "update_nav":
 $id=$_POST["id"];
 $name=$_POST["name"];
 $href=$_POST["href"];
 $res=update_nav($name,$href,$id);
 $res=['succ'=>$res];
 break;
 case "get_second_nav":
 $pid=$_POST["pid"];
 $res=get_second_nav($pid);
 break;
}
echo json_encode($res);
?>