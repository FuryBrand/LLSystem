<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
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
	</div>
</div>
<form id="upload-form" action="ajax.php?fun=add_long_pic" method="post" enctype="multipart/form-data">
	<input type="file" id="upload" name="upload" />
		<select id="picName">
 			<option value ="pic_about_us">“关于我们”</option>
  			<option value ="pic_news_list">“新闻列表”</option>
  			<option value="pic_product_list">“商品列表”</option>
		</select>
	<input type="submit" value="上传" />
</form>
仅支持jpg格式图片
	<script>
		$(function () {
			var picName = $("#picName").val();
			uploader = WebUploader.create({
				auto: true,
            server: '../controller/ajax.php?fun=add_long_pic&para='+picName,//控制器
            pick: '#upload',
            method:"POST",
            multiple: false,
            duplicate :true,
            accept: {
            	title: '',
            	extensions: 'jpg',
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
				window.location.reload();
				/* if(reason.succ){
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
				} */
			});
		});

</script>