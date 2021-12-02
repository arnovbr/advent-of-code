<?php

$depthsList = explode("\n", file_get_contents('input.txt'));
$horizontalPosition = 0;
$depth = 0;
$aim = 0;
foreach ($depthsList as $key => $move) {
    if (empty($move)) {
        continue;
    }
    list($direction, $steps) = explode(' ', $move);
    switch ($direction) {
        case $direction === 'forward':
            $horizontalPosition += $steps;
            $depth += $aim * $steps;
            break;
        case $direction === 'down':
            $aim += $steps;
            break;
        case $direction === 'up':
            $aim -= $steps;
            break;
    }
}
echo $depth * $horizontalPosition;

