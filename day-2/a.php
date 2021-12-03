<?php

$depthsList = file('day-2/input.txt');
$horizontalPosition = 0;
$depth = 0;
foreach ($depthsList as $key => $move) {
    [$direction, $steps] = explode(' ', $move);
    switch ($direction) {
        case $direction === 'forward':
            $horizontalPosition += $steps;
            break;
        case $direction === 'down':
            $depth += $steps;
            break;
        case $direction === 'up':
            $depth -= $steps;
            break;
    }
}
echo $depth * $horizontalPosition;
