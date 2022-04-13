<?php

namespace App\Views;

class ContentListView extends View
{
    public function render($contentlistarray, $content)
    {
        $pagetemp = '../App/Templates/listpage.php';
        require '../App/Templates/page.php';
    }
}
