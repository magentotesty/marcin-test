<?php

namespace test\app\controllers;

use test\core\MainController;
use test\core\Router;
use test\app\libs\mathCalculations;

class TripController extends MainController
{
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->loadModel('Trips');
    }

    public function indexAction()
    {
        $this->view->tripsData = $this->TripsModel->findTripsDataWithMaxDistance()->results();
        $this->view->render('trip/index');
    }

    public function addAction()
    {
        if ($this->request->isPost()) {
            $request = $this->request->get();
            $fields = ['name' => $request['trip_name'], 'measure_interval' => $request['trip_interval']];
            $this->TripsModel->insert($fields);
            
            $lastId = $this->TripsModel->findLastId()->first()->id;
            $this->loadModel('TripMeasures');
            $randomDistancePoints = mathCalculations\Helper::prepareRandomDistancePoints($request['trip_distance'], $request['trip_points']);
            foreach ($randomDistancePoints as $distancePoint) {
                $fields = ['trip_id' => $lastId, 'distance' => $distancePoint];
                $this->TripMeasuresModel->insert($fields);
            }
            $this->view->lastInsertId = $lastId;
        }
        $this->view->render('trip/add');
    }

    public function calculateAction()
    {
        if ($this->request->isPost()) {
            $tripId = $this->request->get('trip');
            $tripData = $this->TripsModel->findTripsDataById($tripId);
            $distances = $tripData->results();
            
            $measureInterval = $tripData->first()->measure_interval;
            $calulations = new mathCalculations\AverageSpeed();
            $maxKey = mathCalculations\Helper::maxArrayKey($distances);
            $this->view->tripsData = $this->TripsModel->findTripsDataWithMaxDistance()->results();

            if ($calulations->isNotEnoughData($maxKey)) {
                $this->view->incorrectData = true;
                $this->view->render('trip/index');
            } else {
                $averageHourlySpeed = $calulations->calculate($distances, $measureInterval);
                $maxAverageHourlySpeed = mathCalculations\Helper::getMaxValue($averageHourlySpeed);

                $this->view->tripId = $tripId;
                $this->view->distances = $distances;
                $this->view->measureInterval = $measureInterval;
                $this->view->distanceSections = $calulations->getDistanceSections();
                $this->view->displacements = $calulations->getDisplacements();
                $this->view->averageHourlySpeed = $averageHourlySpeed;
                $this->view->maxAverageHourlySpeed = mathCalculations\Helper::roundDown($maxAverageHourlySpeed);
                $this->view->render('trip/index');
            }
        } else {
            Router::redirect('trip');
        }
    }

    public function deleteAction()
    {
        if ($this->request->isPost()) {

            $tripId = $this->request->get('trip');
            $this->TripsModel->deleteById($tripId);
        }
        Router::redirect('trip');
    }
}