<?php

namespace App\Controllers;

use App\Views\PlayerView;

class PlayerControl extends Controller
{
    public function showPage($content = null, $model_class = null, $id = null)
    {
        $this->view->render();
    }

    public function __construct()
    {
        $this->view = new PlayerView();
    }
}
