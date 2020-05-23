<?php

class Computer 
{
    public function getElectricShock()
    {
        echo "ビリビリ！";
    }

    public function makeSound()
    {
        echo "ピッ！ポッ！";
    }

    public function showLoadingScreen()
    {
        echo "読み込み中...";
    }

    public function bam()
    {
        echo "準備ができました！";
    }

    public function closeEverything()
    {
        echo "ビーッ！ビーッ！ビビビビビ！";
    }

    public function sooth()
    {
        echo "（シーン）";
    }

    public function pullCurrent()
    {
        echo "プシューッ!";
    }
}

class ComputerFacade
{
    protected $computer;

    public function __construct(\Computer $computer)
    {
        $this->computer = $computer;
    }

    public function turnOn()
    {
        $this->computer->getElectricShock();
        $this->computer->makeSound();
        $this->computer->showLoadingScreen();
        $this->computer->bam();
    }

    public function turnOff()
    {
        $this->computer->closeEverything();
        $this->computer->pullCurrent();
        $this->computer->sooth();
    }
}

$computer = new ComputerFacade(new Computer());
$computer->turnOn();
$computer->turnOff();

?>