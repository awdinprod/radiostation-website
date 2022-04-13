<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\SingleContentView;

class SingleContentControl extends Controller
{
    public function getSingleContent($content, $class, $id)
    {
        return $this->repo->loadSingleContent($content, $class, $id);
    }

    public function showPage($content, $class, $id)
    {
        $singlecontent = $this->getSingleContent($content, $class, $id);
        $singlecontentarray = array();
        $singlecontentarray = $singlecontent->getContent();
        $this->view->render($singlecontentarray, $content);
    }

    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->view = new SingleContentView();
    }
}