<?php

namespace App\Controller;

use App\Core\Controller;
use App\Core\Router;
use App\Models\Auth;

class AuthController extends Controller {

    public static function index()
    {
        parent::view('login');
    }

    public static function protect()
    {
        $auth = new Auth;

        if($auth->isAuth())
        {
            return true;
        }
        else
        {
            Router::redirect(BASE_URL.'login');
        }
    }

    public static function login()
    {
        $user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
        $pass = sha1(sha1($_POST['pass']));

        $auth = new Auth;

        if($auth->login($user, $pass))
        {
            Router::redirect(BASE_URL);
        }
        else
        {
            Router::redirect(BASE_URL . 'login');
        }
    }

    public static function logout()
    {
        $auth = new Auth;

        if($auth->logout()) Router::redirect(BASE_URL);
    }

    
}