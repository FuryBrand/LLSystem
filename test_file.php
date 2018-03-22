<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<title>盛达杰森(北京)自动化设备有限公司</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="./view/css/bootstrap.min.css" rel="stylesheet">
	<link href="./view/css/base.css" rel="stylesheet">
	<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./view/js/tether.min.js"></script>
	<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
	<style>
  .item{
   width: 500px; height: 30px; border: 1px solid slateblue;
   background-color: aquamarine;
   line-height: 30px;
  }
  .dir{
   background-color: chocolate; color: aliceblue;
  }
  #shang{
   width: 500px; height: 30px; border: 1px solid slateblue;
   background-color: brown;color: aliceblue;
   line-height: 30px;
  }
 </style>
</head>
<body>
<?php
session_start();
//定义文件目录
$fname = "./adminfj_1.0/data/nfs";
//如果session里面的不为空，则将初始的路径记录下来。
if(!empty($_SESSION["fname"]))
{
 $fname = $_SESSION["fname"];
}
//上一级的目录
$pname = dirname($fname);
if(realpath($fname)=="C:\\xampp\\htdocs\\LLSystem\\adminfj_1.0\\data\\nfs")
{}
else {
 echo "<div id='shang' url='{$pname}'>返回上一级</div>";
}
//便利目录下的所有文件显示
$arr = glob($fname."/*");
foreach ($arr as $v)
{
 //从完整路径中取文件名
 $name = basename($v);
 if(is_dir($v)){
  echo "<div class='item dir' url='{$v}'>{$name}</div>";
 }
 else {
  echo "<div class='item' url='{$v}'>{$name}
<input type='button' value='删除' url='{$v}' class='sc'/>
</div>";
 }
}
?>
<script>
 $(".dir").dblclick(function(){
  alert("xixi");
  var url = $(this).attr("url");
  $.ajax({
   url:"./ajax.php?fun=fileList",
   data:{url:url},
   type:"POST",
   dataType:"TEXT",
   /* success:function(data)
   {
    window.location.href="test_file.php" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" ;
   } */
  });
 })
 $("#shang").dblclick(function(){
  var url = $(this).attr("url");
  $.ajax({
   url:"chuli.php",
   data:{url:url},
   type:"POST",
   dataType:"TEXT",
   /* success:function(data)
   {
    window.location.href="wenwen.php" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" ;
   } */
  });
 })
  $(".sc").click(function(){
   //确认删除提示
   var av = confirm("确定要删除");
   if(av){
   var url = $(this).attr("url");
   $.ajax({
    url: "shan.php",
    data: {url: url},
    type: "POST",
    dataType: "TEXT",
    /* success: function (data) {
     window.location.href = "wenwen.php";
    } */
   });
   }
  })
</script>
</body>
</html>