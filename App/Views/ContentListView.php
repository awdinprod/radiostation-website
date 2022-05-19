<?php

namespace App\Views;

class ContentListView extends View
{
    public function render($content_list_array, $content, $userdata)
    {
        parent::renderHeader($userdata);
        parent::renderModalLogin();
        parent::renderFooter();
        ob_start();
        require '../App/Templates/listpage.php';
        $page_temp = ob_get_clean();
        require '../App/Templates/page.php';
    }
}
