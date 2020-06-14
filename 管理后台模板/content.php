
<?php

include("./conn/conn.php");
include("./header.php");

$id=$_GET['id'];
$sql="select * from news where id=$id";
$rs=mysqli_query($conn,$sql);
if(mysqli_num_rows($rs)>0){
	$news_row=mysqli_fetch_assoc($rs);
	mysqli_query ($conn,"update news set hits=hits+1 where id=$id");
}else{
	echo "<h1>当前页数没有这个数据，你可以切换其他页面以此显示数据</h1>";
	exit;
}

?>




<div class="inbody">
	<?php include("./left.php");?>

		
<div class="inright" style="background-color: #fff;">
	<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <a href="#">新闻中心</a> &gt; 阅读内容</span>阅读内容</h3>
	<div class="mbody">
		<h1 class="title1"><?php echo $news_row['title'] ?></h1>
		<div class="title2">来源：本站　　　发布日期：<?php echo $news_row['intime'] ?>　　　已有 <?php echo $news_row['hits'] ?> 人浏览过此信息</div>
		<div class="newsbody">
			<p><?php echo $news_row['content'] ?></p>
		</div>
		<div class="newsauthor">编辑：<?php echo $news_row['author'] ?></div>
		<div class="newsmore">
				<?php
					$sql="select id,title from news where id<$id order by id desc  limit 1";
					$rs=mysqli_query($conn,$sql);
					if($row=mysqli_fetch_assoc($rs)){
						echo '<h2>上一条：<a href="content.php?id='.$row['id'].'">'.$row['title'].'</a> </h2>';
					}else{
						echo "没有上一条数据，可以切换显示其他内容";
					}
				?>
			
		</div>

		<div class="newsmore">
				<?php
					$sql="select id,title from news where id>$id order by id asc limit 1";
					$rs=mysqli_query($conn,$sql);
					if($row=mysqli_fetch_assoc($rs)){
						echo '<h2>下一条：<a href="content.php?id='.$row['i<imd'].'">'.$row['title'].'</a> </h2>';
					}else{
						echo "没有下一条数据，可以切换显示其他内容";
					}
				?>
			
		</div>


		<!-- <div class="newsmore"><h2>下一条：<a href="#">新闻3</a></h2></div> -->
	</div>
  </div>
</div>




<?php
include("./footer.php")
?>
