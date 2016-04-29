# php-webhook

### 版本
`0.1`

### 兼容
- 目前测试通过Coding、gitosc其他暂未测试

### config.json 配置文件
> 请先将config.example.json重命名为config.json

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

### 日志文件

```
//日志文件目录结构
|---hook
|------log
|---------error                   //错误日志
|------------all                  //通用错误文件夹
|------------project              //项目名命名的文件夹
|---------------2016-04.log       //每一个月一个log文件
|---------success                 //成功日志
|------------project              //项目名命名的文件夹
|---------------2016-04.log       //每一个月一个log文件
```

### 使用的详细方法
[php-webhook:利用php脚本自动化部署git项目](http://lxl520.com/index.php/archives/38/)