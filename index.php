<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="background-color : #000;color:#fff">

</body>

</html>
<?php

require 'Pokemon.php';


$pikachu = new Pokemon('Pikachu', 'Pickachu', 'Lightning', 600, [['Electric Ring', 50], ['Pika Punch', 20]], 'Fire', 1.5, 'Fighting', 20);

$charmeleon = new Pokemon('Charmeleon', 'Chermelon', 'Fire', 600, [['Head Butt', 10], ['Flare', 30]], 'Water', 2, 'Lightning', 10);
// echo '<pre>';
// var_dump($pikachu, $charmeleon);
// echo '</pre>';
// die;
ob_end_flush();
ob_implicit_flush();
while ($pikachu->health > 0 && $charmeleon->health > 0) {
    $pikachu->battleMove($charmeleon, $pikachu->attacks[rand(0, 1)]);
    sleep(3);
    $charmeleon->battleMove($pikachu, $charmeleon->attacks[rand(0, 1)]);
    sleep(3);
}
ob_implicit_flush(0);
