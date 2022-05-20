<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;
use App\Views\MessagesView;

class ForgotPasswordControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
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

    public function recoverPassword()
    {
        $userdata = $this->user->getUserData();
        $this->view = new MessagesView();
        if (!isset($_POST['recover_password'], $_POST['email'])) {
            throw new \Exception("You forgot to send something. Please return back and fill in this form again");
        }
        extract($_POST, EXTR_SKIP);
        try {
            $this->mailRecoverPassword($email);
            $message = "Check your email for password reset link";
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        $this->view->render($message, $userdata);
    }

    public function showPage()
    {
        $userdata = null;
        try {
            $userdata = $this->user->getUserData();
            $this->view = new FormsAndMessagesView();
            $page_url = '../App/Templates/forgot-password-page.php';
            $this->view->render($page_url, $userdata);
        } catch (\Exception $e) {
            $this->view = new MessagesView();
            $message = $e->getMessage();
            $this->view->render($message, $userdata);
        }
    }
}
