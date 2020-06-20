

<?php
	include ("../conn/conn.php");
	session_start();
	if(!isset($_SESSION['userid'])){
		echo "<br>";
		echo "<h2>需要登录之后再操作</h2>";
		echo '<h1><a href="login.php">前往登录</a></h1>';
		// alert('需要登录之后再操作','./login.php');
		exit;
	}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>后台管理系统</title>
		<link href="images/index.css" type="text/css" rel="stylesheet"/>
        <script src="images/jquery.js"></script>
        <style>
            #edui2{
                width:500px;
                height:150px;
            }
            .edui-editor.edui-default{
                width: 100% !important;
            }

            #edui1_iframeholder{
                width: 100% !important;
            }
        </style>
	</head>


    
<body>
		<header>
			<h1>网站后台管理系统</h1>
			<p>
				<a href="index.php"><span class="icon home"></span>系统首页</a>
				<a href="logout.php"><span class="icon quit"></span>安全退出</a>
			</p>
		</header>
		<section>
			<nav>
				<h3>欢迎您来到管理后台</h3>
				<p>
					登陆名：<strong><?php  echo $_SESSION['username'];  ?></strong>
					<br/>
					身　份：<strong><?php  echo $_SESSION['flag'];  ?></strong>
				</p>
				<dl>
					<dt><span class="icon board"></span>单页管理</dt>
					<dd>
						<a href="page_new.php">-&emsp;新增单页</a>
						<a href="page_list.php">-&emsp;单页列表</a>
					</dd>

					<dt><span class="icon board"></span>分类管理</dt>
					<dd>
						<a href="cate_new.php">-&emsp;新增分类</a>
						<a href="cate_list.php">-&emsp;分类列表</a>
					</dd>


					<dt><span class="icon news"></span>新闻管理</dt>
					<dd>
						<a href="news_new.php">-&emsp;发布新闻</a>
						<a href="news_list.php">-&emsp;新闻列表</a>
						<!-- <a href="#">-&emsp;新闻分类</a> -->
					</dd>
					<dt><span class="icon pro"></span>产品管理</dt>
					<dd>
						<a href="product_new.php">-&emsp;新增产品</a>
						<a href="product_list.php">-&emsp;产品列表</a>
						<!-- <a href="#">-&emsp;产品分类</a> -->
					</dd>
					<dt><span class="icon book"></span>留言管理</dt>
					<dd>
						<a href="guesbook_list.php">-&emsp;留言列表</a>
					</dd>
					<dt><span class="icon flink"></span>友情连接管理</dt>
					<dd>
						<a href="flink_new.php">-&emsp;新增连接</a>
						<a href="flink_list.php">-&emsp;连接列表</a>
					</dd>
					<dt><span class="icon admin"></span>管理员管理</dt>
					<dd>
						<a href="admin_new.php">-&emsp;新增管理员</a>
						<a href="admin_list.php">-&emsp;管理员列表</a>
					</dd>
				</dl>
            </nav>
        



<?php
    // include ("./header.php");
    $id = $_GET['id'];
    $sql = "select * from admin where id=$id";//查询数据库
    $rs = mysqli_query($conn,$sql);

    if(mysqli_num_rows($rs)){//检查是否有数据
        $row = mysqli_fetch_assoc($rs);
    }else{
        echo "没有数据";exit;
    }
    mysqli_free_result($rs);


?>

<div class="mainbox">
        

        <div class="note">
            <h2>修改管理员</h2>
            <form action="admin_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
                <table class="news_form">
                    <tr>
                        <td>用户名</td>
                        <td>
							<input type="text" name="username" value="<?php echo $row['username'];?> " class="inbox"/>
                        </td>
					</tr>
					
                    <tr>
                        <td>密码</td>
                        <td>
							<input type="text" name="password" value="<?php echo $row['password'];?> " class="inbox"/>
                        </td>
					</tr>
					
                    <tr>
                        <td>链接说明：</td>
                        <td>
                            <select name="flag" id="">
								<option value="1" <?php if($row['flag']==1){echo 'selected="selected"';} ?>>超级管理员</option>
								<option value="2" <?php if($row['flag']==2){echo 'selected="selected"';} ?>>普通管理员</option>
							</select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><input type="submit" value="提交"/></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</section>





<script>//footer.php
			$(function(){
				$('dt').click(function(){
					var obj=$(this).next();
					if($(this).next().css('display')=='block'){
						obj.hide('fast');
						$(this).removeClass('on');
					}else{
						obj.show('fast');
						$(this).addClass('on');
					}
				});
			});
		</script>
	</body>
</html>
