<?php

namespace App\Controllers;

use App\Repositories\UserRepo;

class AuthControl extends Controller
{
    public function login()
    {
        extract($_POST, EXTR_SKIP);
        $check = $this->repo->login($username);
        if (!$check) {
            throw new \Exception("Username or password is incorrect");
        }
        if ($check['status'] == "pending") {
            throw new \Exception("Confirm email!");
        }
        if ($check['password'] == md5($password)) {
            setcookie('token', $check['token']);
        } else {
            throw new \Exception("Username or password is incorrect");
        }
        header('Location: /');
        die();
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

    public function __construct()
    {
        $this->repo = new UserRepo();
    }

}