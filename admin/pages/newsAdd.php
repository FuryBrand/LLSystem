<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
include_once(Root_Path.'/model/fk_news_type.php');
include_once(Root_Path.'/model/news.php');
?>
<?php
$types=get_fk_news_type();
$is_edit=false;
if(array_key_exists('id', $_GET)){
	$is_edit=true;
	$news=get_news_by_id($_GET['id']);
}
?>
<link href="./UEditor/themes/default/css/ueditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" charset="utf-8" src="./UEditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="./UEditor/ueditor.all.js"></script>
<script type="text/javascript" src="./UEditor/lang/zh-cn/zh-cn.js"></script>
<style>
#form *{
	font-size: 16px;
}
#form .validator-error{
	font-size: 12px;
}
#form .row{
	margin: 15px auto;
}
</style>
<form enctype="multipart/form-data" id="form">
	<div class="form-group validator">
		<div class="row">
			<div class="col-xs-2">新闻标题:</div>
			<div class="col-xs-6">
				<input name="title" type="text" style="width:100%;" class="form-style" id="title" value="<?php $is_edit? print $news[0]['title']:print '' ?>" data-required >
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">新闻类型:</div>
			<div class="col-xs-6">
				<select id="news_type" class="form-style" data-required>
					<option value>请选择</option>
					<?php for($i=0;$i<count($types);$i++){ ?>
					<option value="<?php echo $types[$i]['id'] ?>" <?php $is_edit&&$types[$i]['id']==$news[0]['type']? print 'selected':print '' ?> ><?php echo $types[$i]['name'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">上传标题图片:</div>
			<div class="col-xs-2">
				<img src="<?php $is_edit? print '.'.News_Thumb.$news[0]['thumb']:print './images/upload.png' ?>" style="width:100%" id="thumb">
				<input name="thumb" id="thumbFile" type="file" onchange="preview(this)" <?php $is_edit? print '':print 'data-required' ?> >
			</div>
		</div>
		<div style="margin-bottom:15px">新闻内容</div>
		<div id="editor" style="width:100%;"></div>
		<input type="button" id="upload" class="btn btn-info" style="width:98%;margin:15px auto;height:50px;font-size:18px;line-height:38px" value="<?php $is_edit? print '修 改':print '添 加' ?>"/>
	</div>
</form>
<script type="text/javascript">
    //实例化编辑器

    var ue = UE.getEditor('editor',{zIndex:0});
    <?php if($is_edit){
    	$conent='.'.News_File.$news[0]["content"];
    	?>
    	ue.ready(function() { //因此要加一个ready方法,当他完成加载时再向ue中写入文件
    		ue.setContent(`<?php echo file_get_contents($conent)?>`); 
    	});
    	<?php } ?>
    	/**/
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例

 //ue.setContent('');在这里直接写是错误的,估计是ue还未加载完,导致报错Cannot set property 'innerHTML' of undefined

 $("#upload").click(function () {
 	if(!Validator.validate('.validator')){
 		return false;
 	}
 	var formData = new FormData(),
 	content=ue.getContent();
 	formData.append("title", $("#title").val());
 	formData.append("type", $("#news_type").val());
 	formData.append("thumb", $("#thumbFile").get(0).files[0]);
 	formData.append("content", content);
 	<?php if($is_edit){ ?>
 		formData.append("id", <?php echo $news[0]['id'] ?>);
 		formData.append("thumbName", "<?php echo $news[0]['thumb'] ?>");
 		<?php } ?>
 		$.ajax({
 			type: "POST",
 			url: "../controller/ajax.php?fun=<?php $is_edit? print 'update':print 'add' ?>_news",
 			dataType: 'json',
 			processData: false,
 			contentType: false,  
 			cache: false,
 			data:formData
 		}).done(function (data) {
 			<?php if($is_edit){ ?>
 				alert("修改成功!");
 				window.location.href='./index.php?page=newsList';
 				<?php }else{ ?>
 					alert("添加成功!");
 					window.location.reload();
 					<?php } ?>

 				}).fail(function (jqXHR, textStatus) {
 					alert("添加失败!");
 					console.log(jqXHR);
 				});
 			});

function preview(file){  
	var prevImg = $('#thumb');  
	if (file.files && file.files[0]){  
		var reader = new FileReader();  
		reader.onload = function(evt){  
			prevImg.attr('src',evt.target.result);  
		}    
		reader.readAsDataURL(file.files[0]);  
	}  
	else{  //低版本ie
				//prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>'; 
			}  
		}  
		</script>