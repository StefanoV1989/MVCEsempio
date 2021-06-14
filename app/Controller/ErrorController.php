<?php

namespace App\Controller;

use App\Core\Controller;

class ErrorController extends Controller {

    public static function throwPageError(string $page)
    {
        $messaggio = 'Pagina ' . $page . " non trovata";
        parent::view(['error' => $messaggio]);
    }
}