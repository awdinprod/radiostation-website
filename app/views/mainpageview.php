<?php
    namespace App\views;

    use App\controllers\postcontrol;

    class mainpageview extends view {
        public function render ($id){
            $posts = $this->controller->getPostList();
            $postcontent = array();
            foreach ($posts as $onepost) {
                $postcontent[] = $onepost->getContent();
            }
            $posttmp = '../app/templates/postmaintemp.php';
            $pagetmp = '../app/templates/mainpage.php';
            require '../app/templates/page.php';
        }

        public function __construct($connection){
            $this->controller = new postcontrol($connection);
        }
    }
?>
