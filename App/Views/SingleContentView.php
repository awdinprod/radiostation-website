<?php

namespace App\Views;

class SingleContentView extends View
{
    public function render($single_content_array, $content, $user, $comments)
    {
        parent::renderHeader($user);
        parent::renderModalLogin();
        parent::renderFooter();
        ob_start();
        require '../App/Templates/single' . substr($content, 0, -1) . 'page.php';
        $page_temp = ob_get_clean();
        require '../App/Templates/page.php';
    }
}
