<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\NonContentView;

class AuthControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->view = new NonContentView();
    }

    public function login()
    {
        if (isset($_POST['username'], $_POST['password'], $_POST['login_user'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $check = $this->repo->loadByUsername($username);
                if (!$check) {
                    throw new \Exception("Username or password is incorrect");
                } elseif ($check['status'] == "pending") {
                    throw new \Exception("Confirm your account");
                } elseif ($check['password'] == md5($password)) {
                    setcookie('token', $check['token']);
                    header('Location: /');
                    die();
                } else {
                    throw new \Exception("Username or password is incorrect");
                }
            } catch (\Exception $e) {
                $exception_message = $e->getMessage();
                $this->showPage($exception_message);
            }
        }
    }

    public function logout()
    {
        unset($_COOKIE['token']);
        setcookie('token', null, -1, '/');
        header('Location: /');
        session_destroy();
        die();
    }

    public function getUserData(): ?array
    {
        $this->user = null;
        if (isset($_COOKIE['token'])) {
            $check = $this->repo->findByToken($_COOKIE['token']);
            if (!$check) {
                throw new \Exception("Wrong token");
            } else {
                $this->user = array(
                    'username' => $check['username'],
                    'email' => $check['email'],
                    'role' => $check['role']
                );
            }
        }
        return $this->user;
    }

    public function showPage($exception_message = null)
    {
        $page_url = '../App/Templates/login-static.php';
        try {
            $userdata = $this->getUserData();
        } catch (\Exception $e) {
            $userdata = null;
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        $this->view->render($page_url, $userdata, $exception_message);
    }
}
