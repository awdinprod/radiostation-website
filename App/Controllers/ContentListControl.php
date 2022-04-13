<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\ContentListView;

class ContentListControl extends Controller
{
    public function getAllContent($content, $class)
    {
        return $this->repo->loadAllContent($content, $class);
    }

    public function getLatestContent($content, $class)
    {
        return $this->repo->loadLatestContent($content, $class);
    }

    public function showPage($content, $class)
    {
        $contentlist = $this->getAllContent($content, $class);
        $contentlistarray = array();
        foreach ($contentlist as &$unit) {
            $contentlistarray[] = $unit->getContent();
        }
        $this->view->render($contentlistarray, $content);
    }

    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->view = new ContentListView();
    }
}