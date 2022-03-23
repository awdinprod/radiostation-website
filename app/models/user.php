<?php
    namespace App\models;

    class user extends model {
        protected $username;
        protected $email;
        protected $password;
        protected $role;

        public function getUsername()
        {
            return $this->username;
        }

        public function getRole()
        {
            return $this->role;
        }

        function __construct($user)
        {
            $this->id = $user['id'];
            $this->username = $user['username'];
            $this->email = $user['email'];
            $this->password = $user['passord'];
            $this->role = $user['role'];
        }
    }
?>
