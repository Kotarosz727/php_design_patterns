<?php

abstract class MenuPrototype
{
    private $menu_code;
    private $name;
    private $price;
    private $category;
    private $comments;

    public function __construct($menu_code, $name, $price, $category, $comments)
    {
        $this->menu_code = $menu_code;
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
        $this->commants = $comments;
    }

    public function getMenucode()
    {
        return $this->menu_code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getComments()
    {
        return $this->comments;
    }

    //$commentをオブジェクト型で保存
    public function setComments(\stdClass $comment)
    {
        $this->comments = $comment;
    }

    public function changeComment($idx, $comment)
    {
        $this->comments->comment[$idx] = $comment;
    }

    private function getData()
    {
        return [
            "name"=>$this->getName(),
            "price"=>$this->getPrice(),
            "category"=>$this->getCategory(),
            "comments"=>$this->getComments()
        ];
    }

    public function display()
    {
        $data = $this->getData();

        $html = '';
        $html .= '<ul>';
        $html .= $this->getHtmlList($data['name']);
        $html .= $this->getHtmlList($data['price']);
        $html .= $this->getHtmlList($data['category']);
        $html .= '<li><ul>';
        foreach($data["comments"]->comment as $comment){
            $html .= $this->getHtmlList($comment["comment"]); 
        }
        $html .= '</li></ul>';
        $html .= '</ul>';

        return $html;
    }

    private function getHtmlList($value)
    {
        return sprintf("<li>%s</li>", $value);
    }

    // 自身のインスタンスをcloneして返す
    public function newInstance()
    {
        return clone $this;
    }

    protected abstract function __clone();

}

class DeepCopyMenu extends MenuPrototype
{
    // __clone()メソッドで保持しているオブジェクトをcloneしセット
    protected function __clone()
    {
        $this->setComments(clone $this->getComments());
    }
}


class ShallowCopyMenu extends MenuPrototype
{
    // シャローコピーなのでメソッドの宣言のみ
    protected function __clone(){}
}

class MenuManager
{
    private $menus;

    public function __construct()
    {
        $this->menus = array();
    }

    public function register(MenuPrototype $menuPrototype)
    {
        $this->menus[$menuPrototype->getMenucode()] = $menuPrototype;
    }

    public function create($menu_code)
    {
        if(!array_key_exists($menu_code, $this->menus)){
            throw new Exception(sprintf("要求されたメニュー番号 %s は存在しません", $menu_code));
        }

        return $this->menus[$menu_code]->newInstance();
    }
}

function executeCopy(MenuManager $manager, $menu_code){

    //インスタンス生成
    $menu1 = $manager->create($menu_code);//original
    $menu2 = $manager->create($menu_code);//copy

    $menu1->changeComment(1, ["date"=>"2018-06-27", "comment"=>"大盛りサービスは終了しました"]);
    
    echo $menu1->display();
    echo $menu2->display();
}

$manager = new MenuManager();

$menu = new DeepCopyMenu("P0004", "ミートソース", 9999, "パスタ", "");
$comments = new \stdClass();
$comments->comment[]=[
    "data"=>"2018-06-02",
    "comment"=>"イタリアのトマトたっぷり"
];
$menu->setComments($comments);
$manager->register($menu); 

executeCopy($manager, "P0004");
executeCopy($manager, "P0002");

?>