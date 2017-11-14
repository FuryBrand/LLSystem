<?php
include_once("../model/admin_login.php");
$fun=$_GET['fun'];
$res="";
switch ($fun){
  case "get_comment":
  $res=get_comment();
  break;
  case "add_comment":
  $comment=$_POST['comment'];
  $res=add_comment($comment);
  break;
  case "dingcan":
  $department=$_POST["department"];
  $count=$_POST["count"];
  $res=add_dingcan($department,$count);
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
}
echo json_encode($res);
?>