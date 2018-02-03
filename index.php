<?php

require 'src/init.php';

use App\Models\Map;

$map = new Map(801,641, random_int(1000, 9999), .65);

$map = $map->render();

echo $blade->make('map', [
    'map' => json_encode($map),
]);

