<?php

$fileContent = file_get_contents('day-3/input.txt');
$binaryColumns = strlen(explode("\n", $fileContent)[0]);
$binaryNumbersList = array_chunk(str_split(str_replace("\n", "", $fileContent)), $binaryColumns);
$gammaRate = $epsilonRate = null;
$count = count($binaryNumbersList);
foreach ($binaryNumbersList[0] as $key => $column) {
    $mostCommon = (array_sum(array_column($binaryNumbersList, $key)) / $count) > 0.5 ? 1 : 0;
    $gammaRate .= $mostCommon ? 1 : 0;
    $epsilonRate .= $mostCommon ? 0 : 1;
}
echo bindec($gammaRate) * bindec($epsilonRate);
