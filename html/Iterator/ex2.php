<?php

//課題；userクラスに年齢を追加したい
//下記の実装では、追加したい項目が増えるたびにクラスに変更を加得る必要があり大規模になればなるほどその作業は煩雑になり、バグの原因にもなる

/** 
 * user クラス
*/
class User
{
    protected $name;
    protected $age;

    function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    function getName()
    {
        return $this->name;
    }

    function getAge()
    {
        return $this->age();
    }
}

/**
 * 名簿クラス
 */
class Roster
{
    protected $userList = [];

    public function setUserList($user)
    {
        $this->userList[] = $user;
    }

    public function getUserList()
    {
        return $this->userList;
    }
}

$roster = new Roster();
$roster->setUserList(new User("name1", 21));
$roster->setUserList(new User("name2", 22));
$roster->setUserList(new User("name3", 23));
$roster->setUserList(new User("name4", 24));

foreach($roster->getUserList() as $user){
    echo $user->getName();
    echo "\n";
    echo $user->getAge();
    echo "\n";
}

?>