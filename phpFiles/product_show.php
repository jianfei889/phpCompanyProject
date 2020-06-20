<?php

include("./conn/conn.php");//先引入数据库再引入header
include("./header.php");	//因为header的数据需要从数据库导入


$id=$_GET['id'];//正式项目需要过滤id值，以免产生漏洞
$sql="select product.*,category.catename from product,category where product.id=$id and product.cate_id=category.id";
$rs=mysqli_query($conn,$sql);

if(mysqli_num_rows($rs)>0){
	$pro_row=mysqli_fetch_assoc($rs);
	// mysqli_query ($conn,"update news set hits=hits+1 where id=$id");
}else{
	echo "<h1>当前页数没有这个数据，你可以切换其他页面以此显示数据</h1>";
	exit;
}


?>



		<div class="inbody">
			<?php include("./left.php");?>
			
	<div class="inright">
		<h3 class="intitle">
				<span>您所在的位置：<a href="./">首页</a> &gt; 产品展示&gt; 
					<a href='#'><?php echo $pro_row['productname'] ?></a>
				</span><?php echo $pro_row['productname'] ?>
		</h3>
		<div class="mbody">
			<table class="proshow" cellpadding="0" cellspacing="0">
			<tr><td colspan="2"><img src="./files/<?php echo $pro_row['img'] ?> " alt="" onload="javascript:if(this.clientWidth>300){this.style.width='300px';}"/></td></tr>
			<tr><td class="one">型　　号：</td><td class="two"><?php echo $pro_row['pro_no'] ?></td></tr>
			<tr><td class="one">产品名称：</td><td class="two"><strong><?php echo $pro_row['productname'] ?></strong></td></tr>
			<tr><td class="one">分　　类：</td><td class="two"><b><?php echo $pro_row['catename'] ?></b></td></tr>
			<tr><td class="one">详情描述：</td><td class="two"><?php echo $pro_row['content'] ?></td></tr>
			</table>
		</div>
		<h3 class="intitle">其它产品</h3>
		<ul class="product">

			<?php
					
					$sql="select id,productname,img from product where cate_id=".$pro_row['cate_id']." order by intime desc limit 6"; 
					
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


<!-- 
			<li>
				<div class="pic"><a href="#"><img src="images/p1.jpg" alt=""/></a></div>
				<h4><a href="#">产品名称</a></h4>
			</li> -->
		</ul>
		<div class="c"></div>

	</div>
</div>



<?php
include("./footer.php")
?>

