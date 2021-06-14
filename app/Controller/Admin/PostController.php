<?php

namespace App\Controller\Admin;

use App\Core\Controller;
use App\Models\Post;
use App\Models\Request;

class PostController extends Controller
{
    public static function index()
    {
        $post = new Post;

        $all = $post->getAll();

        parent::view($all);
    }

    public static function save($id)
    {
        $richiesta = Request::getData();

        $post = new Post;

        $titolo = filter_var($richiesta->data->titolo, FILTER_SANITIZE_STRING);
        $testo = filter_var($richiesta->data->testo, FILTER_SANITIZE_STRING);

        if($post->save($id, $titolo, $testo))
        {
            parent::view(['success' => true]);
        }
    }

    public static function create()
    {
        $richiesta = Request::getData();

        $post = new Post;

        $titolo = filter_var($richiesta->data->titolo, FILTER_SANITIZE_STRING);
        $testo = filter_var($richiesta->data->testo, FILTER_SANITIZE_STRING);

        if($post->create($titolo, $testo))
        {
            parent::view(['success' => true]);
        }
    }

    public static function delete($id)
    {

        $post = new Post;

        if($post->delete($id))
        {
            parent::view(['success' => true]);
        }
    }
}