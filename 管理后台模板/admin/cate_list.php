<?php
	include ("./header.php")
?>


		<div class="mainbox">
			
			<div class="note">
				<h4>分类列表</h4>
		
				<table class="news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>分类名称</th>
							<th>所属板块</th>
							<th>排序号</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php

						//分页步骤一：集齐三大条件
							//条件1
							$pagesize = 3;
							//条件2
							$page = isset($_GET['page']) ? $_GET['page']:1;
							//条件3
							$sql = "select * from news";
							$rs = mysqli_query($conn,$sql);
							$records = mysqli_num_rows($rs);

						//分页步骤二：当前页应该显示的内容
							$start = ($page-1)*$pagesize;
							//查找数据，排序为按照 orderno， 升序排序--asc,倒序排序--desc
							$sql = "select * from category order by orderno asc,id asc";
							$rs = mysqli_query($conn,$sql);


							while($row=mysqli_fetch_assoc($rs)){
							
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['catename'].'</td>';

								echo '<td>' .$row['module'].'</td>';
								echo '<td>' .$row['orderno'].'</td>';
								echo '<td>';
								echo '<a href="cate_edit.php?id='.$row['id'].' ">修改</a> /';
								echo '<a href="cate_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定删除该条数据吗\')">删除</a>';
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