<?php
    
    include('../conn/conn.php');

//1.接收数据
$productname = $_POST['productname'];
$pro_no = $_POST['pro_no'];
$cate_id = $_POST['cate_id'];
$content = $_POST['content'];
$img = $_FILES['img'];


if($img['name']){
    //截取最后的一个 . 和后面的内容，（获取后缀名）
    $ext = strrchr($img['name'],'.');
    //因为原本的额名字已经二进制，所以重新取名
    $filename = time().rand(100,999).$ext;
    //将图片从临时存储区域中移动到自己的文件夹中
    move_uploaded_file($img['tmp_name'],'../files/'.$filename);
}else{
    $filename='';
}



//3.构造sql语句，将数据操作入数据表，实现对应的sql功能
    $sql = "insert into product(productname,pro_no,cate_id,content,img) 
            values('$productname','$pro_no','$cate_id','$content','$filename')";
    //mysqli_query扩展函数，参数1：连接的数据库，参数2：执行的sql语句
    $r = mysqli_query($conn,$sql);//发去服务器执行。sql语句不返回结果集，只返回真假

    
//4. 将执行结果显示出来
if($r){
    alert("产品---新增成功","product_list.php");
}else{
    alert("产品---新增失败","product_new.php");
}



?>
