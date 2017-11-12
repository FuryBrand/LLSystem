
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
</head>
<body>
	<div class="width80 margin-center">
		<h3 class="center-text margin-top40">欢迎使用BOCE订餐工具</h3>
		<section>
			<article>各部门订餐情况:</article>
			<?php
			$arr=array();
			$count=0;
			$all=0;
			for($i=0;$i<count($department);$i++){
				for($j=0;$j<count($foodCounts);$j++){
					if($department[$i]['id']==$foodCounts[$j]['department']){
						$count=$count+$foodCounts[$j]['count'];
						$all=$all+$foodCounts[$j]['count'];
					}
				}?>
				<div style="margin:10px 0 10px 30px"><?php echo $department[$i]['name'] ?>:<?php echo $count ?></div>
				<?php $count=0;
			} ?>
			<div style="margin:10px 0 10px 30px">总计:<?php echo $all ?></div>
		</section>
		<section class="margin-top15">
			<label>请选择部门:</label>
			<select id="department">
				<option value="0">--请选择--</option>
				<?php for($i=0;$i<count($department);$i++){?>
				<option value="<?php echo $department[$i]["id"] ?>">
					<?php echo $department[$i]["name"] ?>
				</option>
				<?php }?>
			</select>
			<label class="margin-left10">请输入订餐数量:</label>
			<input type="text" id="count"/>
			<input type="button" class="margin-left10 btn btn-info" onclick="dingcan()" value="提交"/>
		</section>
		<section>
			<h6 class="margin-top10">意见与反馈:</h6>
			<article style="padding:5px;width:600px;height:150px;margin-top:20px;border:1px solid black;overflow:auto">
				<?php for($i=count($comments)-1;$i>=0;$i--){ ?>
				<div><?php echo date("Y/m/d",strtotime($comments[$i]['time'])).": ".$comments[$i]['content'] ?></div>
				<?php }?>
			</article>
			<input type="text" style="width:500px;margin-top:20px" id="comment"></textarea>
			<input type="button" class="margin-left10 btn btn-info" onclick="comment()" value="反馈"/>
		</section>
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