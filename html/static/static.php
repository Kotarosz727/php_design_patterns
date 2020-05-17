<?php

abstract class Smartphone
{
    protected static $price;
    protected static $class = __CLASS__;
    
    
    public static function getPrice()
    {
        // return number_format(self::$price);
        return number_format(static::$price);
    }
    
    public static function getClass()
    {
        // return self::$class;
        return static::$class;
    }
}

class iPhone11 extends Smartphone
{
    protected static $price = 80000;
    protected static $class = __CLASS__;
}

class iPhone11Pro extends Smartphone
{
    protected static $price = 100000;
    protected static $class = __CLASS__;
}

echo iPhone11::getPrice()."\n";
echo iPhone11Pro::getPrice()."\n";

echo iPhone11::getClass()."\n";
echo iPhone11Pro::getClass()."\n";

?>