<?php

//获取git的url
$config_name=$_GET['config'];
if(!file_exists('./config'.$config_name.'config.php')){
    Log::errorLog("all","不存在项目: {$config_name}  \r\n ");//报错配置文件不存在
    exit();
}

if(!file_exists('./config'.$config_name.'.lock')){
    
}

require_once "log.class.php";
//获取配置
//$config=json_decode(file_get_contents('config.json'),true);
$get_json=file_get_contents('php://input');
$json_arr=json_decode($get_json, true);

//兼容gitosc
if(!$json_arr){
    $a=substr($get_json,5);
    $get_json=urldecode($a);
    $json_arr=json_decode($get_json,true);
    $json_arr['token']=$json_arr['password'];//gitosc采用的password
}

$now_time=date('Y-m-d H:m:s');
if (empty($json_arr['token'])) {
    Log::errorLog("all","不存在token  \r\n 详细信息：$get_json \r\n ");
    exit();
}
foreach ($config['__config__'] as $k => $v){
    if($json_arr['token']==$v['token']){
        $path=__DIR__ . '/../'.$v['path']; // 生产环境web目录

        $cmd="cd  $path  &&  git pull";
        $cmd_res=shell_exec($cmd);
        if(!$cmd_res){
            Log::errorLog($v['name'],"命令执行错误,执行的命令为： $cmd \r\n ");
            exit();
        }


        $log_content="【 $now_time 】：".$v['name']."拉取成功 \r\n 详细信息： $get_json \r\n ";
        Log::newLog($v['name'],$log_content);
        exit();
    }
}

Log::errorLog("all","没有与token {$json_arr['token']} 对应的配置文件 \r\n ");