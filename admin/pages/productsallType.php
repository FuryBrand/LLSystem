	<?php
	include_once($_SERVER['DOCUMENT_ROOT'].'/LLsystem/config.php');
	include_once(Root_Path."/model/productsall.php");
	$company=get_company_from_productsall();
	?>
	<div class="row" style="font-size:17px;margin-bottom:25px;text-align:center">
		<div class='col-lg-3'>公司</div>
		<div class='col-lg-3'>产品系列</div>
	</div>
	<div class="row" style="margin-bottom:20px;">
		<div class='col-lg-3'>
			<select id="company" multiple="multiple" size="<?php echo count($company);?>" onclick="selectCompany()">
				<?php for($i=0;$i<count($company);$i++){ ?>
				<option value ="<?php echo $company[$i]['id']?>"><?php echo $company[$i]['title']?></option>
				<?php } ?>
			</select>
		</div>
		<div class='col-lg-3'>
			<select id="series" multiple="multiple" size="<?php echo count($company);?>">
			<option>请先选择公司</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class='col-lg-3'>
			<div>
				<input type="button" class="btn btn-danger" value="删除所选公司" onclick="delCompany()"/>
			</div>
			<div>
				<input type="text" style="width:70%;height:34px" id="addCompany" placeholder="请输入新的公司">
				<input type="button" class="btn btn-info" value="添加" onclick="newCompany()"/>
			</div>
			<div>
				<input type="text" style="width:70%;height:34px" id="editCompany" placeholder="修改公司名称">
				<input type="button" class="btn btn-info" value="修改" onclick="updateCompany()"/>
			</div>
		</div>
		<div class='col-lg-3'>
			<div>
				<input type="button" class="btn btn-danger" value="删除所选系列" onclick="delCompany()"/>
			</div>
			<div>
				<input type="text" style="width:70%;height:34px" id="addCompany" placeholder="请输入新的系列">
				<input type="button" class="btn btn-info" value="添加" onclick="newCompany()"/>
			</div>
			<div>
				<input type="text" style="width:70%;height:34px" id="editCompany" placeholder="修改系列名称">
				<input type="button" class="btn btn-info" value="修改" onclick="updateCompany()"/>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function updateCompany() {
			var companyid = $("#company").val();
			var title = $("#editCompany").val();
			$.ajax({
				type: "POST",
				url: "../controller/ajax.php?fun=update_company_by_id",
				dataType: 'json',
				data:{title:title,id:companyid[0]}
			}).done(function (data) {
				if(data.succ){
					window.location.reload();
				}
			}).fail(function (jqXHR, textStatus) {
				alert("更新失败!")
				console.log(jqXHR);
			});
		}

		function newCompany(){
			var title = $("#addCompany").val();	
			$.ajax({
				type: "POST",
				url: "../controller/ajax.php?fun=add_company",
				dataType: 'json',
				data:{title:title}
			}).done(function (data) {
				if(data.succ){
					window.location.reload();
					$("#addCompany").val("请输入新的公司");
				}
			}).fail(function (jqXHR, textStatus) {
				alert("添加失败!")
				console.log(jqXHR);
			});
		}

		function delCompany(){
			var companyid = $("#company").val();
			if(window.confirm("确认删除这条内容吗?")){
				$.ajax({
					url: '../controller/ajax.php?fun=del_company',
					type: 'POST',
					dataType: 'json',
					data:{id:companyid[0]}
				})
				.done(function(data) {
					if("succ" in data){
						window.location.reload();
					}else if("cannotdel" in data){
						alert('含有子系列，不能删除!');
					}
				})
				.fail(function(a,b,c) {
					alert("删除错误!");
					console.log(a.responseText);
				})
			}
		}
		function selectCompany(){
			var companyid = $("#company").val();
			$("#editCompany").val($("#company").find("option:selected").text());
			$.ajax({
				url:"../controller/ajax.php?fun=get_series_from_productsall",
				type:'POST',
				dataType:'json',
				data:{id:companyid[0]}
			})
			.done(function(data){
				if(data['succ'].length>0){
					$("#series").empty();
					$("#series").attr("size",data['succ'].length+1);
					for(var i=0;i<data['succ'].length;i++){
						$("#series").append("<option value="+data['succ'][i]['id']+">"+data['succ'][i]['title']+"</option>");
					}
				}else{
					$("#series").empty();
					$("#series").append("<option>该公司下暂无产品系列分类</option>");
				}
			})
			.fail(function(a,b,c){
				alert("所属系列列表获取出错！");
				console.log(a.responseText);
		})
}
	</script>