<?php

namespace App\Views;

class MainPageView extends View
{
    public function render($post_list_array, $podcast_list_array)
    {
        $page_temp = '../App/Templates/mainpage.php';
        require '../App/Templates/page.php';
    }
}

