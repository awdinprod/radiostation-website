<?php

    namespace App\views;

    use App\controllers\postcontrol;

    class singlepostview extends view {

        public function render($id) {
            $singlepost = $this->controller->getSinglePost($id);
            $postcontent = array();
            $postcontent = $singlepost->getContent();
            $pagetmp = '../app/templates/singlepostpage.php';
            require '../app/templates/page.php';
        }

        public function __construct($connection, $id){
            $this->controller = new postcontrol($connection, $id);
        }
}