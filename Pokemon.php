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
            $damage = $attack[1] * $target->weaknessName->multiplier;
            echo "$this->name attacked with " . $attack[1] . " - will do $damage damage <br>";
        } else {
            $damage = $attack[1];
            echo "No damage multiplied -  will do $damage damage<br>";
        }
        if ($target->resistance->energyType == $this->energyType->name) {
            $damage = $damage - $target->resistance->value;
            echo "Attack has been reduced to $damage damage <br>";
            echo "$this->name will do $damage damage to $target->name <br>";
        } else {
            echo "no resistance stuff <br>";
            $damage = $damage;
            echo "$this->name will do $damage damage to $target->name <br>";
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
}
