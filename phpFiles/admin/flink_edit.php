


<?php
    include ("./header.php");
    $id = $_GET['id'];
    $sql = "select * from flink where id=$id";//查询数据库
    $rs = mysqli_query($conn,$sql);

    if(mysqli_num_rows($rs)){//检查是否有数据
        $row = mysqli_fetch_assoc($rs);
    }else{
        echo "没有数据";exit;
    }
    mysqli_free_result($rs);


?>


    <div class="mainbox">
        

        <div class="note">
            <h2>修改友情链接</h2>
            <form action="flink_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
                <table class="news_form">
                    <tr>
                        <td>链接名称</td>
                        <td>
							<input type="text" name="title" value="<?php echo $row['title'];?> " class="inbox"/>
                        </td>
					</tr>
					
                    <tr>
                        <td>链接网址</td>
                        <td>
							<input type="text" name="link_url" value="<?php echo $row['link_url'];?> " class="inbox"/>
                        </td>
					</tr>
					
                    <tr>
                        <td>链接说明：</td>
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


<script>//footer.php
			$(function(){
				$('dt').click(function(){
					var obj=$(this).next();
					if($(this).next().css('display')=='block'){
						obj.hide('fast');
						$(this).removeClass('on');
					}else{
						obj.show('fast');
						$(this).addClass('on');
					}
				});
			});
		</script>
	</body>
</html>

