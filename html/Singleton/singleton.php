<?php

class Singleton
{
    private static $instance;
    private $id;

    //privateにし、クライアント側でインスタンス生成を制限
    private function __construct()
    {
        $this->id = hash("sha256", time());
    }

    public static function getInstance()
    {
        if(empty(self::$instance)){
           self::$instance = new Singleton();
        }
        return self::$instance;
    }

    public function getId()
    {
        return $this->id;
    }

    public final function __clone()
    {
        throw new \Exception("This Instance is not clone.");
    }
    
    public final function __wakeup()
    {
        throw new \Exception("This Instance is not unserialize");
    } 
    
}

$singleton = Singleton::getInstance();
echo $singleton->getId();
echo "<br>";

//同じインスタンスが戻ってくる
$singleton2 = Singleton::getInstance();
echo $singleton2->getId();

?>