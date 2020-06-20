<?php

include("./conn/conn.php");//先引入数据库再引入header
include("./header.php");	//因为header的数据需要从数据库导入


//cate_id为0 的话就不执行 if($cate_id>0)代码，显示全部数据
$cate_id=isset($_GET['cate_id'])?$_GET['cate_id']:0;



?>




		<div class="inbody">
			<?php include("./left.php");?>
			
	<div class="inright">
		<h3 class="intitle"><span>您当前所在位置： <a href="/">首页</a> &gt; 产品中心</span>产品中心</h3>
		<ul class='product'>

				<?php
					//新闻分页
						// 分页条件1--一页显示的条数
						$pagesize=3;
						// 分页条件2---当前页
							$page=isset($_GET['page'])?$_GET['page']:1;
						// 分页条件3--一共有多少条数据
					

					$sql="select id,productname,img from product where 1"; 
					if($cate_id>0){
						$sql.=" and cate_id=$cate_id";
					}
					$sql.="  order by intime desc ";
					$rs=mysqli_query($conn,$sql);

					$records=mysqli_num_rows($rs);

					//分页步骤二
					$start=($page-1)*$pagesize;
					$sql.="limit $start,$pagesize";
					$rs=mysqli_query($conn,$sql);

					while($row=mysqli_fetch_assoc($rs)){
						echo '<li>';
						echo 	'<div class="pic"><a href="product_show.php?id='.$row['id'].'"><img src="./files/'.$row['img']. ' " alt=""/></a></div>';
						echo 	'<h4>';
						echo 		'<a href="product_show.php?id='.$row['id'].'">'.$row['productname'].'</a>';
						echo 	'</h4>';
						echo '</li>';
					}


				?>


			
		</ul>

		<div class="c"></div>
			<div class="page">
			<?php
						$pagecount=ceil($records/$pagesize);

						if($page>1){
							echo '<a href=" product.php?page=1 ">第一页</a>';
							echo '<a href=" product.php?page='.($page-1).' ">上一页</a>';
						}

						//分页步骤三，打印页码表
						for($i=1;$i<=$pagecount;$i++){
							if($i==$page){
								echo '<a class="on" href=" product.php?page='.$i.' ">'.$i.'</a>';
							}else{
								echo '<a href=" product.php?page='.$i.' ">'.$i.'</a>';
							}
						}
						
						if($page<$pagecount){
							echo '<a href=" product.php?page='.($page+1).' ">下一页</a>';
							echo '<a href=" product.php?page='.$pagecount.' ">尾页</a>';
						}

					
					?>
			</div>
	</div>
</div>


<?php
include("./footer.php")
?>


