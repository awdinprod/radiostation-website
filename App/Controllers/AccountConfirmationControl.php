<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\MessagesView;

class AccountConfirmationControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new MessagesView();
    }

    public function showPage($token)
    {
        $userdata = $this->user->getUserData();
        try {
            $this->repo->updateStatus($token);
            $message = "Your account is confirmed!";
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        $this->view->render($message, $userdata);
    }
}
