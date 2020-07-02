<?php
	include ("./header.php")
?>


		<div class="mainbox">
			
			<div class="note">
				<h1>新闻列表</h1>
				<!-- <form method="post" action="" class="search_form">
					<input type="text" name="keywords" placeholder="请输入要搜索的关键词"/>
					<input type="submit" value="搜索"/>
				</form> -->
				<table class="news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>模块名</th>
							<th>内容</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "select * from board order by id asc";
							$rs = mysqli_query($conn,$sql);
							while($row = mysqli_fetch_assoc($rs)){
								
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['boardname'].'</td>';
								// echo '<td>' .mb_substr(strip_tags($row['content']),0,80,'utf-8').'</td>';
								echo '<td id="img_page">' .$row['content'].'</td>';
								echo '<td>
										<a href="page_edit.php?id='.$row['id'].' ">修改</a> /
										<a href="page_delete.php?id='.$row['id'].'">删除</a>
									</td>';
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


