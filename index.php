<?php
require_once "log.class.php";
//获取配置
$config=json_decode(file_get_contents('config.json'),true);
$get_json=file_get_contents('php://input');
$json_arr=json_decode($get_json, true);

if (empty($json_arr['token'])) {
    exit('error request');
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

        $now_time=date('Y-m-d H:m:s');
        $log_content="【 $now_time 】：".$v['name']."拉取成功 \r\n 详细信息： $get_json \r\n ";
        Log::newLog($v['name'],$log_content);

    }
}