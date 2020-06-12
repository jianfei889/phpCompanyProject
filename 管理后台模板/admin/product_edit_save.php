<?php
    
include('../conn/conn.php');

//1.接收数据
$id = $_POST['id'];
$productname = $_POST['productname'];
$content = $_POST['content'];
$cate_id = $_POST['cate_id'];
$pro_no = $_POST['pro_no'];
$img = $_FILES['img'];


if($img['name']){
    //截取最后的一个 . 和后面的内容，（获取后缀名）
        $ext = strrchr($img['name'],'.');
        //因为原本的额名字已经二进制，所以重新取名
        $filename = time().rand(100,999).$ext;
        //将图片从临时存储区域中移动到自己的文件夹中
        move_uploaded_file($img['tmp_name'],'../files/'.$filename);
        // $oldimg = $_POST['oldimg'];
        // if(strlen($oldimg)>1){ unlink('../files/'.$oldimg);}

    }else{
        $filename=$_POST['oldimg'];
    }



//3.构造sql语句，将数据操作入数据表，实现对应的sql功能
    $sql = "update product set productname='$productname',cate_id='$cate_id',content='$content',img='$filename' where id=$id";

    // mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

    
//4. 将执行结果显示出来
if($r){
    alert("产品修改--成功","product_list.php");
}else{
    alert("产品修改--失败","product_edit.php");
}



?>
