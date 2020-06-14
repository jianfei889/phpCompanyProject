# blog代码解释

## 文件下载
  1. ```npm init -y```
  2. ``` npm i express mongoose art-template express-art-template```


### 管理员账号问题
  1. 在做管理员列表时不能把管理员账号全部删除，必须留有最少一个的管理员账号
      因为删除完了就不能登录管理员系统了。
### 安全性问题
  1. ```$id=$_GET['id'];```
      这段代码在项目上线会存在安全性问题，正式上线需要配置加密功能
  2. 











































