<?php

namespace App\Controllers;

use App\Views\PlayerView;

class PlayerControl extends Controller
{
    public function __construct()
    {
        $this->view = new PlayerView();
    }

    public function showPage()
    {
        $this->view->render();
    }
}
