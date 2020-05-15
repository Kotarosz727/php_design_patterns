<?php

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

class ElectricCar implements ElectricEngineInterface
{
    public function electricOutput($ratio)
    {
        return sprintf("電気: %d %%", $ratio);
    }

    public function running()
    {
        echo sprintf("出力: %s", $this->electricOutput(100));
    }
}

interface ElectricEngineInterface
{
    public function electricOutput($ratio);
}

//HybridCar(ガソリン車の機能を受け継ぎつつ（継承）、電気自動車の機能も搭載したい(interface))
class HybridCar extends GasolineCar implements ElectricEngineInterface
{
    public function electricOutput($ratio)
    {
        return sprintf("電気: %d %%", $ratio);
    }

    public function running()
    {
        echo sprintf("出力 %s", $this->gasolineOutput(60));
        echo sprintf("出力 %s", $this->electricOutput(40));
    }
}

//gasoline
$gasoline_car = new GasolineCar();
$gasoline_car->running();

//electric
$electric_car = new ElectricCar();
$electric_car->running();

//Hybrid
$hyblid_car = new HybridCar();
$hyblid_car->running();

?>