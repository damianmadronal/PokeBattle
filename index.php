<?php

require 'Pokemon.php';

$pikachu = new Pokemon('Pikachu', 'Pickachu', 'Lightning', 60, [['Electric Ring', 50], ['Pika Punch', 20]], 'Fire', 1.5, 'Fighting', 20);

$charmeleon = new Pokemon('Charmeleon', 'Chermelon', 'Fire', 60, [['Head Butt', 10], ['Flare', 30]], 'Water', 2, 'Lightning', 10);

echo '<pre>';
var_dump($pikachu, $charmeleon);
echo '</pre>';
die;
