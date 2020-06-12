<?php
    
    include('../conn/conn.php');

//1.接收数据
$catename = $_POST['catename'];
$module = $_POST['module'];
$orderno = $_POST['orderno'];




//3.构造sql语句，将数据操作入数据表，实现对应的sql功能
    $sql="insert into category(catename,orderno,module)values('$catename',$orderno,'$module')";
    

    //mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假
    

//4. 将执行结果显示出来
if($r){
    alert("分类页--新增成功","cate_list.php");
}else{
    alert("分类页--新增失败","cate_new.php");
}



?>
