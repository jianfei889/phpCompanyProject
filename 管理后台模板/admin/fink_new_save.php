<?php
    
    include('../conn/conn.php');

//1.接收数据
// $id = $_POST['id'];
$title = $_POST['title'];
$link_url = $_POST['link_url'];
$content = $_POST['content'];

//2.验证数据有效性
if(strlen($title)<1){
    alert("请输入链接名称","flink_new.php");
    exit;
}

if(strlen($link_url)<1){
    alert("请输入链接地址","flink_new.php");
    exit;
}



//3.构造sql语句，将数据写入数据表，实现新增单页的功能
    $sql = "insert into flink(title,link_url,content) values('$title','$link_url','$content')";
    //mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

//4. 将执行结果显示出来
if($r){
    alert("友情链接----新增成功","flink_list.php");
}else{
    echo "新增失败";
    echo mysqli_error($conn);
    // alert("友情链接----新增失败","flink_new.php");
}





?>
