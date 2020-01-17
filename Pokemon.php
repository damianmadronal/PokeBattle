<?php


class Pokemon
{
    private $name;
    private $nickName;
    private $energyType;
    private $hitpoints;
    private $health;
    private $attacks;
    private $weaknessName;
    private $resistance;
    private $weaknessMultiplier;
    private $resistanceValue;

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
            $damage = $attack[1][1] * $target->weaknessName->multiplier;
            echo "$this->name attacked with " . $attack[1][0] . " - will do $damage damage <br>";
        } else {
            $damage = $attack[1][1];
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

    function setName($name)
    {
        $this->name = $name;
    }
    function getName()
    {
        return $this->name;
    }
    function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }
    function getNickName()
    {
        return $this->nickName;
    }
    function setEnergyType($energyType)
    {
        $this->energyType = new EnergyType($energyType);
    }
    function getEnergyType()
    {
        return $this->energyType;
    }
    function setHitpoints($hitpoints)
    {
        $this->hitpoints = $hitpoints;
    }
    function getHitpoints()
    {
        return $this->hitpoints;
    }
    function setHealth($health)
    {
        $this->health = $health;
    }
    function getHealth()
    {
        return $this->health;
    }
    function setAttacks($attacks)
    {
        $this->attacks = $attacks;
    }
    function getAttacks()
    {
        return $this->attacks;
    }
    function setWeaknessName($weaknessName, $weaknessMultiplier)
    {
        $this->weaknessName = new Weakness($weaknessName, $weaknessMultiplier);
    }
    function getWeaknessName()
    {
        return $this->weaknessName;
    }
    function setResistance($resistance, $resistanceValue)
    {
        $this->resistance = new Resistance($resistance, $resistanceValue);
    }
    function getResistance()
    {
        return $this->resistance;
    }
    function setWeaknessMultiplier($weaknessMultiplier)
    {
        $this->weaknessMultiplier = $weaknessMultiplier;
    }
    function getWeaknessMultiplier()
    {
        return $this->weaknessMultiplier;
    }
    function setResistanceValue($resistanceValue)
    {
        $this->resistanceValue = $resistanceValue;
    }
    function getResistanceValue()
    {
        return $this->resistanceValue;
    }
}
