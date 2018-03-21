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
		.search input{ width:15px; height: 15px; }
		.search label{ font-size: 12px; }
	</style>
</head>
<body>

<form action="" method="post">
        商品名称：<input type="title" name="title">
        <a href="https://www.baidu.com/s?wd=%E5%95%86%E5%93%81%E7%B1%BB%E5%88%AB&tn=44039180_cpr&fenlei=mv6quAkxTZn0IZRqIHckPjm4nH00T1dBm1cvPj79myDLuHfknHDz0ZwV5Hcvrjm3rH6sPfKWUMw85HfYnjn4nH6sgvPsT6KdThsqpZwYTjCEQLGCpyw9Uz4Bmy-bIi4WUvYETgN-TLwGUv3EPHcdPj6LnH0v" target="_blank" class="baidu-highlight">商品类别</a>：    <select name="pice">
                        <option name="clothes" value="上衣">上衣</option>
                        <option name="shoes" value="鞋子">鞋子</option>
                        <option name="socket" value="袜子">袜子</option>
                        <option name="trousers" value="裤子">裤子</option>
                    </select>
        商品介绍：<textarea name="desc" value="desc"></textarea>
        <input type="submit" value="确认">
    </form>

</body>
</html>
<?php
if($_GET['action'] == '确认'){
$contents = $_POST['pice'];
echo $contents;
}
?>