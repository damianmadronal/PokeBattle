<?php

class Pokemon
{
    public $name;
    public $energyType;
    public $hitpoints;
    public $health;
    public $attacks;
    public $weakness;
    public $resistance;
    public $weaknessMultiplier;
    public $resistanceValue;

    public function __construct($name, $energyType, $hitpoints, $health, $attacks, $weakness, $weaknessMultiplier, $resistance, $resistanceValue)
    {
        $this->name = $name;
        $this->energyType = new EnergyType($energyType);
        $this->hitpoints = $hitpoints;
        $this->health = $health;
        $this->attacks = $attacks;
        $this->weakness = new Weakness($weakness, $weaknessMultiplier);
        $this->resistance = new Resistance($resistance, $resistanceValue);
    }

    public function attack()
    {
    }

    public function __toString()
    {
        return json_encode($this);
    }
}

class EnergyType
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Attack
{
    public $name;
    public $damage;

    public function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }
}

class Weakness
{
    public $energyType;
    public $multiplier;

    public function __construct($energyType, $multiplier)
    {
        $this->energyType = $energyType;
        $this->multiplier = $multiplier;
    }
}

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
