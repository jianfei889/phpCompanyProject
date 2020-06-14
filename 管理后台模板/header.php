<!DOCTYPE html">
<html lang="zh-CN">
	<head>
		<meta charset="utf-8"/>
		<title>成都XXXXX科技有限公司</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="robots" content="index,follow,all"/>
		<link type="text/css" rel="stylesheet" href="./skin/index.css"/>
		<script type="text/javascript" src="./skin/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="./skin/jquery.jslides.js"></script>
		<script type="text/javascript" src="./skin/user_index.js"></script>
	</head>
	<body>
		<div id="header_bg">
			<div id="header">
				<h1><a href="/">成都XXXXX科技有限公司</a></h1>
				<div class="dianhua">24小时咨询热线<span>028-88888888</span></div>
			</div>
		</div>
		<div id="menu">
			<ul>
				<li><a href="./" class="on">首　页</a></li>
				<li><a href="about.php">公司简介</a></li>
				<li><a href="news.php">新闻中心</a></li>
				<li>
					<div id="menu3" class="menuchild" onmouseover="showmenu(3);" onmouseout="hidemenu(3);">

						<?php //构造读取产品分类的sql语句
							$sql = " select id,catename from category where module='产品中心' order by orderno asc,id asc ";
							$rs=mysqli_query($conn,$sql);
							while($row=mysqli_fetch_assoc($rs)){
								echo '<a href="product.php?cate_id='.$row['id'].' ">'.$row['catename'].'</a>';
							}

						?>
	
					</div>
					<a href="product.php" onmouseover="showmenu(3);" onmouseout="hidemenu(3);">产品展示</a>
				</li>
				<li><a href="guesbook.php">来宾留言</a></li>
				<li><a href="about.php?id=27">企业文化</a></li>
				<li class="menu_end"><a href="about.php?id=28">联系我们</a></li>
			</ul>
		</div>
		<div id="banner">
			<div id="full-screen-slider">
				<ul id="slides">
					<li style="background:url('images/b1.jpg') no-repeat center top;background-size:100%;"></li>
					<li style="background:url('images/b2.jpg') no-repeat center top;background-size:100%;"></li>
					<li style="background:url('images/b3.jpg') no-repeat center top;background-size:100%;"></li>
				</ul>
			</div>
		</div>
		
<div class="notice_bg">
	<div class="notice">
		<div class="share_btns">
			<!-- Baidu Button BEGIN -->
			<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
			<span class="bds_more">分享到：</span>
			<a class="bds_qzone"></a>
			<a class="bds_tsina"></a>
			<a class="bds_tqq"></a>
			<a class="bds_renren"></a>
			<a class="shareCount"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
			</script>
			<!-- Baidu Button END -->
		</div>
		<b>最新公告:</b>
		<ul>
			<?php //构造读取  数据库数据  的sql语句
				$sql = " select * from news where id=1 order by id desc limit 1 ";
				$rs=mysqli_query($conn,$sql);
				while($row=mysqli_fetch_assoc($rs)){

					echo '<li>';
					echo '<span>'.$row['intime'].'</span>';
					echo '<a target="_blank" href="contetn.php?id='.$row['id'].' " title="'.$row['title'].'">'.$row['title'].'</a>';
					echo '</li> ';
					
				}

			?>

			<!-- <li>
				<span>2017-2-16</span><a target="_blank" href="#" title="公司标题">公告标题</a>
			</li> -->
		</ul>
		<div class="c"></div>
	</div>
</div>
