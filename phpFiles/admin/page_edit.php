

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
                height:170px;
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
    $sql = "select * from board where id=$id";//查询数据库
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
            <h2>修改单页</h2>
            <form action="page_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>">
                <table class="news_form">
                    <tr>
                        <td>单页模块名：</td>
                        <td>
                            <input type="text" name="boardname" class="inbox" value="<?php echo $row['boardname']; ?>"  />
                        </td>
                    </tr>
                    <tr>
                        <td>详细内容：</td>
                        <td>
                            <!-- <textarea name="content" id="content" style="display:none"></textarea> -->
                            <!-- <iframe id="FCK_Frame" src="../utf8-php/index.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="550" frameborder="no" scrolling="no"></iframe> -->
                            <textarea id="intro" name="content"  cols="70" rows="100"><?php echo $row['content']; ?></textarea>
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





<script type="text/javascript" src="./utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
<script type="text/javascript" src="./utf8-php/ueditor.all.js"></script>

    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('intro');			//编辑器容器的ID
        ue.ready(function(){
            ue.setHeight()
        })


</script>


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

