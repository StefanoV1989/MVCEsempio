<?php

namespace App\Models;


class Request {

    public $method;
    public $querystring;
    public $data;

    public function __construct(string $method, object $querystring, object $data)
    {
        $this->method = $method;
        $this->querystring = $querystring;
        $this->data = $data;
    }

    public static function getData()
    {
        $metodo = isset($_SERVER['REQUEST_METHOD']) ? strtoupper($_SERVER['REQUEST_METHOD']) : 'GET';

        $url = (object)$_GET;

        $oggetto = new \stdClass();

        // GET e DELETE non hanno dati post da passare
        if($metodo != 'GET' && $metodo != 'DELETE')
        {
            $oggetto = json_decode(file_get_contents('php://input'));
        }

        $richiesta = new static($metodo, $url, $oggetto);

        return $richiesta;
    }

}