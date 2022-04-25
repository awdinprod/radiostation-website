<?php

namespace App\Repositories;

use Exception;
use App\Models\Post;
use App\Models\Podcast;

class ContentRepo extends Repository
{
    public function loadAllContent($content, $model_class)
    {
        $stm = $this->pdo->query("SELECT * FROM $content ORDER BY id DESC");
        $result = $stm->fetchAll();
        foreach ($result as &$res) {
            $res = new $model_class($res);
        }

        return $result;
    }

    public function loadSingleContent($content, $model_class, $id)
    {
        $stm = $this->pdo->query("SELECT * FROM $content WHERE id=$id");
        $content_sql = $stm->fetch();
        if (!$content_sql) {
            throw new Exception("There is no such post. Sorry, my friend, try again");
        }
        $result = new $model_class($content_sql);

        return $result;
    }

    public function loadLatestContent($content, $model_class, $content_num)
    {
        $stm = $this->pdo->query("SELECT * FROM $content ORDER BY created_at DESC LIMIT $content_num");
        $result = $stm->fetchAll();
        foreach ($result as &$res) {
            $res = new $model_class($res);
        }

        return $result;
    }

    public function __construct()
    {
        parent::__construct();
    }
}
