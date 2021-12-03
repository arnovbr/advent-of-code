<?php

$depthsList = file('day-2/input.txt');
$horizontalPosition = $depth = $aim = 0;
foreach ($depthsList as $key => $move) {
    [$direction, $steps] = explode(' ', $move);
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
