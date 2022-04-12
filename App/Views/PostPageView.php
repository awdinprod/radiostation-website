<?php

namespace App\Views;

use App\Controllers\PostControl;

class PostPageView extends View
{
    public function render($id)
    {
        $posts = $this->controller->getPostList();
        $postscontent = array();
        foreach ($posts as $onepost) {
            $postscontent[] = $onepost->getContent();
        }
        $pagetemp = '../App/Templates/postpage.php';
        require '../App/Templates/page.php';
    }

    public function __construct($connection, $id)
    {
        $this->controller = new PostControl($connection, $id);
    }
}
