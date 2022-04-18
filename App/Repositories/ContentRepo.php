<?php

namespace App\Repositories;

use Exception;
use App\Models\Post;
use App\Models\Podcast;

class ContentRepo extends Repository
{
    public function loadAllContent($content, $class)
    {
        $stm = $this->pdo->query("SELECT * FROM $content ORDER BY id DESC");
        $result = $stm->fetchAll();
        foreach ($result as &$res) {
            $res = new $class($res);
        }

        return $result;
    }

    public function loadSingleContent($content, $class, $id)
    {
        $stm = $this->pdo->query("SELECT * FROM $content WHERE id=$id");
        $postsql = $stm->fetch();
        if (!$postsql) {
            throw new Exception("There is no such post. Sorry, my friend, try again");
        }
        $result = new $class($postsql);

        return $result;
    }

    public function loadLatestContent($content, $class, $contentnum)
    {
        $stm = $this->pdo->query("SELECT * FROM $content ORDER BY created_at DESC LIMIT $contentnum");
        $result = $stm->fetchAll();
        foreach ($result as &$res) {
            $res = new $class($res);
        }

        return $result;
    }

//    public function __construct()
//    {
//        parent::__construct();
//    }
}
