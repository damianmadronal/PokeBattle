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
            echo "$this->name used " . $attack[0] . " - It's very effective! ($damage) <br>";
        } else {
            $damage = $attack[1];
        }
        if ($target->resistance->energyType == $this->energyType->name) {
            $damage = $damage - $target->resistance->value;
            echo "$this->name used " . $attack[0] . " - It's not very effective! ($damage) <br>";
        } else {
            $damage = $damage;
        }


        $this->decreaseHealth($damage, $target);
    }

    public function decreaseHealth($damage, $target)
    {
        $target->health -= $damage;
        if ($target->health <= 0) {
            echo "$target->name fainted <br>";
        } else {
            echo "$target->name is left with $target->health hp <br>";
        }
    }
}
