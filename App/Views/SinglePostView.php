<?php

namespace App\Views;

use App\Controllers\PostControl;

class SinglePostView extends View
{
    public function render($id)
    {
        $singlepost = $this->controller->getSinglePost($id);
        $postcontent = array();
        $postcontent = $singlepost->getContent();
        $pagetmp = '../App/Templates/singlepostpage.php';
        require '../App/Templates/page.php';
    }

    public function __construct($connection, $id)
    {
        $this->controller = new PostControl($connection, $id);
    }
}
