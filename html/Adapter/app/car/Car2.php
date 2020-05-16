<?php
//移譲を用いるパターン

interface GasolineEngineInterface
{
    public function gasolineOutput($ratio);
}

class GasolineCar implements gasolineEngineInterface
{
    public function gasolineOutput($ratio)
    {
        return sprintf("ガソリン: %d %%", $ratio);
    }

    public function running()
    {
        echo sprintf("出力: %s", $this->gasolineOutput(100));
    }
}

interface ElectricEngineInterface
{
    public function electricOutput($ratio);
}

//HybridCar(ガソリン車の機能を受け継ぎつつ（継承）、電気自動車の機能も搭載したい(interface))
class HybridCar implements ElectricEngineInterface
{
    // ガソリン車を移譲
    protected $gasolineCar;

    public function __construct()
    {
        $this->gasolineCar = new GasolineCar();
    }

    public function electricOutput($ratio)
    {
        return sprintf("電気: %d %%", $ratio);
    }

    public function running()
    {
        echo sprintf("出力 %s", $this->gasolineCar->gasolineOutput(50));
        echo sprintf("出力 %s", $this->electricOutput(50));
    }
}

//Hybrid
$hyblid_car = new HybridCar();
$hyblid_car->running();

?>