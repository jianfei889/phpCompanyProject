<?php
	include ("./header.php")
?>


			<div class="mainbox">
				
				
				<div class="note">
					<h4>新增产品</h4>
					<form action="product_new_save.php" method="post" enctype="multipart/form-data">
						<table class="news_form">
							<tr>
								<td>产品名称：</td>
								<td><input type="text" name="productname" class="inbox"/></td>
							</tr>

							<tr>
								<td>产品编号：</td>
								<td><input type="text" name="pro_no" class="inbox"/></td>
							</tr>

							<tr>
								<td>产品分类：</td>
								<td>
									<select name="cate_id" class="inbox">
										<option value=“0>请选择产品分类</option>
										<?php 
											$sql = "select * from category where module='产品中心' order by orderno asc,id desc ";
										
											$temp = mysqli_query($conn,$sql);

											while($trow=mysqli_fetch_assoc($temp)){
												echo '<option value="'.$trow['id'].'">'.$trow['catename'].'</option>';
											}

										?>
									</select>
								</td>
							</tr>

							<tr>
								<td>产品描述：</td>
								<td><textarea id="intro" name="content"  cols="20" rows="10"></textarea></td>
							</tr>
							
							<tr>
								<td>产品图片：</td>
								<td><input type="file" name="img" class="inbox"/></td>
							</tr>
							
							<tr>
								<td></td>
								<td><input type="submit" value="提交"/></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</section>




<script type="text/javascript" src="./utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
<script type="text/javascript" src="./utf8-php/ueditor.all.js"></script>

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('intro');			//编辑器容器的ID
        ue.ready(function(){
            ue.setHeight()
        })


</script>


<?php
	include ("./footer.php")
?>


