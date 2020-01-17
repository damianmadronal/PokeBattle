<?php


class Resistance
{
    public $energyType;
    public $value;

    public function __construct($energyType, $value)
    {
        $this->energyType = $energyType;
        $this->value = $value;
    }
}
