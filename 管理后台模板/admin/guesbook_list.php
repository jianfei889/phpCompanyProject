<?php
	include ("./header.php")
?>


		<div class="mainbox">
			
			<div class="note">
				<h4>留言列表</h4>
		
				<table class="news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>用户名</th>
							<th>留言内容</th>
							<th>留言时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
/* 
							$sql = "select * from news order by intime desc";
							$rs = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($rs)){
							
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['title'].'</td>';
								// echo '<td>' .mb_substr(strip_tags($row['content']),0,80,'utf-8').'</td>';
								echo '<td>' .$row['content'].'</td>';
								echo '<td>' .$row['intime'].'</td>';
								echo '<td>' .$row['hits'].'次</td>';
								echo '<td>';
								echo '<a href="news_edit.php?id='.$row['id'].' ">修改</a> /';
								echo '<a href="news_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定删除该条数据吗\')">删除</a>';
								echo '</td>';
								echo '</tr>';
							}
 */
						//分页步骤一：集齐三大条件
							//条件1
							$pagesize = 6;
							//条件2
							$page = isset($_GET['page']) ? $_GET['page']:1;
							//条件3
							$sql = "select * from guesbook";
							$rs = mysqli_query($conn,$sql);
							$records = mysqli_num_rows($rs);

						//分页步骤二：当前页应该显示的内容
							$start = ($page-1)*$pagesize;
							//显示3条数据，从0开始显示3条数据---数字里面，参数一为：开始的值，参数二为：一页之中最多显示的页数
							$sql = "select * from guesbook order by intime desc limit $start,$pagesize";
							$rs = mysqli_query($conn,$sql);


							while($row=mysqli_fetch_assoc($rs)){
							
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['username'].'</td>';
								echo '<td>'.$row['content'].'</td>';

								echo '<td>' .$row['intime'].'</td>';

								echo '<td>';
								echo '<a href="guesbook_edit.php?id='.$row['id'].' ">修改</a> /';
								echo '<a href="guesbook_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定删除该条数据吗\')">删除</a>';
								echo '</td>';

								echo '</tr>';
							}



						?>
						
					</tbody>
				</table>
				
				<div class="page">
							
					<?php
						//分页步骤三：打印页码表
						$pagecount = ceil($records/$pagesize);
						for($i=1;$i<=$pagecount;$i++){
							if($page==$i){
								echo "<a href='guesbook_list.php?page=$i' class='on' >$i</a>";
							}else{
								echo "<a href='guesbook_list.php?page=$i'>$i</a>";
							}
						}



					?>
				
				</div>

				
			</div>
		
		</div>
	</section>

<?php
	include ("./footer.php")
?>