<?php

namespace App\Views;

class ContentListView extends View
{
    public function render($content_list_array, $content)
    {
        $page_temp = '../App/Templates/listpage.php';
        require '../App/Templates/page.php';
    }
}
