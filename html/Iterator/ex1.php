<?php
/** 
 * user クラス
*/
class User
{
    protected $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
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
$roster->setUserList(new User("name1"));
$roster->setUserList(new User("name2"));
$roster->setUserList(new User("name3"));
$roster->setUserList(new User("name4"));

foreach($roster->getUserList() as $user){
    echo $user->getName();
    echo "\n";
}



?>