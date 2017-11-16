<?php ?>
<link href="./css/webuploader.css" type="text/css" rel="stylesheet"/>
<script src="js/jquery-1.10.2.min.js"></script>  
<script type="text/javascript" src="./js/webuploader.html5only.min.js"></script>
<style type="text/css">
ul{
	list-style-type: none;
}
</style> 
<div style="overflow:hidden;padding-left:40px">
	<div id="upload" style="">上传图片</div>
	<div id="upload2" style="">上传图片</div>
</div>
<ul>
	<li id="li"></li>
	<li id="score"></li>
</ul>
<script>
var uploader;
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

		}else if(reason.errcode===1){
			alert("上传失败,请重试!");
		}else if(reason.errcode===2){
			alert("未找到文件");
		}
	});

	/*uploader.on( 'fileQueued', function( file ) {
		var $li = $("#li");
		uploader.makeThumb( file, function( error, ret ) {
			if ( error ) {
				$li.text('预览错误');
			} else {
				var str="";
				str='<div><img src="'+ ret +'" /></div>';
				$li.append(str);
			}
		});*/
	});
});

function empty(){
	$("#li,#score").empty();
}
</script>