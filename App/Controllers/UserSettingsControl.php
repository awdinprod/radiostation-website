<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\LoginSignupView;

class UserSettingsControl extends Controller
{
    public function showPage()
    {
        ob_start();
        require '../App/Templates/user-settings-page.php';
        $page_temp = ob_get_clean();
        $user = parent::userAuth();
        $this->view->render($page_temp, $user);
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->view = new LoginSignupView();
    }
}
