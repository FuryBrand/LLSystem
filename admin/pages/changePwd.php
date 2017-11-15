	<?php include('/islogin.php') ?>
	<style>
		.changepwd{
			width: 400px;
			margin: 100px auto;
		}
		.changepwd input{
			display: block;
			width: 300px;
			height: 34px;
			margin: 15px;
			padding-left: 5px;
		}

	</style>
	<div class="changepwd">
		<input type="password" name="newpwd" id="newpwd" placeholder="请输入新密码">
		<input type="password" id="newwpwd1" placeholder="请再输入一次">
		<input type="button" onclick="changepwd()" value="修改" class="btn btn-info">
	</div>
	<script type="text/javascript">
		function changepwd(id){
			var newpwd=$("#newpwd").val();
			$.ajax({
				url: '../controller/ajax.php?fun=changepwd',
				type: 'POST',
				dataType: 'json',
				data:{newpwd:newpwd},
				xhrFields: {
					withCredentials: true
				},
			})
			.done(function(data) {
				if(data.succ){
					alert("修改成功");
					window.location.href="./index.php";
				}else{
					alert("修改失败,请重试!");
					window.location.reload();
				}
			})
			.fail(function(a,b,c) {
				alert("修改密码错误!");
				console.log(a.responseText);
			})
		}
	</script>