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

        return $s->fetchAll()[0];
    }

    // ottengo gli ultimi X post
    public function last($max)
    {
        $s = $this->db->query("SELECT * FROM posts ORDER BY id DESC LIMIT $max");

        return $s->fetchAll();
    }

    public function getAll()
    {
        $s = $this->db->query("SELECT * FROM posts ORDER BY id DESC");

        return $s->fetchAll();
    }

    public function save($id, $titolo, $testo)
    {
        $stm = $this->db->prepare("UPDATE posts SET titolo = :titolo, testo = :testo WHERE id = :id");

        $stm->bindParam(':id', $id);
        $stm->bindParam(':titolo', $titolo);
        $stm->bindParam(':testo', $testo);

        return $stm->execute();
        
    }

    public function create($titolo, $testo)
    {
        $stm = $this->db->prepare("INSERT INTO posts (titolo, testo ) VALUES (:titolo, :testo)");

        $stm->bindParam(':titolo', $titolo);
        $stm->bindParam(':testo', $testo);

        return $stm->execute();
        
    }

    public function delete($id)
    {
        $stm = $this->db->prepare("DELETE FROM posts WHERE id = :id");

        $stm->bindParam(':id', $id);

        return $stm->execute();
        
    }
}