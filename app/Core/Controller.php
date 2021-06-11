<?php

namespace App\Core;

class Controller {

    public static function view($view, $data = null)
    {
        $methodPatch = '<input type="hidden" name="method" value="PATCH" />';
        $methodDelete = '<input type="hidden" name="method" value="DELETE" />';

        // includo la view in base al nome richiesto
        // $data sarà accessibili in automatico
        require_once('../views/layouts/' . $view . '.php');
    }

}