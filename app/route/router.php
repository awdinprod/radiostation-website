<?php
    namespace App\route;

    use App\views\pageview;
    use App\views\playerview;

    class router {
            public function get($uri) {

                if (($uri == '/') || ($uri == '/posts') || ($uri == '/podcasts') || ($uri == '/chart')){
                    $view = new pageview();
                }
                elseif ($uri == '/online-player') {
                    $view = new playerview();
                }
                $view->render();
            }
        }
?>