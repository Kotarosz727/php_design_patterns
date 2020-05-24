<?php
//掲示板でコメントする処理とそれに付随して裏側で通知を行う処理をobserverにして分けて実装
interface Subjectinterface
{
    public function addObserver(ObserverInterface $listener);
    public function removeObserver(ObserverInterface $listner);
    public function notify();
}

class BulletinBoard implements Subjectinterface
{
    private $name;
    private $comments = [];
    private $listeners = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function comment($message)
    {
        echo sprintf('%s : %s<br>', $this->name, $message);
        $this->addComments($message);
    }

    public function addComments($message)
    {
        $this->comments = $message;
        $this->notify();
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function getName()
    {
        return $this->name;
    }

    public function addObserver(ObserverInterface $listener)
    {
        $this->listeners[get_class($listener)] = $listener;
    }

    public function removeObserver(ObserverInterface $listener)
    {
        unset($this->listeners[get_class($listener)]);
    }

    public function notify()
    {
        foreach ($this->listeners as $listener){
            $listener->execute($this);
        }
    }
}

interface ObserverInterface
{
    public function execute(BulletinBoard $board);
}

class LoggingLister implements ObserverInterface
{
    public function execute(BulletinBoard $board)
    {
        echo 'ログ書き込みを行いました。'.'<br>';
    }
}

class MailLister implements ObserverInterface
{
    public function execute(BulletinBoard $board)
    {
        echo 'メールの送信を行いました。'.'<br>';
    }
}

class SlackLister implements ObserverInterface
{
    public function execute(BulletinBoard $board)
    {
        echo 'slackへの書き込みを行いました。'.'<br>';
    }
}

$user1 = new BulletinBoard("Suzuki");

$user1->addObserver(new LoggingLister());
$user1->addObserver(new MailLister());
$user1->addObserver(new SlackLister());

$user1->comment("hi");
echo '<br>';
$user1->comment("hello");
echo '<br>';
$user1->comment("hola");
echo '<br>';

?>