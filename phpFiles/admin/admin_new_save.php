<?php
    
    include('../conn/conn.php');

//1.接收数据
// $id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$flag = $_POST['flag'];

//2.验证数据有效性
if(strlen($username)<1){
    alert("请输入用户名","admin_new.php");
    exit;
}

if(strlen($password)<1){
    alert("请输入密码","admin_new.php");
    exit;
}



//3.构造sql语句，将数据写入数据表，实现新增单页的功能
    $sql = "insert into admin(username,password,flag) values('$username','$password','$flag')";
    //mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

//4. 将执行结果显示出来
if($r){
    alert("新增管理员----新增成功","admin_list.php");
}else{
    echo "新增失败";
    echo mysqli_error($conn);
    // alert("友情链接----新增失败","flink_new.php");
}





?>
