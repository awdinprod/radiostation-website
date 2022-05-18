<?php

namespace App\Views;

class NonWebsiteView extends View
{
    public function render($page_temp)
    {
        require_once $page_temp;
    }
}
