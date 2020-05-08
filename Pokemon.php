<?php

namespace Pokemon;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
class Pokemon
{
    public $name;
    public $energyType;
    public $hitpoints;
    public $attacks;
    public $weakness;
    public $resistance;

    public function __construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance)
    {
        $this->name = $name;
        $this->energyType = $energyType;
        $this->hitpoints = $hitpoints;
        $this->health = $hitpoints;
        $this->attacks = $attacks;
        $this->weakness = $weakness;
        $this->resistance = $resistance;
    }

    public function battleMove($target, $attack)
    {
        $energyType = $this->getEnergyType()->getName();
        $weaknessEnergyType = $target->getWeakness()->getEnergyType();
        $multiplierEnergyType = $target->getWeakness()->getEnergyTypeValue();

        $resistanceEnergyType = $target->getResistance()->getEnergyType();
        $resistance = $target->getResistance()->getEnergyTypeValue();

        echo "<br><strong>" . $target->getName() .  " total hp: " . $target->getHealth() . " <br><br>";
        if ($weaknessEnergyType == $energyType) {
            $damage = $attack->getAttackDamage() * $multiplierEnergyType;
            echo $this->name . " used " .  $attack->getAttackName() . " - It's super effective! ($damage)<br>";
        } elseif ($resistanceEnergyType == $energyType) {
            $damage = $attack->getAttackDamage() - $resistance;
            echo $this->name . " used " .  $attack->getAttackName() . " - It's not very effective ($damage)<br>";
        } else {
            $damage = $attack->getAttackDamage();
            echo $this->name . " used " .  $attack->getAttackName() . " ($damage)<br>";
        }

        $this->decreaseHealth($damage, $target);


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

    public function getName()
    {
        return $this->name;
    }

    public function getEnergyType()
    {
        return $this->energyType;
    }

    public function getHitpoints()
    {
        return $this->hitpoints;
    }

    public function getAttack()
    {
        return $this->attacks;
    }

    public function getWeakness()
    {
        return $this->weakness;
    }

    public function getResistance()
    {
        return $this->resistance;
    }

    public function getHealth()
    {
        return $this->health;
    }
}
