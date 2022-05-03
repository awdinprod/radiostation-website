<?php

namespace App\Controllers;

class Controller
{
    protected $repo;
    protected $view;
    protected $user;

    public function userAuth()
    {
        $this->user = null;
        if (isset($_POST['login_user'])) {
            extract($_POST, EXTR_SKIP);
            $control = new LoginSignupControl();
            $this->user = $control->login($username, $password);
            setcookie('token', $this->user->getToken());
            header('Location: /');
            die();
        }
        if (isset($_COOKIE['token'])) {
            $control = new AuthControl();
            $this->user = $control->findUserByToken($_COOKIE['token']);
        }
        return $this->user;
    }
}
