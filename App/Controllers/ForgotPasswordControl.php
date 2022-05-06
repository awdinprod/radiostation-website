<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Repositories\UserRepo;
use App\Views\SignupView;

class ForgotPasswordControl extends Controller
{
    public function mailRecoverPassword($email)
    {
        $check = $this->repo->checkEmail($email);
        if (!$check) {
            throw new \Exception("Wrong email");
        } else {
            $mail = new Mailer();
            $mail->sendRecoveryMail($email, $check['token']);
        }
    }

    public function showPage($content, $model_class = null, $id = null)
    {
        if (isset($_POST['recover_password'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $this->mailRecoverPassword($email);
                ob_start();
                require '../App/Templates/check-email-password.php';
            } catch (\Exception $e) {
                ob_start();
                require '../App/Templates/forgot-password-page.php';
                $page_temp = ob_get_clean();
                $userdata = $this->user->getUserData();
                $this->view->render($page_temp, $userdata);
            }
        } else {
            ob_start();
            require '../App/Templates/forgot-password-page.php';
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