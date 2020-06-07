<?php

class Burger
{
    protected $size;

    protected $cheeze = false; 
    protected $pepperoni = false; 
    protected $lettuce = false; 
    protected $tomato = false;
    
    public function __construct(\BurgerBuilder $builder)
    {
        $this->size = $builder->size;
        $this->cheeze = $builder->cheeze;
        $this->pepperoni = $builder->pepperoni;
        $this->lettus = $builder->lettuce;
        $this->tomato = $builder->tomato;
    }
}

class BurgerBuilder
{
    public $size;

    public $cheeze = false; 
    public $pepperoni = false; 
    public $lettuce = false; 
    public $tomato = false;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function addCheeze()
    {
        $this->cheeze = true;
        return $this;
    }

    public function addPepperoni()
    {
        $this->pepperoni = true;
        return $this;
    }

    public function addLettuce()
    {
        $this->lettuce = true;
        return $this;
    }

    public function addTomato()
    {
        $this->tomato = true;
        return $this;
    }

    public function build()
    {
        return new Burger($this);
    }
    
}

$burger = (new BurgerBuilder(14))
            ->addPepperoni()
            ->addLettuce()
            ->addTomato()
            ->build();
?>