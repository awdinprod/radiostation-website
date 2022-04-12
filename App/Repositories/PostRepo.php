<?php

namespace App\Repositories;

use \Exception;
use App\Models\Post;

class PostRepo extends Repository
{
    public function loadPosts()
    {
        $stm = $this->pdo->query("SELECT * FROM posts ORDER BY id DESC");
        $result = $stm->fetchAll();
        foreach ($result as &$res) {
            $res = new Post($res);
        }

        return $result;
    }

    public function loadPost($id)
    {
        $stm = $this->pdo->query("SELECT * FROM posts WHERE id=$id");
        $postsql = $stm->fetch();
        if (!$postsql) {
            throw new \Exception("There is no such post. Sorry, my friend, try again");
        }
        $result = new Post($postsql);

        return $result;
    }

    public function loadLatestPosts()
    {
        $stm = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 6");
        $result = $stm->fetchAll();
        foreach ($result as &$res) {
            $res = new Post($res);
        }

        return $result;
    }

    public function __construct($connection)
    {
        parent::__construct($connection);
    }
}
