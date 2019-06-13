<?php

namespace test\app\models;

use test\core\Model;

class Trips extends Model
{
    public function __construct()
    {
        $table = 'trips';
        parent::__construct($table);
    }

    public function findTripsData()
    {
        return $this->db->query("SELECT * FROM trip_measures tm JOIN trips t WHERE tm.trip_id = t.id ORDER BY t.id, tm.distance ASC");
    }

    public function findTripsDataById($id)
    {
        return $this->db->query("SELECT tm.distance, t.name, t.measure_interval FROM trip_measures tm JOIN trips t WHERE tm.trip_id = t.id AND tm.trip_id = {$id} ORDER BY tm.distance ASC");
    }

    public function findTripsDataWithMaxDistance()
    {
        return $this->db->query("SELECT id, name, measure_interval, distance FROM trips t LEFT JOIN (SELECT trip_id, MAX(distance) as distance FROM trip_measures GROUP BY trip_id ) tm on tm.trip_id = t.id");
    }

    public function findLastId()
    {
        return $this->db->query("SELECT id FROM trips ORDER BY id DESC LIMIT 1");
    }

    public function deleteById($id)
    {
        return $this->db->query("DELETE t, tm FROM trips t JOIN trip_measures tm ON t.id = tm.trip_id WHERE tm.trip_id = {$id}");
    }
}