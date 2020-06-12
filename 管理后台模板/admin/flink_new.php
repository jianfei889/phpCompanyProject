<?php
	include ("./header.php")
?>


			<div class="mainbox">
				
				
				<div class="note">
					<h4>新增友情链接</h4>
					<form action="fink_new_save.php" method="post">
						<table class="news_form">
							<tr>
								<td>链接名称：</td>
								<td><input type="text" name="title" class="inbox"/></td>
							</tr>
							
							<tr>
								<td>链接地址：</td>
								<td><input type="text" name="link_url" class="inbox"/></td>
							</tr>
							<tr>
								<td>说明内容：</td>
								<td>
									<textarea id="intro" name="content"  cols="20" rows="10"></textarea>
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


