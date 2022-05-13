<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\NonContentView;

class NewPasswordControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new NonContentView();
    }

    public function changePassword($password, $conf_password, $token)
    {
        if ($password != $conf_password) {
            throw new \Exception("Passwords do not match");
        }
        $user = $this->repo->findByToken($token);
        $this->repo->changePassword($password, $user['user_id']);
    }

    public function showPage($token)
    {
        try {
            $check = $this->repo->findByToken($token);
            if (!empty($check)) {
                if (isset($_POST['password'], $_POST['conf_password'], $_POST['new_password'])) {
                    extract($_POST, EXTR_SKIP);
                    try {
                        $this->changePassword($password, $conf_password, $token);
                        $page_url = '../App/Templates/changed-password-page.php';
                        $exception_message = null;
                    } catch (\Exception $e) {
                        $exception_message = $e->getMessage();
                        $page_url = '../App/Templates/new-password-page.php';
                    }
                } else {
                    $page_url = '../App/Templates/new-password-page.php';
                    $exception_message = null;
                }
            } else {
                throw new \Exception("Wrong token");
            }
        } catch (\Exception $e) {
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        try {
            $userdata = $this->user->getUserData();
        } catch (\Exception $e) {
            $userdata = null;
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        $this->view->render($page_url, $userdata, $exception_message);
    }
}
