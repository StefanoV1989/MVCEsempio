<?php

namespace App\Core;

use App\Controller\ErrorController;
use App\Models\Request;

class Router extends Model {

    private static $trovato = false;

    public static function get($pattern, $controller, $middleware = [])
    {
        $richiesta = Request::getData();

        if($richiesta->method == 'GET')
        {
            
            $url = $richiesta->querystring->url ?? '/';
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if(self::parseUrl($url, $pattern, $controller, $middleware)) self::$trovato = true;

            
        }
    }

    public static function post($pattern, $controller, $middleware = [])
    {
        $richiesta = Request::getData();

        if($richiesta->method == 'POST')
        {
            $url = $richiesta->querystring->url ?? '/';
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if(self::parseUrl($url, $pattern, $controller, $middleware)) self::$trovato = true;
        }
        
    }

    public static function patch($pattern, $controller, $middleware = [])
    {
        $richiesta = Request::getData();

        if($richiesta->method == 'PATCH')
        {
            $url = $richiesta->querystring->url ?? '/';
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if(self::parseUrl($url, $pattern, $controller, $middleware)) self::$trovato = true;
        }
        
    }

    public static function delete($pattern, $controller, $middleware = [])
    {
        $richiesta = Request::getData();

        if($richiesta->method == 'DELETE')
        {
            $url = $richiesta->querystring->url ?? '/';
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if(self::parseUrl($url, $pattern, $controller, $middleware)) self::$trovato = true;
        }
        
    }

    public static function error()
    {
        if(!self::$trovato) ErrorController::throwPageError('test');
    }

    private static function processMiddleware($middleware)
    {
        if(count($middleware) > 0)
            return ($middleware[0]::{$middleware[1]}());
        else
            return true;
    }

    private static function parseUrl($url, $pattern, $controller, $middleware)
    {
        $found = false;

        preg_match('#{([\w\d]+)}#i', $pattern, $params);
        unset($params[0]);
        $params = array_values($params);

        $realPattern = preg_replace('({[\w\d]+})', '(.+)', $pattern);
        
        if(preg_match('#^'.$realPattern.'$#i', $url, $matches))
        {
            if(self::processMiddleware($middleware))
            {
                if(count($matches) > 1)
                {
                    unset($matches[0]);
                    $matches = array_values($matches);
                    
                    
                    foreach($matches as $contatore => $match)
                    {
                        $parametri[$params[$contatore]] = $match;
                    }
                    
                    $controller[0]::{$controller[1]}(...$parametri);

                    $found = true;
                }
                else
                {
                    $controller[0]::{$controller[1]}();

                    $found = true;
                }

                
            }
            
        }

        return $found;
    }

}