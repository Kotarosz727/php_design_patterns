<?php

interface Animal
{
    public function accept(AnimalOperation $operation);
}

interface AnimalOperation
{
    public function visitMonkey(Monkey $monkey);
    public function visitLion(Lion $lion);
    public function visitDolphin(Dolphin $dolphin);
}

class Monkey implements Animal
{
    public function shout()
    {
        echo 'ウキャッ、キャッ';
    }
    
    public function accept(\AnimalOperation $operation)
    {
        $operation->visitMonkey($this);
    }
}

class Lion implements Animal
{
    public function roar()
    {
        echo 'ガオォオオ';
    }
    
    public function accept(\AnimalOperation $operation)
    {
        $operation->visitLion($this);
    }
}

class Dolphin implements Animal
{
    public function speak()
    {
        echo 'キキキ、キキキ';
    }
    
    public function accept(\AnimalOperation $operation)
    {
        $operation->visitDolphin($this);
    }
}

class Speak implements AnimalOperation
{
    public function visitMonkey(\Monkey $monkey)
    {
        $monkey->shout();
    }
    
    public function visitLion(\Lion $lion)
    {
        $lion->roar();
    }

    public function visitDolphin(\Dolphin $dolphin)
    {
        $dolphin->speak();
    }
}

class Jump implements AnimalOperation
{
    public function visitMonkey(\Monkey $monkey)
    {
        echo "jump";
    }

    public function visitLion(\Lion $lion)
    {
        echo "low jump";
    }

    public function visitDolphin(\Dolphin $dolphin)
    {
        echo "high jump";
    }
}

$monkey = new Monkey();
$lion = new Lion();
$dolphin = new dolphin();

$speak = new speak();

$monkey->accept($speak);
echo "<br>";
$lion->accept($speak);
echo "<br>";
$dolphin->accept($speak);
echo "<br>";

$jump = new Jump();
$monkey->accept($jump);
echo "<br>";
$lion->accept($jump);
echo "<br>";
$dolphin->accept($jump);
echo "<br>";





?>