<?php

class Sheep
{
    protected $name;
    protected $category;

    public function __construct(string $name, string $category = '大角羊')
    {
        $this->name = $name;
        $this->category = $category;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getCategory()
    {
        return $this->category;
    }

}

$original = new Sheep('John');
echo $original->getName();
echo '<br>';
echo $original->getCategory();
echo '<br>';


$cloned = $original;
$cloned->setName('Dot');
echo $cloned->getName();
echo '<br>';
echo $cloned->getCategory();
echo '<br>';

?>