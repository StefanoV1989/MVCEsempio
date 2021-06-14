<?php

namespace App\Core;

class Controller {

    public static function view($data)
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        echo json_encode($data);
    }

}