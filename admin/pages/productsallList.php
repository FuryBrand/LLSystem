<?php
include_once(Root_Path."/model/productsall.php");
$productsall=get_all_productsall_forAdminPage();
?>
<style>
.row *{
	font-size: 16px;
}
</style>
<div id="tab" class="tab-content">
	<!--获取新闻列表-->
	<div class="tab-pane fade in active" id="productsallList">
		<div class="row" style="margin-bottom:15px;">
			<div class="col-xs-5">标题</div>
			<div class="col-xs-2">所属系列</div>
			<div class="col-xs-2">所属公司</div>
			<div class="col-xs-2">操作</div>
		</div>
		<?php for($i=0; $i<count($productsall); $i++){ ?>
		<div class="row" style="margin-bottom:15px;">
			<div class="col-xs-5"><?php echo $productsall[$i]['title'] ?></div>
			<div class="col-xs-2"><?php echo $productsall[$i]['productType'] ?></div>
			<div class="col-xs-2"><?php echo $productsall[$i]['company'] ?></div>
			<div class="col-xs-2">
				<input type="button" class="btn btn-warning" value="修改" style="margin-right:10px" onclick="update_productsall(<?php echo $productsall[$i]['id'] ?>)"/>
				<input type="button" class="btn btn-danger" value="删除" onclick="del_productsall(<?php echo $productsall[$i]['id'] ?>)"/>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	function update_productsall(id){
		window.location.href="./index.php?page=productsallAdd&id="+id;
	}
	function del_productsall(id){
		if(window.confirm("确认删除这条内容吗？")){
			$.ajax({
				url: '../controller/ajax.php?fun=del_productsall_byid',
				type:'POST',
				dataType:'json',
				data:{"id":id}
			})
			.done(function(data){
				if(data.succ>0){
					window.location.reload();
				}else{
					alert("删除失败，请重试！");
				}
			})
			.fail(function(a,b,c){
				alert("删除错误！");
				console.log(a.responseText);
			})
		}
	}
</script>