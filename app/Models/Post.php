<?php

namespace App\Models;

use App\Core\Model;

// Business Logic dell'applicazione
class Post extends Model
{

    // ottengo un singolo post dall'ID
    public function getPost($id_post)
    {
        
        $s = $this->db->query("SELECT * FROM posts WHERE id = '$id_post'");

        return $s->fetchAll();
    }

    // ottengo gli ultimi X post
    public function last($max)
    {
        $s = $this->db->query("SELECT * FROM posts ORDER BY id DESC LIMIT $max");

        return $s->fetchAll();
    }

    
}