<?php

namespace test\app\libs\mathCalculations;

class AverageSpeed implements Calculations
{
    private $distanceSections;
    private $displacements;
    private $measuringPointLimit = 1;

    public function calculate(array $distances, int $seconds): array
    {
        $this->setDistanceSections($distances);
        $this->setDisplacements($distances);
        return $this->calculateAverageHourlySpeedFromSeconds($seconds);
    }

    public function isNotEnoughData(int $value): bool
    {
        if ($value <= $this->measuringPointLimit) {
            return true;
        }
        return false;
    }

    public function getDistanceSections(): array
    {
        return $this->distanceSections;
    }

    public function setDistanceSections(array $values)
    {
        $this->distanceSections = $this->prepareDistanceSections($values);
    }

    public function getDisplacements(): array 
    {
        return $this->displacements;
    }

    public function setDisplacements(array $values)
    {
        $this->displacements = $this->prepareDisplacements($values);
    }

    private function prepareDistanceSections(array $values): array
    {
        foreach ($values as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $distanceSections[] = $values[$key - 1]->distance . " - " . $value->distance;
        }
        return $distanceSections;
    }

    private function prepareDisplacements(array $values): array
    {
        foreach ($values as $key => $value) {
            if ($key == 0) {
                continue;
            }
            $displacements[] = $value->distance - $values[$key - 1]->distance;
        }
        return $displacements;
    }

    private function calculateAverageHourlySpeedFromSeconds(int $seconds): array
    {
        foreach ($this->displacements as $displacement) {
            $averageHourlySpeed[] = (3600 * $displacement) / $seconds;
        }
        return $averageHourlySpeed;
    }
}