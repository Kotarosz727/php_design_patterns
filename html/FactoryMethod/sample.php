<?php

interface Interviewer
{
    public function askQuestion();
}

class Developer implements Interviewer
{
    public function askQuestion()
    {
        echo "ask design pattern"; 
    }
}

class CommunityExective implements Interviewer
{
    public function askQuestion()
    {
        echo "ask community";
    }
}

abstract class HiringManager
{
    abstract protected function makeInterviewer():Interviewer;
    
    public function takeInterview()
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestion();
    }
}

class DevelopManager extends HiringManager
{
    protected function makeInterviewer(): \Interviewer
    {
        return new Developer();
    }
}

class MarketingManager extends HiringManager
{
    protected function makeInterviewer(): \Interviewer
    {
        return new CommunityExective();
    }
}

$devManager = new DevelopManager();
$devManager->takeInterview();

$marketingManager = new MarketingManager();
$marketingManager->takeInterview();

?>