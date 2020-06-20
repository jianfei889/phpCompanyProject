<?php

    include("../conn/conn.php");

//后台处理数据的四个步骤

    //1.接收数据
$id = $_GET['id'];

//2.验证数据有效性
if(!is_numeric($id)){//如果不是数字
    alert("id值不是一个数字","page_list.php");
    exit;
}

//读取图片名称
    $sql = "select * from product where id=$id";
    $rs = mysqli_query($conn,$sql);
    if($row=mysqli_fetch_assoc($rs)){
        $img = $row['img'];
    }else{
        echo "要删除的图片不存在";
        exit;
    }



//3.构造sql语句，实现删除功能
    $sql = "delete from product where id=$id ";
    $r = mysqli_query($conn,$sql);//发送服务器执行

//4. 将执行结果显示出来
if($r){
    if(strlen($img)>0){
        unlink('../files/'.$img);
    }

    alert("删除成功","product_list.php");
}else{
    echo "删除失败";
    echo mysqli_error($conn);
    // alert("删除失败","page_list.php");
}
















?>