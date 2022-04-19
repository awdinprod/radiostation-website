<?php

namespace App\Views;

class SingleContentView extends View
{
    public function render($single_content_array, $content)
    {
        $page_temp = '../App/Templates/single' . substr($content, 0, -1) . 'page.php';
        require '../App/Templates/page.php';
    }

}