<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\MainPageView;

class MainPageControl extends Controller
{
    public function getLatestContent($content, $class, $contentnum)
    {
        return $this->repo->loadLatestContent($content, $class, $contentnum);
    }

    public function showPage($content, $class)
    {
        $postlist = $this->getLatestContent($content[0], $class[0], 6);
        $podcastlist = $this->getLatestContent($content[1], $class[1], 4);
        $postlistarray = array();
        foreach ($postlist as &$unit) {
            $postlistarray[] = $unit->getContent();
        }
        $podcastlistarray = array();
        foreach ($podcastlist as &$unit) {
            $podcastlistarray[] = $unit->getContent();
        }
        $this->view->render($postlistarray, $podcastlistarray);
    }

    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->view = new MainPageView();
    }
}