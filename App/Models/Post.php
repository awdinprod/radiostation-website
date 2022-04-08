<?php

namespace App\Models;

class Post extends Model
{
    protected $title;
    protected $excerpt;
    protected $bodytext;
    protected $postimg;
//        protected $user_id;
//        protected $comments = [];

    public function getContent()
    {
        return array(
            'id' => $this->id,
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'bodytext' => $this->bodytext,
            'postimg' => $this->postimg
        );
    }

    public function __construct($post)
    {
        $this->id = $post['id'];
        $this->title = $post['title'];
        $this->excerpt = $post['excerpt'];
        $this->bodytext = $post['body_text'];
        $this->postimg = $post['post_img'];
//            $this->user_id = $post['user_id'];
    }
}
