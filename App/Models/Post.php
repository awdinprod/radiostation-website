<?php

namespace App\Models;

class Post extends Model
{
    protected $title;
    protected $shorttext;
    protected $bodytext;
    protected $img;
    protected $user_id;
    protected $comments = [];

    public function __construct($post)
    {
        $this->id = $post['id'];
        $this->title = $post['title'];
        $this->shorttext = $post['excerpt'];
        $this->bodytext = $post['body_text'];
        $this->img = $post['post_img'];
    }
}
