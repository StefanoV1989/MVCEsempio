<?php

namespace App\Controller;

use App\Core\Controller;
use App\Models\Post;

class PostController extends Controller
{
    // i parametri dell'url vengono passati come parametri separati al metodo richiamato
    public static function index($id_post = 0)
    {
        // ottengo i post dal model Post
        $posts = new Post;

        // richiamo il singolo post richiesto
        $singolo = $posts->getPost($id_post);
        
        // chiamo la view 'home' nella cartella views/layouts/ e passo i post come dati
        parent::view($singolo);
    }

}