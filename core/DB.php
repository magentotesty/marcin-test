<?php

namespace test\core;

class DB
{
    private static $instance = null;
    private $pdo; 
    private $query;
    private $error = false;
    private $result;
    public $logger;

    private function __construct()
    {
        try {
            $this->logger = Logger::setLogger();
            $this->pdo = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        } catch (\PDOException $e) {
            if($this->logger) {
                $this->logger->log(__CLASS__, $e->getMessage());
            }
            die($e->getMessage());
        }
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query(string $sql, array $params = []): self
    {
        $this->error = false;
        if ($this->query = $this->pdo->prepare($sql)) {
            $x = 1;
            if (count($params)) {
                foreach ($params as $param) {
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }
            if ($this->query->execute()) {
                $this->result = $this->query->fetchALL(\PDO::FETCH_OBJ);
            } else {
                $this->error = true;
            }
        }
        return $this;
    }

    public function insert(string $table, array $fields = []): bool
    {
        $fieldToInsert = '';
        $valueToInsert = '';
        $values = [];

        foreach ($fields as $field => $value) {
            $fieldToInsert .= '`' . $field . '`,';
            $valueToInsert .= '?,';
            $values[] = $value;
        }
        $fieldToInsert = rtrim($fieldToInsert, ',');
        $valueToInsert = rtrim($valueToInsert, ',');
        $sql = "INSERT INTO {$table} ({$fieldToInsert}) VALUES ({$valueToInsert})";
        if (!$this->query($sql, $values)->error()) {
            return true;
        }
        return false;
    }

    public function delete(string $table, $id): bool
    {
        $sql = "DELETE FROM {$table} WHERE id = {$id}";
        if (!$this->query($sql)->error()) {
            return true;
        }
        return false;
    }

    public function results(): array
    {
        return $this->result;
    }

    public function first()
    {
        return (!empty($this->result)) ? $this->result[0] : [];
    }

    public function show(string $table)
    {
        return $this->query("SHOW TABLE STATUS LIKE '{$table}'")->first();
    }

    public function error(): bool
    {
        if($this->logger) {
            $this->logger->log(__CLASS__, "error occurred");
        }
        return $this->error;
    }
}