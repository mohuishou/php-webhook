<?php
/**
 * 日志类
 * Created by mohuishou<1@lailin.xyz>.
 * User: mohuishou<1@lailin.xyz>
 * Date: 2016/4/27 0027
 * Time: 14:06
 */
date_default_timezone_set('Asia/Chongqing');
class Log{

    public static function newLog($project_name,$content=null,$file_name=null){
        $now=date('Y-m');
        if($file_name==null) $file_name=$now;
        $path="./log/success/$project_name/$file_name.log";
        if(!is_dir(dirname($path))){
            mkdir(dirname($path), 0777,true); //目录不存在创建目录
        }
        $file = fopen($path, "a");
        $now_time=date('Y-m-d H:m:s');
        if($content==null) $content="【 $now_time 】：$project_name 拉取成功 \r\n";
        fwrite($file, $content);
        fclose($file);
    }


    public static function errorLog($project_name,$content,$file_name=null){
        $now=date('Y-m');
        if($file_name==null) $file_name=$now;
        $path="./log/error/$project_name/$file_name.log";
        if(!is_dir(dirname($path))){
            mkdir(dirname($path), 0777,true); //目录不存在创建目录
        }
        $file = fopen($path, "a");
        $now_time=date('Y-m-d H:m:s');
        fwrite($file,"【 $now_time 】:" . $content);
        fclose($file);
    }


}