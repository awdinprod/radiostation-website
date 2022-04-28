<?php

namespace App\Views;

class MainPageView extends View
{
    public function render($post_list_array, $podcast_list_array)
    {
        ob_start();
        require_once '../App/Templates/mainpage.php';
        $page_temp = ob_get_clean();
        require '../App/Templates/page.php';
    }

    public function __construct()
    {
        parent::__construct();
    }
}
