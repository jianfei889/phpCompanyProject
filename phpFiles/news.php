<?php

	include("./conn/conn.php");
	include("./header.php");

	$cate_id=isset($_GET['cate_id'])?$_GET['cate_id']:0;

?>





		<div class="inbody">
			
			<?php include("./left.php");?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="./">首页</a> &gt; 新闻中心</span>最新新闻</h3>
				<ul class="newslist">

				<?php 
						
						//新闻分页
							// 分页条件1
								$pagesize=3;
							// 分页条件2
								$page=isset($_GET['page'])?$_GET['page']:1;
							// 分页条件3
								//构造读取产品分类的sql语句
								$sql = " select * from news where 1";
								if($cate_id>0){
									$sql.="and cate_id=$cate_id";
								}
								$sql.= "  order by intime desc ";
								$rs=mysqli_query($conn,$sql);
		
								$records=mysqli_num_rows($rs);//从结果集中得到数据的总行数

								//分页步骤二
									$start=($page-1)*$pagesize;
									$sql.="limit $start,$pagesize";
									$rs=mysqli_query($conn,$sql);



						while($row=mysqli_fetch_assoc($rs)){
							echo '<li>';
							echo 	'<em>'.date('Y-m-d',strtotime($row['intime'])).'</em><a href="content.php?id='.$row['id'].' ">'.$row['title'].'</a>';
							echo '</li>';
						}

					?>

					<!-- <li><em>2017-2-16</em><a href="#">新闻列表1</a></li> -->
	
				</ul>
				<div class="page">
					<?php
						$pagecount=ceil($records/$pagesize);

						if($page>1){
							echo '<a href=" news.php?page=1 ">首页</a>';
							echo '<a href=" news.php?page='.($page-1).' ">上一页</a>';
						}


						for($i=1;$i<=$pagesize;$i++){
							if($i==$page){
								echo '<a class="on" href=" news.php?page='.$i.' ">'.$i.'</a>';
							}else{
								echo '<a href=" news.php?page='.$i.' ">'.$i.'</a>';
							}
						}
						
						if($page<$pagecount){
							echo '<a href=" news.php?page='.($page+1).' ">下一页</a>';
							echo '<a href=" news.php?page='.$pagecount.' ">尾页</a>';
						}

					
					?>

				</div>
			</div>
		</div>


		

<?php
include("./footer.php")
?>
