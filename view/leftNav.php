<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path."/model/fk_news_type.php");
$news_type=get_fk_news_type();

//判断是否有返回按键
if(!isset($back)){
	$back=false;
}
?>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<ul class="types">
		<li style="background-color:#008cd6;color:white;border:0">资讯类别</li>
		<a href="./article_list.php?type=0"><li style="cursor:pointer" class="<?php $page_article_type==0? print 'active': print '' ?>">全部</li></a>
		<?php for($i=0;$i<count($news_type);$i++){?>
		<a href="./article_list.php?type=<?php echo $news_type[$i]['id'] ?>" >
			<li style="cursor:pointer" class="<?php $page_article_type==$news_type[$i]['id']? print 'active': print '' ?>">
				<?php echo $news_type[$i]['name'] ?>
			</li>
		</a>
		<?php } ?>
		<?php if($back){ ?>
		<a href="#" onclick="back()"><li style="cursor:pointer;background-color:#e3e3e3">&lt;&lt;返回</li></a>
		<?php } ?>
	</ul>	
</div>
<script type="text/javascript">
function back(){
	window.history.go(-1);
}
</script>