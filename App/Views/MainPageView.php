<?php

namespace App\Views;

use App\Controllers\PostControl;

class MainPageView extends View
{
    public function render($id)
    {
        $posts = $this->controller->getLatestPosts();
        $postcontent = array();
        foreach ($posts as $onepost) {
            $postcontent[] = $onepost->getContent();
        }
        $posttmp = '../App/Templates/postmaintemp.php';
        $pagetmp = '../App/Templates/mainpage.php';
        require '../App/Templates/page.php';
    }

    public function __construct($connection)
    {
        $this->controller = new PostControl($connection);
    }
}

