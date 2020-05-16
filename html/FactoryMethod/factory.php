<?php

interface DataReaderInterface
{
    // jsonデータの変換
    public function convert($json_url);
    // 取り込んだデータを表示
    public function show();
}

// パターンA、1つのJSONfileを処理するケース
class BulkDataReader implements DataReaderInterface
{
    protected $data;

    // jsonfileをコンバートし$dataに渡す
    public function __construct($json)
    {
        $this->data = $this->convert($json);
    }

    public function convert($json_url)
    {
        return json_decode(file_get_contents($json_url));
    }

    public function show()
    {
        foreach($this->data as $d){
            echo $d->name."<br>";
            foreach($d->prefecture as $pre){
                echo $pre->name."<br>";
            }
        }
    }
}

class SplitDataReader implements DataReaderInterface
{
    protected $regions;
    protected $prefecture;

    public function __construct($json_array)
    {
        $this->regions = $this->convert($json_array[0]);
        $this->prefecture = $this->convert($json_array[1]);
    }

    public function convert($json_url)
    {
        return json_decode(file_get_contents($json_url));
    }

    public function show()
    {
        foreach ($this->regions as $r){
            echo $r->name."<br>";
            $region_id = $r->id;
            foreach($this->prefecture->$region_id as $p){
                echo ($p->name);
            }
            echo "<br><br>";
        }
    }
}

class ReaderFactory
{
    public function create($json)
    {
        return $this->createReader($json);
    }

    public function createReader($json)
    {
        if(is_array($json)){
            return new SplitDataReader($json);
        }else{
            return new BulkDataReader($json);
        }
    }
}

$factory = new ReaderFactory();

// パターンA
// $json = "./file/japan.json";
// $pattern_a = $factory->create($json);
// $pattern_a->show();

// パターンB
$json_array[] = "./file/region.json";
$json_array[] = "./file/prefecture.json";
$pattern_b = $factory->create($json_array);
// var_dump($pattern_b);exit;
$pattern_b->show(); 

?>