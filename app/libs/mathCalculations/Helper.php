<?php

namespace test\app\libs\mathCalculations;

class Helper
{
    public static function getMaxValue(array $values): float
    {
        return max($values);
    }

    public static function getMinValue(array $values): float
    {
        return min($values);
    }

    public static function roundDown(float $value): int
    {
        return (int)floor($value);
    }

    public static function roundUp(float $value): int
    {
        return (int)ceil($value);
    }

    public static function prepareRandomDistancePoints(float $tripDistance, float $measuringPoints): array
    {
        $points[0] = 0;
        for ($i = 1; $i < $measuringPoints; ++$i) {
            $point = $tripDistance * (mt_rand() / mt_getrandmax());
            $points[] = round($point, 2);
        }
        asort($points);

        return $points;
    }

    public static function maxArrayKey(array $values): int
    {
        return max(array_keys($values));
    }
}