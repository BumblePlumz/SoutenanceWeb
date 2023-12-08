<?php

namespace App\Models\entity;

class Type 
{
    private int $id;
    private string $label;

    public function __construct(){}

    public function getId():int
    {
        return $this->id;
    }
    public function setId(int $id):void
    {
        $this->id = $id;
    }
    public function getLabel():string
    {
        return $this->label;
    }
    public function setLabel(string $label):void
    {
        $this->label = $label;
    }
}