<?php

	include("./conn/conn.php");
	include("./header.php");

	//获取id
	// $id=$_GET['id'];
	$id=isset($_GET['id']) ? $_GET['id'] : 1 ;

	
		$sql = " select * from board where id=$id  ";
		$rs=mysqli_query($conn,$sql);

		if(mysqli_num_rows($rs)>0){
			$about = mysqli_fetch_assoc($rs);
		}else{
			alert('没有数据') ;
			exit;
		}


		while($row=mysqli_fetch_assoc($rs)){
			echo '<li>';
			echo 		'<a href="news_list?cate_id=' .$row['id']. '">'.$row['catename'].'</a>';
			echo '</li>';
		}




?>

		
		<div class="inbody">
			
		<?php include("./left.php");?>

			<div class="inright">
				<h3 class="intitle">
					<span>您所在的位置：<a href="./">首页</a> &gt; <?php echo $about['boardname'];  ?>
					</span><?php echo $about['boardname'];  ?>
				</h3>
			<div class="mbody" id="mbody_img" >
					<?php
						echo $about['content'];

					?>
				</div>
			</div>
		</div>


		<style>
			#mbody_img img{
					width:300px;
					height:200px;
					display:flex;
					}
		</style>
		

<?php
	include("./footer.php")
?>
