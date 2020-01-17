    <?php

    require 'Pokemon.php';
    require 'EnergyType.php';
    require 'Attack.php';
    require 'Resistance.php';
    require 'Weakness.php';


    $pikachu = new Pokemon('Pikachu', 'Pickachu', 'Lightning', 60, [['Electric Ring', 50], ['Pika Punch', 20]], 'Fire', 1.5, 'Fighting', 20);

    $charmeleon = new Pokemon('Charmeleon', 'Chermelon', 'Fire', 60, [['Head Butt', 10], ['Flare', 30]], 'Water', 2, 'Lightning', 10);


    ob_end_flush();
    ob_implicit_flush();
    while ($pikachu->getHealth() > 0 && $charmeleon->getHealth() > 0) {
        $pikachu->battleMove($charmeleon, $pikachu->getAttacks(rand(0, 1)));
        sleep(3);
        $charmeleon->battleMove($pikachu, $charmeleon->getAttacks(rand(0, 1)));
        sleep(3);
    }
    ob_implicit_flush(0);

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
    </body>


    </html>