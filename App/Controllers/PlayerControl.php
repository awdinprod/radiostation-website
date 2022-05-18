<?php

namespace App\Controllers;

use App\Views\NonWebsiteView;

class PlayerControl extends Controller
{
    public function __construct()
    {
        $this->view = new NonWebsiteView();
    }

    public function showPage()
    {
        $page_temp = '../App/Templates/player.html';
        $this->view->render($page_temp);
    }
}
