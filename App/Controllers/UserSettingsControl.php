<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\SignupView;

class UserSettingsControl extends Controller
{
    public function changeData()
    {
        if (isset($_POST)) {
            extract($_POST, EXTR_SKIP);
            $user = $this->repo->findByToken($_COOKIE['token']);
            if (!empty($user)) {
                $this->repo->changeUserData($username, $email, $user['user_id']);
            } else {
                throw new \Exception("Wrong token");
            }
        }
    }

    public function showPage()
    {
        $userdata = $this->user->getUserData();
        ob_start();
        if ($userdata != null) {
            require '../App/Templates/user-settings-page.php';
        } else {
            require '../App/Templates/forbidden-page.php';
        }
        $page_temp = ob_get_clean();
        $this->view->render($page_temp, $userdata);
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new SignupView();
    }
}
