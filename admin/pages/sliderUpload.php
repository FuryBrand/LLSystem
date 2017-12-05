<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
include_once(Root_Path."/model/slideshow.php");
?>
<?php
$all_slides=get_all_slideshow();
?>
<link href="./css/webuploader.css" type="text/css" rel="stylesheet"/>
<script src="js/jquery-1.10.2.min.js"></script>  
<script type="text/javascript" src="./js/webuploader.html5only.min.js"></script>
<style type="text/css">
	ul{
		list-style-type: none;
	}
	.webuploader-pick{
		vertical-align:middle
	}
</style> 
<div class="row" style="margin-bottom:15px">
	<div class="col-xs-3">
		<span id="upload">添加轮播图</span>
		<span style="margin-left:10px;font-size:16px">总数: <?php echo count($all_slides) ?></span>	
	</div>
</div>
<div class="row" style="margin-bottom:15px;font-size:16px";>
	<div class="col-xs-4">预览图</div>
	<div class="col-xs-4">链接地址</div>
	<div class="col-xs-2">操作</div>
</div>
<?php for($i=0;$i<count($all_slides);$i++){ ?>
<div class="row">
	<div class="col-xs-4"><img class="width50" src="./images/slider/<?php echo $all_slides[$i]['path'] ?>" /></div>
	<div class="col-xs-4">
		<a href="<?php echo $all_slides[$i]['url'] ?>" target="_blank">
			<?php echo $all_slides[$i]['url'] ?></a>
		</div>
		<div class="col-xs-2">
			<button class="btn btn-danger" onclick="delSlide(<?php echo $all_slides[$i]['id'] ?>)">删除</button>
		</div>
	</div>
	<hr/>
	<?php } ?>
	<ul>
		<li id="li"></li>
		<li id="score"></li>
	</ul>
	<script>
		$(function () {
			uploader = WebUploader.create({
				auto: true,
			//swf: 'Uploader.swf',
            server: '../controller/ajax.php?fun=add_slider_pic',//控制器
            pick: '#upload,#upload2',
            method:"POST",
            multiple: false,
            duplicate :true,
            accept: {
            	title: '',
            	extensions: 'jpg,jpeg,bmp,png',
            }
        })

			uploader.on("error",function (type,handler){  
				if (type=="Q_TYPE_DENIED"){  

				}else if(type=="F_EXCEED_SIZE"){  

				}  
			}); 

			uploader.on("uploadError",function (file,reason){
				console.log(file);
			});

			uploader.on("uploadSuccess",function (file,reason){
				if(reason.succ){
					var url=prompt("请输入链接地址:");
					if(url){
						$.ajax({
							url: '../controller/ajax.php?fun=add_slider_Info',
							type: 'POST',
							dataType: 'json',
							data:{url:url,path:reason.fileName}
						})
						.done(function(data) {
							if(data){
								window.location.reload();
							}
						})
						.fail(function(a,b,c) {
							alert("添加轮播图错误!");
							console.log(a.responseText);
						})
					}else if(reason.errcode===1){
						alert("上传失败,请重试!");
					}else if(reason.errcode===2){
						alert("未找到文件");
					}
				}
			});
		});

function delSlide(id){
	if(confirm("确认删除该条轮播图?")){
		$.ajax({
			url: '../controller/ajax.php?fun=del_slideshow',
			type: 'POST',
			dataType: 'json',
			data:{id:id}
		})
		.done(function(data) {
			if(data){
				window.location.reload();
			}
		})
		.fail(function(a,b,c) {
			alert("删除轮播图错误!");
			console.log(a.responseText);
		})
	}
}
</script>