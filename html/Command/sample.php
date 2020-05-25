<?php
// receiver
class Bulb
{
    public function turnOn()
    {
        echo '電球がつきました';
    }

    public function turnOff()
    {
        echo '電球を消しました';
    }
}

interface Command
{
    public function execute();
    public function undo();
    public function redo();
}

class TurnOn implements Command
{
    protected $bulb;
    
    public function __construct(\Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOn();
    }

    public function undo()
    {
        $this->bilb->turnOff();
    }

    public function redo()
    {
        $this->execute();
    }
}

class turnOff implements Command
{
    protected $bulb;

    public function __construct(\Bulb $bulb)
    {
        $this->bulb = $bulb;
    }

    public function execute()
    {
        $this->bulb->turnOff();
    }

    public function undo()
    {
        $this->bulb->turnOff;
    }

    public function redo()
    {
        $this->execute();
    }
}
// Invoker
class RemoteControl
{
    public function submit(\Command $command)
    {
        $command->execute();
    }
}

$bulb = new Bulb();

$turnOn = new TurnOn($bulb);
$turnOff = new TurnOff($bulb);

$remote = new RemoteControl();
$remote->submit($turnOn);
$remote->submit($turnOff);

?>