<?php
include('../conn/conn.php');

//1.接收数据
$id=$_POST['id'];
$username=$_POST['username'];
$content=$_POST['content'];






//3.构造sql语句，将数据操作入数据表，实现对应的sql功能 
    $sql = "update guesbook set username='$username',content='$content'  where id = $id ";
    // $sql = "UPDATE guesbook SET content = '$content',username='$username' WHERE `guesbook`.`id` = $id";

    // mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假
    
    
//4. 将执行结果显示出来
if($r){
    alert("留言修改--成功","guesbook_list.php");
}else{
    echo "修改失败";
    echo mysqli_error($conn);
    // alert("留言修改--失败","guesbook_edit.php");
}



?>
