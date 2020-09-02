<?php

namespace Pokemon;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
class Pokemon
{
    static $population;
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

        self::$population++;
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
    }

    public function decreaseHealth($damage, $target)
    {
        $target->health -= $damage;
        if ($target->getHealth() <= 0) {
            echo $target->getName() . " fainted <br>";
            self::$population--;
        } else {
            echo $target->getName() . " is left with " . $target->getHealth() . " hp <br>";
        }
    }

    /**
     * Get the value of population
     */
    static function getPopulation()
    {
        return self::$population;
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of energyType
     */
    public function getEnergyType()
    {
        return $this->energyType;
    }

    /**
     * Get the value of hitpoints
     */
    public function getHitpoints()
    {
        return $this->hitpoints;
    }

    /**
     * Get the value of attacks
     */
    public function getAttacks()
    {
        return $this->attacks;
    }

    /**
     * Get the value of weakness
     */
    public function getWeakness()
    {
        return $this->weakness;
    }

    /**
     * Get the value of resistance
     */
    public function getResistance()
    {
        return $this->resistance;
    }

    /**
     * Get the value of health
     */
    public function getHealth()
    {
        return $this->health;
    }
}
