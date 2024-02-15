<?php

ini_set('display_errors','On');

class DatabaseSingleton{

    private static $instance;
    private $connection;

    private $config = [];

    private function __construct(){
        $this->loadconfig();
        $this->connection = new PDO(
            "mysql:host={$this->config['host']};dbname={$this->config['db_name']}",
            $this->config['user'],
            $this->config['password']
        );
    }

    public  function loadConfig(){
        $json_file = file_get_contents('../conf/db-conf.json');
        $this->config    = json_decode($json_file,true);
    }

    public static function getInstance(){
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    } 

    public function getConnection(){
        return $this->connection;
    }

}