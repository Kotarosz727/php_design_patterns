<?php

interface Lion
{
    public function roar();
}

class AfricanLion implements Lion
{
    public function roar()
    {}
}

class AsianLion implements Lion
{
    public function roar()
    {}  
}

class Hunter
{
    public function hunt(Lion $lion){}
}

//hunterはdogも狩れる様にしなければならない
class WildDog
{
    public function bark()
    {}
}

//adopterを設けLion interfaceをdogにラップしhunter classで使用できるようにする
class AdopterDog implements Lion
{
    protected $dog;
    
    public function __construct(Wilddog $dog)
    {
        $this->dog = $dog;
    }

    public function roar()
    {
        $this->dog->bark();
    }
}

$wildDog = new WildDog();
$wildDogAdopter = new AdopterDog($wildDog);

$hunter = new Hunter();
$hunter->hunt($wildDogAdopter);

?>