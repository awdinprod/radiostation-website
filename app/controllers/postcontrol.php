<?php
    namespace App\controllers;

    use App\repositories\postrepo;

    class postcontrol extends controller{

        public function getPostList(){
            $postlist = $this->repo->uploadposts();

            return $postlist;
        }

        public function getSinglePost($id){
            $singlepost = $this->repo->uploadpost($id);

            return $singlepost;
        }

        public function __construct($connection, $uri){
            $this->repo = new postrepo($connection, $uri);
        }
    }