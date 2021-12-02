<?php

$depthsList = explode("\n", file_get_contents('day-2/input.txt'));
$horizontalPosition = 0;
$depth = 0;
foreach ($depthsList as $key => $move) {
    if (empty($move)) {
        continue;
    }
    list($direction, $steps) = explode(' ', $move);
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

