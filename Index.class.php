<?php
/**
 * Created by mohuishou<1@lailin.xyz>.
 * User: mohuishou<1@lailin.xyz>
 * Date: 2016/5/1 0001
 * Time: 0:50
 */
namespace Hook;
class Index{


    public function projectInit(){

        /*------获取www用户以及用户组-------*/
        $www_user=shell_exec('whoami');//www-data
        $www_group=shell_exec("groups $www_user ");//www-data:www-data

//        echo shell_exec("mkdir /var/www/.ssh");
        echo shell_exec("ssh-keygen -t rsa && \n && \n && \n && \n ");
//        shell_exec("mkdir /var/www/.ssh");
    }
}

$test=new Index();
$test->projectInit();