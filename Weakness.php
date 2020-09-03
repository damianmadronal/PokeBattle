<?php

class Weakness
{
    private $energyType;
    private $multiplier;

    public function __construct($energyType, $multiplier)
    {
        $this->energyType = $energyType;
        $this->multiplier = $multiplier;
    }

    public function getEnergyType()
    {
        return $this->energyType;
    }

    public function getEnergyTypeValue()
    {
        return $this->multiplier;
    }
}
