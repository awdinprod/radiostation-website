<?php
    namespace App\route;

    use App\core\DBconnection;

    use App\views\pageview;
    use App\views\playerview;

    class router {
        public function get($uri) {
            if($uri == '/phpinfo'){
                phpinfo();
            }
            else{
                try {
                    $connection = new DBconnection();
                }
                catch (\Exception $e){
                    print "Error!: " . $e->getMessage();
                    die();
                }

                if (($uri == '/') || ($uri == '/posts') || ($uri == '/podcasts') || ($uri == '/chart')){
                    $view = new pageview($connection);
                }
                elseif ($uri == '/online-player') {
                    $view = new playerview();
                }
                $view->render();
            }

        }
    }
?>