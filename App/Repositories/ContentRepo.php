<?php

namespace App\Repositories;

use App\Models\Comment;
use Exception;

class ContentRepo extends Repository
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadAllContent($content, $model_class)
    {
        $stm = $this->pdo->query("SELECT * FROM $content ORDER BY id DESC");
        $results = $stm->fetchAll();
        foreach ($results as &$result) {
            $result = new $model_class($result);
        }

        return $results;
    }

    public function loadSingleContent($content, $model_class, $id)
    {
        $stm = $this->pdo->query("SELECT * FROM $content WHERE id=$id");
        $content_sql = $stm->fetch();
        if (!$content_sql) {
            throw new Exception("There is no such post. Sorry, my friend, try again");
        }
        return new $model_class($content_sql);
    }

    public function loadLatestContent($content, $model_class, $content_num)
    {
        $stm = $this->pdo->query("SELECT * FROM $content ORDER BY created_at DESC LIMIT $content_num");
        $results = $stm->fetchAll();
        foreach ($results as &$result) {
            $result = new $model_class($result);
        }

        return $results;
    }

    public function getComments($content, $id)
    {
        $stm = $this->pdo->query(
            "SELECT * FROM comments WHERE content_type='$content' AND content_id=$id ORDER BY created_at"
        );
        $results = $stm->fetchAll();
        foreach ($results as &$result) {
            $result = new Comment($result);
        }

        return $results;
    }
}
