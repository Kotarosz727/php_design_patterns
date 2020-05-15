<?php
//名前のみの名簿、名前＋年齢の名簿で分けるパターン
//ポイント;共通する処理をtraitでまとめる

interface UsersAggregateInterface
{
    public function createIterator();
}

interface UserListIteratorInterface
{
    public function hasNext();

    public function next();
}

trait SuperUserList
{
    private $users;
    private $position = 0;

    function __construct($users)
    {
        $this->users = $users;
    }

    public function hasNext()
    {
        return isset($this->users[$this->position]);
    }
}

class UserListNameIterator implements UserListIteratorInterface
{
    use SuperUserList;

    public function next()
    {
        return $this->users[$this->position++];
    }
}

class UserListIterator implements UserListIteratorInterface
{
    use SuperUserList;

    public function next()
    {
        $user = $this->users[$this->position++];
        return sprintf("%s (%s)", $user["name"], $user["age"]);
    }
}

trait SuperUsersAggregate
{
    private $userList;

    function __construct($users)
    {
        $this->userList = $users;
    }

    public function getUsetList()
    {
        return $this->userList;
    }

}

class UsersNameAggregate implements UsersAggregateInterface
{
    use SuperUsersAggregate;

    public function createIterator()
    {
        return new UserListNameIterator($this->userList);
    }
}

class RosterClient
{
    private $userIterator;

    function __construct(UsersAggregateInterface $user_list)
    {
        $this->userIterator = $user_list->createIterator();
    }

    function getUsers()
    {
        while($this->userIterator->hasNext()){
            $user = $this->userIterator->next();
            echo sprintf("%s", $user);
            echo "<br>";
        }
    }
}

$users_01 = ["name1", "name2", "name3", "name4", "name5"];
$users_02 = [
    ["name" => "name1", "age" => 20],
    ["name" => "name2", "age" => 21],
    ["name" => "name3", "age" => 22],
    ["name" => "name4", "age" => 23],
    ["name" => "name5", "age" => 24]
];

$list = new RosterClient(new UsersNameAggregate($users_01));

echo $list->getUsers();

?>