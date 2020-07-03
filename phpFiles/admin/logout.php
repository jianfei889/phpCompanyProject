<?php


include("../conn/conn.php");
//session_start();
// $_SESSION=array();//清除


if(!session_id()) session_start();

//删除session变量需要两个操作：
//1、清空session数组；
//2、删除跟session相关的id（在调用session_start()函数时，会话id会被创建）

if(isset($_SESSION['userid'])==true){
    $_SESSION =array();
    
    // if(isset($_COOKIE['user_id'])==true){}
    setcookie('userid','',time()-3600); 
    setcookie('username','',time()-3600);
    setcookie('expiretime','',time()-3600);
     //擅长保存session ID的cookie
    setcookie(session_name(),'',time()-3600);

    session_destroy();
}

$home_url='http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login.php';

//让用户重定向到登录页面或首页
if($is_expiretime){
    include('assets/util.php');
    alert($is_expiretime,$home_url);
}else{
    header("Location: ".$home_url);
}

?>
