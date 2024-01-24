<?php

class Db{
    private static $instance;
    private $pdo;

    private function __construct(){

    }

    private function __clone(){

    }

    public static function getInstance(){
        if (!self::$instance){
            self::$instance = new  self();
        }

        return self::$instance;
    }

    private function connect(){
        if (!$this->pdo){
            $this->pdo = new PDO("mysql:host=localhost;dbname=homework3-1", 'root', 'root');
        }

        return  $this->pdo;
    }

    public function exec (string $query, array $params = [], string $method = ''){
        $this->connect();
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);

        if (!$ret){
            if ($query->errorCode()){
                trigger_error($query->errorInfo());
            }
            return false;
        }

        return $query->rowCount();
    }

    public function fetchAll (string $query, array $params = [], string $method = ''){
        $this->connect();
        $query = $this->pdo->prepare($query);
        $ret = $query->execute($params);

        if (!$ret){
            if ($query->errorCode()){
                trigger_error($query->errorInfo());
            }
            return false;
        }

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function lastInsertId(){
        $this->connect();
        return $this->pdo->lastInsertId();
    }

}

?>