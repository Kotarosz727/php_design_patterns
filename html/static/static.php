<?php

abstract class Smartphone
{
    protected static $class = __CLASS__;
    protected static $price;
    
    public static function getClass()
    {
        // return self::$class;
        return static::$class;
    }

    public static function getPrice()
    {
        // return number_format(self::$price);
        return number_format(static::$price);
    }
    
}

class iPhone11 extends Smartphone
{
    protected static $class = __CLASS__;
    protected static $price = 80000;
}

class iPhone11Pro extends Smartphone
{
    protected static $class = __CLASS__;
    protected static $price = 100000;
}

echo iPhone11::getPrice()."\n";
echo iPhone11Pro::getPrice()."\n";

echo iPhone11::getClass()."\n";
echo iPhone11Pro::getClass()."\n";

?>