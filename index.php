
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>盛达杰森(北京)自动化设备有限公司</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<link href="./view/css/bootstrap.min.css" rel="stylesheet">
	<link href="./view/css/base.css" rel="stylesheet">
	<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="./view/js/tether.min.js"></script>
	<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="width80 margin-center">
		<?php include('./view/navbar.php') ?>
	</div>	
</body>
<script type="text/javascript">
function dingcan(id){
	var department=$("#department").val(),
	count=$("#count").val();
	if(department==="0"){
		alert("请选择部门!");
		return false;
	}
	$.ajax({
		url: './ajax.php?fun=dingcan',
		type: 'POST',
		data:{department:department,count:count},
		dataType: 'json',
	})
	.done(function(data) {
		if(data){
			alert("订餐成功!");
			location.reload();
		}
	})
	.fail(function(a,b,c) {
		alert("订餐失败!");
	})
}

function comment(id){
	var comment=$("#comment").val();
	if(!comment){
		alert("请输入内容!");
		return false;
	}
	$.ajax({
		url: './ajax.php?fun=add_comment',
		type: 'POST',
		data:{comment:comment},
		dataType: 'json',
	})
	.done(function(data) {
		if(data){
			alert("评论成功!");
			location.reload();
		}
	})
	.fail(function(a,b,c) {
		alert("评论失败!");
	})
}
</script>
</html>