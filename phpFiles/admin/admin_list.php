<?php
	include ("./header.php")
?>


		<div class="mainbox">
			
			<div class="note">
				<h4>管理员列表</h4>
		
				<table class="news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>用户名</th>
							<th>密码</th>
							<th>权限</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php

							$flag = array(1=>'超级管理员',2=>'普通管理员');
						
							$sql = "select * from admin order by id desc ";
							$rs = mysqli_query($conn,$sql);


							while($row=mysqli_fetch_assoc($rs)){

							
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['username'].'</td>';
								// echo '<td>'.$row['password'].'</td>';
								echo '<td>'.'******'.'</td>';

								// echo '<td>' .$row['flag'].'</td>';
								echo '<td>' .$flag[$row['flag']].'</td>';
							

								echo '<td>';
								echo '<a href="admin_edit.php?id='.$row['id'].' ">修改</a> /';
								echo '<a href="admin_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定删除该条数据吗\')">删除</a>';
								echo '</td>';

								echo '</tr>';
							}



						?>
						
					</tbody>
				</table>
				
				

				
			</div>
		
		</div>
	</section>

<?php
	include ("./footer.php")
?>