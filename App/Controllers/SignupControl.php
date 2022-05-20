<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;
use App\Views\MessagesView;

class SignupControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new FormsAndMessagesView();
    }

    public function signup()
    {
        $userdata = $this->user->getUserData();
        $this->view = new MessagesView();
        try {
            if (!isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['conf_password'], $_POST['reg_user'])) {
                throw new \Exception("You forgot to send something. Please return back and fill in this form again");
            }
            extract($_POST, EXTR_SKIP);
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
            $message = "Please confirm your account. You'll find a letter with a simple instruction in your email";
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
            $page_url = '../App/Templates/signup-page.php';
            $this->view->render($page_url, $userdata);
        } catch (\Exception $e) {
            $this->view = new MessagesView();
            $message = $e->getMessage();
            $this->view->render($message, $userdata);
        }
    }
}
