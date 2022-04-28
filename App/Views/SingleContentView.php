<?php

namespace App\Views;

class SingleContentView extends View
{
    public function render($single_content_array, $content)
    {
        ob_start();
        require '../App/Templates/single' . substr($content, 0, -1) . 'page.php';
        $page_temp = ob_get_clean();
        require '../App/Templates/page.php';
    }

    public function __construct()
    {
        parent::__construct();
    }
}
