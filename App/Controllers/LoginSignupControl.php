<?php

namespace App\Controllers;

use App\Mailer\Mailer;
use App\Models\User;
use App\Repositories\UserRepo;
use App\Views\LoginSignupView;

class LoginSignupControl extends Controller
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

    public function login($username, $password)
    {
        $check = $this->repo->login($username);
        if (!$check) {
            throw new \Exception("Username or password is incorrect");
        }
        if ($check['status'] == "pending") {
            throw new \Exception("Confirm email!");
        }
        if ($check['password'] == md5($password)) {
            $user = new User($check);
        } else {
            throw new \Exception("Username or password is incorrect");
        }

        return $user;
    }

    public function checkConfirmation($token)
    {
        $this->repo->checkConfirmation($token);
    }

    public function showPage($content, $model_class = null, $id = null)
    {
        if (isset($_POST['reg_user'])) {
            extract($_POST, EXTR_SKIP);
            try {
                $this->signup($username, $email, $password, $conf_password);
                ob_start();
                require '../App/Templates/confirm-email.php';
                $page_temp = ob_get_clean();
                $this->view->render($page_temp);
            } catch (\Exception $e) {
                ob_start();
                require '../App/Templates/signup-email.php';
                $page_temp = ob_get_clean();
                $this->view->render($page_temp);
            }
        } else {
            ob_start();
            require '../App/Templates/' . $content . '-page.php';
            $page_temp = ob_get_clean();
            $this->view->render($page_temp);
        }
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->view = new LoginSignupView();
    }
}
