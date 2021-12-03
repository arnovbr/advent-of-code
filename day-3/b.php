<?php

$fileContent = file_get_contents('day-3/input.txt');
$binaryColumns = strlen(explode("\n", $fileContent)[0]);
$oxygenRating = $CO2Rating = array_chunk(
    str_split(str_replace("\n", "", $fileContent)),
    $binaryColumns
);
$bitCriteriaOxygen = $bitCriteriaCO2 = 0;

foreach ($oxygenRating[0] as $key => $column) {
    $oxygenRatingsCount = count($oxygenRating);
    if ($oxygenRatingsCount > 1) {
        $mostCommonOxygenBit = array_sum(array_column($oxygenRating, $key)) / $oxygenRatingsCount;
        $bitCriteriaOxygen = ($mostCommonOxygenBit > 0.5) ? 1 : 0;
        if ($mostCommonOxygenBit === 0.5) {
            $bitCriteriaOxygen = 1;
        }
        $oxygenRating = array_filter(
            $oxygenRating,
            static function ($rating) use ($key, $bitCriteriaOxygen) {
                return (int)$rating[$key] === $bitCriteriaOxygen;
            }
        );
    }
    $CO2RatingsCount = count($CO2Rating);
    if ($CO2RatingsCount > 1) {
        $mostCommonCO2Bit = array_sum(array_column($CO2Rating, $key)) / $CO2RatingsCount;
        $bitCriteriaCO2 = ($mostCommonCO2Bit > 0.5) ? 0 : 1;
        if ($mostCommonCO2Bit === 0.5) {
            $bitCriteriaCO2 = 0;
        }
        $CO2Rating = array_filter(
            $CO2Rating,
            static function ($rating) use ($key, $bitCriteriaCO2) {
                return (int)$rating[$key] === $bitCriteriaCO2;
            },
            ARRAY_FILTER_USE_BOTH
        );
    }
}
echo bindec(implode(array_values($oxygenRating)[0])) * bindec(implode(array_values($CO2Rating)[0]));
