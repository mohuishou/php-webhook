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

    /**
     * 新建一个日志
     * @author mohuishou<1@lailin.xyz>
     * @param $project_name 项目名称
     * @param null $content 日志内容
     * @param null $file_name 文件名称
     */
    public static function newLog($project_name,$content=null,$file_name=null){
        $now=date('Y-m');
        if($file_name==null) $file_name=$now;
        $path="./log/success/$project_name/$file_name.log";
        if(!is_dir(dirname($path))){
            mkdir(dirname($path), 0777,true); //目录不存在创建目录
        }
        $file = fopen($path, "a");
        $now_time=date('Y-m-d H:i:s');
        if($content==null) $content="【 $now_time 】：$project_name 拉取成功 \r\n";
        fwrite($file, $content);
        fclose($file);
    }


    /**
     * 新建一个错误日志
     * @author mohuishou<1@lailin.xyz>
     * @param $project_name 项目名称
     * @param null $content 日志内容
     * @param null $file_name 文件名称
     */
    public static function errorLog($project_name,$content,$file_name=null){
        $now=date('Y-m');
        if($file_name==null) $file_name=$now;
        $path="./log/error/$project_name/$file_name.log";
        if(!is_dir(dirname($path))){
            mkdir(dirname($path), 0777,true); //目录不存在创建目录
        }
        $file = fopen($path, "a");
        $now_time=date('Y-m-d H:i:s');
        fwrite($file,"【 $now_time 】:" . $content);
        fclose($file);
    }


}