	<?php
	include_once(Root_Path."/model/fk_news_type.php");
	$news_type=get_fk_news_type();
	?>
	<div class="row" style="font-size:17px;margin-bottom:25px;text-align:center">
		<div class='col-lg-3'>新闻类别</div>
		<div class='col-lg-2'>操作</div>
	</div>
	<?php for($i=0;$i<count($news_type);$i++){ ?>
	<div class="row" style="margin-bottom:20px;">
		<div class='col-lg-3'>
			<input type="text" class="form-style" style="width:100%;height:34px" id="newsType<?php echo $news_type[$i]['id'] ?>" value="<?php echo $news_type[$i]['name'] ?>">
		</div>
		<div class='col-lg-2'>
			<input type="button" id="btn" style="margin-right:10px" class="btn btn-warning" value="修改" onclick="updateNewsType(<?php echo $news_type[$i]['id'] ?>)"/>
			<input type="button" id="btn" class="btn btn-danger" value="删除" onclick="delNewsType(<?php echo $news_type[$i]['id'] ?>)"/>
		</div>	
	</div>
	<?php } ?>
	<div class="row">
		<div class='col-lg-3 validator'>
			<input type="text" class="form-style" style="width:100%;height:34px" id="addNewsType" placeholder="请输入新的分类" data-required>
		</div>
		<div class='col-lg-1'>
			<input type="button" id="btn<?php echo$i ?>" class="btn btn-info" value="添加" onclick="newType()"/>
		</div>
	</div>
	<script type="text/javascript">
	function updateNewsType(id) {
		var name = $("#newsType"+id).val();		
		$.ajax({
			type: "POST",
			url: "../controller/ajax.php?fun=update_news_type",
			dataType: 'json',
			data:{name:name,id:id}
		}).done(function (data) {
			if(data.succ){
				window.location.reload();
			}
		}).fail(function (jqXHR, textStatus) {
			alert("更新失败!")
			console.log(jqXHR);
		});
	}

	function newType(){
		if(!Validator.validate('.validator')){
			return false;
		}
		var name = $("#addNewsType").val();	
		$.ajax({
			type: "POST",
			url: "../controller/ajax.php?fun=add_news_type",
			dataType: 'json',
			data:{name:name}
		}).done(function (data) {
			if(data.succ){
				window.location.reload();
			}
		}).fail(function (jqXHR, textStatus) {
			alert("添加失败!")
			console.log(jqXHR);
		});
	}

	function delNewsType(id){
		if(window.confirm("确认删除这条内容吗?")){
			$.ajax({
				url: '../controller/ajax.php?fun=del_news_type',
				type: 'POST',
				dataType: 'json',
				data:{id:id}
			})
			.done(function(data) {
				if(data.succ>0){
					window.location.reload();
				}else{
					alert('删除失败,请重试!');
				}

			})
			.fail(function(a,b,c) {
				alert("删除错误!");
				console.log(a.responseText);
			})
		}
	}  
	</script>