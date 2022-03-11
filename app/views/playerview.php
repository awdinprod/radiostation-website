<?php
    namespace App\views;

    class playerview extends view {
        public function render (){
            require_once '../online-player/player.html';
        }
    }
