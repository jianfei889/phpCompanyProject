<?php
	include ("./header.php")
?>


		<div class="mainbox">
			
			<div class="note">
				<h4>产品列表</h4>
		
				<table class="news_list">
					<thead>
						<tr>
							<th>ID</th>
							<th>产品名称</th>
							<th>产品分类</th>
							<th>产品图片</th>
							<th>发布时间</th>
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
							//条件1，一页显示的内容
							$pagesize = 5;
							//条件2，是否有传页数过来，没有就显示第一页
							$page = isset($_GET['page']) ? $_GET['page']:1;
							//条件3，数据库的操作
							$sql = "select * from product";
							$rs = mysqli_query($conn,$sql);
							$records = mysqli_num_rows($rs);

						//分页步骤二：当前页应该显示的内容
							$start = ($page-1)*$pagesize;
							//显示3条数据，从0开始显示3条数据---数字里面，参数一为：开始的值，参数二为：一页之中最多显示的页数
							$sql = "select p.*,c.catename from product p,category c where p.cate_id=c.id order by
								 p.intime desc limit $start,$pagesize";
							$rs = mysqli_query($conn,$sql);


							while($row=mysqli_fetch_assoc($rs)){
								echo '<tr>';
								echo '<td>'.$row['id'].'</td>';
								echo '<td>'.$row['productname'].'</td>';
								echo '<td>'.$row['catename'].'</td>';
								// echo '<td>' .mb_substr(strip_tags($row['content']),0,36).'</td>';
								// echo '<td>' .$row['content'].'</td>';
								echo '<td><img style="width:100px;height:100px;" src="../files/' .$row['img'].'"/></td>';
								echo '<td>' .$row['intime'].'</td>';
								echo '<td>';
								echo '<a href="product_edit.php?id='.$row['id'].' ">修改</a> /';
								echo '<a href="product_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定删除该条数据吗\')">删除</a>';
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
								echo "<a href='product_list.php?page=$i' class='on' >$i</a>";
							}else{
								echo "<a href='product_list.php?page=$i'>$i</a>";
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