<?php

$depthsList = explode("\n", file_get_contents('day-1/input.txt'));
$increased = 0;
foreach ($depthsList as $key => $depth) {
    if ($key === 0 || empty($depthsList[$key + 2])) {
        continue;
    }
    $firstThreeDepthWindow = $depthsList[$key - 1] + $depth + $depthsList[$key + 1];
    $nextThreeDepthWindow = $depth + $depthsList[$key + 1] + $depthsList[$key + 2];
    if ($firstThreeDepthWindow < $nextThreeDepthWindow) {
        $increased++;
    }
}
echo $increased;
