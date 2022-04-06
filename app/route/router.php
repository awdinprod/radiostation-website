<?php
    namespace App\route;

    use App\core\DBconnection;

    use App\views\mainpageview;
    use App\views\postpageview;
    use App\views\singlepostview;
    use App\views\playerview;

    class router {
        public function get($uri) {
            if($uri == '/phpinfo'){
                phpinfo();
            }
            elseif($uri == '/phpmyadmin'){
                require_once '/usr/share/phpmyadmin/index.php';
            }
            else{
                try {
                    $connection = new DBconnection();
                }
                catch (\Exception $e){
                    print "Error!: " . $e->getMessage();
                    die();
                }

                if($uri == '/'){
                    $view = new mainpageview($connection);
                }
                elseif (substr($uri, 0, 6) == "/posts"){
                    $id = (int)substr($uri, 7, strlen($uri));
                    $view = new postpageview($connection, $id);
                }
                elseif (substr($uri, 0, 11) == "/singlepost"){
                    $id = (int)substr($uri, 12, strlen($uri));
                    $view = new singlepostview ($connection, $id);
                }
                elseif ($uri == '/online-player') {
                    $view = new playerview();
                }
                $view->render($id);
            }
        }
    }
?>