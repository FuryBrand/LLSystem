<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php');
include_once(Root_Path.'/controller/navbar.php');
$navList=nav_list();
?>
<link rel="stylesheet" type="text/css" href="view/css/bootsnav.css">
<link rel="stylesheet" type="text/css" href="view/css/font-awesome.min.css">
<script type="text/javascript" src="view/js/bootsnav.js"></script>

<style>
	.navbar-brand{
		padding: 29px 15px;
		height: auto;
	}
	nav.navbar.bootsnav{
		border: none;
	}
	.navbar-nav{
		float: left;
	}
	nav.navbar.bootsnav ul.nav > li > a{
		color: #474747;
		text-transform: uppercase;
		padding: 30px;
	}
	nav.navbar.bootsnav ul.nav > li:hover{
		background: #f4f4f4;
	}
	.nav > li:after{
		content: "";
		width: 0;
		height: 5px;
		background: #34c9dd;
		position: absolute;
		bottom: 0;
		left: 0;
		transition: all 0.5s ease 0s;
	}
	.nav > li:hover:after{
		width: 100%;
	}
	nav.navbar.bootsnav ul.nav > li.dropdown > a.dropdown-toggle:after{
		content: "+";
		font-family: 'FontAwesome';
		font-size: 16px;
		font-weight: 500;
		position: absolute;
		top: 35%;
		right: 10%;
		transition: all 0.4s ease 0s;
	}
	nav.navbar.bootsnav ul.nav > li.dropdown.on > a.dropdown-toggle:after{
		content: "\f105";
		transform: rotate(90deg);
	}
	.dropdown-menu.multi-dropdown{
		position: absolute;
		left: -100% !important;
	}
	nav.navbar.bootsnav li.dropdown ul.dropdown-menu{
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		border: none;
	}
	@media only screen and (max-width:990px){
		nav.navbar.bootsnav ul.nav > li.dropdown > a.dropdown-toggle:after,
		nav.navbar.bootsnav ul.nav > li.dropdown.on > a.dropdown-toggle:after{ content: " "; }
		.dropdown-menu.multi-dropdown{ left: 0 !important; }
		nav.navbar.bootsnav ul.nav > li:hover{ background: #f6f6f6; }
		nav.navbar.bootsnav ul.nav > li > a{ margin: 0; }
	}
</style>
<nav class="navbar navbar-default navbar-mobile bootsnav">
	<ul class="nav navbar-nav" data-in="fadeInDown" data-out="fadeOutUp">
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
	</ul>
</nav>