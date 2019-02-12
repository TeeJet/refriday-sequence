<?php

use classes\Sequence;

require __DIR__ . '/../vendor/autoload.php';

$data = [2, 4, 8, 16];
$sequence = new Sequence($data);
if ($sequence->isGeometric()) {
    echo "It is geometric sequence" . PHP_EOL;
    echo "First item: " . $sequence->getFirstItem() . PHP_EOL;
    echo "Ratio: " . $sequence->getRatio() . PHP_EOL;
    echo "Size: " . $sequence->getSize() . PHP_EOL;
} else {
    echo "It isn't a geometric sequence" . PHP_EOL;
}