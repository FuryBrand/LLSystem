<div class="row margin-top30">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<img src="./view/imgs/logo.png" style="width:100%">
	</div>
	<div class="col-sm-offset-1 col-lg-5 col-md-5 col-sm-5 col-xs-12 margin-top10">
		<form method="post" action="./controller/ajax.php?fun=search">
			<div class="search">
				<input type="radio" name="type" value="0" id="product" checked>
				<label for="product" class="margin-right10">产品</label>
				<input type="radio" name="type" value="1" id="news">
				<label for="news">新闻</label>
			</div>
			<div class="margin-top10">
				<div class="row">
					<div class="col-xs-8">
						<input type="text" name="keyWord" placeholder="请输入关键字" style="width:100%;height:40px">
					</div>
					<div class="col-xs-4">
						<input type="submit" name="keyWord" value="搜索" class="btn btn-info" style="height:40px">
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path.'/view/navbar.php') 
?>