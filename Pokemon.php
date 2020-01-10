<?php

class Pokemon
{
    public $name;
    public $nickName;
    public $energyType;
    public $hitpoints;
    public $health;
    public $attacks;
    public $weaknessName;
    public $resistance;
    public $weaknessMultiplier;
    public $resistanceValue;

    public function __construct($name, $nickName, $energyType, $hitpoints, $attacks, $weaknessName, $weaknessMultiplier, $resistance, $resistanceValue)
    {
        $this->name = $name;
        $this->nickName = $nickName;
        $this->energyType = new EnergyType($energyType);
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weaknessName = new Weakness($weaknessName, $weaknessMultiplier);
        $this->resistance = new Resistance($resistance, $resistanceValue);
    }

    public function battleMove($target, $attack)
    {
        echo "<br><strong> $target->name total hp: $target->health</strong> <br><br>";
        if ($target->weaknessName->energyType == $this->energyType->name) {
            $multipliedDamage = $attack[1] * $this->weaknessName->multiplier;
            echo "$this->name attacked with $attack[0] - will do $multipliedDamage damage <br>";
        } else {
            $multipliedDamage = $attack[1];
            echo "No damage multiplied <br>";
        }
        if ($target->resistance->energyType == $this->energyType->name) {
            $damage = $multipliedDamage - $target->resistance->value;
            echo "Attack damage has been reduced to $damage damage <br>";
            echo "$this->name will do $damage damage to $target->name <br>";
        } else {
            echo "no resistance stuff <br>";
            $damage = $multipliedDamage;
            echo "$this->name will do $multipliedDamage damage to $target->name <br>";
        }


        $this->decreaseHealth($damage, $target);
    }

    public function decreaseHealth($damage, $target)
    {
        $target->health -= $damage;
        if ($target->health <= 0) {
            echo "$target->name fainted";
        } else {
            echo "$target->name is left with $target->health hp <br>";
        }
    }
    // public function getHealth()
    // {
    //     return $this->health;
    // }

    // public function setHealth($hp)
    // {
    //     if ($hp > 0) {
    //         $this->health = $hp;
    //     }
    // }
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
