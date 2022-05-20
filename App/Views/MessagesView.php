<?php

namespace App\Views;

class MessagesView extends View
{
    public function render($message, $userdata)
    {
        parent::renderHeader($userdata);
        parent::renderModalLogin();
        parent::renderFooter();
        ob_start();
        require '../App/Templates/message-page.php';
        $page_temp = ob_get_clean();
        require_once '../App/Templates/page.php';
    }

}