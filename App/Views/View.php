<?php

namespace App\Views;

class View
{
    protected $header;
    protected $modal_login;
    protected $footer;

    public function renderHeader($user)
    {
        ob_start();
        require '../App/Templates/header.php';
        $this->header = ob_get_clean();
    }

    public function renderFooter()
    {
        ob_start();
        require '../App/Templates/footer.php';
        $this->footer = ob_get_clean();
    }

    public function renderModalLogin()
    {
        ob_start();
        require '../App/Templates/modal-login.php';
        $this->modal_login = ob_get_clean();
    }
}
