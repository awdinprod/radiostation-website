<?php

namespace App\Views;

class SignupView extends View
{
    public function render($page_temp, $user)
    {
        parent::renderHeader($user);
        parent::renderModalLogin();
        parent::renderFooter();
        require_once '../App/Templates/page.php';
    }
}
