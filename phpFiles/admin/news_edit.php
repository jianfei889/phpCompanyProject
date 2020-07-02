

<?php
    include ("./header.php");
    $id = $_GET['id'];
    $sql = "select * from news where id=$id";//查询数据库
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
            <h2>修改新闻</h2>
			<!-- 上传图片前提：1.from、post,2.type=file,3多格式 -->
			<form action="news_edit_save.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
                <table class="news_form">
                    <tr>
                        <td>新闻标题：</td>
                        <td>
                            <input type="text" name="title" class="inbox"  value="<?php echo $row['title']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>新闻分类：</td>
                        <td>
							<select name="cate_id" id="">
								<option value="0">请选择新闻分类</option>
								<option value="11">今天是个好日子</option>
								<option value="12">nihao</option>
								<option value="13">露娜（紫霞仙子）</option>
								<option value="14">善弈者谋势，不善弈者谋子</option>
							</select>
                        </td>
                    </tr>
                    <tr>
                        <td>新闻作者：</td>
                        <td>
                            <input type="text" name="author" class="inbox" value="<?php echo $row['author']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>新闻内容：</td>
                        <td>
                            <textarea id="intro" name="content"  cols="20" rows="10"><?php echo $row['content']; ?></textarea>
                        </td>
                    </tr>
					<tr>
                        <td>上传图片：</td>
                        <td>
							<img src="../files/<?php echo $row['img'];?>" alt="之前没上传图片" width="200px;"><br>
                            <input type="file" name="img" class="inbox" />
							<input type="hidden" name="old_img" value="<?php echo $row['img'];  ?>">
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


