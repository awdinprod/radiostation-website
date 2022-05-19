<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;

class UserSettingsControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new FormsAndMessagesView();
    }

    public function changeData()
    {
        try {
            $exception_message = null;
            if (isset($_POST['username']) || isset($_POST['email'])) {
                extract($_POST, EXTR_SKIP);
                if (!preg_match("/^[A-Za-z][A-Za-z0-9_]{5,31}$/", $username)) {
                    throw new \Exception('Please, come up with a username with a letter at the beginning and use between 6 and 32 letters, numbers and "_" symbols only');
                }
                if (isset($_COOKIE['token'])) {
                    $user = $this->repo->findByToken($_COOKIE['token']);
                }
                if (!empty($user)) {
                    $this->repo->changeUserData($username, $email, $user['user_id']);
                } else {
                    throw new \Exception("Wrong token");
                }
            }
        } catch (\Exception $e) {
            $exception_message = $e->getMessage();
        }
        $this->showPage($exception_message);
    }

    public function showPage($exception_message = null)
    {
        try {
            $userdata = $this->user->getUserData();
            if ($userdata != null) {
                $page_url = '../App/Templates/user-settings-page.php';
            } else {
                $page_url = '../App/Templates/forbidden-page.php';
            }
        } catch (\Exception $e) {
            $userdata = null;
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        $this->view->render($page_url, $userdata, $exception_message);
    }
}
