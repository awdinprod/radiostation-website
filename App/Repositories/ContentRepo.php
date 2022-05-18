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

    public function loadComments($content, $id)
    {
        $stm = $this->pdo->query(
            "SELECT * FROM comments WHERE content_type='$content' AND content_id=$id ORDER BY created_at DESC"
        );
        $results = $stm->fetchAll();
        foreach ($results as &$result) {
            $result = new Comment($result);
        }

        return $results;
    }

    public function addComment($comment_text, $content_type, $content_id, $userdata)
    {
        $sql = "INSERT INTO comments (body_text, content_type, content_id, user_id, username) VALUES (?, ?, ?, ?, ?)";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$comment_text, $content_type, $content_id, $userdata['user_id'], $userdata['username']]);
    }

    public function deleteComment($comment_id)
    {
        $sql = "DELETE FROM comments WHERE id=?";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$comment_id]);
    }

    public function editComment($comment_text, $comment_id)
    {
        $sql = "UPDATE comments SET body_text=? WHERE id=?";
        $stm = $this->pdo->prepare($sql);
        $stm->execute([$comment_text, $comment_id]);
    }
}
