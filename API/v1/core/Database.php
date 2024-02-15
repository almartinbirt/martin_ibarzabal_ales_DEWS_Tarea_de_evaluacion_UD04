<?php

ini_set('display_errors','On');

class Database{

    private $config = [];

    public static function loadConfig(){

        $json_file = file_get_contents('../conf/db-conf.json');
        $config    = json_decode($json_file,true);

        $db_host = $config['host'];
        $db_user = $config['user'];
        $db_pass = $config['password'];
        $db_bd   = $config['db_name'];

        echo 'Host: ' . $db_host . '<br>';  
        echo 'User: ' . $db_user . '<br>';  
        echo 'Password: ' . $db_pass . '<br>';  
        echo 'DB: ' . $db_bd   . '<br>';  

    }

}