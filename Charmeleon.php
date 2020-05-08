<?php

class Charmeleon extends \Pokemon\Pokemon
{
    public function __construct($name)
    {
        $energyType = new EnergyType('Fire');
        $hitpoints = 60;
        $attacks = array(
            'Head Butt' => new Attack('Head Butt', 10),
            'Flare' => new Attack('Flare', 30)
        );

        $weakness = new Weakness('Water', 2);
        $resistance = new Resistance('Lightning', 10);

        parent::__construct($name, $energyType, $hitpoints, $attacks, $weakness, $resistance);
    }

    public function getFunctionName()
    {
        return $this->name;
    }
}
