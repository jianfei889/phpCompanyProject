<?php
    
    include('../conn/conn.php');

//1.接收数据
$boardname = $_POST['boardname'];
$content = $_POST['content'];
$id = $_POST['id'];//修改必须传参作为修改对象（也就是对号入座的修改对应的内容）

//2.验证数据有效性
if(strlen($boardname)<1){
    //修改之后的跳转必须传id值过去，针对原有数据做修改，需要原有数据的支持
    alert("请输入单页模块名","page_edit.php?id=".$id);
    exit;
}

//3.构造sql语句，将数据写入数据表，实现新增单页的功能
    $sql = "update board set boardname='$boardname',content='$content' where id=$id";
    //mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

//4. 将执行结果显示出来
if($r){
    alert("修改成功","page_list.php");
}else{
    alert("修改失败","page_list.php");
}





?>
