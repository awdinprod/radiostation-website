<?php

namespace App\Views;

class MainPageView extends View
{
    public function render($post_list_array, $podcast_list_array, $userdata)
    {
        parent::renderHeader($userdata);
        parent::renderModalLogin();
        parent::renderFooter();
        ob_start();
        require_once '../App/Templates/mainpage.php';
        $page_temp = ob_get_clean();
        require '../App/Templates/page.php';
    }
}
