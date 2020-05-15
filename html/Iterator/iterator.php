<?php

interface UsersAggregateInterface
{
    public function createIterator();
}

interface UserListIteratorInterface
{
    public function hasNext();

    public function next();
}

class UserListIterator implements UserListIteratorInterface
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

    public function next()
    {
        return $this->users[$this->position++];
    }
}

class UsersAggregate implements UsersAggregateInterface
{
    private $userList;

    function __construct($users)
    {
        $this->userList = $users;
    }

    public function addUsersList($user)
    {
        $this->userList[] = $user;
    }

    public function getUserList()
    {
        return $this->userList;
    }

    public function createIterator()
    {
        return new UserListIterator($this->userList);
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

$users = ["name1", "name2", "name3", "name4", "name5"];
$list = new RosterClient(new UsersAggregate($users));

echo $list->getUsers();

?>