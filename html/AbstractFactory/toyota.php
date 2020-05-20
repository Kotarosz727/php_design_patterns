<?php

require_once("interface.php");

class ToyotaFactory implements FactoryInterface
{
    public function engine()
    {
        return new ToyotaEngine();
    }

    public function tire()
    {
        return new ToyotaTire();
    }

    public function handle()
    {
        return new ToyotaHandle();
    }
}
class ToyotaEngine implements EngineInterface
{
    protected $json;

    public function __construct()
    {
        $this->json = "engine_parts.json";
    }
    //jsonファイルデータを配列のかたちでインスタンス化
    public function partList()
    {
        $part_map = json_decode(file_get_contents($this->json));

        $parts_list = [];
        foreach($part_map as $parts){
            if($parts->model === "Toyota"){
                //配列をインスタンス化
                $parts_list[] = new EngineItem($parts->id, $parts->name, $parts->model);
            }
        }
        return $parts_list;
    }
    // Engineクラスのプロバティの値を<li></li>に格納
    public function assembly(){
        $list = "";
        foreach($this->partList as $parts){
            $list .= sprintf(
                "<li>Parts-No.%d %s | Target Model - %s</li>",
                $parts->getId(), $parts->getName(), $parts->getModel()
            );
        }
        return $list;
    }

    public function add()
    {
        echo "<h2>Engine</h2>";
        echo "<ul>";
        echo $this->assembly;
        echo "<ul>";
    }
}

class ToyotaTire implements TireInterface
{
    protected $json;

    public function __construct()
    {
        $this->json = "Tire_parts.json";
    }

    public function partList()
    {
        $part_map = json_decode(file_get_contents($this->json));

        $parts_list = [];
        foreach($part_map as $parts){
            if($parts->model === "Toyota"){
                $parts_list[] = new TireItem($parts->id, $parts->name, $parts->model);
            }
        }
        return $parts_list;
    }

    public function assembly(){
        $list = "";
        foreach($this->partList as $parts){
            $list .= sprintf(
                "<li>Parts-No.%d %s | Target Model - %s</li>",
                $parts->getId(), $parts->getName(), $parts->getModel()
            );
        }
        return $list;
    }

    public function add()
    {
        echo "<h2>Tire</h2>";
        echo "<ul>";
        echo $this->assembly;
        echo "<ul>";
    }
}
class ToyotaHandle implements HandleInterface
{
    protected $json;

    public function __construct()
    {
        $this->json = "Handle_parts.json";
    }

    public function partList()
    {
        $part_map = json_decode(file_get_contents($this->json));

        $parts_list = [];
        foreach($part_map as $parts){
            if($parts->model === "Toyota"){
                $parts_list[] = new HandleItem($parts->id, $parts->name, $parts->model);
            }
        }
        return $parts_list;
    }

    public function assembly(){
        $list = "";
        foreach($this->partList as $parts){
            $list .= sprintf(
                "<li>Parts-No.%d %s | Target Model - %s</li>",
                $parts->getId(), $parts->getName(), $parts->getModel()
            );
        }
        return $list;
    }

    public function add()
    {
        echo "<h2>Handle</h2>";
        echo "<ul>";
        echo $this->assembly;
        echo "<ul>";
    }
}

class EngineItem
{
    private $id; 
    private $name;
    private $model;

    public function __construct($id, $name, $model)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getModel()
    {
        return $this->model;
    }
}

class TireItem
{
    private $id; 
    private $name;
    private $model;

    public function __construct($id, $name, $model)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getModel()
    {
        return $this->model;
    }
}

class HandleItem
{
    private $id; 
    private $name;
    private $model;

    public function __construct($id, $name, $model)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getModel()
    {
        return $this->model;
    }
}

?>