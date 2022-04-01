<?php
    namespace App\views;

    use App\controllers\postcontrol;

    class postpageview extends view {

        public function render ($id){
            $posts = $this->controller->getPostList();
            $postcontent = array();
            foreach ($posts as $onepost) {
                $postcontent[] = $onepost->getContent();
            }
            $posttmp = '../app/templates/posttemp.php';
            $pagetmp = '../app/templates/postpage.php';
            require '../app/templates/page.php';
        }
        public function __construct($connection, $id){
            $this->controller = new postcontrol($connection, $id);
        }
    }
?>

