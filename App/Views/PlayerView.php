<?php

namespace App\Views;

class PlayerView extends View
{
    public function render()
    {
        require_once '../OnlinePlayer/player.html';
    }
}
