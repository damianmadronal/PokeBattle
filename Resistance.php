<?php


class Resistance
{
    private $energyType;
    private $value;

    public function __construct($energyType, $value)
    {
        $this->energyType = $energyType;
        $this->value = $value;
    }

    public function getEnergyType()
    {
        return $this->energyType;
    }

    public function getEnergyTypeValue()
    {
        return $this->value;
    }
}
