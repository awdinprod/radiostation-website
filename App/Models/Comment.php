<?php

namespace App\Models;

class Comment extends Model
{
    protected $content_id;
    protected $content_type;
    protected $user_id;
    protected $username;
    protected $body_text;

    public function __construct($comment)
    {
        $this->id = $comment['id'];
        $this->content_id = $comment['content_id'];
        $this->content_type = $comment['content_type'];
        $this->user_id = $comment['user_id'];
        $this->username = $comment['username'];
        $this->body_text = $comment['body_text'];
    }
}
