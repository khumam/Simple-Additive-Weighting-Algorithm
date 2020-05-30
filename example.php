<?php

require 'SAW/sawMethod.php';

use SAW\SawMethod;

$criteria = [
    [
        [2, 3, 4, 5], 40, false
    ],
    [
        [2, 3, 4, 5], 30, false
    ],
    [
        [1, 3, 5], 20, true
    ],
    [
        [3, 4, 5], 10, true
    ]

];
$dataName = ['Nama 1', 'Nama 2', 'Nama 3'];
$data = [
    [3, 5, 3, 4],
    [2, 4, 3, 5],
    [5, 5, 5, 3],
];

$saw = new SawMethod($data, $criteria, $dataName);
echo $saw->getResultName() . "\n";
echo $saw->getResult() . "\n";
print_r($saw->getFinalResult());
print_r($saw->getDataWithName());
