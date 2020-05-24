<?php

interface WritingState
{
    public function write(string $words);
}

class UpperCase implements WritingState
{
    public function write(string $words)
    {
        echo strtoupper($words);
    }
}

class LowerCase implements WritingState
{
    public function write(string $words)
    {
        echo strtolower($words);
    }
}

class Defaults implements WritingState
{
    public function write(string $words)
    {
        echo $words;
    }
}

class TextEditor
{
    protected $state;

    public function __construct(\WritingState $state)
    {
        $this->state = $state;
    }

    public function setState(\WritingState $state)
    {
        $this->state = $state;
    }

    public function type(string $words)
    {
        $this->state->write($words);
    }
}

$editor = new TextEditor(new Defaults());

$editor->type('First line');

$editor->setState(new UpperCase());

$editor->type('Second line');
$editor->type('Third line');

$editor->setState(new LowerCase());

$editor->type('Forth line');
$editor->type('Fifth line');
?>