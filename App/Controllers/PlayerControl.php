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
        $page_temp = '../App/Templates/player.html';
        $this->view->render($page_temp);
    }
}
