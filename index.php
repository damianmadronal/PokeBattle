
<?php

require 'Pokemon.php';
require 'Pikachu.php';
require 'Charmeleon.php';

use Pokemon\Pokemon;

$pikachu = new Pikachu('Pikachu');
$charmeleon = new Charmeleon('Charmeleon');

$pikachu->battleMove($charmeleon, $pikachu->attacks['Electric Ring']);
$charmeleon->battleMove($pikachu, $charmeleon->attacks['Flare']);

echo '<br> Total: ' . Pokemon::getPopulation() . ' pokemons alive';
