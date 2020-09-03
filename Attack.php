<?php

class Attack
{
    private $name;
    private $damage;

    public function __construct($name, $damage)
    {
        $this->name = $name;
        $this->damage = $damage;
    }

    public function getAttackName()
    {
        return $this->name;
    }

    public function getAttackDamage()
    {
        return $this->damage;
    }
}
