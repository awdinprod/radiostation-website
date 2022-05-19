<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;

class SignupControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new FormsAndMessagesView();
    }

    public function signup($username, $email, $password, $conf_password)
    {
        if (empty($username)) {
            throw new \Exception("Username is required");
        }
        if (!preg_match("/^[A-Za-z][A-Za-z0-9_]{5,31}$/", $username)) {
            throw new \Exception('Please, come up with a username with a letter at the beginning and use between 6 and 32 letters, numbers and "_" symbols only');
        }
        if (empty($password)) {
            throw new \Exception("Password is required");
        }
        if ($password != $conf_password) {
            throw new \Exception("Passwords do not match");
        }

        $check = $this->repo->loadUser($username, $email);
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
        if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['conf_password'], $_POST['reg_user'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $this->signup($username, $email, $password, $conf_password);
                $page_url = '../App/Templates/confirm-email.php';
                $exception_message = null;
            } catch (\Exception $e) {
                $exception_message = $e->getMessage();
                $page_url = '../App/Templates/signup-page.php';
            }
        } else {
            $page_url = '../App/Templates/signup-page.php';
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
