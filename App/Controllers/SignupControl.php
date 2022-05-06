<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Models\User;
use App\Repositories\UserRepo;
use App\Views\SignupView;

class SignupControl extends Controller
{

    public function signup($username, $email, $password, $conf_password)
    {
        if (empty($username)) {
            throw new \Exception("Username is required");
        }
        if (empty($password)) {
            throw new \Exception("Password is required");
        }
        if ($password != $conf_password) {
            throw new \Exception("Passwords do not match");
        }

        $check = $this->repo->checkUser($username, $email);
        if (!empty($check)) {
            throw new \Exception("User already exists");
        }
        $token = md5($email . date("Y-m-d H:i:s"));
        $this->repo->signup($username, $email, $password, $token);

        $mail = new Mailer();
        $mail->sendConfirmationMail($email, $token);
    }

    public function showPage()
    {
        if (isset($_POST['reg_user'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $this->signup($username, $email, $password, $conf_password);
                ob_start();
                require '../App/Templates/confirm-email.php';
                $page_temp = ob_get_clean();
                $userdata = $this->user->getUserData();
                $this->view->render($page_temp, $userdata);
            } catch (\Exception $e) {
                ob_start();
                require '../App/Templates/signup-page.php';
                $page_temp = ob_get_clean();
                $userdata = $this->user->getUserData();
                $this->view->render($page_temp, $userdata);
            }
        } else {
            ob_start();
            require '../App/Templates/signup-page.php';
            $page_temp = ob_get_clean();
            $userdata = $this->user->getUserData();
            $this->view->render($page_temp, $userdata);
        }
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new SignupView();
    }
}
