<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\ContentListView;

class ContentListControl extends Controller
{
    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->user = new AuthControl();
        $this->view = new ContentListView();
    }

    public function getAllContent($content, $model_class)
    {
        return $this->repo->loadAllContent($content, $model_class);
    }

    public function showPage($content, $model_class)
    {
        $content_list = $this->getAllContent($content, $model_class);
        $content_list_array = array();
        foreach ($content_list as $unit) {
            $content_list_array[] = $unit->getContent();
        }
        $userdata = $this->user->getUserData();
        $this->view->render($content_list_array, $content, $userdata);
    }
}
