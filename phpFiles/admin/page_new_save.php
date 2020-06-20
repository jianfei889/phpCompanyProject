<?php
    
    include('../conn/conn.php');

//1.接收数据
$boardname = $_POST['boardname'];
$content = $_POST['content'];

//2.验证数据有效性
if(strlen($boardname)<1){
    alert("请输入单页模块名","page_new.php");
    exit;
}

//3.构造sql语句，将数据写入数据表，实现新增单页的功能
    $sql = "insert into board(boardname,content) values('$boardname','$content')";
    //mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

//4. 将执行结果显示出来
if($r){
    alert("新增成功","page_list.php");
}else{
    alert("新增失败","page_new.php");
}





?>
