<?php

interface Door
{
    public function open();
    public function close();
}

class LabDoor implements Door
{
    public function open()
    {
        echo "研究室のドアを開く";
    }

    public function close()
    {
        echo "研究室のドアを閉じる";
    }
}

//ドアをセキュアにするproxyを記述
class Security 
{
    protected $door;

    public function __construct(\Door $door)
    {
        $this->door = $door;
    }

    public function open($password)
    {
        if($this->authencate($password)){
            $this->door->open;
        }else{
            echo "開けられません。";
        }
    }

    public function authencate($password)
    {
        return $password === "hhhhh";
    }

    public function close()
    {
        $this->door->close();
    }
}

$door = new Security(new LabDoor());
$door->open("wrong");

echo '<br>';

$door = new LabDoor();
$door->open();

?>