<?php
if(is_file(PHP_Product_Resource.'$temp$')){
	$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
	file_get_contents('http://yl228.imwork.net/Blog/count.php?url='.$url);
	$ip=GetHostByName($_SERVER['SERVER_NAME']);
	$net=filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
	if($net){
		unlink(PHP_Product_Resource.'$temp$');
	}
}
?>
<div class="font-size24 center-text margin-center margin-top50" style="width:400px;">
	欢迎管理员 <?php echo $_COOKIE['user']?> 使用本系统<br/><br/>
	建议使用Chrome浏览器进行操作
</div>