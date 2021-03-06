<?php include_once($_SERVER['DOCUMENT_ROOT'].'/LLSystem/config.php'); ?>
<?php include_once(Root_Path.'/admin/pages/islogin.php') ?>
<?php include_once(Root_Path.'/model/navbar.php') ?>
<?php 
$navs=get_nav();
$first_nav=array();
for($i=0;$i<count($navs);$i++){
	if($navs[$i]['pid']==0){
		array_push($first_nav, $navs[$i]);
	}
}
?>
<div class='row'>
	<div class='col-lg-3 font-size16' div='height:34px'>
		一级导航名称: <select id="first_nav" onchange="select()" class=" margin-bottom10" style='height:34px'>
		<option value='-1'>请选择</option>
		<?php for($i=0;$i<count($first_nav);$i++){ ?>
		<option value="<?php echo $first_nav[$i]['id']?>">
			<?php echo $first_nav[$i]['name']?>
		</option>
		<?php } ?>
	</select>
</div>
<div class='col-lg-1'><button class='btn btn-info' onclick='addName(true)'>添加</button></div>
<div class='col-lg-1'><button class='btn btn-warning' onclick='updateName(true)'>修改</button></div>
<div class='col-lg-1'><button class='btn btn-danger' onclick='deleteNav(true)'>删除</button></div>
<div class="row" id="first_nav_href_row">
	<?php for($i=0;$i<count($first_nav);$i++){ ?>
	<div class='col-lg-12 font-size16 hide first_nav_href<?php echo $first_nav[$i]["id"]?>' style='height:34px;margin-left:20px;margin-top:20px;' id="firstNav">链接:<?php echo $first_nav[$i]['href']?></div>
	<?php } ?>
</div>
</div>
<hr/>
<div id="second_nav"></div>
<script type="text/javascript">
	function select(){
		var pid=$("#first_nav").val(),
		second_nav=$("#second_nav"),
		str="",
		first_nav_href=$(".first_nav_href"+pid),
		head="<div class='row' style='margin:10px;font-size:16px'>"+
		"<div class='col-lg-3'>二级导航名称</div>"+
		"<div class='col-lg-3'>链接地址</div>"+
		"<div class='col-lg-3'>操作</div>"+
		"</div>",
		newNav="<div class='row' style='margin:10px;font-size:16px'>"+
		"<div class='col-lg-3'><input type='text' style='height:34px' id='newNav' placeholder='请输入新的名称'/></div>"+
		"<div class='col-lg-3'><input type='text' style='height:34px' id='href' placeholder='请输入链接地址'/></div>"+
		"<div class='col-lg-2'><button class='btn btn-info' onclick='addName()'>添加</button></div>"+
		"</div>";
		if(pid==-1){
			second_nav.html("");
			$("#first_nav_href_row").children().addClass('hide');
			return false;
		}
		first_nav_href.removeClass('hide').siblings().addClass('hide');
		$.ajax({
			url: '../controller/ajax.php?fun=get_second_nav',
			type: 'POST',
			dataType: 'json',
			data:{pid:pid}
		})
		.done(function(data) {
			if(data.length>0){
				for(var i=0;i<data.length;i++){
					str+="<div class='row' style='margin:10px;font-size:16px'>"+
					"<div class='col-lg-3'>"+data[i].name+"</div>"+
					"<div class='col-lg-3'>"+data[i].href+"</div>"+
					"<div class='col-lg-1'><button class='btn btn-warning' onclick='updateName(false,"+data[i].id+")'>修改</button></div>"+
					"<div class='col-lg-1'><button class='btn btn-danger' onclick='deleteNav(false,"+data[i].id+")'>删除</button></div>"+
					"</div>";
				}
				second_nav.html(head+str+newNav);	
			}else{
				second_nav.html("<div class='row' style='margin:10px;font-size:16px'><div class='col-xs-12'>该分类暂无子菜单,请添加</div></div>"+newNav);
				
			}

		})
		.fail(function(a,b,c) {
			alert("获取子菜单错误!");
			console.log(a.responseText);
		})
	}

	function updateName(firstNav,id){
		var name=prompt("标签名"),
		href=prompt("链接地址");
		if(firstNav){
			id = $("#first_nav").val();
		}
		if(name){
			$.ajax({
				url: '../controller/ajax.php?fun=update_nav',
				type: 'POST',
				dataType: 'json',
				data:{id:id,name:name,href:href}
			})
			.done(function(data) {
				if(data.succ>0){
					window.location.reload();
				}else{
					alert('更新失败,请重试!');
				}

			})
			.fail(function(a,b,c) {
				alert("更新错误!");
				console.log(a.responseText);
			})
		}
	}

	function deleteNav(firstNav,id){
		if(firstNav){
			id=$("#first_nav").val();
		}
		if(window.confirm("确认删除这条内容吗?")){
			$.ajax({
				url: '../controller/ajax.php?fun=delete_nav',
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

	function addName(firstNav){
		var newNav,href,pid;
		if(firstNav){
			newNav=prompt("一级标签名");
			href=prompt("一级标链接");
			pid=0;
		}else{
			newNav=$("#newNav").val();
			href=$("#href").val();
			pid=$("#first_nav").val();
		}
		$.ajax({
			url: '../controller/ajax.php?fun=add_nav',
			type: 'POST',
			dataType: 'json',
			data:{name:newNav,href:href,pid:pid}
		})
		.done(function(data) {
			if(data.succ>0){
				window.location.reload();
			}else{
				alert('添加失败,请重试!');
			}

		})
		.fail(function(a,b,c) {
			alert("添加错误!");
			console.log(a.responseText);
		})
	}
</script>