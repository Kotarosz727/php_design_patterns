<?php

interface FactoryInterface
{
    public function engine();
    public function tire();
    public function handle();
}

interface EngineInterface
{
    public function partList(); 
    public function assembly();
    public function add();
}

interface TireInterface
{
    public function partList(); 
    public function assembly();
    public function add();
}

interface HandleInterface
{
    public function partList(); 
    public function assembly();
    public function add();
}

?>