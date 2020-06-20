<?php
	include ("./header.php")
?>


			<div class="mainbox">
				
				
				<div class="note">
					<h4>新增管理员</h4>
					<form action="admin_new_save.php" method="post">
						<table class="news_form">
							<tr>
								<td>用户名：</td>
								<td><input type="text" name="username" class="inbox"/></td>
							</tr>
							<tr>
								<td>密码：</td>
								<td>
									<input type="password" name="password" class="inbox"/>
								</td>
							</tr>
							<tr>
								<td>权　　限：</td>
								<td>
									<select class="inbox" name="flag">
										<option value="1">超级管理员</option>
										<option value="2">普通管理员</option>
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

<?php
	include ("./footer.php")
?>


