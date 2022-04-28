<?php

namespace App\Views;

class View
{
    protected $header;
    protected $footer;

    public function __construct()
    {
        ob_start();
        require '../App/Templates/header.php';
        $this->header = ob_get_clean();
        ob_start();
        require '../App/Templates/footer.php';
        $this->footer = ob_get_clean();
    }
}
