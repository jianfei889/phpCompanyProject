<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<style>
    button,input{
        margin-bottom: 15px;height: 50px; font-size: 23px;
    }

</style>

<body>
        <fieldset>
            <legend><h3>为方便进入操作，可快速输入用户名和密码。（测试用，正式项目可删除）</h3></legend>
            <p>后台管理员的用户名为：admin</p>
            <p>后台管理员的密码为：123456</p>
            <button id="set" >
                一键输入超级管理员账号密码
            </button>
        </fieldset>
  
    <br><br> 
	<form action="checklogin.php" method="post">
        <label for="username">用户名</label>
        <input type="text" name="username" id="username"><br/>
        <label for="password">密码</label>
        <input type="text" name="password" id="password"><br/>
        <input type="submit" value="登录" name="submit">
    </form>

<script>
    var set = document.getElementById("set")
    var username = document.getElementById("username")
    var password = document.getElementById("password")
    set.addEventListener('click',function(){
        username.value = "admin"
        password.value = "123456"
    })




</script>


</body>
</html>