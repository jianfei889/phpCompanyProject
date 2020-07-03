<?php

	include("./conn/conn.php");
	include("./header.php");

?>





		<div class="inbody">
			
			<?php include("./left.php");?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="./">首页</a> &gt; <a href="guesbook.php">来宾留言</a> </span>最新留言</h3>
				<ul class="newslist">

				<?php 
						
						//新闻分页
							// 分页条件1
								$pagesize=2;
							// 分页条件2
								$page=isset($_GET['page'])?$_GET['page']:1;
							// 分页条件3
								//构造读取数据库数据的sql语句
								$sql = " select * from guesbook order by intime desc";
								
								$rs=mysqli_query($conn,$sql);
								$records=mysqli_num_rows($rs);//从结果集中得到数据的总行数

								//分页步骤二
									$start=($page-1)*$pagesize;
									$sql.=" limit $start,$pagesize";
									$rs=mysqli_query($conn,$sql);

						while($row=mysqli_fetch_assoc($rs)){
							echo 	'<li><em>'.date('Y-m-d',strtotime($row['intime'])).'</em>'
										.$row['username'].'说：'.$row['content'].'</li>';
						}

					?>

					<!-- <li><em>2017-2-16</em><a href="#">新闻列表1</a></li> -->
	
				</ul>
				<div class="page">
					<?php
						$pagecount=ceil($records/$pagesize);

						if($page>1){
							echo '<a href=" guesbook.php?page=1 ">首页</a>';
							echo '<a href=" guesbook.php?page='.($page-1).' ">上一页</a>';
						}


						for($i=1;$i<=$pagesize;$i++){
							if($i==$page){
								echo '<a class="on" href=" guesbook.php?page='.$i.' ">'.$i.'</a>';
							}else{
								echo '<a href=" guesbook.php?page='.$i.' ">'.$i.'</a>';
							}
						}
						
						if($page<$pagecount){
							echo '<a href=" guesbook.php?page='.($page+1).' ">下一页</a>';
							echo '<a href=" guesbook.php?page='.$pagecount.' ">尾页</a>';
						}

					
					?>

				</div>

				<!-- 留言表单 -->
				
				<form action="guesbook_save.php" method="POST" role="form">
					<legend><h1>发表留言评论</h1> </legend>
					
					
					<div class="input-group">
						<label for=""><h4>请输入你的昵称</h4></label>
						<input type="text" name="username" class="form-control" id="exampleInputAmount" placeholder="请输入你的昵称">
					</div>
					
				
					<div class="form-group">
						<label for=""><h4>请输入你要评论的内容</h4></label>
						<textarea name="content" id="input" class="form-control" rows="6" cols="50" required="required" placeholder="请输入你要留言的内容"></textarea>
						
					</div>
		
				
					<button type="submit" class="btn btn-primary">发表评论</button>
				</form>
				

			</div>


		</div>


		

<?php
include("./footer.php")
?>
