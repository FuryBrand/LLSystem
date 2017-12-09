<?php include_once(Root_Path.'/model/productsall.php') ?>
<?php
$company=get_company_from_productsall();
$is_edit=false;
if(array_key_exists('id', $_GET)){
	$is_edit=true;
	$productsall=get_productsall_by_id($_GET['id']);
	$seriesid=get_fatherid_productsall($_GET['id']);
	$companyid=get_fatherid_productsall($seriesid[0]['father_id']);
	$series=get_series_from_productsall_by_companyid($companyid[0]['father_id']);
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
			<div class="col-xs-2">产品名称:</div>
			<div class="col-xs-6">
				<input name="title" type="text" style="width:100%;" class="form-style" id="title" placeholder="" value="<?php $is_edit? print $productsall[0]['title']:print '' ?>" data-required >
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">产品所属:</div>
			<div class="col-xs-6">
				<select id="company" class="form-style" style="margin-right:10px" onchange="selectCompany()" data-required>
					<option value>-请选择所属公司-</option>
					<?php for($i=0;$i<count($company);$i++){ ?>
					<option value="<?php echo $company[$i]['id']?>" <?php $is_edit&&$company[$i]['id']==$companyid[0]['father_id']? print 'selected':print ''; ?> > <?php echo $company[$i]['title'] ?></option>
					<?php } ?>
				</select>
				<select id="series" class="form-style" data-required>
					<option value>-请选择所属系列-</option>
					<?php 
					if(is_edit){
						for($i=0;$i<count($series);$i++){ ?>
						<option value="<?php echo $series[$i]['id']?>" <?php $is_edit&&$series[$i]['id']==$seriesid[0]['father_id']? print 'selected':print ''; ?> > <?php echo $series[$i]['title'] ?></option>
						<?php }} ?>
					</select>
				</div>

			</div>
			<div class="row">
				<div class="col-xs-2">上传标题图片:</div>
				<div class="col-xs-2">
					<img src="<?php $is_edit? print '.'.Productsall_Thumb.$productsall[0]['thumb']:print './images/upload.png' ?>"  style="width:100%" id="thumb">
					<input name="thumb" id="thumbFile" type="file" onchange="preview(this)" <?php $is_edit? print '':print 'data-required' ?> >
				</div>
			</div>
			<div style="margin-bottom:15px">产品详情</div>
			<div id="editor" style="width:100%;"></div>
			<input type="button" id="upload" class="btn btn-info" style="width:98%;margin:15px auto;height:50px;font-size:18px;line-height:38px" value="<?php $is_edit? print '修 改':print '添 加' ?>"/>
		</div>
	</form>
	<script type="text/javascript">
    //实例化编辑器
    var ue = UE.getEditor('editor',{zIndex:0});
    <?php if($is_edit){
    	$conent='.'.Productsall_File.$productsall[0]["content"];
    	?>
    	ue.ready(function() { //因此要加一个ready方法,当他完成加载时再向ue中写入文件
    		ue.setContent(`<?php echo file_get_contents($conent)?>`); 
    	});
    	<?php } ?>
    	/*ue.ready(function() { //因此要加一个ready方法,当他完成加载时再向ue中写入文件
    		ue.setContent('<?php //echo file_get_contents("./contents.html")?>'); 
    	});*/
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例

 //ue.setContent('');在这里直接写是错误的,估计是ue还未加载完,导致报错Cannot set property 'innerHTML' of undefined

 $("#upload").click(function () {
 	if(!Validator.validate('.validator')){
 		return false;
 	}
 	<?php if($is_edit){ ?>

 		var formData = new FormData(),
 		content=um.getContent();
 		formData.append("id","<?php print $_GET['id'] ?>");
 		formData.append("oldThumb","<?php print $productsall[0]['thumb'] ?>");
 		formData.append("file","<?php print $productsall[0]["content"] ?>");
 		formData.append("title", $("#title").val());
 		formData.append("series", $("#series").val());
 		formData.append("thumb", $("#thumbFile").get(0).files[0]);
 		formData.append("content", content);
 		$.ajax({
 			type: "POST",
 			url: "../controller/ajax.php?fun=edit_productsall",
 			dataType: 'json',
 			processData: false,
 			contentType: false,  
 			cache: false,
 			data:formData
 		}).done(function (data) {
 			alert("修改成功!");
 			window.location.reload();
 		}).fail(function (jqXHR, textStatus) {
 			alert("修改失败!");
 			console.log(jqXHR);
 		});
 		<?php }else{ ?>
 			var formData = new FormData(),
 			content=um.getContent();
 			formData.append("title", $("#title").val());
 			formData.append("series", $("#series").val());
 			formData.append("thumb", $("#thumbFile").get(0).files[0]);
 			formData.append("content", content);
 			$.ajax({
 				type: "POST",
 				url: "../controller/ajax.php?fun=add_productsall",
 				dataType: 'json',
 				processData: false,
 				contentType: false,  
 				cache: false,
 				data:formData
 			}).done(function (data) {
 				alert("添加成功!");
 				window.location.reload();
 			}).fail(function (jqXHR, textStatus) {
 				alert("添加失败!");
 				console.log(jqXHR);
 			});
 			<?php } ?>
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
		function selectCompany(){
			var companyid = $("#company").val();
			$.ajax({
				url:"../controller/ajax.php?fun=get_series_from_productsall",
				type:'POST',
				dataType:'json',
				data:{id:companyid}
			})
			.done(function(data){
				$("#series").empty();
				$("#series").append("<option>-请选择所属系列-</option>");
				for(var i=0;i<data['succ'].length;i++){
					$("#series").append("<option value="+data['succ'][i]['id']+">"+data['succ'][i]['title']+"</option>");
				}
			})
			.fail(function(a,b,c){
				alert("所属系列列表获取出错！");
				console.log(a.responseText);
			})
		}
		</script>