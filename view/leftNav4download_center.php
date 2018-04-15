<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
include_once(Root_Path.'/controller/leftNav.php');
?>
<style type="text/css">
	.arrow {
		border-color: transparent transparent transparent #999;
		border-style: solid dashed dashed;
		border-width: 6px;
		position: absolute;
		top: 20px;
		margin-left: -165px;
	}
	.arrow.arrowed {
		border-color:#999 transparent transparent;
		margin-left: -165px;
		margin-top: 2px;
	}
}
</style>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" >
	<ul class="types">
		<li style="border-style:none;"><p align="left">下载中心：</p></li>
		<!--<li><p align="left">黄色为文件夹，蓝色为可下载文件</p></li>-->
	</ul><br>
<br>
</div>
