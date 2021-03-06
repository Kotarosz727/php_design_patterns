<?php

class EditorMemento
{
    protected $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}

class Editor
{
    protected $content = '';

    public function type(string $words)
    {
        $this->content = $this->content.''.$words;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function save()
    {
        return new EditorMemento($this->content);
    }

    public function restore(EditorMemento $memento)
    {
        $this->content = $memento->getContent();
    }
}

$editor = new Editor();

$editor->type('this is the first word.<br>');
$editor->type('this is the second word.<br>');

$saved = $editor->save();

$editor->type('this the third word.<br>');

echo $editor->getContent();

$editor->restore($saved);

echo $editor->getContent();

?>