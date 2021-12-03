<?php

$fileContent = file_get_contents('day-3/input.txt');
$binaryColumns = strlen(explode("\n", $fileContent)[0]);
$oxygenRating = $CO2Rating = array_chunk(
    str_split(str_replace("\n", "", $fileContent)),
    $binaryColumns
);

function calculateO2CO2(array $rating, int $key, bool $oxygen): array
{
    $count = count($rating);
    if ($count > 1) {
        $mostCommonBit = array_sum(array_column($rating, $key)) / $count;
        $bitCriteria = ($mostCommonBit >= 0.5) ? (int)$oxygen : (int)!$oxygen;
        return array_filter(
            $rating,
            static function ($rating) use ($key, $bitCriteria) {
                return (int)$rating[$key] === $bitCriteria;
            }
        );
    }
    return $rating;
}

foreach ($oxygenRating[0] as $key => $column) {
    $oxygenRating = calculateO2CO2($oxygenRating, $key, true);
    $CO2Rating = calculateO2CO2($CO2Rating, $key, false);
}

echo bindec(implode(array_values($oxygenRating)[0])) * bindec(implode(array_values($CO2Rating)[0]));
