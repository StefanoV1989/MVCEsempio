<?php

namespace App\Controller;

use App\Core\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public static function index()
    {
        // ottengo i post dal model Post
        $posts = new Post;

        // richiamo gli ultimi 20
        $ultimiPost = $posts->last(20);

        // chiamo la view 'home' nella cartella views/layouts/ e passo i post come dati
        parent::view('home', $ultimiPost);
    }
}