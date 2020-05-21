<?php
//参考；https://techracho.bpsinc.jp/hachi8833/2017_10_17/46071#strategy
interface SortStrategy
{
    public function sort(array $dataset): array;
}

class BubbleSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "バブルソートを実行";

        //ここでソートする
        return $dataset;
    }
}

class QuickSortStrategy implements SortStrategy
{
    public function sort(array $dataset): array
    {
        echo "クイックソートを実行";

        //ここでソートする
        return $dataset;
    }
}

class Sorter
{
    protected $sorter;

    public function __construct(SortStrategy $sorter)
    {
        $this->sorter = $sorter;
    }

    public function sort(array $dataset): array
    {
        return $this->sorter->sort($dataset);
    }
}

$dataset = array(1,5,6,2,8);

$sorter = new Sorter(new BubbleSortStrategy());
$sorter->sort($dataset);

$sorter = new Sorter(new QuickSortStrategy());
$sorter->sort($dataset);
?>