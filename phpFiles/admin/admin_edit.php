

<?php
    include ("./header.php");
    $id = $_GET['id'];
    $sql = "select * from admin where id=$id";//查询数据库
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
            <h2>修改管理员</h2>
            <form action="admin_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
                <table class="news_form">
                    <tr>
                        <td>用户名</td>
                        <td>
							<input type="text" name="username" value="<?php echo $row['username'];?> " class="inbox"/>
                        </td>
					</tr>
					
                    <tr>
                        <td>密码</td>
                        <td>
							<input type="text" name="password" value="<?php echo $row['password'];?> " class="inbox"/>
                        </td>
					</tr>
					
                    <tr>
                        <td>链接说明：</td>
                        <td>
                            <select name="flag" id="">
								<option value="1" <?php if($row['flag']==1){echo 'selected="selected"';} ?>>超级管理员</option>
								<option value="2" <?php if($row['flag']==2){echo 'selected="selected"';} ?>>普通管理员</option>
							</select>
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

