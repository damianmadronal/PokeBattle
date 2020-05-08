<?php

class Pikachu extends \Pokemon\Pokemon
{
    public function __construct($name)
    {
        $energyType = new EnergyType('Lightning');
        $hitpoints = 60;
        $attacks = array(
            'Electric Ring' => new Attack('Electric Ring', 50),
            'Pika Punch' => new Attack('Pika Punch', 20)
        );

        $weakness = new Weakness('Fire', 1.5);
        $resistance = new Resistance('Fighting', 20);

        parent::__construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance);
    }

    public function getPokemonName()
    {
        return $this->name;
    }
}
