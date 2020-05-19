<?php
// product
class Frameworks
{
    Private $id;
    Private $name;
    Private $category;

    public function __construct($id, $name, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategory()
    {
        return $this->category;
    }
}

//director
class FrameworksDirector
{
    private $builder;
    private $json;

    public function __construct(FrameworksBuilder $builder, $json)
    {
        $this->builder = $builder;
        $this->json = $json;
    }

    public function getFrameWorks()
    {
        $list = $this->builder->parse($this->json);
        return $list;
    }
}

interface FrameworksInterface
{
    public function parse($data);
}

class FrameworksBuilder implements FrameworksInterface
{
    public function parse($json_path)
    {
        if(empty($json_path)||!file_exists($json_path))
        {
            throw new Exception("ファイルがありませんでした");
        }

        $data = $this->convert($json_path);

        $list = array();

        foreach($data as $d){
            $list[] = new Frameworks(
                $d->id,
                $d->name,
                $d->category
            );
        }
        return $list;
    }

    private function convert($json_path)
    {
        return json_decode(file_get_contents($json_path));
    }
}

$builder = new FrameworksBuilder();
$json_path = "sample.json";

$director = new FrameworksDirector($builder, $json_path);

$data = $director->getFrameWorks();

foreach ($data as $d){
    echo sprintf(
        '<li>%s：%s [%s]</li>',
        $d->getId(),
        $d->getName(),
        $d->getCategory()
    );
}


?>