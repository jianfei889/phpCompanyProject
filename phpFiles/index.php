<?php

	include("./conn/conn.php");
	include("./header.php");

?> 


<div class="main1">
	<div class="m1_left">
		<h3 class="ltitle">
			<span><a href="product.php"><img src="images/more.jpg" alt="更多"/></a></span>
			<strong class="on"  style="width: 112px;"><a href="product.php" id="chanpin">最新产品 </a></strong>
		</h3>
		<div  class="m1_body c">

<div id='demo'>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<td id='demo1'>
		<table cellpadding="0" cellspacing="0">
			<tr>

				<?php //构造读取  数据库数据  的sql语句
					$sql = " select * from product  order by intime desc limit 6 ";
					$rs=mysqli_query($conn,$sql);//执行操作
					while($row=mysqli_fetch_assoc($rs)){//循环渲染
						echo '<td>';
						echo '<a href="product_show.php?id=' .$row['id']. ' " title=" '.$row['productname'].' ">
								<img src="./files/'  .$row['img'].   ' " alt=""/><br/>'.$row['productname']. '</a>';
						echo '</td> ';
					}

				?>

			
			</tr>
		</table>
			</td>
			<td id="demo2" valign="top"></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
<!--
  var speed=15;
  demo2.innerHTML=demo1.innerHTML;
  function Marquee(){
  if(demo2.offsetWidth-demo.scrollLeft<=0)
  demo.scrollLeft-=demo1.offsetWidth;
  else{
  demo.scrollLeft++;
  }
  }
  var MyMar=setInterval(Marquee,speed);
  demo.onmouseover=function() {clearInterval(MyMar);}
  demo.onmouseout=function() {MyMar=setInterval(Marquee,speed);}
//-->
</script>
		</div>
	</div>
	<div class="m2_right">
		<h3 class="rtitle">合作媒体</h3>
		<div class="m2_body m2_body2">
			<p><img src="images/m2_pic.png" alt=""/></p>
			<p align="center"><a href="about.php?id=26">查看更多合作媒体 &gt;&gt;</a></p>
		</div>		
	</div>
	<div class="c"></div>
</div>

<div class="main1">
	<div class="m3_left">
		<div class="m3_ll">
			<h3 class="ltitle"><span><a href="about.php?id=1"><img src="images/more.jpg" alt="更多"/></a></span><strong class="on" style="width: 112px;">公司简介</strong></h3>
			<div class="m1_body c">

			<?php //构造读取  数据库数据  的sql语句
					$sql = " select * from board  where id=1 ";
					$rs=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($rs);
					echo $row['content'];
					
				?>


			</div>
		</div>
		<div class="m3_lr">
			<h3 class="ltitle"><span><a href="news.php"><img src="images/more.jpg" alt="更多"/></a></span><strong class="on" style="width: 112px;">新闻资讯</strong></h3>
			<ul class="m1_body c">
						
				<?php //构造读取  数据库数据  的sql语句,新闻条数==10
					$sql = " select * from news order by intime desc limit 10  ";
					$rs=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($rs);
					
					 while($row=mysqli_fetch_assoc($rs)){//循环渲染一下数据
						echo '<li>';
						//date时间函数，strtotime转换字符为时间
						echo '<span>' .date('m-d',strtotime($row['intime'])).'</span>
							<a href="content.php?id=' .$row['id'].'  ">'  .$row['title']. '</a>';//注意这里要传入id值
						echo '</li> '; 
					 }

				?>

			
			</ul>
		</div>
		<div class="c"></div>
	</div>

	<div class="m2_right">
		<h3 class="rtitle">友情连接</h3>
		<ul class="m2_body">
			
				<?php //构造读取  数据库数据  的sql语句,新闻条数==10
					$sql = " select * from flink order by id desc  ";
					$rs=mysqli_query($conn,$sql);
					$row=mysqli_fetch_assoc($rs);
					
					 while($row=mysqli_fetch_assoc($rs)){
						echo '<li>';
					
						echo '<a href=" /www.' .$row['link_url'].'  " target="_blank">' .$row['title'].'</a>';

						echo '</li> '; 
						
					 }

				?>

	
		</ul>		
	</div>
	<div class="c"></div>
</div>



<?php

include("./footer.php")

?>
