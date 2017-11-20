<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/news.php");
$news=get_all_news();
?>
<div id="tab" class="tab-content">
	<!--获取新闻列表-->
	<div class="tab-pane fade in active" id="newsList">
		<div class="row">
			<div class="col-xs-1">编号</div>
			<div class="col-xs-5">标题</div>
			<div class="col-xs-2">创建日期</div>
			<div class="col-xs-1">分类</div>
			<div class="col-xs-2">操作</div>
		</div>
		<?php for($i=0; $i<count($news); $i++){ ?>
		<div class="row">
			<div class="col-xs-1"><?php echo $news[$i]['id'] ?></div>
			<div class="col-xs-5"><?php echo $news[$i]['title'] ?></div>
			<div class="col-xs-2"><?php echo $news[$i]['create_date'] ?></div>
			<div class="col-xs-1"><?php echo $news[$i]['type'] ?></div>
			<div class="col-xs-2">
				<input type="button" class="btn btn-warning" value="修改" onclick="update_news(<?php echo $news[$i]['id'] ?>)"/>
				<input type="button" class="btn btn-danger" value="删除" onclick="del_news(<?php echo $news[$i]['id'] ?>)"/>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	function update_news(id){

	}
	function del_news(id){
		if(window.confirm("确认删除这条内容吗？")){
			$.ajax({
				url: '../controller/ajax.php?fun=del_news_byid',
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