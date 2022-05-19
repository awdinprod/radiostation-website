<?php

namespace App\Views;

class FormsAndMessagesView extends View
{
    public function render($page_url, $userdata, $message = null)
    {
        parent::renderHeader($userdata);
        parent::renderModalLogin();
        parent::renderFooter();
        ob_start();
        require $page_url;
        $page_temp = ob_get_clean();
        require_once '../App/Templates/page.php';
    }
}
