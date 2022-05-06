<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\SignupView;

class ConfirmationControl extends Controller
{
    public function checkConfirmation($token)
    {
        $this->repo->checkConfirmation($token);
    }

    public function showPage()
    {
        ob_start();
        require '../App/Templates/confirmation-page.php';
        $page_temp = ob_get_clean();
        $userdata = $this->user->getUserData();
        $this->view->render($page_temp, $userdata);
    }

    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new SignupView();
    }
}