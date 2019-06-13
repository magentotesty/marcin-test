<?php

namespace test\app\models;

use test\core\Model;

class TripMeasures extends Model
{
    public function __construct()
    {
        $table = 'trip_measures';
        parent::__construct($table);
    }
}