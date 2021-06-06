<?php

namespace App\Core;


class Router extends Model {

    // dati predefiniti per la home
    protected $namespace = 'App\Controller\\';
    protected $controller = 'HomeController';
    protected $errorController = 'ErrorController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        // gestisco i dati nell'url
        $url = $this->parseUrl();
    }

    private function parseUrl()
    {
        $controllerName = $this->namespace . $this->controller;

        // se ho dei parametri, li divido per / dopo aver sanitizzato la stringa
        $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];

        if(isset($url[0]))
        {
            // il controller deve essere chiamato <nome> + Controller
            $this->controller = ucfirst($url[0]) . 'Controller';
            

            // se non esiste la classe nel namespace dei controller, chiamo il controller errori
            if(!class_exists($this->namespace . $this->controller))
            {
                $this->controller = $this->errorController;
                $this->method = 'throwClassError';
                $this->params = [$url[0]];
            }

            // cancello l'indice già utilizzato
            unset($url[0]);
        }

        // ottengo un nome intero fatto da namespace e controller
        // del tipo App\Controller\NomeController
        $controllerName = $this->namespace . $this->controller;

        // richiamo la classe appena verificata
        $controller = new $controllerName;

        if(isset($url[1]))
        {
            // se esiste un secondo parametro
            if(method_exists($controller, $url[1]))
            {
                // è il metodo
                $this->method = $url[1];

                // i parametri successivi sono da passare al metodo resettando gli indici
                $this->params = $url ? array_values($url) : [];
            }
            else
            {
                $controllerName = $this->namespace . $this->errorController;
                // se il metodo non esiste, mostro un errore
                $this->method = 'throwMethodError';
                $this->params = [$url[1]];
            }

            unset($url[1]);
        }

        $methodName = $this->method;
        
        // chiamo il metodo dalla classe, e passo i parametri come params separati
        $controllerName::$methodName(...$this->params);
    }

}