# php-webhook

### config.json 配置文件

```json
{
  "user":"www-data", //用户
  "userGroup":"www-data", //用户组
  "__config__":[
    {
      "path":"default", //网站文件目录，目前默认和hook文件同级
      "token":"test", //token 和在webhook填写的token相同，不能为空
      "name":"test" //项目名称
    },
    ......
  ]
}
```

### 使用的详细方法
[php-webhook:利用php脚本自动化部署git项目](http://lxl520.com/index.php/archives/38/)