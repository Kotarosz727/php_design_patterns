<?php

class Context
{
    private $commands;
    private $index = 0;

    public function __construct($command)
    {
        $this->commands = explode(' ', trim($command));
    }

    public function next()
    {
        $this->index++;
        return $this;
    }

    public function getCommand()
    {
        if(!array_key_exists($this->index, $this->commands)){
            return null;
        }
        return $this->commands[$this->index];
    }

}

interface ExpressionInterface
{
    public function execute(Context $context);
}

class JobExpression implements ExpressionInterface
{
    public function execute (Context $context)
    {
        if($context->getCommand()!=='$'){
            throw new Exception('Missing opening tag "$'); 
        }
        $command_list = new CommandExpression();
        $command_list->execute($context->next());
    }
}

class CommandExpression implements ExpressionInterface
{
    public function execute(Context $context)
    {
        while(true) {
            $text = $context->getCommand();
            if(is_null($text)){
                throw new Exception('There is no closing command "/"');
            }else if($text === '/'){
                break;
            }else{
                $expression = new DatetimeExpression();
                $expression->execute($context);
            }
            $context->next();
        }
    }
}

class DateTimeExpression
{
    public function execute(Context $context)
    {
        $command = $context->getCommand();

        switch($command) {
            case 'year':
                echo date('Y').' ';
                break;
            case 'month':
                echo date('m').' ';
                break;
            case 'day':
                echo date('d').' ';
            case 'time':
                echo date('H:i').' ';
                break;
            case 'second':
                echo date('s').' ';
                break;
        }
    }
}

$command = '$ year month day time second /';

$job = new JobExpression();
$job->execute(new Context($command));

?>