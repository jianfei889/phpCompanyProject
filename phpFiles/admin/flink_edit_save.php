<?php
    
include('../conn/conn.php');

//1.接收数据
$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$link_url = $_POST['link_url'];





//3.构造sql语句，将数据操作入数据表，实现对应的sql功能
    $sql = "update flink set title='$title',link_url='$link_url',content='$content' where id=$id ";

    // mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

    
//4. 将执行结果显示出来
if($r){
    alert("友情链接修改--成功","flink_list.php");
}else{
    alert("友情链接修改--失败","flink_edit.php");
}



?>
