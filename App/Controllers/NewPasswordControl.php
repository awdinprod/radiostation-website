<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Repositories\UserRepo;
use App\Views\LoginSignupView;

class NewPasswordControl extends Controller
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
        extract($_POST, EXTR_SKIP);
        if (isset($_POST['recover_password'])) {
            try {
                $this->mailRecoverPassword($email);
                ob_start();
                require '../App/Templates/check-email-password.php';
            } catch (\Exception $e) {
                ob_start();
                require '../App/Templates/forgot-password-email.php';
                $page_temp = ob_get_clean();
                $this->view->render($page_temp);
            }
        } elseif ($id != null) {
            $this->changePassword($password, $conf_password, $token);
            ob_start();
            require '../App/Templates/changed-password-page.php';
        } else {
            ob_start();
            require '../App/Templates/' . $content . '-page.php';
        }
        $page_temp = ob_get_clean();
        $this->view->render($page_temp);
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->view = new LoginSignupView();
    }
}