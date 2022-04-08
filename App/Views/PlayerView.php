<?php

namespace App\Views;

class PlayerView extends View
{
    public function render()
    {
        require_once '../online-player/player.html';
    }
}
