<?php
    namespace App\views;

    use App\controllers\postcontrol;

    class mainpageview extends view {
        public function render (){
            $pagetmp = '../app/templates/mainpage.php';
            require '../app/templates/page.php';
        }

//        public function __construct($connection){
//            $this->controller = new postcontrol();
//        }
    }
?>
