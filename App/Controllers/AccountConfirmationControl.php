<?php

namespace App\Controllers;

use App\Repositories\UserRepo;
use App\Views\FormsAndMessagesView;

class AccountConfirmationControl extends Controller
{
    public function __construct()
    {
        $this->repo = new UserRepo();
        $this->user = new AuthControl();
        $this->view = new FormsAndMessagesView();
    }

    public function showPage($token)
    {
        try {
            $this->repo->updateStatus($token);
            $page_url = '../App/Templates/confirmation-page.php';
            $userdata = $this->user->getUserData();
            $exception_message = null;
        } catch (\Exception $e) {
            $userdata = null;
            $exception_message = $e->getMessage();
            $page_url = '../App/Templates/message-page.php';
        }
        $this->view->render($page_url, $userdata, $exception_message);
    }
}
