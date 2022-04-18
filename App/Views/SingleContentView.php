<?php

namespace App\Views;

class SingleContentView extends View
{
    public function render($singlecontentarray, $content)
    {
        $pagetemp = '../App/Templates/single' . substr($content, 0, -1) . 'page.php';
        require '../App/Templates/page.php';
    }

}