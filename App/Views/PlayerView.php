<?php

namespace App\Views;

class PlayerView extends View
{
    public function render($page_temp)
    {
        require_once $page_temp;
    }
}
