<?php

namespace App\Core;

class Controller {

    public static function view($view, $data = null)
    {
        // includo la view in base al nome richiesto
        // $data sarà accessibili in automatico
        require_once('../views/layouts/' . $view . '.php');

        
    }

}