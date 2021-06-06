<?php

namespace App\Controller;

use App\Core\Controller;

class ErrorController extends Controller {

    public static function throwMethodError(string $method)
    {
        $messaggio = 'Metodo: ' . $method . " non trovato";
        parent::view('error', ['error' => $messaggio]);
    }

    public static function throwClassError(string $classe)
    {
        $messaggio = 'Classe: ' . $classe . " non trovata";
        parent::view('error', ['error' => $messaggio]);
    }
}