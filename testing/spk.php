<?php

require 'SAW/sawMethod.php';

use SAW\SawMethod;

$criteria = [
    [
        [1, 2, 3, 4, 5], 40, false
    ],
    [
        [1, 2, 3, 4, 5], 30, true
    ],
    [
        [1, 3, 4], 10, true
    ],
    [
        [1, 3, 5], 10, true
    ],
    [
        [1, 2, 3, 5], 10, true
    ],

];
$dataName = ['Extra Combo VIP 35GB', 'Extra Combo VIP 20GB', 'Extra Combo VIP 15GB', 'Extra Combo VIP 10GB', 'Extra Combo VIP 5GB', 'Extra Combo 35GB', 'Extra Combo 20GB', 'Extra Combo 15GB', 'Extra Combo 10GB', 'Extra Combo 5GB', 'Hotrod Baru 1GB', 'Hotrod Baru 500MB', 'Extra Rezeki 15GB', 'Extra Rezeki 6GB', 'Extra Rezeki 3GB', 'Extra Rezeki 100MB', 'Extra Rezeki 50MB'];
$data = [
    [5, 5, 4, 5, 5],
    [5, 4, 4, 5, 3],
    [5, 4, 4, 5, 3],
    [4, 4, 4, 5, 3],
    [4, 2, 4, 5, 2],
    [5, 5, 4, 3, 5],
    [5, 4, 4, 3, 5],
    [5, 4, 4, 3, 5],
    [4, 3, 4, 3, 5],
    [4, 2, 4, 3, 2],
    [1, 1, 2, 3, 1],
    [1, 1, 2, 3, 1],
    [5, 4, 4, 3, 5],
    [5, 3, 4, 3, 5],
    [4, 2, 4, 3, 5],
    [2, 1, 2, 3, 5],
    [2, 1, 2, 3, 5],
];

$saw = new SawMethod($data, $criteria, $dataName);
echo 'Paket yang tepat adalah ' . $saw->getResultName() . ' dengan nilai ' . $saw->getResult() . "\n";
print_r($saw->getFinalResut());
print_r($saw->getDataWithName());
