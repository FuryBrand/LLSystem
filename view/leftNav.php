<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
include_once(Root_Path.'/controller/leftNav.php');
?>
<style type="text/css">
	.arrow {
		border-color: transparent transparent transparent #999;
		border-style: solid dashed dashed;
		border-width: 6px;
		position: absolute;
		top: 20px;
		margin-left: -65px;
	}
	.arrow.arrowed {
		border-color:#999 transparent transparent;
		margin-left: -70px;
		margin-top: 2px;
	}
}
</style>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<ul class="types">
		<li style="background-color:#008cd6;color:white;border:0">资讯类别</li>
		<a href="<?php echo $href ?>?isNews=<?php echo $isNews ?>&amp;type=0"><li style="cursor:pointer" class="<?php $page_article_type==0? print 'active': print '' ?>">全部</li></a>
		<?php for($i=0;$i<count($article_type);$i++){
			if($article_type[$i]['id']==-1){ //产品的二级列表?>
			<li style="cursor:pointer;position:relative" class="ev_arrow">
				<i class="arrow"></i>		
				<?php }else{ //新闻的一级列表?>
				<li style="cursor:pointer" class="<?php $page_article_type==$article_type[$i]['id']? print 'active': print '' ?>">
					<?php } ?>
					<a style="display:block" <?php $isNews=='true'? print 'href="./article_list.php?isNews='.$isNews.'&type='.$article_type[$i]['id'].'"' : ''?>>		
						<?php echo $article_type[$i]['name'] ?>
					</a>
				</li>	
				<?php if(array_key_exists("subType", $article_type[$i])){ ?>
				<ul style="background-color:#e3e3e3;display:none">
					<?php 
					$sub=$article_type[$i]['subType'];
					for($j=0;$j<count($sub);$j++){ ?>
					<li class='<?php $page_article_type==$sub[$j]['id']? print'active' : print '' ?>'>
						<a href="<?php echo $href ?>?isNews=<?php echo $isNews ?>&amp;type=<?php echo $sub[$j]['id'] ?>" >
							<?php echo $sub[$j]['title'] ?>
						</a>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
				
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
			$('.ev_arrow').click(function(){
				$(this).next().slideToggle().end().children('i').toggleClass("arrowed");
			});
			$(".active").each(function(i,ele){
				if($(this)[0].nodeName==="LI"){
					$(this).parent().css("display","block").prev().children("i").addClass('arrowed');
				}
			});
		</script>