<?php

namespace App\Controller\Admin;

use App\Core\Controller;
use App\Core\Router;
use App\Models\Post;

class PostController extends Controller
{
    public static function index()
    {
        $post = new Post;

        $all = $post->getAll();

        parent::view('admin/posts', $all);
    }

    public static function edit($id)
    {
        $post = new Post;

        $data = $post->getPost($id);

        parent::view('admin/post.edit', $data);
    }

    public static function save($id)
    {
        $post = new Post;

        $titolo = filter_var($_POST['titolo'], FILTER_SANITIZE_STRING);
        $testo = filter_var($_POST['testo'], FILTER_SANITIZE_STRING);

        if($post->save($id, $titolo, $testo))
        {
            Router::redirect(BASE_URL.'admin/posts');
        }
    }

    public static function new()
    {
        parent::view('admin/post.new');
    }

    public static function create()
    {
        $post = new Post;

        $titolo = filter_var($_POST['titolo'], FILTER_SANITIZE_STRING);
        $testo = filter_var($_POST['testo'], FILTER_SANITIZE_STRING);

        if($post->create($titolo, $testo))
        {
            Router::redirect(BASE_URL.'admin/posts');
        }
    }

    public static function delete($id)
    {
        $post = new Post;

        if($post->delete($id))
        {
            Router::redirect(BASE_URL.'admin/posts');
        }
    }
}