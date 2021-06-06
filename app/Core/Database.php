<?php

namespace App\Core;

// PATTERN DESIGN: SINGLETON

class Database {

    private static $instance;
    private $connection;

    // il costruttore e i dati sono privati
    private function __construct(array $options)
    {
        $this->connection = new \PDO ($options['driver'].":host=".$options['host'].";dbname=" . $options['dbname'], $options['user'], $options['pass']);
    }

    // genero e controllo che ci sia una singola istanza della classe
    public static function getInstance(array $options)
    {
        if(!self::$instance)
        {
            self::$instance = new static($options);
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }

}