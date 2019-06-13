<?php

namespace test\core;

class Model
{
    protected $db;
    protected $table;
    protected $modelName;

    public function __construct(string $table)
    {
        $this->db = DB::getInstance();
        $this->table = $table;
        $this->modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->table)));
    }

    public function insert(array $fields): bool
    {
        if (empty($fields)) {
            return false;
        } 
        if (array_key_exists('id', $fields)) {
             unset($fields['id']);
        }
        return $this->db->insert($this->table, $fields);
    }
    
    public function delete($id): bool
    {
        if(empty($id)) {
            return false;
        }
        return $this->db->delete($this->table, $id);
    }

    public function query(string $sql, array $params = [])
    {
        return $this->db->query($sql, $params);
    }
}