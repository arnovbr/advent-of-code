<?php

$depthsList = explode("\n", file_get_contents('input.txt'));
$increased = 0;
foreach ($depthsList as $key => $depth) {
    if ($key > 0 && $depth > $depthsList[$key - 1]) {
        $increased++;
    }
}
echo $increased;

