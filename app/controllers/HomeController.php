<?php

namespace test\app\controllers;

use test\core\MainController;
use test\app\libs\mathCalculations;

class HomeController extends MainController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->loadModel('Trips');
    }

    public function indexAction()
    {
        $tripsData = $this->TripsModel->findTripsData()->results();
        foreach ($tripsData as $key => $value) {
            $formattedTripsData[$value->id][] = $value;
        }

        foreach ($formattedTripsData as $key => $trip) {
            $calulations = new mathCalculations\AverageSpeed();
            $maxKey = mathCalculations\Helper::maxArrayKey($trip);
            $measureInterval = $trip[$maxKey]->measure_interval;
            if ($calulations->isNotEnoughData($maxKey)) {
                $results[$key] = [
                    'name' => $trip[$maxKey]->name,
                    'distance' => 0,
                    'measure_interval' => $measureInterval,
                    'avg_speed' => 0
                ];
                continue;
            }

            $averageHourlySpeed = $calulations->calculate($trip, $measureInterval);
            $maxAverageHourlySpeed = mathCalculations\Helper::roundDown(mathCalculations\Helper::getMaxValue($averageHourlySpeed));
            $results[$key] = [
                'name' => $trip[$maxKey]->name,
                'distance' => $trip[$maxKey]->distance,
                'measure_interval' => $measureInterval,
                'avg_speed' => $maxAverageHourlySpeed
            ];
        }
        $this->view->results = $results;
        $this->view->render('home/index');
    }
}