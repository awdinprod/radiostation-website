<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;
use App\Views\MessagesView;

class NewPasswordControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
    }

    public function changePassword($token)
    {
        $userdata = $this->user->getUserData();
        $this->view = new MessagesView();
        try {
            $user = $this->repo->findByToken($token);
            if (empty($user)) {
                throw new \Exception("Wrong token");
            }
            if (!isset($_POST['password'], $_POST['conf_password'], $_POST['new_password'])) {
                throw new \Exception("You forgot to send something. Please return back and fill in this form again");
            }
            extract($_POST, EXTR_SKIP);
            if ($password != $conf_password) {
                throw new \Exception("Passwords do not match");
            }
            $this->repo->changePassword($password, $user['user_id']);
            $message = "Your password is changed";
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        $this->view->render($message, $userdata);
    }

    public function showPage($token)
    {
        $userdata = null;
        try {
            $user = $this->repo->findByToken($token);
            if (empty($user)) {
                throw new \Exception("Wrong token");
            }
            $userdata = $this->user->getUserData();
            $this->view = new FormsAndMessagesView();
            $page_url = '../App/Templates/new-password-page.php';
            $this->view->render($page_url, $userdata);
        } catch (\Exception $e) {
            $this->view = new MessagesView();
            $message = $e->getMessage();
            $this->view->render($message, $userdata);
        }
    }
}
