<?php
    
include('./conn/conn.php');

//1.接收数据
$username = $_POST['username'];
$content = $_POST['content'];

//2. 验证数据有效性
	if(strlen($username)<1 ){
		echo "昵称或不能为空，请输入补全！";
		exit;
	}
	if(strlen($content)<2 ){
		echo "留言内容不能为空，请输入补全！";
		exit;
	}


//3.构造sql语句，将数据操作入数据表，实现对应的sql功能
    $sql = "insert into guesbook(username,content) values('$username','$content') ";

    // mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

    
//4. 将执行结果显示出来
if($r){
    alert("留言保存--成功","guesbook.php");
}else{
    alert("留言保存--失败","guesbook.php");
}



?>
