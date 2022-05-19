<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;

class ForgotPasswordControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new FormsAndMessagesView();
    }

    public function mailRecoverPassword($email)
    {
        $check = $this->repo->loadByEmail($email);
        if (!$check) {
            throw new \Exception("Email not found. Try again");
        } else {
            $mail = new Mailer();
            $mail->sendRecoveryMail($email, $check['token']);
        }
    }

    public function showPage()
    {
        if (isset($_POST['recover_password'], $_POST['email'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $this->mailRecoverPassword($email);
                $page_url = '../App/Templates/check-email-password.php';
                $exception_message = null;
            } catch (\Exception $e) {
                $exception_message = $e->getMessage();
                $page_url = '../App/Templates/forgot-password-page.php';
            }
        } else {
            $page_url = '../App/Templates/forgot-password-page.php';
            $exception_message = null;
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
