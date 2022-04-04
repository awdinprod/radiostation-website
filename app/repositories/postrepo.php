<?php
    namespace App\repositories;

    use \Exception;
    use App\models\post;

    class postrepo extends repository {
        public function uploadposts (){
            $stm = $this->pdo->query("SELECT * FROM posts ORDER BY id DESC");
            $result = $stm->fetchAll();
            foreach ($result as &$res)
                $res = new post($res);

            return $result;
        }

        public function uploadpost ($id){
            $stm = $this->pdo->query("SELECT * FROM posts WHERE id=$id");
            $postsql = $stm->fetch();
            if(!$postsql)
                throw new \Exception("There is no such post. Sorry, my friend, try again");
            $result = new post($postsql);

            return $result;
        }

        public function uploadlatestposts (){
            $stm = $this->pdo->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 6");
            $result = $stm->fetchAll();
            foreach ($result as &$res)
                $res = new post($res);

            return $result;
        }
    }