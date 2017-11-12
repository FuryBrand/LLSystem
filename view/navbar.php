<?php
include('controller/navbar.php');
$navList=nav_list();
?>
<style>

</style>
<nav class="nav nav-tabs">
	<div class="container-fluid">
		<!--<div class="navbar-header">
			<a class="navbar-brand" href="#">菜鸟教程</a>
		</div>-->
		<div>
			<ul class="nav nav-tabs">
				<?php for($i=0;$i<count($navList);$i++){ 
					if(count($navList[$i])<=1){ ?>
					<li <?php $i==0?print "class='active'":"" ?>>
						<a href="<?php echo $navList[$i][0]['href'] ?>"><?php print $navList[$i][0]['name'] ?></a>
					</li>
					<?php }else{ ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $navList[$i][0]["name"] ?>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<?php for($j=1;$j<count($navList[$i]);$j++){?>
							<li><a href="<?php echo $navList[$i][$j]['href'] ?>"><?php echo $navList[$i][$j]['name'] ?></a></li>
							<?php } ?>
						</ul>
					</li>
					<?php }
				} ?>
			</div>
		</div>
	</nav>