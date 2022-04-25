<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\LoginSignupView;

class LoginSignupControl extends Controller
{
    public function signup($username, $email, $password, $conf_password)
    {
        return $this->repo->signup($username, $email, $password, $conf_password);
    }

    public function login($username, $password)
    {
        return $this->repo->login($username, $password);
    }

    public function showPage()
    {
        if (isset($_POST['reg_user'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $_SESSION['token'] = $this->signup($username, $email, $password, $conf_password);
                $page_temp = '../App/Templates/confirm-email.php';
                $this->view->render($page_temp);
            } catch (\Exception $e) {
                $this->view->render();
            }
        } else {
            $this->view->render();
        }
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->view = new LoginSignupView();
    }
}
