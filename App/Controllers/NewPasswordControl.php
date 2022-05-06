<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\SignupView;

class NewPasswordControl extends Controller
{
    public function changePassword($password, $conf_password, $token)
    {
        if ($password != $conf_password) {
            throw new \Exception("Passwords do not match");
        }
        $user = $this->repo->findByToken($token);
        if (!empty($user)) {
            $this->repo->changePassword($password, $user['user_id']);
        } else {
            throw new \Exception("Wrong token");
        }
    }

    public function showPage($content, $model_class = null, $id = null)
    {
        if (isset($_POST['recover_password'])) {
            extract($_POST, EXTR_SKIP);
            $this->changePassword($password, $conf_password, $id);
            ob_start();
            require '../App/Templates/changed-password-page.php';
        } else {
            ob_start();
            require '../App/Templates/new-password-page.php';
        }
        $page_temp = ob_get_clean();
        $userdata = $this->user->getUserData();
        $this->view->render($page_temp, $userdata);
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new SignupView();
    }
}