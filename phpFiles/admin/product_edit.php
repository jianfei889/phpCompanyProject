<?php
	include ("./header.php");
	$id = $_GET['id'];
	$sql = "select * from product where id=$id";
	$rs=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_assoc($rs)){//检查是否有数据
        
    }else{
        echo "要修改的产品不存在";exit;
    }
    // mysqli_free_result($rs);

?>


			<div class="mainbox">
				
				
				<div class="note">
					<h4>修改产品</h4>
					<form action="product_edit_save.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id" value=" <?php echo $id;?> ">
						<table class="news_form">
							<tr>
								<td>产品名称：</td>
								<td><input type="text" name="productname" class="inbox" value=" <?php echo $row['productname'];?> "/></td>
							</tr>

							<tr>
								<td>产品编号：</td>
								<td><input type="text" name="pro_no" class="inbox" value=" <?php echo $row['pro_no'];?> "/></td>
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
												if($row['cate_id']===$trow['id']){
													echo '<option value="'.$trow['id'].'" selected="selected">'.$trow['catename'].'</option>';
												}else{
													echo '<option value="'.$trow['id'].'">'.$trow['catename'].'</option>';
												}
													
												
											}

										?>
									</select>
								</td>
							</tr>

							<tr>
								<td>产品描述：</td>
								<td><textarea id="intro" name="content"  cols="20" rows="10"><?php echo $row['content'];?></textarea></td>
							</tr>
							
							<tr>
								<td>产品图片：</td>
								<td>
									<img style="width:100px;height:100px;" src="../files/<?php echo $row['img'] ?>"/>
									<input type="file" name="img" class="inbox"/>
									<input type="hidden" name="oldimg" value=" <?php echo $row['img'];?> " >
								</td>
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


