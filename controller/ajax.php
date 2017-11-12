<?php
session_start();
include("./model.php");
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
}
echo json_encode($res);
?>