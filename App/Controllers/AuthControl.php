<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;

class AuthControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->view = new FormsAndMessagesView();
    }

    public function login()
    {
        if (isset($_POST['username'], $_POST['password'], $_POST['login_user'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $user = $this->repo->loadByUsername($username);
                if (!$user) {
                    throw new \Exception("Username or password is incorrect");
                } elseif ($user['status'] == "pending") {
                    throw new \Exception("Confirm your account");
                } elseif ($user['password'] == md5($password)) {
                    setcookie('token', $user['token']);
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
        die();
    }

    public function getUserData(): ?array
    {
        $this->user = null;
        if (isset($_COOKIE['token'])) {
            $check = $this->repo->findByToken($_COOKIE['token']);
            if (!$check) {
                throw new \Exception("Something wrong with your account token. Please login if you didn't yet");
            } else {
                $this->user = array(
                    'user_id' => $check['user_id'],
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
