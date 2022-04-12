<?php

namespace App\Controllers;

use App\Repositories\PostRepo;

class PostControl extends Controller
{
    public function getPostList()
    {
        $postlist = $this->repo->loadPosts();

        return $postlist;
    }

    public function getSinglePost($id)
    {
        $singlepost = $this->repo->loadPost($id);

        return $singlepost;
    }

    public function getLatestPosts()
    {
        $postlist = $this->repo->loadLatestPosts();

        return $postlist;
    }

    public function __construct($connection, $id = null)
    {
        $this->repo = new PostRepo($connection, $id);
    }
}
