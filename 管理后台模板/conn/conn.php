<?php   
    header("Content-Type:text/html;charset=utf-8");

    // $conn = @mysqli_connect('localhost','root','root','web2') or die("连接失败'") ;

    //1、建立数据库连接
    $conn = @mysqli_connect('localhost','root','root','web2');
        //如果$dbconnection变量是null，则表明数据库连接不成功。php中“null”在逻辑判断中被认为是false
        //如果不是“null”，则被认为是true
        if($conn){
            echo '数据库连接成功（测试用）',"<br>";
        }else{
            echo '连接失败',"<br>";
        }
    mysqli_query($conn,"set names utf8") ;



    //弹出提示框，跳转
    function alert($str,$url){
        echo '<script>window.alert(" '.$str.' ");location.href=" '.$url.' ";</script>';
    }

   



