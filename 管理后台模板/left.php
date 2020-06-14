<div class="leftbar">



	<h3>新闻分类</h3>

		<ul>

			<?php //构造读取产品分类的sql语句
				$sql = " select * from category where module='新闻中心' order by orderno asc,id asc ";
				$rs=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($rs)){
					echo '<li>';
					// echo 		'<a href="news.php?cate_id=' .$row['id']. '">'.$row['catename'].'</a>';
					echo 		'<a href="news.php?page=' .$row['id']. '">'.$row['catename'].'</a>';
					echo '</li>';
				}

			?>




			<!-- <li><a href="#">新闻分类一</a></li> -->
		</ul>

	<!-- <p>
		<img src="images/leftbar1.jpg" alt="" width="260"/>
	</p> -->


</div>







