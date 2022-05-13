<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\NonContentView;

class UserSettingsControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new NonContentView();
    }

    public function changeData()
    {
        if (isset($_POST['username']) || isset($_POST['email'])) {
            extract($_POST, EXTR_SKIP);
            if (isset($_COOKIE['token'])) {
                $user = $this->repo->findByToken($_COOKIE['token']);
            }
            if (!empty($user)) {
                $this->repo->changeUserData($username, $email, $user['user_id']);
            } else {
                throw new \Exception("Wrong token");
            }
        }
    }

    public function showPage()
    {
        try {
            $userdata = $this->user->getUserData();
            if ($userdata != null) {
                $page_url = '../App/Templates/user-settings-page.php';
            } else {
                $page_url = '../App/Templates/forbidden-page.php';
            }
            $exception_message = null;
        } catch (\Exception $e) {
            $userdata = null;
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        $this->view->render($page_url, $userdata, $exception_message);
    }
}
