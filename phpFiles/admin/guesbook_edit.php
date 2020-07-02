<?php
	include ("./header.php");

	$id = $_GET['id'];
	$sql = "select * from guesbook where id=$id";
	$rs=mysqli_query($conn,$sql);

	if($row=mysqli_fetch_assoc($rs)){//检查是否有数据
        
    }else{
        echo "要修改的留言不存在";exit;
    }
    // mysqli_free_result($rs);

?>

 
			<div class="mainbox">
				
				
				<div class="note">
					<h4>修改留言</h4>
					<form action="guesbook_edit_save.php" method="post">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<table class="news_form">
							<tr>
								<td>用户名：</td>
								<td><input type="text" name="username" class="inbox" value=" <?php echo $row['username'];?> "/></td>
							</tr>

							<tr>
								<td>留言内容</td>
								<td>
									<textarea id="intro" name="content"  cols="70" rows="100"><?php echo $row['content']; ?></textarea>
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


