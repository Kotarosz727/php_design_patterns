<?php

interface Coffee
{
    public function getCost();
    public function getDiscription();
}

class SimpleCoffee implements Coffee
{
    public function getCost()
    {
        return 10; 
    }

    public function getDiscription()
    {
        return "Simple coffee";
    }
}

class MilkCoffee implements Coffee
{
    protected $coffee;

    public function __construct($coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost()
    {
        return $this->coffee->getCost() + 2;
    }

    public function getDiscription()
    {
        return $this->coffee->getDiscription() . ", milk";
    }
}

class WhipCoffee implements Coffee
{
    protected $coffee;

    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost()
    {
        return $this->coffee->getCost() + 5;
    }

    public function getDiscription()
    {
        return $this->coffee->getDiscription() . ", whip";
    }
}

class VanillaCoffee implements Coffee
{
    protected $coffee;

    public function __construct(Coffee $coffee)
    {
        $this->coffee = $coffee;
    }

    public function getCost()
    {
        return $this->coffee->getCost() + 3;
    }

    public function getDiscription()
    {
        return $this->coffee->getDiscription() . ", Vanilla";
    }
}

// $someCoffee = new SimpleCoffee();
// echo $someCoffee->getCost();
// echo $someCoffee->getDiscription();
// echo "<br>";

$someCoffee = new MilkCoffee(new SimpleCoffee());
echo $someCoffee->getCost();
echo $someCoffee->getDiscription();
echo "<br>";

$someCoffee = new WhipCoffee($someCoffee);
echo $someCoffee->getCost();
echo $someCoffee->getDiscription();
echo "<br>";

$someCoffee = new VanillaCoffee($someCoffee);
echo $someCoffee->getCost();
echo $someCoffee->getDiscription();
echo "<br>";

?>