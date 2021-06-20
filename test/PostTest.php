<?php

use App\Models\Post;
use PHPUnit\Framework\TestCase;

require_once('config/database.php');

class PostTest extends TestCase
{
    public function testGetPost()
    {
        $post = new Post();

        $result = $post->getPost(1);

        $this->assertNotEmpty($result);
        $this->assertIsNumeric($result['id']);
    }
}