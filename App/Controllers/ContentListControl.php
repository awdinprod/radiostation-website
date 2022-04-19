<?php

namespace App\Controllers;

use App\Repositories\ContentRepo;
use App\Views\ContentListView;

class ContentListControl extends Controller
{
    public function getAllContent($content, $model_class)
    {
        return $this->repo->loadAllContent($content, $model_class);
    }

    public function showPage($content, $model_class, $id = null)
    {
        $content_list = $this->getAllContent($content, $model_class);
        $content_list_array = array();
        foreach ($content_list as $unit) {
            $content_list_array[] = $unit->getContent();
        }
        $this->view->render($content_list_array, $content);
    }

    public function __construct()
    {
        $this->repo = new ContentRepo();
        $this->view = new ContentListView();
    }
}