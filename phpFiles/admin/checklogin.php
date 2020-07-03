<?php
    session_start();
    // include ("../conn/conn.php");
    require_once('../conn/conn.php');


    //1. 读取表单用户名和密码,接收数据
    $username=$_POST['username'];
    $password=$_POST['password'];

if(strlen($username)<1){
    echo "用户名不能为空","<br>"; exit;
}
 

 if(strlen($password)<6){
    echo "密码 长度不能小于6位","<br>";
    exit;
}

echo "数据已经正常提交","<br>";

//2.写sql语句
$sql="select * from admin where username = '$username'and password='$password'";
$rs=mysqli_query($conn,$sql);//$rs=结果集

if($row = mysqli_fetch_assoc($rs)){
    //如果能提取则登录成功
    $_SESSION['username'] = $row['username'];
    $_SESSION['userid'] = $row['id'];
    $_SESSION['flag'] = $row['flag']==1?"超级管理员":"普通管理员";
    header("location:index.php");
}else{
    //否则失败
    echo "登陆失败，用户名/密码错误";
}










