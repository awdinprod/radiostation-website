<?php

namespace App\Views;

class NonContentView extends View
{
    public function render($page_url, $user, $message = null)
    {
        parent::renderHeader($user);
        parent::renderModalLogin();
        parent::renderFooter();
        ob_start();
        require $page_url;
        $page_temp = ob_get_clean();
        require_once '../App/Templates/page.php';
    }
}
