<?php

include("./conn/conn.php");//先引入数据库再引入header
include("./header.php");	//因为header的数据需要从数据库导入

// $id=$_GET['id'];
// $sql="select * from news where id=$id";
// $rs=mysqli_query($conn,$sql);
// if(mysqli_num_rows($rs)>0){
// 	$news_row=mysqli_fetch_assoc($rs);
// 	mysqli_query ($conn,"update news set hits=hits+1 where id=$id");
// }else{
// 	echo "<h1>当前页数没有这个数据，你可以切换其他页面以此显示数据</h1>";
// 	exit;
// }



?>




		<div class="inbody">
		<?php include("./left.php");?>
			
	<div class="inright">
		<h3 class="intitle"><span>您当前所在位置： <a href="/">首页</a> &gt; 产品中心</span>产品中心</h3>
		<ul class='product'>

				<?php
					$sql="select id,productname,img from product  order by intime desc ";
					$rs=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($rs)){
						echo '<li>';
						echo 	'<div class="pic"><a href="product_show.php?id='.$row['id'].'"><img src="./files/'.$row['img']. ' " alt=""/></a></div>';
						echo 	'<h4>';
						echo 		'<a href="#">'.$row['productname'].'</a>';
						echo 	'</h4>';
						echo '</li>';
					}


				?>


			
		</ul>

		<div class="c"></div>
			<div class="page">
				<a href="?page=1">首页</a>
				<a href='?page=1'>上一页</a>
				<a href='?page=1'>1</a>
				<a href='?page=1' class="on">2</a>
				<a href='?page=1'>3</a>
				<a href='?page=1'>下一页</a>
				<a href='?page=1'>尾页</a>
			</div>
	</div>
</div>


<?php
include("./footer.php")
?>


