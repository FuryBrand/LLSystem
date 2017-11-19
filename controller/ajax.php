<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/admin_login.php");
include_once(Root_Path."/model/navbar.php");
include_once(Root_Path."/model/slideshow.php");
include_once(Root_Path."/model/products.php");
include_once(Root_Path."/model/fk_news_type.php");
include_once(Root_Path."/model/news.php");
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
 case "add_slider_pic":
 //$url=$_POST['url'];
 if(array_key_exists('file',$_FILES)){
  $file = $_FILES['file'];
  $extension=explode(".",$file['name'])[1];
  $fileName=time().'.'.$extension;
  move_uploaded_file($file['tmp_name'],PHP_Slider_Img.$fileName);
  if(is_file(PHP_Slider_Img.$fileName)){
    $res=["succ"=>true,"fileName"=>$fileName];
  }else{
    $res=["succ"=>false,"errcode"=>1];//1表示上传失败
  }
}else{
  $res=["succ"=>false,"errcode"=>2];//2表示未找到文件
}
break;
case "add_slider_Info":
$url=$_POST["url"];
$path=$_POST["path"];
$res=add_slideshow([$path,$url]);
break;
break;
case "del_slideshow":
$id=$_POST["id"];
$res=del_slideshow($id);
break;
case "update_products":
//上传图片到文件夹
$id=$_POST["id"];
$extension=$_POST["ext"];
if(array_key_exists('pic',$_FILES)){
  $file = $_FILES['pic'];
  $extension=explode(".",$file['name'])[1];
  $fileName=$id.'.'.$extension;
  move_uploaded_file($file['tmp_name'],PHP_Product_Img_Path.$fileName);
}

//写入内容到数据库
$title=$_POST["title"];
$html_path=$_POST["html_path"];
$res=update_products($extension,$title,$html_path,$id);
$res=['succ'=>$res];
break;
case "add_news_type":
$name=$_POST["name"];
$res=add_fk_news_type([$name]);
$res=['succ'=>$res];
break;
case "update_news_type":
$name=$_POST["name"];
$id=$_POST["id"];
$res=update_fk_news_type($name,$id);
$res=['succ'=>$res];
break;
case "del_news_type":
$id=$_POST["id"];
$res=del_fk_news_type($id);
$res=['succ'=>$res];
break;     
//lwx:新闻编辑
case "update_news":
$id = $_POST["id"];
$title = $_POST["title"];
$type = $_POST["type"];
$thumb = $_POST["thumb"];
$res=update_news($id,$title,$type,$thumb);
$res=['succ'=>$res];
break;
  //lwx:新闻内容保存到html文件中
case "saveContent":
$content=$_POST['content'];
$filepath=$_POST['path'];
$file = fopen($filepath, "w") or die("Unable to open file!");
fwrite($file, $content);
fclose($file);
$res=true;
break; 
  //lwx:根据id删除新闻
case "del_news_by_id":
$id = $_POST["id"];
$res=del_news($id);
$res=['succ'=>$res];
break;
  //lwx:增加新闻
case "add_news":
//保存图片到文件夹
$fileName = time();
$picName="";
if(array_key_exists('thumb',$_FILES)){
  $file = $_FILES['thumb'];
  $extension=explode(".",$file['name'])[1];
  $picName=$fileName.'.'.$extension;
  move_uploaded_file($file['tmp_name'],PHP_News_Thumb.$picName);
}

//保存详细信息到html文件
$content=$_POST['content'];
$htmlName=$fileName.".html";
$file = fopen(PHP_News_File.$fileName.".html", "w") or die("Unable to open file!");
fwrite($file, $content);
fclose($file);

//保存到数据库
$title = $_POST["title"];
$type = $_POST["type"];
$res=add_news($title,$picName,$type,$htmlName);
$res=['succ'=>$res];
break;
 //lwx:搜索框
 case "search":
 $type = $_POST["type"];//0产品，1新闻
 $keyword = $_POST["keyWord"];
 $url = null;
 if($type=="1"){
   $url = Project_Folder_Name."\\\\news_list.php";
   echo '<script>location.href="'.$url.'?keyword='.$keyword.'"</script>';
 } else {
   $url = Project_Folder_Name."\\\\productsall_list.php";
   echo '<script>location.href="'.$url.'?keyword='.$keyword.'"</script>';
 }
 return;
 break;
}
echo json_encode($res);
?>