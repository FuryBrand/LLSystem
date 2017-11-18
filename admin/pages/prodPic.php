	<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
	include_once(Root_Path."/model/products.php");
	$products=get_all_products();
	?>
	<style type="text/css">
		.relative{
			position: relative;
		}
		form input[type=text]{
			width: 100%;
		}
		form img,form input[type=file]{
			display: inline-block;
			width: 100%;
		}
		form input[type=file]{
			cursor: pointer;
			position: absolute;
			top: 0;
			height: 100%;
			opacity: 0;
		}
	</style>
	<div style="font-size:16px;margin-bottom:25px;color:red">提示: 点击图片进行上传,支持在线预览</div>
	<div class="row" style="font-size:16px;margin-bottom:25px;">
		<div class='col-lg-3'>图片</div>
		<div class='col-lg-3'>标题</div>
		<div class='col-lg-4'>链接地址</div>
		<div class='col-lg-1'>操作</div>
	</div>
	<?php for($i=1;$i<=count($products);$i++){ ?>
	<div class="row" style="margin-bottom:20px;">
		<form enctype="multipart/form-data" id="form<?php echo$i ?>">
			<div class='col-lg-3 relative'>
				<img src="<?php echo Product_Img.$i ?>.<?php echo $products[$i-1]['type'] ?>" id="img<?php echo$i ?>">
				<input name="pic" id="pic<?php echo$i ?>" type="file" id="pic<?php echo$i ?>" onchange="preview(<?php echo$i ?>,this)">
			</div>
			<div class='col-lg-3'>
				<input name="title" type="text" style="" id="title<?php echo$i ?>" value="<?php echo $products[$i-1]['title'] ?>">
			</div>
			<div class='col-lg-4'>
				<input name="html_path" type="text"  id="html_path<?php echo$i ?>" value="<?php echo $products[$i-1]['html_path'] ?>">
			</div>
			<div class='col-lg-1'>
				<input type="button" id="btn<?php echo$i ?>" class="btn btn-warning" value="修改" onclick="update_products_pic(<?php echo $i ?>,'<?php echo $products[$i-1]['type'] ?>')"/>
			</div>	
		</form>
	</div>
	<?php } ?>
	<script type="text/javascript">
		function update_products_pic(id,ext) {
			var formData = new FormData();
			formData.append("pic", $("#pic"+id).get(0).files[0]);
			formData.append("title", $("#title"+id).val());
			formData.append("html_path", $("#html_path"+id).val());	
			formData.append("id", id);
			formData.append("ext", ext);		
			$.ajax({
				type: "POST",
				url: "../controller/ajax.php?fun=update_products",
				dataType: 'json',
				processData: false,
				contentType: false,  
				cache: false,
				data:formData
			}).done(function (data) {
				if(data.succ){
					window.location.reload();
				}
			}).fail(function (jqXHR, textStatus) {
				alert("更新失败!")
				console.log(jqXHR);
			});
		}

		function preview(id,file){  
			var prevImg = $('#img'+id);  
			if (file.files && file.files[0])  
			{  
				var reader = new FileReader();  
				reader.onload = function(evt){  
					prevImg.attr('src',evt.target.result);  
				}    
				reader.readAsDataURL(file.files[0]);  
			}  
			else    
			{  //低版本ie
				//prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>'; 
			}  
		}  
	</script>