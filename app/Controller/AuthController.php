<?php

namespace App\Controller;

use App\Core\Controller;
use App\Models\Auth;

class AuthController extends Controller {


    public static function protect()
    {
        $username = $_SERVER['PHP_AUTH_USER'] ?? '';
        $password = $_SERVER['PHP_AUTH_PW'] ?? '';

        // Per i token si usa: $_SERVER['HTTP_AUTHORIZATION']

        $auth = new Auth;

        if($auth->isAuth($username, $password))
        {
            return true;
        }
        else
        {
            header("HTTP/1.1 401 Unauthorized");
            exit('Unauthorized');
        }
    }
    
}