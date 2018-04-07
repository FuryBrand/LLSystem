<?php 
include_once('./controller/article_list.php');
?>
<link href="./view/css/bootstrap.min.css" rel="stylesheet">
<link href="./view/css/news_list.css" rel="styleSheet" />
<link href="./view/css/base.css" rel="stylesheet">
<script type="text/javascript" src="./view/js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="./view/js/tether.min.js"></script>
<script type="text/javascript" src="./view/js/bootstrap.min.js"></script>
<style type="text/css">
	.types{

	}
	.types li{
		height: 50px;
		line-height: 50px;
		text-align: center;
		font-size: 18px;
		border-bottom:1px solid #ddd;
		border-left:1px solid #ddd;
		border-right:1px solid #ddd;
	}
	.types .active{
		border-left:3px solid #008cd6 !important;
		color:#008cd6;
	}
	.news_list a{
		text-decoration: none;
	}
	.news_list a:hover{
		color:#008cd6;
	}
	.gallery{
		width: 33%;
		height: 160px;
		display: inline-block;
		margin-bottom: 10px;
	}
	.gallery img{
		width: 100%;
		height: 100%;
	}
	.gallery .text{
		font-size: 18px;
		text-align: center;
		height: 30px;
		line-height: 30px;
		color: white;
		background: rgba(0,0,0,0.5);
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		margin-right: 10px;
	}
	.wrap{
		margin-right:10px;
		height: 100%;
		position: relative;
	}
	.main2-list-item {
		width: 100%;
		border: 1px solid #DBDBDB;
		display: block;
		position: relative;
		height: 200px;
	}
	/*.main2-list-item-pic {
		width: 100%;
		height: 100%;
	}*/
	.main2-list-item-txt1 {
		position: absolute;
		bottom: 0;
		width: 100%;
		left: 0;
		background: url(./view/imgs/opacity-black50.png) repeat;
		line-height: 40px;
		color: #fff;
		text-align: center;
		font-size: 16px;
	}
	.thide {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
	/*给文件列表使用的样式*/
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
<div class="container-fluid news_list">
	<?php include_once("./view/header.php") ?>
	<?php include('./view/pic_download_center.php') ?>
	<div class="row" style="margin-top:30px">
		<?php include_once('./view/leftNav4download_center.php') ?>
		<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<div class="row panel panel-default news-left-up" style="margin-bottom:10px; float: none; display: block; margin-left: auto; margin-right: auto; ">
				<?php
					//定义文件目录
					$fname = "./adminfj_1.0/data/nfs";
					//如果session里面的不为空，则将初始的路径记录下来。
					if(!empty($_SESSION["fname"]))
					{
					$fname = $_SESSION["fname"];
					}
					//上一级的目录
					$pname = dirname($fname);
					if(realpath($fname)==dirname(__FILE__).DIRECTORY_SEPARATOR."adminfj_1.0".DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."nfs")
					{}
					else {
					echo "<div id='shang' url='{$pname}'>返回上一级</div>";
					}
					//便利目录下的所有文件显示
					$arr = glob($fname."/*");
					foreach ($arr as $v)
					{
					//$v = iconv("GB2312", "UTF-8", $v);  
					//从完整路径中取文件名
					//$name = basename($v);
					$pattern = "#^\.+.+/#i";
					$name = preg_replace($pattern,'', $v);
					if(is_dir($v)){
					echo "<div class='item dir' url='{$v}'>{$name}</div>";
					}
					else {
					echo "<div class='item' url='{$v}'>{$name}
					<a href='{$v}' target='_blank'>下载</a>
					</div>";
					}
					}
				?>
			</div>
		</div>
		<?php include_once("./view/footer.php") ?>
	</div>
	<script type="text/javascript">
		$('img').error(function(){
			$(this).attr('src', "./view/imgs/error.jpg");
			$(this).css("width",'200px');
		});
		$(".dir").dblclick(function(){
			var url = $(this).attr("url");
			$.ajax({
			url:"./controller/ajax.php?fun=fileList",
			type:"POST",
			dataType:"json",
			data:{url:url},
			})
			.done(function(data) {
							if(data.succ>0){
								window.location.reload();
							}else{
								alert('打开失败，请重试');
							}
						})
			.fail(function(a,b,c){
				alert('出现错误！');
				console.log(a.responseText);
			});
		});
		$("#shang").dblclick(function(){
			var url = $(this).attr("url");
			$.ajax({
			url:"./controller/ajax.php?fun=fileList",
			type:"POST",
			dataType:"json",
			data:{url:url},
			/* success:function(data)
			{
				window.location.href="wenwen.php" rel="external nofollow" rel="external nofollow" rel="external nofollow" rel="external nofollow" ;
			} */
			})
			.done(function(data) {
							if(data.succ>0){
								window.location.reload();
							}else{
								alert('打开失败，请重试');
							}
						})
			.fail(function(a,b,c){
				alert('出现错误！');
				console.log(a.responseText);
			});
		});
	</script>