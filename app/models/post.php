<?php

    namespace App\models;

    class post extends model {
        protected $title;
        protected $excerpt;
        protected $bodytext;
        protected $postimg;
        protected $user_id;
        protected $comments = [];

        function __construct($post){
            $this->id = $post['id'];
            $this->title = $post['title'];
            $this->excerpt = $post['excerpt'];
            $this->bodytext = $post['bodytext'];
            $this->postimg = $post['postimg'];
            $this->user_id = $post['user_id'];
        }
    }