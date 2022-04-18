<?php

namespace App\Views;

class MainPageView extends View
{
    public function render($postlistarray, $podcastlistarray)
    {
        $pagetemp = '../App/Templates/mainpage.php';
        require '../App/Templates/page.php';
    }
}

