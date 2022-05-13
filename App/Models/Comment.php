<?php

namespace App\Models;

class Comment extends Model
{
    protected $content_id;
    protected $content_type;
    protected $user_id;
    protected $body_text;

    public function __construct($comment)
    {
        $this->id = $comment['comment_id'];
        $this->content_id = $comment['content_id'];
        $this->content_type = $comment['content_type'];
        $this->user_id = $comment['user_id'];
        $this->body_text = $comment['body_text'];
    }
}
