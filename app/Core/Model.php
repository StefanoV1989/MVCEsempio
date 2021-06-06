<?php

namespace App\Core;

// Il DB deve essere utilizzato da ogni Model,
// quindi lo includo nella classe che sarà estesa

class Model {

    protected $databaseInstance;
    protected $db;

    public function __construct()
    {
        
        $options = [
            'driver' => DBDRIVER,
            'host' => DBHOST,
            'user' => DBUSER,
            'pass' => DBPASS,
            'dbname' => DBNAME
        ];

        $this->databaseInstance = Database::getInstance($options);

        $this->db = $this->databaseInstance->getConnection();
    }

}