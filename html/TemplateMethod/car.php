<?php
// スーパークラス
abstract class Car
{
    // 全サブクラス（全車種）で共通の処理
    public function handle($direction)
    {
        return sprintf("turn %s", $direction);
    }

    public function accelrator()
    {
        return "mone on";
    }

    public function brake()
    {
        return "stop";
    }
    // 全サブクラス（全車種）で共通の処理ではあるが内容は個々のサブクラスで異なるもの
    // abstractで宣言されているのでサブクラスで必ず宣言されなければならない
    protected abstract function type();
    protected abstract function engine();
    protected abstract function body();
    protected abstract function color(); 
}

class NormalCar extends Car
{
    public function type()
    {
        return "Normal";
    }
    public function engine()
    {
        return "normal engine";
    }
    public function body()
    {
        return "Basic";
    }
    public function color()
    {
        return "White";
    } 
}

class SportsCar extends Car
{
    public function type()
    {
        return "sports";
    }
    public function engine()
    {
        return "sports engine";
    }
    public function body()
    {
        return "Sport";
    }
    public function color()
    {
        return "Red";
    } 
    public function wing()
    {
        return 'wing';
    }
}

class LuxuryCar extends Car
{
    public function type()
    {
        return "luxury";
    }
    public function engine()
    {
        return "high engine";
    }
    public function body()
    {
        return "metal";
    }
    public function color()
    {
        return "black";
    }
    public function sunroof()
    {
        return 'sunroof';
    }
}

$normal = new NormalCar();
echo $normal->type()."<br>";
echo $normal->engine()."<br>";
echo $normal->handle("right")."<br>";
echo $normal->color()."<br><br>";

$sports = new SportsCar();
echo $sports->type()."<br>";
echo $sports->engine()."<br>";
echo $sports->brake()."<br>";
echo $sports->color()."<br>";
echo $sports->wing()."<br><br>";

$luxury = new LuxuryCar();
echo $luxury->type()."<br>";
echo $luxury->engine()."<br>";
echo $luxury->accelrator()."<br>";
echo $luxury->color()."<br>";
echo $luxury->sunroof()."<br><br>";

?>